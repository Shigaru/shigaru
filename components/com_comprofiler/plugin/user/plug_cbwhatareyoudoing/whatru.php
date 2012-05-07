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
            return;
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
 echo '<script language="JavaScript" charset="utf-8">';
 echo 'var _whatruurl="'.cbSef($_SERVER["REQUEST_URI"]).'"';
?>
  
	function do_save(status) {
        document.getElementById('whatrudiv2').innerHTML = status;
    }
    jQuery(document).ready(function() {
			jQuery('#whatrudiv1 input[name=statusText]').keypress(function(e)
			{
				code= (e.keyCode ? e.keyCode : e.which);
				if (code == 13){
						shigaruAjax(_whatruurl,'div.whatru',null, null,true,false)
					}
				e.preventDefault();
			});
		});
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
						$return .='</div>'; 
						$return .='<div id="whatrudiv1">';
						$return .=' <input type="text" name="statusText" maxlength="'.$params->get('wrutextboxmax', "").'" id="statusText" placeholder="' ._UE_ONYOURMIND.'"/>';                                      
						
                    }else{                    
                    
                    $return .='</div>'; 
                    $return .='<div id="whatrudiv1">';
                    $return .=' <input type="text" name="statusText" maxlength="'.$params->get('wrutextboxmax', "").'" id="statusText" placeholder="' ._UE_ONYOURMIND.'"/>';                                      
                    $return .='<div id="lastupdated"><span>'._UE_LASTSTATUSUPDATE. ': <i>' .stripslashes($user->cb_rustatus). '</i></span><span> - '.getWhatruTab::dateTimeDiff($user->cb_rustatustime).'</span></div>';
                    }
					//$return .='<input onclick="javascript:wrusaveStatus(\''.$user->id.'\', \''.$user->username.'\' , \''.$defaulttext.'\');" type="button" value="'.$params->get('wrutextgo', "").'"/><input onclick="javascript:wruclearStatus(\''.$user->id.'\', \''.$user->username.'\', \''.$defaulttext.'\');" type="button" value="'.$params->get('wrutextclear', "").'"/></h3>';    
                    $return .='</div>';
			$return .="</div>\n";  
        }else{
            if($user->cb_rustatus == NULL || $user->cb_rustatus == ''){                   
            }else{                  
				$return .='<div id="whatrudiv2" style="border:none;">'; 
				$return .='<div id="withoutMusic"><span id="lastupdated">'._UE_LASTSTATUSUPDATE. ':</span>
					<blockquote cite="'.$user->username.'">
						<p>
						' .stripslashes($user->cb_rustatus). '
						</p>
					</blockquote>
					<p id="explainLink">'.getWhatruTab::dateTimeDiff($user->cb_rustatustime).'</p>';
				$return .='</div>';
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

