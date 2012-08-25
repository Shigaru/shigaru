<?php
  $myid = $_GET['myid'];
  
$p = getcwd();
$p = str_replace('/components/com_comprofiler/plugin/user/plug_cbonyourmind','',$p);
include_once $p."/configuration.php";

  $config = new JConfig;
  
  $host = $config->host;
  $user = $config->user;
  $password = $config->password;
  $dblink = $config->db;
  $dbpre = $config->dbprefix;
  
  $link = mysql_connect($host, $user, $password);
  mysql_select_db($dblink, $link);
  mysql_query("SET NAMES 'utf8'");

$date = date("Y-m-d H:i:s", time());

    $dbQuery = "UPDATE `".$dbpre."onyourmind` SET `mind`='_gr_cleared_' WHERE `id`=$myid";
    $result = mysql_query($dbQuery, $link);
    echo "-1";
?>