<?php
/**
 * JComments - Joomla Comment System
 *
 * Backend event handler
 *
 * @version 2.0
 * @package JComments
 * @subpackage Admin
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

ob_start();

global $mainframe;

// define directory separator short constant
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

// include legacy class
if (defined('JPATH_ROOT')) {
	include_once (JPATH_ROOT . DS . 'components' . DS . 'com_jcomments' . DS . 'jcomments.legacy.php');
} else {
	require_once ($mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_jcomments' . DS . 'jcomments.legacy.php');
}

if (!defined('JCOMMENTS_ENCODING')) {
	DEFINE('JCOMMENTS_ENCODING', strtolower(preg_replace('/charset=/', '', _ISO)));

	if (JCOMMENTS_ENCODING == 'utf-8') {
		// pattern strings are treated as UTF-8
		DEFINE('JCOMMENTS_PCRE_UTF8', 'u');
	} else {
		DEFINE('JCOMMENTS_PCRE_UTF8', '');
	}
}

if (JCOMMENTS_JVERSION == '1.0') {
	global $acl, $my;
	DEFINE('JCOMMENTS_INDEX', 'index2.php');

	// ensure user has access to this function
	if (!($acl->acl_check('administration', 'edit', 'users', $my->usertype, 'components', 'all') | $acl->acl_check('administration', 'edit', 'users', $my->usertype, 'components', 'com_jcomments'))) {
		require_once (JCOMMENTS_BASE . DS . 'jcomments.class.php');
		JCommentsRedirect('index2.php', _NOT_AUTH);
	}
} else {
	DEFINE('JCOMMENTS_INDEX', 'index.php');

	$acl = & JFactory::getACL();
	$option = JRequest::getCmd('option');
	$task = JRequest::getCmd('task');
	$mainframe = & JFactory::getApplication();
}

$result = ob_get_contents();
ob_end_clean();

// save PHP error reporting settings
$_error_reporting = @error_reporting(0);

require_once (JCOMMENTS_BASE . DS . 'jcomments.class.php');
require_once (JCOMMENTS_BASE . DS . 'jcomments.config.php');
require_once (JCOMMENTS_HELPERS . DS . 'object.php');
require_once (JCOMMENTS_HELPERS . DS . 'html.php');
require_once (dirname(__FILE__) . DS . 'admin.jcomments.html.php');

if ($task != 'postinstall') {
	$config = & JCommentsFactory::getConfig();
}

if (!function_exists('sefRelToAbs')){
	if (!defined('_URL_SCHEMES')) {
		$url_schemes = 'data:, file:, ftp:, gopher:, imap:, ldap:, mailto:, news:, nntp:, telnet:, javascript:, irc:, mms:';
		DEFINE( '_URL_SCHEMES', $url_schemes );
	}

	function sefRelToAbs( $string )
	{
		global $mainframe;

		if ( (strpos( $string, $mainframe->getCfg( 'live_site' ) ) !== 0) ) {
			if (strncmp($string, '/', 1) == 0) {
				$live_site_parts = array();
				eregi('^(https?:[\/]+[^\/]+)(.*$)', $mainframe->getCfg( 'live_site' ), $live_site_parts);
				$string = $live_site_parts[1] . $string;
			} else {
				$check = 1;
				$url_schemes 	= explode( ', ', _URL_SCHEMES );
				$url_schemes[] 	= 'http:';
				$url_schemes[] 	= 'https:';

				foreach ( $url_schemes as $url ) {
					if ( strpos( $string, $url ) === 0 ) {
						$check = 0;
					}
				}
				if ( $check ) {
					$string = $mainframe->getCfg( 'live_site' ) .'/'. $string;
				}
			}
		}
		return $string;
	}
}

if ($option == 'com_jcomments') {
	if (isset($_REQUEST['no_html']) && intval($_REQUEST['no_html']) == 1) {
		require_once (JCOMMENTS_BASE . DS . 'jcomments.php');
	} else {

		switch ($task) {
			case "view":
				JCommentsAdmin::show();
				break;
			case 'edit':
				JCommentsAdmin::edit();
				break;
			case 'apply':
			case 'save':
				JCommentsAdmin::save();
				break;
			case 'cancel':
				JCommentsAdmin::cancel();
				break;
			case 'publish':
				JCommentsAdmin::publish(1);
				break;
			case 'unpublish':
				JCommentsAdmin::publish(0);
				break;
			case 'remove':
				JCommentsAdmin::remove();
				break;
			case "settings":
				JCommentsAdmin::showSettings();
				break;
			case "savesettings":
				JCommentsAdmin::saveSettings();
				break;
			case "smiles":
				JCommentsAdmin::showSmiles();
				break;
			case "savesmiles":
				JCommentsAdmin::saveSmiles();
				break;
			case "about":
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.installer.php');
				JCommentsAdmin::showAbout();
				break;
			case "import":
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.migration.php');
				JCommentsMigrationTool::showImport();
				break;
			case "doimport":
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.migration.php');
				JCommentsMigrationTool::doImport($option);
				break;
			case "postinstall":
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.installer.php');
				JCommentsInstaller::postInstall();
				break;
			case 'subscriptions':
			case 'subscription.cancel':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::show();
				break;
			case 'subscription.publish':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::publish(1);
				break;
			case 'subscription.unpublish':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::publish(0);
				break;
			case 'subscription.edit':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::edit();
				break;
			case 'subscription.save':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::save();
				break;
			case 'subscription.delete':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.subcription.php');
				JCommentsAdminSubscriptionManager::remove();
				break;

			case 'custombbcode':
			case 'custombbcodes':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::show();
				break;
			case 'custombbcode.publish':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::publish(1);
				break;
			case 'custombbcode.unpublish':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::publish(0);
				break;
			case 'custombbcode.enable_button':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::enableButton(1);
				break;
			case 'custombbcode.disable_button':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::enableButton(0);
				break;
			case 'custombbcode.new':
			case 'custombbcode.edit':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::edit();
				break;
			case 'custombbcode.apply':
			case 'custombbcode.save':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::save();
				break;
			case 'custombbcode.delete':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::remove();
				break;
			case 'custombbcode.orderup':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::order(-1);
				break;
			case 'custombbcode.orderdown':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::order(1);
				break;
			case 'custombbcode.cancel':
				require_once (dirname(__FILE__) . DS . 'admin.jcomments.custombbcodes.php');
				JCommentsACustomBBCodes::cancel();
				break;

			default:
				JCommentsAdmin::show();
				break;
		}
	}
}

class JCommentsAdmin
{
	function show()
	{
		global $mainframe;

		require_once (JCOMMENTS_BASE . DS . 'jcomments.php');

		$option = JCommentsInput::getParam($_REQUEST, 'option');

		$object_group = trim($mainframe->getUserStateFromRequest("fog{$option}", 'fog', ''));
		$object_id = intval($mainframe->getUserStateFromRequest("foid{$option}", 'foid', 0));
		$flang = trim($mainframe->getUserStateFromRequest("flang{$option}", 'flang', ''));
		$fauthor = trim($mainframe->getUserStateFromRequest("fauthor{$option}", 'fauthor', ''));
		$limit = intval($mainframe->getUserStateFromRequest("view{$option}limit", 'limit', $mainframe->getCfg('list_limit')));
		$limitstart = intval($mainframe->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0));

		$db = & JCommentsFactory::getDBO();

		// load object_groups (components)
		$query = "SELECT DISTINCT(object_group) AS name, object_group AS value "
			. "\nFROM #__jcomments "
			. "\nORDER BY name"
			;
		$db->setQuery($query);
		$objectGroups = $db->loadObjectList('name');

		$cnt = count($objectGroups);

		if ($cnt == 0 || ($cnt > 0 && !in_array($object_group, array_keys($objectGroups)))) {
			$mainframe->setUserState("fog{$option}", '');
			$object_group = '';
		}

		$where = array();

		if ($object_group != '') {
			$where[] = 'c.object_group = "' . $object_group . '"';
		}

		if ($object_id != 0) {
			$where[] = 'c.object_id = ' . $object_id;
		}

		if ($flang != '') {
			$where[] = 'c.lang = "' . $flang . '"';
		}

		if (trim($fauthor) != '') {
			$where[] = 'c.name = "' . $fauthor . '"';
		}

		$query = "SELECT COUNT(*)"
			. "\nFROM #__jcomments AS c"
			. (count($where) ? ("\nWHERE " . implode(' AND ', $where)) : "" )
			;
		$db->setQuery($query);
		$total = $db->loadResult();


		if ( JCOMMENTS_JVERSION == '1.0' ) {
			require_once ($mainframe->getCfg('absolute_path') . DS . 'administrator' . DS . 'includes' . DS . 'pageNavigation.php');
			$lists['pageNav'] = new mosPageNav($total, $limitstart, $limit);
		} else {
			jimport('joomla.html.pagination');
			$lists['pageNav'] = new JPagination( $total, $limitstart, $limit );
		}

		$query = "SELECT c.*, u.name AS editor, js.id as subscription"
			. "\nFROM #__jcomments AS c"
			. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
			. "\n LEFT JOIN #__jcomments_subscriptions AS js ON js.object_id = c.object_id AND js.object_group = c.object_group AND ((c.userid > 0 AND js.userid = c.userid) OR (js.email = c.email)) AND js.lang = c.lang"
			. (count($where) ? ("\nWHERE " . implode(' AND ', $where)) : "" )
			. "\nORDER BY c.date DESC"
			;
		$db->setQuery( $query, $lists['pageNav']->limitstart, $lists['pageNav']->limit );
		$lists['rows'] = $db->loadObjectList();

		// Filter by object_group (component)
		$cnt = count($objectGroups);

		if ($cnt > 1 || ($cnt == 1 && $total = 0)) {
			array_unshift($objectGroups, JCommentsHTML::makeOption('', JText::_('A_FILTER_ALL_COMPONENTS'), 'name', 'value'));
			$lists['fog'] = JCommentsHTML::selectList($objectGroups, 'fog', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'name', 'value', $object_group);
		} else if ($cnt == 1) {
			if ($object_group == '') {
				$object_group = array_pop(array_keys($objectGroups));//  $objectGroups[0]->name;
			}
		}
		unset($objectGroups);

		if ($object_group != '') {
			$query = "SELECT DISTINCT(object_id) AS value "
				. "\nFROM #__jcomments "
				. "\nWHERE object_group = '" . $object_group . "'"
				. (($flang != '') ? "AND lang = '" . $flang . "'" : "")
				;
			$db->setQuery($query);
			$rows = $db->loadObjectList();

			for ($i = 0, $n = count($rows); $i < $n; $i++) {
				$rows[$i]->name = JCommentsObjectHelper::getTitle($rows[$i]->value, $object_group);
				if ($rows[$i]->name == '') {
					$rows[$i]->name = 'Untitled' . $rows[$i]->value;
				}
			}

			if (count($rows) > 0) {
				usort($rows, create_function('$a, $b', 'return strcasecmp( $a->name, $b->name);'));
				array_unshift($rows, JCommentsHTML::makeOption('', '', 'name', 'value'));
				$lists['foid'] = JCommentsHTML::selectList($rows, 'foid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'name', $object_id);
				unset($rows);
			}
		}

		// Filter by language
		$query = "SELECT DISTINCT(lang) AS text, lang AS value "
			. "\nFROM #__jcomments"
			. "\nORDER BY lang"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		if (count($rows) > 1) {
			array_unshift($rows, JCommentsHTML::makeOption('', '', 'text', 'value'));
			$lists['flang'] = JCommentsHTML::selectList($rows, 'flang', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'text', 'value', $flang);
		}
		unset($rows);

		// Filter by author
		$query = "SELECT DISTINCT(name) AS author, name AS value "
			. "\nFROM #__jcomments"
			. "\nORDER BY name"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		if (count($rows) > 1) {
			array_unshift($rows, JCommentsHTML::makeOption('', JText::_('A_FILTER_ALL_AUTHORS'), 'author', 'value'));
			$lists['fauthor'] = JCommentsHTML::selectList($rows, 'fauthor', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'author', 'value', $fauthor);
		}
		unset($rows);

		HTML_JComments::show($lists);
	}

	function edit()
	{
		global $my, $mainframe;

		$id = JCommentsInput::getParam($_REQUEST, 'cid', 0);
		if (is_array($id)) {
			$id = $id[0];
		}

		$db = & JCommentsFactory::getDBO();

		$row = new JCommentsDB($db);
		if ($row->load($id)) {
			$row->checkout($my->id);

			$row->comment = JCommentsText::br2nl($row->comment);
			$row->comment = htmlspecialchars($row->comment);
			$row->comment = JCommentsText::nl2br($row->comment);

			$row->comment = strip_tags(str_replace('<br />', "\n", $row->comment));
			$row->object_title = JCommentsObjectHelper::getTitle($row->object_id, $row->object_group);
			$row->link = $mainframe->getCfg('live_site') . '/' . JCOMMENTS_INDEX . '?option=com_jcomments&task=go2object&object_id=' . $row->object_id . '&object_group=' . $row->object_group . '&no_html=1';

			HTML_JComments::edit($row);
		} else {
			JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=view');
		}
	}

	function save()
	{
		$task = JCommentsInput::getParam($_REQUEST, 'task');

		$bbcode = & JCommentsFactory::getBBCode();
		$db = & JCommentsFactory::getDBO();

		$row = new JCommentsDB($db);
		$row->bind($_POST);

		if ($row->userid == 0 && $row->username != $row->name) {
			$row->username = $row->name;
		}

		// handle magic quotes compatability
		if (get_magic_quotes_gpc() == 1) {
			$row->title = stripslashes($row->title);	
			$row->comment = stripslashes($row->comment);	
		}

		$row->comment = JCommentsText::nl2br($row->comment);
		$row->comment = $bbcode->filter($row->comment);
		$row->store();
		$row->checkin();

		JCommentsCache::cleanCache('com_jcomments');
		JCommentsCache::cleanCache($row->object_group);

		switch ($task) {
			case 'apply':
				JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=edit&hidemainmenu=1&cid[]=' . $row->id);
				break;
			case 'save':
			default:
				JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=view');
				break;
		}
	}

	function publish( $publish )
	{
		$id = JCommentsInput::getParam($_REQUEST, 'cid', array());

		if (is_array($id) && (count($id) > 0)) {
			$ids = implode(',', $id);

			$db = & JCommentsFactory::getDBO();
			$db->setQuery("UPDATE #__jcomments SET published='$publish' WHERE id IN ($ids)");
			$db->query();
		}
		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=view');
	}

	function cancel()
	{
		$db = & JCommentsFactory::getDBO();

		$row = new JCommentsDB($db);
		$row->bind($_POST);
		$row->checkin();

		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=view');
	}

	function remove()
	{

		$id = JCommentsInput::getParam($_REQUEST, 'cid', array());

		if (is_array($id) && (count($id) > 0)) {
			$ids = implode(',', $id);
			$obj = null;

			$db = & JCommentsFactory::getDBO();
			$db->setQuery("SELECT DISTINCT object_group, object_id FROM #__jcomments WHERE id IN ($ids)");
			$db->loadObject($obj);

			if ($obj != null) {

				require_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'tree.php');

				$query = "SELECT id, parent" . "\nFROM #__jcomments" . "\nWHERE `object_group` = '" . $obj->object_group . "'" . "\nAND `object_id`='" . $obj->object_id . "'";

				$db->setQuery($query);
				$rows = $db->loadObjectList();

				$tree = new JoomlaTuneTree($rows);

				$descendants = array();

				foreach ($id as $cid) {
					$descendants = array_merge($descendants, $tree->descendants($cid));
				}

				$descendants = array_unique($descendants);

				if (count($descendants)) {
					$query = "DELETE FROM #__jcomments WHERE id IN (" . implode(',', $descendants) . ')';
					$db->setQuery($query);
					$db->query();

					$query = "DELETE FROM #__jcomments_votes WHERE commentid IN (" . implode(',', $descendants) . ')';
					$db->setQuery($query);
					$db->query();
				}
			}

			$db->setQuery("DELETE FROM #__jcomments WHERE id IN ($ids)");
			$db->query();

			$db->setQuery("DELETE FROM #__jcomments_votes WHERE commentid IN ($ids)");
			$db->query();
		}
		JCommentsCache::cleanCache('com_jcomments');
		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=view');
	}

	function showSmiles()
	{
		require_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'filesystem.php');
		$imageFiles = JoomlaTuneFS::readDirectory(JCOMMENTS_BASE . DS . 'images' . DS . 'smiles' . DS);

		$lists['images'] = array();
		foreach ($imageFiles as $file) {
			if (eregi("gif|jpg|png", $file)) {
				$lists['images'][] = $file;
			}
		}

		$config = & JCommentsFactory::getConfig();
		$lists['smiles'] = $config->get('smiles');

		HTML_JComments::showSmiles($lists);
	}

	function showSettings()
	{
		$db = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();

		$languages = array();

		$joomfish = JOOMLATUNE_JPATH_SITE . DS . 'components' . DS . 'com_joomfish' . DS . 'joomfish.php';

		if (is_file($joomfish))
		{
			$db = & JCommentsFactory::getDBO();
			$db->setQuery("SELECT name, `code` as value FROM #__languages WHERE active = 1");
			$languages = $db->loadObjectList();

			$lang = trim(JCommentsInput::getParam($_REQUEST, 'lang', ''));

			if ($lang == '')
			{
			 	$lang = JCommentsMultilingual::getLanguage();
			}

			// reload configuration
			$config = & JCommentsFactory::getConfig($lang);

			$lists['languages'] = JCommentsHTML::selectList( $languages, 'lang', 'class="inputbox" size="1" onchange="submitbutton(\'settings\');"', 'value', 'name', $lang );
		}

		$forbiddenNames = $config->get('forbidden_names');
		$forbiddenNames = preg_replace('#,+#', "\n", $forbiddenNames);
		$config->set('forbidden_names', $forbiddenNames);

		$badWords = $config->get('badwords');
		if ($badWords != '') {
			$config->set('badwords', implode("\n", $badWords));
		}

		require_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'filesystem.php');

		// path to images directory
		$path = JCOMMENTS_BASE.DS.'tpl'.DS;
		$items = JoomlaTuneFS::readDirectory($path);
		$templates = array();

		foreach( $items as $item ) {
			if ( is_dir( $path . $item ) ) {
			        $tpl = new StdClass;
				$tpl->text = $item;
				$tpl->value = $item;
				$templates[] = $tpl;
                	}
		}

		$currentTemplate = $config->get('template');
		$lists['templates'] = JCommentsHTML::selectList($templates, 'cfg_template', 'class="inputbox"', 'value', 'text', $currentTemplate);

		$rows = JCommentsAdmin::getAllGroups();
		$exclude = JCommentsAdmin::getHigherGroups();

		if (count($exclude)) {
			// remove users 'above' me
			$i = 0;
			while ( $i < count( $rows ) ) {
				if (in_array( $rows[$i]->group_id, $exclude ) ) {
					array_splice( $rows, $i, 1 );
				} else {
					$i++;
				}
			}
		}

		$lists['group_names'] = $rows;

		$groups = array();

		// Post
		JCommentsAdmin::loadParam( $groups, 'can_comment', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_CAN_COMMENT')
					, JText::_('AP_CAN_COMMENT_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'can_reply', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_CAN_REPLY')
					, JText::_('AP_CAN_REPLY_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'autopublish', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_AUTOPUBLISH')
					, JText::_('AP_AUTOPUBLISH_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'show_policy', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_SHOW_POLICY')
					, JText::_('AP_SHOW_POLICY_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_captcha', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_ENABLE_CAPTCHA')
					, JText::_('AP_ENABLE_CAPTCHA_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'floodprotection', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_ENABLE_FLOODPROTECTION')
					, JText::_('AP_ENABLE_FLOODPROTECTION_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_comment_length_check', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_ENABLE_COMMENT_LENGTH_CHECK')
					, JText::_('AP_ENABLE_COMMENT_LENGTH_CHECK_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_autocensor', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_ENABLE_AUTOCENSOR')
					, JText::_('AP_ENABLE_AUTOCENSOR_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_subscribe', $rows
					, JText::_('A_RIGHTS_POST')
					, JText::_('AP_ENABLE_SUBSCRIBE')
					, JText::_('AP_ENABLE_SUBSCRIBE_DESC')
					);

		// BBCodes
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_b', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_B')
					, JText::_('AP_ENABLE_BBCODE_B_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_i', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_I')
					, JText::_('AP_ENABLE_BBCODE_I_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_u', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_U')
					, JText::_('AP_ENABLE_BBCODE_U_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_s', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_S')
					, JText::_('AP_ENABLE_BBCODE_S_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_url', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_URL')
					, JText::_('AP_ENABLE_BBCODE_URL_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_img', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_IMG')
					, JText::_('AP_ENABLE_BBCODE_IMG_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_list', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_LIST')
					, JText::_('AP_ENABLE_BBCODE_LIST_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_hide', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_HIDE')
					, JText::_('AP_ENABLE_BBCODE_HIDE_DESC')
					, array('Unregistered' )
					);
		JCommentsAdmin::loadParam( $groups, 'enable_bbcode_quote', $rows
					, JText::_('A_RIGHTS_BBCODE')
					, JText::_('AP_ENABLE_BBCODE_QUOTE')
					, JText::_('AP_ENABLE_BBCODE_QUOTE_DESC')
					);


		// View
		JCommentsAdmin::loadParam( $groups, 'autolinkurls', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_ENABLE_AUTOLINKURLS')
					, JText::_('AP_ENABLE_AUTOLINKURLS_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'emailprotection', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_ENABLE_EMAILPROTECTION')
					, JText::_('AP_ENABLE_EMAILPROTECTION_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'enable_gravatar', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_ENABLE_GRAVATAR')
					, JText::_('AP_ENABLE_GRAVATAR_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'can_view_email', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_CAN_VIEW_AUTHOR_EMAIL')
					, JText::_('AP_CAN_VIEW_AUTHOR_EMAIL_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'can_view_homepage', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_CAN_VIEW_AUTHOR_HOMEPAGE')
					, JText::_('AP_CAN_VIEW_AUTHOR_HOMEPAGE_DESC')
					);
		JCommentsAdmin::loadParam( $groups, 'can_view_ip', $rows
					, JText::_('A_RIGHTS_VIEW')
					, JText::_('AP_CAN_VIEW_AUTHOR_IP')
					, JText::_('AP_CAN_VIEW_AUTHOR_IP_DESC')
					, array('Unregistered', 'Registered' )
					);


		// Edit
		JCommentsAdmin::loadParam( $groups, 'can_edit_own', $rows
					, JText::_('A_RIGHTS_EDIT')
					, JText::_('AP_CAN_EDIT_OWN')
					, JText::_('AP_CAN_EDIT_OWN_DESC')
					, array('Unregistered' )
					);
		JCommentsAdmin::loadParam( $groups, 'can_delete_own', $rows
					, JText::_('A_RIGHTS_EDIT')
					, JText::_('AP_CAN_DELETE_OWN')
					, JText::_('AP_CAN_DELETE_OWN_DESC')
					, array('Unregistered' )
					);

		// Administration
		JCommentsAdmin::loadParam( $groups, 'can_edit', $rows
					, JText::_('A_RIGHTS_ADMINISTRATION')
					, JText::_('AP_CAN_EDIT')
					, JText::_('AP_CAN_EDIT_DESC')
					, array('Unregistered', 'Registered' )
					);
		JCommentsAdmin::loadParam( $groups, 'can_publish', $rows
					, JText::_('A_RIGHTS_ADMINISTRATION')
					, JText::_('AP_CAN_PUBLISH')
					, JText::_('AP_CAN_PUBLISH_DESC')
					, array('Unregistered', 'Registered' )
					);
		JCommentsAdmin::loadParam( $groups, 'can_delete', $rows
					, JText::_('A_RIGHTS_ADMINISTRATION')
					, JText::_('AP_CAN_DELETE')
					, JText::_('AP_CAN_DELETE_DESC')
					, array('Unregistered', 'Registered' )
					);

		// Votes
		JCommentsAdmin::loadParam( $groups, 'can_vote', $rows
					, JText::_('A_RIGHTS_MISC')
					, JText::_('AP_CAN_VOTE')
					, JText::_('AP_CAN_VOTE_DESC')
					);

		$lists['groups'] =& $groups;


		if ($config->get('enable_categories') != '') {
			$query = "SELECT c.id AS `value`, CONCAT_WS( ' / ', s.title, c.title) AS `text`"
				. "\n FROM #__sections AS s"
				. "\n INNER JOIN #__categories AS c ON c.section = s.id"
				. "\n WHERE c.id IN ( " . $config->get('enable_categories') . " )"
				. "\n ORDER BY s.name,c.name"
				;
			$db->setQuery( $query );
			$lookup = $db->loadObjectList();
		} else {
			$lookup = '';
		}

		$query = "SELECT c.id AS `value`, CONCAT_WS( ' / ', s.title, c.title) AS `text`"
			. "\n FROM #__sections AS s"
			. "\n INNER JOIN #__categories AS c ON c.section = s.id"
			. "\n ORDER BY s.name,c.name"
			;
		$db->setQuery( $query );
		$lists['categories'] = JCommentsHTML::selectList($db->loadObjectList(), 'cfg_enable_categories[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $lookup);

		HTML_JComments::showSettings($lists);
	}

	function getAllGroups()
	{
		global $acl;

		$unregistred = new stdClass();
		$unregistred->value = 'Unregistered';
		$unregistred->text = JText::_('Unregistered');
		$unregistred->group_id = -1;

		$rows[] = $unregistred;

		if (JCOMMENTS_JVERSION == '1.0') {
			$front_users = $acl->_getBelow('#__core_acl_aro_groups', 'g1.name as value, g1.name as text, g1.group_id', 'g1.name', null, 'Public Frontend', false);
			$backend_users = $acl->_getBelow('#__core_acl_aro_groups', 'g1.name as value, g1.name as text, g1.group_id', 'g1.name', null, 'Public Backend', false);
			$rows = array_merge((array) $rows, (array) $front_users);
			$rows = array_merge((array) $rows, (array) $backend_users);
		} else {
			$auth = JFactory::getACL();

			$front_users = $auth->_getBelow('#__core_acl_aro_groups', 'g1.name as value, g1.name as text', 'g1.name', null, 'Public Frontend', true);
			array_shift($front_users);

			$backend_users = $auth->_getBelow('#__core_acl_aro_groups', 'g1.name as value, g1.name as text', 'g1.name', null, 'Public Backend', true);
			array_shift($backend_users);

			$rows = array_merge((array) $rows, (array) $front_users);
			$rows = array_merge((array) $rows, (array) $backend_users);
		}

		return $rows;
	}

	function getHigherGroups()
	{
		global $my, $acl;

		if (JCOMMENTS_JVERSION == '1.0') {
			// ensure user can't add group higher than themselves
			$my_groups = $acl->get_object_groups('users', $my->id, 'ARO');
			if (is_array($my_groups) && count($my_groups) > 0) {
				$ex_groups = $acl->get_group_children($my_groups[0], 'ARO', 'RECURSE');
			} else {
				$ex_groups = array();
			}
		} else {
			$ex_groups = array();
		}
		return $ex_groups;
	}

	function loadParam( &$plist, $name, $groups, $pgroup, $label, $note, $exclude = array() )
	{
		$config = & JCommentsFactory::getConfig();

		$params = explode(",", $config->get($name));
		$lkeys = array_keys($plist);

		for ($i = 0; $i < count($groups); $i++) {
			$group = $groups[$i]->value;
			$value = 0;

			if (in_array($group, $params)) {
				$value = 1;
			}
			if (in_array($group, $exclude)) {
				$value = -1;
			}
			if (!in_array($group, $lkeys)) {
				$plist[$group] = array();
			}
			if (!in_array($pgroup, array_keys($plist[$group]))) {
				$plist[$group][$pgroup] = array();
			}

			$param['name'] = $name;
			$param['label'] = $label;
			$param['note'] = $note;
			$param['value'] = $value;
			$param['group'] = $group;
			$plist[$group][$pgroup][] = $param;
		}
	}

	function getGroupsList( $name, $label, $note, $groups, $params, $exclude = array() ){

		$result['name'] = $name;
		$result['label'] = $label;
		$result['note'] = $note;
		$result['groups'] = array();

		for ( $i=0; $i < count( $groups ); $i++ ) {
			$group = $groups[$i]->value;
			if (in_array( $group, $params ) ) {
				$result['groups'][$group] = 1;
			} else {
				$result['groups'][$group] = 0;
			}
			if (in_array( $group, $exclude ) ) {
				$result['groups'][$group] = -1;
			}
		}
		return $result;
	}

	function saveSmiles()
	{
	        global $mainframe;

		$db = & JCommentsFactory::getDBO();

		$smile_codes = JCommentsInput::getParam($_REQUEST, 'cfg_smile_codes', array());
		$smile_images = JCommentsInput::getParam($_REQUEST, 'cfg_smile_images', array());

		$smilesValues = array();

		foreach ($smile_codes as $k => $code) {
			$image = $smile_images[$k];

			if ($code != '') {
				$smilesValues[] = $code . "\t" . $image;
			}
		}

		$values = count($smilesValues) ? implode("\n", $smilesValues) : '';

	   	$db->setQuery( "SELECT name FROM #__jcomments_settings WHERE component=''" );
	   	$dbParams = $db->loadResultArray();

		if (in_array( 'smiles', $dbParams)) {
			$query = "UPDATE #__jcomments_settings SET `value` = '" . $values . "' WHERE `name` = 'smiles'";
		} else {
			$query = "INSERT INTO #__jcomments_settings SET `value` = '" . $values . "', `name` = 'smiles'";
		}
		$db->setQuery($query);
		$db->query();

		$message = JText::_('AE_SETTINGS_SAVED');

		// Clean all caches for components with comments
		if ($mainframe->getCfg('caching') == 1) {
			$db->setQuery("SELECT DISTINCT(object_group) AS name FROM #__jcomments");
			$rows = $db->loadObjectList();

			foreach ($rows as $row) {
				JCommentsCache::cleanCache($row->name);
			}
			unset($rows);
		}
		JCommentsCache::cleanCache( 'com_jcomments' );

		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=smiles', $message );
	}

	function saveSettings()
	{
		global $mainframe;

		$db = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();

		$lang = '';

		$joomfish = JOOMLATUNE_JPATH_SITE . DS . 'components' . DS . 'com_joomfish' . DS . 'joomfish.php';

		if (is_file($joomfish)) {
			$lang = trim(JCommentsInput::getParam($_REQUEST, 'lang', ''));

			if ($lang == '') {
			 	$lang = JCommentsMultilingual::getLanguage();
			}

			// reload configuration
			JCommentsFactory::getConfig($lang);
		}

		$groups = JCommentsAdmin::getAllGroups();
		$exclude = JCommentsAdmin::getHigherGroups();

		if (count($exclude)) {
			// left all users 'above' me
			$i = 0;
			while ( $i < count( $groups ) ) {
				if ( !in_array( $groups[$i]->group_id, $exclude ) ) {
					array_splice( $groups, $i, 1 );
				} else {
					$i++;
				}
			}
		}
		$c_params = $config->getKeys();
		$p_params = array_keys($_POST);
		$i_params = array('smiles', 'merge_time', 'gzip_js', 'gzip_css', 'use_plural_forms', 'load_cached_comments', 'enable_geshi');

		foreach ($c_params as $param) {
			if ((!in_array('cfg_' . $param, $p_params)) && (!in_array($param, $i_params))) {
				$_POST['cfg_' . $param] = '';
			}
		}

		$db->setQuery("SELECT name FROM #__jcomments_settings WHERE component=''" . ($lang != '' ? " AND lang ='$lang'" : ''));
		$dbParams = $db->loadResultArray();

		$query = 'SELECT * FROM #__jcomments_settings WHERE name IN ("' . implode('", "', $i_params) . '")';
		$db->setQuery($query);
		$systemVars = $db->loadObjectList('name');

		foreach ($i_params as $p) {
			if (!in_array($p, $dbParams)) {
				if (isset($systemVars[$p])) {
					$_POST['cfg_' . $p] = $systemVars[$p]->value;
				}
			}
		}

		foreach ($_POST as $k=>$v) {
			if (strpos( $k, 'cfg_' ) === 0 ) {
				$paramName = substr($k, 4);
				if (($paramName == 'smile_codes') || ($paramName == 'smile_images')) {
					continue;
				}

				if (is_array($v)) {
					$config->set($paramName, '');

					foreach ($groups as $group) {
						if (strpos($config->get($paramName), $group->value) !== false) {
							$v[] = $group->text;
						}
					}
					$v = implode(',', $v);
				}

				if (!get_magic_quotes_gpc()) {
					$v = addslashes($v);
				}

				if ($paramName == 'forbidden_names') {
					$v = preg_replace("#[\n|\r]+#", ',', $v);
					$v = preg_replace("#,+#", ',', $v);
				} else if ($paramName == 'badwords') {
					$v = preg_replace('#[\s|\,]+#i', "\n", $v);
					$v = preg_replace('#[\n|\r]+#i', "\n", $v);
				}

				$v = trim($v);
				$config->set($paramName, $v);

				if (in_array($paramName, $dbParams)) {
					$query = "UPDATE #__jcomments_settings"
						. "\n SET `value` = '" . $v . "'"
						. "\n WHERE `name` = '" . $paramName . "'"
						. ($lang != '' ? " AND `lang` = '$lang'" : '' )
						;
				} else {
					$query = "INSERT INTO #__jcomments_settings"
						. "\n SET `value` = '" . $v . "'"
						. "\n , `name` = '" . $paramName . "'"
						. ($lang != '' ? " , `lang` = '$lang'" : '' )
						;
				}

				$db->setQuery($query);
				$db->query();
			}
	   	}

		$message = JText::_('AE_SETTINGS_SAVED');

		// Clean all caches for components with comments
		if ($mainframe->getCfg('caching') == 1) {
			$db->setQuery("SELECT DISTINCT(object_group) AS name FROM #__jcomments");
			$rows = $db->loadObjectList();

			foreach ($rows as $row) {
				JCommentsCache::cleanCache($row->name);
			}
			unset($rows);
		}
		JCommentsCache::cleanCache( 'com_jcomments' );


		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=settings' . ($lang != '' ? "&lang=$lang" : ''), $message);
	}

	function showAbout()
	{
		HTML_JComments::showAbout();
	}
}

// restore PHP error reporting settings
@error_reporting( $_error_reporting);
?>