<?php
session_start();

if (!isset($_SESSION['FREIX']) || $_SESSION['FREIX'] != 'authenticated' || !isset($_POST['host'])) {
    header("Location:index.php");
    exit;
}



if (!is_writable("../arg.php")) {
    die("arg.php is not writable!<br/>Go back and change ~/freichat/arg.php permisssions");
}

class Install {

    public function __construct() {
        $this->Sugarcrm_install_error = false;
        $this->installed = 'true';
        $this->path_host = str_replace("installation/install.php", "", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);
    }

    public function argument() {
        $filepath = "../arg.php";
        $handle = fopen($filepath, 'w');

        $contents = '<?php

        /* FreiChatX parameters */

        if(!defined(\'RDIR\'))
        {
         define(\'RDIR\', dirname(__FILE__));
	 define(\'PARENTDIR\',dirname(RDIR));
        }

  if(@$_SERVER["HTTPS"] == "on")
  {
      $protocol = "https://";
  }
  else
  {
      $protocol = "http://";
  }


  $parameters=unserialize(file_get_contents(str_replace(\'arg.php\',\'config.dat\',__FILE__)));

        $PATH = \'' . $_POST["freichat_to_path"] . '/\'; // Use this only if you have placed the freichat folder somewhere else
	$installed=' . $this->installed . ';
        $admin_pswd=\'' . $_POST["adminpass"] . '\';
        $url=$protocol.$_SERVER[\'HTTP_HOST\'].$_SERVER[\'SCRIPT_NAME\'];
	$show_name=$parameters[\'show_name\']; //you can have guest or user
        $displayname=$parameters[\'displayname\']; //you can have username / name(nickname)
        $show_module=$parameters[\'show_module\']; //you can have\'visible\' or\'hidden\'
        $chatspeed=$parameters[\'chatspeed\']; //Do not change this value
        $fxval=$parameters[\'fxval\']; //Set it to false if you do not want animations
        $draggable=$parameters[\'draggable\'];
        $conflict=$parameters[\'conflict\']; //Jquery Conflicts \'true\' or \'\'
        $msgSendSpeed=$parameters[\'msgSendSpeed\']; //Message are sent after 1 second of post, reducing it will increase FreiChatX message sending speed but also will send more requests to the server! NOTE:: Do not decrease it below 1000
        $show_avatar=$parameters[\'show_avatar\']; //Can have block or none

        $debug=$parameters[\'debug\']; //option for debugging ,default is false
        $freichat_theme=$parameters[\'freichat_theme\'];
        $css=$freichat_theme; //background color
        $color=$css; //colour for chatbuttons
        $lang=$parameters[\'lang\']; //Language please do not include .php here only file name

        $load=$parameters[\'load\']; //chatbox
        $dyncss=\'disable\'; //template patch
        $evnixpower=\'visible\'; //powered by evnix
        $show_chatbox=\'\';
        $time=$parameters[\'time\']; //In seconds

        $JSdebug=$parameters[\'JSdebug\']; // Javascript debug info shown in firebug (firefox extension). No quotes around true or false
        $busy_timeOut=$parameters[\'busy_timeOut\']; //In seconds user will be switched to busy status
        $offline_timeOut=$parameters[\'offline_timeOut\']; //In seconds user will be switched to offline status

        /*FreiChatX plugin parameters*/
        // File sending
        $show_file_sending_plugin=$parameters[\'plugins\'][\'file_sender\'][\'show\'];
        $file_size_limit=$parameters[\'plugins\'][\'file_sender\'][\'file_size\']; //In Kilobytes
        $expirytime=$parameters[\'plugins\'][\'file_sender\'][\'expiry\']; //In minutes after which the uploaded files will be deleted
        $valid_exts=$parameters[\'plugins\'][\'file_sender\'][\'valid_exts\']; //valid extensions separated by comma
        $playsound = $parameters["playsound"];
        
                //Translate

		$show_translate_plugin = \'enabled\';

		//Chatroom plugin
		$show_chatroom_plugin = \'disabled\';

                //Video Chat plugin    
                $show_videochat_plugin = \'disabled\';  //Pending !!
                    
		//coversation save
                $show_save_plugin = \'enabled\';

                $show_smiley_plugin = \'enabled\';
		//send conversation plugin
                $show_mail_plugin = \'enabled\';
		$smtp_username=\'\';
		$smtp_password=\'\';
		$mailtype=$parameters["plugins"]["send_conv"]["mailtype"];
		$smtp_server=$parameters["plugins"]["send_conv"]["smtp_server"];
		$smtp_port=$parameters["plugins"]["send_conv"]["smtp_port"];
		$smtp_protocol=$parameters["plugins"]["send_conv"]["smtp_protocol"];
		$mail_from_address=$parameters["plugins"]["send_conv"]["from_address"];
		$mail_from_name=$parameters["plugins"]["send_conv"]["from_name"];


	/* ACL PERMISSIONS */
	/* Here allow or noallow can be used to grant and prohibit permissions respectively */


            $ACL = array(
            \'FILE\' => array(          /* File upload/send plugin */
            \'user\' => \'allow\',
            \'guest\' => \'allow\'
            ),

            \'TRANSLATE\' => array(
            \'user\' => \'allow\',
            \'guest\' => \'allow\'
            ),

            \'SAVE\' => array(
            \'user\' => \'allow\',
            \'guest\' => \'allow\'
            ),

            \'SMILEY\' => array(
            \'user\' => \'allow\',
            \'guest\' => \'allow\'
            ),

            \'MAIL\' => array(
            \'user\' => \'allow\',
            \'guest\' => \'allow\'
            ), 
            
            \'VIDEOCHAT\' => array(
            \'user\' => \'noallow\',
            \'guest\' => \'noallow\'                
            )     
 
            );


            /* ACL PERMISSIONS */

         /* To ensure boolean is parsed */

                if($debug == "true")
                {
                    $debug = true;
                }
                else
                {
                    $debug = false;
                }

                //Also

                if($JSdebug == "true")
                {
                    $JSdebug = true;
                }
                else
                {
                    $JSdebug = false;
                }


        /* Data base details */
        $con=\'mysql\';
        $username=\'' . $_POST["muser"] . '\';
        $password=\'' . $_POST["mpass"] . '\';
        $client_db_name=\'' . $_POST["dbname"] . '\';
        $host=\'' . $_POST["host"] . '\';
        $driver=\'' . $_POST["driver"] . '\';
        $db_prefix=\'' . $_POST["dbprefix"] . '\';
        $uid=\'' . uniqid() . '\';


 /* NOTE:= Below setting only applies to users using custom driver*/

 //Tell FreiChatX what to use { Pure session }  OR { Session and database }
/*
 * Psession   -> Pure sessions
 * Sdatabase  -> Session with database
 */

        $freiuse="Sdatabase"; //can have value as Psession or Sdatabase

  /* If you are using only sessions to store User details */
//Please use only the index of session variable

//The default value in user name or user id  session when user is a guest
        $default_ses=null; //If you dont make any checks leave it null

        $ses_username=\'root\';  /* Username stored in session*/ //Only index value
        $ses_userid=\'loginid\';      /* Userid stored in session */ //Only index value

        /* OR */

/* if you are using database table to store User details */
        $usertable=\'login\'; //specifies the name of the table in which your user information is stored.
        $row_username=\'root\'; //specifies the name of the field in which the user\'s name/display name is stored.
        $row_userid=\'loginid\'; //specifies the name of the field in which the user\'s id is stored (usually id or userid)
?>';

        fwrite($handle, $contents);
        fclose($handle);
    }

    public function connectDB() {
        try {
            $this->db = new PDO('mysql:host=' . $_POST["host"] . ';dbname=' . $_POST["dbname"], $_POST["muser"], $_POST["mpass"]);
        } catch (PDOException $e) {
            $this->installed = 'false';
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function dropTables() {
        $this->db->query("DROP TABLE IF EXISTS `frei_chat`");
        $this->db->query("DROP TABLE IF EXISTS `frei_session`");
        $this->db->query("DROP TABLE IF EXISTS `frei_rooms`");
    }

    public function createTables() {
        $this->db->query("CREATE TABLE IF NOT EXISTS `frei_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  `time` decimal(15,0) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");


        $this->db->query("CREATE TABLE IF NOT EXISTS `frei_session` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permanent_id` (`permanent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `frei_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
");

        $this->db->query("INSERT INTO `frei_rooms` (`id`, `room_name`) VALUES
(0, 'General Talk'),
(1, 'Innovative Talk'),
(2, 'Fun Talk'),
(3, 'Boring Talk');");
    }

    public function output() {

        if ($_POST['driver'] == "Joomla" || $_POST['driver'] == "JCB" || $_POST['driver'] == "CBE" || $_POST['driver'] == "JSocial") {
            include('drivers/Joomla.php');
        } else if ($_POST['driver'] == "Drupal") {
            include('drivers/Drupal.php');
        } else if ($_POST['driver'] == "Phpbb") {
            include('drivers/Phpbb.php');
        } else if ($_POST['driver'] == "WordPress") {
            include('drivers/WordPress.php');
        } else if ($_POST['driver'] == "Elgg") {
            include('drivers/Elgg.php');
        } else if ($_POST['driver'] == 'Custom') {
            include('drivers/Custom.php');
        } else if ($_POST['driver'] == 'Sugarcrm') {
            include('drivers/Sugarcrm.php');
        } else if ($_POST['driver'] == 'Phpvms') {
            include('drivers/Phpvms.php');
        } else {
            $this->installed = 'false';
            echo "Driver unknown or not yet implemented!";
            return false;
        }

        $info = info($this->path_host);
        return $info;
    }

    public function install_in_sugar() {
        $root = dirname($_SESSION['config_path']);
        $handle = $root . "/index.php";

        if (!is_writable($handle)) {
            return 'error';
        }

        require 'contents.php';
        $freichatx_contents = get_freichatx_sugarce($this->path_host);
        $contents = file_get_contents($handle);

        if (strpos($contents, "freichatx_code_written") == TRUE) {
            echo "SugarCE installed";
        } else {
            if (strpos($contents, "\$app->execute();") == true) {
                $search = "\$app->execute();";
                $replace = $search . $freichatx_contents;
            } else if (strpos($contents, "?>") == true) {
                $search = "\$app->execute();";
                $replace = $freichatx_contents . $search;
            } else {
                return 'error';
            }
            $new_contents = str_replace($search, $replace, $contents);
            file_put_contents($handle, $new_contents);
        }
    }

    public function init() {

        $this->connectDB();
        $this->dropTables();
        $this->createTables();
        $this->argument();
        $output = $this->output();

        if ($_POST['driver'] == 'Sugarcrm') {
            $error = $this->install_in_sugar();

            if ($error == 'error') {
                $this->Sugarcrm_install_error = true;
            }
        }



        return $output;
    }

}

$install = new Install();
$info = $install->init();
session_destroy();
?>
<?php
require("head.php");
?>
<li><b><s>License</s></b></li>
<li><b><s>Install Type</s></b></li>
<li><b><s>Configuration Check</s></b></li>
<li><b><s>Configuration Details</s></b></li>
<li><b><u>Setup<u></b></li>
                <?php
                require("mid.php");
                ?>

                <script>
                    $(window).load(function(){

                        $('#content_manual').hide();
                    });

                    function maximize(option)
                    {
                        if(option == 'manual')
                        {
                            $('#content_module').slideUp();
                            $('#content_manual').slideDown();
                        }
                        else
                        {
                            $('#content_module').slideDown();
                            $('#content_manual').slideUp();
                        }
                    }


                </script>


                <?php
                $submit_url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                ?>

                <img height="1" width="1" src="http://evnix.com/image.php?site=<?php echo $submit_url; ?>"></a>
                <p><b>Step 1. Create Tables</b><br/><br/>Tables successfully created <br/></p>
                <h4>Please rename/remove 'installation' directory from ~/freichat folder for security reasons</h4>
                <p><b>Step 2. Adding the code</b>
                <p><b>NOTE:</b>Please do not forget to delete all FreiChatX code previously added,<br/>
                    during installations of 4.x versions.
                    <br/><br/>
                    <b>Also NOTE:</b> Modular and manual installation do the same thing , except that<br/>
                    with modules it is safe and easy . So enabling both will create multiple instances of <br/>
                    FreiChatX , so take care that you choose only one / disable other if you change your mind.
                </p>

                <span id="install_type"><hr/><b>Installation Type</b><br/><br/>
                    <span id ="modular"><a href="javascript:void(0)" onmousedown="maximize('module')"> <img src="images/max.jpeg"/></a>

                        Modular installation <b>**Recommended</b><br/><br/>
                        <span id="content_module">

<?php
if ($_POST['driver'] != "Sugarcrm") {
    echo "Download the below module for your appropriate CMS";
}
echo "<br/><br/>";


if ($_POST['driver'] == "Joomla" || $_POST['driver'] == "JCB" || $_POST['driver'] == "JSocial" || $_POST['driver'] == "CBE") {
    echo "<a href='http://code.google.com/p/freichatx-i/downloads/detail?name=mod_freichatx-i.zip&can=2&q=' target='_blank'>Download</a>";
} else if ($_POST['driver'] == "Drupal") {
    echo "<a href='http://code.google.com/p/freichatx-i/downloads/detail?name=freichatx-i.zip&can=2&q=' target='_blank'>Download</a>";
} else if ($_POST['driver'] == "WordPress") {
    echo "<a href='http://code.google.com/p/freichatx-i/downloads/detail?name=freichatx-i4WP.zip&can=2&q=' target='_blank'>Download</a>";
} else if ($_POST['driver'] == "Sugarcrm") {
    if ($install->Sugarcrm_install_error == true) {
        echo "SugarCRM failed to install automatically please go through the manual installation.";
    } else {
        echo "SugarCRM has been successfully installed !";
    }
} else {
    echo "The module has not yet been made for your driver.<br/>Please go through the manual installation.";
}
?>
                            <br/>
                        </span>
                    </span>
                    <br/>
                    <span id ="manual"><a href="javascript:void(0)" onmousedown="maximize('manual')"> <img src="images/max.jpeg"/></a>
                        Manual installation <b> **NOT Recommended</b><br/>
                        <span id ="content_manual">
<?php
if ($_POST['driver'] == "Phpbb") {
    echo "After adding the below code , you need to enable PHP in templates.<br/>You
can do that by going to the ACP in General tab -> Security setting -> Allow PHP in templates <br/>Set it to yes. <br/>
Dont forget to purge the cache in phpBB after changing this setting <br/>
";
} else if ($_POST['driver'] == "Sugarcrm" && $install->Sugarcrm_install_error == false) {
    echo "<br/>You do not have to go through this step since SugarCRM has already been installed . <br/>";
} else {
    echo "<br/>";
}
?>
                            <br/><br/>Add the following lines in your <br/>
                            <?php
                            echo $info['jsloc'];

                            if ($_POST['driver'] == "Sugarcrm") {
                                echo "Before close ?> PHP tag in index.php";
                            } else {
                                echo "in the header(before head tag)";
                            }
                            ?>

                            <p>
                                <textarea rows="8" cols="95" readonly="readonly"><?php echo $info['phpcode']; ?>
<?php echo $info['jscode']; ?>
                                    <?php echo $info['csscode']; ?>
                                </textarea></p>

                            <br/><br/>


                        </span>
                    </span>


                </span><hr/>

                <br/><p><b>Step 3. Go to edit freichat parameters</b><br/><br/>
                    <a href='../server/params.php' target="_blank">Click Me To Edit FreiChatX Parameters</a>

                <br/><br/><p><b>Step 4. Refresh Your website and check for changes</b><br/><br/>
                <br/><br/><p><br/>ThankYou for using FreiChatX<br/><br/>
<?php
require("foot.php");
?>
