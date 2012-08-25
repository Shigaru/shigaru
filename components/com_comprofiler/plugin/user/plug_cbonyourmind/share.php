<?php
include("config.php");

  $mind = rawurldecode($_GET['mind']);
  $myid = $_GET['myid'];
  
$date = date("Y-m-d H:i:s", time());

    $dbQuery = "INSERT INTO ".$dbpre."onyourmind (`userid`,`mind`,`date`) VALUES ($myid, '$mind', '$date')";
    $result = mysql_query($dbQuery, $link);
    echo mysql_insert_id();
?>