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
<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

jimport('joomla.filesystem.file');

function CopyImages()
{
	$log = "Copying Images<br>";

	$sourcepath = JPATH_SITE.DS.'components'.DS.'com_fsf'.DS.'assets'.DS.'icons';
	$destbase = JPATH_SITE.DS.'images'.DS.'fsf';
	if (!JFolder::exists($sourcepath))
	{
		$log .= "Source path doesnt exist<br>";
		return $log;
	}
	
		
	if (!JFolder::exists($destbase))
	{
		if (!JFolder::create($destbase))
		{
			$log .= "Unable to create $destbase<br>";
			return $log;
		}
	}
	
	$destpaths = array('faqcats');
	
	foreach ($destpaths as $destpath)
	{			
		$path = $destbase.DS.$destpath;
		if (!JFolder::exists($path))
		{
			if (!JFolder::create($path))
			{
				$log .= "Unable to create $path<br>";
				return $log;
			}
		}
		
		$files = JFolder::files($sourcepath);
		
		foreach ($files as $file)
		{
			$destfile = $path.DS.$file;
			$sourcefile = $sourcepath.DS.$file;
			
			if (!JFile::exists($destfile))
			{
				$log .= "Copying file : $sourcefile<br>";
				JFile::copy($sourcefile,$destfile);	
			}
		}
	}

	
	return $log;
}


function UpdateDatabase()
{
	global $log;
	
	$updatefile = JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_fsf'.DS.'database.dat';
	$db	= & JFactory::getDBO();
	
	$data = file_get_contents($updatefile);
	$data = unserialize($data);
	
	$log = "";
	
	$qry = "SHOW TABLES";
	$db->setQuery($qry);
	$existingtables_ = $db->loadResultArray();
	$existingtables = array();
	foreach($existingtables_ as $existingtable)
	{
		$existingtables[$existingtable] = $existingtable;
	}
		
	foreach ($data as $table => $stuff)
	{
		$table = str_replace("jos","#_",$table);

		$log .= "\n\nProcessing table " .$table ."\n";
		
		if (array_key_exists($table,$existingtables))
		{
			CompareTable($table, $stuff);
		} else {
			CreateTable($table, $stuff);
		}
		
		if (array_key_exists('data',$stuff))
		{
			$log .= RestoreTableData($table,$stuff);
		}
	}
	
	return $log;
}

function RestoreTableData($table, &$stuff, $checkexisting = true)
{
	$db	= & JFactory::getDBO();

	$log = "inserting data where missing\n";
	$prikeys = array();
	foreach ($stuff['index'] as $index)
	{
		if ($index['Key_name'] == "PRIMARY")
		{
			$prikeys[$index['Seq_in_index']] = $index['Column_name'];		
		}
	}
	
	foreach($stuff['data'] as $id => $data)
	{
		if ($checkexisting)
		{
			$qry = "SELECT * FROM `$table` WHERE ";
			
			$where = array();
			
			foreach($prikeys as $prikey)
			{
				$where[] = "`$prikey` = '" . $data[$prikey] ."'";		
			}
			
			if (count($where) > 0)
			{
				$qry .= implode(" AND ",$where);
				$db->setQuery($qry);
				$existing = $db->loadAssocList();
			} else {
				$existing = array();
			}
		} else {
			$existing = array();
		}
			
		if (count($existing) == 0)
		{
			$fields = array();
			$values = array();
			
			foreach ($data as $field => $value)
			{
				$fields[] = "`" . $field ."`";
				$values[] = "'" . mysql_escape_string($value) . "'";
			}
			
			$fieldlist = implode(", ", $fields);
			$valuelist = implode(", ", $values);
			
			$qry = "INSERT INTO `$table` ($fieldlist) VALUES ($valuelist)";
			$log .= $qry."\n";
			$db->execute($qry);
			
		}				
	}
	
	return $log;
}

function CompareTable($table, &$stuff)
{
	global $log;
	$db	= & JFactory::getDBO();

	$log .= "Existing table\n";
	
	// COMPARE FIELDS
	{
		$qry = "DESCRIBE $table";
		$db->setQuery($qry);
		$existing_ = $db->loadAssocList();
		$existing = array();
		
		foreach ($existing_ as $field)
		{
			$existing[$field['Field']] = $field;	
		}
		
		foreach ($stuff['fields'] as $field)
		{
			$fieldname = $field['Field'];
			if (array_key_exists($fieldname,$existing))
			{
				$log .= "Compare field $fieldname\n";	
				$existingfield = $existing[$fieldname];
				$same = true;
				
				if ($existingfield['Type'] != $field['Type'])
					$same = false;
				if ($existingfield['Null'] != $field['Null'])
					$same = false;
				if ($existingfield['Default'] != $field['Default'])
					$same = false;
				if ($existingfield['Extra'] != $field['Extra'])
					$same = false;

				if (!$same)
				{
					$change = "ALTER TABLE `$table` CHANGE `$fieldname` `$fieldname` " . $field['Type'];
					if ($field['Null'] == "NO")
						$change .= " NOT NULL ";
					if ($field['Extra'] == "auto_increment")
						$change .= " AUTO_INCREMENT ";
					$log .= $change . "\n";
					$db->execute($change);
				}

				//ALTER TABLE `jos_fsf_ticket_field` CHANGE `gfda` `iuytoiuyt` INT( 8 ) NOT NULL 
			} else {
				$log .= "New field $fieldname\n";	
				
				$change = "ALTER TABLE `$table` ADD `$fieldname` " . $field['Type'];
				if ($field['Null'] == "NO")
					$change .= " NOT NULL ";
				if ($field['Extra'] == "auto_increment")
					$change .= " AUTO_INCREMENT ";
				$log .= $change . "\n";
				$db->execute($change);
				//ALTER TABLE `jos_fsf_ticket_field` ADD `gfda` INT( 4 ) NOT NULL 
			}
		}
	}
	
	// COMPARE INDEXES
	{
		$indexs = array();
		foreach ($stuff['index'] as $index)
		{
			$indexs[$index['Key_name']][$index['Seq_in_index']] = $index;
		}
		/*echo "<pre>NEW\n";
		print_r($indexs);
		echo "</pre>";*/
		
	
		$qry = "SHOW INDEX FROM $table";
		$db->setQuery($qry);
		$existing_ = $db->loadAssocList();
		$existing = array();
		foreach ($existing_ as $index)
		{
			$existing[$index['Key_name']][$index['Seq_in_index']] = $index;
		}
		
		/*echo "<pre>EXISTING\n";
		print_r($existing);
		echo "</pre>";*/
		
		foreach ($indexs as $index)
		{
			$createindex = false;
			$name = $index[1]['Key_name'];
			$log .= "Compare index " . $name . " - ";
			if (array_key_exists($name,$existing))
			{
				$log .= "exists\n";
				// compare indexes and their fields. BORING
				$same = true;
				foreach ($index as $id => $field)
				{
					if (!array_key_exists($id,$existing[$name]))
					{
						$log .= "index offset $id not exist\n";
						$same = false;
					} else {
						if ($field['Non_unique'] != $existing[$name][$id]['Non_unique'])
						{
							$log .= "Non_unique different\n";
							$same = false;
						}
						if ($field['Column_name'] != $existing[$name][$id]['Column_name'])
						{
							$log .= "Column_name different\n";
							$same = false;
						}
					}
				}
				
				if (count($existing[$name]) != count($index))
					$same = false;
				
				if (!$same)
				{
					$log .= "Index different.. dropping\n";
					$drop = "ALTER TABLE `$table` DROP INDEX `" . $name . "`";
					$log .= $drop . "\n";
					$db->execute($drop);
					$createindex = true;
				}
				
			} else {
				$log .= "new\n";
				$createindex = true;
			}
			
			if ($createindex)
			{
				$log .= "Creating index $name\n";
				
				$fieldlist = array();
				foreach ($index as $id => $field)
				{
					$fieldlist[] = "`" . $field['Column_name'] . "`";	
				}
				
				$fieldlist = implode(", ",$fieldlist);
				
				$create = "ALTER TABLE `$table` ADD ";
				
				if ($index[1]['Key_name'] == "PRIMARY")
				{
					$create .= " PRIMARY KEY ";					
				} else if ($index[1]['Non_unique'] == 1)
				{
					$create .= " INDEX `$name` ";	
				} else {
					$create .= " UNIQUE `$name` ";	
				}
				
				$create .= "( " . $fieldlist . ")";
				$db->execute($create);
				
				$log .= $create;
			}
		}
	}

}

function CreateTable($table, &$stuff)
{
	global $log;
	$db	= & JFactory::getDBO();

	//$log .= "New table\n";
	
	$create = "CREATE TABLE IF NOT EXISTS `$table` (\n";
	
	$parts = array();
	
	foreach ($stuff['fields'] as $field)
	{
		$part = "`" . $field['Field'] . "` " . $field['Type'];
		if ($field['Null'] == "NO")
			$part .= " NOT NULL ";
		if ($field['Extra'] == "auto_increment")
			$part .= " AUTO_INCREMENT ";
		$parts[] = $part;
	}
	
	
	$indexs = array();
	foreach ($stuff['index'] as $index)
	{
		$indexs[$index['Key_name']][$index['Seq_in_index']] = $index;
	}
	
	if (array_key_exists("PRIMARY",$indexs))
	{
		$fields = "";
		foreach ($indexs['PRIMARY'] as $index)
		{
			$fields[] = "`" . $index['Column_name'] . "`";	
		}
		$fields = implode(", ",$fields);
		
		$part = "PRIMARY KEY (" . $fields . ")";
		$parts[] = $part;
	}
	
	foreach ($indexs as $name => $index)
	{
		if ($name == "PRIMARY")
			continue;
			
		$part = "UNIQUE KEY ";
		
		if ($index[1]['Non_unique'])
			$part = "KEY ";
		
		$part .= "`" . $index[1]['Key_name'] . "` (";
		
		$fields = array();
		
		foreach ($index as $field)
		{
			$fields[] = "`" . $field['Column_name'] . "`";	
		}
		
		$part .= implode(", ",$fields) . ")";
		$parts[] = $part;
	}
	
	
	$create = $create . implode(",\n",$parts) . "\n) DEFAULT CHARSET=utf8";
	$db->execute($create);

	$log .= $create."\n\n";
}

function BackupData($type)
{
	$tablematch = "jos_".$type."_";

	$tables = array();
	
	$db	= & JFactory::getDBO();
	$db->setQuery("SHOW TABLES");
	$existing = $db->loadAssocList();

	foreach ($existing as $row)
	{
		foreach($row as $field)
			$table = $field;	
		
		if (substr($table,0, strlen($tablematch)) != $tablematch)
			continue;

		$getdata[] = $table;		

		echo "Processing table $table\n";
		$field = 0;
		
		$res2 = mysql_query("DESCRIBE $table");
		while ($row2 = mysql_fetch_assoc($res2))
		{
			$tables[$table]['fields'][$field++] = $row2; 	
		}
		
		$res2 = mysql_query("SHOW INDEX FROM $table");
		$index = 0;
		while ($row2 = mysql_fetch_assoc($res2))
		{
			$tables[$table]['index'][$index++] = $row2; 	
		}
	}

	foreach ($getdata as $table)
	{
		//echo "Exporting table $table\n";
		$db->setQuery("SELECT * FROM $table");
		$existing = $db->loadAssocList();
		$rowno = 0;
		foreach ($existing as $row)
		{
			foreach ($row as $key => $value)
			{
				$tables[$table]['data'][$rowno][$key] = $value;
			}
			$rowno = $rowno + 1;
		}	
	}

	$data = serialize($tables);
	
    ob_end_clean();
    header("Cache-Control: public, must-revalidate");
    header('Cache-Control: pre-check=0, post-check=0, max-age=0');
    header("Pragma: no-cache");
    header("Expires: 0"); 
    header("Content-Description: File Transfer");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: application/octet-stream");
    header("Content-Length: ".(string)strlen($data));
    header('Content-Disposition: attachment; filename="fsf data backup.dat"');
    header("Content-Transfer-Encoding: binary\n");
    echo $data;
    exit;
}

function RestoreData(&$data)
{
	global $log;
	$db	= & JFactory::getDBO();
	
	foreach ($data as $table => $stuff)
	{
		$table = str_replace("jos","#_",$table);

		if (array_key_exists('data',$stuff))
		{
			$qry = "TRUNCATE `$table`";
			$log .= $qry."\n";
			$db->execute($qry);
			
			$log .= "\n\nProcessing table " .$table ."\n";

			$log .= RestoreTableData($table,$stuff,true);
		}
	}
}