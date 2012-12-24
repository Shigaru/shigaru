<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted access');

// Imports

class plgSystemAcesefMetaContent extends JPlugin {

	function __construct(& $subject, $config) {
		parent::__construct($subject, $config);
		
		$factory_file = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'factory.php';

		if (file_exists($factory_file)) {
			require_once($factory_file);
			
			if (!class_exists('AceDatabase')) {
				require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'database.php');
			}
			
			require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'metadata.php');
			require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'utility.php');
			
			$this->AcesefConfig = AcesefFactory::getConfig();
		}
	}

    function onAfterDispatch() {
		if (!self::_systemCheckup(true)) {
			return;
		}
		
		$url_1 = "index.php?option=com_content";
		
		// Get item id
		$item_id = JRequest::getVar('cid');
		$item_id = (is_array($item_id)) ? $item_id[0] : $item_id;
		$url_2 = "id={$item_id}&view=article";
		$url_3 = "format=pdf";
		
		// Get row
		$url = AceDatabase::loadResult("SELECT url_sef FROM #__acesef_urls WHERE url_real LIKE '{$url_1}%' AND url_real LIKE '%{$url_2}%' AND url_real NOT LIKE '%{$url_3}%'");
		
		if ($url && !AcesefUtility::JoomFishInstalled()) {
			$row = AceDatabase::loadObject("SELECT id, url_sef, title, description, keywords, lang, robots, googlebot FROM #__acesef_metadata WHERE url_sef = '{$url}'");
			
			if (!$row) {
				$row = new stdClass();
				$row->id = 0;
				$row->url_sef = $url;
				$row->title = '';
				$row->description = '';
				$row->keywords = '';
				$row->lang = '';
				$row->robots = '';
				$row->googlebot = '';
			}
			
			$mainframe =& JFactory::getApplication();
			$mainframe->setUserState('com_acesef.metadata', $row);
			
			$language =& JFactory::getLanguage();
			$language->load('com_acesef');

			// Render output
			$output	= AcesefUtility::render(JPATH_ROOT.DS.'plugins'.DS.'system'.DS.'acesefmetacontent_tmpl.php');
			
			$document = &JFactory::getDocument();
			$document->setBuffer($document->getBuffer('component').$output, 'component');
		}
		
		return true;
    }
	
	function onAfterContentSave($article, $isNew) {
		if ($isNew) {
			return true;
		}
		
		if (!self::_systemCheckup()) {
			return true;
		}
		
		$id 			= JRequest::getInt('acesef_id');
		$url_sef 		= JRequest::getString('acesef_url_sef');
		$title 			= AcesefUtility::replaceSpecialChars(JRequest::getString('acesef_title'));
		$description 	= AcesefUtility::replaceSpecialChars(JRequest::getString('acesef_desc'));
		$keywords 		= AcesefUtility::replaceSpecialChars(JRequest::getString('acesef_key'));
		$lang 			= JRequest::getString('acesef_lang');
		$robots 		= JRequest::getString('acesef_robots');
		$googlebot 		= JRequest::getString('acesef_googlebot');
		
		if ($id == 0) {
			AceDatabase::query("INSERT IGNORE INTO #__acesef_metadata (url_sef, title, description, keywords, lang, robots, googlebot) VALUES('{$url_sef}', '{$title}', '{$description}', '{$keywords}', '{$lang}', '{$robots}', '{$googlebot}')");
		}
		else {
			AceDatabase::query("UPDATE #__acesef_metadata SET title = '{$title}', description = '{$description}', keywords = '{$keywords}', lang = '{$lang}', robots = '{$robots}', googlebot = '{$googlebot}' WHERE id = {$id}");
		}
	}
	
	function _systemCheckup($task = false) {		
		// Is backend
		$mainframe =& JFactory::getApplication();
		if (!$mainframe->isAdmin()) {
			return false;
		}

		// Joomla SEF is disabled
		$config =& JFactory::getConfig();
		if (!$config->getValue('sef')) {
			return false;
		}

		// Check if AceSEF is enabled
		if ($this->AcesefConfig->mode == 0) {
			return false;
		}
		
		// Is plugin enabled
		if (!JPluginHelper::isEnabled('system', 'acesef')) {
			return false;
		}
		
		// Is plugin enabled
		if (!JPluginHelper::isEnabled('system', 'acesefmetacontent')) {
			return false;
		}
		
		// Is com_content
		if (JRequest::getCmd('option') != 'com_content') {
			return false;
		}
		
		// Is edit page
		if ($task && JRequest::getCmd('task') != 'edit') {
			return false;
		}
		
		return true;
	}
}
?>