<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php

defined('_JEXEC') or die(';)');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.installer.installer');
jimport('joomla.installer.helper');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');
jimport('joomla.filesystem.path');


class Status {
	var $STATUS_FAIL = 'Failed';
	var $STATUS_SUCCESS = 'Success';
	var $infomsg = array();
	var $errmsg = array();
	var $status;
}


if (file_exists(JPATH_SITE.DS.'components'.DS.'com_fsf'.DS."combined.php"))
{
	$db = JFactory::getDBO();
	$install_status = array();

	$mod_return = module_uninstall($this, "mod_fsf_cats", $db);
	$install_status['mod_fsf_cats'] = $mod_return;
	if ($mod_return->status == $mod_return->STATUS_FAIL) {
		return false;
	}
}

function com_uninstall()
{
}

function module_uninstall(&$installer, $modulename, &$db) {
	$status = new Status();
	$status->status = $status->STATUS_FAIL;
	
	$installer->parent->setPath('extension_root', JPATH_SITE.DS.'modules'.DS.$modulename);

	// Get the package manifest objecct
	$installer->parent->setPath('source', $installer->parent->getPath('extension_root'));

	// Lets delete all the module copies for the type we are uninstalling
	$query = 'SELECT `id`' .
		' FROM `#__modules`' .
		' WHERE module = '.$db->Quote($modulename) .
		' AND client_id = '.(int)0;
	$db->setQuery($query);
	$modules = $db->loadResultArray();

	// Do we have any module copies?
	if (count($modules)) {
		JArrayHelper::toInteger($modules);
		$modID = implode(',', $modules);
		$query = 'DELETE' .
			' FROM #__modules_menu' .
			' WHERE moduleid IN ('.$modID.')';
		$db->setQuery($query);
		if (!$db->query()) {
			$status->errmsg[]=JText::_('Unable to delete module copies from db').': '.$db->stderr(true);
			return $status;
		}
	}

	// Delete the module in the #__modules table
	$query = 'DELETE FROM #__modules WHERE module = '.$db->Quote($modulename).' AND client_id = 0';
	$db->setQuery($query);
	if (!$db->query()) {
		$status->errmsg[]=JText::_('Unable to delete from modules table').': '.$db->stderr(true);
		return $status;
	}

	// Remove the installation folder
	if (!JFolder::delete($installer->parent->getPath('extension_root'))) {
		// JFolder should raise an error
		$status->errmsg[]=JText::_('Failed to delete module directory');
		return $status;
	}

	$status->status = $status->STATUS_SUCCESS;
	return $status;
}
?>

<h1>Freestyle FAQs Lite Uninstallation</h1>
<?php if (file_exists(JPATH_SITE.DS.'components'.DS.'com_fsf'.DS."combined.php")): ?>
<table class="adminlist">
	<thead>
		<tr>
			<th class="title"><?php echo JText::_('Sub Component'); ?></th>
			<th width="60%"><?php echo JText::_('Status'); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</tfoot>
	<tbody>
	<?php
		$i=0;
		foreach ( $install_status as $component => $status ) {?>
		<tr class="row<?php echo $i; ?>">
			<td class="key"><?php echo $component; ?></td>
			<td>
				<?php echo ($status->status == $status->STATUS_SUCCESS)? '<strong>'.JText::_('Uninstalled').'</strong>' : '<em>'.JText::_('NOT Uninstalled').'</em>'?>
				<?php if (count($status->errmsg) > 0 ) {
						foreach ( $status->errmsg as $errmsg ) {
       						echo '<br/>Error: ' . $errmsg;
						}
				} ?>
				<?php if (count($status->infomsg) > 0 ) {
						foreach ( $status->infomsg as $infomsg ) {
       						echo '<br/>Info: ' . $infomsg;
						}
				} ?>
			</td>
		</tr>	
	<?php
			if ($i=0){ $i=1;} else {$i = 0;}; 
	}?>

</tbody>
</table>
<?php endif; ?>