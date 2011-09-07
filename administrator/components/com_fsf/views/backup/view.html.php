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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );
jimport('joomla.filesystem.file');
require_once (JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_fsf'.DS.'updatedb.php');

class FsfsViewBackup extends JView
{
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Backup / Restore' ), 'generic.png' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

		$task = JRequest::getVar('task');
		
		if ($task == "updatedb")
		{
			$this->assignRef('log',UpdateDatabase());
			parent::display("updatedb");
		}
		
		if ($task == "backup")
		{
			$this->assignRef('log',BackupData('fsf'));
		}
		
		if ($task == "restore")
		{
			// process any new file uploaded
			$file = JRequest::getVar('filedata', '', 'FILES', 'array');
			if (array_key_exists('error',$file) && $file['error'] == 0)
			{
				$data = file_get_contents($file['tmp_name']);
				$data = unserialize($data);
				
				global $log;
				$log = "";
				RestoreData($data);
				$this->assignRef('log',UpdateDatabase());
				parent::display("restore");
				return;
			}
			
		}
		
        parent::display($tpl);
    }

}
