<?php
/**
 * JComments - Joomla Comment System
 *
 * Migration wizard (import comments for 3d party extensions)
 *
 * @version 2.0
 * @package JComments
 * @subpackage Migration
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

class JOtherCommentSystem
{
	var $code = null;
	var $name = null;
	var $author = null;
	var $license = null;
	var $license_url = null;
	var $homepage = null;
	var $table = null;
	var $found = false;
	var $count = 0;

	function JOtherCommentSystem( $code, $name, $author, $license, $license_url, $homepage, $table )
	{
		$this->code = $code;
		$this->name = $name;
		$this->author = $author;
		$this->homepage = $homepage;
		$this->license = $license;
		$this->license_url = $license_url;
		$this->table = $table;
	}

	function UpdateCount()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery('SELECT COUNT(*) FROM ' . $this->table );
		$this->count = $db->loadResult();
	}
}


class JCommentsMigrationTool
{
	function showImport()
	{
		HTML_JCommentsMigrationTool::showImport();
	}


	function doImport( $option )
	{
		$vars = JCommentsInput::getParam( $_REQUEST, 'vars', array() );
	
		switch( strtolower( $vars['import'] ))
		{
			case 'akocomment':
				$cnt = JCommentsMigrationTool::importAkoComment();
				break;
			case 'moscom':
				$cnt = JCommentsMigrationTool::importMosCom();
				break;
			case 'combomax':
				$cnt = JCommentsMigrationTool::importComboMax();
				break;
			case 'joomlacomment':
				$cnt = JCommentsMigrationTool::importJoomlaComment();
				break;
			case 'jomcomment':
				$cnt = JCommentsMigrationTool::importJomComment();
				break;
			case 'datsogallery':
				$cnt = JCommentsMigrationTool::importDatsoGalleryComment();
				break;
			case 'joomgallery':
				$cnt = JCommentsMigrationTool::importJoomGalleryComment();
				break;
			case 'icegallery':
				$cnt = JCommentsMigrationTool::importIceGalleryComment();
				break;
			case 'remository':
				$cnt = JCommentsMigrationTool::importRemositoryComment();
				break;
			case 'paxxgallery':
				$cnt = JCommentsMigrationTool::importPAXXGalleryComment();
				break;
			case 'phocagallery':
				$cnt = JCommentsMigrationTool::importPhocaGalleryComment();
				break;
			case 'cinema':
				$cnt = JCommentsMigrationTool::importCinemaComment();
				break;
			case 'jmovies':
				$cnt = JCommentsMigrationTool::importJMoviesComment();
				break;
			case 'mosetstree':
				$cnt = JCommentsMigrationTool::importMTree();
				break;
			case 'linkdirectory':
				$cnt = JCommentsMigrationTool::importLinkDirectory();
				break;
			case 'mxcomment':
				$cnt = JCommentsMigrationTool::importmXcomment();
				break;
			case 'zoommediagallery':
				$cnt = JCommentsMigrationTool::importZoom();
				break;
			case 'rsgallery2':
				$cnt = JCommentsMigrationTool::importRSGallery2();
				break;
			case 'hotornot2':
				$cnt = JCommentsMigrationTool::importHotOrNot2();
				break;
			case 'easycomments':
				$cnt = JCommentsMigrationTool::importEasyComments();
				break;
			case 'musicbox':
				$cnt = JCommentsMigrationTool::importMusicBox();
				break;
			case 'jreviews':
				$cnt = JCommentsMigrationTool::importJReviews();
				break;
			case 'tutorials':
				$cnt = JCommentsMigrationTool::importTutorialsComments();
				break;
			case 'idoblog':
				$cnt = JCommentsMigrationTool::importIDoBlogComments();
				break;
			case 'sobi2reviews':
				$cnt = JCommentsMigrationTool::importSobi2Reviews();
				break;
			case 'jreactions':
				$cnt = JCommentsMigrationTool::importJReactions();
				break;
			case 'virtuemart':
				$cnt = JCommentsMigrationTool::importVirtueMart();
				break;
			case 'jxtendedcomments':
				$cnt = JCommentsMigrationTool::importJXtendedComments();
				break;
			case 'chronocomments':
				$cnt = JCommentsMigrationTool::importChronoComments();
				break;
			case 'akobook':
				$cnt = JCommentsMigrationTool::importAkoBook();
				break;
			case 'jambook':
				$cnt = JCommentsMigrationTool::importJamBook();
				break;
			case 'k2':
				$cnt = JCommentsMigrationTool::importK2();
				break;
			case 'smartblog':
				$cnt = JCommentsMigrationTool::importSmartBlog();
				break;
		}
		if ( $cnt > 0) {
			$message = sprintf( JText::_('A_IMPORT_DONE'), $cnt);
		} else {
			$message = JText::_('A_IMPORT_FAILED');
		}
		JCommentsRedirect( JCOMMENTS_INDEX . '?option=' . $option . '&task=import' , $message );
	}

	function processComment( $str ) {

		// change \n to <br />	
		$str = preg_replace( array( '/\r/', '/^\n+/', '/\n+$/' ), '', $str);
		$str = preg_replace('/\n/', '<br />', $str);

		// strip BBCode's
		$patterns = array( 
				  '/\[font=(.*?)\](.*?)\[\/font\]/i'
				, '/\[size=(.*?)\](.*?)\[\/size\]/i'
				, '/\[color=(.*?)\](.*?)\[\/color\]/i'
				, '/\[b\](null|)\[\/b\]/i'
				, '/\[i\](null|)\[\/i\]/i'
				, '/\[u\](null|)\[\/u\]/i'
				, '/\[s\](null|)\[\/s\]/i'
				, '/\[url=null\]null\[\/url\]/i'
				, '/\[img\](null|)\[\/img\]/i'
				, '/\[url=(.*?)\](.*?)\[\/url\]/i'
				, '/\[email](.*?)\[\/email\]/i'
				);

		$replacements = array( 
     				  '\\2'
    				, '\\2'
    				, '\\2'
	    			, ''
    				, ''
    				, ''
    				, ''
	    			, ''
    				, ''
    				, '\\2 ([url]\\1[/url])'
    				, '\\1'
	    			);
		$str = preg_replace( $patterns, $replacements, $str);

		//convert smiles 
		$patterns = array( 
				  '/\:eek/i'
				, '/\:roll/i'
				, '/\:sigh/i'
				, '/\:grin/i'
				, '/\:p/i'
				, '/\:0\s/i'
				, '/\:cry/i'
				, '/\:\'\(/i'
				, '/\:upset/i'
				, '/\>\:\(/i'
				, '/\:\(/i'
				, '/\:\)/i'
				, '/\;\)/i'
				, '/\:x/i'
				, '/\:\?/i'
				, '/\;\?/i'
				, '/\:\-\\\\/i'
				, '/\;D/i'
				);

		$replacements = array( 
     				  ':eek:'
	    			, ':roll:'
    				, ':sigh:'
    				, ':D'
    				, ':P'
				, ':o '
				, ':cry:'
				, ':cry:'
				, ''
				, ':sad:'
				, ':sad:'
				, ':-)'
				, ';-)'
				, ':-x'
				, ':-?'
				, ':-?'
				, ':sigh:'
				, ';-)'
    				);

		$str = preg_replace( $patterns, $replacements, $str);

		return $str;
	}

	function processName( $str )
	{
		return preg_replace("/[\'\"\>\<\(\)\[\]]?+/i", '', $str );
	}

	function updateParent($source, $keyMap)
	{
		$db = & JCommentsFactory::getDBO();
		$query = "SELECT id, parent FROM #__jcomments WHERE `source`= '$source' AND parent <> 0";
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		foreach($rows as $row) {
			if (isset($keyMap[$row->parent])) {
				$db->setQuery("UPDATE #__jcomments SET parent = " . $keyMap[$row->parent] . " WHERE id = " . $row->id);
				$db->query();
			}
		}
	}

	function importMosCom() {

		$db = & JCommentsFactory::getDBO();
		$db->setQuery("DELETE FROM #__jcomments WHERE source = 'moscom'");
		$db->query();

		$db->setQuery("SELECT * FROM `#__content_comments`");
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->articleid;
			$comment->object_group 	= 'com_content';
			$comment->name 		= $row->name;
			$comment->email 	= $row->email;
			$comment->homepage	= $row->homepage;
			$comment->comment	= JCommentsMigrationTool::processComment( $row->entry);
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", strtotime( $row->date . ' ' . $row->time ) );
			$comment->source 	= 'moscom';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$user = null;
			$query = "SELECT * FROM #__users WHERE email='$row->email' AND name='$row->name'";
			$db->setQuery( $query );

			if (JCOMMENTS_JVERSION == '1.5') {
				$config = &JFactory::getConfig();
		
				if($config->getValue('config.legacy')) {
					$db->loadObject( $user );
				} else {
					$user = $db->loadObject();
				}
			} else {
				$db->loadObject( $user );
			}

		 	if ( $user != null ) {
				$comment->userid = $user->id;	 		
		 	}

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE source = 'moscom' ");
		return $db->loadResult();
	}

	function importAkoComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'akocomment'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__akocomment`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db);

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= 'com_content';
			$comment->userid	= isset($row->userid) ? $row->userid : (isset($row->iduser) ? $row->iduser : 0);
			$comment->name 		= JCommentsMigrationTool::processName($row->name);
			$comment->username 	= $comment->name;
			$comment->email 	= $row->email;
			$comment->homepage	= $row->web;
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->ip 		= $row->ip;
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'akocomment';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'akocomment'");
		return $db->loadResult();
	}

	function importJoomlaComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'joomlacomment'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__comment`" );
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= 'com_content';
			$comment->parent	= isset($row->parentid) ? $row->parentid : 0;
			$comment->name 		= $row->name;
			$comment->username 	= $comment->name;
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment( $row->comment );
			$comment->ip 		= $row->ip;
			$comment->userid	= isset($row->userid) ? $row->userid : 0;
			$comment->published = $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'joomlacomment';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			if ( $row->usertype != 'Unregistered' ) {
				$user = null;
				$query = "SELECT * FROM #__users WHERE name='$row->name' and LOWER(usertype)='".strtolower( $row->usertype)."'";
				$db->setQuery( $query);

				if (JCOMMENTS_JVERSION == '1.5') {
					$config = &JFactory::getConfig();
		
					if($config->getValue('config.legacy')) {
						$db->loadObject( $user );
					} else {		
						$user = $db->loadObject();
					}
				} else {
					$db->loadObject( $user );
				}

	 			if ( $user != null ) {
					$comment->userid = $user->id;	 		
			 	}
			}
			$comment->store();
			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('joomlacomment', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'joomlacomment'");
		return $db->loadResult();
	}

	function importComboMax()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'combomax'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__combomax`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= 'com_content';
			$comment->name 		= $row->name;
			$comment->username 	= $comment->name;
			$comment->email 	= $row->email;		
			$comment->homepage	= $row->url;		
			$comment->comment	= JCommentsMigrationTool::processComment( $row->comment );
			$comment->ip 		= $row->ip;
			$comment->published 	= $row->approved;
			$comment->date 		= $row->date;
			$comment->source 	= 'combomax';
			$comment->userid	= $row->myid;
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'combomax'");
		return $db->loadResult();
	}

	function importJomComment() {

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jomcomment'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.email as user_email, u.name as user_name, u.username as user_username "
			. "\nFROM #__jomcomment AS c"
			. "\nLEFT JOIN #__users AS u ON c.user_id = u.id"
			;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();

		$iso = explode( '=', _ISO );
		$charset = strtolower($iso[1]);
		
		if ($charset != 'utf-8')
		{
			$entity_replace = create_function('$string', '
				$num = substr($string, 0, 1) === \'x\' ? hexdec(substr($string, 1)) : (int) $string;
				return $num < 0x20 || $num > 0x10FFFF || ($num >= 0xD800 && $num <= 0xDFFF) ? \'\' : ($num < 0x80 ? \'&#\' . $num . \';\' : ($num < 0x800 ? chr(192 | $num >> 6) . chr(128 | $num & 63) : ($num < 0x10000 ? chr(224 | $num >> 12) . chr(128 | $num >> 6 & 63) . chr(128 | $num & 63) : chr(240 | $num >> 18) . chr(128 | $num >> 12 & 63) . chr(128 | $num >> 6 & 63) . chr(128 | $num & 63))));');

			require_once( JCOMMENTS_BASE.DS.'libraries'.DS.'convert'.DS.'utf8.class.php');
			$encoding =& JCommentsUtf8::getInstance( $charset );
		}

		foreach( $rows as $row) {

			if ($charset != 'utf-8') {
				$row->comment = preg_replace('~(&#(\d{1,7}|x[0-9a-fA-F]{1,6});)~e', '$entity_replace(\'\\2\')', $row->comment);
				$row->comment = $encoding->utf8ToStr( $row->comment );

				$row->name = preg_replace('~(&#(\d{1,7}|x[0-9a-fA-F]{1,6});)~e', '$entity_replace(\'\\2\')', $row->name);
				$row->name = $encoding->utf8ToStr( $row->name );

				$row->username = preg_replace('~(&#(\d{1,7}|x[0-9a-fA-F]{1,6});)~e', '$entity_replace(\'\\2\')', $row->username);
				$row->username = $encoding->utf8ToStr( $row->username );

				$row->title = preg_replace('~(&#(\d{1,7}|x[0-9a-fA-F]{1,6});)~e', '$entity_replace(\'\\2\')', $row->title);
				$row->title = $encoding->utf8ToStr( $row->title );
			}

			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= (isset($row->option) && $row->option != '' ) ? $row->option : 'com_content';
			$comment->userid 	= $row->user_id;
			$comment->name 		= ($row->user_name ? $row->user_name : $row->name);
			$comment->username 	= ($row->user_username ? $row->user_username : $row->name);
			$comment->email 	= ($row->user_email ? $row->user_email : $row->email);
			$comment->homepage	= $row->website;
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment( $row->comment );
			$comment->ip 		= $row->ip;
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'jomcomment';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');
		
			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jomcomment'");
		return $db->loadResult();
	}

	function importmXcomment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'mxcomment'" );
		$db->query();
	
		$query	= "SELECT c.*"
			. "\n, u.email as user_email, u.name as user_name, u.username as user_username "
			. "\nFROM #__mxc_comments AS c"
			. "\nLEFT JOIN #__users AS u ON c.iduser = u.id"
			. "\nORDER BY c.id, c.parentid"
			;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach($rows as $row) {
			$comment = new JCommentsDB( $db );
			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= (isset($row->component) && $row->component != '' ) ? $row->component : 'com_content';
			$comment->parent	= isset($row->parentid) ? $row->parentid : 0;
			$comment->userid	= $row->iduser;
			$comment->name 		= ($row->user_name ? $row->user_name : $row->name);
			$comment->username 	= ($row->user_username ? $row->user_username : $row->name);
			$comment->email 	= $row->email;
			$comment->homepage	= $row->web;
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->ip 		= $row->ip;
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'mxcomment';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');
			$comment->store();
			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('mxcomment', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'mxcomment'");
		return $db->loadResult();
	}

	function importDatsoGalleryComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'datsogallery'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__datsogallery_comments`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->cmtpic;
			$comment->object_group 	= 'com_datsogallery';
			$comment->name 		= JCommentsMigrationTool::processName( $row->cmtname );
			$comment->username	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmttext) );
			$comment->ip 		= $row->cmtip;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->cmtdate );
			$comment->source 	= 'datsogallery';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'datsogallery'");
		return $db->loadResult();
	}

	function importJoomGalleryComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'joomgallery'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.id as userid, u.email, u.name, u.username "
			. "\nFROM #__joomgallery_comments AS c"
			. "\nLEFT JOIN #__users AS u ON c.userid = u.id "
			;

		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->cmtpic;
			$comment->object_group 	= 'com_joomgallery';
			$comment->userid	= $row->userid;
			$comment->name 		= isset($row->cmtname) ? JCommentsMigrationTool::processName($row->cmtname) : $row->name;
			$comment->username	= $comment->username;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmttext) );
			$comment->ip 		= $row->cmtip;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->cmtdate );
			$comment->source 	= 'joomgallery';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'joomgallery'");
		return $db->loadResult();
	}

	function importIceGalleryComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'icegallery'" );
		$db->query();

		$db->setQuery( "SELECT c.* FROM #__ice_comments AS c" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->imgid;
			$comment->object_group 	= 'com_icegallery';
			$comment->name 		= JCommentsMigrationTool::processName( $row->cmtname );
			$comment->username	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmtcontent) );
			$comment->ip 		= $row->hostaddr;
			$comment->published 	= $row->published;
			$comment->date 		= $row->cmtdate;
			$comment->source 	= 'icegallery';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'joomgallery'");
		return $db->loadResult();
	}

	function importRemositoryComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'remository'");
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.id as userid, u.email, u.name, u.username "
			. "\nFROM #__downloads_reviews AS c"
			. "\nLEFT JOIN #__users AS u ON c.userid = u.id "
			;

		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->itemid;
			$comment->object_group 	= 'com_remository';
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= $row->username;
			$comment->userid	= $row->userid;
			$comment->email 	= $row->email;		
			$comment->homepage	= $row->userURL;
			$comment->title		= $row->title;		
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->published = $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'remository';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'remository'");
		return $db->loadResult();
	}

	function importPAXXGalleryComment() {

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'paxxgallery'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.id, u.email, u.name, u.username "
			. "\nFROM #__paxxcomments AS c"
			. "\nLEFT JOIN #__users AS u ON c.userid = u.id "
			;

		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$row->text = html_entity_decode( $row->text, ENT_QUOTES ); 

			$comment->object_id 	= $row->pic;
			$comment->object_group 	= 'com_paxxgallery';
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= $row->username;
			$comment->userid	= $row->userid;
			$comment->email 	= $row->email;		
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->text) );
			$comment->published = 1;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->date);
			$comment->source 	= 'paxxgallery';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'paxxgallery'");
		return $db->loadResult();
	}

	function importPhocaGalleryComment() {

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'phocagallery'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.id, u.email, u.name, u.username "
			. "\nFROM phocagallery_comments AS c"
			. "\nLEFT JOIN #__users AS u ON c.userid = u.id "
			;

		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->catid;
			$comment->object_group 	= 'com_phocagallery';
			$comment->name 		= $row->name;
			$comment->username 	= $row->username;
			$comment->userid	= $row->userid;
			$comment->email 	= $row->email;		
			$comment->title		= isset($row->title) ? $row->title : '';
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes($row->comment));
			$comment->published	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:%S", $row->date);
			$comment->source 	= 'phocagallery';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'phocagallery'");
		return $db->loadResult();
	}

	function importCinemaComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'cinema'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__cinema_comments`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->cmtpic;
			$comment->object_group 	= 'com_cinema';
			$comment->name 		= JCommentsMigrationTool::processName( $row->cmtname );
			$comment->username 	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmttext) );
			$comment->ip 		= $row->cmtip;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->cmtdate );
			$comment->source 	= 'cinema';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'cinema'");
		return $db->loadResult();
	}

	function importJMoviesComment()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jmovies'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__jmovies_comments`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->cmtpic;
			$comment->object_group 	= 'com_jmovies';
			$comment->name 		= JCommentsMigrationTool::processName( $row->cmtname );
			$comment->username 	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmttext) );
			$comment->ip 		= $row->cmtip;
			$comment->userid	= $row->cmtiduser;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->cmtdate );
			$comment->source 	= 'jmovies';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jmovies'");
		return $db->loadResult();
	}

	function importMTree()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'mtree'" );
		$db->query();

		$query	= "SELECT c.*, u.email, u.name, u.username"
			. "\nFROM #__mt_reviews AS c"
			. "\nLEFT JOIN #__users AS u ON c.user_id = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->link_id;
			$comment->object_group 	= 'com_mtree';
			$comment->name 		= JCommentsMigrationTool::processName( ($row->user_id ? $row->name : $row->guest_name) );
			$comment->username 	= $row->username ? $row->username : $comment->name;
			$comment->email 	= $row->email;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->rev_text) );
			$comment->userid	= $row->user_id;
			$comment->published 	= $row->rev_approved;
			$comment->date 		= $row->rev_date;
			$comment->source 	= 'mtree';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'mtree'");
		return $db->loadResult();
	}

	function importLinkDirectory()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'linkdirectory'" );
		$db->query();

		$query	= "SELECT c.*, u.email, u.name, u.username"
			. "\nFROM #__ldcomment AS c"
			. "\nLEFT JOIN #__users AS u ON c.user_id = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->link_id;
			$comment->object_group 	= 'com_linkdirectory';
			$comment->name 		= JCommentsMigrationTool::processName( ($row->user_id ? $row->name : $row->guest_name) );
			$comment->username 	= $row->username ? $row->username : $comment->name;
			$comment->email 	= $row->email;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->rev_text) );
			$comment->userid	= $row->user_id;
			$comment->published 	= $row->rev_approved;
			$comment->date 		= $row->rev_date;
			$comment->source 	= 'linkdirectory';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'linkdirectory'");
		return $db->loadResult();
	}

	function importZoom()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'zoom'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__zoom_comments`" );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->imgid;
			$comment->object_group 	= 'com_zoom';
			$comment->name 		= JCommentsMigrationTool::processName( $row->cmtname );
			$comment->username 	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->cmtcontent) );
			$comment->published 	= 1;
			$comment->date 		= $row->cmtdate;
			$comment->source 	= 'zoom';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'zoom'");
		return $db->loadResult();
	}

	function importRSGallery2()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'rsgallery2'" );
		$db->query();

		$db->setQuery( "SELECT * FROM `#__rsgallery2_comments`" );
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= isset($row->picid) ? $row->picid : $row->item_id;
			$comment->object_group 	= 'com_rsgallery2';
			$comment->parent	= isset($row->parent_id) ? $row->parent_id : 0;
			$comment->userid 	= isset($row->user_id) ? $row->user_id : 0;
			$comment->name 		= JCommentsMigrationTool::processName( (isset($row->name) ? $row->name : $row->user_name) );
			$comment->username 	= $comment->name;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->ip		= isset($row->user_ip) ? $row->user_ip : '';
			$comment->published 	= 1;
			$comment->date 		= isset($row->date) ? $row->date : $row->datetime;
			$comment->source 	= 'rsgallery2';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('rsgallery2', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'rsgallery2'");
		return $db->loadResult();
	}

	function importHotOrNot2()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'hotornot2'" );
		$db->query();

		$query	= "SELECT c.*, u.email as user_email, u.name as user_name, u.username as user_username"
			. "\nFROM `#__hotornot_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.username = u.id "
			;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->idx;
			$comment->object_group 	= 'com_hotornot2';
			$comment->name 		= ($row->user_name != '') ? (JCommentsMigrationTool::processName( $row->user_name )) : 'Guest';
			$comment->username 	= ($row->user_username != '') ? (JCommentsMigrationTool::processName( $row->user_username )) : 'Guest';
			$comment->email 	= $row->user_email;
			$comment->userid 	= $row->username;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'hotornot2';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'hotornot2'");
		return $db->loadResult();
	}

	function importEasyComments()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'easycomments'" );
		$db->query();

		$query	= "SELECT * FROM `#__easycomments`";
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= 'com_content';
			$comment->parent	= $row->parentid;
			$comment->userid	= 0;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= $comment->name;
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->ip 		= $row->ip;
			$comment->email 	= $row->email;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->date );
			$comment->source 	= 'easycomments';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();

			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('easycomments', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'easycomments'");
		return $db->loadResult();
	}

	function importMusicBox()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'musicbox'" );
		$db->query();

		$query	= "SELECT c.*, u.email, u.name, u.username"
			. "\nFROM `#__musicboxrewiev` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->albumid;
			$comment->object_group 	= 'com_musicbox';
			$comment->userid	= $row->userid;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->text) );
			$comment->published 	= $row->published;
			$comment->source 	= 'musicbox';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'musicbox'");
		return $db->loadResult();
	}

	function importJReviews()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jreviews'" );
		$db->query();

		$query	= "SELECT c.* FROM `#__jreviews_comments` AS c";
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->pid;
			$comment->object_group 	= 'com_content';
			$comment->userid	= $row->userid;
			$comment->ip		= $row->ipaddress;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comments) );
			$comment->email 	= $row->email;
			$comment->published 	= $row->published;
			$comment->date 		= $row->created;
			$comment->source 	= 'jreviews';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jreviews'");
		return $db->loadResult();
	}

	function importTutorialsComments()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'tutorials'" );
		$db->query();

		$query	= "SELECT c.*, u.email, u.name, u.username"
			. "\nFROM `#__tutorials_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->tutorialid;
			$comment->object_group 	= 'com_tutorials';
			$comment->userid	= $row->userid;
			$comment->ip		= $row->userip;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comments) );
			$comment->email 	= $row->email;
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'tutorials';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'tutorials'");
		return $db->loadResult();
	}

	function importIDoBlogComments()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'idoblog'" );
		$db->query();

		$query	= "SELECT c.*, u.name"
			. "\nFROM `#__idoblog_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.created_by = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->idarticle;
			$comment->object_group 	= 'com_idoblog';
			$comment->parent	= $row->parent;
			$comment->userid	= $row->created_by;
			$comment->ip		= $row->userip;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->text) );
			$comment->email 	= $row->email;
			$comment->published 	= $row->publish;
			$comment->date 		= $row->date;
			$comment->source 	= 'idoblog';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();

			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('idoblog', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'idoblog'");
		return $db->loadResult();
	}

	function importSobi2Reviews()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'sobi2reviews'" );
		$db->query();

		$query	= "SELECT c.*, u.name"
			. "\nFROM `#__reviews` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->itemid;
			$comment->object_group 	= 'com_sobi2';
			$comment->parent	= 0;
			$comment->userid	= $row->userid;
			$comment->ip		= $row->ip;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->review) );
			$comment->email 	= $row->email;
			$comment->published 	= $row->published;
			$comment->date 		= $row->added;
			$comment->source 	= 'sobi2reviews';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'sobi2reviews'");
		return $db->loadResult();
	}

	function importJReactions()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jreactions'" );
		$db->query();

		$query	= "SELECT c.*, u.username"
			. "\nFROM `#__jreactions` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->contentid;
			$comment->object_group 	= 'com_content';
			$comment->parent	= 0;
			$comment->userid	= $row->userid;
			$comment->ip		= $row->ip;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->title		= $row->title;
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comments) );
			$comment->email 	= $row->email;
			$comment->homepage	= $row->website;
			$comment->published 	= $row->published;
			$comment->date 		= $row->date;
			$comment->source 	= 'jreactions';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jreactions'");
		return $db->loadResult();
	}

	function importVirtueMart()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'virtuemart'" );
		$db->query();

		$query	= "SELECT c.*, u.username, u.email, u.name"
			. "\nFROM `#__vm_product_reviews` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->product_id;
			$comment->object_group 	= 'com_virtuemart';
			$comment->parent	= 0;
			$comment->userid	= $row->userid;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->comment) );
			$comment->email 	= $row->email;
			$comment->published 	= $row->published;
			$comment->date 		= strftime( "%Y-%m-%d %H:%M:00", $row->time );
			$comment->source 	= 'virtuemart';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'virtuemart'");
		return $db->loadResult();
	}

	function importJXtendedComments()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jxtendedcomments'" );
		$db->query();

		$query	= "SELECT c.*, u.username"
			. "\nFROM `#__jxcomments_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.user_id = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->context_id;
			$comment->object_group 	= $row->context == 'content' ? 'com_' . $row->context : $row->context;
			$comment->parent	= 0;
			$comment->userid	= $row->user_id;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->body) );
			$comment->email 	= $row->email;
			$comment->homepage	= $row->url;
			$comment->ip		= $row->address;
			$comment->published 	= $row->published;
			$comment->date 		= $row->created_date;
			$comment->source 	= 'jxtendedcomments';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jxtendedcomments'");
		return $db->loadResult();
	}

	function importChronoComments()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'chronocomments'" );
		$db->query();

		$query	= "SELECT c.*, u.username"
			. "\nFROM `#__chrono_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.userid = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		$keyMap = array();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->pageid;
			$comment->object_group 	= $row->component;
			$comment->parent	= $row->parentid;
			$comment->userid	= $row->userid;
			$comment->name 		= JCommentsMigrationTool::processName( $row->name );
			$comment->username 	= JCommentsMigrationTool::processName( $row->username );
			$comment->comment	= JCommentsMigrationTool::processComment(stripslashes( $row->text) );
			$comment->email 	= $row->email;
			$comment->homepage	= $row->url;
			$comment->published 	= $row->published;
			$comment->date 		= $row->datetime;
			$comment->isgood	= $row->rating > 0 ? $row->rating : 0;
			$comment->ispoor	= $row->rating < 0 ? $row->rating : 0;
			$comment->source 	= 'chronocomments';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
			$keyMap[$row->id] = $comment->id;
		}

		JCommentsMigrationTool::updateParent('chronocomments', $keyMap);

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'chronocomments'");
		return $db->loadResult();
	}
	
	function importAkoBook()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'akobook'" );
		$db->query();

		$query	= "SELECT c.gbname, c.gbmail, c.gbip, c.gbpage, c.gbdate, c.published, c.gbtext"
			. "\n, u.username, u.id as userid"
			. "\nFROM `#__akobook` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.gbname = u.username and c.gbmail = u.email "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= 0;
			$comment->object_group 	= 'com_akobook';
			$comment->parent	= 0;
			$comment->userid	= isset($row->userid) ? intval($row->userid) : 0;
			$comment->name 		= JCommentsMigrationTool::processName( $row->gbname );
			$comment->username 	= JCommentsMigrationTool::processName( ($row->gbname == '' ? $row->username : $row->gbname));
			$comment->comment	= JCommentsMigrationTool::processComment($row->gbtext);
			$comment->email 	= $row->gbmail;
			$comment->homepage	= $row->gbpage;
			$comment->ip		= $row->gbip;
			$comment->published 	= $row->published;
			$comment->date 		= $row->gbdate;
			$comment->source 	= 'akobook';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'akobook'");
		return $db->loadResult();
	}

	function importJamBook()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'jambook'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.username, u.name, u.id as userid"
			. "\nFROM `#__jx_jambook` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.created_by = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= 0;
			$comment->object_group 	= 'com_jambook';
			$comment->parent	= 0;
			$comment->userid	= isset($row->userid) ? intval($row->userid) : 0;
			$comment->name 		= isset($row->authoralias) ? $row->authoralias : $row->name;
			$comment->username 	= isset($row->authoralias) ? $row->authoralias : $row->username;
			$comment->comment	= JCommentsMigrationTool::processComment($row->content);
			$comment->email 	= $row->email;
			$comment->homepage	= $row->url;
			$comment->ip		= $row->fromip;
			$comment->published 	= 1;
			$comment->date 		= $row->created;
			$comment->source 	= 'jambook';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'jambook'");
		return $db->loadResult();
	}

	function importK2()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'k2'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.username, u.name, u.id as userid"
			. "\nFROM `#__jw_k2_comments` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.user_id = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->item_id;
			$comment->object_group 	= 'com_k2';
			$comment->parent	= 0;
			$comment->userid	= isset($row->userid) ? intval($row->userid) : 0;
			$comment->name 		= isset($row->full_name) ? $row->full_name : $row->name;
			$comment->username 	= isset($row->full_name) ? $row->full_name : $row->username;
			$comment->comment	= JCommentsMigrationTool::processComment($row->comment_text);
			$comment->email 	= $row->comment_email;
			$comment->homepage	= $row->comment_url;
			$comment->ip		= '';
			$comment->published 	= $row->published;
			$comment->date 		= $row->comment_date;
			$comment->source 	= 'k2';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'k2'");
		return $db->loadResult();
	}

	function importSmartBlog()
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "DELETE FROM #__jcomments WHERE source = 'smartblog'" );
		$db->query();

		$query	= "SELECT c.*"
			. "\n, u.username, u.name, u.email, u.id as userid"
			. "\nFROM `#__blog_comment` AS c"
			. "\nLEFT JOIN `#__users` AS u ON c.user_id = u.id "
			;
		$db->setQuery( $query);
		$rows = $db->loadObjectList();

		foreach( $rows as $row) {
			$comment = new JCommentsDB( $db );

			$comment->object_id 	= $row->post_id;
			$comment->object_group 	= 'com_blog';
			$comment->parent	= 0;
			$comment->userid	= $row->user_id;
			$comment->name 		= $row->name;
			$comment->username 	= $row->username;
			$comment->comment	= JCommentsMigrationTool::processComment($row->comment_desc);
			$comment->title		= $row->comment_title;
			$comment->email 	= $row->email;
			$comment->homepage	= '';
			$comment->ip		= $row->comment_ip;
			$comment->published 	= $row->published;
			$comment->date 		= $row->comment_date;
			$comment->source 	= 'smartblog';
			$comment->lang 		= JCommentsInput::getParam($_POST, $comment->source . '_lang', '');

			$comment->store();
		}

		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments` WHERE `source`= 'smartblog'");
		return $db->loadResult();
	}
}

class HTML_JCommentsMigrationTool
{
	function showImport()
	{
		global $mainframe;

			$CommentSystems = array();
		
			$CommentSystems[] = new JOtherCommentSystem( 
							'AkoComment'
							, 'AkoComment'
							, 'Arthur Konze'
							, 'http://www.konze.de/content/view/8/26/'
							, 'http://www.konze.de/content/view/8/26/'
							, 'http://mamboportal.com'
							, '#__akocomment'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'MosCom'
							, 'MosCom'
							, 'Chanh Ong'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://ongetc.com'
							, '#__content_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'ComboMax'
							, 'ComboMax'
							, 'Phil Taylor'
							, 'Commercial (22.50 GPB)'
							, ''
							, 'http://www.phil-taylor.com/Joomla/Components/ComboMAX/'
							, '#__combomax'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'JoomlaComment'
							, 'JoomlaComment'
							, 'Frantisek Hliva'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://cavo.co.nr'
							, '#__comment'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'mXcomment'
							, 'mXcomment'
							, 'Bernard Gilly'
							, 'Creative Commons'
							, ''
							, 'http://www.visualclinic.fr'
							, '#__mxc_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'JomComment'
							, 'JomComment'
							, 'Azrul Rahim'
							, 'Commercial/Free'
							, ''
							, 'http://www.azrul.com'
							, '#__jomcomment'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'jxtendedcomments'
							, 'JXtended Comments'
							, 'JXtended LLC'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://jxtended.com/products/comments.html'
							, '#__jxcomments_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'chronocomments'
							, 'Chrono Comments'
							, 'Chronoman'
							, 'CC'
							, ''
							, 'http://www.chronoengine.com/'
							, '#__chrono_comments'
							);


			$CommentSystems[] = new JOtherCommentSystem( 
							'DatsoGallery'
							, 'DatsoGallery comments'
							, 'Andrey Datso'
							, 'Free'
							, ''
							, 'http://www.datso.fr'
							, '#__datsogallery_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'JoomGallery'
							, 'JoomGallery comments'
							, 'M. Andreas Boettcher'
							, 'Free'
							, ''
							, 'http://www.joomgallery.net'
							, '#__joomgallery_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'IceGallery'
							, 'IceGallery comments'
							, 'Markus Donhauser'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://joomlacode.org/gf/project/ice/'
							, '#__ice_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'Remository'
							, 'Remository file reviews'
							, 'Martin Brampton'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.remository.com'
							, '#__downloads_reviews'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'PAXXGallery'
							, 'PAXXGallery comments'
							, 'Tobias Floery'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.paxxgallery.com'
							, '#__paxxcomments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'PhocaGallery'
							, 'PhocaGallery comments'
							, 'Jan Pavelka'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.phoca.cz'
							, '#__phocagallery_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'JMovies'
							, 'JMovies comments'
							, 'Luscarpa &amp; Vamba'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.jmovies.eu/'
							, '#__jmovies_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'Cinema'
							, 'Cinema comments'
							, 'Vamba'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.joomlaitalia.com'
							, '#__cinema_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'MosetsTree'
							, 'Mosets Tree reviews'
							, 'Mosets Consulting'
							, 'Commercial'
							, ''
							, 'http://www.mosets.com'
							, '#__mt_reviews'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'LinkDirectory'
							, 'LinkDirectory link comments'
							, 'Soner Ekici'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.sonerekici.com/'
							, '#__ldcomment'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'zOOmMediaGallery'
							, 'zOOm Media Gallery comments'
							, 'Mike de Boer'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.zoomfactory.org/'
							, '#__zoom_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'rsgallery2'
							, 'RSGallery2 comments'
							, 'rsgallery2.net'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://rsgallery2.net/'
							, '#__rsgallery2_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'hotornot2'
							, 'Hotornot2 comments'
							, 'Aron Watson'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://joomlacode.org/gf/project/com_hotornot2/frs/'
							, '#__hotornot_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'easycomments'
							, 'EasyComments (www.easy-joomla.org)'
							, 'EasyJoomla'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.easy-joomla.org/'
							, '#__easycomments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'musicbox'
							, 'MusicBox'
							, 'Vamba'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.joomlaitalia.com'
							, '#__musicboxrewiev'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'jreviews'
							, 'JReviews'
							, 'Alejandro Schmeichler'
							, 'Commercial'
							, ''
							, 'http://www.reviewsforjoomla.com'
							, '#__jreviews_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'tutorials'
							, 'Tutorials (comments for items)'
							, 'NSOrg Project'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.nsorg.com'
							, '#__tutorials_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'idoblog'
							, 'IDoBlog'
							, 'Sunshine studio'
							, 'GNU/GPL'
							, ''
							, 'http://idojoomla.com'
							, '#__idoblog_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'sobi2reviews'
							, 'SOBI2 Reviews'
							, 'SOBI2 Developer Team'
							, 'GNU/GPL'
							, 'http://www.gnu.org/copyleft/gpl.html'
							, 'http://www.sigsiu.net'
							, '#__reviews'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'jreactions'
							, 'J! Reactions'
							, 'SDeCNet Software'
							, ''
							, ''
							, 'http://jreactions.sdecnet.com'
							, '#__jreactions'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'virtuemart'
							, 'VirtueMart product reviews'
							, 'The VirtueMart Development Team'
							, 'GNU/GPL'
							, 'http://www.gnu.org/licenses/gpl-2.0.html'
							, 'http://www.virtuemart.net'
							, '#__vm_product_reviews'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'akobook'
							, 'AkoBook'
							, 'Arthur Konze'
							, ''
							, ''
							, 'http://mamboportal.com'
							, '#__akobook'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'jambook'
							, 'JamBook'
							, 'Olle Johansson'
							, 'GNU/GPL'
							, 'http://www.gnu.org/licenses/gpl-2.0.html'
							, 'http://www.jxdevelopment.com/'
							, '#__jx_jambook'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'k2'
							, 'K2 Comments'
							, 'JoomlaWorks'
							, 'GNU/GPL'
							, 'http://www.gnu.org/licenses/gpl-2.0.html'
							, 'http://k2.joomlaworks.gr/'
							, '#__jw_k2_comments'
							);

			$CommentSystems[] = new JOtherCommentSystem( 
							'smartblog'
							, 'SmartBlog Comments'
							, 'Aneesh S'
							, 'GNU/GPL'
							, 'http://www.gnu.org/licenses/gpl-2.0.html'
							, 'http://www.aarthikaindia.com'
							, '#__blog_comment'
							);

		$db = & JCommentsFactory::getDBO();							
		$db->setQuery("SHOW tables");
		$tables = $db->loadResultArray();
	
		foreach ($tables as $tblval) {
			for($i=0,$n=count($CommentSystems); $i < $n; $i++ ) {
				$table_mask = str_replace( '#_', '', $CommentSystems[$i]->table );

				if (preg_match('/'.$table_mask.'$/i', $tblval)) {
					$CommentSystems[$i]->found = true;
					$CommentSystems[$i]->UpdateCount();
				} 
			}
		}

		$languages = array();

		$joomfish = JOOMLATUNE_JPATH_SITE . DS . 'components' . DS . 'com_joomfish' . DS . 'joomfish.php';

		if (is_file($joomfish)) {
			$db = & JCommentsFactory::getDBO();
			$db->setQuery("SELECT name, `code` as value FROM #__languages WHERE active = 1");
			$languages = $db->loadObjectList();
		}
?>
<script language="javascript" type="text/javascript">
function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	submitform( pressbutton );
}
</script>
<script language="Javascript" src="<?php echo $mainframe->getCfg( 'live_site' );?>/includes/js/overlib_mini.js"></script>

<script language="javascript" type="text/javascript">
var jc_comments = new Array(
<?php
		$jsArray = array();
		foreach($CommentSystems as $CommentSystem) {
			if($CommentSystem->found) {
				$jsArray[] = $CommentSystem->code;
			}
		}
		echo "'" . implode("', '", $jsArray) . "'";
?>
			);

function importMode( mode ) {
	if(document.getElementById) {
		for(var i=0;i<jc_comments.length;i++) {
		        if (mode == jc_comments[i]) {
				document.getElementById('import' + jc_comments[i]).checked = true;
				document.getElementById('import' + jc_comments[i]+'Info').style.display = '';
			} else {
				document.getElementById('import' + jc_comments[i]).checked = false;
				document.getElementById('import' + jc_comments[i]+'Info').style.display = 'none';
			}
		}
	}
}
</script>

<style>
fieldset { border: 1px #999 solid; }

span.note {
	color: #777;
}

table.componentinfo td {
	color: #777;
	padding: 0;
}
</style>

<div id="jc">
<form action="<?php echo JCOMMENTS_INDEX; ?>" method="post" name="adminForm" id="adminForm">
<input type="hidden" name="option" value="com_jcomments" />
<input type="hidden" name="task" value="" />

<?php
		if ( JCOMMENTS_JVERSION == '1.0' ) {
?>
<table class="adminheading">
<tr>
	<th style="background-image: none; padding: 0;"><img src="./components/com_jcomments/images/import48x48.png" width="48" height="48" align="middle">&nbsp;<?php echo JText::_('A_IMPORT'); ?></th>
</tr>
</table>
<?php
		}
?>
<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminform">
<tr>
	<td>
		<fieldset>
		<legend><?php echo JText::_('A_IMPORT_SELECT_SOURCE'); ?></legend>

		<table cellpadding="1" cellspacing="1" border="0">

<?php
		$foundSources = 0;
		foreach($CommentSystems as $CommentSystem) {
			if($CommentSystem->found) {
				$foundSources++;
?>
		<tr valign="top" align="left">
			<td><input type="radio" id="import<?php echo $CommentSystem->code; ?>" name="vars[import]" value="<?php echo $CommentSystem->code; ?>" onclick="importMode('<?php echo $CommentSystem->code; ?>')" <?php echo ($CommentSystem->found ? '' : 'disabled') ?> /></td>
			<td><label for="import<?php echo $CommentSystem->code; ?>"><?php echo $CommentSystem->name; ?> <?php echo ($CommentSystem->found ? '' : '<span class="note">['.JText::_('A_IMPORT_COMPONENT_NOT_INSTALLED').']</span>') ?></label></td>
		</tr>
		<tr id="import<?php echo $CommentSystem->code; ?>Info" style="display: none;">
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0" border="0" class="componentinfo">
				<tr>
					<td width="150px"><?php echo JText::_('A_IMPORT_COMPONENT_AUTHOR'); ?></td>
					<td><?php echo $CommentSystem->author; ?></td>
				</tr>
				<tr>
					<td><?php echo JText::_('A_IMPORT_COMPONENT_HOMEPAGE'); ?></td>
					<td><a href="<?php echo $CommentSystem->homepage; ?>" target="_blank"><?php echo str_replace('http://', '', $CommentSystem->homepage); ?></a></td>
				</tr>
				<tr>
					<td><?php echo JText::_('A_IMPORT_COMPONENT_LICENSE'); ?></td>
					<td>
<?php
				if ($CommentSystem->license_url != '') {
?>					
						<a href="<?php echo $CommentSystem->license_url; ?>" target="_blank"><?php echo $CommentSystem->license; ?></a>
<?php
				} else {
?>					
						<?php echo $CommentSystem->license; ?>
<?php
				}
?>					
					</td>
					
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr valign="top" align="left">
					<td>
						<?php echo JText::_('A_IMPORT_COMPONENT_COMMENTS_COUNT'); ?>
					</td>
					<td>
					        <?php echo $CommentSystem->count; ?>
					        <br />
<?php
				if (count($languages)) {
					echo JCommentsHTML::selectList( $languages, strtolower($CommentSystem->code) . '_lang', 'class="inputbox" size="1"', 'value', 'name', $mainframe->getCfg( 'lang' ) ) . '&nbsp;';
				}
?>					        
					        <input type="button" name="import<?php echo $CommentSystem->code; ?>" value="<?php echo JText::_('A_IMPORT_DO_IMPORT'); ?>" onclick="submitbutton('doimport')" <?php echo ($CommentSystem->count ? '' : 'disabled') ?> />
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				</table>
			</td>
		</tr>
<?php
                	}
		}

		if ($foundSources == 0) {
?>
		<tr>
			<td><?php echo JText::_('A_IMPORT_NO_SOURCES'); ?></td>
		</tr>
<?php
		}
?>
		</table>
	</fieldset>
	</td>
</tr>
</table>
</form>
</div>
<?php
	}
}
?>