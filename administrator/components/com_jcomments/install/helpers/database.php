<?php
/**
 * JComments - Joomla Comment System
 *
 * Service functions for JComments Installer
 *
 * @static
 * @version 2.0
 * @package JComments
 * @subpackage Installer
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

class JCommentsInstallerDatabaseHelper
{
	function setupCollation()
	{
		$db = & JCommentsFactory::getDBO();
		
		$db->setQuery("SELECT COUNT(*) FROM `#__jcomments`;");
		$cnt = $db->loadResult();
		
		// only if where are no comments
		if ($cnt == 0) {
			$collation = '';
			
			$db->setQuery("SHOW FULL COLUMNS FROM `#__content` LIKE 'title';");
			$rows = $db->loadObjectList();
			
			if (count($rows)) {
				$collation = $rows[0]->Collation;
			}
			
			if ($collation == '') {
				$db->setQuery("SHOW VARIABLES LIKE 'collation_database';");
				$rows = $db->loadObjectList();
				$collation = count($rows) ? $rows[0]->Value : '';
			}
			
			// if collation not detemined - skip correction
			if ($collation != '') {
				$db->setQuery("SHOW FULL COLUMNS FROM `#__jcomments`;");
				$columns = $db->loadObjectList();
				
				if (is_array($columns)) {

					$change_text = array();
					
					foreach ($columns as $column) {
						if (strpos($column->Type, 'text') !== false || strpos($column->Type, 'char') !== false) {
							$change_text[] = "CHANGE `" . $column->Field . "` `" . $column->Field . "` " . $column->Type . " COLLATE " . $collation . " NOT NULL DEFAULT ''";
						}
					}
				
					// change collation for #__jcomments
					$db->setQuery("ALTER TABLE `#__jcomments` " . implode(', ', $change_text) . ";");
					@$db->query();
				}
				
				$db->setQuery("ALTER TABLE `#__jcomments` COLLATE " . $collation . ";");
				@$db->query();
				
				// change collation for #__jcomments_settings
				$db->setQuery("ALTER TABLE `#__jcomments_settings` CHANGE `value` `value` TEXT COLLATE " . $collation . " NOT NULL DEFAULT '';");
				@$db->query();
				
				$db->setQuery("ALTER TABLE `#__jcomments_settings` COLLATE " . $collation . ";");
				@$db->query();


				// change collation for #__jcomments_subscriptions
				$db->setQuery("SHOW FULL COLUMNS FROM `#__jcomments_subscriptions`;");
				$columns = $db->loadObjectList();
				
				if (is_array($columns)) {

					$change_text = array();
					
					foreach ($columns as $column) {
						if (strpos($column->Type, 'text') !== false || strpos($column->Type, 'char') !== false) {
							$change_text[] = "CHANGE `" . $column->Field . "` `" . $column->Field . "` " . $column->Type . " COLLATE " . $collation . " NOT NULL DEFAULT ''";
						}
					}
					$db->setQuery("ALTER TABLE `#__jcomments_subscriptions` " . implode(', ', $change_text) . ";");
					@$db->query();
				}
				
				$db->setQuery("ALTER TABLE `#__jcomments_subscriptions` COLLATE " . $collation . ";");
				@$db->query();
			}
		}
	}

	function upgradeStructure()
	{
		global $mainframe;
		
		$db = & JCommentsFactory::getDBO();
		
		// auto upgrade old table structure
		$db->setQuery("SHOW FIELDS FROM #__jcomments");
		$rows = $db->loadObjectList();

		if (is_array($rows)) {
			$fields = array();
			
			foreach ($rows as $row) {
				$fields[] = strtolower($row->Field);
			}
		
			$flist = array_values($fields);
		
			if (!in_array('lang', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `lang` varchar(255) default '" . $mainframe->getCfg('lang') . "'; ");
				@$db->query();
			}
			if (!in_array('username', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `username` varchar(255) default NULL; ");
				@$db->query();
			}
			if (!in_array('subscribe', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `subscribe` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'; ");
				@$db->query();
				$db->setQuery("ALTER TABLE `#__jcomments` ADD INDEX `idx_subscribe`(`subscribe`); ");
				@$db->query();
			}
			if (!in_array('parent', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `parent` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `id`; ");
				@$db->query();
			}
			if (!in_array('isgood', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `isgood` SMALLINT(5) UNSIGNED NOT NULL default '0' AFTER `date`; ");
				@$db->query();
			}
			if (!in_array('ispoor', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments` ADD `ispoor` SMALLINT(5) UNSIGNED NOT NULL default '0' AFTER `isgood`; ");
				@$db->query();
			}
			unset($flist, $rows);
		}

		// correction settings table structure
		$db->setQuery("SHOW FIELDS FROM #__jcomments_settings");
		$rows = $db->loadObjectList();
	
		if (is_array($rows)) {
			$fields = array();
		
			foreach ($rows as $row) {
				$fields[] = strtolower($row->Field);
			}
		
			$flist = array_values($fields);
		
			if (!in_array('lang', $flist)) {
				$db->setQuery("ALTER TABLE `#__jcomments_settings` ADD `lang` VARCHAR(20) NOT NULL DEFAULT '' AFTER `component`; ");
				@$db->query();
			
				$db->setQuery("ALTER TABLE `#__jcomments_settings` DROP PRIMARY KEY;");
				@$db->query();
			
				$db->setQuery("ALTER TABLE `#__jcomments_settings` ADD PRIMARY KEY (`component`, `lang`, `name`);");
				@$db->query();
			}
		}
		unset($flist, $rows);
		
		return true;
	}
}
?>