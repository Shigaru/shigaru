<?php
defined('_JEXEC') or die ('Direct Access is not allowed');

$host = JURI::root();


$document = &JFactory::getDocument();

$session = JSession::getInstance("none",array());
$ses=$session->getId();

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file(JPATH_SITE."/freichat/arg.php")){

               require(JPATH_SITE.'/freichat/arg.php');

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: arg.php file not
found!');</script>";
       }

       return 0;
}
}
$document->addScript($host.'freichat/client/main.php?id='.$ses.'&xhash='.freichatx_get_hash($ses));
$document->addStyleSheet($host.'freichat/client/jquery/freichat_themes/freichatcss.php');
?>
