<?php
 
if (!defined('FREI_ADMIN')) {
    die("no direct access");
}
require('../arg.php');

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object); else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);

        rmdir($dir);
    }
}

function smartCopy($source, $dest, $options=array('folderPermission' => 0755, 'filePermission' => 0755)) {
    $result = false;

    if (is_file($source)) {
        if ($dest[strlen($dest) - 1] == '/') {
            if (!file_exists($dest)) {
                cmfcDirectory::makeAll($dest, $options['folderPermission'], true);
            }
            $__dest = $dest . "/" . basename($source);
        } else {
            $__dest = $dest;
        }
        $result = copy($source, $__dest);
        chmod($__dest, $options['filePermission']);
    } elseif (is_dir($source)) {
        if ($dest[strlen($dest) - 1] == '/') {
            if ($source[strlen($source) - 1] == '/') {
                //Copy only contents
            } else {
                //Change parent itself and its contents
                $dest = $dest . basename($source);
                //echo $dest;
                mkdir($dest);
                chmod($dest, $options['filePermission']);
            }
        } else {
            if ($source[strlen($source) - 1] == '/') {
                //Copy parent directory with new name and all its content
                mkdir($dest, $options['folderPermission']);
                chmod($dest, $options['filePermission']);
            } else {
                //Copy parent directory with new name and all its content
                mkdir($dest, $options['folderPermission']);
                chmod($dest, $options['filePermission']);
            }
        }

        $dirHandle = opendir($source);
        while ($file = readdir($dirHandle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($source . "/" . $file)) {
                    $__dest = $dest . "/" . $file;
                } else {
                    $__dest = $dest . "/" . $file;
                }
                //echo "$source/$file ||| $__dest<br />";
                $result = smartCopy($source . "/" . $file, $__dest, $options);
            }
        }
        closedir($dirHandle);
    } else {
        $result = false;
    }
    return $result;
}

if (isset($_REQUEST['do']) && isset($_REQUEST['theme'])) {

    if ($_REQUEST['do'] == "new") {
        $time = time();
        smartCopy('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . '', 'admin_files/theme_maker/temp/');
        clearstatcache();
        rename('admin_files/theme_maker/temp/' . $_REQUEST['theme'], '../client/jquery/freichat_themes/' . $_REQUEST['theme'] . 'New' . $time);


        if (is_dir('admin_files/theme_maker/temp/' . $_REQUEST['theme'])) { //rename doesnt work in windows as expected
            rrmdir('admin_files/theme_maker/temp/' . $_REQUEST['theme']);
        }


        //  smartCopy('admin_files/theme_maker/temp/'.$_REQUEST['theme'].'New','admin_files/theme_maker/themes');
        if (is_dir('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . 'New' . $time)) {
            file_put_contents('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . 'New' . $time . '/author.txt', 'yourname');
            echo "<p><font color=green>New project created successfully!!</font></p>";
        } else {
            echo "<p><font color=red>an error occured (check permissions for ~freichat/client/jquery/freichat_themes/)!!</font></p>";
        }
    } else if ($_REQUEST['do'] == "delete") {
        rrmdir('../client/jquery/freichat_themes/' . $_REQUEST['theme']);
        if (is_dir('../client/jquery/freichat_themes/' . $_REQUEST['theme'])) {
            echo "<p><font color=red>an error occured (check permissions for ~freichat/client/jquery/freichat_themes/)!!</font></p>";
        } else {
            echo "<p><font color=green>project Deleted successfully!!</font></p>";
        }
    } else if ($_REQUEST['do'] == "edit") {
        echo '<p>NOTES:Switch to this theme in parameters to notice the change in the installed site</p>';
        echo '<P>The Physical path to the themes is ~freichat/client/jquery/freichat_themes (you may rename the themes there and you may compress the theme and share it)</p>';
        echo '<p>Dont forget to <a href="http://evnix.com">share your themes<a/> with others</p><hr/>';
        $ray = get_file_names('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . '/', 'file');


        echo "\n\n\n" . '<br/><div style="background-color:gray;padding:20pt;">
	<form action="admin.php?freiload=theme_maker&do=edit&action=uploadfile&theme=' . $_REQUEST['theme'] . '" method="post" enctype="multipart/form-data">
	<input type=file name=myfile />
	<input type=submit value="Upload/Replace File" /></form>
	</div><br/>';


        echo '<table style="color:black" border=1 bgcolor=#efefef><tr><th>FileName</th><th>Preview</th><th>Action</th></tr>';
        foreach ($ray as $rays) {
            echo '<tr>';
            $delete = false;
            echo '<td>' . $rays . '</td>';
            echo '<td>';
            if ((stristr($rays, 'jpeg') === FALSE) && (stristr($rays, 'jpg') === FALSE) && (stristr($rays, 'png') === FALSE) && (stristr($rays, 'gif') === FALSE)) {
                echo 'No Preview Available';
            } else {
                echo '<img src="../client/jquery/freichat_themes/' . $_REQUEST['theme'] . '/' . $rays . '" />';
                $delete = true;
            }



            echo '</td>';
            if ($delete == true) {
                echo '<td><a href="admin.php?freiload=theme_maker&do=edit&action=deletefile&file=' . $rays . '&theme=' . $_REQUEST['theme'] . '">Delete</a></td>';
            } else {
                echo '<td>Delete</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        $contents = file_get_contents('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . '/argument.php');
        echo '<b>Argument File:</b><br/><form method=post action="admin.php?freiload=theme_maker&do=edit&action=savearg&theme=' . $_REQUEST['theme'] . '"><textarea id="textarea_2" name="arg" cols=100 rows=20>' . $contents . '</textarea><br/><input type="submit" value="Save Argument file"/></form>';
        $contents = file_get_contents('../client/jquery/freichat_themes/' . $_REQUEST['theme'] . '/css.php');
        echo '<br/><b>CSS File:</b><br/><form method=post action="admin.php?freiload=theme_maker&do=edit&action=savecss&theme=' . $_REQUEST['theme'] . '"><textarea id="textarea_1" name="css" cols="100" rows="25">' . $contents . '</textarea><br/><input type="submit" value="Save CSS file"/></form>';
    }
}

echo "<hr/>";
echo "<P><b>Available Theme Projects</b></P><ol type='I'>";
$array = (get_file_names('../client/jquery/freichat_themes/', 'dir'));
foreach ($array as $ray) {
    $author = file_get_contents('../client/jquery/freichat_themes/' . $ray . '/author.txt');
    $edit = '';
    $del = '';
    if ($author == 'FreiChatX') {
        
    } else {
        $edit = "<li><a href='admin.php?freiload=theme_maker&do=edit&theme=$ray'>Edit</a></li>";
        $del = "<li><a href='admin.php?freiload=theme_maker&do=delete&theme=$ray'>Delete</a></li>";
    }
    echo "<li><ul><li>Name:<b>$ray</b> </li><li>Author: $author</li>$edit $del<li><a href='admin.php?freiload=theme_maker&do=new&theme=$ray'>New project from here</a></li></ul></li>";
}
echo "</ol>";
//}
?>
