<?php
if (!isset($_SESSION['phplogin'])
        || $_SESSION['phplogin'] !== true) {
    header('Location: ../administrator/index.php'); //Replace that if login.php is somewhere else
    exit;
}

require "../arg.php";
/* * ***************************************************************************************** */

class param {

    public function __construct() {

        require("../arg.php");
        $this->argpath = "../arg.php";
        $this->configpath = "../config.dat";
        $this->themepath = '../client/jquery/freichat_themes/';
        $this->langpath = '../lang/';
        $this->themeray = $this->langray = array();
        $this->driver = $driver;
    }

//--------------------------------------------------------------------------------------------

    public function create_file() {
        //$handle = fopen($this->configpath,'w');
//var_dump($_POST);
        $parameters = unserialize(file_get_contents($this->configpath));

        $parameters["show_name"] = $_POST['show_name'];

        if ($this->driver == "JCB" || $this->driver == "CBE" || $this->driver == "JSocial" || $this->driver == "Joomla") {
            $parameters["displayname"] = $_POST['displayname'];
        }
        $parameters["show_module"] = "visible";
        $parameters["chatspeed"] = $_POST['chatspeed'];
        $parameters["fxval"] = $_POST['fxval'];
        $parameters["draggable"] = $_POST['draggable'];
        $parameters["conflict"] = $_POST['conflict'];
        $parameters["msgSendSpeed"] = $_POST['msgSendSpeed'];
        $parameters["show_avatar"] = $_POST['show_avatar'];
        $parameters["debug"] = $_POST['debug'];
        $parameters["freichat_theme"] = $_POST['freichat_theme'];
        $parameters["lang"] = $_POST['lang'];
        $parameters["load"] = $_POST['load'];
        $parameters["time"] = $_POST['time'];
        $parameters["JSdebug"] = $_POST['JSdebug'];
        $parameters["playsound"] = $_POST['playsound'];
        $parameters["busy_timeOut"] = $_POST['busy_timeOut'];
        $parameters["offline_timeOut"] = $_POST['offline_timeOut'];

        file_put_contents($this->configpath, serialize($parameters));
        /**/
    }

//--------------------------------------------------------------------------------------------
    public function default_param($name, $given_value) {
        //require $this->configpath;
        $parameters = unserialize(file_get_contents($this->configpath));
//echo $parameters[$name] ." == ". $given_value."<br/>";
        if ($parameters[$name] == $given_value) {
            echo "selected";
        } else {
            // echo 'selected';
        }
    }

    public function default_value($name, $dim=1) {
        //require $this->configpath;
        $parameters = unserialize(file_get_contents($this->configpath));

        if ($dim == 1) {
            return $parameters[$name];
        } else if ($dim == 2) {
            return $parameters[$name[0]][$name[1]];
        } else if ($dim == 3) {
            return $parameters[$name[0]][$name[1]][$name[2]];
        } else {
            echo "Out of bounds!";
        }
    }

//--------------------------------------------------------------------------------------------
}

/* * ***************************************************************************************** */
//require_once 'admin_files/paramclass.php';

$param = new param();
if (isset($_POST['draggable']) == true) {
    $param->create_file();
}
?>

<form name="params" action='<?php $_SERVER['PHP_SELF']; ?>' method="POST">
    <input id="paramsubmit1" type="submit" value="SUBMIT">
    <br/><br/>
    <div class="parameters">

        <div id="tabs">
            <ul>
                <li><a href="#client">Client side parameters</a></li>
                <li><a href="#server">Server side parameters</a></li>
                <!--<li><a href="#added">Plugins parameters</a></li>-->
                <li><a href="#account">Additional parameters</a></li>
            </ul>
            <!-- First TAB -->
            <div id="client">


                <ol id ="parametejrs" style="list-style-type: upper-roman;">
                    <li>
                        <p>Show Guests or Resgistered Users</p><br/>
                        <select name="show_name">
                            <option value="guest"<?php $param->default_param("show_name", "guest"); ?>>Guests</option>
                            <option value="user"<?php $param->default_param("show_name", "user"); ?>>Users</option>

                            <?php
                            if ($driver == "JCB" || $driver == "CBE" || $driver == "JSocial") {
                                echo '<option value=' . "buddy ";
                                $param->default_param("show_name", "buddy");
                                echo">Buddies</option>";
                            }
                            ?>

                        </select>
                        <br/><br/><hr/>
                    </li>

                    <li>
                        <p>Show Avatar</p><br/>
                        <select name="show_avatar">
                            <option value="block"<?php $param->default_param("show_avatar", "block"); ?>>Yes</option>
                            <option value="none"<?php $param->default_param("show_avatar", "none"); ?>>No</option>
                        </select>
                        <br/><br/><hr/>
                    </li>

                    <?php
                    if ($driver == "JCB" || $driver == "CBE" || $driver == "JSocial" || $driver == "Joomla") {
                        echo '<li><p>Show Username or Nickname(name)</p><br/><select name="displayname">';
                        echo '<option value=' . "username ";
                        $param->default_param("displayname", "username");
                        echo">username</option>";
                        echo '<option value=' . "name ";
                        $param->default_param("displayname", "name");
                        echo">nickname</option>";
                        echo '</select><br/><br/><hr/></li>';
                    }
                    ?>

                    <li>
                        <p>Select a theme for the chat</p><br/>
                        <select name="freichat_theme">
                            <?php
                            if ($handle = opendir('../client/jquery/freichat_themes/')) {
                                while (false !== ($file = readdir($handle))) {
                                    if ($file != "." && $file != ".." && $file != '.svn' && is_dir('../client/jquery/freichat_themes/' . $file)) {


                                        echo '<option value=' . "$file ";
                                        $param->default_param("freichat_theme", $file);
                                        echo">$file</option>";
                                    }
                                }
                                closedir($handle);
                            } else {
                                echo 'directory open failed';
                            }
                            ?>
                        </select>
                        <br/><br/><hr/>
                    </li>


                    <li>
                        <p>Draggable chatwindows feature should be </p>
                        <select name="draggable">
                            <option value="enable"<?php $param->default_param("draggable", "enable"); ?>>Enabled</option>
                            <option value="disable"<?php $param->default_param("draggable", "disable"); ?>>Disabled</option>
                        </select>
                        <br/><br/><hr/>
                    </li>

                    <li>
                        <p>ChatBox on load should be</p>
                        <select name="load">
                            <option value="show"<?php $param->default_param("load", "show"); ?>>Maximized</option>
                            <option value="hide"<?php $param->default_param("load", "hide"); ?>>Minimized</option>
                        </select><br/><br/><hr/>
                    </li>

                    <li>
                        <p>Remove Jquery Conflicts <span onmousedown="helpme1()"><img src="<?php echo '../client/jquery/img/about.jpeg' ?>" alt="About"/></a></span></p>
                        <select name="conflict">
                            <option value="true"<?php $param->default_param("conflict", "true"); ?>>Yes</option>
                            <option value=""<?php $param->default_param("conflict", ""); ?>>No</option>
                        </select><br/><br/>
                    </li>

                    <li>
                        <p>Show Jquery Animations</p><br/>
                        <select name="fxval">
                            <option value="true"<?php $param->default_param("fxval", "true"); ?>>Yes</option>
                            <option value="false"<?php $param->default_param("fxval", "false"); ?>>No</option>
                        </select>
                        <br/><br/>
                    </li>

                    <li>
                        <p>Play sound on new message </p><br/>
                        <select name="playsound">
                            <option value="true"<?php $param->default_param("playsound", "true"); ?>>Yes</option>
                            <option value="false"<?php $param->default_param("playsound", "false"); ?>>No</option>
                        </select>
                        <br/><br/>
                    </li>

                </ol>

            </div>

            <!-- Second TAB -->
            <div id="server">
                <ol  style="list-style-type: upper-roman;">
                    <li>
                        <p>Save Message History For</p><br/>
                        <select name="time">
                            <option value="600"<?php $param->default_param("time", "600"); ?>>10 Minutes</option>
                            <option value="3600"<?php $param->default_param("time", "3600"); ?>>1 Hour</option>
                            <option value="36000"<?php $param->default_param("time", "36000"); ?>>10 Hours</option>
                            <option value="86400"<?php $param->default_param("time", "86400"); ?>>1 Day</option>
                        </select>
                        <br/><br/><hr/>
                    </li>
                    <li>
                        <p>Change Chat Speed to</p><br/>
                        <select name="chatspeed">
                            <option value="7000"<?php $param->default_param("chatspeed", "7000"); ?>>Slow</option>
                            <option value="5000"<?php $param->default_param("chatspeed", "5000"); ?>>Normal</option>
                            <option value="3000"<?php $param->default_param("chatspeed", "3000"); ?>>Fast</option>
                            <option value="1000"<?php $param->default_param("chatspeed", "1000"); ?>>SuperFast</option>
                        </select><br/><br/>
                        Note:<br/>
                        1. Normal speed recommended for users using free webhosting service.<br/>
                        2. Fast speed can be used by users using any paid webhosting service.<br/>
                        3. SuperFast speed should be used by users at their own risk and needs.<br/>
                        <br/><br/><hr/>
                    </li>

                    <li>
                        <p>Choose any Language</p><br/>
                        <select name="lang">
                            <?php
                            if ($handle = opendir('../lang/')) {
                                while (false !== ($file = readdir($handle))) {
                                    if ($file != "." && $file != ".." && $file != '.svn') {
                                        $file_name = str_replace(".php", "", $file);
                                        echo '<option value=' . "$file_name ";
                                        $param->default_param("lang", $file_name);
                                        echo">$file_name</option>";
                                    }
                                }
                                closedir($handle);
                            } else {
                                echo 'directory open failed';
                            }
                            ?>
                        </select>
                    </li>

                    <li><hr/>
                        <p>Time interval between messages</p><br/>
                        <select name="msgSendSpeed">
                            <option value="500"<?php $param->default_param("msgSendSpeed", "500"); ?>>0.5 second</option>
                            <option value="1000"<?php $param->default_param("msgSendSpeed", "1000"); ?>>1 seconds</option>
                            <option value="1500"<?php $param->default_param("msgSendSpeed", "1500"); ?>>1.5 seconds</option>
                            <option value="2000"<?php $param->default_param("msgSendSpeed", "2000"); ?>>2 seconds</option>
                        </select><br/><br/>
                        Note:<br/>
                        1. This is the time FreiChatX will wait between two requests (messages sent)<br/>
                        2. Increase the time interval if you want to reduce server resource usage<br/>
                        3. 1 second is the default time interval.Do not reduce it further if you <br/>dont
                        know what you are doing.<br/>
                        <br/><br/><hr/>
                    </li>

                </ol>
            </div>

            <!-- Third TAB -->



            <!-- Fourth TAB -->
            <div id ="account">
                <ol style="list-style-type: upper-roman;">
                    <!--<li>
                       Change FreiChatX administrator password<br/><br/>

                       A . Enter your old password<br/>
                       <input type="password" name="adminpassold1"/>
                       <br/>
                       B . Enter your old password again<br/>
                       <input type="password" name="adminpassold2"/>
                       <br/>
                       <br/>
                       C. Enter your new password <br/>
                       <input type ="password" name="adminpassnew"/>
                   </li>-->

                    <li>
                        Busy time out<br/><br/>
                        User status will be changed to busy after <br/>

                        <input name="busy_timeOut" value="<?php echo $param->default_value('busy_timeOut'); ?>" type="text"> seconds
                        <br/><br/><hr/>
                    </li>

                    <li>
                        Offline time out<br/><br/>
                        User status will be changed to offline after <br/>

                        <input name="offline_timeOut" value="<?php echo $param->default_value('offline_timeOut'); ?>" type="text"> seconds
                        <br/><br/><hr/>
                    </li>

                    <li>
                        <p>PHP debugging</p><br/>
                        <select name="debug">
                            <option value="true"<?php $param->default_param("debug", "true"); ?>>Yes</option>
                            <option value="false"<?php $param->default_param("debug", "false"); ?>>No</option>
                        </select>
                        <br/><br/>
                    </li>

                    <li>
                        <p>JavaScript debugging</p><br/>
                        <select name="JSdebug">
                            <option value="true"<?php $param->default_param("JSdebug", "true"); ?>>Yes</option>
                            <option value="false"<?php $param->default_param("JSdebug", "false"); ?>>No</option>
                        </select>
                        <br/><br/>
                    </li>

                </ol>
            </div>
        </div>

    </div>


    <br/>

    <input id="paramsubmit2" type="submit" value="SUBMIT">
</form>
