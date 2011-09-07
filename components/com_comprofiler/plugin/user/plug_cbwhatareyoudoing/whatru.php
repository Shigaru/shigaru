<?php



/**

* Joomla Community Builder User Plugin: plug_cbwhatru

* @version 1.1

* @package plug_cbwhatru

* @subpackage whatru.php

* @author Chatura Dilan Perera

* @copyright (C) Chatura Dilan Perera

* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL

* @final 1.0

*/









/** ensure this file is being included by a parent file */

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


  
 //avoid the error in installation
  if(!strpos($_SERVER['PHP_SELF'],"administrator")){


require_once("components/com_comprofiler/plugin/user/plug_cbwhatareyoudoing/Sajax.php");

  

  function whatru($id ,$uname, $status, $defaulttext) {
     
      
      global $_CB_framework;
         if($id != $_CB_framework->myId()){
            return;
         }

         global $_CB_database;        

        
         
         $status = strip_tags($status);



         $htmlsatus =  $status;



         $status = mysql_escape_string($status);  
           

         if($status=="is"){



            $status= "";



         }        
        $query = "UPDATE #__comprofiler SET cb_rustatus = '$status', cb_rustatustime='".date("Y-m-d H:i:s")."' WHERE id='$id'";                



        $_CB_database->setQuery($query);



        if (!$_CB_database->query()) die($_CB_database->stderr(true));



        if($status == NULL or $status == ""){



              return '<h5 onclick="javascript:wrugetTextBox();">'.$defaulttext.'</h5>' ;



        }else{



             return '<h3 onclick="javascript:wrugetTextBox();">'.$uname.' '.stripslashes($htmlsatus) .'</h3>' ;



        }



    } 

	

    sajax_init(); 



    //$sajax_debug_mode = 1;



    sajax_export("whatru");



    sajax_handle_client_request();



 echo '<script language="JavaScript" charset="utf-8">';

 sajax_show_javascript(); 

?>
  

	function do_save(status) {



        document.getElementById('whatrudiv2').innerHTML = status;



    }



    function wrugetTextBox() {



        document.getElementById("whatrudiv2").style.display = 'none'; 

        document.getElementById("whatrudiv1").style.display = ''; 

    }



    function wrusaveStatus(id, uname, defaulttext){

        var status;

        document.getElementById("whatrudiv1").style.display = 'none';

        document.getElementById("whatrudiv2").style.display = '';

        status = document.getElementById("statusText").value; 
        
        //uncomment  the line below to enable utf8 encoding, you also need to adjust the field length of cb_rustatus in comprofiler table of your joomla database because it is limited to 255 characters
        //status = convertChar2CP(status);
               
        x_whatru(id, uname, status, defaulttext, do_save);         

    }       



    function wruclearStatus(id, uname, defaulttext){

        var status;

        document.getElementById("whatrudiv1").style.display = 'none';

        document.getElementById("whatrudiv2").style.display = '';       

        document.getElementById("statusText").value = 'is';

        status = document.getElementById("statusText").value;
       
        x_whatru(id, uname, status, defaulttext, do_save);

    }
    
    
    
  function convertCP2DecNCR ( textString ) {
  var outputString = "";
  textString = textString.replace(/^\s+/, '');
  if (textString.length == 0) { return ""; }
  textString = textString.replace(/\s+/g, ' ');
  var listArray = textString.split(' ');
  for ( var i = 0; i < listArray.length; i++ ) {
    var n = parseInt(listArray[i], 16);
    outputString += ('&#' + n + ';');
  }
  return( outputString );
  }
  
  function convertChar2CP ( textString ) { 
    var haut = 0;
    var n = 0;
    CPstring = '';
    for (var i = 0; i < textString.length; i++) {
        var b = textString.charCodeAt(i); 
        if (b < 0 || b > 0xFFFF) {
            CPstring += 'Error ' + dec2hex(b) + '!';
        }
        if (haut != 0) {
            if (0xDC00 <= b && b <= 0xDFFF) {
                CPstring += dec2hex(0x10000 + ((haut - 0xD800) << 10) + (b - 0xDC00)) + ' ';
                haut = 0;
                continue;
            }else {
                CPstring += '!erreur ' + dec2hex(haut) + '!';
                haut = 0;
            }
        }
        if (0xD800 <= b && b <= 0xDBFF) {
            haut = b;
        }
        else {
            CPstring += dec2hex(b) + ' ';
        }
    }
        CPstring = CPstring.substring(0, CPstring.length-1);
    
        return convertCP2DecNCR(CPstring) ;   
  }
  
  function dec2hex ( textString ) {
 return (textString+0).toString(16).toUpperCase();
 }
   
  
  
  

    
    

</script>

<link rel="stylesheet" type="text/css" href="components/com_comprofiler/plugin/user/plug_cbwhatareyoudoing/whatru.css">

<?php 
  }

class getWhatruTab extends cbTabHandler {



	/**

	 * Construnctor

	 */

	function getWhatruTab() {

		$this->cbTabHandler();

	}



	function getDisplayTab($tab,$user,$ui) {       

        $params = $this->params;        

        $defaulttext = $params->get('wrutext', "");

		

		global $_CB_framework;



        $return = null; 



        if($user->username == $_CB_framework->myUsername()){



	    			$return .= "\t\t<div class=\"whatru\">";



                    $return .='<div id="whatrudiv2" style="border:none;">';



                    



					if($user->cb_rustatus == NULL || $user->cb_rustatus == ''){                    



                        $return .='<h5 onclick="javascript:wrugetTextBox();">'.$defaulttext.'</h5>';



                        $return .='</div>'; 



                        $return .='<div id="whatrudiv1" style="display:none;border:none;">';



                        $return .='<h3>'.$user->username.' <input type="text" name="statusText" size="'.$params->get('wrutextboxsize', "").'" maxlength="'.$params->get('wrutextboxmax', "").'" id="statusText" value="is"/>';



                    



                    }else{                    



                    



                    $return .='<h3 style="display:inline;" onclick="javascript:wrugetTextBox();">'.$user->username. ' ' .stripslashes($user->cb_rustatus). '</h3><h5 style="display:inline;"> - '.getWhatruTab::dateTimeDiff($user->cb_rustatustime).'</h5>';



                    $return .='</div>'; 



                    $return .='<div id="whatrudiv1" style="display:none;border:none;">';



                    $return .='<h3>'.$user->username.' <input type="text" name="statusText" size="'.$params->get('wrutextboxsize', "").'" maxlength="'.$params->get('wrutextboxmax', "").'" id="statusText" value="' .stripslashes($user->cb_rustatus).'"/>';                                      



                    



                    }

					$return .='<input onclick="javascript:wrusaveStatus(\''.$user->id.'\', \''.$user->username.'\' , \''.$defaulttext.'\');" type="button" value="'.$params->get('wrutextgo', "").'"/><input onclick="javascript:wruclearStatus(\''.$user->id.'\', \''.$user->username.'\', \''.$defaulttext.'\');" type="button" value="'.$params->get('wrutextclear', "").'"/></h3>';    

                    $return .='</div>';

					

					

			$return .="</div>\n";  







        }else{



            



            if($user->cb_rustatus == NULL || $user->cb_rustatus == ''){                   



           



                    



            }else{                  







            $return .='<div id="whatrudiv2" style="border:none;">';



            $return .='<div id="whatrudiv2" style="border:none;">'; 



            $return .='<h3>'.$user->username. ' ' .stripslashes($user->cb_rustatus). '</h3><h5> - '.getWhatruTab::dateTimeDiff($user->cb_rustatustime).'</h5>';



            $return .='</div>';



            $return .="</div>\n";                       



                    



            }



        



        }		















		return $return;















	} // end of function 



   //date time diffrence function by chatura dilan 
   function dateTimeDiff($database_date){
    $current_date = date("Y-m-d H:i:s");     
    
    $d_year = substr($database_date,0,4);
    $d_month = substr($database_date,5,2);
    $d_day = substr($database_date,8,2);
    
    $c_year = substr($current_date,0,4);
    $c_month = substr($current_date,5,2);
    $c_day = substr($current_date,8,2);
    
    $d_diff = $d_year . "-" . $d_month . "-" . $d_day;     
    $c_diff = $c_year . "-" . $c_month . "-" . $c_day;
    
    $date_diff = abs(strtotime($c_diff) - strtotime($d_diff));
    $date_diff = round(((($date_diff/60)/60)/24), 0);
    
    
    if($date_diff == 0){
        
          $d_hour = substr($database_date,11,2);
          $d_min = substr($database_date,14,2);          
        
          $c_hour = substr($current_date,11,2);
          $c_min = substr($current_date,14,2);          
        
          $all_min_diff = (($c_hour * 60) +  $c_min) -  (($d_hour * 60) +  $d_min);
          $min_diff = $all_min_diff % 60;
          $hour_diff =  abs(($all_min_diff - $min_diff) / 60);
          
          if($hour_diff == 0){
                if($min_diff == 0){
                     return "now";
                }else if($min_diff == 1){
                     return $min_diff . " minute ago";
                }else{               
                     return $min_diff . " minutes ago";
                }   
          }else if($hour_diff == 1){
              if($min_diff == 0){
                     return $hour_diff . " hour ago";
                }else if($min_diff == 1){
                     return $hour_diff . " hour and " . $min_diff . " minute ago";
                }else{               
                     return $hour_diff . " hour and " . $min_diff . " minutes ago";
                }            
          }else{
              if($min_diff == 0){
                     return $hour_diff . " hours ago";
                }else if($min_diff == 1){
                     return $hour_diff . " hours and " . $min_diff . " minute ago";
                }else{               
                     return $hour_diff . " hours and " . $min_diff . " minutes ago";
                }               
          }      
           
    
    }else if($date_diff == 1){
        return $date_diff . " day ago";
    }else{
        return $date_diff . " days ago";
    }
}


    



    



    



 











} // end of class















?>

