<?php
/**
 * JComments - Joomla Comment System
 *
 * Show top comment posters for JComments
 *
 * @version 1.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

// define directory separator short constant
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

global $mainframe;

$commentsLegacy = $mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_jcomments' . DS . 'jcomments.legacy.php';
if (file_exists($commentsLegacy)) {
	require_once ($commentsLegacy);
} else {
	return;
}

require_once (JCOMMENTS_BASE . DS . 'jcomments.config.php');
require_once (JCOMMENTS_BASE . DS . 'jcomments.class.php');

if ( !defined( '_JCOMMENTS_TOP_POSTERS_MODULE' ) ) {
	define( '_JCOMMENTS_TOP_POSTERS_MODULE', 1 );

	class modJCommentsTopPostersHelper
	{
		function getList($params)
		{
			$count = intval( $params->get( 'count', 5 ) );
			$avatar = intval( $params->get( 'avatar', 0 ) );
			$profile_link = intval( $params->get( 'profile_link', 0 ) );
			$display_name = $params->get('display_name', 'name');
			$display_guests = intval( $params->get( 'display_guests', 1 ) );

			switch($params->get( 'order_by', 'count'))
			{
			        case 'votes':
			        	$orderby = 'votes DESC';
			        	break;
				case 'count':
				default:
			        	$orderby = 'cnt DESC';
					break;
			}

			$db =& JCommentsFactory::getDBO();

			$query = "SELECT c.userid, u.email, u.name, u.username, '' as avatar, '' as profileLink"
				 ."\n, count(c.userid) AS cnt"
				 ."\n, sum(c.isgood) as isgood, sum(c.ispoor) as ispoor, sum( c.ispoor ) AS ispoor, (sum( c.isgood ) - sum( c.ispoor )) AS votes"
			         ."\nFROM #__jcomments AS c"
			         ."\nJOIN #__users AS u ON u.id = c.userid"
			         ."\nWHERE c.published = 1"
			         ;


			if ($display_guests != 0) {
				$query .= "\nUNION ALL "
					 ."\nSELECT c.userid, c.email, c.name, c.username, '' as avatar, '' as profileLink"
					 ."\n, count(c.userid) AS cnt"
					 ."\n, sum(c.isgood) as isgood, sum(c.ispoor) as ispoor, sum( c.ispoor ) AS ispoor, (sum( c.isgood ) - sum( c.ispoor )) AS votes"
				         ."\nFROM #__jcomments AS c"
				         ."\nWHERE c.published = 1"
			        	 ."\nAND c.name <> ''"
				         ."\nAND c.userid = 0"
				         ;
			}

			$query .= "\nGROUP BY c.userid, email, name, username, avatar, profileLink"
			         ."\nORDER BY " . $orderby
			         ;


			$db->setQuery($query, 0, $count);
			$rows = $db->loadObjectList();

			if (count($rows) && $avatar == 1) {
				require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
				JCommentsPluginHelper::importPlugin('jcomments');
				JCommentsPluginHelper::trigger('onPrepareAvatars', array(&$rows));
			}

			return $rows;
		}

		function getModuleStyles($params)
		{
		        $moduleclass_sfx = $params->get('moduleclass_sfx');
			$avatar_size = intval($params->get('avatar_size', 32));
			$showavatars = intval($params->get('avatar'));
			$showvotes = $params->get('display_votes');

			if ($avatar_size <= 0) {
				$avatar_size = 32;
			}

		        ob_start();
?>
ul.jc_top_posters<?php echo $moduleclass_sfx;?> {padding: 0; list-style-image: none; list-style-type: none;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li {background-image: none !important; list-style: none; list-style-image: none !important; margin-left: 5px !important; margin-left: 0; padding: 0 !important; display: block; overflow: hidden; line-height: 1.2em;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li div {margin: 0; padding: 5px 0 0 0;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li div .cmtcnt {font: bold 0.9em Verdana, Arial, Sans-Serif;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li.odd {background-color: #f4f4f4;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li.even {}
<?php
			if ($showvotes != '') {
?>
ul.jc_top_posters<?php echo $moduleclass_sfx;?> span.votes {font: bold 0.8em Verdana, Arial, Sans-Serif; color: #A9A9A9; margin:0;padding:0;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> span.vote-none {color: #A9A9A9;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> span.vote-good {color: #339900;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> span.vote-poor {color: #CC0000;}
<?php 
                        }

			if ($showavatars == 1) {
				if ($showvotes == '') {
?>
ul.jc_top_posters<?php echo $moduleclass_sfx;?> li {vertical-align: middle; line-height: <?php echo $avatar_size; ?>px;}
<?php
				}
?>
ul.jc_top_posters<?php echo $moduleclass_sfx;?> div {margin: 0 0 0 <?php echo $avatar_size; ?>px;}
ul.jc_top_posters<?php echo $moduleclass_sfx;?> img { width: <?php echo $avatar_size; ?>px; height: <?php echo $avatar_size; ?>px; margin: 5px;	float: left;}
<?php 
			}

			$_css = ob_get_contents();
			ob_end_clean();

			global $mainframe;
			$cacheEnabled = intval($mainframe->getCfg('caching')) == 1;

			if (JCOMMENTS_JVERSION == '1.5' && !$cacheEnabled) {
				$document = & JFactory::getDocument();
				$document->addStyleDeclaration($_css);
			} else {
				echo '<style type="text/css">' . $_css . '</style>';
			}
		}
	}

}

$rows = modJCommentsTopPostersHelper::getList($params);

if (count($rows)) {

	$showprofilelink = intval($params->get('profile_link'));
	$display_name = $params->get('display_name', 'name');
	$embeded_css = $params->get('embeded_css', 1);

	if ($embeded_css) {
		modJCommentsTopPostersHelper::getModuleStyles($params);
	}
?>
<ul class="jc_top_posters<?php echo $params->get('moduleclass_sfx'); ?>">
<?php
	$i = 0;
	foreach ($rows as $row) {
?>	
	<li class="<?php echo ($i % 2 ? 'even' : 'odd');?>">
<?php
		if (intval($params->get('avatar')) == 1) {
			if ($row->avatar == '') {
				echo '<img src="http://www.gravatar.com/avatar.php?gravatar_id='. md5(strtolower($row->email)) .'&amp;default=' . urlencode($mainframe->getCfg( 'live_site' ) . '/components/com_jcomments/images/no_avatar.png') . '&amp;size=' . $avatar_size . '"  alt="" border="0" />';
			} else {
				echo $row->avatar;
			}						
		}

		$name = $row->name;

		if ( $row->userid && $display_name == 'username' && $row->username != '' ) {
			$name = $row->username;
		}

		if ($name == '') {
			$name = JText::_('Guest');
		}
?>
		<div>
<?php
		if ($showprofilelink && $row->profileLink != '') {
?>
		<a href="<?php echo $row->profileLink; ?>"><?php echo $name; ?></a>
<?php
		} else {
			echo ' ' . $name;
		}
			
		echo '<br /><span class="cmtcnt">' . $row->cnt . '</span>';

		switch ($params->get('display_votes')) {
			case 'summary':
				$class = $row->votes > 0 ? 'vote-good' : ($row->votes < 0 ? 'vote-poor' : 'vote-none');
				$sign = $row->votes > 0 ? '+' : ($row->votes < 0 ? '-' : '');

				echo ' (<span class="votes"><span class="' . $class . '">' . $sign . $row->votes . '</span></span>)';
				break;
			case 'detail':
				echo ' (<span class="votes"><span class="vote-good">+' . $row->isgood . '</span>/<span class="vote-poor">-' . $row->ispoor . '</span></span>)';
				break;
			default:
				break;
		}
?>	
		</div>
	</li>
<?php
        	$i++;
	}
?>
</ul>
<?php
}
?>
