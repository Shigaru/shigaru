<?php
session_start();

if (!isset($_SESSION['phplogin']) || $_SESSION['phplogin'] !== true) {
    header('Location: ../administrator/index.php'); //Replace that if login.php is somewhere else
    exit;
}

define('FREI_ADMIN', 'true');

function get_file_names($path, $type, $replace=false) {
    $handle = opendir($path);
    $store = array();
    if ($type == "dir" || $type == "file") {
        if ($path) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && $file != '.svn') {
                    if ((is_dir($path . $file) && $type == "dir") || $type == "file") {
                        if ($type == "file" && $replace == true) {
                            $file = str_replace(".php", "", $file);
                        }
                        $store[] = $file;
                    }
                }
            }
            closedir($handle);
        }
    }
    return $store;
}
?><html>
    <head>
        <title>
            FreiChatX Parameters
        </title>
        <style type="text/css">
            body{
                background-attachment:fixed;
                background-position:center;
                background-repeat:no-repeat;
                background-color:black;
                color:white;
            }
            a{

                color:white;
                font-style:underline;

            }
            a:hover{
                color:red;
            }
        </style>
        <?php
        if (isset($_REQUEST['freiload'])) {
            if (is_file('admin_files/' . $_REQUEST['freiload'] . '/head.php')) {
                require('admin_files/' . $_REQUEST['freiload'] . '/head.php');
            } else {
                //var_dump($_REQUEST);


                echo "\n<!-- requested loadable header could not be found! -->\n";
            }
        } else {
            require('admin_files/home/head.php');
            //require('admin_files/home/index.php');
        }
        ?>
    </head>
    <body background="admin_files/home/untitled.png">

        <div>

            <img src="admin_files/home/head.png" height=100 width=100% />
            <hr/>
        </div>
        <table border=0 cellpadding="6">
            <tr>
                <td valign=top bgcolor="#000000" style="color:white;border-right-style:solid;" width="20%">

                    <b><font size="6px" >------Menu-----</font></b><br/><br/>

                    <?php
                    $array = (get_file_names('admin_files/', 'dir'));
                    foreach ($array as $ray) {
                        echo "<a href='admin.php?freiload=$ray'>$ray</a><hr/>";
                    }
                    ?>

                </td>

                <td valign=top width="80%">
                    <?php
                    if (isset($_REQUEST['freiload'])) {
                        if (is_file('admin_files/' . $_REQUEST['freiload'] . '/index.php')) {
                            require('admin_files/' . $_REQUEST['freiload'] . '/index.php');
                        } else {
                            var_dump($_REQUEST);
                            echo "requested loadable could not be found!";
                        }
                    } else {
                        require('admin_files/home/index.php');
                    }
                    ?>
                </td>
            </tr>

        </table>

    </body>
</html>