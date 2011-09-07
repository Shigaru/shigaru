<?php
/**
 * ZnCBMembers! by znjoomla.blogspot.com
 * 
 * @package    ZnJoomla.blogspot.com 
 * @subpackage Modules
 * @link http://znjoomla.blogspot.com/
 * @license        GNU/GPL, see http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * mod_zncbmembers is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
class modzncbmembersHelper {
 
function loadCssStyle($live_path)
    {
        $document = &JFactory::getDocument();
        $document->addStyleSheet($live_path . "modules/mod_zncbmembers/tmpl/css/default.css", 'text/css');
    }
 
function AddmodScript($live_path)
    {
        $document = &JFactory::getDocument();
        $document->addScript($live_path . "modules/mod_zncbmembers/includes/jquery.tools.min.js");
		
		$znappscript = '
			jQuery(document).ready(function($){	
			$(document).ready(function() {
					$("img[t]").tooltip({
	  					tip: ".zntooltip",
						lazy:false,
					  	effect: "slide",
  					})
			  });


		});	
		';
		$document->addScriptdeclaration ($znappscript);
    }

function zngetusers($params) {
 
 //the list of params :
$count = intval( $params->get( 'count', 10) );
$modulefunction = intval( $params->get( 'modulefunction', 2) );
$showimageapr = intval( $params->get( 'showimageapr', 1) );         
$showavataronly  = intval( $params->get( 'showavataronly', 1) );     
$gender =  $params->get( 'gender_field', 'cb_gender') ;
$age =  $params->get( 'age_field', 'cb_birthday');
$location = $params->get( 'location_field', 'cb_location');
$show_gender = $params->get( 'showgender', '0');
$show_age = $params->get( 'showage', '0');
$show_location= $params->get( 'showlocation', '0');
 
		//  The Avatar must be aproved?
	if ($showimageapr == 1) {
	$imageapr = 'and c.avatarapproved = 1';
	} else {
	$imageapr = '';
	}
	
	// Show only with avatar?
	if ($showavataronly == 1) {
	$avataronly = '';
	} else {
	$avataronly = 'and c.avatar IS NOT NULL';
	}
	
			//Show gender?
		if ($show_gender == 1) {
			$zngender = ',c.'.$gender;
		} else {
			$zngender = "";
		}
		
				//Show age?
		if ($show_age == 1) {
			$znage = ',c.'.$age;
		} else {
			$znage = "";
		}
		
				//Show location?
		if ($show_location == 1) {
			$znlocation = ',c.'.$location;
		} else {
			$znlocation = "";
		}
	
switch ($modulefunction) {
    case 3 :
        $query = "select u.id, u.username $zngender $znage $znlocation, u.name, c.avatar from #__users u,#__comprofiler c WHERE u.id = c.user_id and c.approved = 1 and c.confirmed = 1 and c.banned = 0 $imageapr $avataronly and u.block = 0 GROUP BY u.id  ORDER BY u.lastvisitDate desc limit " . $count;
    break;
    case 4 :
        $query = "SELECT u.id, u.username $zngender $znage $znlocation, u.name, c.avatar, count(*) as num FROM #__comprofiler_views v, #__comprofiler c, #__users u where v.profile_id = c.id and c.user_id = u.id  $imageapr $avataronly and c.approved = 1 and c.confirmed = 1 and u.block = 0 and c.banned = 0 group by u.id order by num desc limit " . $count;
    break;
    case 5 :
        $query = "select u.id, u.username $zngender $znage $znlocation, u.name, c.avatar from #__users u, #__comprofiler c where u.id = c.user_id and c.lastupdatedate > '0000-00-00 00:00:00' and c.approved = 1 $imageapr $avataronly and c.confirmed = 1 and c.banned = 0 and u.block = 0 group by u.id order by c.lastupdatedate desc limit " . $count;
    break;
    case 6 :
        $query = "select u.id, u.username $zngender $znage $znlocation, u.name, c.avatar FROM #__users u, #__comprofiler c,  #__session AS s  WHERE u.id = c.user_id $imageapr $avataronly and  u.username = s.username and c.approved = 1 and u.block = 0 and c.confirmed = 1 and c.banned = 0 group by u.id limit " . $count;
    break;
    case 2 :
        $query = "SELECT u.id, u.username $zngender $znage $znlocation, u.name, c.avatar FROM #__users u, #__comprofiler c  WHERE u.id = c.user_id and c.approved = 1 and c.confirmed = 1 $imageapr  $avataronly  and c.banned = 0 and u.block = 0 order by u.registerDate desc limit " . $count;
     break;
    default :
        $query = "select u.id, u.username $zngender  $znage  $znlocation , u.name, c.avatar from #__users u, #__comprofiler c where u.id = c.user_id and c.approved = 1 and c.confirmed = 1 $imageapr $avataronly and c.banned = 0 and u.block = 0 order by rand() desc limit " . $count;
    }
	$db = &JFactory::getDBO();
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	//print($db->getQuery());
	return $rows;
 
}
}
?>