<?php

/**

* What are you doing module

* @version 1.1

* @package plug_cbwhatru

* @subpackage whatru.php

* @author Chatura Dilan Perera

* @copyright (C) Chatura Dilan Perera

* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL

* @final 1.0

*/

// no direct access
	defined( '_JEXEC' ) or die ( 'Restricted access' );
?>

<div id="mod_wru_module">
<?php

$wru_max_len = 1000;

foreach($statuses as $status){
	if ($status->avatar != NULL) {
               
        $img = "<img width=\"32\"  height=\"32\" class=\"zncbmimg\" src=\"images/comprofiler/" .$statuses->avatar ."\" t=\"#a".$status->id."\" border=\"0\"/>";
		$imgrel = "images/comprofiler/" .$status->avatar ."\" ";
        } 
	else {
	  
        $img = "<img width=\"32\"  height=\"32\" class=\"zncbmimg\" src=\"components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\"   t=\"#a".$row->id."\" border=\"0\"/>";
		$imgrel = "components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\" ";
        }
    $imagen = "<a href=\"index.php?option=com_comprofiler&task=userprofile&user=$status->id\" >";
	$imagen .= '<span title="'.$status->username.'">';
	$imagen .= $img;
	$imagen .= '</span>';
	$imagen .= "</a>";	    
	echo '<div id="mod_wru_status" style="padding-top:'.$params->get('whatru_space', 1).'px">';
	echo $imagen.'<a href="' . JRoute::_('index.php?option=com_comprofiler&task=userProfile&user='.$status->user_id) . '">' . $status->username . ": </a><span>" . modWhatruHelper::limitText($wru_max_len, stripslashes($status->cb_rustatus)). '</span>';
	echo '</div>';	
}
?>
</div>

