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

$db = JFactory::getDBO();
$install_status = array();

if (file_exists(JPATH_SITE.DS.'components'.DS.'com_fsf'.DS."combined.php"))
{
	$mod_return = module_install($this, "mod_fsf_cats", "FAQ Categories Modules", $db);
	$install_status['mod_fsf_cats'] = $mod_return;
	if ($mod_return->status == $mod_return->STATUS_FAIL) {
		return false;
	}
}


function module_install(&$installer, $modulename, $title, &$db, $position = 'left', $mtype = 'site') { 
	
	
	$status = new Status();
	$status->status = $status->STATUS_FAIL;
	
	// Set the installation path
	$element =& $installer->manifest->getElementByPath($modulename.'/files');
	if (is_a($element, 'JSimpleXMLElement') && count($element->children())) {
		$files =& $element->children();
		foreach ($files as $file) {
			if ($file->attributes('module')) {
				$mname = $file->attributes('module');
				break;
			}
		}
	}
	
	if (!empty ($mname)) {
		$ROOT_PATH = JPATH_SITE;
		if ($mtype =='admin'){
			$ROOT_PATH=JPATH_ADMINISTRATOR;
		}
		$installer->parent->setPath('extension_root', $ROOT_PATH.DS.'modules'.DS.$mname);
	} else {
		$installer->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('No module file specified'));
		$status->errmsg[]=JText::_('No module file specified');
		return $status;
	}

	/**
	 * ---------------------------------------------------------------------------------------------
	 * Filesystem Processing Section
	 * ---------------------------------------------------------------------------------------------
	 */
	
	/*
	 * If the module directory already exists, then we will assume that the
	 * module is already installed or another module is using that
	 * directory.
	 */
	if (file_exists($installer->parent->getPath('extension_root'))&&!$installer->parent->getOverwrite()) {
		$installer->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('Another module is already using directory').': "'.$installer->parent->getPath('extension_root').'"');
		$status->errmsg[]=JText::_('Another module is already using directory');
		return $status;
	}
	
	// If the module directory does not exist, lets create it
	$created = false;
	if (!file_exists($installer->parent->getPath('extension_root'))) {
		if (!$created = JFolder::create($installer->parent->getPath('extension_root'))) {
			$installer->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('Failed to create directory').': "'.$installer->parent->getPath('extension_root').'"');
			$status->errmsg[]=JText::_('Failed to create directory');
			return $status;
		}
	}
	
	/*
	 * Since we created the module directory and will want to remove it if
	 * we have to roll back the installation, lets add it to the
	 * installation step stack
	 */
	if ($created) {
		$installer->parent->pushStep(array ('type' => 'folder', 'path' => $installer->parent->getPath('extension_root')));
	}
	
	// Copy all necessary files
	if ($installer->parent->parseFiles($element, -1) === false) {
		// Install failed, roll back changes
		$installer->parent->abort();
		$status->errmsg[]=JText::_('Unable to parse files for copying');
		return $status;
	}
	
	$clientId = 0;
	$row = & JTable::getInstance('module');
	$row->title = $title;
	$row->ordering = $row->getNextOrder( "position='".$position."'" );
	$row->position = $position;
	$row->showtitle = 1;
	$row->iscore = 1;
	$row->access = $clientId == 1 ? 2 : 0;
	$row->client_id = $clientId;
	$row->module = $mname;
	$row->published = 0;
	$row->params = '';
	
	if (!$row->store()) {
		// Install failed, roll back changes
		$installer->parent->abort(JText::_('Module').' '.JText::_('Install').': '.$db->stderr(true));
		$status->errmsg[]=JText::_('Unable to write module information to database');
		return $status;
	}
	
	$status->status = $status->STATUS_SUCCESS;
	return $status;
}


function com_install()
{
	require_once (JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_fsf'.DS.'updatedb.php');
	UpdateDatabase();
	CopyImages();
}
?>


<h1>Freestyle FAQs Lite Installation Completed</h1>
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
				<?php echo ($status->status == $status->STATUS_SUCCESS)? '<strong>'.JText::_('Installed').'</strong>' : '<em>'.JText::_('NOT Installed').'</em>'?>
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