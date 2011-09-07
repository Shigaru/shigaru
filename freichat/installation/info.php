<?php

session_start();

/* Make me secure */

if (!isset($_SESSION['FREIX']) || $_SESSION['FREIX'] != 'authenticated') {
    header("Location:index.php");
    exit;
}

/* Now i am secure */

class Info {

    public function __construct() {
        if (isset($_POST['cms']) == true) {
            $_SESSION['cms'] = $_POST['cms'];
        }
    }

    public function set_file() {
        $redir = false;
        if ($_SESSION['cms'] == "Joomla" || $_SESSION['cms'] == "JCB" || $_SESSION['cms'] == "JSocial" || $_SESSION['cms'] == "CBE") {
            $set_file = "configuration.php";
        } else if ($_SESSION['cms'] == "Drupal") {
            $set_file = "sites/default/settings.php";
        } else if ($_SESSION['cms'] == "WordPress") {
            $set_file = "wp-config.php";
        } else if ($_SESSION['cms'] == "Phpbb") {
            $set_file = "config.php";
        } else if ($_SESSION['cms'] == "Elgg") {
            $set_file = "engine/settings.php";
        } else if ($_SESSION['cms'] == "Custom") {
            $redir = true;
        } else if ($_SESSION['cms'] == "Sugarcrm") {
            $set_file = 'config.php';
        } else if ($_SESSION['cms'] == "Phpvms") {
            $set_file = 'core/local.config.php';
        } else {
            die("Invalid selection: go back and try again ");
        }

        $this->set_path($set_file);

        if ($redir == true) {
            header('Location: params.php');
        }

        return $set_file;
    }

    public function set_path($set_file) {
        if (isset($_POST['paths']) == true) {
            $_SESSION['config_path'] = $_POST['paths'];
            $_SESSION['config_path'] = str_replace('\\', '/', $_SESSION['config_path']);
            $_SESSION['cms_path'] = str_replace($set_file, "", $_SESSION['config_path']);
        } else {
            $ROOT_path = str_replace('\\', '/', dirname(__FILE__));
            $_SESSION['cms_path'] = str_replace("freichat/installation", "", $ROOT_path);
            $_SESSION['config_path'] = str_replace("freichat/installation", "", $ROOT_path) . $set_file;
        }
    }

    public function output_body($set_file) {
        $flags = $this->get_flags();

        echo "
                <p>  " . $_SESSION['cms'] . "  installed folder => <b> " . $_SESSION['cms_path'] . " </b>&nbsp&nbsp

                <br/><br/>
                Please make sure freichat directory is in main  " . $_SESSION['cms'] . " installed directory<br/>
                   <br/> <b>File Permissions </b><br/>
                arg.php <font color='" . $flags['color1'] . "'>" . $flags['text1'] . " </font><br/></p>
                <p>  " . $set_file . "  <font color=" . $flags['color2'] . " >" . $flags['text2'] . "</font><br/>
                 <p id='conf'>
                        <form name='path' action=" . $_SERVER['PHP_SELF'] . "  method='POST'>
                   Check file path to your   " . $set_file . " :<input name='paths' type='text' value= " . $_SESSION['config_path'] . " ></input><br/><br/>

            ";

        if ($flags['flag'] == false) {
            echo '<input type="submit" value="Modify Path" />';
        }

        echo "</form>

            <form name='cms' action='params.php' method='POST'>
        <br/>

         ";

        if ($flags['flag'] == true) {
            echo '<input type="submit">';
        }

        echo " </form>";
        require("foot.php");
    }

    public function get_flags() {
        $flags = Array();

        $flags['flag'] = true;

        if (is_writable("../arg.php")) {
            $flags['color1'] = "green";
            $flags['text1'] = "is writable";
        } else {
            $flags['flag'] = false;
            $flags['color1'] = "red";
            $flags['text1'] = "is not writable or path is incorrect(Please change file permissions to 0777)";
        }

        if (isset($_SESSION['config_path']) == true) {
            if (is_readable($_SESSION['config_path'])) {
                $flags['color2'] = "green";
                $flags['text2'] = "is readable";
            } else {
                $flags['flag'] = false;
                $flags['color2'] = "red";
                $flags['text2'] = "is not readable";
            }
        }
        return $flags;
    }

    public function output_raw() {
        require("head.php");
        echo "<li><b><s>License</s></b></li>
                <li><b><s>Install Type</s></b></li>
                <li><b><u>Configuration check</u></b></li>
                <li>Configuration Details</li>
                <li>Setup</li>";
        require("mid.php");
        echo "<p>If any of the following parameters are wrong(shown in red) or do not comply with necessity do not head to next step<br/><br/></p>";
    }

    public function run_me() {
        $set_file = $this->set_file();

        $this->output_raw();
        $this->output_body($set_file);
    }

}

$info = new Info();

$info->run_me();
?>
