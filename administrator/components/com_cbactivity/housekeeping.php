<?php
$db	=& JFactory::getDBO();

if (isset($_POST['months'])) 
{
  //fix date
  $months = $_POST['months'];
  $date = date("Y-m-d H:i:s");
  $date = strtotime(date("Y-m-d H:i:s", strtotime($date)) . " -".$months." month");
  $date = date("Y-m-d H:i:s", $date);
  
  echo "Date is: $date";
  $db->setQuery("DELETE FROM #__supera_log WHERE actidate < '$date'");
  if ($db->Query()) {
    echo '<html><head><title>-</title></head><body>';
    echo '<script language="JavaScript" type="text/javascript">'."\n";
    echo 'var parDoc = window.parent.document;';
    echo 'parDoc.getElementById("housekeeping").innerHTML = "House Keeping Performed. Records deleted.";';
    echo "\n".'</script></body></html>';
  }
  exit; // dont go further
}

?>
<b>House-Keeping</b>: How many months you want to keep in your records? Keep last 
<form name="commentform" action="<?=$PHP_SELF?>" target="upload_iframe" method="post" style="display:inline;">
  <input type="text" name="months" /> months in the activity log. <input type="submit" value="Perform Housekeeping" />
</form><div id="housekeeping" style="display:inline;"></div><hr />
<iframe name="upload_iframe" style="width: 800px; height: 100px; display: none;">
</iframe>
