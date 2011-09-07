<?php

function info($path_host) {



    $info = array();
    $url = str_replace("installation/drivers", "", str_replace('\\', '/', dirname(__FILE__)));

    $info['jsloc'] = ' SugarCRM index.php file/';
    $info['phpcode'] = '


$freichatx_code_written = true;

function freichatx_get_hash(){

       if(is_file("freichat/arg.php")){

               require(\'freichat/arg.php\');
				if(isset($_SESSION[\'authenticated_user_id\']))
				{

				$temp_id=$_SESSION[\'authenticated_user_id\'].$uid;

				}
				else
				{
				$temp_id=\'0\'.$uid;
				}

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert(\'module freichatx says: arg.php file not
found!\');</script>";
       }

       return 0;
}

function freichatx_get_id()
{
	if(isset($_SESSION[\'authenticated_user_id\']))
	{
	 $id = $_SESSION[\'authenticated_user_id\'];
	}
	else
	{
	 $id = \'0\';
	}

 return $id;
}

$freichatx_html=ob_get_clean();
$html=\'<script type="text/javascript" language="javascipt" src="' . $path_host . 'freichat/client/main.php?id=\'.freichatx_get_id().\'&xhash=\'.freichatx_get_hash().\'"></script>
<link rel="stylesheet" href="' . $path_host . 'freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css"></head>\';
$freichatx_html=str_replace("</head>",$html,$freichatx_html);
echo $freichatx_html';
    ;
    $info['jscode'] = '';
    $info['csscode'] = '';


    return $info;
}
