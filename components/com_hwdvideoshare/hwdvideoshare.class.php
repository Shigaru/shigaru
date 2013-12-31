<?php
/**
 *    @version [ Nightly Build ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2011 Highwood Design
 *    @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 ***
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for generateVideoDetailsmore details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
define( '_HWD_VS_PLUGIN_COMPS', 214 );

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
class hwdvids_video extends JTable
{
    var $id = null;
  	var $video_type = null;
  	var $video_id = null;
  	var $title = null;
  	var $description = null;
  	var $song_id = null;
  	var $band_id = null;
  	var $language_id = null;
  	var $genre_id = null;
  	var $intrument_id = null;
  	var $level_id = null;	
  	var $ip_added = null;
  	var $original_autor = null;
  	var $tags = null;
  	var $category_id = null;
    var $date_uploaded = null;
  	var $video_length = null;
  	var $allow_comments = null;
  	var $allow_embedding = null;
  	var $allow_ratings = null;
  	var $rating_number_votes = null;
  	var $rating_total_points = null;
  	var $updated_rating = null;
  	var $public_private = null;
  	var $thumb_snap = null;
  	var $thumbnail = null;
  	var $approved = null;
  	var $number_of_views = null;
  	var $number_of_comments = null;
  	var $age_check = null;
  	var $user_id = null;
  	var $password = null;
  	var $featured = null;
  	var $ordering = null;
  	var $checked_out = null;
  	var $checked_out_time = null;
  	var $published = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_video(&$db){
        parent::__construct( '#__hwdvidsvideos', 'id', $db );
	}
}


/**
 * @package    hwdVideoShare
 * @author     SHIGARU 
 * @copyright  SHIGARU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidsalbums extends JTable
{
 	var $id = null;
 	var $external_id = null;
 	var $label = null;
 	var $band_id = null;
 	var $external_url = null;
 	var $thumbnail = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidsalbums(&$db){
        parent::__construct( '#__hwdvidsalbums', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     SHIGARU 
 * @copyright  SHIGARU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidsbands extends JTable
{
 	var $id = null;
 	var $label = null;
 	var $external_url = null;
 	var $external_id = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidsbands(&$db){
        parent::__construct( '#__hwdvidsbands', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     SHIGARU 
 * @copyright  SHIGARU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidssearchlog_term extends JTable
{
 	var $id = null;
 	var $pattern = null;
 	var $count = null;
 	var $last_update = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidssearchlog_term(&$db){
        parent::__construct( '#__hwdvidssearchlog_term', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     SHIGARU 
 * @copyright  SHIGARU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidssearchlog_hits extends JTable
{
 	var $id = null;
 	var $term_id = null;
 	var $user_id = null;
 	var $date_searched = null;
 	var $number_results = null;
 	var $is_refined = null;
 	var $language_id = null;
 	var $type_search = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidssearchlog_hits(&$db){
        parent::__construct( '#__hwdvidssearchlog_hits', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     SHIGARU 
 * @copyright  SHIGARU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidssongs extends JTable
{
 	var $id = null;
 	var $label = null;
 	var $provider = null;
 	var $album_id = null;
 	var $band_id = null;
 	var $external_url = null;
 	var $external_id = null;
 	var $embedding = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidssongs(&$db){
        parent::__construct( '#__hwdvidssongs', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_favs extends JTable
{
	var $id = null;
	var $userid = null;
	var $item_id = null;
	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_favs(&$db){
        parent::__construct( '#__hwdvidsfavorites', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_flagvid extends JTable
{
 	var $id = null;
 	var $userid = null;
 	var $videoid = null;
 	var $status = null;
 	var $ignore = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_flagvid(&$db){
        parent::__construct( '#__hwdvidsflagged_videos', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC2.13
 */
class hwdvids_channel extends JTable
{
 	var $id = null;
 	var $channel_name = null;
 	var $channel_description = null;
 	var $channel_thumbnail = null;
 	var $public_private = null;
 	var $date_created = null;
 	var $date_modified = null;
 	var $user_id = null;
 	var $views = null;
 	var $checked_out = null;
 	var $checked_out_time = null;
 	var $featured = null;
 	var $published = null;
  	var $params = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_channel(&$db){
        parent::__construct( '#__hwdvidschannels', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC2.13
 */
class hwdvids_cats extends JTable
{
 	var $id = null;
 	var $parent = null;
 	var $category_name = null;
 	var $category_description = null;
 	var $date = null;
 	var $access_b_v = null;
 	var $access_u_r = null;
 	var $access_v_r = null;
 	var $access_u = null;
 	var $access_lev_u = null;
 	var $access_v = null;
 	var $access_lev_v = null;
  	var $thumbnail = null;
 	var $num_vids = null;
 	var $num_subcats = null;
    var $order_by = null;
    var $ordering = null;
    var $checked_out = null;
 	var $checked_out_time = null;
 	var $published = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_cats(&$db){
        parent::__construct( '#__hwdvidscategories', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_flaggroup extends JTable
{
 	var $id = null;
 	var $userid = null;
 	var $groupid = null;
 	var $status = null;
 	var $ignore = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_flaggroup(&$db){
        parent::__construct( '#__hwdvidsflagged_groups', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_groupmember extends JTable
{
 	var $id = null;
 	var $memberid = null;
 	var $date = null;
 	var $group_admin = null;
 	var $groupid = null;
 	var $approved = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_groupmember(&$db){
        parent::__construct( '#__hwdvidsgroup_membership', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_group extends JTable
{
 	var $id = null;
 	var $group_name = null;
 	var $public_private = null;
 	var $date = null;
 	var $allow_comments = null;
 	var $require_approval = null;
 	var $group_description = null;
 	var $featured = null;
 	var $adminid = null;
  	var $thumbnail = null;
 	var $total_members = null;
 	var $total_videos = null;
 	var $ordering = null;
 	var $checked_out = null;
 	var $checked_out_time = null;
 	var $published = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_group(&$db){
        parent::__construct( '#__hwdvidsgroups', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_playlist extends JTable
{
 	var $id = null;
 	var $playlist_name = null;
 	var $playlist_description = null;
 	var $playlist_data = null;
 	var $public_private = null;
 	var $date_created = null;
 	var $date_modified = null;
 	var $allow_comments = null;
 	var $user_id = null;
 	var $thumbnail = null;
 	var $featured = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_playlist(&$db){
        parent::__construct( '#__hwdvidsplaylists', 'id', $db );
	}
}


class hwdvidsplaylists_videos extends JTable
{
 	var $id = null;
 	var $playlist_id = null;
 	var $user_id = null;
 	var $item_id = null;
 	var $date_added = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidsplaylists_videos(&$db){
        parent::__construct( '#__hwdvidsplaylists_videos', 'id', $db );
	}
}

class hwdvidslikes extends JTable
{
 	var $id = null;
 	var $user_id = null;
 	var $item_id = null;
 	var $item_type = null;
 	var $date_liked = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidslikes(&$db){
        parent::__construct( '#__hwdvidslikes', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_groupvideo extends JTable
{
 	var $id = null;
 	var $videoid = null;
 	var $groupid = null;
 	var $memberid = null;
 	var $date = null;
 	var $published = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_groupvideo(&$db){
        parent::__construct( '#__hwdvidsgroup_videos', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvids_rating extends JTable
{
 	var $id = null;
 	var $userid = null;
 	var $videoid = null;
 	var $ip = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvids_rating(&$db){
        parent::__construct( '#__hwdvidsrating', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidslogs_views extends JTable
{
 	var $id = null;
 	var $videoid = null;
 	var $userid = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidslogs_views(&$db){
        parent::__construct( '#__hwdvidslogs_views', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidslogs_votes extends JTable
{
 	var $id = null;
 	var $videoid = null;
 	var $userid = null;
 	var $vote = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidslogs_votes(&$db){
        parent::__construct( '#__hwdvidslogs_votes', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidslogs_favours extends JTable
{
 	var $id = null;
 	var $videoid = null;
 	var $userid = null;
 	var $favour = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidslogs_favours(&$db){
        parent::__construct( '#__hwdvidslogs_favours', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidslogs_archive extends JTable
{
 	var $id = null;
 	var $videoid = null;
 	var $views = null;
 	var $number_of_votes = null;
 	var $sum_of_votes = null;
 	var $rating = null;
 	var $favours = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidslogs_archive(&$db){
        parent::__construct( '#__hwdvidslogs_archive', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidsantileech extends JTable
{
 	var $index = null;
 	var $expiration = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidsantileech(&$db){
        parent::__construct( '#__hwdvidsantileech', 'index', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdvidssubs extends JTable
{
 	var $id = null;
 	var $userid = null;
 	var $memberid = null;
 	var $date = null;

    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidssubs(&$db){
        parent::__construct( '#__hwdvidssubs', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4
 */
class hwdvidsplugin extends JTable
{
	/** @var int */
	var $id=null;
	/** @var varchar */
	var $name=null;
	/** @var varchar */
	var $element=null;
	/** @var varchar */
	var $type=null;
	/** @var varchar */
	var $folder=null;
	/** @var varchar */
	var $access=null;
	/** @var int */
	var $ordering=null;
	/** @var tinyint */
	var $published=null;
	/** @var tinyint */
	var $iscore=null;
	/** @var tinyint */
	var $client_id=null;
	/** @var int unsigned */
	var $checked_out=null;
	/** @var datetime */
	var $checked_out_time=null;
	/** @var string */
	var $website=null;
	/** @var int */
	var $playlist_compat=null;
	/** @var text */
	var $params=null;
    /**
     * Constructor
     * @param database A database connector object
     */
	function hwdvidsplugin(&$db){
        parent::__construct( '#__hwdvidsplugin', 'id', $db );
	}
}

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC3.5
 */
class hwd_vs_tools {
    
    
    public static function makeClickableLinks($s) {
			$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" >$3</a>", $s);  
			return $text;  
	}
    
    
    /**
     * Truncates a php string to $length with a suffix
     *
     * @param string $text  the php input string
     * @param int    $length  the truncation length
     * @param string $suffix(optional)  the string to add to the trucated string
     * @return       $code  the trucated string
     */
     
     
	function truncateText( $text, $length, $suffix = "...")
	{
		$text = stripslashes($text);
		if (strlen($text) < $length )
		{
			$code = $text;
		}
		else
		{
			$code = stripslashes($text);
			$code = substr($code,0,$length);

			$gap = strrpos($code,' ');
			if (!empty($gap) && $gap <= $length)
			{
				$code = substr($code,0,$gap);
			}

			$pos = strrpos($code, "&#");
			$acc = strlen($code)-6;

			if ($pos === false)
			{
				$code = $code.$suffix;
			}
			else
			{
				if ($pos > $acc)
				{
					$code = substr($code,0,$pos);
					$code = $code.$suffix;
				}
				else
				{
					$code = $code.$suffix;
				}
			}
		}
		return $code;
	}
    /**
     * Outputs a stop message for frontend user, generally
     * used for error/success messages
     *
     * @param int    $active_menu  the number of the current active menu (1/2/3/4)
     * @param int    $active_usermenu  the number of the current active user navigation menu (0)
     * @param string $title  the title of the message page
     * @param string $message  the body of the message page
     * @param string $icon(optional)  the name of the icon to display
     * @param int    $backlink(optional) display javascript backlink (1/0)
     * @return       Nothing
     */
	function infoMessage( $active_menu, $active_usermenu, $title=_HWDVIDS_TITLE_ERROR, $message ,$icon=null, $backlink=0, $full=1)
	{
		global $smartyvs, $hwdvsAjaxPlayer;

        if ($hwdvsAjaxPlayer)
        {
        	$full = "0";
        }
		hwd_vs_tools::generateActiveLink($active_menu);
		$smartyvs->assign("title", $title);
		$smartyvs->assign("message", $message);
		if ($full == 1) { $smartyvs->assign("full", $message); }
		$smartyvs->assign("icon", URL_HWDVS_IMAGES."icons/".$icon);
		if ($backlink) {
		$smartyvs->assign("backlink", "<a href=\"javascript: history.go(-1)\">"._HWDVIDS_BACKLINK."</a><br /><br />");
		}

		$uri = JFactory::getURI();
		$url = $uri->toString(array('path', 'query', 'fragment'));
		$smartyvs->assign("session_token", JHTML::_( 'form.token' ));
		$smartyvs->assign("session_return", base64_encode($url));

		$smartyvs->display('infomessage.tpl');
		return;
    }
    /**
     * Generates a link to category using $cat_id, and generates the
     * category name if necessary
     *
     * @param int    $cat_id  the category id
     * @param string $category(optional)  the name of the category
     * @return       $code  the html category link
     */
	function generateCategoryLinks( $video )
	{
		global $hwdvsItemid;
		$db = & JFactory::getDBO();
		$c = hwd_vs_Config::get_instance();

		$code = null;

		$query = "SELECT * FROM #__hwdvidsvideo_category WHERE videoid = $video->id";
		$db->SetQuery($query);
		$rows = $db->loadObjectList();

		if (count($rows) > 0)
		{
			for ($i=0, $n=count($rows); $i < $n; $i++)
			{
				$row = $rows[$i];
				$code.= hwd_vs_tools::generateCategoryLink($row->categoryid);
				$code.= ",&nbsp;";

			}
		}
		else
		{
			$code = hwd_vs_tools::generateCategoryLink($video->category_id);

		}
		$code = trim($code);
		return $code;
    }
    /**
     * Generates a link to category using $cat_id, and generates the
     * category name if necessary
     *
     * @param int    $cat_id  the category id
     * @param string $category(optional)  the name of the category
     * @return       $code  the html category link
     */
	function generateCategoryLink( $cat_id, $category=null, $hwd_vs_itemid=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$code = null;

		if ($hwd_vs_itemid == null) { $hwd_vs_itemid=$hwdvsItemid; }

		if ($cat_id == 0)
		{
			return _HWDVIDS_TEXT_NONE;
		}
		$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewcategory&Itemid=".$hwd_vs_itemid."&cat_id=".$cat_id)."\">";
		if (isset($category)) {
			$code.= hwd_vs_tools::truncateText($category, $c->truntitle);
		} else {
			$code.= hwd_vs_tools::generateCategory( $cat_id );
		}
		$code.= "</a>";
		return $code;
    }
    /**
     * Retrieves video info from external URL
     * category name if necessary
     *
     * @param string    $embeddump  the external video URL
     * @param boolean 	$admin_import(optional)  is the function called from admin?
     * @return       $oThirdPartyVideoInfo  Object of video info
     */
	function getThirdPartyVideoInfo( $embeddump,$admin_import=false )
	{
		global $hwdvsItemid, $j15, $j16;
		$db = & JFactory::getDBO();
		$oThirdPartyVideoInfo;
		$remote_verified = null;
		$app = JFactory::getApplication();
		
		$parsedurl = parse_url($embeddump);
		if (empty($parsedurl['host'])) { $parsedurl['host'] = ''; }
		preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $parsedurl['host'], $regs);
		if (empty($regs['domain'])) { $regs['domain'] = ''; }
		$oDomain = $regs['domain'];
		if (empty($oDomain)) { $oDomain = ''; }
		
		switch ($oDomain) {
				case 'youtube.com':
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'youtube.php');
					break;
				case 'google.com':
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'google.php');
					break;
				case 'metacafe.com':
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'metacafe.php');
					break;
				default:
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'remote.php');
					break;
			}
		
		$failures = "";
		if (!isset($remote_verified)) {

			$cn = 'hwd_vs_tp_'.preg_replace("/[^a-zA-Z0-9s_-]/", "", $oDomain);
			$f_processc = preg_replace("/[^a-zA-Z0-9s_-]/", "", $oDomain).'processCode';
			
			$f_processvideo = preg_replace("/[^a-zA-Z0-9s_-]/", "", $oDomain).'processVideo';

			$tp = new $cn();

			$ext_v_code  = $tp->$f_processc($embeddump);
			//check if already exists
			$db->SetQuery( 'SELECT * FROM #__hwdvidsvideos WHERE video_id = "'.$ext_v_code[1].'"' );
			$duplicatecount = $db->loadResult();
			
			if ($duplicatecount > 0 && $admin_import == false) {
				$srows = $db->loadObjectList();
				$descriptiontrunc = addslashes(hwd_vs_tools::truncateText(strip_tags($rows[0]->description), 90));
				$videolink 	= hwd_vs_tools::generateVideoLink($srows[0]->id,stripslashes($srows[0]->title), $hwdvsItemid, null, 10000); 
				$videothumb = hwd_vs_tools::generateVideoThumbnailLink($srows[0]->id, $srows[0]->video_id, $srows[0]->video_type, $srows[0]->thumbnail, 0, '100', null, null, null, $hwdvsItemid, null, $descriptiontrunc, null, $row[0]->video_length,$rows[0]->category_id);	
				$app->enqueueMessage('<p class="shigarunotice"><span class="close"></span><span class="fontbold fontblack f90 mbot20">'._HWDVIDS_TITLE_UPLDFAIL.'</span>'._HWDVIDS_ALERT_DUPLICATE.'<div class="mtop12 clear mbot6">'._HWDVIDS_ALERT_DUPLICATELINK.'</div><div class="fleft">'.$videothumb.'</div><div class="fleft mtop25 mleft12 f120">'.$videolink.'</div><div class="clear"></div></p>','');
				$doc = JFactory::getDocument();
				$script=array();
				$script[]='jQuery(document).ready(function($){';
				$script[]="\tjQuery('.shigarunotice .close').click(function(){jQuery(this).parents('#system-message').fadeOut('slow');});";
				$script[]='});';
				$doc->addScriptDeclaration(implode("\n",$script));
				//hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_DUPLICATE, "exclamation.png", 0);
				return;
			} else if ($duplicatecount > 0 && $admin_import == true) {
				return false;
			}

			$oThirdPartyVideoInfo = $tp->$f_processvideo($embeddump, @$ext_v_code[1]);

			if ($oThirdPartyVideoInfo->error_msg != '') {$failures.=$oThirdPartyVideoInfo->error_msg."<br />";}

		} else if ($remote_verified == 0) {

			$error_msg = _HWDVIDS_ERROR_UPLDERR11."<br /><br />"._HWDVIDS_INFO_SUPPTPW."<br />".hwd_vs_tools::generateSupportedWebsiteList();
			hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, $error_msg, "exclamation.png", 1);
			return;

		}

		/*$title 			= hwd_vs_tools::generatePostTitle($ext_v_title[1]);
		$description 	= hwd_vs_tools::generatePostDescription($ext_v_descr[1]);
		$tags 			= hwd_vs_tools::generatePostTags($ext_v_keywo[1]);*/
		
		
		return $oThirdPartyVideoInfo;
		
    }
    
    
     /**
     * Generates a link to category using $cat_id, and generates the
     * category name if necessary
     *
     * @param int    $video_id  the category id
     * @param string $video(optional)  the name of the video
     * @return       $code  the html video link
     */
	function generateVideoLink( $video_id, $video=null, $hwdvs_itemid=null, $onclick_js=null, $truntitle=null, $alttext=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		if ($hwdvs_itemid == null) { $hwdvs_itemid = $hwdvsItemid; }

		if (!empty($onclick_js)) {
			$onclick_txt="onclick=\"".$onclick_js."(".$video_id.");return false;\"";
			$link="#video";
		} else {
			$onclick_txt="";
			$link=JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=".$hwdvs_itemid."&video_id=".$video_id);
		}
		$linktitle = '';
		if($alttext)
			$linktitle = " title=\"".$alttext."\" ";
		$code = null;
		$code.= "<a href=\"".$link."\" ".$onclick_txt."".$linktitle.">";
		if (isset($video)) {
			$code.= hwd_vs_tools::truncateText($video, $truntitle);
		} else {
			$code.= "0";
		}
		$code.= "</a>";
		return $code;
    }
    
    /**
     * Generates the name of a category from the $cat_id
     *
     * @param int    $cat_id  the joomla component name
     * @return       $code  the name of the category
     */
	function generateCategory( $cat_id ) {
		global $catnames;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();

		if ($cat_id == 0) {
			$code = _HWDVIDS_TEXT_NONE;
		}
		if (!isset($catnames)) {
			// get category name
			$query = 'SELECT id, category_name FROM #__hwdvidscategories';
			$db->SetQuery( $query );
			$catnames = $db->loadObjectList();
 		}
		$code = _HWDVIDS_TEXT_NONE;
		for ($i=0, $n=count($catnames); $i < $n; $i++) {
			$row = $catnames[$i];
			if ($row->id == $cat_id) {
				$code = $row->category_name;
				break;
			}
		}
		return $code;
    }
    /**
     * Generates a linked thumbnail for category id $row->id
     *
     * @param array  $row  the category details from sql
     * @param int    $k  current css tag
     * @param int    $width  width of the thumbnail
     * @param int    $height  height of the thumbnail
     * @param string $class  class for thumbnail (not link)
     * @param string $target(optional)  the target for the link
     * @return       $code
     */
	function generateCategoryThumbnailLink( $row, $k, $width, $height, $class, $target="_top", $passedItemid=null)
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		if (!empty($passedItemid))
		{
			$hwdvsItemid = $passedItemid;
		}

		if ($row->thumbnail == '')
                {
                    if ($c->multiple_cats == "1")
                    {
                        $query = 'SELECT *'
                                    . ' FROM #__hwdvidsvideos as video'
                                    . ' LEFT JOIN #__hwdvidsvideo_category AS cmap ON cmap.videoid = video.id'
                                    . ' WHERE cmap.categoryid = '.$row->id
                                    . ' AND video.published = 1'
                                    . ' AND video.approved = "yes"'
                                    . ' ORDER BY video.date_uploaded DESC'
                                    . ' LIMIT 0, 1'
                                    ;
			$db->SetQuery($query);
			$latestcatvid = $db->loadObject();
                    }

		    if (empty($latestcatvid->id))
                    {
                        $query = 'SELECT *'
                                    . ' FROM #__hwdvidsvideos'
                                    . ' WHERE category_id = '.$row->id
                                    . ' AND published = 1'
                                    . ' AND approved = "yes"'
                                    . ' ORDER BY date_uploaded DESC'
                                    . ' LIMIT 0, 1'
                                    ;

			$db->SetQuery($query);
			$latestcatvid = $db->loadObject();
                    }


			if (empty($latestcatvid->id)) {$latestcatvid->id=null;}
			if (empty($latestcatvid->video_id)) {$latestcatvid->video_id=null;}
			if (empty($latestcatvid->video_type)) {$latestcatvid->video_type=null;}
			if (empty($latestcatvid->thumbnail)) {$latestcatvid->thumbnail=null;}
			$code = null;
			$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewcategory&Itemid=".$hwdvsItemid."&cat_id=".$row->id)."\">";
			$code.= hwd_vs_tools::generateThumbnail( $latestcatvid->id, $latestcatvid->video_id, $latestcatvid->video_type, $latestcatvid->thumbnail, $k, $width, $height, $class );
			$code.= "</a>";
		} else {
			$code = null;
			$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewcategory&Itemid=".$hwdvsItemid."&cat_id=".$row->id)."\">";
			$code.= hwd_vs_tools::generateThumbnail( null, null, "category", $row->thumbnail, $k, $width, $height, $class );
			$code.= "</a>";
		}
		return $code;
    }
    /**
     * Generates a linked thumbnail for group id $row->id
     *
     * @param array  $row  the group details from sql
     * @param int    $k  current css tag
     * @param int    $width  width of the thumbnail
     * @param int    $height  height of the thumbnail
     * @param string $class  class for thumbnail (not link)
     * @param string $target(optional)  the target for the link
     * @return       $code
     */
	function generateGroupThumbnailLink( $row, $k, $width, $height, $class, $target="_top")
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		$query = 'SELECT a.video_id, a.id, a.video_type, a.thumbnail'
				. ' FROM #__hwdvidsvideos AS a'
				. ' LEFT JOIN #__hwdvidsgroup_videos AS l ON l.videoid = a.id'
				. ' WHERE l.groupid = '.$row->id
				. ' AND a.published = 1'
				. ' AND a.approved = "yes"'
				. ' ORDER BY a.date_uploaded'
				. ' LIMIT 0, 1'
				;
		$db->SetQuery($query);
		$group_video = $db->loadObject();
		if (empty($group_video->id)) { $group_video->id=null; }
		if (empty($group_video->video_id)) { $group_video->video_id=null; }
		if (empty($group_video->video_type)) { $group_video->video_type=null; }
		if (empty($group_video->thumbnail)) { $group_video->thumbnail=null; }
		$code = null;
		$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewgroup&Itemid=".$hwdvsItemid."&group_id=".$row->id)."\">";
		$code.= hwd_vs_tools::generateThumbnail( $group_video->id, $group_video->video_id, $group_video->video_type, $group_video->thumbnail, $k, $width, $height, $class );
		$code.= "</a>";
		return $code;
		return $code;
    }
    /**
     * Generates a linked thumbnail for group id $row->id
     *
     * @param array  $row  the group details from sql
     * @param int    $k  current css tag
     * @param int    $width  width of the thumbnail
     * @param int    $height  height of the thumbnail
     * @param string $class  class for thumbnail (not link)
     * @param string $target(optional)  the target for the link
     * @return       $code
     */
	function generatePlaylistThumbnailLink( $row, $k, $width, $height, $class, $target="_top")
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		if (!empty ($row->playlist_data))
		{
			$videos = explode(",", $row->playlist_data);
			$video_id = intval(@$videos[0]);

			$query = "SELECT video_id, id, video_type, thumbnail"
					. " FROM #__hwdvidsvideos"
					. " WHERE id = $video_id"
					. " AND published = 1"
					. " AND approved = \"yes\""
					;
			$db->SetQuery($query);
			$playlist_video = $db->loadObject();
		}
		else
		{
			$playlist_video = null;
		}

		if (empty($playlist_video->id)) { $playlist_video->id=null; }
		if (empty($playlist_video->video_id)) { $playlist_video->video_id=null; }
		if (empty($playlist_video->video_type)) { $playlist_video->video_type=null; }
		if (empty($playlist_video->thumbnail)) { $playlist_video->thumbnail=null; }

		$code = null;
		$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewPlaylist&Itemid=".$hwdvsItemid."&playlist_id=".$row->id)."\">";
		$code.= hwd_vs_tools::generateThumbnail( $playlist_video->id, $playlist_video->video_id, $playlist_video->video_type, $playlist_video->thumbnail, $k, $width, $height, $class );
		$code.= "</a>";
		return $code;
		return $code;
    }
    /**
     * Generates a linked thumbnail for video id $video_id
     *
     * @param int    $video_id  the id of the video
     * @param string $video_code  the name of the video file (excluding ext)
     * @param string $video_type  the video type tag
     * @param int    $k  current css tag
     * @param int    $width  width of the thumbnail
     * @param int    $height  height of the thumbnail
     * @param string $class  class for thumbnail (not link)
     * @param string $target(optional)  the target for the link
     * @return       $code
     */
	function generateVideoThumbnailLink( $video_id, $video_code, $video_type, $video_thumbnail, $k, $width, $height, $class, $target="_top", $hwdvs_itemid=null, $onclick_js=null, $tooltip_data=null, $lightbox=false, $video_duration=null,$category_id=null)
	{
		global $option, $hwdvsItemid, $smartyvs, $mooVersion;
		$doc = & JFactory::getDocument();
		$c = hwd_vs_Config::get_instance();

		if ($hwdvs_itemid == null) { $hwdvs_itemid = $hwdvsItemid; }

		if (!empty($onclick_js))
		{
			$onclick_txt="onclick=\"".$onclick_js."(".$video_id.");return false;\"";
			$link="#video";
		}
		else
		{
			$onclick_txt="";
			$link=JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=".$hwdvs_itemid."&video_id=".$video_id);
		}

		if (!empty($lightbox))
		{
			$link=JRoute::_("index.php?option=com_hwdvideoshare&task=grabajaxplayer&Itemid=".$hwdvs_itemid."&video_id=".$video_id."&template=multibox");

			//if (!defined( 'HWDVS_LB' ))
                        if (1 == 1)
			{
				
			}

			$v_width = intval($c->flvplay_width)+15;
			$v_height = intval($v_width*$c->var_fb)+20;

			$code = null;
			
			$code.= '<a href="'.$link.'" class="'.$lightbox.'" id="mb'.$video_id.'" title="'.$tooltip_data[2].'" rel="[images],width:'.$v_width.',height:'.$v_height.'">';
			$code.= hwd_vs_tools::generateThumbnail( $video_id, $video_code, $video_type, $video_thumbnail, $k, $width, $height, $class, null, $video_duration );
			$code.= '</a>';

  			return $code;
		}

		$code = null;
		$code.= '<a href="'.$link.'" class="thumbplay" title="'.$tooltip_data[2].'"></a>
				 <div class="song_options">
						<a title="Add to Favorites" class="collection  textToggle"></a>
						<a class="options" title="Options" class="options selectbox"></a>
					</div>
					<a rel="1" class="play paused"></a>';
		if(!$width)			
			$width = '120';
		$classcategory = '';
		$textcategory = '';
		switch(intval($category_id)){
			case 1:
				$classcategory = 'tuto';
				$textcategory  = 'Song Tutorial';
				break;
			case 2:
				$classcategory = 'nontuto';
				$textcategory  = 'Watch me play';
				break;
			case 3:
				$classcategory = 'theory';
				$textcategory  = 'Theory';
				break;
		}	
		$code.= "<a href=\"".$link."\" ".$onclick_txt." title=\"".$tooltip_data[2]."\"><span style=\"width:".$width."px\" class=\"categoryinfothumb ".$classcategory." \">".$textcategory."</span>";
		$code.= hwd_vs_tools::generateThumbnail( $video_id, $video_code, $video_type, $video_thumbnail, $k, $width, $height, $class, $tooltip_data, $video_duration );
		$code.= "</a>";

		return $code;
    }
    /**
     * Generates the video url for the Permalink
     *
     * @param array  $row  the group details from sql
     * @return       $code  the Permalink
     */
	function generateVideoUrl( $row )
	{
		global $hwdvsItemid, $smartyvs;

		$code = null;

			$code.= JURI::root()."index.php?option=com_hwdvideoshare&amp;task=viewvideo&amp;Itemid=".$hwdvsItemid."&amp;video_id=".$row->id;
			$smartyvs->assign("showShareButton", 1);
			$smartyvs->assign("print_videourl", 1);
		

		return $code;
    }
    
    function showTabContent($paramTab,$paramListType = 'dbo',$paramWhen = 'alltime'){
		global $hwdvsTemplateOverride;
		$oVideoListObjects;
		$oVideoList;
		$html;
		switch($paramListType){
			case 'xml':
				$html = hwd_vs_tools::renderTabXmlContent($paramTab,$paramWhen);
				break;
			case 'dbo':
				$html = hwd_vs_tools::renderSqlContent($paramTab,$paramWhen);
				break;	
			case 'tags':
				$html = hwd_vs_tools::renderTagsContent($paramTab,$paramWhen);
				break;	
			case 'being':
				$html = hwd_vs_tools::getBeingWatchedNow();
				break;	
			case 'rendermod':
				$html = hwd_vs_tools::renderModContent($paramTab,$paramWhen);
				break;	
			}
		return $html;
		}
	
	function getModuleTags($paramTable,$paramWhen) {
		$ofunc 			= 'get'.$paramTable.'Tags';
		return hwd_vs_tools::$ofunc();
    }
    
    function renderModContent($paramTab,$paramWhen){
		jimport( 'joomla.application.module.helper' );
		$oModName	 		= str_replace("shiggymod", "", $paramTab);
		$oRenderedMod 		= '';
		$oModToRender 		= '';
		if(strpos($paramTab,'--')){
			$oModSplit		= explode("--", $oModName);
			$oModToRender 	= JModuleHelper::getModule( $oModSplit[0], $oModSplit[1] );
			}else
				$oModToRender = JModuleHelper::getModule($oModName);
		$oRenderedMod = JModuleHelper::renderModule($oModToRender);
		return $oRenderedMod;
		}
		
	function renderTagsContent($paramTab,$paramWhen){
		$oRenderedTags 	= '';
		$tabname 	  	= str_replace("tags", "", $paramTab);
		$oModuleTags 	= hwd_vs_tools::getModuleTags($tabname,$paramWhen);
		$oRenderedTags 	= hwd_vs_tools::concatenateWords($oModuleTags);
		$oRenderedTags 	= hwd_vs_tools::filterWords($oRenderedTags);
		$oRenderedTags 	= hwd_vs_tools::parseTagsString($oRenderedTags,50);
		$oRenderedTags 	= hwd_vs_tools::outputWords($oRenderedTags,10,25);
		return $oRenderedTags;
		}	
		
	function renderSqlContent($paramTab,$paramWhen){
		global $Itemid, $smartyvs;
		$oHtml = '';
		$oRows;
		if(strpos($paramTab,'cent'))
			$oRows = hwd_vs_tools::getMostRecent($paramWhen);
			else
				$oRows = hwd_vs_tools::getMostCommented($paramWhen);
		$oRowsObject = hwd_vs_tools::generateVideoListFromSql($oRows, null, '100');
		foreach($oRowsObject as $video){
					$smartyvs->assign("data", $video);
					$smartyvs->assign("modtoload", $paramTab);
					$oHtml .= $smartyvs->fetch('video_list_small_viewed.tpl');
				}
		 return $oHtml;
		}	
		
	function renderTabXmlContent($paramTab,$paramWhen){
		global $Itemid, $smartyvs;
		$oHtml = '';
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xmlparse.class.php');
			$parser = new HWDVS_xmlParse();
			$oVideoListObjects 	= $parser->parse($paramTab.'_'.$paramWhen);
			$oVideoList  		= hwd_vs_tools::generateVideoListFromXml($oVideoListObjects,'100');
			foreach($oVideoList as $video){
					$smartyvs->assign("data", $video);
					$smartyvs->assign("modtoload", $paramTab);
					$oHtml .= $smartyvs->fetch('video_list_small_viewed.tpl');
				}
		 return $oHtml;	
		}
		
		
    
    /**
     * Generates the array of information for a standard group list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @return       $code  the array prepared for Smarty template
     */
	function generateGroupListFromSql( $rows )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = array();
		$k = 0;
		for ($i=0, $n=count($rows); $i < $n; $i++) {
			$row = $rows[$i];

			if (!isset($row->avatar)) { $row->avatar=null; }

			$code[$i]->thumbnail = hwd_vs_tools::generateGroupThumbnailLink($row, $k, null, null, null);
			$code[$i]->avatar = hwd_vs_tools::generateAvatar($row->adminid, $row->avatar, $k, null, null, null);
			$code[$i]->grouptitle = hwd_vs_tools::generateGroupLink($row->id, $row->group_name);
			$code[$i]->groupdescription = hwd_vs_tools::truncateText(strip_tags($row->group_description), $c->trunvdesc);
			$code[$i]->totalmembers = $row->total_members;
			$code[$i]->totalvideos = $row->total_videos;
			$code[$i]->administrator = hwd_vs_tools::generateUserFromID($row->adminid, $row->username, $row->name);
			$code[$i]->groupmembership = hwd_vs_tools::generateGroupMembershipStatus($row);
			$code[$i]->reportgroup = hwd_vs_tools::generateReportGroupButton($row);
			$code[$i]->datecreated = $row->date;
			$code[$i]->deletegroup = hwd_vs_tools::generateDeleteGroupLink($row);
			$code[$i]->editgroup = hwd_vs_tools::generateEditGroupLink($row);
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    /**
     * Generates the array of information for a standard group list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @return       $code  the array prepared for Smarty template
     */
	function generateChannelListFromSql( $rows )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = array();
		$k = 0;
		for ($i=0, $n=count($rows); $i < $n; $i++) {
			$row = $rows[$i];

			$code[$i]->channel_name = $row->channel_name;
			$code[$i]->channel_link = JRoute::_("index.php?option=com_hwdvideoshare&Itemid=$hwdvsItemid&task=viewchannel&user_id=$row->user_id");
			$code[$i]->channel_description = $row->channel_description;
			$code[$i]->deletechannel = null;
			$code[$i]->editchannel = hwd_vs_tools::generateEditChannelLink($row);
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    /**
     * Generates the array of information for a standard group list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @return       $code  the array prepared for Smarty template
     */
	function generatePlaylistListFromSql( $rows )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = array();
		$k = 0;
		for ($i=0, $n=count($rows); $i < $n; $i++) {
			$row = $rows[$i];

			if (!isset($row->avatar)) { $row->avatar=null; }

			$code[$i]->thumbnail = hwd_vs_tools::generatePlaylistThumbnailLink($row, $k, null, null, null);
			$code[$i]->avatar = hwd_vs_tools::generateAvatar($row->user_id, $row->avatar, $k, null, null, null);
			$code[$i]->playlisttitle = hwd_vs_tools::generatePlaylistLink($row->id, $row->playlist_name);
			$code[$i]->playlistdescription = hwd_vs_tools::truncateText(strip_tags($row->playlist_description), $c->trunvdesc);
			$code[$i]->totalvideos = $row->total_videos;
			//$code[$i]->user = hwd_vs_tools::generateUserFromID($row->user_id, $row->username, $row->name);
			$code[$i]->datecreated = $row->date_created;
			$code[$i]->deleteplaylist = hwd_vs_tools::generateDeletePlaylistLink($row);
			$code[$i]->editplaylist = hwd_vs_tools::generateEditPlaylistLink($row);
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    
    /**
     * Generates the array of information for a standard video list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @param string $thumbclass(optional)  the class for the thumbnail images
     * @param int    $thumbwidth(optional)  the thumbnail width
     * @param int    $thumbheight(optional)  the thumbnail height
     * @return       $code  the array prepared for Smarty template
     */
    function generateUserListFromSql( $rows, $thumbclass=null, $thumbwidth=null, $thumbheight=null, $hwdvs_itemid=null, $onclick_js=null, $tooltip=null, $or_title_trunc=null, $or_descr_trunc=null, $lightbox=false)
    {
		global $hwdvsTemplateOverride;
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		$c = hwd_vs_Config::get_instance();

		for ($i=0, $n=count($rows); $i < $n; $i++)
		{
			$row = $rows[$i];

			

			if (!isset($row->avatar)) {                                $code->avatar = null; }
			if (!isset($row->username)) {                              $row->username = ''; }
			if (!isset($row->name)) {                                  $row->name = ''; }

			$code[$i]->avatar = hwd_vs_tools::generateAvatar($row->user_id, $row->avatar, $k, $width, $height, $class); 
			$code[$i]->userlink = hwd_vs_tools::generateUserFromID($row->user_id, $row->username, $row->name); 
			//if ($hwdvsTemplateOverride['show_timesince']) {            $code[$i]->timesince = hwd_vs_tools::generateTimeSinceUpload($row->date_uploaded); }
			$code[$i]->member_since = strftime("%l%P - %b %e, %Y", strtotime($row->registerDate));
			$code[$i]->last_login = strftime("%l%P - %b %e, %Y", strtotime($row->lastvisitDate));
			$code[$i]->cb_age = $row->cb_youragegroup;
			$code[$i]->cb_country = $row->cb_country;
			$code[$i]->cb_language = $row->cb_language;
			$code[$i]->instruments = $row->cb_instruplay.''.$row->cb_instrulearn;
			$code[$i]->teacher = $row->cb_instruteach;
			$code[$i]->cb_favmusicgenre = $row->cb_favmusicgenre;
			//if ($hwdvsTemplateOverride['show_tags']) {                 $code[$i]->tags	= hwd_vs_tools::generateTagListString($row->tags); }
			
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    
    /**
     * Generates the array of information for a standard video list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @param string $thumbclass(optional)  the class for the thumbnail images
     * @param int    $thumbwidth(optional)  the thumbnail width
     * @param int    $thumbheight(optional)  the thumbnail height
     * @return       $code  the array prepared for Smarty template
     */
    function generateVideoListFromSql( $rows, $thumbclass=null, $thumbwidth=null, $thumbheight=null, $hwdvs_itemid=null, $onclick_js=null, $tooltip=null, $or_title_trunc=null, $or_descr_trunc=null, $lightbox=false)
    {
		global $hwdvsTemplateOverride;
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		$c = hwd_vs_Config::get_instance();

		if (isset($tooltip) && !$tooltip)
		{
			$tooltip = 0;
		}
		else if ($tooltip || $c->show_tooltip == "1")
		{
			$tooltip = 1;
		}

		$code = array();
		$k = 0;
		if (isset($thumbwidth)) { $twidth = $thumbwidth; } else { $twidth = null; }
		if (isset($thumbheight)) { $theight = $thumbheight; } else { $theight = null; }
		if (isset($thumbclass)) { $tclass = $thumbclass; } else { $tclass = null; }
		if (isset($or_title_trunc) && !empty($or_title_trunc)) { $truntitle = $or_title_trunc; } else { $truntitle = $c->truntitle; }
		if (isset($or_descr_trunc) && !empty($or_descr_trunc)) { $trunvdesc = $or_descr_trunc; } else { $trunvdesc = $c->trunvdesc; }
		$width = null;
		$height = null;
		$class = null;
		$tooltip_data = null;

		for ($i=0, $n=count($rows); $i < $n; $i++)
		{
			$row = $rows[$i];

			if ($c->bviic == 1)
			{
				if (!hwd_vs_tools::validateVideoAccess($row, false))
				{
					continue;
				}
			}

			if (!isset($row->avatar)) {                                $row->avatar = null; }
			if (!isset($row->username)) {                              $row->username = ''; }
			if (!isset($row->name)) {                                  $row->name = ''; }

			if ($hwdvsTemplateOverride['show_avatar'] == 1) {          $code[$i]->avatar = hwd_vs_tools::generateAvatar($row->user_id, $row->avatar, $k, $width, $height, $class); }
			if ($hwdvsTemplateOverride['show_title']) {                $code[$i]->title = hwd_vs_tools::generateVideoLink( $row->id, $row->title, $hwdvs_itemid, $onclick_js, $truntitle); }
			if ($hwdvsTemplateOverride['show_category'])
			{
				if ($c->multiple_cats == "1")
				{
					$code[$i]->category = hwd_vs_tools::generateCategoryLinks($row);
				}
				else
				{
					$code[$i]->category = hwd_vs_tools::generateCategory($row->category_id);
				}
			}
			if ($hwdvsTemplateOverride['show_description']) {          $code[$i]->description = hwd_vs_tools::truncateText(strip_tags(stripslashes($row->description)), $trunvdesc); }

			$tooltip_data[0] = $tooltip;
			$tooltip_data[1] = htmlspecialchars(strip_tags(stripslashes($row->title)));
			$tooltip_data[2] = hwd_vs_tools::truncateText(htmlspecialchars(strip_tags(stripslashes($row->description))), $trunvdesc);

			if ($hwdvsTemplateOverride['show_rating'] == 1 && $row->allow_ratings == 1 && $c->showrate == 1)
			{
				$code[$i]->rating = hwd_vs_tools::generateRatingImg($row->updated_rating);
				$code[$i]->showrating = 1;
			}

			if ($hwdvsTemplateOverride['show_thumbnail'] == 1) {       $code[$i]->thumbnail = hwd_vs_tools::generateVideoThumbnailLink($row->id, $row->video_id, $row->video_type, $row->thumbnail, $k, $twidth, $theight, $tclass, null, $hwdvs_itemid, $onclick_js, $tooltip_data, $lightbox, $row->video_length,$row->category_id); }
			if ($hwdvsTemplateOverride['show_views']) {                $code[$i]->views = $row->number_of_views; }
			$code[$i]->comments = $row->number_of_comments;
			$code[$i]->duration = $row->video_length;
			if ($hwdvsTemplateOverride['show_uploader']) {             $code[$i]->uploader = hwd_vs_tools::generateUserFromID($row->user_id, $row->username, $row->name); }
			if ($hwdvsTemplateOverride['show_timesince']) {            $code[$i]->timesince = hwd_vs_tools::generateTimeSinceUpload($row->date_uploaded); }
			if(strtotime($row->date_uploaded))
				$code[$i]->upload_date = hwd_vs_tools::getAgoDate(strtotime($row->date_uploaded));
				else
						$code[$i]->upload_date = hwd_vs_tools::getAgoDate($row->date_added);
			if ($hwdvsTemplateOverride['show_tags']) {                 $code[$i]->tags	= hwd_vs_tools::generateTagListString($row->tags); }
			$code[$i]->titleplain = htmlspecialchars(strip_tags(stripslashes($row->title)));
			$code[$i]->titletrunc = hwd_vs_tools::generateVideoLink( $row->id, $row->title, $hwdvs_itemid, null, 35,$code[$i]->titleplain);
			$code[$i]->descriptiontrunc = hwd_vs_tools::truncateText(htmlspecialchars(strip_tags(stripslashes($row->description))), 90);
			$code[$i]->deletevideo = hwd_vs_tools::generateDeleteVideoLink($row);
			$code[$i]->editvideo = hwd_vs_tools::generateEditVideoLink($row);
			$code[$i]->publishvideo = hwd_vs_tools::generatePublishVideoLink($row);
			$code[$i]->approvevideo = hwd_vs_tools::generateApproveVideoLink($row);
			$oSide = hwd_vs_tools::generateSideDetails($row);
			$code[$i]->counter = $i;
			$code[$i]->genre = $oSide->genre;
			$code[$i]->level = $oSide->level;
			$code[$i]->instrument = $oSide->instrument;
			$code[$i]->language = $oSide->language;
			
			
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    
    function getAgoDate($date){
		$stf = 0;
		$cur_time = time();
		$diff = $cur_time - $date;
		$phrase = array('second','minute','hour','day','week','month','year','decade');
		$length = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		for($i =sizeof($length)-1; ($i >=0)&&(($no =  $diff/$length[$i])<=1); $i--); if($i < 0) $i=0; $_time = $cur_time  -($diff%$length[$i]);
		$no = floor($no); if($no <> 1) $phrase[$i] .='s'; $value=sprintf("%d %s ",$no,$phrase[$i]);
		if(($stf == 1)&&($i >= 1)&&(($cur_tm-$_time) > 0)) $value .= time_ago($_time);
		return $value.' ago ';
	}
    
    /**
     * Generates the array of information for a standard video list from parsed xml files
     *
     * @param array  $rows  the list from an xml file
     * @return       $code  the array prepared for Smarty template
     */
	function generateVideoListFromXml( $rows, $thumbwidth=null, $hwdvs_itemid=null, $tooltip=null, $or_title_trunc=null, $or_descr_trunc=null, $onclick_js=null, $lightbox=false )
	{
		global $hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();

		if ($tooltip == 1 || $c->show_tooltip == "1")
		{
			$tooltip = 1;
		}
		else
		{
			$tooltip = 0;
		}

		$code = array();
		$k = 0;

		if (isset($thumbwidth)) { $twidth = $thumbwidth; } else { $twidth = $c->thumbwidth; }
		$theight = $twidth*$c->tar_fb;

		if (isset($or_title_trunc) && !empty($or_title_trunc)) { $truntitle = $or_title_trunc; } else { $truntitle = $c->truntitle; }
		if (isset($or_descr_trunc) && !empty($or_descr_trunc)) { $trunvdesc = $or_descr_trunc; } else { $trunvdesc = $c->trunvdesc; }
		$class=null;
		$width=null;
		$height=null;

		for ($i=0, $n=count($rows); $i < $n; $i++)
		{
			$row = $rows[$i];
			
				
			if (empty($rows[$i]["id"])) {$rows[$i]["id"] = null;}
			if (empty($rows[$i]["videotitle"])) {$rows[$i]["videotitle"] = null;}
			if (empty($rows[$i]["videocode"])) {$rows[$i]["videocode"] = null;}
			if (empty($rows[$i]["videotype"])) {$rows[$i]["videotype"] = null;}
			if (empty($rows[$i]["thumbnail"])) {$rows[$i]["thumbnail"] = null;}
			if (empty($rows[$i]["location"])) {$rows[$i]["location"] = null;}
			if (empty($rows[$i]["category"])) {$rows[$i]["category"] = null;}
			if (empty($rows[$i]["category_id"])) {$rows[$i]["category_id"] = null;}
			if (empty($rows[$i]["description"])) {$rows[$i]["description"] = null;}
			if (empty($rows[$i]["views"])) {$rows[$i]["views"] = null;}
			if (empty($rows[$i]["numfavoured"])) {$rows[$i]["numfavoured"] = null;}
			if (empty($rows[$i]["date"])) {$rows[$i]["date"] = null;}
			if (empty($rows[$i]["duration"])) {$rows[$i]["duration"] = null;}
			if (empty($rows[$i]["avatar"])) {$rows[$i]["avatar"] = null;}
			if (empty($rows[$i]["rating"])) {$rows[$i]["rating"] = null;}
			if (empty($rows[$i]["uploader"])) {$rows[$i]["uploader"] = null;}
			if (empty($rows[$i]["uploader_id"])) {$rows[$i]["uploader_id"] = null;}
			if (empty($rows[$i]["description"])) {$rows[$i]["description"] = null;}
			if (empty($rows[$i]["duration"])) {$rows[$i]["duration"]= "0:00";}
			if (empty($rows[$i]["comments"])) {$rows[$i]["comments"]= "0";}
			if (empty($rows[$i]["tags"])) {$rows[$i]["tags"] = null;}
	
			$video_code = explode(",", $rows[$i]["videocode"]);
			if (!empty($video_code[1]))
			{
				$video_code[1] = urldecode($video_code[1]);
				$rows[$i]["videocode"] = implode(",", $video_code);
			}

			$tooltip_data[0] = $tooltip;
			$tooltip_data[1] = addslashes(strip_tags($rows[$i]["videotitle"]));
			$tooltip_data[2] = addslashes(hwd_vs_tools::truncateText(strip_tags($rows[$i]["description"]), $trunvdesc));

			if ($hwdvsTemplateOverride['show_avatar'] == 1 && ($c->cbint == "1" || $c->cbint == "2" || $c->cbint == "3"))
			{
				$code[$i]->avatar = hwd_vs_tools::generateAvatar($rows[$i]["uploader_id"], $rows[$i]["avatar"], $k, $width, $height, $class);
			}
			if ($hwdvsTemplateOverride['show_title'])
			{
				$title = stripslashes($rows[$i]["videotitle"]);
				$title = hwdEncoding::charset_encode_utf_8($title);
				$code[$i]->title = hwd_vs_tools::generateVideoLink( $rows[$i]["id"], $title, $hwdvs_itemid, $onclick_js, $truntitle);
			}
			if ($hwdvsTemplateOverride['show_category']) {             $code[$i]->category = hwd_vs_tools::generateCategoryLink($rows[$i]["category_id"], $rows[$i]["category"], $hwdvs_itemid); }
			
				$description = stripslashes($rows[$i]["description"]);
				$description = hwdEncoding::charset_encode_utf_8($description);
				$code[$i]->description = hwd_vs_tools::truncateText(strip_tags(hwdEncoding::UNXMLEntities($description)), $trunvdesc);
			

			if ($hwdvsTemplateOverride['show_rating'] == 1 && $c->showrate == 1)
			{
				$code[$i]->rating = hwd_vs_tools::generateRatingImg($rows[$i]["rating"]);
				$code[$i]->showrating = 1;
			}

			if ($hwdvsTemplateOverride['show_thumbnail'] == 1) {       $code[$i]->thumbnail = hwd_vs_tools::generateVideoThumbnailLink($rows[$i]["id"], $rows[$i]["videocode"], $rows[$i]["videotype"], $rows[$i]["thumbnail"], $k, $twidth, $theight, $class, null, $hwdvs_itemid, $onclick_js, $tooltip_data, $lightbox, $rows[$i]["duration"],$rows[$i]["category_id"]); }
			if ($hwdvsTemplateOverride['show_views']) {                $code[$i]->views = $rows[$i]["views"]; }
			if ($hwdvsTemplateOverride['show_comments']) {             $code[$i]->comments = $rows[$i]["comments"]; }
			if ($hwdvsTemplateOverride['show_duration']) {             $code[$i]->duration = $rows[$i]["duration"]; }
			if ($hwdvsTemplateOverride['show_uploader']) {             $code[$i]->uploader = hwd_vs_tools::generateUserFromID($rows[$i]["uploader_id"], $rows[$i]["uploader"], $rows[$i]["uploader"]); }
			if ($hwdvsTemplateOverride['show_timesince']) {            $code[$i]->timesince = hwd_vs_tools::generateTimeSinceUpload($rows[$i]["date"]); }
			if ($hwdvsTemplateOverride['show_upload_date']) {          $code[$i]->upload_date = strftime("%l%P - %b %e, %Y", strtotime($rows[$i]["date"])); }
			if ($hwdvsTemplateOverride['show_tags']) {                 $code[$i]->tags	= hwd_vs_tools::generateTagListString($rows[$i]["tags"]); }
			$code[$i]->duration = $rows[$i]["duration"];
			$code[$i]->titleplain = addslashes(strip_tags($rows[$i]["videotitle"]));
			$code[$i]->descriptiontrunc = addslashes(hwd_vs_tools::truncateText(strip_tags($rows[$i]["description"]), 90));
			$code[$i]->link = $link=JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=".$hwdvs_itemid."&video_id=".$video_id);
			
			if($rows[$i]["numfavoured"]){
				$code[$i]->numfavoured	= $rows[$i]["numfavoured"]; 
			}
			
			$code[$i]->k = $k;
			$k = 1 - $k;
		}

		if (!isset($code)) { $code = null; }
		return $code;
    }
    /**
     * Generates the array of information for a standard group member list
     *
     * @param array  $rows  the list from a standard sql queries
     * @return       $code  the array prepared for Smarty template
     */
    function validateVideoAccess($row, $message=true)
    {
		global $hwdvsItemid, $smartyvs, $isModerator, $j15, $j16;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();
$app = & JFactory::getApplication();

        if (count($row) < 1)
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_VIDNOEXIST, "exclamation.png", 0);
			return false;
        }

        if (!$isModerator && $row->published !== "1")
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video is not published", "exclamation.png", 0);
			return false;
        }

        if ($row->approved == "deleted")
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video has been deleted", "exclamation.png", 0);
			return false;
        }

        if (!$isModerator && $row->approved == "pending")
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video is pending approval", "exclamation.png", 0);
			return false;
        }

        if (preg_match("/queued/i", $row->approved))
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video is queued for video conversion", "exclamation.png", 0);
			return false;
        }

        if (preg_match("/converting/i", $row->approved))
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video is currently being processed", "exclamation.png", 0);
			return false;
        }

        if ($isModerator && $row->approved == "pending")
        {
        	// OK
        }
        else if ($row->approved !== "yes")
        {
        	hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "This video is not approved", "exclamation.png", 0);
			return false;
        }

        if ( $row->public_private == "registered" && $my->id == 0 )
        {
        	if ($message)
        	{
					if (!$my->id)
					{
						$smartyvs->assign("showconnectionbox", 1);
					}
					hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ORUCAV, "exclamation.png", 0);
        	}
			return false;
        }

        if ( $row->public_private == "me" && $my->id !== $row->user_id )
        {
        	if ($message)
        	{
					if (!$my->id)
					{
						$smartyvs->assign("showconnectionbox", 1);
					}
					hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_OOCAV, "exclamation.png", 0);
        	}
			return false;
        }

        if ( $row->public_private == "password" )
        {
			$password = Jrequest::getVar( 'password', '' );
			$pass_check_variable = $app->getUserState( "hwdvs_pw_$row->id", "notset" );
			$link = JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=$hwdvsItemid&video_id=".$row->id);

			if ($pass_check_variable == "notset")
			{
				if (!empty($password))
				{
					if (md5($password) == $row->password)
					{
						$app->setUserState( "hwdvs_pw_$row->id", $password );
					}
					else
					{
						return false;
					}
				}
				else
				{
					if ($message)
					{
						$message = '<p>'._HWDVIDS_TVPP.'</p><br /><form action="'.$link.'" method="post">
						'._HWDVIDS_PASSWORD.'&nbsp;&nbsp;<input name="password" value="" type="password" class="inputbox" size="20" maxlength="500" style="width: 200px;" />
						<input type="submit" value="'._HWDVIDS_BUTTON_VIEW.'">
						</form>';

						hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, $message, null, 0);
					}
        			return false;
				}
			}
			else
			{
				if (md5($password) == $row->password)
				{
					$app->setUserState( "hwdvs_pw_$row->id", $password );
				}
				else
				{
					if ($message)
					{
						$message = '<p>'._HWDVIDS_IPW.'</p><br /><form action="'.$link.'" method="post">
						'._HWDVIDS_PASSWORD.'&nbsp;&nbsp;<input name="password" value="" type="password" class="inputbox" size="20" maxlength="500" style="width: 200px;" />
						<input type="submit" value="'._HWDVIDS_BUTTON_VIEW.'">
						</form>';

						hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, $message, null, 0);
					}
					return false;
				}
			}
        }

        if ( $row->public_private == "group" )
        {
			if ($j15)
			{
				if (!hwd_vs_access::allowAccess( $row->password, 'RECURSE', hwd_vs_access::userGID( $my->id )))
				{
					if ($message)
					{
						if (!$my->id)
						{
							$smartyvs->assign("showconnectionbox", 1);
						}
						hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "You do not have permission to view this video, you do not have the necessary access group.", "exclamation.png", 1);
					}
					return false;
				}
			}
        }

        if ( $row->public_private == "level" )
        {
                if ($j15)
                {
                        if (!hwd_vs_access::allowLevelAccess( $row->password, $my->get('aid', 0)))
                        {
                                if ($message)
                                {
                                        if (!$my->id)
                                        {
                                                $smartyvs->assign("showconnectionbox", 1);
                                        }
                                        hwd_vs_tools::infomessage(2, 0,  _HWDVIDS_TITLE_NOACCESS, "You do not have permission to view this video, you do not how the necessary access level.", "exclamation.png", 0);
                                }
                                return false;
                        }
                }
        }

        if ( $row->public_private == "acl" )
        {
                if ($j16)
                {
                        if (!hwd_vs_access::checkAccess("", "", 1, 0, "", "", "", "exclamation.png", 0, "video.$row->id", 1, "view"))
                        {
                                if ($message)
                                {
                                        if (!$my->id)
                                        {
                                                $smartyvs->assign("showconnectionbox", 1);
                                        }
                                        hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, "You do not have permission to view this video.", "exclamation.png", 1);
                                }
                                return false;
                        }
                }
        }

		if (!empty($row->category_id) && $row->category_id !== "0")
		{
			$usersConfig = &JComponentHelper::getParams( 'com_users' );
			$acl= & JFactory::getACL();

			$query = "SELECT id, access_v, access_v_r FROM #__hwdvidscategories WHERE id = $row->category_id";
			$db->SetQuery($query);
			$category = $db->loadObject();

        	if (isset($category))
        	{
				if (!hwd_vs_access::checkAccess($category->access_v, $category->access_v_r, 2, 0, "", "", "", "exclamation.png", 0, "", 1, "core.frontend.access"))
				{
					if ($message)
					{
						if (!$my->id)
						{
							$smartyvs->assign("showconnectionbox", 1);
						}
						hwd_vs_tools::infomessage(2, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_VCAT_NOT_AUTHORIZED, "exclamation.png", 0);
					}
					return false;
				}
			}
		}
		return true;
    }
    /**
     * Generates the array of information for a standard group member list
     *
     * @param array  $rows  the list from a standard sql queries
     * @return       $code  the array prepared for Smarty template
     */
    function generateGroupMemberList( $rows )
    {
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = array();
		$k = 0;
		for ($i=0, $n=count($rows); $i < $n; $i++) {
			$row = $rows[$i];
			$code[$i]->member_id = $row->id;
			$code[$i]->member_username = hwd_vs_tools::generateUserFromID($row->memberid, $row->username, $row->name);
			$code[$i]->k = $k;
			$k = 1 - $k;
		}
		return $code;
    }
    /**
     * Generates the human readable status of a video from the raw sql data
     *
     * @param string $status  the raw sql format
     * @return       $code  the multilingual human readable text
     */
	function generateVideoStatus( $status ) {

		$code = null;
		if ($status == "yes") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_Y;
		} else if ($status == "queuedforconversion") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_QFC;
		} else if ($status == "queuedforthumbnail") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_QFT;
		} else if ($status == "queuedforswf") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_QFSWF;
		} else if ($status == "queuedformp4") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_QFMP4;
		} else if ($status == "deleted") {
			$code.= "<a href=\"index.php?option=com_hwdvideoshare&task=maintenance\">"._HWDVIDS_DETAILS_VIDSTATUS_D."</a>";
		} else if ($status == "pending") {
			$code.= _HWDVIDS_DETAILS_VIDSTATUS_P;
		} else {
			$code.= $status;
		}
		return $code;
    }
    /**
     * Generates the human readable access level of a video from the raw sql data
     *
     * @param string $status  the raw sql format
     * @return       $code  the multilingual human readable text
     */
	function generateVideoAccess( $status ) {

		$code = null;
		if ($status == "public") {
			$code.= _HWDVIDS_SELECT_PUBLIC;
		} else if ($status == "registered") {
			$code.= _HWDVIDS_SELECT_REG;
		} else {
			$code.= $status;
		}
		return $code;
    }
    /**
     * Generates the embed code of a video
     *
     * @param array  $row  the video information
     * @return       $code
     */
	function generateEmbedCode( $row )
	{
		global $hwdvsItemid, $option, $task, $smartyvs, $show_video_ad, $pre_url, $post_url;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		$code = "";
		if ($c->showvebc == "1")
		{
			$smartyvs->assign("showEmbedButton", 1);
			$smartyvs->assign("print_embedcode", 1);

			if ( $row->allow_embedding == "0" )
			{
				$code.= _HWDVIDS_INFO_EMBEDDISABLED;
				return $code;
			}

			$code = hwd_vs_tools::generateVideoPlayer( $row, "", "", "", "sd", true );
			//$code = htmlentities($code);
		}
		return $code;
    }
    
    /**
     * Generates an HTML select simple for an object list
     * @param string $fields fields to be selected (fields a and b mandatory)
     * @param string $tablename table to query
     * @param string $orderby order column
     * @return       $code 
     */
    function generateVideoCombos($fields,$tablename,$orderby,$elementid, $selectquestion=true,$others=false,$required=true,$choosenval = null){
		$db =& JFactory::getDBO();
		$db->setQuery("SELECT DISTINCT ".$fields." from #__".$tablename." ORDER BY ".$orderby.";"
		                );
		         
		if($selectquestion)                
			$options[] = JHTML::_('select.option', '', constant('_HWDVIDS_SHIGARU_SHIGAR_COMBO_SELECT'));                
		$mitems = $db->loadObjectList();
		  foreach($mitems as $mitem) :
			$options[] = JHTML::_('select.option', $mitem->a, constant($mitem->b));
		  endforeach;
		  
		if($tablename=='hwdvidslanguages') 
			$options[] = JHTML::_('select.option', 'NONE', constant('UE_NOLANG')); 
		if($others)
			$options[] = JHTML::_('select.option', 'OTHER', constant('_HWDVIDS_SHIGARU_SHIGAR_COMBO_OTHER')); 
			   
		$classCombo;
		if($required)
			$classCombo = 'class="inputbox required"';
			else
				$classCombo='class="inputbox"';
		  ## Create <select name="month" class="inputbox"></select> ##
		  $code = JHTML::_('select.genericlist', $options, $elementid, $classCombo, 'value', 'text', $choosenval);
		
		return $code;
		}
    
    /**
     * Generates the category list with formatted subcategories
     *
     * @param string $header  the joomla component name
     * @param int    $selid  array of video data
     * @param string $nocatsmess  no category message
     * @param int    $pub(optional)  only list published categories (0/1)
     * @param int    $cname(optional)  category select list name value
     * @param int    $checkaccess(optional)  only list accessible categories for current user (0/1)
     * @return       $code
     */
	function categoryList( $header, $selid, $nocatsmess, $pub = 0, $cname = "category_id", $checkaccess = 1, $tag_attribs = 'class="inputbox required"', $show_uncategorised=false)
	{
		
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();
        $c = hwd_vs_Config::get_instance();
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'access.php');

		if ($pub) { $where = "\nWHERE published = 1"; } else { $where = null; }
		$db->setQuery("SELECT id ,parent,category_name, access_u, access_lev_u, access_u_r from #__hwdvidscategories"
		                . $where
		                . "\nORDER BY ordering"
		                );
		$mitems = $db->loadObjectList();
		// establish the mhierarchy of the menu
		$children = array ();

		$nocats = 0;
		// first pass - collect children
		foreach ($mitems as $v)
		{
			$pt = $v->parent;

			$nocats = 1;
			$list = @$children[$pt] ? $children[$pt] : array ();
			array_push($list, $v);
			$children[$pt] = $list;
		}

		// second pass - get an indent list of the items
		$list = hwd_vs_tools::catTreeRecurse(0, '', array (), $children);
		// assemble menu items to the array
		$mitems = array ();
		if ($nocats == 0) {
			$mitems[] = JHTML::_('select.option', '0', $nocatsmess);
		} else {
			$mitems[] = JHTML::_('select.option', '', $header);
			if ($show_uncategorised) {
				$mitems[] = JHTML::_('select.option', 'none', 'Uncategorized');
			}
		}
		$this_treename = '';

		foreach ($list as $item)
		{
			if ($checkaccess)
			{
                                if (!hwd_vs_access::checkAccess($item->access_u, $item->access_u_r, 4, 0, "", "", "", "exclamation.png", 0, "category.$item->id", 1, "upload"))
                                {
                                        continue;
                                }
 			}

			if ($this_treename)
			{
				if ($item->id != $mitems && strpos($item->treename, $this_treename) === false)
				{
					$mitems[] = JHTML::makeOption($item->id, $item->treename);
				}
			}
			else
			{
				if ($item->id != $mitems)
				{
					$mitems[] = JHTML::_('select.option', $item->id, $item->treename);
				}
				else
				{
					$this_treename = "$item->treename/";
				}
			}
		}

		// build the html select list
		$code = hwd_vs_tools::selectList2($mitems, $cname, $tag_attribs, 'value', 'text', $selid);
		
		return $code;
    }
    /**
     * Generates a thumbnail image
     *
     * @param int    $video_id  the video sql id
     * @param string $video_code  the video uid
     * @param string $video_type  the video type
     * @param int    $k  the css variable
     * @param int    $width(optional)  the width of the thumbnail image
     * @param int    $height(optional)  the height of the thumbnail image
     * @param string $class(optional)  the class of the thumbnail image
     * @return       $code
     */
	function generateThumbnail( $video_id, $video_code, $video_type, $video_thumbnail, $k, $width=null, $height=null, $class=null, $tooltip_data=null, $video_duration=null)
	{
		global $hwdvsItemid, $hwdvsTemplateOverride, $mooVersion;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$doc = & JFactory::getDocument();

		if (!isset($width))
		{
			$width = $c->thumbwidth;
		}
		if (!isset($height))
		{
			$height = $width*$c->tar_fb;
		}
		if (!isset($class) || empty($class))
		{
			$class = "thumb".$k;
		}
		if ($tooltip_data[0])
		{
			if ($mooVersion == "1.1")
			{
				JHTML::_('behavior.tooltip');
			}
                        JHTML::_('behavior.tooltip');

			$tt_title = $tooltip_data[1]." :: ".$tooltip_data[2];
			$thumb_title = "";
			$thumb = "";
		}
		else
		{
			$thumb = "";
			$thumb_title = $tooltip_data[1];
		}

		if ($c->thumb_ts == 1)
		{
			$thumb.= "<div class=\"watermark_box\">";
		}

		$thumbnailURL = hwd_vs_tools::generateThumbnailURL( $video_id, $video_code, $video_type, $video_thumbnail );

		// assume local for following variables
		$path_ext = (!empty($video_thumbnail) ? $video_thumbnail : "jpg");
		$path_thumb = PATH_HWDVS_DIR.DS."thumbs".DS.$video_code.".".$path_ext;
		$path_thumbd = PATH_HWDVS_DIR.DS."thumbs".DS.$video_code.".gif";

		if (($video_type == "local" || $video_type == "mp4" || $video_type == "swf") && (file_exists($path_thumb) && (filesize($path_thumb) > 0)))
		{
			if ($c->udt == 1 && file_exists($path_thumbd) && (filesize($path_thumbd) > 0))
			{
				if (!defined( '_HWD_VS_DTFLAG' ))
				{
					define( '_HWD_VS_DTFLAG', 1 );
					if($doc->getType() == 'html')
					{
						$doc->addCustomTag("<script type='text/javascript'>function roll_over(img_name, img_src) { document[img_name].src = img_src; }</script>");
					}
				}

				$url_thumbd = URL_HWDVS_DIR."/thumbs/".$video_code.".gif";
				$rand = rand();

				$thumb.= "<img src=\"".$thumbnailURL."\" border=\"0\" alt=\""._HWDVIDS_DETAILS_VIEWVID."\" width=\"".$width."\" height=\"".$height."\" title=\"".$thumb_title."\" class=\"bradius5 ".$class."\" name=\"".$video_code.$rand."\" onmouseover=\"roll_over('".$video_code.$rand."', '".$url_thumbd."')\" onmouseout=\"roll_over('".$video_code.$rand."', '".$thumbnailURL."')\" />";
			}
			else
			{
				$thumb.= "<img src=\"".$thumbnailURL."\" border=\"0\" alt=\""._HWDVIDS_DETAILS_VIEWVID."\" width=\"".$width."\" height=\"".$height."\" title=\"".$thumb_title."\" class=\"bradius5 ".$class."\" />";
			}
		}
		else
		{
			$thumb.= "<img src=\"".$thumbnailURL."\" alt=\""._HWDVIDS_DETAILS_VIEWVID."\" border=\"0\"  title=\"".$thumb_title."\" class=\"bradius5 ".$class."\" />";
		}

		if ($c->thumb_ts == 1)
		{
			if (!isset($video_duration))
			{
				$video_duration = "N/A";
				$video_duration = "";
			}
			else
			{
				$video_duration = hwd_vs_tools::validateDuration($video_duration);
			}
			$thumb.= "<img src=\"".URL_HWDVS_IMAGES."overlay.png\" class=\"watermark\" alt=\"Watermark image\" />
					  <span class=\"timestamp\">".$video_duration."</span>
					  </div>";
		}

		if ($tooltip_data[0])
		{
			$thumb.= "";
		}

		return $thumb;
    }
    /**
     * Generates a thumbnail image
     *
     * @param int    $video_id  the video sql id
     * @param string $video_code  the video uid
     * @param string $video_type  the video type
     * @param int    $k  the css variable
     * @param int    $width(optional)  the width of the thumbnail image
     * @param int    $height(optional)  the height of the thumbnail image
     * @param string $class(optional)  the class of the thumbnail image
     * @return       $code
     */
	function generateThumbnailURL( $video_id, $video_code, $video_type, $video_thumbnail, $type="normal" )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();

		if ($video_type == "category")
		{
			$thumb = $video_thumbnail;
		}

		$ext = (!empty($video_thumbnail) ? $video_thumbnail : "jpg");
		if ($type == "large" && file_exists(PATH_HWDVS_DIR.DS."thumbs".DS."l_".$video_code.".".$ext))
		{
			$thumb = URL_HWDVS_DIR."/thumbs/l_".$video_code.".".$ext;
			return $thumb;
		}

		if (file_exists(PATH_HWDVS_DIR.DS."thumbs".DS.$video_code.".".$ext))
		{
			$thumb = URL_HWDVS_DIR."/thumbs/".$video_code.".".$ext;
			return $thumb;
		}

		// assume local for following variables
		$path_ext = (!empty($video_thumbnail) ? $video_thumbnail : "jpg");
		$path_thumb = PATH_HWDVS_DIR.DS."thumbs".DS.$video_code.".".$path_ext;
		$path_thumbd = PATH_HWDVS_DIR.DS."thumbs".DS.$video_code.".gif";

        if (($video_type == "local" || $video_type == "mp4" || $video_type == "swf") && (file_exists($path_thumb) && (filesize($path_thumb) > 0)))
		{
			$thumb = URL_HWDVS_DIR."/thumbs/".$video_code.".".$path_ext;
		}
		else if (($video_type == "local" || $video_type == "mp4" ||  $video_type == "swf") && (!file_exists($path_thumb) || (filesize($path_thumb) <= 0)))
		{
			$thumb = URL_HWDVS_IMAGES.'default_thumb.jpg';
		}
		else if (!empty($video_thumbnail))
		{
			$pos = strpos($video_thumbnail, "http://");
			if ($pos === false)
			{
				$thumb = basename($video_thumbnail);
				$path_thumb = PATH_HWDVS_DIR.DS."thumbs".DS.$thumb;
				if (file_exists($path_thumb) && (filesize($path_thumb) > 0))
				{
					$thumb = URL_HWDVS_DIR."/thumbs/".$thumb;
				}
				else
				{
					$thumb = URL_HWDVS_IMAGES.'default_thumb.jpg';
				}
			}
			else
			{
				$thumb = $video_thumbnail;
			}
		}
		else if ($video_type == "seyret")
		{
			$data = @explode(",", $video_code);
			if ($data[0] == "local")
			{
				$pos = strpos($data[2], "http://");
				if ($pos === false)
				{
					$thumb = JURI::root().$data[2];
				}
				else
				{
					$thumb = $data[2];
				}
			}
			else
			{
				$plugin = hwd_vs_tools::getPluginDetails($data[0]);
				if (!$plugin)
				{
					$thumb = URL_HWDVS_IMAGES.'default_thumb.jpg';
				}
				else
				{
					$preparethumb = preg_replace("/[^a-zA-Z0-9s_-]/", "", $data[0])."PrepareThumbURL";
					if (!empty($data[2]))
					{
						$new_video_code = @$data[1].",".@$data[2];
					}
					else
					{
						$new_video_code = @$data[1];
					}
					if ($thumbcode = $preparethumb($new_video_code, $video_id))
					{
						$thumb = $thumbcode;
					}
					else
					{
						$thumb = URL_HWDVS_IMAGES.'default_thumb.jpg';
					}
				}
			}
		}
		else
		{
			$plugin = hwd_vs_tools::getPluginDetails($video_type);
			if (!$plugin)
			{
				$thumb = URL_HWDVS_IMAGES.'default_thumb.jpg';
			}
			else
			{
				$preparethumb = preg_replace("/[^a-zA-Z0-9s_-]/", "", $video_type)."PrepareThumbURL";

				if ($thumbcode = $preparethumb($video_code, $video_id))
				{
					$thumbcode = $thumbcode;
				}
				else
				{
					$thumbcode = URL_HWDVS_IMAGES.'default_thumb.jpg';
				}

				$thumb = $thumbcode;
			}
		}
		return $thumb;
    }
    /**
     * Generates the CB avatar thumbnail image from user id
     *
     * @param string $user_id  the joomla user's id
     * @param array  $k  the css variable
     * @param array  $width  the width of the avatar image
     * @param object $height  the height of the avatar image
     * @param int    $class  the class of the avatar image
     * @param int    $target(optional)  the target of the link
     * @return       $code
     */
	function generateAvatar( $user_id, $avatar=null, $k=null, $width=null, $height=null, $class=null, $target="_top" )
	{
		global $hwdvsItemid, $rows_avatars;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();

		if ($user_id == 0)
			return;

		$code = null;
		if ($c->cbavatar == 1 || $c->cbavatar == 2)
		{
			if ($c->cbint == 3)
			{
				$juserini = parse_ini_file(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_juser'.DS.'config.ini');

				if (file_exists(JPATH_SITE.DS.$juserini['general::avatars_dir'].DS.$avatar.'.jpg'))
				{
					$avatar_path = JURI::root().DS.$juserini['general::avatars_dir'].DS.$avatar.'.jpg';
				}
				else
				{
					return;
				}
				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"".JRoute::_("index.php?option=com_community&controller=profile".$c->cbitemid."&user_id=".$user_id)."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"thumb".$k."\" /></a><br />";
			}
			else if ($c->cbint == 2)
			{
				if (isset($avatar) && !empty($avatar))
				{
                                        $avatar_path = JURI::root().$avatar;
				}
                                else if (file_exists(JPATH_SITE.DS.'components'.DS.'com_community'.DS.'assets'.DS.'user.png'))
                                {
					$avatar_path = JURI::root()."/components/com_community/assets/user.png";
                                }
                                else if (file_exists(JPATH_SITE.DS.'components'.DS.'com_community'.DS.'assets'.DS.'default.jpg'))
				{
					$avatar_path = JURI::root()."/components/com_community/assets/default.jpg";
				}

				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"".JRoute::_("index.php?option=com_community".$c->cbitemid."&view=profile&userid=".$user_id)."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"avatar thumb".$k."\" /></a><br />";
			}
			else if ($c->cbint == 1)
			{
				if (isset($avatar))
				{
					$atype = strpos($avatar, "gallery/");
					if ($atype === false)
					{
				        $avatar_path = JURI::root()."images/comprofiler/tn".$avatar;
					}
					else
					{
				        $avatar_path = JURI::root()."images/comprofiler/".$avatar;
				    }
				}
				else
				{
					if (@file_exists(JPATH_SITE."/components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg"))
					{
						$avatar_path = JURI::root()."/components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg";
					}
					else
					{
						$avatar_path = JURI::root()."/components/com_comprofiler/plugin/templates/default/images/avatar/nophoto_n.png";
					}
				}
				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"".JRoute::_("index.php?option=com_comprofiler".$c->cbitemid."&task=userProfile&user=".$user_id)."\" title=\""._HWDVIDS_ALT_USRPRO."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"avatar thumb".$k."\" /></a><br />";
			}
			else if ($c->cbint == 4)
			{
				if (file_exists(JPATH_SITE.DS.'images'.DS.'fbfiles'.DS.'avatars'.DS.'s_'.$user_id.'.jpg'))
				{
					$avatar_path = JURI::root().'images/fbfiles/avatars/s_'.$user_id.'.jpg';
				}
				else
				{
					$avatar_path = JURI::root().'images/fbfiles/avatars/s_nophoto.jpg';
				}
				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"".JRoute::_("index.php?option=com_kunena&func=fbprofile&Itemid=".$c->cbitemid."&userid=".$user_id)."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"avatar thumb".$k."\" /></a><br />";
			}
			else if ($c->cbint == 5)
			{
				if (file_exists(PATH_HWDVS_DIR.DS."thumbs".DS.$avatar))
				{
					$avatar_path = URL_HWDVS_DIR."/thumbs/".$avatar;
				}
				else
				{
					$avatar_path = null;
				}
				$code = "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewChannel&user_id=".$user_id."&Itemid=".$hwdvsItemid)."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"avatar thumb".$k."\" /></a><br />";
			}
			else if ($c->cbint == 6)
			{
				if (file_exists(JPATH_SITE.DS.'media'.DS.'kunena'.DS.'avatars'.DS.'resized'.DS.'size72'.DS.$avatar))
				{
					$avatar_path = JURI::root().'media/kunena/avatars/resized/size72/'.$avatar;
				}
				else
				{
					$avatar_path = JURI::root().'media/kunena/avatars/s_nophoto.jpg';
				}
				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"".JRoute::_("index.php?option=com_kunena&func=fbprofile&Itemid=".$c->cbitemid."&userid=".$user_id)."\"><img src=\"".$avatar_path."\" width=\"".$c->avatarwidth."\" border=\"0\" alt=\""._HWDVIDS_ALT_USRPRO."\" class=\"avatar thumb".$k."\" /></a><br />";
			}
		}
		return $code;
    }
    /**
     * Generates a link to group using $group_id, and generates the
     * group name if necessary
     *
     * @param int    $group_id  the category id
     * @param string $group(optional)  the name of the category
     * @return       $code
     */
	function generateGroupLink( $group_id, $group=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewgroup&Itemid=".$hwdvsItemid."&group_id=".$group_id)."\">";
		if (isset($group)) {
			$code.= hwd_vs_tools::truncateText($group, $c->truntitle);
		} else {
			$code.= hwd_vs_tools::generateCategory( $cat_id );
		}
		$code.= "</a>";
		return $code;
    }
    /**
     * Generates a link to group using $group_id, and generates the
     * group name if necessary
     *
     * @param int    $group_id  the category id
     * @param string $group(optional)  the name of the category
     * @return       $code
     */
	function generatePlaylistLink( $playlist_id, $playlist=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewplaylist&Itemid=".$hwdvsItemid."&playlist_id=".$playlist_id)."\">";
		if (isset($playlist)) {
			$code.= hwd_vs_tools::truncateText($playlist, $c->truntitle);
		} else {
			$code.= hwd_vs_tools::generatePlaylist( $playlist_id );
		}
		$code.= "</a>";
		return $code;
    }
    /**
     * Generates the array of information for a standard video list from sql queries
     *
     * @param array  $rows  the list from a standard sql queries
     * @param string $thumbclass(optional)  the class for the thumbnail images
     * @return       $code  the array prepared for Smarty template
     */
    function generateTagListString( $tags, $layout_type=0, $link_type=0 )
    {
		global $smartyvs, $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		if ($c->showtags == "1")
		{
			$smartyvs->assign("print_tags", 1);
			$tags = explode(",", stripslashes($tags));

			$j=count($tags);
			for ($i=0, $j; $i < $j; $i++)
			{
				$tag = $tags[$i];

				$tag = trim($tag);

				if ($tag != "")
				{
					$url = JRoute::_("index.php?option=com_hwdvideoshare&task=search&Itemid=$hwdvsItemid");
					$url = str_replace("&amp;", "&", $url);

					$pos = strpos($url, "?");
					if ($pos === false)
					{
						$url = $url."?pattern=$tag";
					}
					else
					{
						$url = $url."&pattern=$tag";

					}
					$code.= "<a href=\"$url\">".$tag."</a>, ";
				}
			}

			if (substr($code, -2) == ", ") {$code = substr($code, 0, -2);}
		}
		return $code;
    }
    /**
     * Generates the Add/Remove favourite video button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateFavouriteButton($row)
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$favoured = '';
		$favouredbutton = '';
		$code = null;

			$userid = $my->id;
			$videoid = $row->id;

			$where = ' WHERE a.userid = '.$userid;
			$where .= ' AND a.item_id = '.$videoid;

			$db->SetQuery( 'SELECT count(*)'
						. ' FROM #__hwdvidsfavorites AS a'
						. $where
						);
			$total = $db->loadResult();
			$where = ' WHERE a.item_id = '.$videoid;
			$db->SetQuery( 'SELECT count(*)'
						. ' FROM #__hwdvidsfavorites AS a'
						. $where
						);
			$timesfavoured = $db->loadResult();
			
			if ( $total>0 ) {
				$favoured=' fontgreen';
				$favouredbutton = ' active';
			}	
				$code.= "<form class=\"fleft\" name=\"favourite1\"  action=\"\" method=\"post\">
						 <div class=\"btn-group\">
							<button id=\"hwdvidsfavorites\" type=\"submit\" title=\""._HWDVIDS_DETAILS_REMFAV."\" class=\"btn".$favouredbutton."\"><i class=\"icon-heart".$favoured."\"></i> Favourite</button>
							<ul class=\"dropdown-menu\">
								<li class=\"mleft12\">
									<a class=\"crossclose fright\" title=\""._HWDVIDS_CLICKTOCLOSE."\"><i class=\"icon-remove\"></i></a>
									<div class=\"reponsesay clear\">
									</div>
								</li>
							</ul>
						</div>
						 </form>
						 <div class=\"fleft timesactioned mtop8\"><i class=\"icon-angle-left\"></i><span>".$timesfavoured."</span></div>
						 ";			
			
		
		return $code;
    }
    /**
     * Generates the Add/Remove favourite video button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateSwitchQuality($row)
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$code = null;
		if ($row->video_type == "local" || $row->video_type == "mp4"  || $row->video_type == "swf"  || $row->video_type == "seyret" || ($row->video_type == "remote" && substr($row->video_id, 0, 6) !== "embed|"))
		{
			if ($c->usehq == "1" || $c->usehq == "2" && (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4") && file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".flv")))
			{
				$ajax_sq = "onsubmit=\"ajaxSwitchStandardQuality();return false;\"";
				$ajax_hq = "onsubmit=\"ajaxSwitchHighQuality();return false;\"";

				$sq_button = "<form name=\"switchQuality\" style=\"display: inline;\" onsubmit=\"ajaxSwitchStandardQuality();return false;\" action=\"#\" method=\"post\"><input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_hdon.png\" alt=\"SD\" /><form>";
				$hq_button = "<form name=\"switchQuality\" style=\"display: inline;\" onsubmit=\"ajaxSwitchHighQuality();return false;\" action=\"#\" method=\"post\"><input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_hdoff.png\" alt=\"HD\" /></form>";

				hwd_vs_javascript::ajaxSwitchQuality($row, $sq_button, $hq_button);

				$code.= "<div id=\"switchQuality\" style=\"display: inline;\">";
				if ($c->usehq == "1")
				{
					$code.= "<form name=\"switchQuality\" style=\"display: inline;\" ".$ajax_sq." action=\"#\" method=\"post\">
							 <input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_hdon.png\" alt=\"SD\" />
							 </form>";
				}
				else if ($c->usehq == "2")
				{
					$code.= "<form name=\"switchQuality\" style=\"display: inline;\" ".$ajax_hq." action=\"#\" method=\"post\">
							 <input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_hdoff.png\" alt=\"HD\" />
							 </form>";
				}
				$code.= "</div>";
			}
		}
		return $code;
    }
    /**
     * Generates the video Report Media button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateReportMediaButton($row)
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$flagged = '';
		$flaggedbutton = '';
		$code = null;
		if($my->id){
			$where = ' WHERE a.videoid = '.$row->id.' AND a.userid = '.$my->id;
				$db->SetQuery( 'SELECT count(*)'
               		. ' FROM #__hwdvidsflagged_videos AS a'
               		. $where
               		);
				$total = $db->loadResult();
			}
			if ( $total>0 ) {
				$flagged=' fontred';
				$flaggedbutton = ' active';
			}
			$code.= "<form name=\"report\" action=\"\" method=\"post\">
					 <div class=\"btn-group\">
						<button type=\"submit\" title=\""._HWDVIDS_DETAILS_FLAGVID."\" id=\"hwdvidsflagged_videos\" class=\"btn".$flaggedbutton."\"><i class=\"icon-flag".$flagged."\"></i> Flag</button>
						 <ul class=\"dropdown-menu\">
									<li class=\"mleft12\">
										<a class=\"crossclose fright\" title=\""._HWDVIDS_CLICKTOCLOSE."\"><i class=\"icon-remove\"></i></a>
										<div class=\"reponsesay clear pad6\">
										</div>
									</li>
							</ul>
					</div>
					 </form>";
		return $code;
    }
    
    function getActionCount($paramTable,$videoid){
		$db = & JFactory::getDBO();
		$oNumber = 0;
		$where = ' WHERE a.item_id = '.$videoid;
			$db->SetQuery( 'SELECT count(*)'
						. ' FROM #__'.$paramTable.' AS a'
						. $where
						);
		$oNumber =$db->loadResult();
		return $oNumber;
		}
    
    /**
     * Generates the video Report Media button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateLikeVideoButton($row){
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$videoid = $row->id;
		$likedrow = null; 
		$likedclass= ''; 
		$likediconclass= ''; 
		$likedid= '';
		
		$where = ' WHERE a.item_id = '.$videoid;
			$db->SetQuery( 'SELECT count(*)'
						. ' FROM #__hwdvidslikes AS a'
						. $where
						);
		$timesfavoured = $db->loadResult();
		if($my->id){
			$where = ' WHERE a.item_id = '.$videoid.' AND a.user_id='.$my->id;
				$db->SetQuery( 'SELECT *'
							. ' FROM #__hwdvidslikes AS a'
							. $where
							);
			$db->loadObjectList();
			$liked = $db->loadResultArray();
			 
			if(sizeof($liked)>0){
				$likedrow = $liked[0];
				$likedclass = ' active';
				$likediconclass= ' fontgreen'; 
				$likedid= "id=\"likeid".$liked[0]."\""; 
			}
		}
		$code.= "<form class=\"fleft\" name=\"report\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=reportvideo")."\" method=\"post\">
					 <input type=\"hidden\" name=\"videoid\" id=\"videoid\" value=\"".$row->id."\" />
					 <div class=\"btn-group\">
						<button type=\"submit\" title=\""._HWDVIDS_T_LIKETIP."\" id=\"hwdvidslikes\" class=\"btn".$likedclass."\"><i ".$likedid." class=\"icon-thumbs-up".$likediconclass."\"></i> "._HWDVIDS_T_LIKE."</button>
						<ul class=\"dropdown-menu\">
								<li class=\"mleft12\">
									<a class=\"crossclose fright\" title=\""._HWDVIDS_CLICKTOCLOSE."\"><i class=\"icon-remove\"></i></a>
									<div class=\"reponsesay clear\">
									</div>
								</li>
						</ul>
					</div>
				</form>
				<div class=\"fleft timesactioned mtop8\"><i class=\"icon-angle-left\"></i><i class=\"icon-caret-left\"></i><span>".$timesfavoured."</span></div>";
		return $code;
    }
    
     /**
     * Generates the video Report Media button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateLearnLaterButton($row)
	{
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$likedrow = null; 
		$likedclass= ''; 
		$likediconclass= ''; 
		
		if($my->id){
			
			$query = 'SELECT * FROM #__hwdvidsplaylists_videos WHERE playlist_id = 0 AND user_id = '.$my->id.' AND item_id = '.$row->id;;
			$db->SetQuery($query);
			$rows = $db->loadObjectList();
			
			$liked = $db->loadResultArray();
			 
			if(sizeof($liked)>0){
				$likedrow = $liked[0];
				$likedclass = ' active';
				$likediconclass= ' fontgreen'; 
			}
			$code.= "<form class=\"fleft\" name=\"report\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=reportvideo")."\" method=\"post\">
						  <div class=\"btn-group\">
							<button type=\"submit\" title=\""._HWDVIDS_T_LEARNLATERTIP."\" id=\"learnlaterbutton\" class=\"btn".$likedclass."\"><i class=\"icon-time".$likediconclass."\"></i> "._HWDVIDS_T_LEARNLATER."</button>
							<ul class=\"dropdown-menu\">";
			$code.= "<li class=\"mleft12\">
										<a class=\"crossclose fright\" title=\""._HWDVIDS_CLICKTOCLOSE."\"><i class=\"icon-remove\"></i></a>
										<div class=\"reponsesay clear\">
										</div>
									</li>";
			}else{
				$code.= "<form class=\"fleft\" name=\"report\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=reportvideo")."\" method=\"post\">
						  <div class=\"btn-group\">
							<button type=\"submit\" title=\""._HWDVIDS_T_LEARNLATERTIP."\" id=\"learnlaterbutton\" class=\"btn\"><i class=\"icon-time\"></i> "._HWDVIDS_T_LEARNLATER."</button>
							<ul class=\"dropdown-menu\">";
				$code.= "<li><span class=\"pad6\">"._HWDVIDS_META_LOGTOLLTR."</span>";
				}
			$code.= "		</ul>
						</div>
					</form>";
						 
		return $code;
    }
    /**
     * Generates the video Rating System
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateRatingSystem($row)
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'js.php');

		$rand = rand();
		$code = null;

		if ( $row->allow_ratings == 1 && $c->showrate == 1)
		{
			if ($row->rating_number_votes < 1)
			{
				$count = 0;
			}
			else
			{
				$count = $row->rating_number_votes; //how many votes total
			}
			$tense = ($count==1) ? _HWDVIDS_INFO_M_VOTE : _HWDVIDS_INFO_M_VOTES; //plural form votes/vote

			$rating0 = @number_format($row->rating_total_points/$count,0);
			$rating1 = @number_format($row->rating_total_points/$count,1);

			$code='<ul class="rating rated'.$rating0.'star">
			           <li id="l1" class="rate one"><a href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id=$row->id&rating=1").'" title="'._HWDVIDS_RATE_1STAR.'" rel="nofollow">1</a></li>
			           <li id="l2" class="rate two"><a href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id=$row->id&rating=2").'" title="'._HWDVIDS_RATE_2STAR.'" rel="nofollow">2</a></li>
			           <li id="l3" class="rate three"><a href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id=$row->id&rating=3").'" title="'._HWDVIDS_RATE_3STAR.'" rel="nofollow">3</a></li>
			           <li id="l4" class="rate four"><a href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id=$row->id&rating=4").'" title="'._HWDVIDS_RATE_4STAR.'" rel="nofollow">4</a></li>
			           <li id="l5" class="rate five"><a href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id=$row->id&rating=5").'" title="'._HWDVIDS_RATE_5STAR.'" rel="nofollow">5</a></li>
			         </ul><span class="fleft"> ('._HWDVIDS_SHIGARU_SHIGAR_CLICKTOVOTE.')</span>
			         <div class="clear fleft">'._HWDVIDS_INFO_RATED.'<strong> '.$rating1.'</strong> ('.$count.' '.$tense.')</div>
			         <i class="pad4 icon-spinner icon-spin fleft" style="display:none;"></i>';

		}
		return $code;
    }
    
    

    /**
     * Generates the social bookmark links
     *
     * @return       $code
     */
    function generateSocialBookmarks()
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$doc = & JFactory::getDocument();
		
		$code = null;
		if ($c->showscbm == "1")
		{
			
			$video_id = JRequest::getInt( 'video_id', 0 );
			$sbtitle = rawurlencode($doc->getTitle());
            $sburl = "http://".$_SERVER['HTTP_HOST'].rawurlencode(JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=viewvideo&video_id=".$video_id));
			$jrandom = rand(1000, 9999);
			$bmhtml = null;
				//facebook
				if ($c->sb_facebook == "on") {
				$temphtml = '<div id="button-1" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.facebook.com/share.php?u='. $sburl .'&amp;t='. $sbtitle .'" title="Facebook!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/facebook.png" alt="Facebook!" title="Facebook!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}

				$temphtml = '<div id="button-2" class="btun">
							  <div>
								<a rel="nofollow" href="http://twitter.com/home?status='. $sburl .'&amp;title='. $sbtitle .'" title="Twitter" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/twitter.png" alt="Twitter" title="Twitter" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";

				//digg
				if ($c->sb_digg == "on") {
				$temphtml = '<div id="button-3" class="btun">
							  <div>
								<a rel="nofollow" href="http://digg.com/submit?phase=2&amp;url='. $sburl .'&amp;title='. $sbtitle .'" title="Digg!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/digg.png" alt="Digg!" title="Digg!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//reddit
				if ($c->sb_reddit == "on") {
				$temphtml = '<div id="button-4" class="btun">
							  <div>
								<a rel="nofollow" href="http://reddit.com/submit?url='. $sburl .'&amp;title='. $sbtitle .'" title="Reddit!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/reddit.png" alt="Reddit!" title="Reddit!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//delicious
				if ($c->sb_delicious == "on") {
				$temphtml = '<div id="button-5" class="btun">
							  <div>
								<a rel="nofollow" href="http://del.icio.us/post?url='. $sburl .'&amp;title='. $sbtitle .'" title="Del.icio.us!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/delicious.png" alt="Del.icio.us!" title="Del.icio.us!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//google
				if ($c->sb_google == "on") {
				$temphtml = '<div id="button-6" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.google.com/bookmarks/mark?op=add&amp;bkmk='. $sburl .'&amp;title='. $sbtitle .'" title="Google!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/google.png" alt="Google!" title="Google!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//live
				if ($c->sb_live == "on") {
				$temphtml = '<div id="button-7" class="btun">
							  <div>
								<a rel="nofollow" href="https://favorites.live.com/quickadd.aspx?marklet=1&amp;mkt=en-us&amp;top=0&amp;url='. $sburl .'&amp;title='. $sbtitle .'" title="Live!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/live.png" alt="Live!" title="Live!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//slashdot
				if ($c->sb_slashdot == "on") {
				$temphtml = '<div id="button-8" class="btun">
							  <div>
								<a rel="nofollow" href="http://slashdot.org/bookmark.pl?url='. $sburl .'&amp;title='. $sbtitle .'" title="Slashdot!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/slashdot.png" alt="Slashdot!" title="Slashdot!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//netscape
				if ($c->sb_netscape == "on") {
				$temphtml = '<div id="button-9" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.netscape.com/submit/?U='. $sburl .'&amp;T='. $sbtitle .'" title="Netscape!" target="_blank"><img height="18" width="18" src="'.URL_HWDVS_IMAGES.'socialbookmarker/netscape.png" alt="Netscape!" title="Netscape!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//technorati
				if ($c->sb_technorati == "on") {
				$temphtml = '<div id="button-10" class="btun">
							  <div>
								<a rel="nofollow" href="http://technorati.com/faves/?add='. $sburl .'" title="Technorati!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/technorati.png" alt="Technorati!" title="Technorati!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//stumbleupon
				if ($c->sb_stumbleupon == "on") {
				$temphtml = '<div id="button-11" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.stumbleupon.com/submit?url='. $sburl .'&amp;title='. $sbtitle .'" title="StumbleUpon!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/stumbleupon.png" alt="StumbleUpon!" title="StumbleUpon!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//spurl
				if ($c->sb_spurl == "on") {
				$temphtml = '<div id="button-12" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.spurl.net/spurl.php?url='. $sburl .'&amp;title='. $sbtitle .'" title="Spurl!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/spurl.png" alt="Spurl!" title="Spurl!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//wists
				if ($c->sb_wists == "on") {
				$temphtml = '<div id="button-13" class="btun">
							  <div>
								<a rel="nofollow" href="http://wists.com/r.php?r='. $sburl .'&amp;title='. $sbtitle .'" title="Wists!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/wists.png" alt="Wists!" title="Wists!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//simpy
				if ($c->sb_simpy == "on") {
				$temphtml = '<div id="button-14" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.simpy.com/simpy/LinkAdd.do?href='. $sburl .'&amp;title='. $sbtitle .'" title="Simpy!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/simpy.png" alt="Simpy!" title="Simpy!" class="sblinks" /></a>
								</div>
							</div>
							';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//newsvine
				if ($c->sb_newsvine == "on") {
				$temphtml = '<div id="button-15" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.newsvine.com/_tools/seed&amp;save?u='. $sburl .'&amp;h='. $sbtitle .'" title="Newsvine!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/newsvine.png" alt="Newsvine!" title="Newsvine!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//blinklist
				if ($c->sb_blinklist == "on") {
				$temphtml = '<div id="button-16" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url='. $sburl .'&amp;Title='. $sbtitle .'" title="Blinklist!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/blinklist.png" alt="Blinklist!" title="Blinklist!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//furl
				if ($c->sb_furl == "on") {
				$temphtml = '<div id="button-17" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.furl.net/storeIt.jsp?u='. $sburl .'&amp;t='. $sbtitle .'" title="Furl!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/furl.png" alt="Furl!" title="Furl!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//fark
				if ($c->sb_fark == "on") {
				$temphtml = '<div id="button-18" class="btun">
							  <div>
								<a rel="nofollow" href="http://cgi.fark.com/cgi/fark/submit.pl?new_url='. $sburl .'" title="Fark!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/fark.png" alt="Fark!" title="Fark!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//blogmarks
				if ($c->sb_blogmarks == "on") {
				$temphtml = '<div id="button-19" class="btun">
							  <div>
								<a rel="nofollow" href="http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url='. $sburl .'&amp;title='. $sbtitle .'" title="Blogmarks!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/blogmarks.png" alt="Blogmarks!" title="Blogmarks!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//yahoo
				if ($c->sb_yahoo == "on") {
				$temphtml = '<div id="button-20" class="btun">
							  <div>
								<a rel="nofollow" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u='. $sburl .'&amp;t='. $sbtitle .'" title="Yahoo!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/yahoo.png" alt="Yahoo!" title="Yahoo!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//smarking
				if ($c->sb_smarking == "on") {
				$temphtml = '<div id="button-21" class="btun">
							  <div>
								<a rel="nofollow" href="http://smarking.com/editbookmark/?url='. $sburl .'" title="Smarking!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/smarking.png" alt="Smarking!" title="Smarking!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//netvouz
				if ($c->sb_netvouz == "on") {
				$temphtml = '<div id="button-22" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.netvouz.com/action/submitBookmark?url='. $sburl .'&amp;title='. $sbtitle .'" title="Smarking!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/netvouz.png" alt="Netvouz!" title="Netvouz!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//shadows
				if ($c->sb_shadows == "on") {
				$temphtml = '<div id="button-23" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.shadows.com/bookmark/saveLink.rails?page='. $sburl .'&amp;title='. $sbtitle .'" title="Shadows!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/shadows.png" alt="Shadows!" title="Shadows!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//rawsugar
				if ($c->sb_rawsugar == "on") {
				$temphtml = '<div id="button-24" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.rawsugar.com/tagger/?turl='. $sburl .'&amp;title='. $sbtitle .'" title="RawSugar!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/rawsugar.png" alt="RawSugar!" title="RawSugar!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//magnolia
				if ($c->sb_magnolia == "on") {
				$temphtml = '<div id="button-25" class="btun">
							  <div>
								<a rel="nofollow" href="http://ma.gnolia.com/beta/bookmarklet/add?url='. $sburl .'&amp;title='. $sbtitle .'" title="Ma.gnolia!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/magnolia.png" alt="Ma.gnolia!" title="Ma.gnolia!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//plugim
				if ($c->sb_plugim == "on") {
				$temphtml = '<div id="button-26" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.plugim.com/submit?url='. $sburl .'&amp;title='. $sbtitle .'" title="PlugIM!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/plugim.png" alt="PlugIM!" title="PlugIM!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//squidoo
				if ($c->sb_squidoo == "on") {
				$temphtml = '<div id="button-27" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.squidoo.com/lensmaster/bookmark?'. $sburl .'" title="Squidoo!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/squidoo.png" alt="Squidoo!" title="Squidoo!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//blogmemes
				if ($c->sb_blogmemes == "on") {
				$temphtml = '<div id="button-28" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.blogmemes.net/post.php?url='. $sburl .'&amp;title='. $sbtitle .'" title="BlogMemes!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/blogmemes.png" alt="BlogMemes!" title="BlogMemes!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//feedmelinks
				if ($c->sb_feedmelinks == "on") {
				$temphtml = '<div id="button-29" class="btun">
							  <div>
								<a rel="nofollow" href="http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;url='. $sburl .'&amp;name='. $sbtitle .'" title="FeedMeLinks!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/feedmelinks.png" alt="FeedMeLinks!" title="FeedMeLinks!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//blinkbits
				if ($c->sb_blinkbits == "on") {
				$temphtml = '<div id="button-30" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url='. $sburl .'&amp;title='. $sbtitle .'" title="BlinkBits!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/blinkbits.png" alt="BlinkBits!" title="BlinkBits!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//tailrank
				if ($c->sb_tailrank == "on") {
				$temphtml = '<div id="button-31" class="btun">
							  <div>
								<a rel="nofollow" href="http://tailrank.com/share/?text=&amp;link_href='. $sburl .'&amp;title='. $sbtitle .'" title="Tailrank!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/tailrank.png" alt="Tailrank!" title="Tailrank!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}
				//linkagogo
				if ($c->sb_linkagogo == "on") {
				$temphtml = '<div id="button-32" class="btun">
							  <div>
								<a rel="nofollow" href="http://www.linkagogo.com/go/AddNoPopup?url='. $sburl .'&amp;title='. $sbtitle .'" title="linkaGoGo!" target="_blank"><img src="'.URL_HWDVS_IMAGES.'socialbookmarker/linkagogo.png" alt="linkaGoGo!" title="linkaGoGo!" class="sblinks" /></a>
								</div>
							</div>';
				$bmhtml = $bmhtml . $temphtml ."\n";
				}

			$code = $bmhtml;
		}

		if (!empty($code))
		{
			$smartyvs->assign("showShareButton", 1);
		}

		return $code;
	}
	
	/**
     * Generates list of most popular tags
     *
     * 
     * @return        $wordList
     */
	function getGenreTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.genre as genre FROM #__hwdvidsvideos as b'; 
		$query .= ' INNER JOIN #__hwdvidsgenres AS a ON a.Id = b.genre_id';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =constant($wordList[$i]).',';
		} 
		return $wordList;
    }
    
    /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addSong($paramSongObject, $paramAlbumId, $paramBandId) {
		$db = & JFactory::getDBO();
		$row = new hwdvidssongs($db);
		$temppostid = $_POST['id'] ;
	    $_POST['id'] 			= null;			
		$_POST['label'] 		= $paramSongObject->oSongName;
		$_POST['provider'] 		= $paramSongObject->oProvider;
		$_POST['album_id'] 		= $paramAlbumId;
		$_POST['band_id'] 		= $paramBandId;
		$_POST['external_url'] 	= $paramSongObject->oSongUrl;
		$_POST['external_id'] 	= $paramSongObject->oSongId;
		$_POST['embedding'] 	= $paramSongObject->oEmbedUrl;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		
		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function getSongById($song_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidssongs AS a'; 
		$query .= ' WHERE a.id ='.$song_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkSong($paramSongName, $paramSongId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id, label FROM #__hwdvidssongs AS a'; 
		$query .= ' WHERE ( a.external_id = "'.$paramSongId.'" AND a.external_id != "" AND a.external_id != 0) OR (a.label ="'.$paramSongName.'" AND a.external_id = "0" )';
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		$bandMatched = null;
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
		return $bandMatched;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkAlbum($paramAlbumName, $paramAlbumId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id, label FROM #__hwdvidsalbums AS a'; 
		$query .= ' WHERE a.external_id = "'.$paramAlbumId.'" AND a.external_id != "" AND a.external_id IS NOT NULL';
		$db->setQuery($query);
		$db->loadObjectList();
		$albumList = $db->loadResultArray();
		$albumMatched = null;
		if(sizeof($albumList)>0)
			$albumMatched = $albumList[0];
		return $albumMatched;
    }
    
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function doLikeUnLike($paramLikeid,$paramItem_id,$paramItem_type){
			$db = & JFactory::getDBO();
			$my = & JFactory::getUser();
			$response = 0;
			$likeid        = $paramLikeid;
			$user_id       = $my->id;
			$item_id 	   = $paramItem_id;
			$item_type     = $paramItem_type;
			$date_liked    = date('Y-m-d H:i:s');
			
			if($my->id){
				
				$row = new hwdvidslikes($db);

				$_POST['item_id'] 	= $item_id;
				$_POST['user_id'] 	= $user_id;
				$_POST['item_type'] = $item_type;
				$_POST['date_liked']= $date_liked;
				
				if($likeid){
					$likeid = str_replace("likeid", "", $paramLikeid);
					if (!$row->delete(intval($likeid))){
						JError::raiseError(500, $row->getError() );
						$response = 0;
						}else
							$response = 1;
					}else{
						if (!$row->bind( $_POST )) {
								return JError::raiseWarning( 500, $row->getError() );
							}else{
								if (!$row->store()) {
										JError::raiseError(500, $row->getError() );
								}
								$response = $row->id;							
							}
						}
			}else{
				$response = _HWDVIDS_META_LOGTOLK;
				}					
						
			return $response;		
	}
    
    /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addBand($paramSongObject) {
		$db = & JFactory::getDBO();
		$row = new hwdvidsbands($db);
		$temppostid = $_POST['id'] ;
		$_POST['id'] 				= null;
		$_POST['label'] 			= $paramSongObject->oBandName;
		$_POST['external_url'] 		= $paramSongObject->oBandUrl;
		$_POST['external_id'] 		= $paramSongObject->oBandId;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}

		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addAlbum($paramSongObject,$paramBandId) {
		$db = & JFactory::getDBO();
		$row = new hwdvidsalbums($db);
		$temppostid = $_POST['id'] ;
		$_POST['id'] 				= null;
		$_POST['label'] 			= $paramSongObject->oAlbumName;
		$_POST['external_url'] 		= $paramSongObject->oAlbumUrl;
		$_POST['external_id'] 		= $paramSongObject->oAlbumId;
		$_POST['thumbnail'] 		= $paramSongObject->oAlbumThumbnail;
		$_POST['band_id'] 			= $paramBandId;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}

		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * Retrieves the song information stored in DB
     *
     * @return       $srows
     */
    
    function getBandInfo($band_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT 
								s.id as songid,
								s.label as songname,
								s.provider as source,
								s.band_id as bandid,
								s.external_id as extsongid,
								s.external_url as extsongurl,
								s.embedding as songurl,
								b.label as band_name,
								b.external_id as extbandid,
								b.external_url as extURL,
								u.id as albumid,
								u.label as album_name,
								u.thumbnail as album_thumb'
								. ' FROM #__hwdvidssongs as s INNER JOIN #__hwdvidsbands as b ON s.band_id=b.id INNER JOIN #__hwdvidsalbums as u ON s.album_id=u.id'
								. ' WHERE s.band_id = '.$band_id
								);
						
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$srows = $db->loadObjectList();
		return $srows;
	}
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function getBandById($band_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidsbands AS a'; 
		$query .= ' WHERE a.id ='.$band_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }
    
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkBand($paramBandName,$paramBandId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id,label FROM #__hwdvidsbands AS a'; 
		$query .= ' WHERE (a.external_id = "'.$paramBandId.'" AND a.external_id !="" AND a.external_id !="0") OR (a.label ="'.$paramBandName.'" AND (a.external_id IS NULL OR a.external_id = "0"))';
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		$bandMatched = null;
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
		return $bandMatched;
    }
    
    
    
    function storeSong($paramSongChosen,$paramprovider, $paramIsSearched = 1,$paramBandChosen = ''){

		$oSongObject = new stdClass();
		$oStoringOutput = new JObject();	
		/*echo '<pre>';
		var_dump('------------------------------------');
		var_dump($paramSongChosen);
		var_dump($paramprovider);
		var_dump($paramIsSearched);
		var_dump($paramBandChosen);
		var_dump('------------------------------------');
		*/
		if($paramIsSearched == '1'){
			switch($paramprovider){
				case 'rdio':
							$oSongObject->oSongName 		= $paramSongChosen->name;
							$oSongObject->oSongId 			= $paramSongChosen->key;
							$oSongObject->oSongUrl 			= $paramSongChosen->url;
							$oSongObject->oAlbumId   		= $paramSongChosen->albumKey; 
							$oSongObject->oAlbumName 		= $paramSongChosen->album;
							$oSongObject->oAlbumUrl  		= $paramSongChosen->albumUrl;
							$oSongObject->oAlbumThumbnail  	= $paramSongChosen->icon;
							$oSongObject->oBandId    		= $paramSongChosen->artistKey;
							$oSongObject->oBandName  		= $paramSongChosen->artist;
							$oSongObject->oBandUrl  		= $paramSongChosen->artistUrl;
							$oSongObject->oProvider  		= $paramprovider;
							$oSongObject->oEmbedUrl  		= $paramSongChosen->embedUrl;
							$oStoringOutput = hwd_vs_tools::doStoreSong($oSongObject);
							break;
				case 'grooveshark':
							$oSongObject->oSongName 	= $paramSongChosen->SongName;
							$oSongObject->oSongId 		= $paramSongChosen->SongID;
							$oSongObject->oSongUrl 		= $paramSongChosen->Url;
							$oSongObject->oAlbumId   	= $paramSongChosen->AlbumID; 
							$oSongObject->oAlbumName 	= $paramSongChosen->AlbumName;
							$oSongObject->oBandId    	= $paramSongChosen->ArtistID;
							$oSongObject->oBandName  	= $paramSongChosen->ArtistName;
							$oSongObject->oProvider  	= $paramprovider;
							$oStoringOutput = hwd_vs_tools::doStoreSong($oSongObject);
							break;
				
				}
			}else{
				$oSongObject->oSongName = $paramSongChosen;
				$oSongObject->oBandName = $paramBandChosen;
				$oSongObject->oProvider = 'userinput';
				$oBandId = hwd_vs_tools::checkBand($paramBandChosen,null);
						if(!$oBandId){
							$oSongObject->oBandId   = 0;
							$oBandId = hwd_vs_tools::addBand($oSongObject);
						}
				$oSongObject->oBandId = $oBandId;		
				$song_id 				= hwd_vs_tools::checkSong($oSongObject->oSongName,null);
				if($oSongObject->oSongName !=''){
					if($song_id==null){
						$song_id = hwd_vs_tools::addSong($oSongObject,null, $oBandId);
					}			
				}
				$oSongObject->oSongId = $song_id;
				$oStoringOutput = $oSongObject;
		
				}	
				
			return $oStoringOutput;	
		}
    function doStoreSong($paramSongObject){
		$oSongId;
		$oBandId; 
		$oAlbumId;
		
		$oBandId = hwd_vs_tools::checkBand($paramSongObject->oBandName,$paramSongObject->oBandId);
		if(!$oBandId)
			$oBandId = hwd_vs_tools::addBand($paramSongObject);
		$oAlbumId = hwd_vs_tools::checkAlbum($paramSongObject->oAlbumName,$paramSongObject->oAlbumId);
		if(!$oAlbumId)
			$oAlbumId = hwd_vs_tools::addAlbum($paramSongObject,$oBandId);	
		$oSongId = hwd_vs_tools::checkSong($paramSongObject->oSongName,$paramSongObject->oSongId);
		if(!$oSongId)
			$oSongId = hwd_vs_tools::addSong($paramSongObject,$oAlbumId,$oBandId);	
		$storeResult = new JObject();	
		$storeResult->oSongId = $oSongId;	
		$storeResult->oBandId = $oBandId;	
		$storeResult->oAlbumId = $oAlbumId;
		return $storeResult;
    }
    
    function cometLongPolling(){
		$session =& JFactory::getSession();
		define('MESSAGE_POLL_MICROSECONDS', 500000);
		define('MESSAGE_TIMEOUT_SECONDS', 90);
		define('MESSAGE_TIMEOUT_SECONDS_BUFFER', 5);
		$oldCount = $session->get('songcount',null);
		session_write_close();
		set_time_limit(MESSAGE_TIMEOUT_SECONDS+MESSAGE_TIMEOUT_SECONDS_BUFFER);
		$counter = MESSAGE_TIMEOUT_SECONDS;
		$data = null;
		while($counter > 0)
		{
			if($data = hwd_vs_tools::getNewCount($oldCount)){
				break;
			}else{
				usleep(MESSAGE_POLL_MICROSECONDS);
				$counter -= MESSAGE_POLL_MICROSECONDS / 1000000;
			}
		}
		if(isset($data)){
			return $data;
			}else
				return 0;
		
	}
	
	function getLastVideoAdded(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT * 
						FROM  #__hwdvidsvideos 
						WHERE 1 
						ORDER BY ID DESC 
						LIMIT 0 , 1'
					 );
        $lastvideoadded = $db->loadObjectList();
        echo $db->getErrorMsg();
        return $lastvideoadded;
		}
	
	function getTotalVideosCount(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
		}
	
	function getNewCount($paramOldCount){
		$oCurrentTotal = hwd_vs_tools::getTotalVideosCount();
		return hwd_vs_tools::setLastVideoCount($oCurrentTotal,$paramOldCount);
		}
		
	function setLastVideoCount($paramTotal,$paramOldCount){
		global $Itemid, $smartyvs;
		$session = & JFactory::getSession();
		if($paramOldCount == $paramTotal)
			return null;
			else{
				session_start();
				$session->set('songcount', $paramTotal);
				$oVideoDetails = hwd_vs_tools::generateVideoListFromSql(hwd_vs_tools::getLastVideoAdded(), null, '100');
				$oHtml ='';
				foreach($oVideoDetails as $video){
					$smartyvs->assign("data", $video);
					$oHtml .= $smartyvs->fetch('notifications_newvideo.tpl');
				}
				return $oHtml;
			}
		}	
    /**
     * Generates list of most bands tags
     *
     * 
     * @return        $wordList
     */
	function getBandTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.label as label FROM #__hwdvidsvideos as b'; 
		$query .= ' INNER JOIN #__hwdvidsbands AS a ON a.id = b.band_id and b.band_id IS NOT NULL;';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =$wordList[$i].',';
		}
		return $wordList;
    }
    
    /**
     * Generates list of most bands tags
     *
     * 
     * @return        $wordList
     */
	function getAlbumsTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT c.label as label FROM #__hwdvidsvideos as b'; 
		$query .= ' INNER JOIN #__hwdvidsbands AS a ON a.id = b.band_id and b.band_id IS NOT NULL
					INNER JOIN #__hwdvidsalbums AS c ON c.id = b.band_id and b.band_id IS NOT NULL;';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =$wordList[$i].',';
		}
		return $wordList;
    }
    
    
    function getVideosBySongs($song_ids){
		 $db = & JFactory::getDBO();
		 $query ='SELECT DISTINCT v.id as id, v.video_type,v.video_id,v.title,v.description,v.tags,v.song_id,v.band_id,v.language_id,v.category_id,v.genre_id,v.intrument_id,v.level_id,
			UNIX_TIMESTAMP(v.date_uploaded) AS date_added,v.video_length,v.allow_comments,v.allow_embedding,v.allow_ratings,v.rating_number_votes,v.rating_total_points,v.user_id,
			v.updated_rating,v.published,v.number_of_comments,v.public_private,v.thumb_snap,v.thumbnail,v.approved,v.number_of_views,u.username as username 
			FROM #__hwdvidsvideos AS v JOIN #__users AS u ON v.user_id = u.id'
			. ' WHERE v.song_id in ( ' . implode(', ',$song_ids) . ')'
            . $orderVideos
            ;
            $db->setQuery($query);
            echo $db->getErrorMsg();
            $results = $db->loadObjectList();
			return $results;
		}
		
	function getSongsByFirstLetter($firstletter){
		 $db = & JFactory::getDBO();
		 $query ='select s.id as songid,
								s.label as songname,
								s.provider as source,
								s.band_id as bandid,
								s.external_id as extsongid,
								s.external_url as extsongurl,
								s.embedding as songurl,
								b.label as band_name,
								b.external_id as extbandid,
								b.external_url as extURL,
								u.id as albumid,
								u.label as album_name,
								u.external_url as extalbURL,
								u.thumbnail as album_thumb 
					from #__hwdvidssongs as s INNER JOIN #__hwdvidsbands as b ON s.band_id=b.id INNER JOIN #__hwdvidsalbums as u ON s.album_id=u.id
					where s.label LIKE \''.$firstletter.'%\' GROUP BY s.label ORDER BY s.label ASC';
		 $db->setQuery($query);
         echo $db->getErrorMsg();
         $results = $db->loadObjectList();
		 return $results;
		}	
	
	function getBandsByFirstLetter($firstletter){
		 $db = & JFactory::getDBO();
		 $query ='select s.id as songid,
								s.label as songname,
								s.provider as source,
								s.band_id as bandid,
								s.external_id as extsongid,
								s.external_url as extsongurl,
								s.embedding as songurl,
								b.label as band_name,
								b.external_id as extbandid,
								b.external_url as extURL,
								u.label as album_name,
								u.id as albumid,
								u.external_url as extalbURL,
								u.thumbnail as album_thumb 
						from #__hwdvidssongs as s INNER JOIN #__hwdvidsbands as b ON s.band_id=b.id INNER JOIN #__hwdvidsalbums as u ON s.album_id=u.id
						where b.label LIKE \''.$firstletter.'%\' GROUP BY b.label ORDER BY b.label ASC';
		 $db->setQuery($query);
         echo $db->getErrorMsg();
         $results = $db->loadObjectList();
		 return $results;
		}	
    
   /**
     * Retrieves the song information stored in DB
     *
     * @return       $srows
     */
    
    function getAlbumInfo($album_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT 
								s.id as songid,
								s.label as songname,
								s.provider as source,
								s.band_id as bandid,
								s.external_id as extsongid,
								s.external_url as extsongurl,
								s.embedding as songurl,
								b.label as band_name,
								b.external_id as extbandid,
								b.external_url as extURL,
								u.label as album_name,
								u.id as albumid,
								u.external_url as extalbURL,
								u.thumbnail as album_thumb'
								. ' FROM #__hwdvidssongs as s INNER JOIN #__hwdvidsbands as b ON s.band_id=b.id INNER JOIN #__hwdvidsalbums as u ON s.album_id=u.id'
								. ' WHERE s.album_id = '.$album_id.' GROUP BY songname'
								);
						
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$srows = $db->loadObjectList();
		return $srows;
	}
    
    /**
     * Generates list of most songs tags
     *
     * 
     * @return        $wordList
     */
	function getSongsTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.label as label FROM #__hwdvidsvideos as b INNER JOIN #__hwdvidssongs AS a'; 
		$query .= ' ON a.id = b.song_id and b.song_id IS NOT NULL';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =$wordList[$i].',';
		}
		return $wordList;
    }
    
    
    
     /**
     * Generates list of most songs tags
     *
     * 
     * @return        $wordList
     */
	function getVideoTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT tags FROM #__hwdvidsvideos'; 
		$query .= ' WHERE tags IS NOT NULL ORDER BY date_uploaded ';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =$wordList[$i].',';
		}
		return $wordList;
    }
    
    
    /**
     * Generates list of most popular tags
     *
     * 
     * @return       $wordList
     */
	function getInstrumentsTags() {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.instrument as instrument FROM #__hwdvidsvideos as b'; 
		$query .= ' INNER JOIN #__hwdvidsinstruments AS a ON a.Id = b.intrument_id';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		for($i = 0; $i < sizeof($wordList); ++$i){
			$wordList[$i] =constant($wordList[$i]).',';
		} 
		
		return $wordList;
    }
    
	function getBeingWatchedNow() {
		global $smartyvs;
		$oHtml = '';
		$db = & JFactory::getDBO();
		$rowsnow = array();
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xmlparse.class.php');
		$parser = new HWDVS_xmlParse();
		$rowsnow = $parser->parse("bwn");
		if (count($rowsnow) > 0){
				$params = array();
				$params['novtd'] = $c->bwn_no;
				$thumbwidth = '100';
				$smartyvs->assign("print_nowlist", 1);
				$nowlist = hwd_vs_tools::generateVideoListFromXml($rowsnow, $thumbwidth);
				$smartyvs->assign("nowlist", $nowlist);
				$oHtml .= $smartyvs->fetch('video_beingwatched.tpl');
				}else{
					$oHtml = 'There are no recently viewed videos sorry.';
					}
			return	$oHtml;	
    }
    
    /**
     * Generates list of most popular tags
     *
     * 
     * @return       $wordList
     */
	function getRelatedVideos($paramVideoId,$paramLimitStart) {
		
		global $hwdvs_selectv,$hwdvs_joinv,$smartyvs;	
		$oResults = '';
		$db = & JFactory::getDBO();
		$row= new hwdvids_video($db);
		$row->load($paramVideoId);
		$searchterm = addslashes($row->title." ".$row->description." ".$row->tags);
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'search.php');
		$whereVideos = hwd_vs_search::search_perform_videos("related",$searchterm);
		$query = 'SELECT'.$hwdvs_selectv
				. ' FROM #__hwdvidsvideos AS video'
				. $hwdvs_joinv
				. $whereVideos
				. ' AND video.published = 1'
				. ' AND video.approved = "yes"'
				. ' AND video.id <> '.$row->id
				. ' LIMIT '.$paramLimitStart.', '.($paramLimitStart+10)
				;
		$db->SetQuery($query);
		$relatedrows = $db->loadObjectList();
		if (count($relatedrows) > 0 )
		{
			$thumbwidth = '100';
			$listrelated = hwd_vs_tools::generateVideoListFromSql($relatedrows, "", $thumbwidth);
			foreach($listrelated as $video){
					$smartyvs->assign("data", $video);
					$oResults .= $smartyvs->fetch('video_list_small.tpl');
				}
		}else{
			$oResults .= "There are no related videos.";
		}
		
		return $oResults;
    }
    
    function getDateRanges($paramDateRange){
		$oDateRangeFilter = '';
		switch($paramDateRange){
			case 'thismonth':
						$oDateRangeFilter =' AND YEAR(video.date_uploaded) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
											AND MONTH(video.date_uploaded) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)';
						break;
			case 'thisweek':
						$oDateRangeFilter =  ' AND video.date_uploaded >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
											 AND video.date_uploaded < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY';
						break;
			case 'today':
						$oDateRangeFilter =  ' AND video.date_uploaded > DATE_SUB(NOW(), INTERVAL 1 DAY)';
						break;									
			case 'yesterday':
						$oDateRangeFilter =  ' AND video.date_uploaded > DATE_SUB(NOW(), INTERVAL 2 DAY)';
						break;
			case 'twodaysago':
						$oDateRangeFilter =  ' AND video.date_uploaded > DATE_SUB(NOW(), INTERVAL 3 DAY)';
						break;			
			}
			
			return $oDateRangeFilter;
		}
    
    function getMostCommented ($paramDateRange){	
		global $mainframe, $limitstart, $limit, $hwdvs_selectv, $hwdvs_joinv;		
		$hwdvs_selectv =' video.*,count(comments.userid) AS cnt';	
		$db = & JFactory::getDBO();
		$where = ' WHERE video.published = 1';
		$where .= ' AND video.approved = "yes" GROUP BY comments.object_id';
		$where .= hwd_vs_tools::getDateRanges($paramDateRange);
		$hwdvs_selectv .=', comments.comment';
		$query = 'SELECT'.$hwdvs_selectv
		. ' FROM #__hwdvidsvideos AS video'
		. ' JOIN #__jcomments AS comments ON comments.object_id = video.id'
		. $where
		. ' ORDER BY cnt DESC'
		. ' LIMIT 0, 20';
		
		$db->SetQuery($query);
		$rowscomm = $db->loadObjectList();
		return $rowscomm;
	
	}
	
	function getTotalCategoryVideosCount($paramcategory){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video WHERE category_id ='.$paramcategory
					 . $hwdvs_joinv
					 . $where
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
		}
	
	function getLatestSearchs() {
		$db = & JFactory::getDBO();
		$query = 'SELECT pattern FROM #__hwdvidssearchlog_term'; 
		$query .= ' WHERE 1';
		$query .= ' ORDER BY last_update DESC LIMIT 0,15';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		$wordListFormat = '';
		$counter = 0;
		foreach ($wordList as &$value) {
			if($value!='' && $value!=' '){	
				if($counter === 0)
				$wordListFormat .= hwd_vs_tools::getAnchor($value);
				else
					$wordListFormat .= ', '.hwd_vs_tools::getAnchor($value);
			$counter++;
			}
		}
		return $wordListFormat;
		}
		
	function getAnchor($word) {
		$url ='';
			if(trim($word) != ''){	
				$url = JRoute::_("index.php?option=com_hwdvideoshare&task=search&Itemid=$Itemid");
				$url = str_replace("&amp;", "&", $url);

				$pos = strpos($url, "?");
				if ($pos === false)
				{
					$url = $url."?pattern=".$word;
				}
				else
				{
					$url = $url."&pattern=".$word;

				}
			}
		
		
			$searchLink = '<a href="'.$url.'&r='.rand().'" title="'.JText::_('View results for ').$word.'">'.$word.'</a>';
			return $searchLink ;
		}
	
	function getMostRecent ($paramDateRange){		
		$db = & JFactory::getDBO();
		global $mainframe, $limitstart, $limit;		
		$oCategory = ' AND video.category_id=';
		if($paramDateRange == 'songtutorial')
			$oCategory .='1';
			else if($paramDateRange == 'theory')
				$oCategory .='3';
					else if($paramDateRange == 'watchmeplay')
						$oCategory .='2';
							else
								$oCategory = '';
        $where = ' WHERE video.approved = "yes"';
		$where.= ' AND video.published = 1';
		$where.= ' AND video.public_private = "public"';
		$where .= $oCategory;
		$order = ' ORDER BY video.date_uploaded DESC';
		$limit = ' LIMIT 0,20';
		$query = 'SELECT video.*'
                . ' FROM #__hwdvidsvideos AS video'
                . $where
                . $order
                . $limit
                ;
		$db->SetQuery($query);
		$rowsrecent = $db->loadObjectList();
		return $rowsrecent;
	
	}
	
	/**
     * Generates a String with all elements of $rows
     *
     * @param array  $rows  the video sql data
     * @return       $words
     */
	
	function concatenateWords($dataObj)
	{
		
		$words = '';
		$words = implode(' ',$dataObj);
		$words = strip_tags($words);
		
		return $words;		
	}
	
	
	function filterWords($input, $additionalWords = '')
	{
		$commonWords = array('a','able','about','above','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','dont','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','find','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','lot','lot\'s','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','page','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','work','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');

		if (!empty($additionalWords))
		{
			$additionalWords = $additionalWords;
			$additionalWords = explode(',',$additionalWords);
			$commonWords = array_merge($commonWords, $additionalWords);
		}
		
		//convert everything to lower case for ease in next parts.
		$input = strtolower($input);
		//$input = str_replace(",", " ", $input);
		//preg_replace only works with under 94236 chars, so break up if necessary
		if (strlen($input) > 94000)
		{
			$chunks = str_split($input, 94000);
			//remove all non alpha chars, 0-9.,!/? etc
			$input .= '';
			foreach ($chunks as $chunk)
			{
				$input .= ' '.preg_replace('/[^\p{L}\s]/', '', $chunk);
			}
		}
		
		return $input;
	}
	
	function parseTagsString($string, $count = 25)
	{
		//filters through words to get occurence value.
		$topList = array();	
		$arrayWordList = explode(',',$string);
		$wordList = array_count_values($arrayWordList);
		arsort($wordList);
		
		foreach ($wordList as $word => $wordNo)
		{
			if (strlen($word) > 3)
			{
				$wordCount = array_keys($wordList,$wordNo,false);
				
				$wordCount = count($wordCount);
				//glitch in rsort puts 1,2,3 above 15, 16 etc
				if (strlen($wordCount) < 2) { $wordCount = '0'.$wordCount; } 
				$topList[$word] = $wordNo .'~'. $word;
			}
		}
		
		$i = 1;
		$finalList = array();
		
		foreach ($topList as $word => $wordNo)
		{
			array_push($finalList,$wordNo);
			$i++;
			if($i > $count)
			break;
		}
		
		$finalList = array_unique($finalList);
		
		return $finalList;
	}
	
	function outputWords($array,$minSize = 10, $maxSize = 25)
	{
		global $Itemid;
		$biggest = explode('~',$array[0]);
		$smallest = explode('~',$array[count($array)-1]);
		$code = '';
		$biggest = $biggest[0];
		$smallest = $smallest[0];
		$difference = $biggest - $smallest;
		$fontDifference = $maxSize-$minSize;
		foreach ($array as $word)
		{			
			$details = explode('~',$word);
			if(trim($details[0]) != ''){
			$percent = round(($details[0] - $smallest) / $difference,1);
			$fontSize = round($minSize + ($fontDifference*$percent));	
					$url = JRoute::_("index.php?option=com_hwdvideoshare&task=search&Itemid=$Itemid");
					$url = str_replace("&amp;", "&", $url);

					$pos = strpos($url, "?");
					if ($pos === false)
					{
						$url = $url."?pattern=".$details[1];
					}
					else
					{
						$url = $url."&pattern=".$details[1];

					}		
			//$url = JRoute::_("index.php?searchword=".$details[1]."&ordering=newest&searchphrase=all&Itemid=29&option=com_search&lang=en");
			$code.= '<li><a href="'.$url.'"><span class="fleft">'.$details[1].'</span><span class="hits">'.floor($details[0]).'</span></a></li>';
			}
		}
		return $code;

	}
	
	
    /**
     * Generates the group membership status of a user
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateGroupMembershipStatus( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$code = null;
		if ( !$my->id ){ return $code; }

		$url = JRoute::_($_SERVER['REQUEST_URI']);

		$db->SetQuery( 'SELECT count(*)'
				. ' FROM #__hwdvidsgroup_membership'
				. ' WHERE groupid = '.$row->id
				. ' AND memberid = '.$my->id
				);
		$total = $db->loadResult();
		echo $db->getErrorMsg();

		if ($total > 0) {
			$code.="<form name=\"leavegroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=leavegroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"memberid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/group_delete.png\" alt=\""._HWDVIDS_DETAILS_LEAVEG."\">&nbsp;";
			$code.="<input type=\"submit\" value=\""._HWDVIDS_DETAILS_LEAVEG."\" class=\"interactbutton\">";
			$code.="</form>";
		} else {
			$code.="<form name=\"joingroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=joingroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"memberid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/group_add.png\" alt=\""._HWDVIDS_DETAILS_JOING."\">&nbsp;";
			$code.="<input type=\"submit\" value=\""._HWDVIDS_DETAILS_JOING."\" class=\"interactbutton\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the group membership status of a user
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateChannelSubscriptionStatus( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$code = null;
		if ( !$my->id ){ return $code; }

		$url = JRoute::_($_SERVER['REQUEST_URI']);

		$db->SetQuery( 'SELECT count(*)'
				. ' FROM #__hwdvidssubs'
				. ' WHERE memberid = '.$my->id
				. ' AND userid = '.$row->user_id
				);
		$total = $db->loadResult();
		echo $db->getErrorMsg();

		if ($total > 0) {
			$code.="<form name=\"unsubscribe\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=unsubscribeChannel")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"memberid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$row->user_id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_unsubscribe.png\" alt=\""._HWDVIDS_UNSUBSCRIBE."\">&nbsp;";
			$code.="</form>";
		} else {
			$code.="<form name=\"subscribe\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=subscribeChannel")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"memberid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$row->user_id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."button_subscribe.png\" alt=\""._HWDVIDS_SUBSCRIBE."\">&nbsp;";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the delete group button
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateDeleteGroupButton( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->adminid ){
			hwd_vs_javascript::confirmDelete();
			$code.="<form name=\"deletegroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=deletegroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/delete.png\" alt=\""._HWDVIDS_DETAILS_DELETEG."\" onClick=\"return confirmDelete()\">";
			$code.="<input type=\"submit\" value=\""._HWDVIDS_DETAILS_DELETEG."\" class=\"interactbutton\" onClick=\"return confirmDelete()\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the delete group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateDeleteGroupLink( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->adminid ){
			hwd_vs_javascript::confirmDelete();
			$code.="<form name=\"deletegroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=deletegroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/delete.png\" alt=\""._HWDVIDS_DETAILS_DELETEG."\"  onClick=\"return confirmDelete()\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the delete group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateDeletePlaylistLink( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->user_id ){
			hwd_vs_javascript::confirmDelete();
			$code.="<form name=\"deletegroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=deletePlaylist")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"playlistid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/delete.png\" alt=\""._HWDVIDS_DETAILS_DELETEG."\"  onClick=\"return confirmDelete()\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the edit group button
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateEditGroupButton( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->adminid ){
			$code.="<form name=\"editgroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=editgroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/edit.png\" alt=\""._HWDVIDS_DETAILS_EDITG."\">";
			$code.="<input type=\"submit\" value=\""._HWDVIDS_DETAILS_EDITG."\" class=\"interactbutton\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the edit group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateEditGroupLink( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->adminid ){
			$code.="<form name=\"editgroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=editgroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/edit.png\" alt=\""._HWDVIDS_DETAILS_EDITG."\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the edit group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateEditPlaylistLink( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);
		if ( $my->id == $row->user_id ){
			$code.="<form name=\"editgroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=editPlaylist")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"playlistid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/edit.png\" alt=\""._HWDVIDS_DETAILS_EDITG."\">";
			$code.="</form>";
		}
		return $code;
    }
    /**
     * Generates the delete video button
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateDeleteVideoLink( $row )
	{
		global $hwdvsItemid, $isModerator;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'js.php');

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);

		// check component access settings and deny those without privileges
		if (!$isModerator)
		{
			if ($my->id == $row->user_id)
			{
				if ($my->id == "0")
				{
					return $code;
				}
				if ($c->allowviddel == "0")
				{
					return $code;
				}
			}
			else
			{
				return $code;
			}
		}
		
		$code.="<form name=\"deletevideo\" style=\"display: none;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=deletevideo&video_id=".$row->id)."\" method=\"post\">";
		$code.="<input type=\"hidden\" name=\"videoid\" value=\"".$row->id."\" />";
		$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
		$code.="<button type=\"submit\" class=\"btn\" value=\"Delete\" alt=\""._HWDVIDS_DETAILS_DELETEVID."\" onClick=\"return confirmDelete()\" ><span class=\"icon-trash\"></span>"._HWDVIDS_DETAILS_DELETEALL."</button>";
		$code.="</form>";
		$code.="<a href=\"#\" class=\"deletevideobutton\" title=\""._HWDVIDS_DETAILS_DELETEVID."\"><span class=\"icon-trash\"></span> "._HWDVIDS_DETAILS_DELETEALL."</a>";
		return $code;
    }
    /**
     * Generates the delete video button
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateBreadcrumbs($row=null, $title=null) {

		global $task, $hwdvsItemid;
		$db = & JFactory::getDBO();

		jimport( 'joomla.application.pathway' );
		$breadcrumbs =& JFactory::getApplication()->getPathway();

		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$menu_details = &$menu->getActive();

		$crumbs = array();

		if (!empty($task))
		{
			if (@$menu_details->link !== "index.php?option=com_hwdvideoshare&task=frontpage")
			{
				//array_pop( $breadcrumbs->_pathway );
				//array_pop( $breadcrumbs->_pathway );
				//array_pop( $breadcrumbs->_pathway );
			}

			if (@$menu_details->parent !== "0")
			{
				//array_pop( $breadcrumbs->_pathway );
				//array_pop( $breadcrumbs->_pathway );
				//array_pop( $breadcrumbs->_pathway );
			}

			$index = 0;
			$insertVideoBreadcrumb = true;

			if ($insertVideoBreadcrumb)
			{
				$crumbs[$index][0] = _HWDVIDS_META_DEFAULT;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=frontpage');
				$index++;
			}

			if ($task == "frontpage")
			{
				$crumbs[$index][0] = _HWDVIDS_META_FP;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=frontpage');
			}
			else if ($task == "search" || $task == "displayresults")
			{
				$crumbs[$index][0] = _HWDVIDS_META_SR;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=search');
			}
			else if ($task == "upload")
			{
				$crumbs[$index][0] = _HWDVIDS_META_UPLD;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=uploadconfirm');
			}
			else if ($task == "uploadconfirm" || $task == "addconfirm")
			{
				$crumbs[$index][0] = _HWDVIDS_META_UPLDSUC;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=uploadconfirm');
			}
			else if ($task == "viewvideo")
			{
				$crumbs[$index][0] = _HWDVIDS_META_CATS;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=categories');
				$index++;

				$query = 'SELECT parent, category_name FROM #__hwdvidscategories WHERE id = '.$row->category_id;
				$db->SetQuery($query);
				$videoCategory = $db->loadObject();

				if (isset($videoCategory->parent))
                                {
                                if ($videoCategory->parent == 0)
				{
					$crumbs[$index][0] = $videoCategory->category_name;
					$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->category_id);
					$index++;
				}
				else
				{
					$query = 'SELECT * FROM #__hwdvidscategories WHERE id = '.$videoCategory->parent;
					$db->SetQuery($query);
					$parent_category = $db->loadObject();

					if ($parent_category->parent == 0)
					{
						$crumbs[$index][0] = $parent_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$parent_category->id);
						$index++;

						$crumbs[$index][0] = $title;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->id);
						$index++;
					}
					else
					{
						$query = 'SELECT * FROM #__hwdvidscategories WHERE id = '.$parent_category->parent;
						$db->SetQuery($query);
						$top_category = $db->loadObject();

						$crumbs[$index][0] = $top_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$top_category->id);
						$index++;

						$crumbs[$index][0] = $parent_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$parent_category->id);
						$index++;

						$crumbs[$index][0] = $title;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->id);
						$index++;
					}
				}
                                }

				$crumbs[$index][0] = $title;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewvideo&video_id='.$row->id);
			}
			else if ($task == "categories")
			{
				$crumbs[$index][0] = _HWDVIDS_META_CATS;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=categories');
			}
			else if ($task == "viewcategory")
			{
				$crumbs[$index][0] = _HWDVIDS_META_CATS;
				$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=categories');
				$index++;

				$query = 'SELECT parent FROM #__hwdvidscategories WHERE id = '.$row->id;
				$db->SetQuery($query);
				$parent = $db->loadResult();

				if ($parent == 0)
				{
					$crumbs[$index][0] = $title;
					$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->id);
				}
				else
				{

					$query = 'SELECT * FROM #__hwdvidscategories WHERE id = '.$parent;
					$db->SetQuery($query);
					$parent_category = $db->loadObject();

					if ($parent_category->parent == 0)
					{
						$crumbs[$index][0] = $parent_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$parent_category->id);
						$index++;

						$crumbs[$index][0] = $title;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->id);
					}
					else
					{
						$query = 'SELECT * FROM #__hwdvidscategories WHERE id = '.$parent_category->parent;
						$db->SetQuery($query);
						$top_category = $db->loadObject();

						$crumbs[$index][0] = $top_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$top_category->id);
						$index++;

						$crumbs[$index][0] = $parent_category->category_name;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$parent_category->id);
						$index++;

						$crumbs[$index][0] = $title;
						$crumbs[$index][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=viewcategory&cat_id='.$row->id);
					}
				}
			}
		}
		else
		{
			$crumbs[0][0] = _HWDVIDS_META_DEFAULT;
			$crumbs[0][1] = JRoute::_('index.php?option=com_hwdvideoshare&Itemid='.$hwdvsItemid.'&task=frontpage');
		}

		for ($i=0, $n=count($crumbs); $i < $n; $i++)
		{
			$breadcrumbs->addItem($crumbs[$i][0], $crumbs[$i][1]);
		}

		return;
    }
    /**
     * Generates the delete video button
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generatePublishVideoLink( $row )
	{
		global $hwdvsItemid, $isModerator;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'js.php');

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);

		// check component access settings and deny those without privileges
		if (!$isModerator)
		{
			return $code;
		}

		$publish_task = $row->published ? '0' : '1';
		$publish_text = $row->published ? 'Unpublish' : 'Publish';
		$publish_img = $row->published ? 'unpublish.png' : 'publish.png';

		$code.="<form name=\"publishvideo\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=publishvideo&video_id=".$row->id."&publish=".$publish_task)."\" method=\"post\">";
		$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
		$code.="<input type=\"hidden\" name=\"videoid\" value=\"".$row->id."\" />";
		$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
		$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/".$publish_img."\" alt=\"".$publish_text."\">";
		$code.="</form>";

		return $code;
    }
       /**
     * Generates the delete video button
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateApproveVideoLink( $row )
	{
		global $hwdvsItemid, $isModerator;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'js.php');

		$code = null;

		// check component access settings and deny those without privileges
		if (!$isModerator)
		{
			return $code;
		}

		if ($row->approved == "pending")
		{
			$code.="<form name=\"approvevideo\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=approvevideo&video_id=".$row->id)."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"videoid\" value=\"".$row->id."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/tick.png\" alt=\"Approve\">";
			$code.="</form>";
		}

		return $code;
    }
    /**
     * Generates the delete video link
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateEditVideoLink( $row )
	{
		global $hwdvsItemid, $isModerator;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$doc = & JFactory::getDocument();

		$code = null;
		$url = JRoute::_($_SERVER['REQUEST_URI']);

		// check component access settings and deny those without privileges
		if (!$isModerator)
		{
			if ($my->id == $row->user_id)
			{
				if ($my->id == "0")
				{
					return $code;
				}
				if ($c->allowvidedit == "0")
				{
					return $code;
				}
			}
			else
			{
				return $code;
			}
		}

		$code.="<form name=\"editvideo\" style=\"display: none;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=editvideo")."\" method=\"post\">";
		$code.="<input type=\"hidden\" name=\"user_id\" value=\"".$my->id."\" />";
		$code.="<input type=\"hidden\" name=\"video_id\" value=\"".$row->id."\" />";
		$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
		$code.="<button type=\"submit\" value=\"Edit\" alt=\""._HWDVIDS_DETAILS_EDITVID."\" class=\"btn\"><span class=\"icon-pencil\"></span>"._HWDVIDS_DETAILS_EDITALL."</button>";
		$code.="</form>";
		$code.="<a href=\"#\" class=\"editvideobutton\" title=\""._HWDVIDS_DETAILS_EDITVID."\"><span class=\"icon-pencil\"></span> "._HWDVIDS_DETAILS_EDITALL."</a>";

		return $code;
    }

    /**
     * Generates the delete video link
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateEditChannelLink( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();

		$code = null;

		if ($my->id == "0")
		{
			return $code;
		}

		$code.="<form name=\"editChannel\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=editChannel")."\" method=\"post\">";
		$code.="<input type=\"hidden\" name=\"channel_id\" value=\"".$row->id."\" />";
		$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/edit.png\" alt=\""._HWDVIDS_EDITCHANNEL."\">";
		$code.="</form>";

		return $code;
    }

    /**
     * Generates the report group button
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateReportGroupButton( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$code = null;
		if ( !$my->id ){ return $code; }

		$url = JRoute::_($_SERVER['REQUEST_URI']);

			$code.="<form name=\"reportgroup\" style=\"display: inline;\" action=\"".JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=reportgroup")."\" method=\"post\">";
			$code.="<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.="<input type=\"hidden\" name=\"groupid\" value=\"".$row->id."\" />";
			$code.="<input type=\"hidden\" name=\"url\" value=\"".$url."\" />";
			$code.="<input type=\"image\" src=\"".URL_HWDVS_IMAGES."icons/flag.png\" alt=\""._HWDVIDS_DETAILS_REPORTG."\">&nbsp;";
			$code.="<input type=\"submit\" value=\""._HWDVIDS_DETAILS_REPORTG."\" class=\"interactbutton\">";
			$code.="</form>";

		return $code;
    }
    /**
     * Generates the 'add video to group' button
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateAddToGroupButton($row)
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$code = null;
		if ($my->id && $c->showa2gb == "1")
		{
			$smartyvs->assign("showAddButton", 1);
			$smartyvs->assign("print_addtogroup", 1);
			hwd_vs_javascript::ajaxaddtogroup($row);

			// Setup ajax tags
			if ($c->ajaxa2gmeth == 1) { $ajaxa2g = "onsubmit=\"ajaxFunctionA2G();return false;\""; } else { $ajaxa2g = null; }

			$db->SetQuery( 'SELECT count(*)'
								. ' FROM #__hwdvidsgroup_membership AS a'
								. ' LEFT JOIN #__hwdvidsgroups AS l ON l.id = a.groupid'
								. ' WHERE a.memberid = '.$my->id
								);
			$total = $db->loadResult();
			echo $db->getErrorMsg();

			if ($total > 0)
			{
				$query = 'SELECT a.*, l.*'
									. ' FROM #__hwdvidsgroup_membership AS a'
									. ' LEFT JOIN #__hwdvidsgroups AS l ON l.id = a.groupid'
									. ' WHERE a.memberid = '.$my->id
									. ' ORDER BY a.memberid'
									;

				$db->SetQuery($query);
				$grows = $db->loadObjectList();

				$code.= "<form name=\"add2group\" ".$ajaxa2g." action=\"".JURI::root( true )."/index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=addvideotogroup\" method=\"post\">";
				$code.= "<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
				$code.= "<input type=\"hidden\" name=\"videoid\" value=\"".$row->id."\" />";
				$code.= "<select name=\"groupid\" class=\"add2gselect\">";
				$code.= "<option value=\"0\">"._HWDVIDS_DETAILS_A2G."</option>";
					$n=count($grows);
					for ($i=0, $n=count($grows); $i < $n; $i++) {
						$grow = $grows[$i];
						$code.= "<option value =\"".$grow->id."\">".$grow->group_name."</option>";
					}
				$code.= "</select>&nbsp;";
				$code.= "<input type=\"submit\" value=\""._HWDVIDS_BUTTON_ADD."\" id=\"add2groupbutton\" class=\"interactbutton\" />";
				$code.= "</form>";
			}
		}
		return $code;
    }
    
    function checkPlaylistItem($paramPL, $paramItem){
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id FROM #__hwdvidsplaylists_videos AS a'; 
		$query .= ' WHERE a.playlist_id = '.$paramPL.' AND item_id='.$paramItem;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		$bandMatched = null;
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
		return $bandMatched;
		
		}
    
    /**
     * Generates the 'add video to group' button
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateAddToPlaylistButton($row)
	{
		global $smartyvs, $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$video_id = $row->id;
		$code = null;

		$db->SetQuery( 'SELECT count(*)'
							. ' FROM #__hwdvidsplaylists'
							. ' WHERE user_id = '.$my->id
							);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
			$smartyvs->assign("showAddButton", 1);
		if($my->id){
			$query = 'SELECT * FROM #__hwdvidsplaylists WHERE user_id = '.$my->id;
			$db->SetQuery($query);
			$rows = $db->loadObjectList();
			$listItem = '';
			$code.= "<form class=\"fleft\" name=\"add2playlist\" action=\"".JURI::root( true )."/index.php?option=com_hwdvideoshare&Itemid=".$hwdvsItemid."&task=addvideotoplaylist\" method=\"post\">";
			$code.= "<input type=\"hidden\" name=\"userid\" value=\"".$my->id."\" />";
			$code.= "<input type=\"hidden\" name=\"videoid\" value=\"".$row->id."\" />";
			$code.= "<select name=\"playlistid\" class=\"add2gselect dispnon\">";
			$code.= "<option value=\"0\">Add to playlist</option>";
				$n=count($rows);
				for ($i=0, $n=count($rows); $i < $n; $i++) {
					$row = $rows[$i];
					$oIconClass = (hwd_vs_tools::checkPlaylistItem($row->id,$video_id ))?'icon-check':'icon-check-empty';
					$oIconTypeClass = ($row->public_private == 'public' )?'icon-unlock':'icon-lock';
					$listItem .= "<li><a id =\"ll".$row->id."\" href=\"#\"><i class=\"".$oIconClass." fontgreen\"></i> <i class=\"".$oIconTypeClass."\"></i> <i class=\"icon-list-ol padright4\"></i> ".$row->playlist_name."</a></li>";
				}
			$code.= "</select>&nbsp;";
			}
			$code.= "<div class=\"btn-group\">
						<button type=\"submit\" id=\"add2plbutton\" class=\"btn\">
							<i class=\"icon-list padright4\"></i>"._HWDVIDS_T_PLAYLISTS."
						</button>
						<ul class=\"dropdown-menu\">";
						
						if($my->id){
							if($listItem != '')
								$code.= $listItem."<li class=\"divider\"></li>";
							$code.="<li><span class=\"mleft12 fontbold pad6\">"._HWDVIDS_META_NPL."</span>
								<div id=\"newplaylist\" class=\"mleft6 steps\">
									<form name=\"createplaylist\" action=\"\" class=\"mtop6\" method=\"post\">
											<input name=\"playlist_name\" id=\"playlist_name\" value=\"\" class=\"inputbox\" placeholder=\""._HWDVIDS_ALERT_NOPLNAME."\" maxlength=\"500\" />
											<select id=\"public_private\" name=\"public_private\">
												  <option value=\"public\" selected=\"selected\">"._HWDVIDS_SELECT_PUBLIC."</option>
												  <option value=\"private\">"._HWDVIDS_SELECT_REG."</option>
											</select>
											<input type=\"hidden\" name=\"require_approval\" value=\"0\"/>
											<button type=\"submit\" id=\"addplbutton\" name=\"send\" class=\"btn btn-small\" ><i class=\"icon-plus\"> </i> "._HWDVIDS_META_ADDPL."</button>
									</form>
								</div>
							</li>";
						}else{
							$code.= "<li>
										<a class=\"crossclose fright\" title=\""._HWDVIDS_CLICKTOCLOSE."\"><i class=\"icon-remove\"></i></a>
										<span class=\"clear pad6\">"._HWDVIDS_META_LOGTOPL."</span>";
							}
						$code.="</ul>
					  </div>";
			$code.= "</form>";

		return $code;
    }
    /**
     * Generates video comments count
     *
     * @param string $row  the video sql data
     * @return       $comments
     */
	function generateVideoCommentsCount($row)
	{
		if (!file_exists(JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS))
				{
					$comments= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JCOMMENTS."</div>";
				}
				else
				{
					$comments = JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS.'jcomments.php';
					if (file_exists( $comments ))
					{	
						require_once( $comments );
						$comments = JComments::getCommentsCount( $row->id, 'com_hwdvideoshare_v');
					}
				}
				
		return $comments;
    }
    
    /**
     * Generates the 'video comments' system
     *
     * @param string $row  the video sql data
     * @return       $code
     */
	function generateVideoComments($row)
	{
		global $hwdvsItemid, $smartyvs, $botDisplay, $plgDisplay, $j16;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();

		$code = null;

		if ( $c->showcoms == "1" && $row->allow_comments == "1" && $c->commssys !== "99" )
		{
                        $smartyvs->assign("print_comments", 1);
			if ( $c->commssys == 0 )
			{
				if (!file_exists(JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JCOMMENTS."</div>";
				}
				else
				{
					$comments = JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS.'jcomments.php';
					if (file_exists( $comments ))
					{
						require_once( $comments );
						$comments = JComments::showComments( $row->id, 'com_hwdvideoshare_v', $row->title );
						if(strlen($comments)>0)
			            $code.= "<div class=\"padding\">".$comments."</div>";
							else{
								/* comments boxes */
								jimport( 'joomla.application.module.helper' );								
								$module = JModuleHelper::getModule( 'login' );
								$modcblogin = JModuleHelper::renderModule($module);
								$code.= "<div class=\"padding mtop24 tcenter w60 mbot20\">Be the first to enter a comment!</div>";
								$code.="<p class=\"tcenter w60 mtop24 mbot6\">Log in to enter your comment</p>".$modcblogin."";
							}
					}
				}
			}
			else if ( $c->commssys == 2 )
			{
				if (!file_exists(JPATH_SITE. DS . 'administrator' . DS . 'components' . DS . 'com_comment' . DS . 'plugin' . DS . 'com_hwdvideoshare' . DS . 'josc_com_hwdvideoshare.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOOMLACOMMENT."</div>";
				}
				else
				{
					require_once(JPATH_SITE. DS . 'administrator' . DS . 'components' . DS . 'com_comment' . DS . 'plugin' . DS . 'com_hwdvideoshare' . DS . 'josc_com_hwdvideoshare.php');
					$code = output($row, '');
				}
			}
			else if ( $c->commssys == 3 )
			{
				if ($j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot'.DS.'jom_comment_bot.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOMCOMMENTS."</div>";
				}
				else if (!$j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOMCOMMENTS."</div>";
				}
				else
				{
					include_once(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot.php');
					$comments = jomcomment( $row->id, 'com_hwdvideoshare_v');
					$comments2 = jomcomment( $row->id, 'com_hwdvideoshare_v');
					$code.= "<div class=\"padding\">".$comments."</div>";
					$code.= "<div class=\"padding\">".$comments2."</div>";
				}
			}
			else if ( $c->commssys == 7 )
			{
				if ($j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else if (!$j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else
				{
					$db_catid = 1;

					include_once(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss.php');
					$dispatcher	=& JDispatcher::getInstance();
					JPluginHelper::importPlugin('content');
					$db_comments->id = $row->id;
					$db_comments->sectionid = $row->category_id;
					$db_comments->catid = $row->category_id;
					$db_comments->state = $row->published;
					$db_comments->title = $row->title;
					$db_comments->created_by = $row->user_id;
					$db_comments->text = '{mos_fb_discuss:'.$db_catid.'}';
					$db_results = $dispatcher->trigger('onPrepareContent', array (&$db_comments, null, 0));
					//print_r($db_comments);
					//print_r($botDisplay);
					//exit;
					$code.= "<div class=\"padding\">".$botDisplay[$row->id]."</div>";
				}
			}

			else if ( $c->commssys == 8 )
			{
				if ($j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else if (!$j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else
				{
					$db_catid = 5551;

					$hwdvsItem                 = JTable::getInstance('content');
					$dispatcher           = JDispatcher::getInstance();
					$params               = new JParameter('');
					JPluginHelper::importPlugin('content');
					$hwdvsItem->parameters     = new JParameter('');
					$hwdvsItem->id             = $row->id;
					$hwdvsItem->state          = $row->published;
					$hwdvsItem->catid          = "$db_catid";
					$hwdvsItem->sectionid      = null;
					$hwdvsItem->title          = stripslashes($row->title);
					$hwdvsItem->text           = "{kunena_discuss}";

					// Apply content plugins to custom text
					$results              = $dispatcher->trigger('onPrepareContent', array (&$hwdvsItem, &$params, 0));

					if (property_exists('plgContentKunenaDiscuss', 'plgDisplay'))
					{
						$code.= "<div class=\"padding\">".plgContentKunenaDiscuss::$plgDisplay[$row->id]."</div><div style=\"clear:both;\"></div>";
					}
					else if (property_exists('plgContentKunenaDiscuss', 'botDisplay'))
					{
						$code.= "<div class=\"padding\">".plgContentKunenaDiscuss::$botDisplay[$row->id]."</div><div style=\"clear:both;\"></div>";
					}
				}
			}
			else if ( $c->commssys == 9 )
			{
				if ($j16)
				{
					if (!file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jacomment'.DS.'jacomment.php'))
					{
						$code.= "<div class=\"padding\">JA Comment plugin is not installed.</div>";
					}
					else
					{
						$code.= "<div class=\"padding\">{jacomment contentid=".$row->id." option=com_hwdvideoshare_v contenttitle=".stripslashes($row->title)."}</div>";
					}
				}
				else
				{
					if (!file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jacomment.php'))
					{
						$code.= "<div class=\"padding\">JA Comment plugin is not installed.</div>";
					}
					else
					{
						$code.= "<div class=\"padding\">{jacomment contentid=".$row->id." option=com_hwdvideoshare_v contenttitle=".stripslashes($row->title)."}</div>";
					}
				}
			}
		}
		$smartyvs->assign("comment_code", $code);
		return $code;
    }
    /**
     * Generates the 'group comments' system
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function generateGroupComments($row)
	{
		global $hwdvsItemid, $smartyvs, $botDisplay, $plgDisplay, $j16;
		$c = hwd_vs_Config::get_instance();

		$code = null;

		if ( $c->showcoms ==1 && $row->allow_comments == 1 )
		{
			$smartyvs->assign("print_comments", 1);
			if ( $c->commssys == 0 )
			{
				if (!file_exists(JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JCOMMENTS."</div>";
				}
				else
				{
					$comments = JPATH_SITE.DS.'components'.DS.'com_jcomments'.DS.'jcomments.php';
					if (file_exists( $comments ))
					{
						require_once( $comments );
						$comments = JComments::showComments( $row->id, 'com_hwdvideoshare_g', $row->group_name );
			            $code.= "<div class=\"padding\">".$comments."</div>";
					}
				}
			}
			else if ( $c->commssys == 2 )
			{
				if (!file_exists(JPATH_SITE. DS . 'administrator' . DS . 'components' . DS . 'com_comment' . DS . 'plugin' . DS . 'com_hwdvideoshareGroup' . DS . 'josc_com_hwdvideoshareGroup.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOOMLACOMMENT."</div>";
				}
				else
				{
					require_once(JPATH_SITE . DS  . 'administrator' . DS . 'components' . DS . 'com_comment' . DS . 'plugin' . DS . 'com_hwdvideoshareGroup' . DS . 'josc_com_hwdvideoshareGroup.php');
					$code = output($row, '');
				}
			}
			else if ( $c->commssys == 3 )
			{
				if ($j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot'.DS.'jom_comment_bot.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOMCOMMENTS."</div>";
				}
				else if (!$j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot.php'))
				{
					$code.= "<div class=\"padding\">"._HWDVIDS_INFO_NOINS_JOMCOMMENTS."</div>";
				}
				else
				{
					include_once(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jom_comment_bot.php');
					$comments = jomcomment( $row->id, 'com_hwdvideoshare_g');
					$code.= "<div class=\"padding\">".$comments."</div>";
				}
			}
			else if ( $c->commssys == 8 )
			{
				if ($j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else if (!$j16 && !file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'kunenadiscuss.php'))
				{
					$code.= "<div class=\"padding\">Kunena DicsussBot is not installed.</div>";
				}
				else
				{
					$db_catid = 5552;

					$hwdvsItem                 = JTable::getInstance('content');
					$dispatcher           = JDispatcher::getInstance();
					$params               = new JParameter('');
					JPluginHelper::importPlugin('content');
					$hwdvsItem->parameters     = new JParameter('');
					$hwdvsItem->id             = $row->id;
					$hwdvsItem->state          = $row->published;
					$hwdvsItem->catid          = "$db_catid";
					$hwdvsItem->sectionid      = null;
					$hwdvsItem->title          = stripslashes($row->group_name);
					$hwdvsItem->text           = "{kunena_discuss}";

					// Apply content plugins to custom text
					$results              = $dispatcher->trigger('onPrepareContent', array (&$hwdvsItem, &$params, 0));

					if (property_exists('plgContentKunenaDiscuss', 'plgDisplay'))
					{
						$code.= "<div class=\"padding\">".plgContentKunenaDiscuss::$plgDisplay[$row->id]."</div><div style=\"clear:both;\"></div>";
					}
					else if (property_exists('plgContentKunenaDiscuss', 'botDisplay'))
					{
						$code.= "<div class=\"padding\">".plgContentKunenaDiscuss::$botDisplay[$row->id]."</div><div style=\"clear:both;\"></div>";
					}
				}
			}
			else if ( $c->commssys == 9 )
			{
				if ($j16)
				{
					if (!file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jacomment'.DS.'jacomment.php'))
					{
						$code.= "<div class=\"padding\">JA Comment plugin is not installed.</div>";
					}
					else
					{
                                                $code.= "<div class=\"padding\">{jacomment contentid=".$row->id." option=com_hwdvideoshare_g contenttitle=".stripslashes($row->title)."}</div>";
					}
				}
				else
				{
					if (!file_exists(JPATH_SITE.DS.'plugins'.DS.'content'.DS.'jacomment.php'))
					{
						$code.= "<div class=\"padding\">JA Comment plugin is not installed.</div>";
					}
					else
					{
        					$code.= "<div class=\"padding\">{jacomment contentid=".$row->id." option=com_hwdvideoshare_g contenttitle=".stripslashes($row->title)."}</div>";
					}
				}
			}
		}
		$smartyvs->assign("comment_code", $code);
		return $code;
    }
    
    
       
    /**
     * Generates multilanguage text for Video Instrument
     *
     * @return       $instrument
     */
    
    function getVideoInstrument($intrument_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT instrument'
								. ' FROM #__hwdvidsinstruments'
								. ' WHERE id = '.$intrument_id
								);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$grows = $db->loadObjectList();
		return $grows[0]->instrument;
	}
     
     /**
     * Generates multilanguage text for Video Levels
     *
     * @return       $label
     */
    
    function getVideoLevel($level_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT label'
								. ' FROM #__hwdvidslevels'
								. ' WHERE id = '.$level_id
								);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$grows = $db->loadObjectList();
		return $grows[0]->label;
	}	
	
	/**
     * Retrieves the song information stored in DB
     *
     * @return       $srows
     */
    
    function getSongInfo($song_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT 
								s.id as songid,
								s.label as songname,
								s.provider as source,
								s.band_id as bandid,
								s.external_id as extsongid,
								s.external_url as extsongurl,
								s.embedding as songurl,
								b.label as band_name,
								b.external_id as extbandid,
								u.label as album_name,
								u.id as albumid,
								u.thumbnail as album_thumb'
								. ' FROM #__hwdvidssongs as s INNER JOIN #__hwdvidsbands as b ON s.band_id=b.id INNER JOIN #__hwdvidsalbums as u ON s.album_id=u.id'
								. ' WHERE s.id = '.$song_id
								);
						
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$srows = $db->loadObjectList();
		return $srows;
	}
	
    /**
     * Generates multilanguage text for Video Genre
     *
     * @return       $genre
     */
    
    function getVideoGenre($genre_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT genre'
								. ' FROM #__hwdvidsgenres'
								. ' WHERE id = '.$genre_id
								);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$grows = $db->loadObjectList();
		return $grows[0]->genre;
	}
	
	function getUserIsFirstVisit($user){
		$oFirstVisit = false;
		if ($user->get('guest') != 1 && $user->lastvisitDate == "0000-00-00 00:00:00")
		  {
			 $oFirstVisit =true;;
		  }	
		 return $oFirstVisit; 
		}
	
	/**
     * Generates multilanguage text for Video Genre
     *
     * @return       $genre
     */
    
    function getNumVideosSinceLastVisit($user_id){
		$user =& JFactory::getUser( $user_id );
		$db = & JFactory::getDBO();
		
		$db->SetQuery( 'SELECT count(*)'
								. ' FROM #__hwdvidsvideos'
								. ' WHERE date_uploaded > "'.$user->lastvisitDate.'"'
								);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		return $total;
	}
		
    /**
     * Generates multilanguage text for Video Genre
     *
     * @return       $genre
     */
    
    function getUserContextDetails($user_id){
		
		$db = & JFactory::getDBO();
		$query = 'select cb_sex ,cb_youragegroup AS age ,
						cb_country from #__comprofiler 
						WHERE 
						user_id='.$user_id;
		$db->SetQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		echo $db->getErrorMsg();
		$rows = $db->loadObject();
		return $rows;
	}
	
	function getUserFriends($user_id,$user, $ui = 1,$numfriend){
		global $_CB_framework, $_CB_database, $ueConfig;

		$return				=	null;
		$summaryMode	=	true;
		$showpaging		=	false;
		$con_entriesperpage		=	$con_SummaryEntries;
		
		$isVisitor			=	null;
		$isVisitor			=	"\n AND m.pending=0 AND m.accepted=1";
		if ( $showpaging || $summaryMode ) {
			//select a count of all applicable entries for pagination
			if ( $isVisitor ) {
				$contotal	=	$numfriend;
			} else {
				$query		=	"SELECT COUNT(*)" . "\n FROM #__comprofiler_members AS m" . "\n LEFT JOIN #__comprofiler AS c ON m.memberid=c.id" . "\n LEFT JOIN #__users AS u ON m.memberid=u.id" . "\n WHERE m.referenceid=" . (int) $user_id . "\n AND c.approved=1 AND c.confirmed=1 AND c.banned=0 AND u.block=0" . $isVisitor . "\n ";
				
				$_CB_database->setQuery( $query );
				$contotal	=	$_CB_database->loadResult();
				
				if ( ! is_numeric( $contotal ) )
					$contotal	=	0;
			}
		}
		if ( ( ! $showpaging ) || ( $pagingParams["connshow_limitstart"] === null ) || ( $con_entriesperpage > $contotal ) ) {
			$pagingParams["connshow_limitstart"]	=	"0";
		}
		
		$query				=	"SELECT m.*,u.name,u.email,u.username,c.avatar,c.avatarapproved, u.id " . "\n FROM #__comprofiler_members AS m" . "\n LEFT JOIN #__comprofiler AS c ON m.memberid=c.id" . "\n LEFT JOIN #__users AS u ON m.memberid=u.id" . // removed  . "\n LEFT JOIN #__session AS s ON s.userid=u.id"	and in SELECT: IF((s.session_id<=>null) OR (s.guest<=>1),0,1) AS 'isOnline' to avoid blocking site in case members table get locked
		"\n WHERE m.referenceid=" . (int) $user_id . "" . "\n AND c.approved=1 AND c.confirmed=1 AND c.banned=0 AND u.block=0" . $isVisitor . "\n ORDER BY m.membersince DESC, m.memberid ASC LIMIT 0,5";
		
		$_CB_database->setQuery( $query, (int) ( $pagingParams["connshow_limitstart"] ? $pagingParams["connshow_limitstart"] : 0 ), (int) $con_entriesperpage );
		$connections		=	$_CB_database->loadObjectList();
		
		if ( ! count( $connections ) > 0 ) {
			$return			.=	null;
			return $return;
		}
		
		$live_site			=	$_CB_framework->getCfg( 'live_site' );
		
		$boxHeight			=	$ueConfig['thumbHeight'] + 46;
		$boxWidth			=	$ueConfig['thumbWidth'] + 28;
		
		foreach ( $connections as $connection ) {
			$cbUser =& CBuser::getInstance( $connection->id);
			$conAvatar = $cbUser->getField( 'avatar' , null, 'csv', '', 'list' );
			$tipTitle		=	_UE_CONNECTEDDETAIL;
			$htmltext		=	$conAvatar;
			$tooltipAvatar	=	$htmltext;
				$return		.=	"<div class=\"connectionBox fleft\">" 
									. "<div class=\"avatar\">"
										. "<a href=\"" . cbSef( "index.php?option=com_comprofiler&amp;task=userProfile&amp;user=" . $connection->memberid ) . '">'
											."<img src=\"" . $tooltipAvatar . '" width="35px" alt=" Click on the image to go to the profile page of '.getNameFormat( $connection->name, $connection->username, $ueConfig['name_format'] )." \"/>"
										."</a>" 
									. "</div>"
								."</div>";
		}
		return $return;
	
		
		}
	
	/**
     * Generates multilanguage text for Video Genre
     *
     * @return       $genre
     */
    
    function getUserExtendedDetails($user_id){
		global $_CB_framework, $ueConfig, $mainframe, $smartyvs;
		
		$oResults = '';
		$db = & JFactory::getDBO();
		include_once( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' );
		include_once( $mainframe->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/user/plug_cbmenu/cb.menu.php' );
		cbimport( 'cb.html' );
		//cbimport( 'cb.menu' );
		
		$sql = "SELECT id,mind FROM #__onyourmind WHERE userid = $user_id ORDER BY date DESC";
		$db->setQuery($sql);
		$datm = $db->loadObjectList();
		$mind = '';
		isset($datm[0]) ? $mind = $datm[0]->mind : $mind = '';
		$connectionsLink=	"<div id=\"connSummaryFooterManage\">" 
								. "<a title=\""._UE_MANAGECONNECTIONS."\" href=\"" . cbSef( 'index.php?option=com_comprofiler&amp;task=manageConnections' ) . "\" >" 
									. _HWDVIDS_ALL 
								. "</a>" 
							. "</div>";
		$cbUser =& CBuser::getInstance( $user_id);
		$josuser =& JFactory::getUser( $user_id );
		if ( $josuser->id != $user_id ) {
				recordViewHit( $_CB_framework->myId(), $user->id, getenv( 'REMOTE_ADDR' ) );
			}
		$cbCon	=	new cbConnection($user_id);
		$cbMenu = 	new getMenuTab();
		//$pmIMG			=	getFieldValue( 'pm', $cbUser->_cbuser->username, $cbCon, null, 1 );
		$profileURL = cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$user_id);
		$profileURLText = str_replace("http://", "", $profileURL);
		$userMenu = new getMenuTab();
		$userMenuTab = $userMenu->getMenuTab();
		$userMenu->prepareMenu($josuser);
		$userMenu->getMenuAndStatus(1,$josuser,1);
		$userMenu = $userMenu->getDisplayTab(1,$josuser,1);
		$return = hwd_vs_tools::getSocialIconsMenu($cbUser);
		$cbcountry = $cbUser->getField( 'cb_country' , null, 'csv', 'div', 'profile' );
		$smartyvs->assign("cb_country", constant($cbcountry));
		$smartyvs->assign("cb_countryflag", $cbcountry);
		$smartyvs->assign("mind", $mind);
		$smartyvs->assign("profileURL", $profileURL);
		$smartyvs->assign("profileURLText", $profileURLText);
		$smartyvs->assign("hits", $cbUser->_cbuser->hits);
		$smartyvs->assign("totalvideos", hwd_vs_tools::getUserVideoCount($user_id));
		$smartyvs->assign("totalvideossincelastvisit", hwd_vs_tools::getNumVideosSinceLastVisit($user_id));
		$numfriend = $cbCon->getConnectionsCount( $user_id);
		$smartyvs->assign("totalfriends", $numfriend);
		$smartyvs->assign("listfriends", hwd_vs_tools::getUserFriends($user_id, $cbUser,1,$numfriend));
		$smartyvs->assign("connectionsLink", $connectionsLink);
		$smartyvs->assign("username", $cbUser->_cbuser->username);
		$smartyvs->assign("userMenu", $userMenu);
		$smartyvs->assign("avatar", "images/comprofiler/".$cbUser->_cbuser->avatar);
		$smartyvs->assign("signeup", date("d-m-Y", strtotime($cbUser->_cbuser->registerDate)));
		$smartyvs->assign("lastvisit", date("d-m-Y", strtotime($cbUser->_cbuser->lastvisitDate)));
		$smartyvs->assign("socialpages", $return);
		//echo '<pre>';var_dump($cbUser);echo '</pre>';
		$oResults .= $smartyvs->fetch('video_list_profileheader.tpl');
		return $oResults;
	}	
	
	function getSocialIconsMenu($cbUser){
		global $_CB_framework, $ueConfig;
		$oUserName = $cbUser->getField( 'username', null, 'csv');
		$livesite = JURI::base();
		$myspacepage =  $cbUser->getField( 'cb_myspacepageURL', null, 'csv');
		$ocode ='';
		$return ='';
		if($myspacepage  !=''){
		$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' '.$oUserName.' '._UE_ON.' myspace" href="http://home.myspace.com/'.$myspacepage.'" target="_blank">
						<i class="icon-pinterest-sign fontorange icon-2x"></i></a>';
		}else{
			$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' '.$oUserName.' '._UE_ON.' myspace" href="http://home.myspace.com/'.$myspacepage.'" target="_blank">
						<i class="icon-pinterest-sign fontgrey icon-2x"></i></a>';
			} 
		$twitterpage = $cbUser->getField( 'cb_twitterpageURL', null, 'csv');
		if($twitterpage  !=''){
		$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' twitter" href="http://twitter.com/'.$twitterpage.'" target="_blank">
					<i class="icon-twitter-sign fontorange icon-2x"></i></a>';	
		}else{
			$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' twitter" href="http://twitter.com/'.$twitterpage.'" target="_blank">
					<i class="icon-twitter-sign fontgrey icon-2x"></i></a>';
			}
		$facebook = $cbUser->getField( 'cb_facebookURL', null, 'csv');
		if($facebook  !=''){
		$ocode .= '<a  class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' facebook" target="_blank" href="http://www.facebook.com/'.$facebook.'">
			<i class="icon-facebook-sign fontorange icon-2x"></i></a>';			
		}else{
			$ocode .= '<a  class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' facebook" target="_blank" href="http://www.facebook.com/'.$facebook.'">
			<i class="icon-facebook-sign fontgrey icon-2x"></i></a>';	
			}	
		$linkedin = $cbUser->getField( 'cb_linkedinURL', null, 'csv');
		if($linkedin  !=''){
		$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' linkedin" target="_blank" href="http://www.linkedin.com/in/'.$linkedin.'">
		<i class="icon-linkedin-sign fontorange icon-2x"></i></a>';			
		}else{
			$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' linkedin" target="_blank" href="http://www.linkedin.com/in/'.$linkedin.'">
		<i class="icon-linkedin-sign fontgrey icon-2x"></i></a>';
			}
			
		$google = $cbUser->getField( 'cb_googleURL', null, 'csv');
		if($google  !=''){
		$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' google" target="_blank" href="http://google.com/'.$google.'">
			<i class="icon-google-plus-sign fontorange icon-2x"></i></a>';			
		}else{
			$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' google" target="_blank" href="http://google.com/'.$google.'">
			<i class="icon-google-plus-sign fontgrey icon-2x"></i></a>';	
			}	
		$youtube = $cbUser->getField( 'cb_youtubeURL', null, 'csv');
		if($youtube  !=''){
		$ocode .= '<a class="mright6 usersocialicon" title="'._UE_CLICKTOVISIT.' '.$oUserName.' '._UE_ON.' youtube" target="_blank" href="http://youtube.com/'.$youtube.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/youtube.png" alt="YouTube">&nbsp;&nbsp;</a>';			
		}
		$return .= '<div class="btn-group close"><div class="f13px w100 tcenter">';
		$return .= $ocode;
		$cb_myspacepageURL = $cbUser->getField( 'cb_myspacepageURL', null, 'htmledit', 'div','edit');
		$cb_twitterpageURL = $cbUser->getField( 'cb_twitterpageURL', null, 'htmledit', 'div','edit');
		$cb_facebookURL = $cbUser->getField( 'cb_facebookURL', null, 'htmledit', 'div','edit');
		$cb_linkedinURL = $cbUser->getField( 'cb_linkedinURL', null, 'htmledit', 'div','edit');
		$cb_googleURL = $cbUser->getField( 'cb_googleURL', null, 'htmledit', 'div','edit');
		
		$return .= '</div><ul class="dropdown-menu socialedit pad6">
							<li><i class="icon-info-sign fontblue"></i> <span>Enter your external site user in the boxes below to share them with the community</span></li>
							<li>'.$cb_myspacepageURL.'</li>
							<li>'.$cb_twitterpageURL.'</li>
							<li>'.$cb_facebookURL.'</li>
							<li>'.$cb_linkedinURL.'</li>
							<li>'.$cb_googleURL.'</li>
							<li><button type="submit" id="publishmind" class="fright btn fontblack mtop12 mbot6">
										<i class="icon-save fontorange fontbold"></i> Save
									</button></li>
						  </ul>';
		$return .= '</div>';
		return $return;		
		}
	
   function getUserVideoCount($user_id){
	   $db = & JFactory::getDBO();
	   $total = 0;
	   // get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video WHERE user_id='.$user_id
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
	   }
    
    
    
    /**
     * Generates multilanguage text for Video Genre
     *
     * @return       $genre
     */
    
    function getVideoLanguage($lang_id){
		
		$db = & JFactory::getDBO();
		$db->SetQuery( 'SELECT literalkey'
								. ' FROM #__hwdvidslanguages'
								. ' WHERE iso_code = "'.$lang_id.'"'
								);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		$grows = $db->loadObjectList();
		return $grows[0]->literalkey;
	}
    
    /**
     * Generates the contextual details of the video
     *
     * @return       $oDetails
     */
    
    function generateSideDetails($row){
		if($row->genre_id ==0)
			$oDetails->genre = _HWDVIDS_SHIGARU_OTHER;
			else
				$oDetails->genre = constant(hwd_vs_tools::getVideoGenre($row->genre_id));
			
		$oDetails->level = constant(hwd_vs_tools::getVideoLevel($row->level_id));
		if($row->intrument_id ==0)
			$oDetails->instrument = _HWDVIDS_SHIGARU_OTHER;
		 else
			$oDetails->instrument = constant(hwd_vs_tools::getVideoInstrument($row->intrument_id));
		if($row->language_id=='NONE')
			$oDetails->language = UE_NOLANG;
			else
				$oDetails->language = constant(hwd_vs_tools::getVideoLanguage($row->language_id));
		return $oDetails;
		}
    
    function getSongPlayer($song_id) {	
	  $songinfo = hwd_vs_tools::getSongInfo($song_id);	
	 // var_dump(hwdSongkick::request($songinfo[0]->band_name)); 		
	  $oPlayer = '';
	  if($songinfo[0]->source == 'grooveshark'){
			  $oPlayer ='<object width="330" height="40" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
							id="gsSong'.$songinfo[0]->extsongid.'" name="gsSong'.$songinfo[0]->extsongid.'">
							<param name="movie" value="http://grooveshark.com/songWidget.swf" />
							<param name="wmode" value="window" />
							<param name="allowScriptAccess" value="always" />
							<param name="flashvars" value="hostname=cowbell.grooveshark.com&songIDs='.$songinfo[0]->extsongid.'&style=metal&p=0" />
							<object type="application/x-shockwave-flash" data="http://grooveshark.com/songWidget.swf" width="330" height="40">
								<param name="wmode" value="window" />
								<param name="allowScriptAccess" value="always" />
								<param name="flashvars" value="hostname=cowbell.grooveshark.com&songIDs='.$songinfo[0]->extsongid.'&style=metal&p=0" />
								<span>'.$songinfo[0]->songname.'
									<a href="http://grooveshark.com/artist/Barricada/'.$songinfo[0]->band_name.'" title="Barricada">'.$songinfo[0]->extbandid.'</a> on Grooveshark</span>
							</object>
						</object>';
		}else if($songinfo[0]->source == 'rdio'){	
					  $oPlayer ='
						<div class="clearfix bblack w330 fontwhite">
							<img class="fleft" src="'.$songinfo[0]->album_thumb.'" alt="'.$songinfo[0]->album_name.'" height="100"/>
							<div class="fleft w210 mleft12 mtop6 f90">
								<div class="mbot6"><span class="fontbold">Song:</span> '.$songinfo[0]->songname.'</div>
								<div class="mbot6"><span class="fontbold">Album:</span> '.$songinfo[0]->album_name.'</div>
								<div><span class="fontbold">Band:</span> '.$songinfo[0]->band_name.'</div>
							</div>	
						</div>
						<object width="330" height="40">
							<param name="movie" value="'.$songinfo[0]->songurl.'"></param>
							<param name="allowFullScreen" value="true"></param>
							<param name="allowscriptaccess" value="always"></param>
							<embed 
									src="'.$songinfo[0]->songurl.'" 
									type="application/x-shockwave-flash" 
									allowscriptaccess="always" 
									allowfullscreen="true" 
									width="330" 
									height="40">
							</embed>
						</object>';			
				}
	   return $oPlayer;
	 }
	 
	 function doGSSongSearch($query){
		 $session = JFactory::getSession();
		  $oResults = '';
		  $app = & JFactory::getApplication();
		 // grooveshark results
		  $apikey = '6b0984927cf2c46c8d527a419b5f2347';
		  $gsJsonurl = 'http://tinysong.com/s/' . urlencode($query) . '?format=json&limit=32&key='.$apikey;
		  $gsJson = file_get_contents($gsJsonurl,0,null,null);
		  $songResults = json_decode($gsJson);
		  if(count($songResults) < 1) $app->setUserState( "hwdvs_song_source", "userinput" );	
			else {
			  $albumplaceholder = JURI::root().'templates/rhuk_milkyway/images/placeholderalbum.png';
			  $app->setUserState( "hwdvs_song_source", "grooveshark" );	
			  foreach ($songResults as $gsSong) {
				$oResults .= '<li id="songresults'.$songcounter.'" class="clearfix pad12 curpointer"><img class="fleft" width="40" src="'.$albumplaceholder.'" alt="'.$gsSong->artist.'"><div class="w84 fleft mleft12"><span class="fontblack">Song: </span><span class="songname">' . $gsSong->SongName . '</span><span> (' . $gsSong->ArtistName . ')</span><br /><span class="fontblack">Album: </span><span> ' . $gsSong->AlbumName . '</span></div></li>';
				$songcounter++; 
			  }
			  $session->set('songlist', $songResults,'songsearch'); 
			}
			
			return $oResults;  
		 }

	 function searchSong($query, $limit = 10, $format = "json") {
		  $session = JFactory::getSession();
		  $oResults = '';
		  $app = & JFactory::getApplication();
		  // rdio results 
		  $redosearch = JRequest::getInt( 'redosearch', 0 );
		if($redosearch == 1 && $app->getUserState( "hwdvs_song_source" ) !="grooveshark"){
				$oResults .= hwd_vs_tools::doGSSongSearch($query);
				}else{		
				  // requires signed request
				  define('CONSUMER_KEY', 'kyw3rxth3ud6n4sqjn9xw4rz');
				  define('CONSUMER_SECRET', 'TvyMHEVhP4');
				  $rdio = new hwdRdio(CONSUMER_KEY, CONSUMER_SECRET);
				  $songResults = $rdio->search(
					array(
					  "query" => $query,
					  "types" => "Track",
					  "count" => 100,
					  "never_or" => "true"))->result->results;
				 $songcounter = 0;	  
				 $rdio_base_url = 'http://www.rdio.com';
					if(count($songResults) < 1) {
						$oResults .= hwd_vs_tools::doGSSongSearch($query);
					}else {
					  $app->setUserState( "hwdvs_song_source", "rdio" );		
					  foreach ($songResults as $rdioSong) {
						$oResults .= '<li id="songresults'.$songcounter.'" class="clearfix pad12 curpointer"><img class="fleft" width="40" src="'.$rdioSong->icon.'" alt="'.$rdioSong->artist.'" /><div class="w84 fleft mleft12"><span class="fontblack">Song: </span><span class="songname">' . $rdioSong->name . '</span> (<span>' . $rdioSong->artist . '</span>)<br /><span class="fontblack">Album: </span><span> ' . $rdioSong->album . '</span></div></li>';
						$songcounter++; 
					  }
					  $session->set('songlist', $songResults,'songsearch'); 
					}
					
			}
          
           
           return $oResults;  	  
	 }
    
    
    function getMyVideos(){
		global $smartyvs,$mainframe, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		$limitstart = Jrequest::getInt( 'limitstart', '0' );
		$my = & JFactory::getUser();
		$oResults = '';
		$sort_by = Jrequest::getVar( 'sort_by', 'no' );
		$orderVideos;
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		//$limit 	= intval($c->vpp);
		$limit 	= 12;
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;

		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.user_id = '.$user_id;
		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 );
  		$total = $db->loadResult();
		if ($sort_by == 'category')
				{
					$orderVideos = " ORDER BY video.category_id DESC";
				}
				else if ($sort_by == 'date_uploaded')
				{
					$orderVideos = " ORDER BY video.date_uploaded DESC";
				}
				else if ($sort_by == 'updated_rating')
				{
					$orderVideos = " ORDER BY video.updated_rating DESC";
				}
				else if ($sort_by == 'number_of_views')
				{
					$orderVideos = " ORDER BY video.number_of_views DESC";
				}
				else if ($sort_by == 'level_id')
				{
					$orderVideos = " ORDER BY video.level_id DESC";
				}
				else if ($sort_by == 'number_of_comments')
				{
					$orderVideos = " ORDER BY video.number_of_comments DESC";
				}
				else
				{
					$orderVideos = " ORDER BY video.date_uploaded DESC";
				}
		
		$query = 'SELECT'.$hwdvs_selectv
               	. ' FROM #__hwdvidsvideos AS video'
				. $hwdvs_joinv
				. $where
				. $orderVideos
				;
		$db->SetQuery($query, $limitstart, $limit );
		$rows = $db->loadObjectList();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		if (count($rows) > 0) {
			$list = hwd_vs_tools::generateVideoListFromSql($rows,null,'87');
			$userdetails = hwd_vs_tools::getUserContextDetails($user_id);			
			foreach($list as $video){
					$smartyvs->assign("data", $video);
					$smartyvs->assign("userdetails", $userdetails);
					$oResults .= $smartyvs->fetch('video_list_full.tpl');
				}
			$page = $total - $c->vpp;
			if ( $page > 0 ){
				$oResults .= '<div class="videopagination">';
				$oResults .= $pageNav->getPagesLinks();
				$oResults .= '</div>';
			}	
		}
		return $oResults;
	}
    
    function getMyVideosCreated(){
		global $smartyvs,$mainframe, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		$limitstart = Jrequest::getInt( 'limitstart', '0' );
		$my = & JFactory::getUser();
		$oResults = '';
		$sort_by = Jrequest::getVar( 'sort_by', 'no' );
		$orderVideos;
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		//$limit 	= intval($c->vpp);
		$limit 	= 12;
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;

		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.original_autor = 1';
		$where .= ' AND video.user_id = '.$user_id;
		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 );
  		$total = $db->loadResult();
		if ($sort_by == 'category')
				{
					$orderVideos = " ORDER BY video.category_id DESC";
				}
				else if ($sort_by == 'date_uploaded')
				{
					$orderVideos = " ORDER BY video.date_uploaded DESC";
				}
				else if ($sort_by == 'updated_rating')
				{
					$orderVideos = " ORDER BY video.updated_rating DESC";
				}
				else if ($sort_by == 'number_of_views')
				{
					$orderVideos = " ORDER BY video.number_of_views DESC";
				}
				else if ($sort_by == 'level_id')
				{
					$orderVideos = " ORDER BY video.level_id DESC";
				}
				else if ($sort_by == 'number_of_comments')
				{
					$orderVideos = " ORDER BY video.number_of_comments DESC";
				}
				else
				{
					$orderVideos = " ORDER BY video.date_uploaded DESC";
				}
		
		$query = 'SELECT'.$hwdvs_selectv
               	. ' FROM #__hwdvidsvideos AS video'
				. $hwdvs_joinv
				. $where
				. $orderVideos
				;
		$db->SetQuery($query, $limitstart, $limit );
		$rows = $db->loadObjectList();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		if (count($rows) > 0) {
			$list = hwd_vs_tools::generateVideoListFromSql($rows,null,'87');
			$userdetails = hwd_vs_tools::getUserContextDetails($user_id);			
			foreach($list as $video){
					$smartyvs->assign("data", $video);
					$smartyvs->assign("userdetails", $userdetails);
					$oResults .= $smartyvs->fetch('video_list_full.tpl');
				}
			$page = $total - $c->vpp;
			if ( $page > 0 ){
				$oResults .= '<div class="videopagination">';
				$oResults .= $pageNav->getPagesLinks();
				$oResults .= '</div>';
			}	
		}
		return $oResults;
	}
    
    /**
     * Generates the human readable allowed video formats string
     *
     * @return       $code
     */
	function generateVideoDetails($row, $player_width=null, $player_height=null, $thumb_width=null, $hwdvsItemid=null, $tooltip=null, $lightbox=null, $autoplay=null)
	{
		global $hwdvsItemid, $option, $smartyvs, $j16;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		/*echo '<pre>';
			var_dump($row->id);
		echo '</pre>';*/
		if (!isset($row->username)) { $row->username = ""; }
		if (!isset($row->name)) { $row->name = ""; }
		if (!isset($row->avatar)) { $row->avatar = null; }
		if ($c->cbint == 3) { $row->avatar = $row->username; }

		$quality = JRequest::getWord( 'quality', '' );
		if (empty($quality))
		{
			if ($c->usehq == "1" || $c->usehq == "3")
			{
				$quality = "hd";
			}
			else if ($c->usehq == "0" || $c->usehq == "2")
			{
				$quality = "sd";
			}
		}
		
		$sideDetails = hwd_vs_tools::generateSideDetails($row);

		$details->id = intval($row->id);
		$details->titleText = stripslashes($row->title);
		$details->title = hwd_vs_tools::generateVideoLink( $row->id, stripslashes($row->title), $hwdvsItemid, null, 10000 );
		$details->player = hwd_vs_tools::generateVideoPlayer($row, $player_width, $player_height, $autoplay, $quality);
		$details->videourl = hwd_vs_tools::generateVideoUrl($row);
		$details->embedcode = hwd_vs_tools::generateEmbedCode($row);
		$details->socialbmlinks = hwd_vs_tools::generateSocialBookmarks();
		$details->duration = $row->video_length;
		$details->learnlater = hwd_vs_tools::generateLearnLaterButton($row);
		$details->likebutton = hwd_vs_tools::generateLikeVideoButton($row);
		$details->ratingsystem = hwd_vs_tools::generateRatingSystem($row);
		$details->favouritebutton = hwd_vs_tools::generateFavouriteButton($row);
		$details->thumbnail = hwd_vs_tools::generateVideoThumbnailLink($row->id, $row->video_id, $row->video_type, $row->thumbnail, 0, $thumb_width, null, null, null, $hwdvsItemid, null, $tooltip, $lightbox, $row->video_length,$sideDetails->category);
		$details->avatar = hwd_vs_tools::generateAvatar($row->user_id, $row->avatar, 0);
		$details->username = $row->username;
		$details->song = $sideDetails->song;
		$details->band = $sideDetails->band;
		$details->language = $sideDetails->language;
		$details->category = $sideDetails->category;
		$details->genre = $sideDetails->genre;
		$details->instrument = $sideDetails->instrument;
		$details->level = $sideDetails->level;
		if ($c->multiple_cats == "1")
		{
			$details->category = hwd_vs_tools::generateCategoryLinks($row);
		}
		else
		{
			$details->category = hwd_vs_tools::generateCategory($row->category_id);
		}

		$details->description_truncated = hwd_vs_tools::makeClickableLinks(hwd_vs_tools::truncateText(stripslashes($row->description), $c->trunvdesc));
		$details->rating = hwd_vs_tools::generateRatingImg($row->updated_rating);
		$details->deletevideo = hwd_vs_tools::generateDeleteVideoLink($row);
		$details->editvideo = hwd_vs_tools::generateEditVideoLink($row);
		$details->publishvideo = hwd_vs_tools::generatePublishVideoLink($row);
		$details->approvevideo = hwd_vs_tools::generateApproveVideoLink($row);
		$details->views = number_format(intval($row->number_of_views));
		$details->upload_date = strftime("%l%P - %b %e, %Y", strtotime($row->date_uploaded));
		$details->sendToFriend = hwd_vs_tools::sendToFriend($row);
		$details->uploader = hwd_vs_tools::generateUserFromID($row->user_id, $row->username, $row->name);
		$details->k = 0;

		$details->addtogroup = hwd_vs_tools::generateAddToGroupButton($row);
		$details->nextprev = hwd_vs_tools::generateNextPrevLinks($row);
		$details->switchquality = hwd_vs_tools::generateSwitchQuality($row);
		$details->downloadoriginal = hwd_vs_tools::generateDownloadVideoLink($row);
		$details->vieworiginal = hwd_vs_tools::generateViewOriginalLink($row);
		$details->reportmedia = hwd_vs_tools::generateReportMediaButton($row);
		$details->tags = hwd_vs_tools::generateTagListString(stripslashes($row->tags));
		$details->favourties = hwd_vs_tools::generateFavouriteButton($row);
		$details->addtoplaylist = hwd_vs_tools::generateAddToPlaylistButton($row);
		$details->commentsNum = hwd_vs_tools::generateVideoCommentsCount($row);
		if ($j16 || $option == "com_hwdvideoshare")
		{
			$details->comments = hwd_vs_tools::generateVideoComments($row);
		}

		if ($c->showdesc == "1")
		{
			$smartyvs->assign("print_description", 1);
			$details->description = hwd_vs_tools::makeClickableLinks(stripslashes($row->description));

			//$item                 = JTable::getInstance('content');
			//$dispatcher           = JDispatcher::getInstance();
			//$params               = new JParameter('');
			//JPluginHelper::importPlugin('content');
			//$item->parameters     = new JParameter('');
			//$item->text           = $details->description;
			//// Apply content plugins to custom text
			//$results              = $dispatcher->trigger('onPrepareContent', array ($item, $params, 0));
			//$details->description = $item->text;
		}
		return $details;
    }
    /**
     * Generates the human readable allowed video formats string
     *
     * @return       $code
     */
	function generateAllowedFormats()
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		if ($c->requiredins == 1) {
			if ($c->ft_mpg == "on") {$code .= "<b>mpg</b>, ";}
			if ($c->ft_mpeg == "on") {$code .= "<b>mpeg</b>, ";}
			if ($c->ft_avi == "on") {$code .=  "<b>avi</b>, ";}
			if ($c->ft_divx == "on") {$code .=  "<b>divx</b>, ";}
			if ($c->ft_mp4 == "on") {$code .=  "<b>mp4</b>, ";}
			if ($c->ft_flv == "on") {$code .=  "<b>flv</b>, ";}
			if ($c->ft_wmv == "on") {$code .=  "<b>wmv</b>, ";}
			if ($c->ft_rm == "on") {$code .=  "<b>rm</b>, ";}
			if ($c->ft_mov == "on") {$code .=  "<b>mov</b>, ";}
			if ($c->ft_moov == "on") {$code .=  "<b>moov</b>, ";}
			if ($c->ft_asf == "on") {$code .=  "<b>asf</b>, ";}
			if ($c->ft_swf == "on") {$code .=  "<b>swf</b>, ";}
			if ($c->ft_vob == "on") {$code .=  "<b>vob</b>, ";}

			$oformats = explode(",", $c->oformats);
			for ($i = 0, $n = count($oformats); $i < $n; $i++)
			{
				$oformat = $oformats[$i];
				$oformat = preg_replace("/[^a-zA-Z0-9s]/", "", $oformat);
				$code .=  "<b>".$oformat."</b>, ";
			}

		} else {

			if ($c->ft_flv == "on") {$code .=  "<b>flv</b>, ";}
			if ($c->ft_mp4 == "on") {$code .=  "<b>mp4</b>, ";}
			if ($c->ft_swf == "on") {$code .=  "<b>swf</b>, ";}

		}
		if (substr($code, -2) == ", ") {$code = substr($code, 0, -2);}
		return $code;
    }
    /**
     * Generates a username from user id with CB link if CB integration is avtivated
     *
     * @param int    $user_id  the user id
     * @return       $code
     */
	function generateUserFromID( $user_id=null, $username=null, $name=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();

		if (!isset($user_id) || $user_id == 0)
			return _HWDVIDS_INFO_GUEST;

		if ($c->userdisplay == 1)
		{
			if (!isset($username) || empty($username))
			{
				$query = 'SELECT username FROM #__users WHERE id = '.$user_id;
				$db->SetQuery( $query );
				$displayname = $db->loadResult();
			}
			else
			{
				$displayname = $username;
			}
		}
		else
		{
			if (!isset($name) || empty($name))
			{
				$query = 'SELECT name FROM #__users WHERE id = '.$user_id;
				$db->SetQuery( $query );
				$displayname = $db->loadResult();
			}
			else
			{
				$displayname = $name;
			}
		}

		$code = null;

		if ($c->cbint == 1)
		{
			if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
			$code = "<a href=\"".JRoute::_("index.php?option=com_comprofiler".$c->cbitemid."&task=userProfile&user=".$user_id)."\" title=\""._HWDVIDS_ALT_USRPRO."\">".$displayname."</a>";
		}
		else if ($c->cbint == 2)
		{
			if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
			$code = "<a href=\"".JRoute::_("index.php?option=com_community".$c->cbitemid."&view=profile&userid=".$user_id)."\">".$displayname."</a>";
		}
		else if ($c->cbint == 3)
		{
			if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
			$code = "<a href=\"".JRoute::_("index.php?option=com_community&controller=profile".$c->cbitemid."&user_id=".$user_id)."\">".$displayname."</a>";
		}
		else if ($c->cbint == 4 || $c->cbint == 6)
		{
			if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
			$code = "<a href=\"".JRoute::_("index.php?option=com_kunena&func=fbprofile&Itemid=".$c->cbitemid."&userid=".$user_id)."\">".$displayname."</a>";
		}
		else if ($c->cbint == 5)
		{
			$code = "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=viewChannel&user_id=".$user_id."&Itemid=".$hwdvsItemid)."\">".$displayname."</a>";
		}
		else
		{
			$code = $displayname;
		}
		return $code;
    }
	/**
	 * get_redirect_url()
	 * Gets the address that the provided URL redirects to,
	 * or FALSE if there's no redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function generateLanguageDefinition($text)
	{
		if(defined($text)) $returnText = constant($text);
		else $returnText = $text;
		return $returnText;
	}
    /**
     * Verifies an URL is valid
     *
     * @param string $url  the url to check
     * @return       true/false
     */
	function is_valid_url ( $url )
	{
		if( preg_match('/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}'.'((:[0-9]{1,5})?\/.*)?$/i' ,$url))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    /**
     * Verifies an URL is valid
     *
     * @param string $url  the url to check
     * @return       true/false
     */
	function validateUrl( $url )
	{
		if ($parseUrl = parse_url($url))
		{
			$parsedUrl = '';

			if (!empty($parseUrl['scheme']))
			{
				$parsedUrl.= $parseUrl['scheme'].'://';
			}
			else
			{
				return false;
			}

			if (!empty($parseUrl['host']))
			{
				$parsedUrl.= $parseUrl['host'];
			}
			else
			{
				return false;
			}

			if (!empty($parseUrl['port']))
			{
				$parsedUrl.= ":".$parseUrl['port'];
			}

			if (!empty($parseUrl['path']))
			{
				$parsedUrl.= $parseUrl['path'];
			}

			if (!empty($parseUrl['query']))
			{
				$parsedUrl.= '?'.$parseUrl['query'];
			}
			//$parsedUrl = hwd_vs_tools::get_final_url( $parsedUrl );

			return $parsedUrl;
		}
	}
    /**
     * Generates a username from user id and creates a Joomla Backend link to either
     * core or CB profile page
     *
     * @param int    $user_id  the user id
     * @return       $code;
     */
	function generateBEUserFromID( $user_id=null )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db =& JFactory::getDBO();
		$code = null;
		if (!isset($user_id)) {
			$code = _HWDVIDS_INFO_GUEST;
		} else {
			// find user
			$query = 'SELECT username FROM #__users WHERE id = '.$user_id;
			$db->SetQuery( $query );
			$user = $db->loadResult();
			if ($c->cbint == 1) {
				if ($c->cbitemid !== "") { $c->cbitemid = "&Itemid=".$c->cbitemid; }
				$code = "<a href=\"index.php?option=com_comprofiler&task=edit&cid=".$user_id."\">".$user."</a>";
			} else {
				$code = "<a href=\"index.php?option=com_users&task=editA&id=".$user_id."&hidemainmenu=1\">".$user."</a>";
			}
		}
		return $code;
    }
    /**
     * Generates a new random video id
     *
     * @param int    $length  the length of new string
     * @return       $code;
     *
     * FUTURE: Check does not already exist
     */
	function generateNewVideoid( $length=13 )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code =null;
		// set default rating values
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;

		while ($i <= 13) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$code = $code . $tmp;
			$i++;
		}

		return $code;
	}
    /**
     * Generates the exact rating of a video
     *
     * @param array  $row  the video sql data
     * @return       $code;
     */
	function generateExactRating( $row )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code =null;
		if ((isset($row->rating_total_points) && $row->rating_total_points !== "0") && (isset($row->rating_number_votes) && $row->rating_number_votes !== "0") ) {
			$code = $row->rating_total_points/$row->rating_number_votes;
		} else {
			$code = "0";
		}
		return $code;
	}
	
	
	
    /**
     * Generates the rating star image for current rating
     *
     * @param int    $rating  the video rating
     * @return       $code;
     */
	function generateRatingImg( $rating )
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();

		$code = null;

		if (!isset($rating) || $rating > 5 || $rating < 0) { $rating = "0"; }
		$rating = round($rating, 0);

		$code = "<img src=\"".URL_HWDVS_IMAGES."ratings/stars".intval($rating)."0.png\" width=\"80\" height=\"16\" alt=\""._HWDVIDS_ALT_RATED." ".$rating."\" />";
		return $code;
	}
    /**
     * Appends the current avtive main navigation link with new id
     *
     * @param int    $active  the navigation link that is currently active
     * @return       Nothing
     */
	function generateActiveLink( $active ) {
		global $smartyvs;
		if ($active == 1) { $smartyvs->assign("von", " id=\"active\""); $smartyvs->assign("vact", 1); } else { $smartyvs->assign("von", ""); }
		if ($active == 2) { $smartyvs->assign("con", " id=\"active\""); $smartyvs->assign("cact", 1); } else { $smartyvs->assign("con", ""); }
		if ($active == 3) { $smartyvs->assign("gon", " id=\"active\""); $smartyvs->assign("gact", 1); } else { $smartyvs->assign("gon", ""); }
		if ($active == 4) { $smartyvs->assign("uon", " id=\"active\""); $smartyvs->assign("uact", 1); } else { $smartyvs->assign("uon", ""); }
		return;
	}
    /**
     * Generates the video player
     *
     * @param array  $row  the video sql data
     * @param int    $width(optional)  the video player width
     * @param int    $height(optional)  the video player width
     * @return       $code
     */
	function generateVideoPlayer( $row, $width=null, $height=null, $autostart=null, $quality="hd", $embedcode=false )
	{
		global $hwdvsItemid, $option, $task, $smartyvs, $show_video_ad, $pre_url, $post_url, $j15, $j16;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();

		if (!isset($row->age_check)) { $row->age_check = "-1"; }
		if (($c->age_check > 0 && $row->age_check == "-1") || $row->age_check > 0)
		{
			$age_response = hwd_vs_tools::generateAgeCheck($row);
			if ($age_response !== true)
			{
				if ($embedcode == true)
				{
				}
				else
				{
					if ($age_response !== true)
					{
						return $age_response;
					}
				}
			}
		}

		if ($j16)
		{
			$vp_plugin_path = JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS.$c->hwdvids_videoplayer_file.DS.$c->hwdvids_videoplayer_file.".view.php";
		}
		else
		{
			$vp_plugin_path = JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS.$c->hwdvids_videoplayer_file.".view.php";
		}

		if (file_exists($vp_plugin_path))
		{
			require_once($vp_plugin_path);
		}
		else if (file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS."flow.view.php"))
		{
			require_once(JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS."flow.view.php");
		}
		else if (file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS."flow".DS."flow.view.php"))
		{
			require_once(JPATH_SITE.DS."plugins".DS."hwdvs-videoplayer".DS."flow".DS."flow.view.php");
		}
		else
		{
        	return "This video can not be displayed because there are no video players installed.";
		}

		$player = new hwd_vs_videoplayer();
		$flv_url = null;
		$flv_path = null;
		$thumb_url = null;
		$use_xMoovphp = false;
		$code = null;

		$location = hwd_vs_tools::generateVideoLocations($row, $quality);
		$thumb_url = hwd_vs_tools::generateThumbnailURL($row->id, @$row->video_id, $row->video_type, @$row->thumbnail, "large");
		//var_dump($row->video_type);
		if ($row->video_type == "local" || $row->video_type == "mp4" || $row->video_type == "swf")
		{
			// temporary html5 player fix
			if ($c->hwdvids_videoplayer_file == "jwflv_html5")
			{
				$c->use_protection = 0;
			}

			if ($c->storagetype !== "0")
			{
				$flv_url = $location['url'];
				$flv_path = $location['path'];
				$use_xMoovphp = $location['use_xMoovphp'];
				$dlink = $location['url'];
			}
			else if ($c->use_protection == 0)
			{
				$flv_url = $location['url'];
				$flv_path = $location['path'];
				$use_xMoovphp = $location['use_xMoovphp'];
				$dlink = $location['url'];
			}
			else
			{
				$flv_url = $location['url'];
				$flv_path = $location['path'];
				$use_xMoovphp = $location['use_xMoovphp'];
				$dlink = hwd_vs_tools::generateAntileechExpiration($row->id, $row->video_type, 'player', $quality);
				$dlink = urlencode($dlink);
			}

			if ($use_xMoovphp)
			{
				$pluginPlayer =& JPluginHelper::getPlugin("hwdvs-videoplayer", "$c->hwdvids_videoplayer_file");
				$pluginPlayerParams = new JParameter( $pluginPlayer->params );
				$pluginPlayerStreamer = $pluginPlayerParams->get('pseudostreaming', 0);

				if ($pluginPlayerStreamer == "1" && ($c->hwdvids_videoplayer_file == "jwflv" || $c->hwdvids_videoplayer_file == "jwflv_v5"))
				{
					$dlink = $row->video_id.".flv";
				}
			}

			if ( $row->video_type == "swf" && $c->standaloneswf == 1 )
			{
				$width = $c->flvplay_width;
				$height = $width*$c->var_fb;
				$smartyvs->assign("player_width", $width);
				$code.= "<div style=\"text-align: inherit;width:".$width."px!important;height:".$height."px!important;\">";
				$code.= "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" width=\"".$width."\" height=\"".$height."\" codebase=\"http://active.macromedia.com/flash7/cabs/ swflash.cab#version=9,0,0,0\">
						 <param name=\"movie\" value=\"".$flv_url."\">
						 <param name=\"play\" value=\"true\">
						 <param name=\"loop\" value=\"true\">
						 <param name=\"width\" value=\"".$width."\">
						 <param name=\"height\" value=\"".$height."\">
						 <param name=\"quality\" value=\"high\">
						 <param name=\"allowscale\" value=\"true\">
						 <param name=\"scale\" value=\"showall\">
						 <embed src=\"".$flv_url."\" width=\"".$width."\" height=\"".$height."\" play=\"true\" scale=\"showall\" loop=\"true\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" swLiveConnect=\"true\">
						 </embed>
						 </object>";
				return $code;
			}

			if ($show_video_ad == 1 && !$embedcode)
			{
				if ($c->hwdvids_videoplayer_file == "flow")
				{
					$flv_tracks = array();
					$flv_tracks[0] = $pre_url;
					$flv_tracks[1] = $dlink;
					$flv_tracks[2] = $post_url;
					$code.= $player->prepareEmbeddedPlayer($flv_tracks, $width, $height, rand(100, 999), "playlist", $flv_path, null, $autostart);
					return $code;
				}
				else
				{
					$xspf_playlist = JPATH_SITE.DS."components".DS."com_hwdvideoshare".DS."xml".DS."xspf".DS.$row->id.".xml";
					@unlink($xspf_playlist);
					require_once(JPATH_SITE.DS."administrator".DS."components".DS."com_hwdrevenuemanager".DS."redrawplaylist.class.php");
					hwd_rm_playlist::writeFile($row, $dlink, $pre_url, $post_url, $thumb_url, $use_xMoovphp);

					if (file_exists($xspf_playlist))
					{
						$flv_url = JURI::root(true).'/components/com_hwdvideoshare/xml/xspf/'.$row->id.'.xml';
						$flv_path = JPATH_SITE.DS."components".DS."com_hwdvideoshare".DS."xml".DS."xspf".DS.$row->id.".xml";

						if ($c->loadswfobject == "on" && $task !=="grabjomsocialplayer")
						{
							$code.= $player->prepareplayer($flv_url, $width, $height, rand(100, 999), "playlist", $flv_path, null, $autostart, $row->id);
						}
						else
						{
							$code.= $player->prepareEmbeddedPlayer($flv_url, $width, $height, rand(100, 999), "playlist", $flv_path, null, $autostart, $row->id);
						}
					}
				}
			}
			else
			{
				if ($c->loadswfobject == "on" && $task !=="grabjomsocialplayer" && !$embedcode)
				{
					$code.= $player->prepareplayer($dlink, $width, $height, rand(100, 999), "video", $flv_path, $thumb_url, $autostart, $row->id);
				}
				else if (!$embedcode)
				{
					$code.= $player->prepareEmbeddedPlayer($dlink, $width, $height, rand(100, 999), "video", $flv_path, $thumb_url, $autostart, $row->id);
				}
				else
				{
					$code.= $player->prepareEmbedCode($dlink, $width, $height, rand(100, 999), "video", $flv_path, $thumb_url, $autostart, $row->id);
				}
			}
		}
		else if ( $row->video_type == "playlist" )
		{
			$flv_path = $row->playlist;
			if ($c->loadswfobject == "on")
			{
				$code.= $player->prepareplayer($flv_path, $width, $height, rand(100, 999), "playlist", null, null, $autostart, null);
			}
			else
			{
				$code.= $player->prepareEmbeddedPlayer($flv_path, $width, $height, rand(100, 999), "playlist", null, null, $autostart, null);
			}
		}
		else if ( $row->video_type == "direct" )
		{
			$code.= $player->prepareEmbeddedPlayer($row->video_url, $width, $height, rand(100, 999), "video", $flv_path, $thumb_url, $autostart, $row->id);
		}
		else if ($row->video_type == "seyret")
		{
			if (@explode(",", $video_code))
			{
				$data = explode(",", $row->video_id);
			}
			else
			{
				return;
			}
			if ($data[0] == "local")
			{
				$file->id = $row->id;
				$file->video_type = "remote";
				if (!empty($data[2]))
				{
					$file->video_id = @$data[1].",".@$data[2];
				}
				else
				{
					$file->video_id = @$data[1];
				}
				$file->thumbnail = $row->thumbnail;
				$code.= hwd_vs_tools::generateVideoPlayer($file, $width, $height, $autostart, $quality, $embedcode);
			}
			else
			{
				$file->id = $row->id;
				$file->video_type = $data[0];
				if (!empty($data[2]))
				{
					$file->video_id = @$data[1].",".@$data[2];
				}
				else
				{
					$file->video_id = @$data[1];
				}
				$file->thumbnail = $row->thumbnail;
				$code.= hwd_vs_tools::generateVideoPlayer($file, $width, $height, $autostart, $quality, $embedcode);
			}
		}
		else
		{
			$plugin = hwd_vs_tools::getPluginDetails($row->video_type);
			if (!$plugin)
			{
				if ($width==null)
				{
					$smartyvs->assign("player_width", $c->tpwidth);
				}
				else
				{
					$smartyvs->assign("player_width", $width);
				}
				$code.= _HWDVIDS_INFO_NOPLUGIN." "._HWDVIDS_WMIP_01.$row->video_type._HWDVIDS_WMIP_02;
			}
			else
			{
				if (!$embedcode)
				{
					$preparevid = preg_replace("/[^a-zA-Z0-9s_-]/", "", $row->video_type)."PrepareVideo";
					$code.= $preparevid($row, $width, $height, $autostart);
					//var_dump(preg_replace("/[^a-zA-Z0-9s_-]/", "", $row->video_type)."PrepareVideo");
				}
				else
				{
					$preparevid = preg_replace("/[^a-zA-Z0-9s_-]/", "", $row->video_type)."PrepareVideoEmbed";
					$code.= $preparevid($row->video_id, $row->id, $hwdvsItemid, $row);
				}
			}
		}

		if (!$embedcode)
		{
			return "<div id=\"hwdvsplayer\">".$code."</div>";
		}
		else
		{
			return $code;
		}
	}
    /**
     * Multiple select list
     *
     * @param int    $arr
     * @param int    $tag_name
     * @param int    $tag_attribs
     * @param int    $key
     * @param int    $text
     * @param int    $selected
     * @return       $html
     */
	function selectList2(&$arr, $tag_name, $tag_attribs, $key, $text, $selected)
	{
		$c = hwd_vs_Config::get_instance();

		global $task;
                  
                if (strpos(JURI::base(true), "/administrator") === false && $c->multiple_cats == "1")
                {
			$multiple = " size=\"10\" multiple";
			$tag_name.= "[]";
                }
                else if (($task == "editvidsA" || $task == "editvids") && $c->multiple_cats == "1")
		{
			$multiple = " size=\"10\" multiple";
			$tag_name.= "[]";
		}
		else
		{
			$multiple = "";
		}

		reset ($arr);
		$html = "\n<select id=\"$tag_name\" name=\"$tag_name\" $tag_attribs $multiple autocomplete=\"off\">";

		for ($i = 0, $n = count($arr); $i < $n; $i++)
		{
			$k = $arr[$i]->$key;
			$t = $arr[$i]->$text;
			$id = @$arr[$i]->id;
			$extra = '';
			$extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';

			if (is_array($selected))
			{
				foreach ($selected as $obj)
				{
					$k2 = $obj;

					if ($k == $k2)
					{
						$extra .= " selected=\"selected\"";
						break;
					}
				}
			}
			else
			{
				$extra .= ($k == $selected ? " selected=\"selected\"" : '');
			}

			$html .= "\n\t<option value=\"" . $k . "\"$extra>" . $t . "</option>";
		}

		$html .= "\n</select>\n";

		return $html;
	}
    /**
     * catTreeRecurse
     *
     * @param int    $id
     * @param int    $indent
     * @param int    $list
     * @param int    $children
     * @param int    $maxlevel
     * @param int    $level
     * @param int    $seperator
     * @return       Nothing
     */
	function catTreeRecurse($id, $indent = "&nbsp;&nbsp;&nbsp;", $list, &$children, $maxlevel = 9999, $level = 0, $seperator = " >> ")
	{
		if (@$children[$id] && $level <= $maxlevel)
		{
			foreach ($children[$id] as $v)
			{
				$id = $v->id;
				$txt = $v->category_name;
				$pt = $v->parent;
				$list[$id] = $v;
				$list[$id]->treename = "$indent$txt";
				$list[$id]->children = count(@$children[$id]);
				$list = hwd_vs_tools::catTreeRecurse($id, "$indent$txt$seperator", $list, $children, $maxlevel, $level + 1);
			//$list = hwd_vs_tools::catTreeRecurse( $id, "*", $list, $children, $maxlevel, $level+1 );
			}
		}

		return $list;
	}
    /**
     * catTreeRecurse
     *
     * @param int    $id
     * @param int    $indent
     * @param int    $list
     * @param int    $children
     * @param int    $maxlevel
     * @param int    $level
     * @param int    $seperator
     * @return       Nothing
     */
	function applyCategoryLinks($videoid,$categoryid)
	{
		global $j15, $j16;
		$db = & JFactory::getDBO();

		$videoid = intval($videoid);;

		if (is_array($categoryid) || $categoryid > 0)
		{
			$db->SetQuery("DELETE FROM #__hwdvidsvideo_category WHERE videoid = \"$videoid\"");
			if ( !$db->Query() )
			{
				echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
				exit();
			}
                        
                        if (is_array($categoryid))
                        {
                                foreach ($categoryid as $i)
                                {
                                        $i = intval($i);;
                                        $db->SetQuery("INSERT INTO #__hwdvidsvideo_category (videoid,categoryid) VALUES ($videoid,$i)");
                                        if ( !$db->Query() )
                                        {
                                                echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
                                                exit();
                                        }
                                }
                        }
                        else
                        {
                                $i = intval($categoryid);;
                                $db->SetQuery("INSERT INTO #__hwdvidsvideo_category (videoid,categoryid) VALUES ($videoid,$i)");
                                if ( !$db->Query() )
                                {
                                        echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
                                        exit();
                                }
                        }
		}
		return;
	}
    /**
     * Generate select list for JACL access levels
     *
     * @param int    $jaclplus
     * @param int    $selectname
     * @return       $access
     */
	function generatePlayerThumbnail( $row )
	{
		$thumb_url = "";
		if ($row->video_type == "youtube.com")
		{
			$thumb_url = "http://i.ytimg.com/vi/".$row->video_id."/0.jpg";
		}
		else if ($row->video_type == "local" || $row->video_type == "mp4" || $row->video_type == "swf")
		{
			$row->thumbnail = (empty($row->thumbnail) ? "jpg" : $row->thumbnail);
			$thumb_path_l = PATH_HWDVS_DIR.DS."thumbs".DS."l_".$row->video_id.".".$row->thumbnail;
			$thumb_path_n = PATH_HWDVS_DIR.DS."thumbs".DS.$row->video_id.".".$row->thumbnail;

			if (file_exists($thumb_path_l) && (filesize($thumb_path_l) > 0))
			{
				$thumb_url = URL_HWDVS_DIR."/thumbs/l_".$row->video_id.".".$row->thumbnail;
			}
			else if (file_exists($thumb_path_n) && (filesize($thumb_path_n) > 0))
			{
				$thumb_url = URL_HWDVS_DIR."/thumbs/".$row->video_id.".".$row->thumbnail;
			}
		}
		else
		{
			if (!empty($row->thumbnail))
			{
				$thumb_base = basename($row->thumbnail);
				$thumb_path_l = PATH_HWDVS_DIR.DS."thumbs".DS."l_".$thumb_base;
				$thumb_path_n = PATH_HWDVS_DIR.DS."thumbs".DS.$thumb_base;

				if (file_exists($thumb_path_l) && (filesize($thumb_path_l) > 0))
				{
					$thumb_url = URL_HWDVS_DIR."/thumbs/l_".$thumb_base;
				}
				else if (file_exists($thumb_path_n) && (filesize($thumb_path_n) > 0))
				{
					$thumb_url = URL_HWDVS_DIR."/thumbs/".$thumb_base;
				}
			}
			if (empty($thumb_url))
			{
				$data = explode(",", $row->video_id);
				if ($row->video_type == "seyret")
				{
					$thumb_url = @$data[2];
				}
				else
				{
					$thumb_url = @$data[1];
				}
			}
		}
		return $thumb_url;
	}
    /**
     * Generate select list for JACL access levels
     *
     * @param int    $jaclplus
     * @param int    $selectname
     * @return       $access
     */
	function validateDuration( $duration )
	{
		$code = preg_replace("/[^0-9s:]/", "", $duration);

		if (empty($code) || !isset($code))
		{
			$code = "N/A";
		}

		return $code;
	}
	/**
     * Generate select list for JACL access levels
     *
     * @param int    $jaclplus
     * @param int    $selectname
     * @return       $access
     */
	function hwdvsMultiAccess( $jaclplus, $selectname='access' )
	{
		return;
	}
    /**
     * Checks that the video upload form is complete and valid
     *
     * @param string $title
     * @param string $description
     * @param int    $category_id
     * @param string $tags
     * @param string $public_private
     * @param int    $allow_comments
     * @param int    $allow_embedding
     * @param int    $allow_ratings
     * @return       true/false
     */
	function generateVideoLocations( $row, $quality="hd" )
	{
		$c = hwd_vs_Config::get_instance();
		$use_xMoovphp = false;

		if ($row->video_type == "local" || $row->video_type == "mp4")
		{
			$remoteFail = false;
			$useRemoteFlv = false;
			if ($c->storagetype == "amazons3")
			{
				$plugin =& JPluginHelper::getPlugin('hwdvs-storage', 'amazons3');
				$pluginParams = new JParameter( $plugin->params );
				$bucketName  = $pluginParams->get('awsBucket', 'hwdvs');
				$bucketAlias  = $pluginParams->get('awsAlias', '');
				$cloudfront  = $pluginParams->get('cloudfront', '0');
				$HttpResourceUrl  = $pluginParams->get('HttpCloudfrontResourceUrl', '');
				$rtmpDelivery  = $pluginParams->get('rtmpDelivery', '0');
				$RtmpResourceUrl  = $pluginParams->get('RtmpCloudfrontResourceUrl', '');

				if ($cloudfront == "1" && !empty($HttpResourceUrl))
				{
					if ($rtmpDelivery == "1")
					{
						$plugin = hwd_vs_tools::getPluginDetails("rtmp");
						if (!$plugin)
						{
							//skip
						}
						else
						{
							$row->video_type = "rtmp";
							if (($c->usehq == "1" || $c->usehq == "2" || $c->usehq == "3") && $quality == "hd")
							{
								$row->video_id = $RtmpResourceUrl."/cfx/st:uploads/".$row->video_id.".mp4";
							}
							else
							{
								$row->video_id = $RtmpResourceUrl."/cfx/st:uploads/".$row->video_id.".flv";
							}
							$location['url'] = "";
							$location['path'] = "";
							$location['use_xMoovphp'] = $use_xMoovphp;
							return $location;
						}
					}
					$baseUrl = $HttpResourceUrl."/uploads/";
				}
				else
				{
					if (!empty($bucketAlias))
					{
						$baseUrl  = $bucketAlias."/uploads/";
					}
					else
					{
						$baseUrl  = "http://$bucketName.s3.amazonaws.com/uploads/";
					}
				}

				if (($c->usehq == "1" || $c->usehq == "2" || $c->usehq == "3") && $quality == "hd")
				{
					$url  = $baseUrl.$row->video_id.".mp4";
					$path = "";

					$useragent = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1)";
					$curl_handle=curl_init();
					curl_setopt($curl_handle,CURLOPT_URL,$url);
					curl_setopt($curl_handle,CURLOPT_HEADER,true);
					curl_setopt($curl_handle,CURLOPT_NOBODY,true);
					curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
					curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,10);
					curl_setopt($curl_handle,CURLOPT_TIMEOUT,10);
					curl_setopt($curl_handle,CURLOPT_USERAGENT,$useragent);
					$buffer = curl_exec($curl_handle);
					curl_close($curl_handle);

					if (preg_match("/Not Found/i", $buffer))
					{
						$remoteFail = true;
						if (!file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4"))
						{
							$useRemoteFlv = true;
						}
					}
				}

				if (!isset($url) || $useRemoteFlv)
				{
					$url  = $baseUrl.$row->video_id.".flv";
					$path = "";

					$useragent = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1)";
					$curl_handle=curl_init();
					curl_setopt($curl_handle,CURLOPT_URL,$url);
					curl_setopt($curl_handle,CURLOPT_HEADER,true);
					curl_setopt($curl_handle,CURLOPT_NOBODY,true);
					curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
					curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,10);
					curl_setopt($curl_handle,CURLOPT_TIMEOUT,10);
					curl_setopt($curl_handle,CURLOPT_USERAGENT,$useragent);
					$buffer = curl_exec($curl_handle);
					curl_close($curl_handle);

					if (preg_match("/Not Found/i", $buffer))
					{
						$remoteFail = true;
					}
					else
					{
						$remoteFail = false;
					}
				}
			}

			if ($c->storagetype == "0" || $remoteFail)
			{
				if (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4") && $c->usehq == "3")
				{
					$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".mp4";
					$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4";
					$use_xMoovphp = false;
				}
				else if (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".flv") && $c->usehq == "0")
				{
					$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".flv";
					$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".flv";
					$use_xMoovphp = true;
				}
				else if (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4") && $quality == "hd")
				{
					$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".mp4";
					$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4";
					$use_xMoovphp = false;
				}
				else if (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".flv"))
				{
					$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".flv";
					$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".flv";
					$use_xMoovphp = true;
				}
				else if (file_exists(PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4"))
				{
					$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".mp4";
					$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".mp4";
					$use_xMoovphp = false;
				}
				else
				{
					$url = "";
					$path = "";
					$use_xMoovphp = false;
				}
			}
		}
		else if ($row->video_type == "swf")
		{
			$url = URL_HWDVS_DIR."/uploads/".$row->video_id.".swf";
			$path = PATH_HWDVS_DIR.DS."uploads".DS.$row->video_id.".swf";
		}
		else if ($row->video_type == "seyret")
		{
			$data = explode(",", $row->video_id);
			$path = '';

			if ($data[0] == "local")
			{
				$url = $data[1];
			}
			else
			{
				$plugin = hwd_vs_tools::getPluginDetails($data[0]);
				if (!$plugin)
				{
					$url = '';
				}
				else
				{
					$prepareurl = preg_replace("/[^a-zA-Z0-9s_-]/", "", $data[0])."PrepareFlvURL";
					if (!empty($data[2]))
					{
						$video_data = @$data[1].",".@$data[2];
					}
					else
					{
						$video_data = @$data[1];
					}
					$url = $prepareurl($video_data);
					$url = urldecode($url);
				}
			}
		}
		else
		{
			$path = '';
			$plugin = hwd_vs_tools::getPluginDetails($row->video_type);
			if (!$plugin)
			{
				$url = '';
			}
			else
			{
				$prepareurl = preg_replace("/[^a-zA-Z0-9s_-]/", "", $row->video_type)."PrepareFlvURL";
				$url = $prepareurl($row->video_id);
				$url = urldecode($url);
			}
		}

		$location['url'] = $url;
		$location['path'] = $path;
		$location['use_xMoovphp'] = $use_xMoovphp;

		return $location;
	}
    /**
     * Checks that the video upload form is complete and valid
     *
     * @param string $title
     * @param string $description
     * @param int    $category_id
     * @param string $tags
     * @param string $public_private
     * @param int    $allow_comments
     * @param int    $allow_embedding
     * @param int    $allow_ratings
     * @return       true/false
     */
	function checkFormComplete( $title, $description, $category_id, $tags, $public_private, $allow_comments, $allow_embedding, $allow_ratings )
	{
		if ($title == "" || !isset($title))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR01, "exclamation.png", 0);
			return false;
		}

		if ($description == "" || !isset($description))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR02, "exclamation.png", 0);
			return false;
		}

		if ($category_id == "" || $category_id == 0 || !isset($category_id))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR03, "exclamation.png", 0);
			return false;
		}

		if ($tags == "" || !isset($tags))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR04, "exclamation.png", 0);
			return false;
		}

		if ($public_private == "" || !isset($public_private))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR05, "exclamation.png", 0);
			return false;
		}

		if (!isset($allow_comments))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR06, "exclamation.png", 0);
			return false;
		}

		if (!isset($allow_embedding))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR07, "exclamation.png", 0);
			return false;
		}

		if (!isset($allow_ratings))
		{
        	hwd_vs_tools::infoMessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_UPLD_FORMERR08, "exclamation.png", 0);
			return false;
		}
		return true;
	}
    /**
     * Checks that the video upload form is complete and valid
     *
     * @param string $group_name
     * @param string $public_private
     * @param int    $allow_comments
     * @param string $group_description
     * @return       true/false
     */
	function checkGroupFormComplete( $group_name, $public_private, $allow_comments, $group_description ) {
		global $database;

		if ($group_name == "" || !isset($group_name)) {
        	hwd_vs_tools::infoMessage(3, 0, _HWDVIDS_TITLE_GCF, _HWDVIDS_UPLD_GFORMERR01, "exclamation.png", 0);
			return false;
		} else if ($public_private == "" || !isset($public_private)) {
        	hwd_vs_tools::infoMessage(3, 0, _HWDVIDS_TITLE_GCF, _HWDVIDS_UPLD_GFORMERR02, "exclamation.png", 0);
			return false;
		} else if (!isset($allow_comments)) {
        	hwd_vs_tools::infoMessage(3, 0, _HWDVIDS_TITLE_GCF, _HWDVIDS_UPLD_GFORMERR03, "exclamation.png", 0);
			return false;
		} else if ($group_description == "" || !isset($group_description)) {
        	hwd_vs_tools::infoMessage(3, 0, _HWDVIDS_TITLE_GCF, _HWDVIDS_UPLD_GFORMERR04, "exclamation.png", 0);
			return false;
		} else {
			return true;
		}
	}
    /**
     * Checks that the video upload form is complete and valid
     *
     * @param string $group_name
     * @param string $public_private
     * @param int    $allow_comments
     * @param string $group_description
     * @return       true/false
     */
	function generatePostTitle($title=null)
	{
		if (empty($title))
		{
			$title = Jrequest::getVar( 'title', _HWDVIDS_UNKNOWN );
		}
		$title = stripslashes($title);
		$title = stripslashes($title);
		$title = hwdEncoding::charset_decode_utf_8($title);
		$title = hwdEncoding::charset_encode_utf_8($title);
		$title = htmlspecialchars_decode($title);
		$title = addslashes($title);

		return $title;
	}
	function generatePostDescription($description=null)
	{
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();

		if (empty($description))
		{
			if (!hwd_vs_access::checkAccess($c->gtree_edtr, $c->gtree_edtr_child, 1, 0, "", "", "", "exclamation.png", 0, "", 1, "core.frontend.wysiwyg"))
			{
				$description = Jrequest::getVar( 'description', _HWDVIDS_UNKNOWN );
			}
			else
			{
				$requestarray = JRequest::get( 'default', 2 );
				$description = trim(@$requestarray['description']);
			}
		}
		$description = stripslashes($description);
		$description = stripslashes($description);
		$description = hwdEncoding::charset_decode_utf_8($description);
		$description = hwdEncoding::charset_encode_utf_8($description);
		$description = htmlspecialchars_decode($description);
		$description = addslashes($description);

		return $description;
	}
	function generatePostTags($raw_tags=null)
	{
		if (empty($raw_tags))
		{
			$raw_tags = Jrequest::getVar( 'tags', _HWDVIDS_UNKNOWN );
		}
		$tags = '';
		$tag_arr_co = explode(",", $raw_tags);

		for ($j=0, $m=count($tag_arr_co); $j < $m; $j++)
		{
			$row_co = $tag_arr_co[$j];
			$row_co = hwdEncoding::charset_decode_utf_8($row_co);
			$row_co = preg_replace("/[^a-zA-Z0-9s_&#; -]/", "", $row_co);
			$row_co = hwdEncoding::charset_encode_utf_8($row_co);
			$row_co = htmlspecialchars_decode($row_co);
			$row_co = addslashes($row_co);

			if (!empty($row_co))
			{
				$tags.= $row_co.",";
			}

		}
		if (substr($tags, -1) == ",") {$tags = substr($tags, 0, -1);}

		return $tags;
	}
    /**
     * Trys to get the flv dimensions
     *
     * @param string $flv
     * @return
     */
	function getflvsize( $flv ) {
		require_once(HWDVIDSPATH.'/mvc/controller/id3/getid3.php');
		$getID3 = new getID3;
		$fileinfo = $getID3->analyze($flv);
		if(!($fileinfo['meta']['onMetaData']['width'] && $fileinfo['meta']['onMetaData']['height']))
			return false;
		$width = $fileinfo['meta']['onMetaData']['width'];
		$height = $fileinfo['meta']['onMetaData']['height'];
		return array($width, $height);
	}
    /**
     * Trys to get the flv dimensions
     *
     * @param string $flv
     * @return
     */
	function sendToFriend($row)
	{
		global $hwdvsItemid;

		$uri	=& JURI::getInstance();
		$base	= $uri->toString( array('scheme', 'host', 'port'));
		$link	= $base.JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&video_id=".$row->id."&Itemid=$hwdvsItemid");
		$link	= str_replace("&amp;", "&", $link);
		$url	= 'index.php?option=com_mailto&tmpl=component&link='.base64_encode( $link );

        if (file_exists(JPATH_SITE.DS.'components'.DS.'com_mailto'.DS.'helpers'.DS.'mailto.php'))
        {
        	require_once(JPATH_SITE.DS.'components'.DS.'com_mailto'.DS.'helpers'.DS.'mailto.php');
        	$url    = 'index.php?option=com_mailto&tmpl=component&link='.MailToHelper::addLink($link);
		}

		$status = 'width=400,height=350,menubar=yes,resizable=yes';

		$image = JHTML::_('image.site', 'emailButton.png', '/images/M_images/', NULL, NULL, JText::_('Email'));
		$text  = _HWDVIDS_SENDFRIEND;

		$attribs['title']	= JText::_( 'Email' );
		$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";

		$output = JHTML::_('link', JRoute::_($url), $image, $attribs);
		$output.= '&nbsp;';
		$output.= JHTML::_('link', JRoute::_($url), $text, $attribs);

		return $output;
	}
    /**
     * Decodes parsed XML data
     *
     * @param string $string  the parsed xml string
     * @return       $string
     */
	function xmlDecode($string) {
		$string = str_replace("&#38;", "&", $string);
		$string = str_replace("&#60;", "<", $string);
		$string = str_replace("&#62;", ">", $string);
		$string = str_replace("&#39;", "\"", $string);
		$string = str_replace("&#39;", "'", $string);
		$string = str_replace("&#169;", "�", $string);
		$string = str_replace("&#174;", "�", $string);
		return $string;
	}
    /**
     * Generates the captcha security code
     *
     * @return       $code
     */
	function generateCaptcha( ) {
		global $database, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		if ($c->disablecaptcha == 0) {

			$jversion = hwd_vs_access::checkJversion();

			$code.="<script language=\"javascript\">
					window.onload=refresh_hwd_Captcha;
					var image=\"".JURI::root( true )."/components/com_hwdvideoshare/assets/captcha/CaptchaSecurityImages.php?width=120&height=40&jversion=".$jversion."&characters=6&uid=".rand()."\";
						function refresh_hwd_Captcha()
						{
							document.images[\"hwdCaptchaPic\"].src=image+\"?\"+new Date();
						}
					</script>
					<img src=\"".JURI::root( true )."/components/com_hwdvideoshare/assets/images/loadingCaptcha.png\" alt=\"Security Code\" name=\"hwdCaptchaPic\" id=\"hwdCaptchaPic\" width=\"120\" height=\"40\" style=\"border: 1px solid Black; width: 120px; height: 40px;\" />
					<script language=\"javascript\">
					document.write('<a id=\"refreshcaptcha\" onclick=\"refresh_hwd_Captcha()\" >"._HWDVIDS_INFO_NEWCODE."</a>');
					</script>";
		$smartyvs->assign("print_captcha", 1);
		}

	return $code;
	}
    /**
     * Generates the human readable supported 'third party' website list
     *
     * @return       $code
     */
	function generateSupportedWebsiteList()
	{
		global $j15, $j16;
		$db = & JFactory::getDBO();

		
		$db->SetQuery( 'SELECT * FROM #__plugins WHERE published = 1 AND folder = "hwdvs-thirdparty" ORDER BY name ASC');
		$iniFile = JPATH_SITE.'/plugins/hwdvs-thirdparty/support.ini';
		

    	$rows = $db->loadObjectList();

		$code = null;
		$code.= "<div id=\"canesWrap\">";
		for ($i=count($rows), $n=count($rows); $i > 0; $i--)
		{
			$row = $rows[$i];
			
			if ($row->element == "thirdpartysupportpack")
			{
				if (file_exists($iniFile))
				{
					require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'csv_iterator.class.php');
					$csvIterator = new CsvIterator($iniFile, true, ",", "\"");

					while ($csvIterator->next())
					{
						$row = $csvIterator->current();

						if (!isset($row['Name']) || empty($row['Name'])) { continue; }
						if (!isset($row['Website']) || empty($row['Website'])) { continue; }

						$code.= "<a href=\"".$row['Website']."\" target=\"_blank\">".$row['Name']."</a>, ";
					}
				}
			}
			else if ($row->element == "youtube")
			{
				$code.= "<a href=\"http://www.youtube.com\" target=\"_blank\"><div class=\"canes mtop12 mleft12 youtube mright6\"><span class=\"nonvis\">Youtube.com</span></div></a> ";
			}
			else if ($row->element == "metacafe")
			{
				$code.= "<a href=\"http://metacafe.com\" target=\"_blank\"><div class=\"canes mtop12 mleft12 metacafe mright6 mbot12\"><span class=\"nonvis\">Metacafe.com</span></div></a>";
			}
		}
		
		//$code.= "<a href=\"http://metacafe.com\" target=\"_blank\"><div class=\"metacafe pad12 mright6 mbot12\"><span class=\"nonvis\">Metacafe.com</span></div></a>";
		
		$code.="<div class=\"clear\"></div>";
		$code.="</div>";
		if (substr($code, -2) == ", ") {$code = substr($code, 0, -2);}
		return $code;
	}
	/**
     * Generates the Download Video Button
     *
     * @param array  $row  the video sql data
     * @param int    $original  link to original video or converted flv video (0/1)
     * @return       $code
     */
	function generateDownloadVideoLink( $row )
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		$code = null;
		if ($row->video_type == "local" || $row->video_type == "mp4"  || $row->video_type == "swf"  || $row->video_type == "seyret" || ($row->video_type == "remote" && substr($row->video_id, 0, 6) !== "embed|"))
		{
			if ($c->showdlor == "1")
			{
				$smartyvs->assign("showDownloadButton", 1);
				$smartyvs->assign("print_downloadOption", 1);

				if (!hwd_vs_access::checkAccess($c->gtree_dnld, $c->gtree_dnld_child, 4, 0, _HWDVIDS_TITLE_NOACCESS, "You need to login to download videos.", "You do not have permission to download videos.", "exclamation.png", 0, "", 1, "core.frontend.download"))
				{
					return "You do not have permission to download videos";
				}

				// setup antileech system expiration
				$dlink_generic = hwd_vs_tools::generateAntileechExpiration($row->id, 'local', '');

				$code.= "<form name=\"downloadVideo\" action=\"$dlink_generic\" method=\"post\">
						 <select name=\"deliver\">
						 <option value=\"original\">Original Video</option>
						 <option value=\"flv\">Standard Definition (FLV)</option>";
				if ($c->uselibx264 == "1")
				{
				$code.= "<option value=\"h264\">High Definition (MP4)</option>";
				}
				if ($c->ipod320 == "on")
				{
				$code.= "<option value=\"ipod340\">iPod 320 (MP4)</option>";
				}
				if ($c->ipod640 == "on")
				{
				$code.= "<option value=\"ipod620\">iPod 640 (MP4)</option>";
				}
//				if ($c->ogg == "on")
//				{
//				$code.= "<option value=\"ogg\">Ogg Theora (OGG)</option>";
//				}
				$code.= "</select>
						 <input type=\"submit\" value=\"Download\" />
						 </form>";
			}
		}
		return $code;
	}
	/**
     * Generates the View Original Video Button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateViewOriginalLink( $row )
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		$code = null;
		if ($row->video_type == "local" || $row->video_type == "mp4"  || $row->video_type == "swf"  || $row->video_type == "seyret" || ($row->video_type == "remote" && substr($row->video_id, 0, 6) !== "embed|"))
		{
		}
		else
		{
			if ($c->showvuor == "1")
			{
				$smartyvs->assign("showDownloadButton", 1);
				$smartyvs->assign("print_downloadOption", 1);

				$plugin = hwd_vs_tools::getPluginDetails($row->video_type);
				if (!$plugin)
				{
					$code.= "";
				}
				else
				{
					// print third party thumbnail
					$prepareurl = preg_replace("/[^a-zA-Z0-9s_-]/", "", $row->video_type)."PrepareVideoURL";
					if ($url = $prepareurl($row->video_id))
					{
						$code.= "<a href=\"$url\" title=\""._HWDVIDS_VOV."\" target=\"_blank\"><strong>"._HWDVIDS_VOV."</strong></a>";
					}
					else
					{
						$code.= "";
					}
				}
			}
		}
		return $code;
	}
	/**
     * Generates the View Original Video Button
     *
     * @param array  $row  the video sql data
     * @return       $code
     */
	function generateAgeCheck($row)
	{
		global $smartyvs, $hwdvsItemid;

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
$app = & JFactory::getApplication();

		if (strpos(JURI::base(true), "/administrator") === false)
		{
			if ($row->age_check > 0)
			{
				$age = $row->age_check;
			}
			else if ($c->age_check > 0 && $row->age_check == "-1")
			{
				$age = $c->age_check;
			}
			else
			{
                return true;
			}

			$age_check_variable = $app->getUserState( "hwdvsAge", "notset" );

			$code = null;

			if ($age_check_variable == "notset" || empty($age_check_variable))
			{
				if (isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day']))
				{
					$day = intval($_POST['day']);
					$month = intval($_POST['month']);
					$year = intval($_POST['year']);

					if ($day == 0 || $month == 0 || $year == 0)
					{
						$smartyvs->assign("player_width", $c->flvplay_width);
						$code.= _HWDVIDS_AGEGATE." "._HWDVIDS_AGEGATE_INVALID;
					}
					else
					{
						$app->setUserState( "hwdvsAge", "$day:$month:$year" );
						if (hwd_vs_tools::w3_checkbirthdate($month,$day,$year,$age))
						{
							return true;
						}
						else
						{
							$smartyvs->assign("player_width", $c->flvplay_width);
							$code.= _HWDVIDS_AGEGATE." "._HWDVIDS_AGEGATE_TOOYOUNG." ($day/$month/$year)";
							return "<div id=\"hwdvsplayer\">".$code."</div>";
						}
					}
				}
				else
				{
					$smartyvs->assign("player_width", $c->flvplay_width);
					$code.= _HWDVIDS_AGEGATE." "._HWDVIDS_AGEGATE_ENTER;
				}
			}
			else
			{
				// we already know there age, just verify it.
				$dateInfo = explode(':',$age_check_variable);

				$day = intval(@$dateInfo[0]);
				$month = intval(@$dateInfo[1]);
				$year = intval(@$dateInfo[2]);

				if (hwd_vs_tools::w3_checkbirthdate($month,$day,$year,$age))
				{
					return true;
				}
				else
				{
					$smartyvs->assign("player_width", $c->flvplay_width);
					$code.= _HWDVIDS_AGEGATE." "._HWDVIDS_AGEGATE_TOOYOUNG." ($day/$month/$year)";
					return "<div id=\"hwdvsplayer\">".$code."</div>";
				}
			}

			$code.= "<br /><br />";

			$link = JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=$hwdvsItemid&video_id=".$row->id);
			$ageForm = '<form action="#" method="post">
			<select name="month">
			<option value="na">'.JText::_('MONTH').'</option>
			<option value="1">'.JText::_('JANUARY').'</option>
			<option value="2">'.JText::_('FEBRUARY').'</option>
			<option value="3">'.JText::_('MARCH').'</option>
			<option value="4">'.JText::_('APRIL').'</option>
			<option value="5">'.JText::_('MAY').'</option>
			<option value="6">'.JText::_('JUNE').'</option>
			<option value="7">'.JText::_('JULY').'</option>
			<option value="8">'.JText::_('AUGUST').'</option>
			<option value="9">'.JText::_('SEPTEMBER').'</option>
			<option value="10">'.JText::_('OCTOBER').'</option>
			<option value="11">'.JText::_('NOVEMBER').'</option>
			<option value="12">'.JText::_('DECEMBER').'</option>
			</select>
			&nbsp;
			<select name="day">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select>
			&nbsp;
			<select name="year">
			<option value="na">'.JText::_('YEAR').'</option>
			<option value="2009">2009</option>
			<option value="2008">2008</option>
			<option value="2007">2007</option>
			<option value="2006">2006</option>
			<option value="2005">2005</option>
			<option value="2004">2004</option>
			<option value="2003">2003</option>
			<option value="2002">2002</option>
			<option value="2001">2001</option>
			<option value="2000">2000</option>
			<option value="1999">1999</option>
			<option value="1998">1998</option>
			<option value="1997">1997</option>
			<option value="1996">1996</option>
			<option value="1995">1995</option>
			<option value="1994">1994</option>
			<option value="1993">1993</option>
			<option value="1992">1992</option>
			<option value="1991">1991</option>
			<option value="1990">1990</option>
			<option value="1989">1989</option>
			<option value="1988">1988</option>
			<option value="1987">1987</option>
			<option value="1986">1986</option>
			<option value="1985">1985</option>
			<option value="1984">1984</option>
			<option value="1983">1983</option>
			<option value="1982">1982</option>
			<option value="1981">1981</option>
			<option value="1980">1980</option>
			<option value="1979">1979</option>
			<option value="1978">1978</option>
			<option value="1977">1977</option>
			<option value="1976">1976</option>
			<option value="1975">1975</option>
			<option value="1974">1974</option>
			<option value="1973">1973</option>
			<option value="1972">1972</option>
			<option value="1971">1971</option>
			<option value="1970">1970</option>
			<option value="1969">1969</option>
			<option value="1968">1968</option>
			<option value="1967">1967</option>
			<option value="1966">1966</option>
			<option value="1965">1965</option>
			<option value="1964">1964</option>
			<option value="1963">1963</option>
			<option value="1962">1962</option>
			<option value="1961">1961</option>
			<option value="1960">1960</option>
			<option value="1959">1959</option>
			<option value="1958">1958</option>
			<option value="1957">1957</option>
			<option value="1956">1956</option>
			<option value="1955">1955</option>
			<option value="1954">1954</option>
			<option value="1953">1953</option>
			<option value="1952">1952</option>
			<option value="1951">1951</option>
			<option value="1950">1950</option>
			<option value="1949">1949</option>
			<option value="1948">1948</option>
			<option value="1947">1947</option>
			<option value="1946">1946</option>
			<option value="1945">1945</option>
			<option value="1944">1944</option>
			<option value="1943">1943</option>
			<option value="1942">1942</option>
			<option value="1941">1941</option>
			<option value="1940">1940</option>
			<option value="1939">1939</option>
			<option value="1938">1938</option>
			<option value="1937">1937</option>
			<option value="1936">1936</option>
			<option value="1935">1935</option>
			<option value="1934">1934</option>
			<option value="1933">1933</option>
			<option value="1932">1932</option>
			<option value="1931">1931</option>
			<option value="1930">1930</option>
			<option value="1929">1929</option>
			<option value="1928">1928</option>
			<option value="1927">1927</option>
			<option value="1926">1926</option>
			<option value="1925">1925</option>
			<option value="1924">1924</option>
			<option value="1923">1923</option>
			<option value="1922">1922</option>
			<option value="1921">1921</option>
			<option value="1920">1920</option>
			<option value="1919">1919</option>
			<option value="1918">1918</option>
			<option value="1917">1917</option>
			<option value="1916">1916</option>
			<option value="1915">1915</option>
			<option value="1914">1914</option>
			<option value="1913">1913</option>
			<option value="1912">1912</option>
			<option value="1911">1911</option>
			<option value="1910">1910</option>
			<option value="1909">1909</option>
			&nbsp;
			<input type="submit" value="Submit">
			</form>';

			$code.= $ageForm;
			$code = "<div id=\"hwdvsplayer\">".$code."</div>";

			return $code;
		}
		else
		{
			return true;
		}
	}
	/**
     * Log a video view
     *
     * @param int    $videoid  the video id
     * @return       true/false
     */
	function w3_checkbirthdate($month,$day,$year,$age)
	{
		$c = hwd_vs_Config::get_instance();

		$min_age = $age;

		if (!checkdate($month,$day,$year)) {
			return false;
		}

		list($this_year,$this_month,$this_day) = explode(',',date('Y,m,d'));

		$max_year = $this_year - $min_age;

		if ($year < $max_year)
		{
			return true;
		}
		elseif (($year == $max_year) && (($month < $this_month) || (($month == $this_month) && ($day <= $this_day))))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
     * Log a video view
     *
     * @param int    $videoid  the video id
     * @return       true/false
     */
	function logViewing( $videoid )
	{
		$app = & JFactory::getApplication();

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$view_check = $app->getUserState( "hwdvs_viewed_$videoid", "notviewed" );

		if ($view_check !== "viewed") {

			$app->setUserState( "hwdvs_viewed_$videoid", "viewed" );

			$row = new hwdvidslogs_views($db);

			$_POST['videoid'] 	= $videoid;
			$_POST['userid'] 	= $my->id;
			$_POST['date'] 		= date('Y-m-d H:i:s');

			// bind it to the table
			if (!$row -> bind($_POST)) {
				echo "<script> alert('"
					.$row -> getError()
					."'); window.history.go(-1); </script>\n";
				exit();
			}

			// store it in the db
			if (!$row -> store()) {
				echo "<script> alert('"
					.$row -> getError()
					."'); window.history.go(-1); </script>\n";
				exit();
			}

			unset($_POST['videoid']);
			unset($_POST['userid']);
			unset($_POST['date']);

		}

		return true;
	}
	/**
     * Log a rate
     *
     * @param int    $videoid  the video id
     * @param int    $vote  the rating value
     * @return       true/false
     */
	function logRating( $videoid, $vote ) {
		global $database, $my;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$row = new hwdvidslogs_votes($db);

		$_POST['videoid'] 	= $videoid;
		$_POST['userid'] 	= $my->id;
		$_POST['vote'] 		= $vote;
		$_POST['date'] 		= date('Y-m-d H:i:s');

		// bind it to the table
		if (!$row -> bind($_POST)) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		// store it in the db
		if (!$row -> store()) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		return true;
	}
	/**
     * Log a favour
     *
     * @param int    $videoid  the video id
     * @param int    $favour  adding or removing favourite
     * @return       true/false
     */
	function logFavour( $videoid, $favour=1 ) {
		global $database, $my;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$row = new hwdvidslogs_favours($db);

		$_POST['videoid'] 	= $videoid;
		$_POST['userid'] 	= $my->id;
		$_POST['favour'] 	= $favour;
		$_POST['date'] 		= date('Y-m-d H:i:s');

		// bind it to the table
		if (!$row -> bind($_POST)) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		// store it in the db
		if (!$row -> store()) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		return true;
	}
	/**
     * Uploads a file from form
     *
     * @param int    $sec  the total number of seconds
     * @param int    $padHours(optional)
     * @return       $hms
     */
	function uploadFile( $input_name, $file_name, $base_Dir, $sizelimit=2, $allowed_formats='', $overwrite=0 )
	{
		global $database, $my;
		$c = hwd_vs_Config::get_instance();

		$report = array();

		$file_name_tmp      = $_FILES[$input_name]['tmp_name'];
		$file_name_org      = $_FILES[$input_name]['name'];
		$file_size          = $_FILES[$input_name]['size'];
		$file_size_limit    = $sizelimit*1024*1024; //size limit in mb
		$file_ext[0]        = substr($file_name_org, strrpos($file_name_org, '.') + 1);
		$file_ext[0]        = strtolower($file_ext[0]);
		$allowed_ext        = explode(",", $allowed_formats);
		$allowed_ext_compare = array_intersect($file_ext, $allowed_ext);
		$allowed_ext_result=false;
		if (count($allowed_ext_compare) > 0) {$allowed_ext_result=true;}

		if (empty($_FILES[$input_name]['name'])) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR00;
			return $report;
		} else if (!isset($_FILES[$input_name]['error'])) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR00;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 8) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR08;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 7) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR07;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 6) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR06;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 5) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR05;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 4) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR04;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 3) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR03;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 2) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR02;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 1) {
        	$report[0] = "0";
        	$report[1] = _HWDVIDS_PHPUPLD_ERR01;
			return $report;
		} else if ($_FILES[$input_name]['error'] == 0) {

			if (empty($file_name)) {
				// generate random filename
				$file_name = hwd_vs_tools::generateNewVideoid().".".$file_ext[0];
			} else {
				$file_name = $file_name.".".$file_ext[0];
			}

			if ($file_size > $file_size_limit) {
				$report[0] = "0";
				$report[1] = "File is too big";
				return $report;
			}

			if (!$allowed_ext_result) {
				$report[0] = "0";
				$report[1] = _HWDVIDS_ERROR_UPLDERR04." (".$allowed_formats.")";
				return $report;
			}

			if (!$overwrite && file_exists($base_Dir.$file_name)) {
				$report[0] = "0";
				$report[1] = _HWDVIDS_ERROR_UPLDERR05;
				return $report;
			}
			if (!move_uploaded_file ($_FILES[$input_name]['tmp_name'],$base_Dir.$file_name)) {
				$report[0] = "0";
				$report[1] = _HWDVIDS_ERROR_UPLDERR06;
				return $report;
			}

			@chmod($base_Dir.$file_name, 0755);

			$report[0] = "1";
			$report[1] = "Success";
			return $report;
		}
	}
	/**
	 * get_redirect_url()
	 * Gets the address that the provided URL redirects to,
	 * or FALSE if there's no redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function get_redirect_url($url){
		$redirect_url = null;

		$url_parts = @parse_url($url);
		if (!$url_parts) return false;
		if (!isset($url_parts['host'])) return false; //can't process relative URLs
		if (!isset($url_parts['path'])) $url_parts['path'] = '/';

		$sock = @fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
		if (!$sock) return false;

		$request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
		$request .= 'Host: ' . $url_parts['host'] . "\r\n";
		$request .= "Connection: Close\r\n\r\n";
		fwrite($sock, $request);
		$response = '';
		while(!feof($sock)) $response .= fread($sock, 8192);
		fclose($sock);

		if (preg_match('/^Location: (.+?)$/m', $response, $matches)){
			return trim($matches[1]);
		} else {
			return false;
		}

	}


    /**
     * Convert seconds to HOURS:MINUTES:SECONDS format
     * @param database A database connector object
     */
	function sec2hms ($sec, $padHours = false)
	{
		// holds formatted string
		$hms = "";

		// there are 3600 seconds in an hour, so if we
		// divide total seconds by 3600 and throw away
		// the remainder, we've got the number of hours
		$hours = intval(intval($sec) / 3600);

		// add to $hms, with a leading 0 if asked for
		$hms .= ($padHours)
			  ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
			  : $hours. ':';


		// dividing the total seconds by 60 will give us
		// the number of minutes, but we're interested in
		// minutes past the hour: to get that, we need to
		// divide by 60 again and keep the remainder
		$minutes = intval(($sec / 60) % 60);

		// then add to $hms (with a leading 0 if needed)
		$hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';

		// seconds are simple - just divide the total
		// seconds by 60 and keep the remainder
		$seconds = intval($sec % 60);

		// add to $hms, again with a leading 0 if needed
		$hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

		// done!
		return $hms;
	}
   /**
	* Convert seconds to HOURS:MINUTES:SECONDS format
	**/
	function hms2sec ($time, $padHours = false)
	{
		$temp = explode(":",$time);

		if (is_numeric(@$temp[0])) {
			$hour = @$temp[0];
		} else { $hour = 0; }
		if (is_numeric(@$temp[0])) {
			$minute = @$temp[1];
		} else { $minute = 0; }
		if (is_numeric(@$temp[0])) {
			$second = @$temp[2];
		} else { $second = 0; }

 		$sec = ($hour*3600) + ($minute*60) + ($second);
		return $sec;
	}

	/**
	 * get_all_redirects()
	 * Follows and collects all redirects, in order, for the given URL.
	 *
	 * @param string $url
	 * @return array
	 */
	function get_all_redirects($url){
		$redirects = array();
		while ($newurl = hwd_vs_tools::get_redirect_url($url)){
			if (in_array($newurl, $redirects)){
				break;
			}
			$redirects[] = $newurl;
			$url = $newurl;
		}
		return $redirects;
	}
	/**
	 * get_final_url()
	 * Gets the address that the URL ultimately leads to.
	 * Returns $url itself if it isn't a redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function get_final_url($url){
		$redirects = hwd_vs_tools::get_all_redirects($url);
		if (count($redirects)>0){
			return array_pop($redirects);
		} else {
			return $url;
		}
	}
	/**
	 * get_final_url()
	 * Gets the address that the URL ultimately leads to.
	 * Returns $url itself if it isn't a redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function checkRemoteFileExists($url){
		if (@fopen($url, "r")) {
			return true;
		} else {
			return false;
		}
	}

function isSSL()
{
	if(@$_SERVER['https'] == 1) /* Apache */
	{
		return TRUE;
	}
	elseif (@$_SERVER['https'] == 'on') /* IIS */
	{
		return TRUE;
	}
	elseif (@$_SERVER['SERVER_PORT'] == 443) /* others */
	{
		return TRUE;
	}
	else
	{
		return FALSE; /* just using http */
	}
}
	/**
	 * get_final_url()
	 * Gets the address that the URL ultimately leads to.
	 * Returns $url itself if it isn't a redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function getSelfURL(){
		$s = empty($_SERVER["HTTPS"]) ? ''
			: ($_SERVER["HTTPS"] == "on") ? "s"
			: "";
		$protocol = hwd_vs_tools::strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
			: (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	}
	function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }
	/**
	 * Legacy function, deprecated
	 *
	 * @deprecated    As of version 1.5
	 */
	function yesnoSelectList( $tag_name, $tag_attribs, $selected, $yes='yes', $no='no' )
	{
		$arr = array(
			JHTML::_('select.option', 0, JText::_( $no )),
			JHTML::_('select.option', 1, JText::_( $yes )),
		);

		return JHTML::_('select.genericlist', $arr, $tag_name, $tag_attribs, 'value', 'text', (int) $selected);
	}
	/**
	 * get_final_url()
	 * Gets the address that the URL ultimately leads to.
	 * Returns $url itself if it isn't a redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function getPluginDetails($type)
	{
		
		
			if ($type == 'youtube.com' && file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."youtube.view.php"))
			{
				require_once(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."youtube.view.php");
			}
			else if ($type == 'google.com' && file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."google.view.php"))
			{
				require_once(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."google.view.php");
			}else if ($type == 'metacafe.com' && file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."google.view.php"))
			{
				require_once(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."metacafe.view.php");
			}
			else if (file_exists(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."$type.view.php"))
			{
				require_once(JPATH_SITE.DS."plugins".DS."hwdvs-thirdparty".DS."$type.view.php");
			}
			else
			{
				return false;
			}
		

		return true;
	}
    /**
     * addslashes() and prevents double-quoting
     *
     * @param array  $rows  the list from an xml file
     * @return       $code  the array prepared for Smarty template
     */
	function generateMetaText($receive) {

		$output = $receive;
		$output = strip_tags($output);
		$output = hwdEncoding::charset_encode_utf_8($output);
		while(strchr($output,'\"')) {
			$output = stripslashes($output);
		}
		$output = str_replace("\r", "", $output);
		$output = str_replace("\n", "", $output);
		$output = str_replace('"', "'", $output);

		return $output;

	}
    /**
     * Generates the array of information for a standard video list from parsed xml files
     *
     * @param array  $rows  the list from an xml file
     * @return       $code  the array prepared for Smarty template
     */
	function generateStaticModuleDisplay( $rows, $hwdvids_params )
	{
		global $hwdvsItemid, $option;

		$code =null;

		if ($hwdvids_params['talignment'] == 1) { $talign = "text-align:left;"; }
		if ($hwdvids_params['talignment'] == 2) { $talign = "text-align:center;"; }
		if ($hwdvids_params['talignment'] == 3) { $talign = "text-align:right;"; }
		if ($hwdvids_params['malignment'] == 1) { $malign = "float:left;"; }
		if ($hwdvids_params['malignment'] == 2) { $malign = "float:left;"; }
		if ($hwdvids_params['malignment'] == 3) { $malign = "float:right;"; }
		if (empty($hwdvids_params['novpr']) || $hwdvids_params['novpr'] == '') { $hwdvids_params['novpr'] = 3; }

		$n = min($hwdvids_params['novtd'],count($rows));

		for ($i=0, $n; $i < $n; $i++)
		{
			$row = $rows[$i];
			$code.="<div style=\"display:block;".$malign."padding:5px;overflow:hidden;".$talign."width:".$hwdvids_params['thumb_width']."px;\">".$row->thumbnail;
			if ($hwdvids_params['showtitle'] == 1) {$code.= '<br />'.$row->title;}
			if ($hwdvids_params['showcategory'] == 1) {$code.= '<br />'.$row->category;}
			if ($hwdvids_params['showdescription'] == 1) {$code.= '<br />'.$row->description;}
			if ($hwdvids_params['showrating'] == 1) {$code.= '<br />'.$row->rating;}
			if ($hwdvids_params['shownov'] == 1) {$code.= '<br />'._HWDVIDS_DETAILS_VIEWED.' '.$row->views.' '._HWDVIDS_DETAILS_TIMES;}
			if ($hwdvids_params['showduration'] == 1) {$code.= '<br />'.$row->duration;}
			if ($hwdvids_params['showuser'] == 1) {$code.= '<br />'.$row->uploader;}
			if ($hwdvids_params['showtime'] == 1) {$code.= '<br />'.$row->timesince;}
			$code.="</div>";

			if (($i-($hwdvids_params['novpr']-1)) % $hwdvids_params['novpr'] == 0) {
				$code.="<div style=\"clear:both;\"></div>";
			}
		}
		return $code;
    }
    /**
     * Generates the array of information for a standard video list from parsed xml files
     *
     * @param array  $rows  the list from an xml file
     * @return       $code  the array prepared for Smarty template
     */
	function generateNextPrevLinks( $row )
	{
		global $hwdvsItemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		$code = null;
		if ($c->showprnx == "1")
		{
			$smartyvs->assign("print_nextprev", 1);
			$code.= "<a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=previousvideo&category_id=".$row->category_id."&video_id=".$row->id)."\" title=\""._HWDVIDS_SHIGARU_SEE_PREV_CATEGORY."\" class=\"swap\">"._HWDVIDS_PREV."</a> | <a href=\"".JRoute::_("index.php?option=com_hwdvideoshare&task=nextvideo&category_id=".$row->category_id."&video_id=".$row->id)."\" class=\"swap\" title=\""._HWDVIDS_SHIGARU_SEE_NEXT_CATEGORY."\">"._HWDVIDS_NEXT."</a>";
		}
		return $code;
	}
    /**
     * Generates the array of information for a standard video list from parsed xml files
     *
     * @param array  $rows  the list from an xml file
     * @return       $code  the array prepared for Smarty template
     */
	function generateTimeSinceUpload( $date_uploaded ) {

		$code =null;

		// get time since upload
		$hour = substr($date_uploaded, 11, 2);
		$minutes = substr($date_uploaded, 14, 2);
		$seconds = substr($date_uploaded, 17, 2);
		$month = substr($date_uploaded, 5, 2);
		$date = substr($date_uploaded, 8, 2);
		$year = substr($date_uploaded, 0, 4);
		$upld_date = @mktime($hour, $minutes, $seconds, $month, $date, $year);
		$today = time();
		$difference = $today - $upld_date;

		if ($difference < 60) {
			$code = $difference." "._HWDVIDS_MP_SAGO;
		} else if ($difference < 3600) {
			$code = floor($difference / 60)." "._HWDVIDS_MP_MAGO;
		} else if ($difference < 86400) {
			$code = round($difference / 3600, 0)." "._HWDVIDS_MP_HAGO;
		} else {
			$code = round($difference / 86400, 0)." "._HWDVIDS_MP_DAGO;
		}

		return $code;
	}
	/**
     * readfile_chunked
     * Read the contents of a file in chunks
     * @param array  $row  the video sql data
     * @param int    $original  link to original video or converted flv video (0/1)
     * @return       $code
     */
	function readfile_chunked($filename,$retbytes=true)
	{
	   $chunksize = 1*(1024*1024); // how many bytes per chunk
	   $buffer = '';
	   $cnt =0;

	   $handle = fopen($filename, 'rb');
	   if ($handle === false)
	   {
		   return false;
	   }

	   while (!feof($handle))
	   {
		   $buffer = fread($handle, $chunksize);
		   echo $buffer;
		   ob_flush();
		   flush();
		   if ($retbytes)
		   {
			   $cnt += strlen($buffer);
		   }
	   }

	   $status = fclose($handle);
	   if ($retbytes && $status)
	   {
		   return $cnt; // return num. bytes delivered like readfile() does.
	   }
	   return $status;

	}
	/**
     * Generates the Download Video Button
     *
     * @param array  $row  the video sql data
     * @param int    $original  link to original video or converted flv video (0/1)
     * @return       $code
     */
	function generateAntileechExpiration($fid, $media, $deliver, $quality='hd')
	{
		global $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

		// setup antileech system expiration
		$download_exp_key = md5(microtime());

		$leech = new hwdvidsantileech($db);

		$_POST['expiration'] 		= $download_exp_key;

		// bind it to the table
		if (!$leech -> bind($_POST)) {
			echo "<script> alert('"
				.$leech -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		// store it in the db
		if (!$leech -> store()) {
			echo "<script> alert('"
				.$leech -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		unset($_POST['expiration']);

		$dlink = JURI::root()."index.php?option=com_hwdvideoshare&task=downloadfile&file=".$fid."&evp=".$download_exp_key."&media=".$media."&deliver=".$deliver."&quality=".$quality."&tmpl=component";

		return $dlink;
	}
    /**
     * Generates the edit group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function getChildCategories( $cat_id ) {
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();

        $query = 'SELECT id FROM #__hwdvidscategories WHERE parent = '.$cat_id;
        $db->SetQuery( $query );
        $children = $db->loadObjectList();

		$code = $cat_id;
		for ($i=0, $n=count($children); $i < $n; $i++) {
			$row = $children[$i];

			$code.= ','.$row->id;
			$query = 'SELECT id FROM #__hwdvidscategories WHERE parent = '.$row->id;
			$db->SetQuery( $query );
			$grandchildren = $db->loadObjectList();

			for ($j=0, $m=count($grandchildren); $j < $m; $j++) {
				$bow = $grandchildren[$j];

				$code.= ','.$bow->id;

			}

		}

		return $code;
    }
    /**
     * Generates the edit group link
     *
     * @param string $row  the group sql data
     * @return       $code
     */
	function getCurrentURL() {
	 $pageURL = 'http';
	 if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}


	//Legacy
	/**
	 * get_redirect_url()
	 * Gets the address that the provided URL redirects to,
	 * or FALSE if there's no redirect.
	 *
	 * @param string $url
	 * @return string
	 */
	function generateValidItemid($current=null)
	{
  		$db =& JFactory::getDBO();

		if (isset($current))
		{
			$db->SetQuery( 'SELECT id FROM #__menu WHERE `link` LIKE "%com_hwdvideoshare%" AND id = '.$current );
			$Itemid = $db->loadResult();
			if (!empty($Itemid))
			{
				return $Itemid;
			}
		}

		$db->SetQuery( 'SELECT id FROM #__menu WHERE `link` = "index.php?option=com_hwdvideoshare"' );
		$Itemid = $db->loadResult();

		if (empty($Itemid))
		{
			$db->SetQuery( 'SELECT id FROM #__menu WHERE `link` LIKE "%com_hwdvideoshare%"' );
			$Itemid = $db->loadResult();
		}

		if (empty($Itemid))
		{
			$Itemid = "0";
		}

		return $Itemid;
	}
}
/**
 * Tab Creation handler
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdTabs {
	/** @var int Use cookies */
	var $useCookies = 0;
	/**
	* Constructor
	* Includes files needed for displaying tabs and sets cookie options
	* @param int useCookies, if set to 1 cookie will hold last used tab between page refreshes
	*/
	function hwdTabs( $useCookies, $xhtml=NULL ) {
		$doc = & JFactory::getDocument();
		$html = null;

		if ( $xhtml ) {
			$doc->addCustomTag( '<link rel="stylesheet" type="text/css" media="all" href="includes/js/tabs/tabpane.css" id="luna-tab-style-sheet" />' );
		} else {
			echo "<link id=\"luna-tab-style-sheet\" type=\"text/css\" rel=\"stylesheet\" href=\"" . JURI::root( true ). "/includes/js/tabs/tabpane.css\" />";
		}

		echo "<script type=\"text/javascript\" src=\"". JURI::root( true ) . "/includes/js/tabs/tabpane_mini.js\"></script>";

		$this->useCookies = $useCookies;
	}
	/**
	* creates a tab pane and creates JS obj
	* @param string The Tab Pane Name
	*/
	function startPane($id){
		$html = null;

		$html.= "<div class=\"tab-page\" id=\"".$id."\">";
		$html.= "<script type=\"text/javascript\">\n";
		$html.= "	var tabPane1 = new WebFXTabPane( document.getElementById( \"".$id."\" ), ".$this->useCookies." )\n";
		$html.= "</script>\n";
		return $html;
	}
	/**
	* Ends Tab Pane
	*/
	function endPane() {
		$html = null;
		$html.= "</div>";
		return $html;
	}
	/*
	* Creates a tab with title text and starts that tabs page
	* @param tabText - This is what is displayed on the tab
	* @param paneid - This is the parent pane to build this tab on
	*/
	function startTab( $tabText, $paneid ) {
		$html = null;
		$html.= "<div class=\"tab-page\" id=\"".$paneid."\">";
		$html.= "<h2 class=\"tab\">".$tabText."</h2>";
		$html.= "<script type=\"text/javascript\">\n";
		$html.= "  tabPane1.addTabPage( document.getElementById( \"".$paneid."\" ) );";
		$html.= "</script>";
		return $html;
	}
	/*
	* Ends a tab page
	*/
	function endTab() {
		$html = null;
		$html.= "</div>";
		return $html;
	}
}

define('SKICK_API_ENDPOINT', 'http://api.songkick.com/api/3.0/search/artists.json?query=');
define('SKICK_REQUEST_TOKEN', 'EKOiqRoWeX1ZQ9vZ');

class hwdSongkick{

	//Songkick API URL
	static 	$api_url = SKICK_API_ENDPOINT;
	
	//API key
	static $api_key = SKICK_REQUEST_TOKEN;
	
	/**
	* Constructor for the Songkick class
	*
	* @throws Some_Exception_Class If something interesting cannot happen 
	*/ 
	public function __construct(){
	}
	
	/**
	* Request method for Songkick API
	*
	* @throws Some_Exception_Class If something interesting cannot happen 
	*/ 
	public function request($artist){
		
		return json_decode(file_get_contents(self::$api_url.urlencode($artist).'&apikey='.self::$api_key));
		
	}
	
	/**
	* Destructor for the Songkick class
	*
	* @throws Some_Exception_Class If something interesting cannot happen 
	*/ 
	public function __destruct(){
	}
}


define('RDIO_API_ENDPOINT', 'http://api.rdio.com/1/');
define('RDIO_REQUEST_TOKEN', 'http://api.rdio.com/oauth/request_token');
define('RDIO_ACCESS_TOKEN', 'http://api.rdio.com/oauth/access_token');

class hwdRdio {
  private $key;
  private $secret;

  function __construct($key, $secret) {
    $this->key = $key;
    $this->secret = $secret;
  }
  
  private function _getOAuth() {
    try {
		$oauth = new OAuth($this->key, $this->secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_FORM);
	}catch(OAuthException $E){
        echo $E;
    }
    if (isset($_SESSION['access_key']) && isset($_SESSION['access_secret'])) {
      $oauth->setToken($_SESSION['access_key'], $_SESSION['access_secret']);
    } else if (isset($_SESSION['request_key']) && isset($_SESSION['request_secret'])) {
      $oauth->setToken($_SESSION['request_key'], $_SESSION['request_secret']);
    }
    return $oauth;
  }
  
  public function logOut() {
    unset($_SESSION['request_key']);
    unset($_SESSION['request_secret']);
    unset($_SESSION['access_key']);
    unset($_SESSION['access_secret']);
  }
  
  public function loggedIn() {
    return (isset($_SESSION['access_key']) && isset($_SESSION['access_secret']));
  }

  public function __call($method, $arguments) {
    // build the request
    if (count($arguments) > 0) {
      $params = $arguments[0];
    } else {
      $params = array();
    }
    $params['method'] = $method;
    // make the request
    $oauth = $this->_getOAuth();
    $oauth->fetch(RDIO_API_ENDPOINT, $params, OAUTH_HTTP_METHOD_POST);
    // parse the result
    return json_decode($oauth->getLastResponse(), FALSE);    
  }


  public function begin_authentication($callback) {
    // reset previous auth state
    $this->logOut();
    
    $oauth = $this->_getOAuth();
    $pieces = $oauth->getRequestToken(RDIO_REQUEST_TOKEN, $callback);
    
    // save the request token
    $_SESSION['request_key'] = $pieces['oauth_token'];
    $_SESSION['request_secret'] = $pieces['oauth_token_secret'];

    // build the authentication URL
    return $pieces['login_url'] . '?oauth_token=' . $pieces['oauth_token'];
  }

  public function complete_authentication($verifier) {
    $oauth = $this->_getOAuth();
    $pieces = $oauth->getAccessToken(RDIO_ACCESS_TOKEN, '', $verifier);
    
    // save the access token
    $_SESSION['access_key'] = $pieces['oauth_token'];
    $_SESSION['access_secret'] = $pieces['oauth_token_secret'];
    
    // clear the request token
    unset($_SESSION['request_key']);
    unset($_SESSION['request_secret']);
  }

}

/**
 * Process character encoding
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.3
 */
class hwdEncoding {

    function XMLEntities($string)
    {

		// Try to tidy up double encodings
		$string = str_replace("&#38;#38;#", "&#", $string);
		$string = str_replace("&#38;#", "&#", $string);
		$string = str_replace("&#38;amp;#", "&#", $string);
		$string = str_replace("&amp;#", "&#", $string);

		$string = str_replace("&", "&#38;", $string);
		$string = str_replace("<", "&#60;", $string);
		$string = str_replace(">", "&#62;", $string);
		$string = str_replace("\"", "&#34;", $string);
		$string = str_replace("'", "&#39;", $string);

		// Try to tidy up double encodings
		$string = str_replace("&#38;#38;#", "&#", $string);
		$string = str_replace("&#38;#", "&#", $string);
		$string = str_replace("&#38;amp;#", "&#", $string);
		$string = str_replace("&amp;#", "&#", $string);

		return $string;
    }

    function UNXMLEntities($string)
    {

		$string = str_replace("&#38;", "&", $string);
		$string = str_replace("&#60;", "<", $string);
		$string = str_replace("&#62;", ">", $string);
		$string = str_replace("&#34;", "\"", $string);
		$string = str_replace("&#39;", "'", $string);

		return $string;
    }

    function fixDoubleEncodings($string)
    {

		// Try to tidy up double encodings
		$string = str_replace("&#38;#38;#", "&#", $string);
		$string = str_replace("&#38;#", "&#", $string);
		$string = str_replace("&#38;amp;#", "&#", $string);
		$string = str_replace("&amp;#", "&#", $string);

		// Try to tidy up double encodings
		$string = str_replace("&#38;#38;#", "&#", $string);
		$string = str_replace("&#38;#", "&#", $string);
		$string = str_replace("&#38;amp;#", "&#", $string);
		$string = str_replace("&amp;#", "&#", $string);

		return $string;
    }

	function charset_decode_utf_8 ($string) {
		/* Only do the slow convert if there are 8-bit characters */
		/* avoid using 0xA0 (\240) in ereg ranges. RH73 does not like that */
		// if (! ereg("[\200-\237]", $string) and ! ereg("[\241-\377]", $string))
		//	  return $string;

		if (! preg_match("/[\200-\237]/", $string) and ! preg_match("/[\241-\377]/", $string))
			return $string;

		// decode three byte unicode characters
		$string = preg_replace("/([\340-\357])([\200-\277])([\200-\277])/e",
		"'&#'.((ord('\\1')-224)*4096 + (ord('\\2')-128)*64 + (ord('\\3')-128)).';'",
		$string);

		// decode two byte unicode characters
		$string = preg_replace("/([\300-\337])([\200-\277])/e",
		"'&#'.((ord('\\1')-192)*64+(ord('\\2')-128)).';'",
		$string);

		return $string;

	}

	function charset_encode_utf_8($string)
	{
		static $trans_tbl;

		// replace numeric entities
		$string = preg_replace('~&#([0-9]+);~e', 'hwdEncoding::unicodetoutf8(\\1)', $string);

		// replace literal entities
		if (!isset($trans_tbl))
		{
			$trans_tbl = array();

			foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
				$trans_tbl[$key] = utf8_encode($val);
		}

		return strtr($string, $trans_tbl);
	}

	/**
	 * Return utf8 symbol when unicode character number is provided
	 *
	 */
	function unicodetoutf8($var) {

		if ($var < 128) {

			$ret = chr ($var);

		} else if ($var < 2048) {

			// Two byte utf-8
			$binVal = str_pad (decbin ($var), 11, "0", STR_PAD_LEFT);
			$binPart1 = substr ($binVal, 0, 5);
			$binPart2 = substr ($binVal, 5);

			$char1 = chr (192 + bindec ($binPart1));
			$char2 = chr (128 + bindec ($binPart2));
			$ret = $char1 . $char2;

		} else if ($var < 65536) {

	        // Three byte utf-8
	        $binVal = str_pad (decbin ($var), 16, "0", STR_PAD_LEFT);
	        $binPart1 = substr ($binVal, 0, 4);
	        $binPart2 = substr ($binVal, 4, 6);
	        $binPart3 = substr ($binVal, 10);

	        $char1 = chr (224 + bindec ($binPart1));
	        $char2 = chr (128 + bindec ($binPart2));
	        $char3 = chr (128 + bindec ($binPart3));
	        $ret = $char1 . $char2 . $char3;

	    } else if ($var < 2097152) {

	        // Four byte utf-8
	        $binVal = str_pad (decbin ($var), 21, "0", STR_PAD_LEFT);
	        $binPart1 = substr ($binVal, 0, 3);
	        $binPart2 = substr ($binVal, 3, 6);
	        $binPart3 = substr ($binVal, 9, 6);
	        $binPart4 = substr ($binVal, 15);

	        $char1 = chr (240 + bindec ($binPart1));
	        $char2 = chr (128 + bindec ($binPart2));
	        $char3 = chr (128 + bindec ($binPart3));
	        $char4 = chr (128 + bindec ($binPart4));
	        $ret = $char1 . $char2 . $char3 . $char4;

	    } else if ($var < 67108864) {

	        // Five byte utf-8
	        $binVal = str_pad (decbin ($var), 26, "0", STR_PAD_LEFT);
	        $binPart1 = substr ($binVal, 0, 2);
	        $binPart2 = substr ($binVal, 2, 6);
	        $binPart3 = substr ($binVal, 8, 6);
	        $binPart4 = substr ($binVal, 14,6);
	        $binPart5 = substr ($binVal, 20);

	        $char1 = chr (248 + bindec ($binPart1));
	        $char2 = chr (128 + bindec ($binPart2));
	        $char3 = chr (128 + bindec ($binPart3));
	        $char4 = chr (128 + bindec ($binPart4));
	        $char5 = chr (128 + bindec ($binPart5));
	        $ret = $char1 . $char2 . $char3 . $char4 . $char5;

	    } else if ($var < 2147483648) {

	        // Six byte utf-8
	        $binVal = str_pad (decbin ($var), 31, "0", STR_PAD_LEFT);
	        $binPart1 = substr ($binVal, 0, 1);
	        $binPart2 = substr ($binVal, 1, 6);
	        $binPart3 = substr ($binVal, 7, 6);
	        $binPart4 = substr ($binVal, 13,6);
	        $binPart5 = substr ($binVal, 19,6);
	        $binPart6 = substr ($binVal, 25);

	        $char1 = chr (252 + bindec ($binPart1));
	        $char2 = chr (128 + bindec ($binPart2));
	        $char3 = chr (128 + bindec ($binPart3));
	        $char4 = chr (128 + bindec ($binPart4));
	        $char5 = chr (128 + bindec ($binPart5));
	        $char6 = chr (128 + bindec ($binPart6));
	        $ret = $char1 . $char2 . $char3 . $char4 . $char5 . $char6;

	    } else {

	        // there is no such symbol in utf-8
	        $ret='?';

	    }

		return $ret;

	}
}

?>
