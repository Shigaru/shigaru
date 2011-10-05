<?php
/**
* Joomla Community Builder User Plugin: plug_cbMutualFriends
* @version $Id$
* @package plug_cbMutualFriends
* @subpackage cb.MutualFriends.php
* @author Bhasker, Michaelides
* @copyright (C) AXXIS Internet Solutions
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die(dirname(__FILE__).' Restricted Access!');

/**
 * Management Tab still under construction
 */
class getMutualFriendsManagementTab extends cbTabHandler {
	/**
	 * Construnctor
	 */
	function getMutualFriendsManagementTab() {
		$this->cbTabHandler();
	}
	
	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayTab($tab,$user,$ui) {
		//$this->_getLanguageFile();
		$htmltext1 = "";
		if($tab->description != null) {
			$htmltext1 .= "\t\t<div class=\"tab_Description\">";
			$htmltext1 .= unHtmlspecialchars(getLangDefinition($tab->description));
			$htmltext1 .= "</div>\n";
			$htmltext1 .= "<br />\n";
			$htmltext1 .= "Feature not available yet\n";
			$htmltext1 .= "<br />\n";
		}
		return $htmltext1;
	}
}

/**
 * Profile Gallery Tab
 */
class getMutualFriendsTab extends cbTabHandler {
	/**
	* Constructor
	*/
	function getMutualFriendsTab() {
		$this->cbTabHandler();
	}
	
	/**
	 * Includes the plugin's own language file
	 * @access  private
	 */
/*function mutualloadLanguage($pathtouser) {
	global $mosConfig_lang;
	// Get right language file or use english
//  $sitepath = "/public_html"; //$_SERVER['DOCUMENT_ROOT'];
	$usedlanguage="";
if (!defined('_ACT_NO_CONNECTION')) {
	if (file_exists($pathtouser.'/language/'.$mosConfig_lang.'.php')) {
		include_once($pathtouser.'/language/'.$mosConfig_lang.'.php');
		$usedlanguage='/language/'.$mosConfig_lang.'.php';
	} elseif (file_exists($pathtouser.'/language/english.php')) {
		include_once($pathtouser.'/language/english.php');
		$usedlanguage='/language/english.php';
	}
}
	// register vars from language file
	return $usedlanguage;
}*/
// ************************
	/**
	 * This function returnd an array of parameter and field settings (values)
	 * used though-out the gallery plugin.
	 * @access private
	 * @param object mosUser reflecting the user being displayed
	 */
	function _mutualGetTabParameters($user){
		$params = $this->params;
		// Tab Parameters
		$TabParams["pggalleryautoenabled"] = $params->get('MutualAutoEnable', 1);
		$TabParams["perrow"] = intval($params->get('MutualPerRow', 1));
		$TabParams["enable"] = $params->get('VeriKey');
		$TabParams["usename"] = $params->get('usename');
		if ($TabParams["pggalleryautoenabled"]) {
			$TabParams["cbpgenable"] = 1;
		} else {
			$TabParams["cbpgenable"] = 0;
		}
		return $TabParams;
	}
		
	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if Error generated
	*/
	function getDisplayTab($tab,$user,$ui) {
    include "params.php";
		if(count($result) > 0) {
      $htmltext2 .= '<link href="'.$grsite.'/components/com_comprofiler/plugin/user/plug_cbmutualfriends/css/default.css" rel="stylesheet" type="text/css" />';
      $htmltext2 .= '<!-- CB Mutual Friends from http://www.axxis.gr -->';
      $htmltext2 .= "<table class=\"mutual_table\"><tr>";
		  $i = 1;
			foreach($result as $key => $value) {
  			if (in_array($value, $my_friends) && in_array($value, $user_friends)) {
	   			$db->setQuery("select firstname, middlename, lastname, avatar from #__comprofiler where user_id= ".$value);
				  $udb = $db->loadObjectList();
          foreach ($udb as $u) {
            if ($tabparams["usename"]) {
				      $name = $u->firstname." ".$u->middlename." ".$u->lastname;
				    } else {
    					$db->setQuery("select username from #__users where id= ".$value);
		    			$name = $db->loadresult();
            }
            $link = 'index.php?option=com_comprofiler&task=userProfile&user='.$value.$cb_itemid;
	 			    $htmltext2 .= '<td style="width:'.$width.'%;"><a href="'.$link.'" title="'.$name.'" class="mutual_image">'.$this->mutualAvatar($name,$u->avatar,$value).'</a><br /><a href="'.$link.'" class="mutual_name">'.$name.'</a></td>';
				    if ($i == $perrow) {
              $htmltext2 .= '</tr><tr>';
              $i = 0;
            }
          }					
            $i++;
        }
			}
			$htmltext2 .= "</tr></table>";
		}	else {
			return "";
		}
		
    $htmltext2 .= "</div>";			
		if (strstr($htmltext2,"<td")) return $htmltext2; else return "";
	}
		
// ************************
// FETCH ITEMID
// ************************
function mutualItemID($link, $id, $notlike) {
  $db =& JFactory::getDBO();
//  if ($id) $id = "&id=".$id; SET BY THE CALL
  $sql = "SELECT id FROM #__menu WHERE link = '$link$id' AND published=1";
//  if ($link=="index.php?option=com_content&view=article") $sql = "SELECT id FROM #__menu WHERE link = '$link$id'";
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  if (count($data)==0) {
    if ($notlike) $notlike = "AND link NOT LIKE '$notlike'";
    $sql = "SELECT id FROM #__menu WHERE link LIKE '$link%' AND published=1 $notlike";
    $db->setQuery($sql);
    //print($db->getQuery());
    $data = $db->loadObjectList();
  }
//  echo count($data);
  $itemid = $data[0]->id;
  if ($itemid) {
    $itemid="&amp;Itemid=".$itemid;
  }
  return $itemid;
}

// ************************
// Fetch Avatar
// ************************
function mutualAvatar($name,$img,$id) {
  global $ueConfig;
  $grsite = JURI::base();
  if ($img != NULL) {
    if (ereg("^gallery", $img) == false) {
      $img = "tn" . $img;
    }
    $avatarimg = "<img class=\"activity_image\" src=\"$grsite/images/comprofiler/$img\" title=\"$name\">";
  } else {
    include './administrator/components/com_comprofiler/ue_config.php';
    $templatedir = $ueConfig['templatedir'];
    //echo " | template:".$templatedir;
    $tn_photo="tnnophoto_n.png";
    $avatarimg = "<img class=\"activity_image\" src=\"$grsite/components/com_comprofiler/plugin/templates/$templatedir/images/avatar/$tn_photo\" title=\"$name\">";
  }
  return $avatarimg;
}
// ************************
}	// end class.
?>