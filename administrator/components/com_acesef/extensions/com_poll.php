<?php
/*
* @package		AceSEF
* @subpackage	Polls
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted access');

class AceSEF_com_poll extends AcesefExtension {
	
	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		// Extract variables
        extract($vars);

		if (!empty($id)) {
			$segments[] = self::_getPoll(intval($id));
			unset($vars['id']);
			unset($vars['view']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
	}
	
	function _getPoll($id) {
		static $cache;
		
		if(!isset($cache)) {
			$cache = array();
		}
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';
			
			$row = AceDatabase::loadRow("SELECT title, alias{$joomfish} FROM #__polls WHERE id = ".$id);
			
			$name = (($this->params->get('pollid_inc', '1') != '1') ? $id.' ' : '');
			if (parent::urlPart($this->params->get('poll_part', 'global')) == 'title') {
				$name .= $row[0];
			} else {
				$name .= $row[1];
			}
		
			$cache[$id]['name'] = $name;
			$cache[$id]['meta_title'] = $row[0];
		}
		
		$this->meta_title[] = $this->meta_desc = $cache[$id]['meta_title'];
		
		return $cache[$id]['name'];
    }
}
?>