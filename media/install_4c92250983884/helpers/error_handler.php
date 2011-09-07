<?php
// Direct Acess not allowed!
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');
// we will do our own error handling
error_reporting(0);

// user defined error handling function
function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars) 
{
    // timestamp for the error entry
    $dt = date("Y-m-d H:i:s (T)");
    $pageURI = $_SERVER['SERVER_NAME'];
    $pageURI .= $_SERVER["REQUEST_URI"];

    // define an assoc array of error string
    // in reality the only entries we should
    // consider are E_WARNING, E_NOTICE, E_USER_ERROR,
    // E_USER_WARNING and E_USER_NOTICE
    $errortype = array (
                E_ERROR              => 'Error',
                E_WARNING            => 'Warning',
                E_PARSE              => 'Parsing Error',
                E_NOTICE             => 'Notice',
                E_CORE_ERROR         => 'Core Error',
                E_CORE_WARNING       => 'Core Warning',
                E_COMPILE_ERROR      => 'Compile Error',
                E_COMPILE_WARNING    => 'Compile Warning',
                E_USER_ERROR         => 'User Error',
                E_USER_WARNING       => 'User Warning',
                E_USER_NOTICE        => 'User Notice',
                E_STRICT             => 'Runtime Notice',
                E_RECOVERABLE_ERROR  => 'Catchable Fatal Error'
                );
    // set of errors for which a var trace will be saved
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);//, E_ERROR, E_WARNING, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING, E_STRICT, E_RECOVERABLE_ERROR);
    
    $err = "<errorentry>\n";
    $err .= "\t<datetime>" . $dt . "</datetime>\n";
    $err .= "\t<server>" . $pageURI . "</server>\n";
    $err .= "\t<br/><errornum>" . $errno . "</errornum>\n";
    $err .= "\t<errortype>" . $errortype[$errno] . "</errortype>\n";
    $err .= "\t<errormsg>" . $errmsg . "</errormsg>\n";
    $err .= "\t<scriptname>" . $filename . "</scriptname>\n";
    $err .= "\t<scriptlinenum>" . $linenum . "</scriptlinenum>\n";

    if (in_array($errno, $user_errors)) {
        $err .= "\t<vartrace>" . wddx_serialize_value($vars, "Variables") . "</vartrace>\n";
    }
    $err .= "</errorentry><hr/>";
    
    // for testing
    // echo $err;
    $logfile = $_SERVER['DOCUMENT_ROOT']."/php_error.html";
    // echo "<hr/>$logfile";
    // save to the error log, and e-mail me if there is a critical user error
	if (file_exists($logfile)) {
    $activlogfile = file_get_contents($logfile);
    $exists = strpos($activlogfile,$errmsg);
    if (!$exists) {
      $activerror = strstr($filename, 'superactivity');
      if ($activerror) {
        /*if ($errortype[$errno]=='Notice')*/ 
        error_log($err, 3, $logfile);
        error_log($err, 1, "info@axxis.gr");
        if ($errno == E_USER_ERROR) {
            mail("info@axxis.gr", "Critical User Error", $err);
        }
      }
    }
  }
    $activerror = strstr($filename, 'superactivity');
    if ($activerror) echo "<small>$err</small>";
}

$old_error_handler = set_error_handler("userErrorHandler");

?>
