<?php
session_start();

/* Make me sure */

if (!isset($_SESSION['FREIX']) || $_SESSION['FREIX'] != 'authenticated') {
    header("Location:index.php");
    exit;
}

/* Now i am secure */

class Configure {

    public function __construct() {
        
    }

    public function sugar_conf() {
        require_once $_SESSION['config_path'];

        $conf[0] = $sugar_config['dbconfig']['db_host_name'];
        $conf[1] = $sugar_config['dbconfig']['db_user_name'];
        $conf[2] = $sugar_config['dbconfig']['db_password'];
        $conf[3] = $sugar_config['dbconfig']['db_name'];
        $conf[4] = null;

        return $conf;
    }

    public function joomla_conf() {
        require_once $_SESSION['config_path'];

        $Config = new JConfig();

        $conf[0] = $Config->host;
        $conf[1] = $Config->user;
        $conf[2] = $Config->password;
        $conf[3] = $Config->db;
        $conf[4] = $Config->dbprefix;

        return $conf;
    }

    public function __conf($file, $identifiers, $variables) {
        $str = @file_get_contents($file);
        if ($str === false) { //invalid filename
            return false;
        }

        $tokens = token_get_all($str); //tokenize
        $valid_file = true;

        if ($identifiers == null) {
            $valid_identifiers = array();
        } else {
            $valid_identifiers = $identifiers;
        }
        if ($variables == null) {
            $valid_variables = array();
        } else {
            $valid_variables = $variables;
        }

        $nextIsValue = false;
        $values = array(); //the resultant array
        $previous_index = ''; //the index name

        foreach ($tokens as $token) {
            if ($token[0] == 366 || $token[0] == 365 || $token[0] == 370) //we dont need comments and whitespaces
                continue;


            $tn = token_name((int) $token[0]);



            if (isset($token[1])) {
                $token[1] = str_replace("'", "", $token[1]);
            }

            if (isset($token[1]) &&
                    ($tn == 'T_CONSTANT_ENCAPSED_STRING' && in_array($token[1], $valid_identifiers) || //If encapsed in string
                    $tn == 'T_VARIABLE' && in_array($token[1], $valid_variables) )) {      //OR If variable		
                $nextIsValue = true;
                $previous_index = $token[1];
            } else if ($tn == 'T_CONSTANT_ENCAPSED_STRING' && $nextIsValue == true) {
                $nextIsValue = false;
                $values[str_replace("'", "", $previous_index)] = str_replace("'", "", $token[1]);
            }
        }

        if ($valid_file === false) {
            return false;
        }

        return $values;
    }

    public function drupal_conf($file, $identifiers, $variables) {
        $drupal6 = $drupal7 = false;
        $drupal6_identity = "\$db_url";
        $drupal7_identity = "\$databases";

        $str = @file_get_contents($file);
        if ($str === false) { //invalid filename
            return false;
        }

        $drupal7_array = array("host", "username", "password", "database", "prefix",);

        if (strpos($str, $drupal6_identity) == TRUE) { //just to see whether the file is valid drupal7 file.
            $this->array_indices = $identifiers = array("db_host", "db_user", "db_password", "db_name", "\$db_prefix",);
            $drupal6 = true;
        } else if (strpos($str, $drupal7_identity) == TRUE) {
            $this->array_indices = $drupal7_array;
            $drupal7 = true;
        } else {
            return false;
        }


        if ($drupal7 == true) {
            $values = $this->__conf($file, $drupal7_array, null);
        } else {
            $values = $this->__conf($file, null, $variables);

            $str = $values[$variables[0]];

            $value_part = array();
            $pieces = array();

            $value_part[$identifiers[4]] = $values[$variables[1]];
            $pieces = explode("://", $str);

            if (strpos($pieces[1], ":") == TRUE) {
                $pieces = explode(":", $pieces[1]);
                $value_part[$identifiers[1]] = $pieces[0];
                $pieces = explode("@", $pieces[1]);
                $value_part[$identifiers[2]] = $pieces[0];
            } else {
                $pieces = explode("@", $pieces[1]);
                $value_part[$identifiers[1]] = $pieces[0];
                $value_part[$identifiers[2]] = null;
            }
            $pieces = explode("/", $pieces[1]);
            $value_part[$identifiers[0]] = $pieces[0];
            $value_part[$identifiers[3]] = $pieces[1];


            $values = $value_part;
        }
        return $values;
    }

    public function phpbb_conf($params) {
        $i = 0;
        $path = $_SESSION['config_path'];

        if (!is_readable($path)) {
            return null;
        }

        $contents = file_get_contents($path, true);

        foreach ($params as $param) {

            $pattern1 = "/\b" . $param . "\b.*;/";
            $pattern2 = "/'.*'/";

            preg_match($pattern1, $contents, $match);
            preg_match($pattern2, $match[0], $mat);
            $final[$i] = str_replace("'", "", $mat[0]);
            $i++;
        }

        return $final;
    }

    public function elgg_conf() {
        require_once $_SESSION['config_path'];

        global $CONFIG;

        if (!isset($CONFIG)) {
            echo "<p><font color='blue'>Unable to retrieve database information from Elgg</font></p>";
        }

        $conf[0] = $CONFIG->dbhost;
        $conf[1] = $CONFIG->dbuser;
        $conf[2] = $CONFIG->dbpass;
        $conf[3] = $CONFIG->dbname;
        $conf[4] = $CONFIG->dbprefix;

        return $conf;
    }

    public function getCONF() {
        if ($_SESSION['cms'] == "Joomla" || $_SESSION['cms'] == "JCB" || $_SESSION['cms'] == "JSocial" || $_SESSION['cms'] == "CBE") {
            $this->array_indices = array(0, 1, 2, 3, 4);
            $conf = $this->joomla_conf();
        } else if ($_SESSION['cms'] == "Phpbb") {
            $this->array_indices = array(0, 1, 2, 3, 4);
            $conf = $this->phpbb_conf(array("dbhost", "dbuser", "dbpasswd", "dbname", "table_prefix"));
        } else if ($_SESSION['cms'] == "WordPress") {
            $this->array_indices = array("DB_HOST", "DB_USER", "DB_PASSWORD", "DB_NAME", "\$table_prefix");
            $varnames = array("\$table_prefix");
            $conf = $this->__conf($_SESSION['config_path'], $this->array_indices, $varnames);
        } else if ($_SESSION['cms'] == "Drupal") {
            $varnames = array("\$db_url", "\$db_prefix");
            $conf = $this->drupal_conf($_SESSION['config_path'], null, $varnames);
        } else if ($_SESSION['cms'] == 'Elgg') {
            $this->array_indices = array(0, 1, 2, 3, 4);
            $conf = $this->elgg_conf();
        } else if ($_SESSION['cms'] == "Sugarcrm") {
            $this->array_indices = array(0, 1, 2, 3, 4);
            $conf = $this->sugar_conf();
        } else {
            $this->array_indices = array(0, 1, 2, 3, 4);
            $conf = null;
        }

        return $conf;
    }

    public function run_me() {
        $conf = $this->getCONF();
        return $conf;
    }

}

$configure = new Configure();
$conf = $configure->run_me();
?>
<?php
require("head.php");
?>
<li><b><s>License</s></b></li>
<li><b><s>Install Type</s></b></li>
<li><b><s>Configuration Check</s></b></li>
<li><b><u>Configuration Details</u></b></li>
<li>Setup</li>
<?php
require("mid.php");
?>
<div id='Finfo'>
    <br/>
    <p> Please check wheteher the following values are correct and please correct if they are wrong before moving on to the next step</p>
    <form name="input" action="install.php" method="POST">
        <p>
            <br/>
        <table border="1">	 

            <th>Configuration</th>

            <tr>
                <td>Your HostName :</td>
                <td><input name="host" size="50px" type="text" value=<?php echo $conf[$configure->array_indices[0]]; ?>></input></td>
            </tr>

            <tr>
                <td>Your MySql Username :</td>
                <td><input name="muser" size="50px" type="text" value=<?php echo $conf[$configure->array_indices[1]]; ?>></input></td>
            </tr>

            <tr>
                <td>Your MySql Password :</td>
                <td><input name="mpass" size="50px" type="text" value=<?php echo $conf[$configure->array_indices[2]]; ?>></input></td>
            </tr>

            <tr>
                <td>Your MySql Database Name :</td>
                <td><input name="dbname" size="50px" type="text" value=<?php echo $conf[$configure->array_indices[3]]; ?>></input></td>
            </tr>

            <tr>
                <td>Your MySql Database Table Prefix :</td>
                <td><input name="dbprefix" size="50px" type="text" value=<?php echo $conf[$configure->array_indices[4]]; ?>></input></td>
            </tr>

            <tr>
                <td>Your Current CMS sytem :</td>
                <td><input name="driver" size="50px" type="text" value=<?php echo $_SESSION['cms']; ?>></input></td>
            </tr>

            <tr>
                <td>Choose a password for freichat admin :</td>
                <td><input name="adminpass" size="50px" type="text" value="adminpass"></input></td>
            </tr> 


        </table>

        <input name="freichat_to_path" size="50px" type="hidden" value="freichat"></input>

        </p>
        <input type="submit" value="Submit" />
    </form>
</div>

<?php
require("foot.php");
?>
