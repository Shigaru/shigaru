<?php

function info($path_host) {
    $info = array();
    $url = str_replace("installation/drivers", "", str_replace('\\', '/', dirname(__FILE__)));


    $info['jsloc'] = 'page.tpl.php in themes/your_default_template/';
    $info['phpcode'] = '<!--==========================FreiChatX====VERSIONS====5.X====START========================-->
<!--	For uninstalling ME , first remove/comment all FreiChatX related code i.e below code
	 Then remove FreiChatX tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php

 $ses=$user->uid;
if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("' . $url . 'arg.php")){

               require "' . $url . 'arg.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert(\'module freichatx says: arg.php file not
found!\');</script>";
       }

       return 0;
}
}
?>
';
    $info['jscode'] = '<script type="text/javascript" language="javascipt"
src="' . $path_host . 'client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>">
</script>';
    $info['csscode'] = '<link rel="stylesheet" href="' . $path_host . 'client/jquery/freichat_themes/freichatcss.php" type="text/css">
<!-- NOTE:: The copypaste code differs from 4.X  to  5.X and may differ for further versions-->
<!--  	    So to be at a safer side always replace the entire FreiChatX code during installation-->
<!--===========================FreiChatX====VERSIONS====5.X====END=========================-->';
    $info['html_loc'] = 'Please Add the following line in the same file in the body(before </body> tag or directly after <body>)';

    return $info;
}

//Except for Elgg users: Add it in footer.php in views/default/page_elements/