<?php
/*
* @package		AceSEF
* @subpackage	aiContactSafe
* @copyright	2009-2010 JoomAce LLC, www.joomace.net
* @license		http://www.joomace.net/company/license
*/

// No Permission
defined('_JEXEC') or die('Restricted access.');

class AceSEF_com_aicontactsafe extends AcesefExtension {

	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		self::_a_b_c_acesef();
		
        extract($vars);
		
        if (!empty($pf)) {
			$segments[] = self::_getProfile(intval($pf));
			unset($vars['pf']);
			unset($vars['view']);
			unset($vars['layout']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
    }

    function _getProfile($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';
			$row = AceDatabase::loadRow("SELECT name$joomfish FROM #__aicontactsafe_profiles WHERE id = ".$id);
			
			$name = (($this->params->get('profileid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			$cache[$id]['name'] = $name;
		}
		return $cache[$id]['name'];
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