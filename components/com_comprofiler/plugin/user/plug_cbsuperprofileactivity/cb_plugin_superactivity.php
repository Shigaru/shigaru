<?php
/*
* @name mod_CB_activity 1.0.8
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');
global $sql_gender, $male, $female, $grguest, $guestlink, $grtable, $grRoute, $grFactory, $subdirchecked, $ehorizontal, $ghorizontal, $imageinc, $grsite, $grpath, $shownotavatar, $width_thumbcb, $height_thumbcb, $link_jc, $linkdate, $mainframe, $myid, $grpathtouser, $online, $imagelinked, $shownamedetails, $usernamelinked, $activity, $myactiv;
$grFactory = new JFactory();
$grRoute = new JRoute();
$grRequest = new JRequest();
$grUser =& $grFactory->getUser(); 
$grguest = $grUser->guest;
$myid = $grUser->id;
$config =& $grFactory->getConfig();
$grtable = "#__supera_cb_tab";
$grpath = dirname(__FILE__); // Joomla 1.5 Native
$grsite  = $mainframe->getCfg('live_site');
$grpre = "www.";

$_PLUGINS->registerFunction( 'onAfterUserProfileDisplay', 'truncate','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'grNewFriend','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'Ago','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'url_exists','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'check_for_links','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'check_for_links_helper','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'get_image_from_url','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newUpdate','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newEventRegisters','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newGroupRegisters','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newgetPage','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newgrloadLanguage','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newGetEventDate','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newItemID','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newOnline','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'ResizeAvatar','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'fetchGroupImage','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newfetchuser','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'newcommentEnder','cbsuperaTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'grstrOut','cbsuperaTab' );

class cbsuperaTab extends cbTabHandler {
function cbsuperaTab() {
	$this->cbTabHandler();
}

// ************************
//  decode string for output
// ************************
function grstrOut($str, $striptags=false) {
	$str = stripslashes($str);
	$str = html_entity_decode($str, ENT_QUOTES);
	$str = utf8_decode($str);
	if ($striptags)
		$str = strip_tags($str);
	return $str;
}

// *********************************************  
// EMPTY DATABASE TABLE
// *********************************************  
function truncate() {
global $grFactory, $grtable;
		$db		=& $grFactory->getDBO();

  $drop = "TRUNCATE TABLE ".$grtable;
  $db->setQuery($drop);
  $return='';
  if (!$db->query()) $return .= "Error with truncating tab table $grtable. Please contact support.<br/>";
}  

// ************************
//  JREVIEWS HELPER
// ************************
function grJReviewsModeSwitch($contentid,$mode,$default_itemid) {
global $grRoute, $grguest, $guestlink, $grFactory;
		$db =& $grFactory->getDBO();

  switch ($mode) {
    case 'com_virtuemart' :
      $reviewed_item = _ACT_A_PRODUCT;
      $link = "index.php?option=com_virtuemart";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_virtuemart&amp;page=shop.product_details&amp;product_id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_sobi2' :
      $db->setQuery("SELECT title FROM #__sobi2_item WHERE itemid=$contentid");
      $item=$db->loadObjectList();
      $reviewed_item = $item[0]->title;
      $link = "index.php?option=com_sobi2";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;sobi2Id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_myblog' :
      $reviewed_item = _ACT_A_BLOG;
      $link = "index.php?option=com_myblog";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_myblog&show=$contentid&Itemid=$itemid");
  	break;
    case 'com_mtree' :
      $reviewed_item = _ACT_A_LISTING;
      $link = "index.php?option=com_mtree";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_mtree&amp;task=viewlink&amp;link_id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_joomgallery' :
      $reviewed_item = _ACT_A_PHOTO;
      $link = "index.php?option=com_joomgallery";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_joomgallery&amp;func=detail&amp;id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_jomres' :
      $reviewed_item = _ACT_A_PROPERTY;
      $link = "index.php?option=com_jomres";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_jomres&amp;task=viewproperty&amp;property_uid=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_hotproperty' :
      $reviewed_item = _ACT_A_PROPERTY;
      $link = "index.php?option=com_hotproperty";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_hotproperty&amp;task=view&amp;id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_ezrealty_property' :
      $reviewed_item = _ACT_A_PROPERTY;
      $link = "index.php?option=com_ezrealty";
      $exactlink = "&task=detail&id=$contentid";
      $excludelink = "task=showprofile";
      $itemid = $this->newItemID($link,$exactlink,$excludelink);
      $jreview_link = $grRoute->_("index.php?option=com_ezrealty&task=detail&id=$contentid&Itemid=$itemid");
  	break;
    case 'com_ezrealty_profile' :
      $reviewed_item = _ACT_A_PROFILE;
      $link = "index.php?option=com_ezrealty";
      $exactlink = "&task=showprofile&id=$contentid";
      $excludelink = "task=detail";
      $itemid = $this->newItemID($link,$exactlink,$excludelink);
      $jreview_link = $grRoute->_("index.php?option=com_ezrealty&task=showprofile&id=$contentid&Itemid=$itemid");
  	break;
    case 'com_eventlist_venue' :
      $reviewed_item = _ACT_A_VENUE;
      $link = "index.php?option=com_eventlist";
      $exactlink = "&view=venueevents&id=$contentid";
      $excludelink = "view=details";
      $itemid = $this->newItemID($link,$exactlink,$excludelink);
      $jreview_link = $grRoute->_("index.php?view=venueevents&id=$contentid&option=com_eventlist&Itemid=$itemid");
  	break;
    case 'com_eventlist_event' :
      $reviewed_item = _ACT_AN_EVENT;
      $link = "index.php?option=com_eventlist";
      $exactlink = "&view=details&id=$contentid";
      $excludelink = "view=venueevents";
      $itemid = $this->newItemID($link,$exactlink,$excludelink);
      $jreview_link = $grRoute->_("index.php?view=details&id=$contentid&option=com_eventlist&Itemid=$itemid");
  	break;
    case 'com_comprofiler' :
      $reviewed_item = _ACT_A_PROFILE;
      $link = "index.php?option=com_comprofiler";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_bookmarks' :
      $reviewed_item = _ACT_A_BOOKMARK;
      $link = "index.php?option=com_bookmarks";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_bookmarks&amp;task=detail&amp;id=$contentid&amp;Itemid=$itemid");
  	break;
    case 'com_seyret' :
      $reviewed_item = _ACT_A_VIDEO;
      $link = "index.php?option=com_seyret";
      $itemid = $this->newItemID($link,'','');
      $jreview_link = $grRoute->_("index.php?option=com_seyret&amp;Itemid=$itemid&amp;task=videodirectlink&amp;id=$contentid");
  	break;
  	default:
      $reviewed_item = _ACT_A_LISTING;
  	  $jreview_link = $grRoute->_("index.php?option=com_content&amp;view=article&amp;id=".$contentid.$default_itemid);
  	break;
  }
  if ($guestlink!='GUESTS ALLOWED' && $grguest) $jreview_link=$guestlink;

  $return[item] = $reviewed_item;
  $return[link] = $jreview_link;

  return $return;
}

// ************************
// FRIENDSHIP HELPER
// ************************
function grNewFriend($newfriend,$viewname,$showyou,$itemid) {
global $sql_gender, $male, $female, $grRoute, $grFactory, $grguest, $guestlink, $myid;
		$db =& $grFactory->getDBO();
        $newfriendid = 0;
        $sql = "select u.id, u.name, u.username, c.avatar".$sql_gender." FROM #__users u, #__comprofiler c WHERE u.id = ".$newfriend." AND u.id = c.id";
        $db->setQuery($sql);
        $newfrienddbase = $db->loadObjectList();
      if (count($newfrienddbase)>0) {
        $datfriend = $newfrienddbase[0];
        if ($sql_gender) {
          switch ($datfriend->cb_gender) {
            case $male :
              $gender="male";
              break;
            case $female :
              $gender="female";
              break;
            default:
              $gender="other";
          }
        } else {$gender="other";}
        $friendavatar = $datfriend->avatar;
        $newfriendid = $datfriend->id;
        $link_fr = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$newfriendid$itemid");
        if ($guestlink!='GUESTS ALLOWED' && $grguest) $link_fr=$guestlink;
        if ($viewname == 0) {
           $newfriend = $datfriend->username;
        } else {
           $newfriend = $datfriend->name;
         }
          if ($newfriendid==$myid && $showyou) $newfriend=_ACT_YOU;
          $echo = $this->newfetchuser($newfriend,$friendavatar,$newfriendid,$itemid,$gender);
          return $echo;
      }
}

// ************************
// DISTANCE OF TIME IN WORDS
// ************************
function Ago($fromTime, $toTime = 0) {

    $distanceInSeconds = round(abs($toTime - $fromTime));
    $distanceInMinutes = round($distanceInSeconds / 60);
//    echo "about ".round($distanceInMinutes/60)." hours ago...<br/>";

       $ago[grday] = _ACT_TODAY;
       $ago[grtime]= '';
       
        if ( $distanceInMinutes <= 1 ) {
                if ( $distanceInSeconds < 5 ) {
                    $ago[grtime] = _ACT_5_SECONDS;
                    return $ago;
                }
                if ( $distanceInSeconds < 10 ) {
                    $ago[grtime] = _ACT_10_SECONDS;
                    return $ago;
                }
                if ( $distanceInSeconds < 20 ) {
                    $ago[grtime] = _ACT_20_SECONDS;
                    return $ago;
                }
                if ( $distanceInSeconds < 40 ) {
                    $ago[grtime] = _ACT_HALF_MINUTE;
                    return $ago;
                }
                if ( $distanceInSeconds < 60 ) {
                    $ago[grtime] = _ACT_LESS_MINUTE;
                    return $ago;
                }
        } else {       
        if ( $distanceInMinutes < 2 ) {
            $ago[grtime] = _ACT_A_MINUTE;
            return $ago;
        }
        if ( $distanceInMinutes < 45 ) {
            $ago[grtime] = _ACT_BEFORE_COMMA_TIME.$distanceInMinutes . _ACT_MINUTES;
            return $ago;
        }
        if ( $distanceInMinutes < 90 ) {
            $ago[grtime] = _ACT_AN_HOUR;
            return $ago;
        }
        if ( $distanceInMinutes < 1440 ) {
            $ago[grtime] = _ACT_ABOUT.round(floatval($distanceInMinutes) / 60.0)._ACT_HOURS;
            return $ago;
        }
        if ( $distanceInMinutes < 2400 ) {
            $ago[grday] = _ACT_YESTERDAY;
            return $ago;
        }
        if ( $distanceInMinutes < 10080 ) {
            $ago[grday] = _ACT_BEFORE_DAYS_.round(floatval($distanceInMinutes) / 1440)._ACT_DAYS;
            return $ago;
        }
        if ( $distanceInMinutes < 14400 ) {
            $ago[grday] = _ACT_A_WEEK;
            return $ago;
        }
        if ( $distanceInMinutes < 20160 ) {
            $ago[grday] = _ACT_MORE_WEEK;
            return $ago;
        }
        if ( $distanceInMinutes < 25920 ) {
            $ago[grday] = _ACT_2_WEEKS;
            return $ago;
        }
        if ( $distanceInMinutes < 30240 ) {
            $ago[grday] = _ACT_MORE_2_WEEKS;
            return $ago;
        }
        if ( $distanceInMinutes < 43200 ) {
            $ago[grday] = _ACT_3_WEEKS;
            return $ago;
        }
        if ( $distanceInMinutes < 86400 ) {
            $ago[grday] = _ACT_A_MONTH;
            return $ago;
        }
        if ( $distanceInMinutes < 525600 ) {
            $ago[grday] = round(floatval($distanceInMinutes) / 43200)._ACT_MONTHS;
            return $ago;
        }
        if ( $distanceInMinutes < 1051199 ) {
            $ago[grday] = _ACT_A_YEAR;
            return $ago;
        }
       
        return _ACT_ABOUT.round(floatval($distanceInMinutes) / 525600)._ACT_YEARS;
        }
}


// ************************
// FIND URL (FOR GROUPIMAGES)
// ************************
function url_exists($url){
    $hdrs = @get_headers($url);
    return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
}
// ************************



// ************************
// CHECK STRING FOR LINKS
// ************************
function check_for_links($string) {
  if (strstr($string,"http://") || strstr($string,"www.")) {
    $array = array(image => '', text => '');
    $urls = explode(" ",$string);
    if (count($urls)) {
      $string_returned = "";
      $image_returned = "";
      foreach ($urls as $url) {
        if (strstr($url,"http://") || strstr($url,"www.")) {
          $array = $this->check_for_links_helper($url);
          $string_returned .= $array[text]."&nbsp;";
          $image_returned .= $array[image]."&nbsp;";;
        } else {
          $string_returned .= "<span class=\"activity_status\" >".stripslashes($url)."</span>&nbsp;";
        }
      }
      return $string_returned."<br />".$image_returned;
    } else {
      $array = $this->check_for_links_helper($string);
      return $array[text]."<br />".$array[image]; 
    }
  } else {
    return "<span class=\"activity_status\" >".stripslashes($string)."</span>";
  }
}
function check_for_links_helper($string) {
  $check = @$this->url_exists($string);
  if ($check) {
    $return[image] = $this->get_image_from_url($string);
    $return[text] = "<a class=\"activity_status\" href='$string' target='_blank'>".stripslashes($string)."</a>";
    return $return;
  } else {
    if (!strstr($string,"http://")) {
      $string2 = "http://".$string;
      $check = @$this->url_exists($string2);
      if ($check) {
        $return[image] = $this->get_image_from_url($string2);
        $return[text] = "<a class=\"activity_status\" href='$string2' target='_blank'>".stripslashes($string)."</a>";
        return $return;
      } else {
        $return[image] = "";
        $return[text] = "<span class=\"activity_status\" >".stripslashes($string)."</span>";
        return $return;
      }
    } else {
      $return[image] = "";
      $return[text] = "<span class=\"activity_status\" >".stripslashes($string)."</span>";
      return $return;
    }
  }
}
function get_image_from_url($url) {
// First check if the URL is an image
        if (strstr($url,".jpg") || strstr($url,".gif")) {
          $images1 = explode("/",$url);
          $i=0;
          $imgurl = "";
          while ($i < count($images1)-1) {
            $imgurl .= $images1[$i].'/';
            $i++;
          }
          $i=0;
          foreach ($images1 as $image) {
            $images[$i] = explode("?",$image);
            $i++;
          }
          $j=0;
          $searchforimage=FALSE;
          while ($j < $i) {
            foreach ($images[$j] as $image) {
/*            echo "$image<br />";
              $parts[$j] = explode("&",$image);
            }
            $j++;
          }
          foreach ($parts as $part) {
          foreach ($part as $image) {*/
//            echo "$image<br />";
            if (strstr($image,".jpg") || strstr($image,".gif"))
              $searchforimage = $image; 
              //return "<a href='".$url."' target='_blank'><img src='".$imgurl.$image."' style='max-height:60px !important;' /></a>";
          }
          $j++;
          }
        }
//==============================================================================
  $data = @file_get_contents($url);
  if (!$data) {
    $ch = curl_init($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    $data = curl_exec($ch);
    curl_close($ch);
    if (substr($data,'not found')) $data="";
  }
  if ($data) { 
    // katharismos image tag apo styles
    $data=preg_replace('@<img style[^>]*?.*? src=@','<img src=',$data);
    // briskoume tis fotografies kai tis vazume se pinaka
    preg_match_all('/<img.*?src\s*=\s*["\'](.+?)["\']/im', $data, $images);         
    //provoli image urls
    foreach($images[1] as $image)
    {
            //echo "$image -> $searchforimage<br />";
      if (strstr($image,"http")) {
        if (strstr($image,".jpg") || strstr($image,".gif"))
          if (!$searchforimage) {
            return "<a href='".$url."' target='_blank'><img src='".$image."' style='max-height:60px !important;' /></a>";
          } elseif (strstr($image,$searchforimage)) {
            return "<a href='".$url."' target='_blank'><img src='".$image."' style='max-height:60px !important;' /></a>";
          }
      } else {
        if (strstr($image,".jpg") || strstr($image,".gif"))
          if (!$searchforimage) {
            return "<a href='".$url."' target='_blank'><img src='".$url.$image."' style='max-height:60px !important;' /></a>";          
          } elseif (strstr($image,$searchforimage)) {
            return "<a href='".$url."' target='_blank'><img src='".$url.$image."' style='max-height:60px !important;' /></a>";
          }
      }
    }
    if (strstr($url,$searchforimage) && $searchforimage) {
      return "<a href='".$url."' target='_blank'><img src='".$imgurl.$image."' style='max-height:60px !important;' /></a>";
    }
  }
}
// ************************



// ************************
// UPDATE TABLE FOR UPGRADES
// ************************
function newUpdate($field,$type,$table) {
  global $grFactory;
		$db =& $grFactory->getDBO();
		$query = "SHOW COLUMNS FROM $table LIKE '".$field."'";
		$db->setQuery($query);
	  $data = $db->loadObjectList();
    if (count($data)==0) {
      $query = "ALTER TABLE $table ADD $field $type";
		  $db->setQuery($query);
  		$db->query();
    }
}
// ************************



// ************************
// EVENT REGISTRATIONS
// ************************
function newEventRegisters ($eventid, $emyid, $count, $viewname,$itemid) { // limit search for others according to backend input
  global $grFactory, $myid, $myactiv, $ehorizontal, $grtable;
		$db =& $grFactory->getDBO();
  $output = '';
  $result = '';
  $sql = "select userid, username, uname, cavatar, cbgender, eventid, eventtitle FROM $grtable WHERE eventid = $eventid GROUP BY userid ORDER BY actidate desc limit ". $count;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  $k = count($data);
  $i = 0;
  while ($i < $k) {
  $dat = $data[$i];
  $userid=$dat->userid;
  if ($viewname == 0) {
    $name = $dat->username;
  } else {
    $name = $dat->uname;
  }
  $cavatar = $dat->cavatar;
  $eventid=$dat->eventid;
  $eventtitle=$dat->eventtitle;
  $gender=$dat->cbgender;
  if ($userid!=$emyid) {
   if ($myactiv==0 && $userid==$myid) { // if this is me and we don't want me displayed...
    $myactiv=0; //maybe do something later...
   } else {
//     $avatar = "<img src=\"images/comprofiler/" .$cavatar ."\" title=\" ". $name." \" border=\"0\"/>";
      $fetch = $this->newfetchuser($name,$cavatar,$userid,$itemid,$gender);
      if (!$ehorizontal) $result.="<tr>";
      $result .= $fetch."  </td>"; // if this not first user
      if (!$ehorizontal) $result.="</tr>";
    }
  } 
  $i ++;
  }
  if ($result) { 
//  $result=substr($result, 0 , -12)."<br/>";
    if ($ehorizontal) $output = "</td></tr></table><table class=\"activity_table\"><tr><td><span class=\"activity_small_text\">"._ACT_OTHER_PEOPLE_EVENT.$eventtitle."</td></tr></table><table class=\"activity_registers\"><tr>".$result."</tr></table></span>";
    else $output = "<span class=\"activity_small_text\"><table class=\"activity_registers\"><tr><td colspan=2>"._ACT_OTHER_PEOPLE_EVENT.$eventtitle."</td></tr>".$result."</table></span>";
  }
  return $output;
}
// ************************



// ************************
// GROUP MEMBERS
// ************************
function newGroupRegisters ($groupid, $gmyid, $count, $viewname,$itemid) { // limit search for others according to backend input
  global $grFactory, $myid, $myactiv, $ghorizontal, $grtable;
		$db =& $grFactory->getDBO();
  $result = '';
  $sql = "select userid, username, uname, cavatar, cbgender, groupid, grouptitle FROM $grtable WHERE groupid = $groupid GROUP BY userid ORDER BY actidate desc limit ". $count;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  $k = count($data);
  $i = 0;
  while ($i < $k) {
  $dat = $data[$i];
  $userid=$dat->userid;
  if ($viewname == 0) {
    $name = $dat->username;
  } else {
    $name = $dat->uname;
  }
  $cavatar = $dat->cavatar;
  $groupid=$dat->groupid;
  $grouptitle=$dat->grouptitle;
  $gender=$dat->cbgender;
  if ($userid!=$gmyid) {
   if ($myactiv==0 && $userid==$myid) { // if this is me and we don't want me displayed...
    $myactiv=0; //maybe do something later...
   } else {
  //     $avatar = "<img src=\"images/comprofiler/" .$cavatar ."\" title=\" ". $name." \" border=\"0\"/>";
      $fetch = $this->newfetchuser($name,$cavatar,$userid,$itemid,$gender);
      if (!$ghorizontal) $result.="<tr>";
      $result .= $fetch."  </td>"; // if this not first user
      if (!$ghorizontal) $result.="</tr>";
    }
  } 
  $i ++;
  }
  if ($result) { 
  //  $result=substr($result, 0 , -12);
    if ($ghorizontal) $output = "</td></tr></table><table class=\"activity_table\"><tr><td><span class=\"activity_small_text\">"._ACT_OTHER_PEOPLE_GROUP.$grouptitle."</td></tr></table><table class=\"activity_registers\"><tr>".$result."</tr></table></span>";
    else $output = "<td><span class=\"activity_small_text\"><table class=\"activity_registers\"><tr><td colspan=2>"._ACT_OTHER_PEOPLE_GROUP.$grouptitle."</td></tr>".$result."</table></span>";
  }
//  echo $result;
  return $output;
}
// ************************



// ************************
// GET CURRENT URL
// ************************
function newgetPage() {
// *******FUNCTION TO GET CURRENT URL***********
 $pageURI = $_SERVER["REQUEST_URI"];
 $pageURL = strstr($pageURI, 'Profile');
 if ($pageURL==FALSE) $pageURL = strstr($pageURI, 'userprofile');
 if ($pageURL==FALSE) $pageURL = strstr($pageURI, 'profiler&Itemid');
 return $pageURL;
}
// ************************


// ************************
// LOAD LANGUAGE
// ************************
function newgrloadLanguage($pathtouser) {

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

}
// ************************



// ************************
// GET THE EVENT DATE
// ************************
function newGetEventDate($eventdate) {
      global $linkdate;

      $day = substr($eventdate, -2);
      $month = substr($eventdate, -5, 2);
      $year = substr($eventdate, 0, 4);
      $linkdate = $year.$month.$day;

      if (stristr($day, '0')) { 
        $day = substr($day, -1);
       } 
      switch ($month) {
      case '01':
        $month = _ACT_JANUARY;
        break;
      case '02':
        $month = _ACT_FEBRUARY;
        break;
      case '03':
        $month = _ACT_MARCH;
        break;
      case '04':
        $month = _ACT_APRIL;
        break;
      case '05':
        $month = _ACT_MAY;
        break;
      case '06':
        $month = _ACT_JUNE;
        break;
      case '07':
        $month = _ACT_JULY;
        break;
      case '08':
        $month = _ACT_AUGUST;
        break;
      case '09':
        $month = _ACT_SEPTEMBER;
        break;
      case '10':
        $month = _ACT_OCTOBER;
        break;
      case '11':
        $month = _ACT_NOVEMBER;
        break;
      default:
        $month = _ACT_DECEMBER;
      }
      
      $gooddate = $day." ".$month.", ".$year;
      
      return $gooddate;
}
// ************************



// ************************
// FETCH ITEMID
// ************************
function newItemID($link, $id, $notlike) {
  global $grFactory;
  $db =& $grFactory->getDBO();
  
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



// ************************
// SHOW ONLINE INFO IMAGE
// ************************
function newOnline($userid) {
  global $grsite, $grFactory;
		$db =& $grFactory->getDBO();

  $sql = "SELECT s.userid FROM #__session s WHERE s.userid = ". $userid;
  $db->setQuery($sql);
  $session = $db->loadObjectList();

  if (count($session) > 0) {
    $ongif = "<td><img width=5 height=5 src=\"$grsite/modules/mod_cb_superactivity/cb_activity/online.gif\" alt=\"online\" border=\"0\"/></td>";
  } else {
    $ongif = "<td><img width=5 height=5 src=\"$grsite/modules/mod_cb_superactivity/cb_activity/offline.gif\" alt=\"offline\" border=\"0\"/></td>";
  }

return $ongif;
}
// ************************



// ************************
// Resize Avatar
// ************************
function ResizeAvatar($name,$img,$id,$gender) {
global $grsite, $shownotavatar, $height_thumbcb, $width_thumbcb, $useratio, $ueConfig;

  if ($img != NULL) {
    if (ereg("^gallery", $img) == false) {
      $img = "tn" . $img;
    }
    $avatarimg = "<img class=\"activity_image\" $height_thumbcb $width_thumbcb src=\"$grsite/images/comprofiler/$img\" title=\"$name\">";
  } else {
      if ($shownotavatar == 1) {
        include './administrator/components/com_comprofiler/ue_config.php';
        $templatedir = $ueConfig['templatedir'];
        //echo " | template:".$templatedir;
            switch ($gender) {
              case 'male' :
                $tn_photo="tnnophoto_m.png";
                break;
              case 'female' :
                $tn_photo="tnnophoto_f.png";
                break;
              default:
                $tn_photo="tnnophoto_n.png";
            }
        $avatarimg = "<img class=\"activity_image\" $height_thumbcb $width_thumbcb src=\"$grsite/components/com_comprofiler/plugin/templates/$templatedir/images/avatar/$tn_photo\" title=\"$name\">";
      } else {$avatarimg = "";}
  }
  return $avatarimg;
}
// ************************



// ************************
// FETCH GROUP IMAGE
// ************************
function fetchGroupImage($groupimg) {
  global $grsite;
  
  if (!$groupimg) $groupimg="groupjive_default.gif";
  
  $groupimage = $grsite."/images/com_groupjive/".$groupimg;    

  $groupimgcheck = @$this->url_exists($groupimage);
  if (!$groupimgcheck) {
    $groupimg2="groupjive_default.jpg";
    $groupimage = $grsite."/images/com_groupjive/".$groupimg2;
    $groupimgcheck = @$this->url_exists($groupimage);
    if (!$groupimgcheck) $groupimage = $grsite."/images/com_groupjive/".$groupimg;    
  }
  return $groupimage;
}
// ************************



// ************************
// FETCH CURRENT USER
// ************************
function newfetchuser($name,$img,$id,$itemid,$gender) {

global $grguest, $guestlink, $grRoute, $imageinc, $online, $imagelinked, $shownamedetails, $usernamelinked, $activity;

$echo = '<td>';

  if ($online == 1) { $echo .= $this->newOnline($id)."</td><td>"; }

$link_cb = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$id$itemid");
if ($guestlink!='GUESTS ALLOWED' && $grguest) $link_cb=$guestlink;

if ($imageinc) {
  if ($imagelinked == 1) $echo.="<a href='$link_cb' title=".$name.">";
  $avatarimg = $this->ResizeAvatar($name,$img,$id,$gender);
  if (!$avatarimg) {$tempnamedetails=$shownamedetails;$shownamedetails=1;} else $echo.=$avatarimg;
  if ($imagelinked == 1) $echo.="</a>";
  $echo.='</td><td>';
}

  if ($shownamedetails == 1) {
//    $echo.= "<td>";
    if ($usernamelinked == 1) {
      $echo.= "<a class=\"activity_links\" href='$link_cb'>";
    }
    $echo.= "<span class=\"activity_uname\">".$name."</span>";
  }
  if ($usernamelinked == 1) $echo.= "</a>";
    
  if (!$avatarimg && $imageinc) $shownamedetails=$tempnamedetails;    
  return $echo;
}
// ************************



// ************************
// END COMMENTS SECTION
// ************************
function newcommentEnder ($name,$comment,$intro,$letters) {
global $grsite, $grpath, $link_jc;

//      $commentuserimage = "<img align=middle width=15 height=15 src=\"images/comprofiler/" .$dat->avatar ."\" title=\" ". $dat->name." \" border=\"0\"/>";
      $commentuserimage = "<img src=\"$grsite/modules/mod_cb_superactivity/cb_activity/play.jpg\" title=\"".$intro.$name."\" border=\"0\">";
      $echo="<a class=\"activity_comment\" href='$link_jc'>".$commentuserimage." ".substr($comment, 0, $letters)."...</a>";

      return $echo;
}

function getEditTab($tab,$user,$ui) {
// INCLUDE TAB DESCRIPTION
$return="";
$grpath = dirname(__FILE__); // Joomla 1.5 Native
$this->newgrloadLanguage($grpath);
if($tab->description != null) $return = unHtmlspecialchars(getLangDefinition($tab->description));
return $return;
}

function getDisplayTab($tab,$user,$ui) {
global $sql_gender, $male, $female, $grguest, $guestlink, $debug, $grtable, $grRoute, $grFactory, $subdirchecked, $ehorizontal, $ghorizontal, $imageinc, $grsite, $grpath, $shownotavatar, $width_thumbcb, $height_thumbcb, $link_jc, $linkdate, $mainframe, $myid, $grpathtouser, $online, $imagelinked, $shownamedetails, $usernamelinked, $activity, $myactiv;

$p = getcwd();
$p = str_replace('/modules/mod_cb_superactivity','',$p);

$return = "";
$params = $this->params;
$grpopulate = TRUE;
$grFactory = new JFactory();
$grRoute = new JRoute();
$grRequest = new JRequest();
$grUser =& $grFactory->getUser(); 
$grguest = $grUser->guest;
$grusertype = '';
$myid = $grUser->id;
$what='';
$config =& $grFactory->getConfig();
$moduleid = $user->id;
$grtable = "#__supera_cb_tab";
$grpath = dirname(__FILE__); // Joomla 1.5 Native
$grsite  = $mainframe->getCfg('live_site');
$grpre = "www.";
$db =& $grFactory->getDBO();

$this->newgrloadLanguage($grpath);
include $grpath.'/helpers/parameters.php';

// TOTAL MANIPULATION OF TIME! WORKS ONLY IN J!1.5
$timeformat = '%Y-%m-%d %H:%M:%S';
$servertime = time();
$serverformat = date("Y-m-d H:i:s");
//$return .= "NOW it's $serverformat ($servertime) in server. ";
if (function_exists("date_default_timezone_set") and function_exists("date_default_timezone_get")) {
  $servertimezone = date_default_timezone_get();
  date_default_timezone_set('UTC');
  $php=0;
  $configOffset=$config->getValue('config.offset');
} else {
  $php=1;
  $configOffset=0;
}
$now = strftime($timeformat);
$nowJ =& $grFactory->getDate($now);
$nowJ->setOffset($configOffset);
$nowtime = $nowJ->toFormat(); // this is Joomla time NOW
$now = $nowJ->toFormat('%Y-%m-%d'); // this is Joomla time NOW
//$return .= "Joomlatime: $nowtime<br/>";
$gmtformat = date("Y-m-d H:i:s");
//$return .= "It is $gmtformat ";
if ($php==0) {
  date_default_timezone_set($servertimezone);
}
$gmttime = strtotime($gmtformat);
//$return .= "($gmttime) in GMT. ";
$nowexact = strtotime($nowtime); // this is Joomla time NOW
//$return .= "Joomla EXACT time: ".$nowexact;
$serveroffset = ($gmttime - $servertime)/3600;
//$return .= "Time difference: $serveroffset<br/>";

if ($php==1 && $debug!=2) {
  $return .= "<span class=\"activity_small_text\"><b>WARNING:</b> Your server's PHP version is lower than PHP 5!";
  $return .= " Any versions prior to PHP 5 are more than 1 year old! They are considered outdated and not supported by PHP!";
  $return .= " Please upgrade your PHP version, put pressure on your host to do so, or change your hosting company!";
  $return .= " To hide this text, please set 'Debug Mode' to 'PHP 4'.<br/>";
  $return .= " <b>Notice:</b> Module may not function correctly using PHP 4.</span>";
}

if ($debug==1) include $grpath.'/helpers/error_handler.php';

include $grpath.'/helpers/sql_loads.php';

  include $grpath.'/views/supera.php';
  
$return .= $output2;

$this->truncate();

return $return;
}
}
  function sa_cb_rotate($string) {
      $length = strlen($string);
      $result = '';
      for($i = 0; $i < $length; $i++) {
          $ascii = ord($string{$i});
          $rotated = $ascii;
          if ($ascii > 64 && $ascii < 91) {
              $rotated += -13;
              $rotated > 90 && $rotated += -90 + 64;
              $rotated < 65 && $rotated += -64 + 90;
          } elseif ($ascii > 96 && $ascii < 123) {
              $rotated += -13;
              $rotated > 122 && $rotated += -122 + 96;
              $rotated < 97 && $rotated += -96 + 122;
          }
          $result .= chr($rotated);
      }
      return $result;
  }
?>
