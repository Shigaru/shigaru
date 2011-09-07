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
require_once (JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_fsf'.DS.'settings.php');

//SENC
class FsfsViewSettings extends JView
{
	
	function display($tpl = null)
	{
		
		$what = JRequest::getString('what','');
		
		$settings = fsf_Settings::GetAllSettings();
		$db	= & JFactory::getDBO();
		
		if ($what == "save")
		{
			$data = JRequest::get('POST');
			
			foreach ($data as $setting => $value)
				if (array_key_exists($setting,$settings))
					$settings[$setting] = $value;
			
			foreach ($settings as $setting => $value)
			{
				if (!array_key_exists($setting,$data))
				{
					$settings[$setting] = 0;
					$value = 0;	
				}
				
				if ($setting != "LICKEY")
				{
					$qry = "REPLACE INTO #__fsf_settings (setting, value) VALUES ('";
					$qry .= mysql_escape_string($setting) . "','";
					$qry .= mysql_escape_string($value) . "')";
					$db->Execute($qry);
				}
				
			}
		}
		
		$this->assignRef('settings',$settings);

		JToolBarHelper::title( JText::_( 'Freestyle FAQs Lite - Settings' ), 'generic.png' );
		JToolBarHelper::preferences( 'com_fsf' );
		parent::display($tpl);
	}
}
//EENC
