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
	echo '<div id="mod_wru_status" style="padding-top:'.$params->get('whatru_space', 1).'px">';
	echo '<a href="' . JRoute::_('index.php?option=com_comprofiler&task=userProfile&user='.$status->user_id) . '">' . $status->username . " " . modWhatruHelper::limitText($wru_max_len, stripslashes($status->cb_rustatus)). '</a>';
	echo '</div>';	
}
?>
</div>

