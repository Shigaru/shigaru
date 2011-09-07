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

class fsf_Settings 
{
	function _GetSettings()
	{
		global $fsf_settings;
		
		if (empty($fsf_settings))
		{
			fsf_Settings::_GetDefaults();
			
			$db =& JFactory::getDBO();
			$query = 'SELECT * FROM #__fsf_settings';
			$db->setQuery($query);
			$row = $db->loadAssocList();
			
			foreach ($row as $data)
			{
				$fsf_settings[$data['setting']] = $data['value'];
			}
		}	
	}
	
	function _GetDefaults()
	{
		global $fsf_settings;
		
		if (empty($fsf_settings))
		{
			$fsf_settings = array();
			
			$fsf_settings['skin_style'] = 0;
			$fsf_settings['css_hl'] = '#f0f0f0';
			$fsf_settings['css_tb'] = '#ffffff';
			$fsf_settings['css_bo'] = '#e0e0e0';
		}
		
	}
	
	function get($setting)
	{
		global $fsf_settings;
		fsf_Settings::_GetSettings();
		return $fsf_settings[$setting];	
	}
	
	function &GetAllSettings()
	{
		global $fsf_settings;
		fsf_Settings::_GetSettings();
		return $fsf_settings;	
	}
}