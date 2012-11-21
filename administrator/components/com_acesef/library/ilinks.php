<?php
/**
* @version		1.5.0
* @package		AceSEF Library
* @subpackage	Ilinks
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Internal Links class
class AcesefIlinks {
	
	function __construct() {
		// Get config object
		$this->AcesefConfig = AcesefFactory::getConfig();
	}
	
	function plugin(&$text, $ext_params, $area, $component) {
		if (strlen($this->AcesefConfig->download_id) != 32) {
			return;
		}
		
		$mainframe =& JFactory::getApplication();
		$real_url = $mainframe->get('acesef.url.real');
		$sef_url = $mainframe->get('acesef.url.sef');
		$params = $mainframe->get('acesef.url.params');
		
		// Apply check-up
		if (!AcesefUtility::_multilayeredCheckup("ilinks", $text, $ext_params, $area, $params, $component, $real_url)) {
			return;
		}
		
		
		$ilinks = AcesefCache::getInternalLinks();
		if (is_array($ilinks) && !empty($ilinks)) {
			// Get SEF URL
			$mainframe =& JFactory::getApplication();
			$sef_url = $mainframe->get('acesef.url.sef');

			$url_db = AcesefCache::checkURL($sef_url, true);
			if (is_object($url_db) && (AcesefUtility::getParam($url_db->params, 'ilinks') == 1)) {
				foreach ($ilinks as $i => $object) {
					if (empty($object->ilimit)) {
						$object->ilimit = $this->AcesefConfig->ilinks_limit;
					}
					self::_convertToLink($text, $object->word, $object->link, $object->nofollow, $object->iblank, $object->ilimit);
				}
			}
		}
    }
	
	// Convert text to links
	function _convertToLink(&$text, $word, $link, $nofollow, $blank, $limit) {
		if (strlen($this->AcesefConfig->download_id) != 32) {
			return;
		}
		
		if ($nofollow == 0) {
			$nofollow = '';
		} else {
			$nofollow = ' rel="nofollow"';
		}
		
		if ($blank == 0) {
			$target = '';
		} else {
			$target = ' target="_blank"';
		}
		
		$domain = AcesefURI::getDomain();
		
		if (strpos($link, 'http') !== 0) {
			$ext_img = "";
			$link = $domain.$link;
		} else {
			$ext_img = '&nbsp;<img src="'.$domain.'/administrator/components/com_acesef/assets/images/icon-10-external.png"/>';
		}
		
		$replace = '<a href="'.$link.'"'.$target.' title="'.$word.'"'.$nofollow.'>'.$word.$ext_img.'</a>';

		if ($this->AcesefConfig->ilinks_case == '1') {
			$regEx = '\'(?!((<.*?)|(<a.*?)))(\b'.$word.'\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'s';
		} else {
			$regEx = '\'(?!((<.*?)|(<a.*?)))(\b'.$word.'\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'si';
		}
		
		$text = preg_replace($regEx, $replace, $text, $limit);
	}
}