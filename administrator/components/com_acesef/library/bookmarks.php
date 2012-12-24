<?php
/**
* @version		1.5.0
* @package		AceSEF Library
* @subpackage	Bookmarks
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Social Bookmarks class
class AcesefBookmarks {
	
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
		if (!AcesefUtility::_multiLayeredCheckup("bookmarks", $text, $ext_params, $area, $params, $component, $real_url)) {
			return;
		}
		
		// Get bookmarks
		$bookmarks = AcesefCache::getBookmarks();
		if (is_array($bookmarks) && !empty($bookmarks)) {
			// Get domain
			$domain = AcesefURI::getDomain();
			
			$url = $domain.$sef_url;
			
			$uri = JFactory::getURI();
			$query = $uri->getQuery();
			if (!empty($query)) {
				$url = $url.'?'.$query;
			}
			
			$metadata = AcesefCache::checkMetadata($sef_url);
			if (!is_object($metadata)) {
				return;
			}
			
			$metatitle = $metadata->title;
			$metadesc = $metadata->description;
			
			// Build html
			$icon = '';
			$line = 1;
			foreach ($bookmarks as $i => $bookmark) {
				if (!empty($bookmark->html)) {
					if ($bookmark->btype == 'badge' || $bookmark->btype == 'iconset')	{
						if ($bookmark->btype == 'badge') {
							$replace = self::_replaceBookmarksParams($bookmark->html, $url, $metatitle, $metadesc, true);
						} else {
							$replace = self::_replaceBookmarksParams($bookmark->html, $url, $metatitle, $metadesc);
						}
						$text = str_replace($bookmark->placeholder, $replace, $text);
					}
					elseif ($bookmark->btype == 'icon') {
						$icon .= $bookmark->html;
						if ($line == $this->AcesefConfig->bookmarks_icons_line) {
							$icon .= '<br />';
							$line = 0;
						}
						$line++;
					}
				}
			}
			
			if ($icon) {
				$replace = self::_replaceBookmarksParams($icon, $url, $metatitle, $metadesc);
				$replace = $this->AcesefConfig->bookmarks_icons_txt . $replace;
				$position = self::_iconsPosition($ext_params->get('bookmarks_icons_pos', 'global'));
				if ($position == 1) {
					$text = $replace.'<br />'.$text;
				} elseif ($position == 2) {
					$text = $text.'<br />'.$replace.'<br /><br />';
				} elseif ($position == 3) {
					$text = str_replace('{acesef icon}', $replace, $text);
				}
			}
		}
	}
	
	// Replace
	function _replaceBookmarksParams($text, $url, $title, $desc, $badge = false) {
		if (strlen($this->AcesefConfig->download_id) != 32) {
			return;
		}
		
		if ($badge) {
			$text = str_replace('*acesef*url_encoded*', str_replace("'", "", self::_encodeText($url)), $text);
			$text = str_replace('*acesef*title_encoded*', str_replace("'", "", self::_encodeText($title)), $text);
			$text = str_replace('*acesef*description_encoded*', str_replace("'", "", self::_encodeText($desc)), $text);
		} else {
			$text = str_replace('*acesef*url_encoded*', "' + encodeURIComponent('". str_replace("'", "", $url) ."') + '", $text);
			$text = str_replace('*acesef*title_encoded*', "' + encodeURIComponent('". str_replace("'", "", $title) ."') + '", $text);
			$text = str_replace('*acesef*description_encoded*', "' + encodeURIComponent('". str_replace("'", "", $desc) ."') + '", $text);
		}
	
		$text = str_replace('*acesef*url*', str_replace("'", "", $url), $text);
		$text = str_replace('*acesef*title*', str_replace("'", "", $title), $text);
		$text = str_replace('*acesef*description*', str_replace("'", "", $desc), $text);
		$text = str_replace('*acesef*imageDirectory*', JURI::base().'components/com_acesef/assets/images/bookmarks', $text);
		$text = str_replace('*acesef*bgcolor*', '#ffffff', $text);
		$text = str_replace('*acesef*addThisPubId*', $this->AcesefConfig->bookmarks_addthis, $text);
		$text = str_replace('*acesef*TellAFriendId*', $this->AcesefConfig->bookmarks_taf, $text);
		$text = str_replace('*acesef*twitterAccount*', $this->AcesefConfig->bookmarks_twitter, $text);
		$text = str_replace('*acesef*sitename*', htmlspecialchars(JFactory::getConfig()->getValue('config.sitename')), $text);
		$text = str_replace('*acesef*domain*', htmlspecialchars(JURI::root()), $text);
		
		return $text;
	}
	
	function _iconsPosition($param) {
		if ($param == 'global') {
            return $this->AcesefConfig->bookmarks_icons_pos;
        }
		else {
            return $param;
        }
    }
	
	function _encodeText(&$text) {
		$text = urlencode(htmlentities($text));
	}
}