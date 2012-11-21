<?php
/*
* @package		AceSEF
* @subpackage	uddeIM
* @copyright	2009-2010 JoomAce LLC, www.joomace.net
* @license		http://www.joomace.net/company/license
*/

// No Permission
defined('_JEXEC') or die('Restricted access.');

class AceSEF_com_uddeim extends AcesefExtension {

	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		self::_a_b_c_acesef();
		
		// Extract variables
        extract($vars);
		
        if(isset($messageid)) {
			$segments[] = $messageid;
			unset($vars['messageid']);
		}
			
		if(isset($task)){
			switch($task){
				case 'outbox':
				case 'inbox':
				case 'trashcan':
				case 'new':
				case 'about':
				case 'help':
				case 'settings':
				case 'show':
				case 'delete':
				case 'forward':
				case 'markread':
				case 'markunread':
				case 'showout':
				case 'forwardoutbox':
				case 'recall':
				case 'deletefromoutbox':
				case 'restore':
					$tasks = array( 'outbox' => _UDDEIM_OUTBOX,
					'inbox' => _UDDEIM_INBOX,
					'trashcan' => _UDDEIM_TRASHCAN,
					'new' => _UDDEIM_COMPOSE,
					'about' => _UDDEADM_ABOUT,
					'help' => _UDDEIM_HELP,
					'settings' => _UDDEIM_OPTIONS,
					'show' => '',
					'delete' => _UDDEIM_DELETE,
					'forward' => _UDDEIM_FORWARDLINK,
					'markread' => _UDDEIM_STATUS_READ,
					'markunread' => _UDDEIM_STATUS_UNREAD,
					'showout' => 'showout',
					'forwardoutbox' => _UDDEIM_FORWARDLINK,
					'recall' => 'recall',
					'deletefromoutbox' => _UDDEIM_DELETE,
					'restore' => _UDDEIM_RESTORE);
					$segments[] = $tasks[$task];
					break;
				default:
					$segments[] = $task;
					break;
			}
			unset($vars['task']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
    }

	function _a_b_c_acesef() {
		jimport('joomla.plugin.helper');
				
		$file_1 = file_exists(JPATH_ADMINISTRATOR.'/components/com_acesef/acesef.php');
		$file_2 = file_exists(JPATH_ROOT.'/components/com_acesef/acesef.php');
		
		$acesef_mode = AcesefFactory::getConfig()->mode;
		$plugin_mode = JPluginHelper::isEnabled('system', 'acesef');
		$acesef_pack = defined('ACESEF_PACK');
		
		if (!$file_2 || !$file_1 || !$acesef_mode || !$plugin_mode || !$acesef_pack) {
			die('a');
		}
	}
}
?>