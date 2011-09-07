<?php
/**
 * JComments - Joomla Comment System
 *
 * Core classes
 *
 * @version 2.0
 * @package JComments
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
// define directory separator short constant
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

require_once (JCOMMENTS_BASE . DS . 'jcomments.legacy.php');
require_once (JCOMMENTS_HELPERS . DS . 'object.php');
ob_end_clean();

/**
 * Comments table
 *
 */
class JCommentsDB extends JoomlaTuneDBTable
{
	/** @var int Primary key */
	var $id = null;
	/** @var int */
	var $object_id = null;
	/** @var string */
	var $object_group = null;
	/** @var string */
	var $object_params = null;
	/** @var string */
	var $lang = null;
	/** @var int */
	var $userid = null;
	/** @var string */
	var $name = null;
	/** @var string */
	var $username = null;
	/** @var string */
	var $title = null;
	/** @var string */
	var $comment = null;
	/** @var string */
	var $email = null;
	/** @var string */
	var $homepage = null;
	/** @var datetime */
	var $date = null;
	/** @var string */
	var $ip = null;
	/** @var int */
	var $isgood = null;
	/** @var int */
	var $ispoor = null;
	/** @var boolean */
	var $published = null;
	/** @var boolean */
	var $subscribe = null;
	/** @var string */
	var $source = null;
	/** @var boolean */
	var $checked_out = 0;
	/** @var datetime */
	var $checked_out_time = 0;
	/** @var string */
	var $editor = '';

	/**
	* @param database A database connector object
	* @access public
	* @return object JCommentsDB
	*/
	function JCommentsDB( &$db ) {
		$this->JoomlaTuneDBTable('#__jcomments', 'id', $db);
	}
}

class JCommentsCustomBBCodeDB extends JoomlaTuneDBTable
{
	/** @var int Primary key */
	var $id = null;
	/** @var string */
	var $name = null;
	/** @var string */
	var $pattern = null;
	/** @var string */
	var $replacement_html = null;
	/** @var string */
	var $replacement_text = null;
	/** @var string */
	var $simple_pattern = null;
	/** @var string */
	var $simple_replacement_html = null;
	/** @var string */
	var $simple_replacement_text = null;
	/** @var string */
	var $button_acl = null;
	/** @var string */
	var $button_open_tag = null;
	/** @var string */
	var $button_close_tag = null;
	/** @var string */
	var $button_title = null;
	/** @var string */
	var $button_prompt = null;
	/** @var string */
	var $button_image = null;
	/** @var string */
	var $button_css = null;
	/** @var boolean */
	var $button_enabled = null;
	/** @var int */
	var $ordering = null;
	/** @var boolean */
	var $published = null;

	/**
	* @param database A database connector object
	* @access public
	* @return object JCommentsCustomBBCodeDB
	*/
	function JCommentsCustomBBCodeDB( &$db ) {
		$this->JoomlaTuneDBTable('#__jcomments_custom_bbcodes', 'id', $db);
	}
}

class JCommentsBaseACL
{
	function check( $str )
	{
		global $my;

		if (isset($str)) {

			if (!isset($my)) {
				$my = & JCommentsFactory::getUser();
			}

			$list = explode(',', $str);

			if (isset($my->groups)) {
				if (array_intersect($my->groups, $list)) {
					return 1;		
				}
			}

			for ($i = 0, $n = count($list); $i < $n; $i++) {
				if (($my->id != 0) && ($my->usertype == $list[$i])) {
					return 1;
				} else if (($my->id == 0) && ($list[$i] == 'Unregistered')) {
					return 1;
				}
			}
		}
		return 0;
	}
}

class JCommentsACL extends JCommentsBaseACL
{
	var $canDelete		= 0;
	var $canDeleteOwn	= 0;
	var $canEdit		= 0;
	var $canEditOwn		= 0;
	var $canPublish		= 0;
	var $canViewIP		= 0;
	var $canViewEmail	= 0;
	var $canViewHomepage	= 0;
	var $canComment		= 0;
	var $canQuote		= 0;
	var $canReply		= 0;
	var $canVote		= 0;
	var $userID		= 0;
	var $userIP		= 0;

	function JCommentsACL() {
		global $my, $mainframe;

		if (!isset($my)) {
			$my = $mainframe->getUser();
		}
		
		$config = & JCommentsFactory::getConfig();

		$this->canDelete	= $this->check('can_delete');
		$this->canDeleteOwn	= $this->check('can_delete_own');
		$this->canEdit		= $this->check('can_edit');
		$this->canEditOwn	= $this->check('can_edit_own');
		$this->canPublish	= $this->check('can_publish');
		$this->canViewIP	= $this->check('can_view_ip');
		$this->canViewEmail	= $this->check('can_view_email');
		$this->canViewHomepage	= $this->check('can_view_homepage');
		$this->canComment	= $this->check('can_comment');
		$this->canVote		= $this->check('can_vote');
		$this->canQuote		= intval($this->canComment && $this->check('enable_bbcode_quote'));
		$this->canReply		= intval($this->canComment && $this->check('can_reply') && $config->get('template_view') == 'tree');

		$this->userID		= (int) $my->id;
		$this->userIP		= $_SERVER['REMOTE_ADDR'];// getenv('REMOTE_ADDR');
	}

	function check( $str )
	{
		$config = & JCommentsFactory::getConfig();
	        return JCommentsBaseACL::check($config->get($str));
	}

	function getUserIP()
	{
		return $this->userIP;
	}

	function getUserId()
	{
		return $this->userID;
	}

	function isLocked($obj)
	{
		if (isset($obj) && ($obj!=null)) {
			return ($obj->checked_out && $obj->checked_out != $this->userID) ? 1 : 0;
		}
		return 0;
	}

	function canDelete($obj)
	{
		return (($this->canDelete || ($this->canDeleteOwn && ($obj->userid == $this->userID)))
			&& (!$this->isLocked($obj))) ? 1 : 0;
	}

	function canEdit($obj)
	{
		return (($this->canEdit || ($this->canEditOwn && ($obj->userid == $this->userID)))
			&& (!$this->isLocked($obj))) ? 1 : 0;
	}

	function canPublish($obj=null)
	{
		return ($this->canPublish && (!$this->isLocked($obj))) ? 1 : 0;
	}

	function canViewIP($obj=null)
	{
		if (is_null($obj)) {
			return ($this->canViewIP) ? 1 : 0;
		} else {
			return ($this->canViewIP&&($obj->ip!='')) ? 1 : 0;
		}
	}

	function canViewEmail($obj=null)
	{
		if (is_null($obj)) {
			return ($this->canViewEmail) ? 1 : 0;
		} else {
			return ($this->canViewEmail&&($obj->email!='')) ? 1 : 0;
		}
	}

	function canViewHomepage($obj=null)
	{
		if (is_null($obj)) {
			return ($this->canViewHomepage) ? 1 : 0;
		} else {
			return ($this->canViewHomepage&&($obj->homepage!='')) ? 1 : 0;
		}
	}

	function canComment()
	{
		return $this->canComment;
	}

	function canQuote($obj=null)
	{
		if (is_null($obj)) {
			return $this->canQuote;
		} else {
			return ($this->canQuote&&(!isset($obj->_disable_quote))) ? 1 : 0;
		}
	}

	function canReply($obj=null)
	{
		if (is_null($obj)) {
			return $this->canReply;
		} else {
			return ($this->canReply&&(!isset($obj->_disable_reply))) ? 1 : 0;
		}
	}

	function canVote($obj)
	{
		if ($this->userID) {
			return ($this->canVote && $obj->userid != $this->userID && !isset($obj->voted));
		} else {
			return ($this->canVote && $obj->ip != $this->userIP && !isset($obj->voted));
		}

	}

	function canModerate($obj) {
		return $this->canEdit($obj) || $this->canDelete($obj)
			|| $this->canPublish($obj) || $this->canViewIP($obj);
	}
}

function jc_compare($a, $b) {
	if (strlen($a) == strlen($b)) {
		return 0;
	}
	return (strlen($a) > strlen($b)) ? -1 : 1;
}

class JCommentsSmiles
{
	var $_smiles = array();

	function JCommentsSmiles()
	{
		global $mainframe;

		if (count($this->_smiles) == 0) {
			$config = & JCommentsFactory::getConfig();
			$list = (array) $config->get('smiles');
			uksort($list, 'jc_compare');
			
			foreach ($list as $sc=>$si) {
				$this->_smiles['code'][] = "#(^|\s|\n|\r)".preg_quote( $sc, '#' ) . "(\s|\n|\r|$)#ism" . JCOMMENTS_PCRE_UTF8;
				$this->_smiles['icon'][] = '\\1<img src="' . $mainframe->getCfg( 'live_site' ) . '/components/com_jcomments/images/smiles/' . $si . '" border="0" alt="" />\\2';
			}
		}
	}

	function get()
	{
		return $this->_smiles;
	}

	function replace($str)
	{
		if (count($this->_smiles) == 0) {
			return $str;
		}

		$str = JCommentsText::br2nl($str);
		$str = preg_replace($this->_smiles['code'], $this->_smiles['icon'], $str);
		$str = JCommentsText::nl2br($str);

		return $str;
	}

	function strip($str)
	{
		if (count($this->_smiles) == 0) {
			return $str;
		}

		$str = JCommentsText::br2nl($str);
		$str = preg_replace($this->_smiles['code'], '\\1\\2', $str);
		$str = JCommentsText::nl2br($str);

		return $str;
	}
}

/**
 * Base class
 * 
 */
class JCommentsPlugin
{
	/**
	 * Return the title of an object by given identifier.
	 *
	 * @abstract
	 * @access public 
	 * @param int $id A object identifier. 
	 * @return string Object title 
	 */
	function getObjectTitle( $id )
	{
		global $mainframe;
		return $mainframe->getCfg('sitename');
	}

	/**
	 * Return the URI to object by given identifier.
	 *
	 * @abstract 
	 * @access public 
	 * @param int $id A object identifier. 
	 * @return string URI of an object 
	 */
	function getObjectLink( $id )
	{
		global $mainframe;
		return $mainframe->getCfg('live_site');
	}

	/**
	 * Return identifier of the object owner.
	 *
	 * @abstract 
	 * @access public 
	 * @param int $id A object identifier. 
	 * @return int Identifier of the object owner, otherwise -1 
	 */
	function getObjectOwner( $id )
	{
		return -1;
	}

	/**
	 * Return titles for objects by given identifiers.
	 *
	 * @abstract
	 * @access public 
	 * @param array $ids A object identifier. 
	 * @return array titles
	 */
	function getTitles( $ids )
	{
		return array();
	}

	function getCategories( $filter = '' )
	{
		return array();
	}

	function getItemid( $object_group )
	{
		static $cache;
		
		if (!isset($cache)) {
			$cache = array();
		}
		
		$v = 'jc_' . $object_group . '_itemid';

		if (!isset($cache[$v])) {
			if (JCOMMENTS_JVERSION == '1.5') {
				require_once(JPATH_SITE . DS . 'includes' . DS . 'application.php');
				$component = & JComponentHelper::getComponent($object_group);
				$menus = & JSite::getMenu();
				$items = $menus->getItems('componentid', $component->id);
				$cache[$v] = (count($items)) ? $items[0]->id : 0;
				unset($items);
			} else {
				$dbo = & JCommentsFactory::getDBO();
				$dbo->setQuery("SELECT id FROM `#__menu` WHERE link LIKE '%" . $object_group . "%' AND published=1");
				$cache[$v] = (int) $dbo->loadResult();
			}
		}
		return $cache[$v];
	}
}

class JCommentsPluginLoader
{
	/**
	 * Deprecated, use JCommentsObjectHelper::getTitle() instead.
	 * 
	 * @deprecated As of version 2.0.0
	 * @see  JCommentsObjectHelper::getTitle()
	 */
	function getObjectTitle( $object_id, $object_group = 'com_content' )
	{
		return JCommentsObjectHelper::getTitle($object_id, $object_group);
	}
	
	/**
	 * Deprecated, use JCommentsObjectHelper::getLink() instead.
	 * 
	 * @deprecated As of version 2.0.0
	 * @see  JCommentsObjectHelper::getLink()
	 */
	function getObjectLink( $object_id, $object_group = 'com_content')
	{
		return JCommentsObjectHelper::getLink($object_id, $object_group);
	}

	/**
	 * Deprecated, use JCommentsObjectHelper::getOwner() instead.
	 * 
	 * @deprecated As of version 2.0.0
	 * @see  JCommentsObjectHelper::getOwner()
	 * @return int
	 */
	function getObjectOwner( $object_id, $object_group = 'com_content' )
	{
		return JCommentsObjectHelper::getOwner($object_id, $object_group);
	}
}

class JCommentsText
{
	function replaceJavaScript( $text )
	{
		static $patterns, $replacements;

		ob_start();
		
		if (empty($patterns)) {
			$patterns[] = '/javascript/i';
			$replacements[] = 'j&#097;v&#097;script';
			$patterns[] = '/alert/i';
			$replacements[] = '&#097;lert';
			$patterns[] = '/about:/i';
			$replacements[] = '&#097;bout:';
			$patterns[] = '/onmouseover/i';
			$replacements[] = '&#111;nmouseover';
			$patterns[] = '/onmouseout/i';
			$replacements[] = '&#111;nmouseout';
			$patterns[] = '/onclick/i';
			$replacements[] = '&#111;nclick';
			$patterns[] = '/onload/i';
			$replacements[] = '&#111;nload';
			$patterns[] = '/onsubmit/i';
			$replacements[] = '&#111;nsubmit';
		}
		
		$text = preg_replace($patterns, $replacements, $text);
		
		ob_end_clean();

		return $text;
	}

	function replaceSpecial( $text )
	{
		static $patterns, $replacements;  
		ob_start();
		
		if (empty($patterns)) {
			$patterns = array();
			$replacements = array();
		
			$patterns[] = '#(<br\s?\/?\>){3,}#is';
			$replacements[] = '<br />';

			$patterns[] = '#(^|\D)1\/4#is';
			$replacements[] = '\\1&frac14;';
			$patterns[] = '#(^|\D)1\/2#is';
			$replacements[] = '\\1&frac12;';
			$patterns[] = '#(^|\D)3\/4#is';
			$replacements[] = '\\1&frac34;';
		
			$patterns[] = '#\(c\)#is';
			$replacements[] = '&copy;';
			$patterns[] = '#\(tm\)#is';
			$replacements[] = '&trade;';
			$patterns[] = '#\(r\)#is';
			$replacements[] = '&reg;';
			$patterns[] = '#\.{3,}#is';
			$replacements[] = '&hellip;';
		
			$patterns[] = '#\+\/\-#is';
			$replacements[] = '&plusmn;';
			$patterns[] = '#\-{2}#is';
			$replacements[] = '&mdash;';
			$patterns[] = '#\\\\#is';
			$replacements[] = '&#92;';
		}
		
		$text = preg_replace($patterns, $replacements, $text);

		ob_end_clean();

		return $text;
	}

	function formatDate( $date = 'now', $format = null, $offset = null )
	{
		if ($format == 'DATETIME_FORMAT') {
			$format = null;
		}

		if (JCOMMENTS_JVERSION == '1.5') {
			if (empty($format)) {
				$format = JText::_('DATE_FORMAT_LC1');
			}
			return JHTML::_('date', $date, $format, $offset);
		}

		if (!is_string($date)) {
			$date = strftime($format, $date);
		}

		return mosFormatDate($date, $format, $offset);
	}

	function nl2br( $text )
	{
		$text = preg_replace(array('/\r/', '/^\n+/', '/\n+$/'), '', $text);
		$text = str_replace("\n", '<br />', $text);
		return $text;
	}

	function br2nl( $text )
	{
		return str_replace('<br />', "\n", $text);
	}

	function fixLongWords( $text, $maxlength )
	{
		$maxLength = (int) min(65535, $maxlength);

		if ($maxLength > 5) {
			ob_start();
			if (!empty($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false) {
				$breaker = '<span style="margin: 0 -0.65ex 0 -1px;padding:0;"> </span>';
			} else {
				$breaker = '<span style="font-size:0px;padding:0;margin:0;"> </span>';
			}

			$plainText = $text;
			$plainText = preg_replace('#<img[^\>]+/>#isU', '', $plainText);
			$plainText = preg_replace('#<a.*?>(.*?)</a>#isU', '', $plainText);
			$plainText = preg_replace('#<object.*?>(.*?)</object>#isU', '', $plainText);
			$plainText = preg_replace('#<code.*?>(.*?)</code>#isU', '', $plainText);
			$plainText = preg_replace('#<embed.*?>(.*?)</embed>#isU', '', $plainText);
			$plainText = preg_replace('#(^|\s|\>|\()((http://|https://|news://|ftp://|www.)\w+[^\s\[\]\<\>\"\'\)]+)#i', '', $plainText);

			$matches = array();
			$matchCount = preg_match_all('#([^\s<>\'\"/\.\x133\x151\\-\?&%=\n\r\%]{'.$maxLength.'})#i' . JCOMMENTS_PCRE_UTF8, $plainText, $matches);
			for ($i = 0; $i < $matchCount; $i++) {
				$text = preg_replace("#(".preg_quote($matches[1][$i], '#').")#i" . JCOMMENTS_PCRE_UTF8, "\\1".$breaker, $text);
			}
			$text = preg_replace('#('.preg_quote($breaker, '#').'\s)#i' . JCOMMENTS_PCRE_UTF8, " ", $text);
			unset($matches);
			ob_end_clean();
		}
		return $text;
	}

	function countLinks( $text )
	{
		$matches = array();
		return preg_match_all(_JC_REGEXP_LINK, $text, $matches);
	}

	function clearLinks( $text )
	{
		return preg_replace(_JC_REGEXP_LINK, '', $text);
	}

	function url($s)
	{
		if (isset($s) && preg_match('/^((http|https|ftp):\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}((:[0-9]{1,5})?\/.*)?$/i' , $s)) {
			$url = preg_replace('|[^a-z0-9-~+_.?#=&;,/:]|i', '', $s);
			$url = str_replace(';//', '://', $url);
			if ($url != '') {
				$url = (!strstr($url, '://')) ? 'http://'.$url : $url;
				$url = preg_replace('/&([^#])(?![a-z]{2,8};)/', '&#038;$1', $url);
				return $url;
			}
		}
		return null;
	}

	function censor( $text )
	{
		ob_start();
		
		$config = & JCommentsFactory::getConfig();
		$badwords = $config->get('badwords');
		$replaceWord = $config->get('censor_replace_word', '***');
		
		if (!empty($badwords)) {
			for ($i = 0, $n = count($badwords); $i < $n; $i++) {
				$text = eregi_replace($badwords[$i], $replaceWord, $text);
			}
		}
		ob_end_clean();
		return $text;
	}

	/**
	* Cleans text of all formating and scripting code
	*/
	function cleanText( $text )
	{
		$bbcode = & JCommentsFactory::getBBCode();
		$config = & JCommentsFactory::getConfig();
		
		$text = $bbcode->filter($text, true);

		if ($config->getInt('enable_custom_bbcode')) {
			$customBBCode = & JCommentsFactory::getCustomBBCode();
			$text = $customBBCode->filter($text, true);
		}

		$text = str_replace('<br />', ' ', $text);
		$text = preg_replace('/(\s){2,}/i', '\\1', $text);
		$text = preg_replace("'<script[^>]*>.*?</script>'si" . JCOMMENTS_PCRE_UTF8, '', $text);
		$text = preg_replace('/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is' . JCOMMENTS_PCRE_UTF8, '\2 (\1)', $text);
		$text = preg_replace('/<!--.+?-->/' . JCOMMENTS_PCRE_UTF8, '', $text);
		$text = preg_replace('/{.+?}/', '', $text);
		$text = preg_replace('/&nbsp;/', ' ', $text);
		$text = preg_replace('/&amp;/', ' ', $text);
		$text = preg_replace('/&quot;/', ' ', $text);
		$text = strip_tags($text);
		$text = htmlspecialchars($text);
		$text = html_entity_decode($text);
		
		return $text;
	}

	function strlen( $str )
	{
		if (JCOMMENTS_ENCODING != 'utf-8') {
			return strlen($str);
		} else {
			return strlen(utf8_decode($str));
		}
	}

	function substr( $text, $length = 0 )
	{
		if (class_exists('JString')) {
			if ($length && JString::strlen($text) > $length) {
				$text = JString::substr($text, 0, $length) . '...';
			}
		} else {
			if ($length && strlen($text) > $length) {
				$text = substr($text, 0, $length) . '...';
			}
		}
		
		return $text;		
	}

	function isUTF8( $v )
	{
		for ($i = 0; $i < strlen($v); $i++) {
			if (ord($v[$i]) < 0x80) {
				$n = 0;
			} elseif ((ord($v[$i]) & 0xE0) == 0xC0) {
				$n = 1;
			} elseif ((ord($v[$i]) & 0xF0) == 0xE0) {
				$n = 2;
			} elseif ((ord($v[$i]) & 0xF0) == 0xF0) {
				$n = 3;
			} else {
				return false;
			}				
			
			for ($j = 0; $j < $n; $j++) {
				if ((++$i == strlen($v)) || ((ord($v[$i]) & 0xC0) != 0x80))
					return false;
			}
		}
		return true;
	}
}

class JCommentsBBCode
{
	var $_codes	= array();

	function JCommentsBBCode()
	{
		ob_start();
		$this->registerCode('b');
		$this->registerCode('i');
		$this->registerCode('u');
		$this->registerCode('s');
		$this->registerCode('url');
		$this->registerCode('img');
		$this->registerCode('list');
		$this->registerCode('hide');
		$this->registerCode('quote');
		$this->registerCode('code');
		ob_end_clean();
	}

	function registerCode($str)
	{
		$acl = & JCommentsFactory::getACL();
		$this->_codes[$str] = $acl->check('enable_bbcode_'.$str);
	}

	function getCodes()
	{
		return array_keys( $this->_codes );
	}

	function enabled()
	{
		static $enabled = null;

		if ($enabled == null) {
			foreach($this->_codes as $code=>$_enabled) {
				if ($_enabled == 1 && $code != 'quote') {
					$enabled = $_enabled;
					break;
				}
			}
		}
		return $enabled;
	}

	function canUse($str)
	{
		return $this->_codes[$str] ? 1 : 0;
	}

	function filter($str, $forceStrip = false)
	{
		global $my;

		ob_start();
		$patterns = array();
		$replacements = array();

		// disabled BBCodes
		$patterns[] = '/\[email\](.*?)\[\/email\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = ' \\1';
		$patterns[] = '/\[sup\](.*?)\[\/sup\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = ' \\1';
		$patterns[] = '/\[sub\](.*?)\[\/sub\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = ' \\1';

		//empty tags
		foreach($this->_codes as $code=>$enabled) {
			$patterns[] = '/\['.$code.'\]\[\/'.$code.'\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '';
		}
		// B
		if (($this->canUse('b') == 0) || ($forceStrip)) {
			$patterns[] = '/\[b\](.*?)\[\/b\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
		}

		// I
		if (($this->canUse('i') == 0) || ($forceStrip)) {
			$patterns[] = '/\[i\](.*?)\[\/i\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
		}

		// U
		if (($this->canUse('u') == 0) || ($forceStrip)) {
			$patterns[] = '/\[u\](.*?)\[\/u\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
		}

		// S
		if (($this->canUse('s') == 0) || ($forceStrip)) {
			$patterns[] = '/\[s\](.*?)\[\/s\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
		}

		// URL
		if (($this->canUse('url') == 0) || ($forceStrip)) {
			$patterns[] = '/\[url\](.*?)\[\/url\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
			$patterns[] = '/\[url=([^\s<\"\'\]]*?)\]([^\[]*?)\[\/url\]/iU' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\2: \\1';
		}

		// IMG
		if (($this->canUse('img') == 0) || ($forceStrip)) {
			$patterns[] = '/\[img\](.*?)\[\/img\]/i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\1';
		}

		// HIDE
		if (($this->canUse('hide') == 0) || ($forceStrip)) {
			$patterns[] = '/\[hide\](.*?)\[\/hide\]/i' . JCOMMENTS_PCRE_UTF8;
			if ($my->id) {
				$replacements[] = '\\1';
			} else {
				$replacements[] = '';
			}
		}

		$str = preg_replace($patterns, $replacements, $str);

		// LIST
		if (($this->canUse('list') == 0) || ($forceStrip)) {
			$matches = array();
			$matchCount = preg_match_all('/\[list\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/list\]/is' . JCOMMENTS_PCRE_UTF8, $str, $matches);
			for ($i = 0; $i < $matchCount; $i++) {
				$textBefore = preg_quote($matches[2][$i]);
				$textAfter = preg_replace('#(<br\s?\/?\>)*\[\*\](<br\s?\/?\>)*#is' . JCOMMENTS_PCRE_UTF8, "<br />", $matches[2][$i]);
				$textAfter = preg_replace('#^<br />#is' . JCOMMENTS_PCRE_UTF8, '', $textAfter);
				$textAfter = preg_replace('#(<br\s?\/?\>)+#is' . JCOMMENTS_PCRE_UTF8, '<br />', $textAfter);
				$str = preg_replace('#\[list\](<br\s?\/?\>)*' . $textBefore . '(<br\s?\/?\>)*\[/list\]#is' . JCOMMENTS_PCRE_UTF8, "\n$textAfter\n", $str);
			}
			$matches = array();
			$matchCount = preg_match_all('#\[list=(a|A|i|I|1)\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/list\]#is' . JCOMMENTS_PCRE_UTF8, $str, $matches);
			for ($i = 0; $i < $matchCount; $i++) {
				$textBefore = preg_quote($matches[3][$i]);
				$textAfter = preg_replace('#(<br\s?\/?\>)*\[\*\](<br\s?\/?\>)*#is' . JCOMMENTS_PCRE_UTF8, '<br />', $matches[3][$i]);
				$textAfter = preg_replace('#^<br />#' . JCOMMENTS_PCRE_UTF8, "", $textAfter);
				$textAfter = preg_replace('#(<br\s?\/?\>)+#' . JCOMMENTS_PCRE_UTF8, '<br />', $textAfter);
				$str = preg_replace('#\[list=(a|A|i|I|1)\](<br\s?\/?\>)*' . $textBefore . '(<br\s?\/?\>)*\[/list\]#is' . JCOMMENTS_PCRE_UTF8, "\n$textAfter\n", $str);
			}
		}

		if ($forceStrip) {
			// QUOTE
			$quotePattern = '#\[quote\s?name=\"([^\"\'\<\>\(\)]+)+\"\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/quote\]#iU' . JCOMMENTS_PCRE_UTF8;
			$quoteReplace = ' ';
			while(preg_match($quotePattern, $str)) {
				$str = preg_replace($quotePattern, $quoteReplace, $str);
			}
			$quotePattern = '#\[quote[^\]]*?\](<br\s?\/?\>)*([^\[]+)(<br\s?\/?\>)*\[\/quote\]#iU' . JCOMMENTS_PCRE_UTF8;
			$quoteReplace = ' ';
			while(preg_match($quotePattern, $str)) {
				$str = preg_replace($quotePattern, $quoteReplace, $str);
			}

			$str = preg_replace('#\[\/?(b|i|u|s|sup|sub|url|img|list|quote|code|hide)\]#is' . JCOMMENTS_PCRE_UTF8, '', $str);
		}

		$str = trim(preg_replace('#( ){2,}#i' . JCOMMENTS_PCRE_UTF8, '\\1', $str));

		ob_end_clean();
		return $str;
	}


	function replace($str) {
		global $my;

		ob_start();
		
		$acl = & JCommentsFactory::getACL();
		$config = & JCommentsFactory::getConfig();

		$patterns = array();
		$replacements = array();

		// B
		$patterns[] = '/\[b\](.*?)\[\/b\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<b>\\1</b>';

		// I
		$patterns[] = '/\[i\](.*?)\[\/i\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<i>\\1</i>';

		// U
		$patterns[] = '/\[u\](.*?)\[\/u\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<u>\\1</u>';

		// S
		$patterns[] = '/\[s\](.*?)\[\/s\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<strike>\\1</strike>';

		// SUP
		$patterns[] = '/\[sup\](.*?)\[\/sup\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<sup>\\1</sup>';

		// SUB
		$patterns[] = '/\[sub\](.*?)\[\/sub\]/i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<sub>\\1</sub>';

		// URL
		if ($acl->check('autolinkurls')) {
			$patterns[] = '#\[url\](http:\/\/)?([^\s<\"\']*?)\[\/url\]#i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = 'http://\\2';
			$patterns[] = '#\[url\](ftp:\/\/)?([^\s<\"\']*?)\[\/url\]#i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = 'ftp://\\2';
			$patterns[] = '#\[url=([^\s<\"\'\]]*?)\]([^\[]*?)\[\/url\]#iU' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '\\2: \\1';
		} else {
			$patterns[] = '#\[url\](http:\/\/)?([^\s<\"\']*?)\[\/url\]#i' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '<a href="http://\\2" rel="nofollow" target="_blank">\\2</a>';
			$patterns[] = '#\[url=([^\s\(\<\"\'\]]*?)\]([^\[]*?)\[\/url\]#iU' . JCOMMENTS_PCRE_UTF8;
			$replacements[] = '<a href="\\1" rel="nofollow" target="_blank">\\2</a>';
		}
		$patterns[] = '#\[url\](.*?)([^\s<>()\"\']*?)(.*?)\[\/url\]#i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '[url:error]';

		// EMAIL
		$patterns[] = '#\[email\]([^\s\<\>\(\)\"\'\[\]]*?)\[\/email\]#i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '\\1';

		// IMG
		$patterns[] = '#\[img\](http:\/\/)?([^\s\<\>\(\)\"\']*?)\[\/img\]#i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '<img class="img" src="http://\\2" alt="" border="0" />';
		$patterns[] = '#\[img\](.*?)([^\s<>()\"\']*?)(.*?)\[\/img\]#i' . JCOMMENTS_PCRE_UTF8;
		$replacements[] = '[img:error]';

		// HIDE
		$patterns[] = '/\[hide\](.*?)\[\/hide\]/i' . JCOMMENTS_PCRE_UTF8;
		if ($my->id) {
			$replacements[] = '\\1';
		} else {
			$replacements[] = '<span class="hidden">'.JText::_('HIDDEN_TEXT').'</span>';
		}

		// CODE
		$geshiEnabled = $config->getInt('enable_geshi', 0);
		$codePattern = '#\[code\=?([a-z0-9]*?)\](.*?)\[\/code\]#ism' . JCOMMENTS_PCRE_UTF8;

		if ($geshiEnabled) {
			if (JCOMMENTS_JVERSION == '1.0') {
				global $mainframe;
				include_once($mainframe->getCfg('absolute_path') . DS . 'mambots' . DS . 'content' . DS . 'geshi' . DS . 'geshi.php');
			} else if (JCOMMENTS_JVERSION=='1.5') {
				jimport('geshi.geshi');
			}

			if (!function_exists('jcommentsProcessGeSHi')) {
				function jcommentsProcessGeSHi($matches) {
					$lang = $matches[1] != '' ? $matches[1] : 'php';
					$text = $matches[2];
					$html_entities_match = array('#\<br \/\>#', "#<#", "#>#", "|&#39;|", '#&quot;#', '#&nbsp;#');
					$html_entities_replace = array("\n", '&lt;', '&gt;', "'", '"', ' ');
					$text = preg_replace($html_entities_match, $html_entities_replace, $text);
					$text = preg_replace('#(\r|\n)*?$#ism', '', $text);
					$text = str_replace('&lt;', '<', $text);
					$text = str_replace('&gt;', '>', $text);
					$geshi = new GeSHi( $text, $lang );
					$text = $geshi->parse_code();
					return '[code]'.$text.'[/code]';
				}
			}

			$patterns[] = $codePattern;
			$replacements[] = '<span class="code">'.JText::_('CODE').'</span>\\2';
			$str = preg_replace_callback($codePattern, 'jcommentsProcessGeSHi', $str);

		} else {
			$patterns[] = $codePattern;
			$replacements[] = '<span class="code">'.JText::_('CODE').'</span><code>\\2</code>';

			if (!function_exists('jcommentsProcessCode')) {
				function jcommentsProcessCode($matches) {
					return nl2br(htmlspecialchars(trim($matches[0])));
				}
			}

			$str = preg_replace_callback($codePattern, 'jcommentsProcessCode', $str);
		}

		$str = preg_replace($patterns, $replacements, $str);

		// QUOTE
		$quotePattern = '#\[quote\s?name=\"([^\"\'\<\>\(\)]+)+\"\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/quote\]#i' . JCOMMENTS_PCRE_UTF8;
		$quoteReplace = '<span class="quote">'.JText::_('QUOTE_PREFIX').' \\1'.JText::_('QUOTE_SUFFIX').'</span><blockquote>\\3</blockquote>';
		while(preg_match($quotePattern, $str)) {
			$str = preg_replace($quotePattern, $quoteReplace, $str);
		}
		$quotePattern = '#\[quote[^\]]*?\](<br\s?\/?\>)*([^\[]+)(<br\s?\/?\>)*\[\/quote\]#i' . JCOMMENTS_PCRE_UTF8;
		$quoteReplace = '<span class="quote">'.JText::_('QUOTE_SINGLE').'</span><blockquote>\\2</blockquote>';
		while(preg_match($quotePattern, $str)) {
			$str = preg_replace($quotePattern, $quoteReplace, $str);
		}

		// LIST
		$matches = array();
		$matchCount = preg_match_all('#\[list\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/list\]#is' . JCOMMENTS_PCRE_UTF8, $str, $matches);
		for ($i = 0; $i < $matchCount; $i++) {
			$textBefore = preg_quote($matches[2][$i]);
			$textAfter = preg_replace('#(<br\s?\/?\>)*\[\*\](<br\s?\/?\>)*#is' . JCOMMENTS_PCRE_UTF8, "</li>\n<li>", $matches[2][$i]);
			$textAfter = preg_replace("#^</?li>#" . JCOMMENTS_PCRE_UTF8, "", $textAfter);
			$textAfter = str_replace("\n</li>", "</li>", $textAfter."</li>");
			$str = preg_replace('#\[list\](<br\s?\/?\>)*' . $textBefore . '(<br\s?\/?\>)*\[/list\]#is' . JCOMMENTS_PCRE_UTF8, "\n<ul>$textAfter\n</ul>\n", $str);
		}
		$matches = array();
		$matchCount = preg_match_all('#\[list=(a|A|i|I|1)\](<br\s?\/?\>)*(.*?)(<br\s?\/?\>)*\[\/list\]#is' . JCOMMENTS_PCRE_UTF8, $str, $matches);
		for ($i = 0; $i < $matchCount; $i++) {
			$textBefore = preg_quote($matches[3][$i]);
			$textAfter = preg_replace('#(<br\s?\/?\>)*\[\*\](<br\s?\/?\>)*#is' . JCOMMENTS_PCRE_UTF8, "</li>\n<li>", $matches[3][$i]);
			$textAfter = preg_replace("#^</?li>#" . JCOMMENTS_PCRE_UTF8, '', $textAfter);
			$textAfter = str_replace("\n</li>", "</li>", $textAfter."</li>");
			$str = preg_replace('#\[list=(a|A|i|I|1)\](<br\s?\/?\>)*' . $textBefore . '(<br\s?\/?\>)*\[/list\]#is' . JCOMMENTS_PCRE_UTF8, "\n<ol type=\\1>\n$textAfter\n</ol>\n", $str);
		}

		$str = preg_replace('#\[\/?(b|i|u|s|sup|sub|url|img|list|quote|code|hide)\]#' . JCOMMENTS_PCRE_UTF8, '', $str);
		unset($matches);
		ob_end_clean();
		return $str;
	}

	function removeQuotes( $text )
	{
		$text = preg_replace(array('#\n?\[quote.*?\].+?\[/quote\]\n?#is' . JCOMMENTS_PCRE_UTF8, '#\[/quote\]#'), '', $text);
		$text = preg_replace('#<br />+#is', '', $text);
		return $text;
	}

	function removeHidden( $text )
	{
		$text = preg_replace('#\[hide\](.*?)\[\/hide\]#is' . JCOMMENTS_PCRE_UTF8, '', $text);
		$text = preg_replace('#<br />+#is', '', $text);
		return $text;
	}
}

class JCommentsCustomBBCode
{
        var $codes = array();
        var $patterns = array();
        var $filter_patterns = array();
        var $html_replacements = array();
        var $text_replacement = array();

	function JCommentsCustomBBCode()
	{
	        global $mainframe;

		$db = & JCommentsFactory::getDBO();
		$db->setQuery('SELECT * FROM #__jcomments_custom_bbcodes WHERE published = 1 ORDER BY ordering');
		$codes = $db->loadObjectList();

		$this->patterns = array();
		$this->html_replacements = array();
		$this->text_replacements = array();
		$this->codes = array();

		foreach($codes as $code) {
			
			if (JCOMMENTS_PCRE_UTF8 == 'u') {
				// fix \w pattern issue for UTF-8 encoding
				// details: http://www.phpwact.org/php/i18n/utf-8#w_w_b_b_meta_characters
				$code->pattern = preg_replace('#(\\\w)#u', '\p{L}', $code->pattern);
			}

		        // check button permission
			if (JCommentsBaseACL::check($code->button_acl)) {
		                if ($code->button_image != '') {
		                	if (strpos($code->button_image, $mainframe->getCfg('live_site')) === false) {
						$code->button_image = $mainframe->getCfg('live_site') . ($code->button_image[0] == '/' ? '' : '/') . $code->button_image;
		                	}
		                }
				$this->codes[] = $code;
			} else {
				$this->filter_patterns[] = '#' . $code->pattern . '#isU' . JCOMMENTS_PCRE_UTF8;
			}
				
			$this->patterns[] = '#' . $code->pattern . '#isU' . JCOMMENTS_PCRE_UTF8;
			$this->html_replacements[] = $code->replacement_html;
			$this->text_replacements[] = $code->replacement_text;
		}
	}

	function enabled()
	{
		return 1;
		//return count($this->codes) > 0;
	}

	function filter($str, $forceStrip = false)
	{
		if (count($this->filter_patterns)) {
			ob_start();
			$filter_replacement = $this->text_replacements;
			$str = preg_replace($this->filter_patterns, $filter_replacement, $str);
			ob_end_clean();
		}
		if ($forceStrip === true)  {
			ob_start();
			$str = preg_replace($this->patterns, $this->text_replacements, $str);
			ob_end_clean();
		}
		return $str;
	}

	function replace($str)
	{
		if (count($this->patterns)) {
			ob_start();
			$str = preg_replace($this->patterns, $this->html_replacements, $str);
			ob_end_clean();
		}
		return $str;
	}
}

class JCommentsSecurity
{
	function notAuth()
	{
		header('HTTP/1.0 403 Forbidden');
		echo _NOT_AUTH;
		exit;
	}

	function badRequest()
	{
		if ((empty($_SERVER['HTTP_USER_AGENT']))
		|| (!$_SERVER['REQUEST_METHOD']=='POST')) {
			return 1;
		}
		return 0;
	}

	function checkFlood( $ip )
	{
		global $mainframe;

		$config = JCommentsFactory::getConfig();
		
		$floodInterval = $config->getInt('flood_time');

		if ($floodInterval > 0) {
			$dbo = & JCommentsFactory::getDBO();

			if (JCOMMENTS_JVERSION == '1.5') {
				$datenow =& JFactory::getDate();
				$comment_date = $datenow->toMySQL();
			} else {
				$comment_date = date('Y-m-d H:i:s', time() + $mainframe->getCfg('offset') * 60 * 60);
			}

			$query = "SELECT COUNT(*) "
				. "\nFROM #__jcomments "
				. "\nWHERE ip = '$ip' "
				. "\nAND '".$comment_date."' < DATE_ADD(date, INTERVAL " . $floodInterval . " SECOND)"
				. (($mainframe->getCfg('multilingual_support') == 1) ? "\nAND lang = '" . $mainframe->getCfg('lang') . "'" : "")
				;

			$dbo->setQuery($query);

			return ($dbo->loadResult() == 0) ? 0 : 1;
		}
		return 0;
	}

	function checkIsForbiddenUsername($str)
	{
		$config = & JCommentsFactory::getConfig();
		$names = $config->get('forbidden_names');

		if (!empty($names) && !empty($str) ) {
			$str = trim(strtolower($str));
			$forbidden_names = split(',', strtolower($names));
			foreach ($forbidden_names as $name) {
				if (trim($name) == $str) {
					return 1;
				}
			}
			unset($forbidden_names);
		}
		return 0;
	}

	function checkIsRegisteredUsername($str)
	{
		$config = & JCommentsFactory::getConfig();
		
		if ($config->getInt('enable_username_check') == 1) {
			$dbo = & JCommentsFactory::getDBO();
			$str = $dbo->getEscaped($str);
			$dbo->setQuery("SELECT COUNT(*) FROM #__users WHERE name = '$str' OR username = '$str'");
			return ($dbo->loadResult() == 0) ? 0 : 1;
		}
		return 0;
	}
}

/**
 * JComments Factory class
 */
class JCommentsFactory
{
	/**
	 * Returns a reference to the global {@link JCommentsSmiles} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JCommentsSmiles
	 */
	function &getSmiles()
	{
		static $instance;
		
		if (!is_object($instance)) {
			$instance = new JCommentsSmiles();
		}
		return $instance;
	}

	/**
	 * Returns a reference to the global {@link JUser} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JUser
	 */
	function &getUser( $id = null )
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			if (!is_null($id)) {
				global $database;
				$user = new mosUser($database);
				$user->load($id);
			} else {
				global $mainframe;
				$user = $mainframe->getUser();
			}
		} else 
			if (JCOMMENTS_JVERSION == '1.5') {
				$user = & JFactory::getUser($id);
			}
		return $user;
	}

	/**
	 * Returns a reference to the global {@link JCommentsBBCode} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JCommentsBBCode
	 */
	function &getBBCode()
	{
		static $instance = null;
		
		if (!is_object($instance)) {
			$instance = new JCommentsBBCode();
		}
		return $instance;
	}

	function &getCustomBBCode()
	{
		static $instance = null;
		
		if (!is_object($instance)) {
			$instance = new JCommentsCustomBBCode();
		}
		return $instance;
	}

	/**
	 * Returns a reference to the global {@link JCommentsCfg} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JCommentsCfg
	 */
	function &getConfig($language='')
	{
		return JCommentsCfg::getInstance($language);
	}
	
	/**
	 * Returns a reference to the global {@link JoomlaTuneTemplateRender} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JoomlaTuneTemplateRender
	 */
	function &getTemplate( $object_id = 0, $object_group = 'com_content', $needThisUrl = true )
	{
		global $Itemid, $mainframe;

		ob_start();
		
		$config = & JCommentsFactory::getConfig();

		$templateName = $config->get('template'); 
		
		if (empty($templateName)) {
			$templateName = 'default';
			$config->set('template', $templateName);
		}

		include_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'template.php');

		$loadFromDefaultLocation = true;

		if (JCOMMENTS_JVERSION == '1.5') {
			$templateDirectory =  JPATH_SITE . DS . 'templates' . DS . $mainframe->getTemplate() . DS . 'jcomments' . DS . $templateName;
			$templateUrl =  JURI::root() . 'templates/' . $mainframe->getTemplate() . '/jcomments/' . $templateName;

			$loadFromDefaultLocation = !is_dir($templateDirectory);
		}

		if ($loadFromDefaultLocation) {
			$templateDirectory = JCOMMENTS_BASE . DS . 'tpl' . DS . $templateName;
			$templateUrl = $mainframe->getCfg('live_site') . '/components/com_jcomments/tpl/' . $templateName;
		}

		/**
		 * $tmpl JoomlaTuneTemplateRender
		 */
		$tmpl =& JoomlaTuneTemplateRender::getInstance();
		$tmpl->setRoot($templateDirectory);
		$tmpl->setBaseURI($templateUrl);
		$tmpl->addGlobalVar('siteurl', $mainframe->getCfg('live_site'));
		$tmpl->addGlobalVar('charset', strtolower(preg_replace('/charset=/', '', _ISO)));
		$tmpl->addGlobalVar('ajaxurl', JCommentsFactory::getLink('ajax', $object_id, $object_group));
		$tmpl->addGlobalVar('smilesurl', JCommentsFactory::getLink('smiles', $object_id, $object_group));
		$tmpl->addGlobalVar('rssurl', JCommentsFactory::getLink('rss', $object_id, $object_group));
		$tmpl->addGlobalVar('template', $templateName);
		$tmpl->addGlobalVar('itemid', $Itemid ? $Itemid : 1);

		$lang = $mainframe->getCfg('lang');

		if ($lang == 'russian' || $lang == 'ukrainian' || $lang == 'belorussian' || $lang == 'ru-RU' || $lang == 'uk-UA' || $lang == 'be-BY') {
			$tmpl->addGlobalVar('support', base64_decode('PGEgaHJlZj0iaHR0cDovL3d3dy5qb29tbGF0dW5lLnJ1IiB0aXRsZT0iSkNvbW1lbnRzIiB0YXJnZXQ9Il9ibGFuayI+SkNvbW1lbnRzPC9hPg=='));
		} else {
			$tmpl->addGlobalVar('support', base64_decode('PGEgaHJlZj0iaHR0cDovL3d3dy5qb29tbGF0dW5lLmNvbSIgdGl0bGU9IkpDb21tZW50cyIgdGFyZ2V0PSJfYmxhbmsiPkpDb21tZW50czwvYT4='));
		}

		$tmpl->addGlobalVar('comment-object_id', $object_id);
		$tmpl->addGlobalVar('comment-object_group', $object_group);

		if ($needThisUrl == true) {
			$tmpl->addGlobalVar('thisurl', JCommentsObjectHelper::getLink($object_id, $object_group));
		}

		ob_end_clean();

		return $tmpl;
	}

	/**
	 * Returns a reference to the global {@link JCommentsACL} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JCommentsACL
	 */
	function &getACL()
	{
		static $instance = null;

		if (!is_object( $instance )) {
			$instance = new JCommentsACL();
		}
		return $instance;
	}

	function &getDBO()
	{
		static $instance = null;
		
		if (!is_object($instance)) {
			if (JCOMMENTS_JVERSION == '1.0') {
				global $database;
				$instance = $database;
			} elseif (JCOMMENTS_JVERSION == '1.5') {
				$instance = & JFactory::getDBO();
			}
		}
		return $instance;
	}

	/**
	 * Returns a reference to the global {@link JoomlaTuneAjaxResponse} object, 
	 * only creating it if it doesn't already exist.
	 * 
	 * @access public 
	 * @return object JoomlaTuneAjaxResponse
	 */
	function &getAjaxResponse()
	{
		static $instance = null;
		
		if (!is_object($instance)) {
			$instance = new JoomlaTuneAjaxResponse(JCOMMENTS_ENCODING);
		}
		return $instance;
	}

	function getLink($type = 'ajax', $object_id = 0, $object_group='')
	{
		global $mainframe, $iso_client_lang;

		switch($type)
		{
			case 'rss':
				if (JCOMMENTS_JVERSION == '1.5') {
					return JoomlaTuneRoute::_('index.php?option=com_jcomments&amp;task=rss&amp;object_id='.$object_id.'&amp;object_group='.$object_group.'&amp;tmpl=component');
				}
				return $mainframe->getCfg('live_site') . '/index2.php?option=com_jcomments&amp;task=rss&amp;object_id='.$object_id.'&amp;object_group='.$object_group.'&amp;no_html=1';
				break;

			case 'noavatar':
				return $mainframe->getCfg('live_site') . '/components/com_jcomments/images/no_avatar.png';
				break;

			case 'smiles':
				return $mainframe->getCfg('live_site') . '/components/com_jcomments/images/smiles';
				break;

			case 'captcha':
				$random = mt_rand(10000, 99999);

				if (JCOMMENTS_JVERSION == '1.5') {
					return JURI::base() . 'index.php?option=com_jcomments&amp;task=captcha&amp;tmpl=component&amp;ac=' . $random;
				}
				return $mainframe->getCfg('live_site') . '/index2.php?option=com_jcomments&amp;task=captcha&amp;no_html=1&amp;ac=' . $random;
				break;

			case 'ajax':
				$lang = '';
				$lsfx = '';

				// support alternate language files
				$config = & JCommentsFactory::getConfig();
				if ($config->get('lsfx') != '') {
					$lsfx = '&amp;lsfx=' . $config->get('lsfx');
				} 

				// support additional param for multilingual sites
				if ($mainframe->getCfg('multilingual_support') == 1) {
					$lang .= '&amp;lang=' . $iso_client_lang;
				}

				if ($mainframe->isAdmin()) {
					if (JCOMMENTS_JVERSION == '1.5') {
						$link = $mainframe->getCfg('live_site') . '/administrator/index.php?option=com_jcomments&amp;tmpl=component' . $lang;
					} else {
						$link = $mainframe->getCfg('live_site') . '/administrator/index3.php?option=com_jcomments&amp;no_html=1' . $lang;
					}
				} else {
					if (JCOMMENTS_JVERSION == '1.5') {
				        	$link = JURI::base() . 'index.php?option=com_jcomments&amp;tmpl=component' . $lang . $lsfx;
					} else {
		                        	$_Itemid = '&amp;Itemid=' . ((!empty($_REQUEST['Itemid'])) ? $_REQUEST['Itemid'] : 1);
						$link = $mainframe->getCfg('live_site') . '/index2.php?option=com_jcomments&amp;no_html=1' . $lang . $lsfx . $_Itemid;
					}
				}

				// fix to prevent cross-domain ajax call
				if (isset($_SERVER['HTTP_HOST'])) {
					$httpHost = $_SERVER['HTTP_HOST'];

					if (strpos($httpHost, '://www.') !== false && strpos($link, '://www.') === false) {
						$link = str_replace('://', '://www.', $link);
					} else if (strpos($httpHost, '://www.') === false && strpos($link, '://www.') !== false) {
						$link = str_replace('://www.', '://', $link);
					}
				}

				return $link;
				break;

			case 'gzip':
				if (JCOMMENTS_JVERSION == '1.5') {
					return JURI::base() . 'index.php?option=com_jcomments&amp;tmpl=component&amp;task=gzip';
				}

				return $mainframe->getCfg('live_site') . '/index2.php?option=com_jcomments&amp;no_html=1&amp;task=gzip';
				break;

			default:
				return '';
				break;
		}
	}

	/**
	 * Convert relative link to absolute (add http:// and site url)
	 * 
	 * @access public 
	 * @param string $link The relative url. 
	 * @return object string
	 */
	function getAbsLink($link)
	{
		global $mainframe;

		$url = '';

		if (JCOMMENTS_JVERSION == '1.5') {
			$uri = & JFactory::getURI();
			$url = $uri->toString(array('scheme' , 'user' , 'pass' , 'host' , 'port'));
		} else {
			$url = $mainframe->getCfg('live_site');
		}

		if (strpos($link, $url) === false) {
			if (JCOMMENTS_JVERSION == '1.5') {
				$link = $url . $link;
			} else {
				$link = $url . '/' . $link;
			}
		}
		return $link;
	}
}

class JCommentsCache
{
	/**
	* @return object A function cache object
	*/
	function getCache($group='')
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			return JFactory::getCache($group);
		}
		return mosCache::getCache($group);
	}

	/**
	* Cleans the cache
	*/
	function cleanCache( $group=false )
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			$cache = & JFactory::getCache($group);
			$cache->clean($group);
		} else {
			mosCache::cleanCache($group);
		}
	}
}

class JCommentsInput
{
	function getParam( &$arr, $name, $def=null, $mask=0 )
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			// Static input filters for specific settings
			static $noHtmlFilter = null;
			static $safeHtmlFilter = null;

			$var = JArrayHelper::getValue($arr, $name, $def, '');

			// If the no trim flag is not set, trim the variable
			if (!($mask & 1) && is_string($var)) {
				$var = trim($var);
			}

			// Now we handle input filtering
			if ($mask & 2) {
				// If the allow html flag is set, apply a safe html filter to the variable
				if (is_null($safeHtmlFilter)) {
					$safeHtmlFilter = & JFilterInput::getInstance(null, null, 1, 1);
				}
				$var = $safeHtmlFilter->clean($var, 'none');
			} elseif ($mask & 4) {
				// If the allow raw flag is set, do not modify the variable
				$var = $var;
			} else {
				// Since no allow flags were set, we will apply the most strict filter to the variable
				if (is_null($noHtmlFilter)) {
					$noHtmlFilter = & JFilterInput::getInstance(/* $tags, $attr, $tag_method, $attr_method, $xss_auto */);
				}
				$var = $noHtmlFilter->clean($var, 'none');
			}
			return $var;
		}
		return mosGetParam($arr, $name, $def, $mask);
	}
}

class JCommentsMail
{
	function send($from, $fromname, $recipient, $subject, $body, $mode=0, $cc=NULL, $bcc=NULL, $attachment=NULL, $replyto=NULL, $replytoname=NULL )
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			return JUTility::sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname );
		}
		return mosMail($from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname );
	}
}

function JCommentsRedirect( $url, $msg='' )
{
	if (JCOMMENTS_JVERSION == '1.5') {
		global $mainframe;
		if (strpos($url, 'index2.php') === 1) {
			$url = str_replace('index2.php', 'index.php', $url);
		}
		$mainframe->redirect($url, $msg);
	}
	mosRedirect($url, $msg);
}

class JCommentsMultilingual
{
        function isEnabled()
        {
        	static $enabled;
        	
        	if (!isset($enabled)) {
        		global $mainframe;
        		$enabled = $mainframe->getCfg('multilingual_support') == 1; 

        		// check if multilingual_support
				if ($enabled) {
					$config = & JCommentsFactory::getConfig();
					$enabled = $config->get('multilingual_support', $enabled);
				}
        	}
        	return $enabled;
        }

	function getLanguage()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			$language = & JFactory::getLanguage();
			return $language->getTag();
		} else {
			global $mainframe;
			return $mainframe->getCfg('lang');
		}
	}
}
?>