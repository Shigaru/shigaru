<?php
/**
* Joomla Custom Properties
* @package Custom Properties
* @subpackage install.customproperties.php
* @author Andrea Forghieri
* @copyright (C) Andrea Forghieri, www.solidsystem.it
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
error_reporting(E_ALL ^ E_NOTICE);
jimport( 'joomla.filesystem.folder' );

function com_install() {

	$database 					= JFactory::getDBO();
	$mosConfig_absolute_path 	= JPATH_ROOT;
	$mosConfig_live_site 		= JURI::base();
	$mosConfig_cachepath 		= JPATH_CACHE;
	$unzipper 					= new JArchiveZip;

	$installer =& JInstaller::getInstance();

	//reading data from manifest
	$data = JApplicationHelper::parseXMLInstallFile( JPATH_COMPONENT . DS . 'customproperties.xml');
	$version = "1.98.3.4"; //default
	$date = "2010-08-20";
	if ( $data['type'] == 'component' )
	{
		$version	= $data['version'];
		$date		= $data['creationdate'];
	}

	echo '
		<table class="adminlist" style="width:50%" border="0" align="center">
			<tr>
				<td style="width:200px" align="center">
					<img src="components/com_customproperties/images/logocp.jpg" alt="Logo Custom Properties"/>
				</td>
				<td>
					<h2>Custom Properties</h2>
					<p>Version '.$version.'  ('.$date.')</p>
					<p>
					2008-2011 &copy; - Andrea Forghieri - Solidsystem.<br />
					This component is released under the GNU/GPL version 2 License.<br />
					All copyright statements must be kept.
					</p>
					<p>visit us : <a href="http://www.solidsystem.it">www.solidsystem.it</a></p>
				</td>
			</tr>
			<tr>
				<td style="padding:1em" colspan="2">
					<code>';

	// create tables
	$query ="CREATE TABLE IF NOT EXISTS `#__custom_properties_fields` (
					`id` int(11) NOT NULL auto_increment,
					`name` char(50) NOT NULL,
					`label` varchar(255) NOT NULL,
					`field_type` char(50) NOT NULL,
					`modules` varchar(255) NOT NULL,
					`published` tinyint(1) NOT NULL default '0',
					`access` int(11) NOT NULL default '0',
					`ordering` int(11) NOT NULL default '0',
					`checked_out` int(11) NOT NULL default '0',
					PRIMARY KEY  (`id`),
					KEY `state` (`published`),
					KEY `access` (`access`),
					KEY `checked_out` (`checked_out`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8";
	$database->setQuery($query);
	$database->query();
	echo '<img src="images/tick.png"> Creating custom properties fields table...<br />';

	$query ="CREATE TABLE IF NOT EXISTS `#__custom_properties_values` (
				  `id` int(11) NOT NULL auto_increment,
				  `field_id` int(11) NOT NULL default '0',
				  `name` char(50) NOT NULL,
				  `label` varchar(255) NOT NULL,
				  `priority` tinyint(4) NOT NULL default '0',
				  `default` tinyint(1) NOT NULL default '0',
				  `ordering` int(11) NOT NULL default '0',
				  PRIMARY KEY  (`id`),
				  KEY `field_id` (`field_id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8";
	$database->setQuery($query);
	$database->query();
	echo '<img src="images/tick.png"> Creating custom properties values table...<br />';

	$query ="CREATE TABLE IF NOT EXISTS `#__custom_properties` (
				  `id` int(11) NOT NULL auto_increment,
				  `ref_table` varchar(100) default 'content',
				  `content_id` int(11) NOT NULL default '0',
				  `field_id` int(11) NOT NULL default '0',
				  `value_id` int(11) NOT NULL default '0',
				  PRIMARY KEY  (`id`),
				  UNIQUE KEY `t_c_f_v` (`ref_table`,`content_id`,`field_id`,`value_id`),
				  KEY `content_id` (`content_id`),
				  KEY `cp_field_id` (`field_id`),
				  KEY `cp_value_id` (`value_id`),
				  KEY `ref_table` (`ref_table`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8";
	$database->setQuery($query);
	$database->query();
	echo '<img src="images/tick.png"> Creating custom properties table...<br />';

	// Delete existing menu - if found
	$database->setQuery( "SELECT id FROM #__components WHERE `option` = 'com_customproperties' AND parent='0' " );
	$oldid = $database->loadResult();
	if(! empty($oldid)){
		echo "<img src=\"images/tick.png\"> Found menu $oldid <br />";
		$database->setQuery( "DELETE FROM #__components " .
				"WHERE `option`= 'com_customproperties'" );
		$database->query();
	}

	// Get menu new id
	$database->setQuery( "SELECT id FROM #__components WHERE `option` = 'com_custompropertiesinstaller' AND parent='0' " );
	$id = $database->loadResult();
	$from = "custompropertiesinstaller";
	$to   = "customproperties";
	// fix menu
	$database->setQuery( "UPDATE #__components SET link = REPLACE(link, '$from', '$to'), " .
			"admin_menu_link = REPLACE(admin_menu_link, '$from', '$to')," .
			"`option` = REPLACE(`option`, '$from', '$to') " .
			"WHERE id = '$id' OR parent = '$id' ");
	$database->query();

	if(! empty($oldid)){
		// upgrading, fixing menu link
		$database->setQuery( "UPDATE #__components SET id = '$oldid' WHERE id = '$id' ");
		$database->query();
		$database->setQuery( "UPDATE #__components SET parent = '$oldid' WHERE parent = '$id' ");
		$database->query();
		echo "<img src=\"images/tick.png\"> Fixing menu id... <br />";
		$id = $oldid;
	}

	// Insert new field 'modules' to DB - upgrade to 1.97
	$database->setQuery( "ALTER TABLE `#__custom_properties_fields` ADD COLUMN `modules` varchar(255) NOT NULL AFTER `field_type`;");
	$database->query();

	// upgrade custom properties to 1.98
	$database->setQuery( "ALTER TABLE #__custom_properties DROP KEY `c_f_v`");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties ADD  `ref_table` VARCHAR(100) NOT NULL DEFAULT 'content' AFTER `id`");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties ADD UNIQUE KEY `t_c_f_v` (`ref_table`,`content_id`,`field_id`,`value_id`)");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties ADD KEY `ref_table` (`ref_table`)");
	$database->query();

	// upgrade custom properties fields to 1.98
	$database->setQuery( "ALTER TABLE #__custom_properties_values ADD `priority` tinyint(4) NOT NULL DEFAULT '0' AFTER `label`");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties_values ADD  KEY `name` (`name`)");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties_values ADD  KEY `priority` (`priority`)");
	$database->query();

	// upgrade custom properties fields to 1.99
	$database->setQuery( "ALTER TABLE #__custom_properties_values ADD `article_id` int(11) DEFAULT NULL ");
	$database->query();
	$database->setQuery( "ALTER TABLE #__custom_properties_values ADD  KEY `article_id` (`article_id`)");
	$database->query();
	// upgrade custom properties fields to 2.00
	$database->setQuery( "ALTER TABLE #__custom_properties_fields ADD `required` tinyint(1) NOT NULL default '0' AFTER `published`");
	$database->query();
	echo '<img src="images/tick.png"> Updating database...<br />';

	# before coping , we clean a possibily conflicting directory
	if(file_exists("$mosConfig_absolute_path/administrator/components/com_customproperties/contentelements")){
		JFolder::delete( "$mosConfig_absolute_path/administrator/components/com_customproperties/contentelements" );
	}
	# Install bot_cptags
	echo '<img src="images/tick.png"> Installing Custom Properties Tags content plugin... <br/>';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/bot.zip", $mosConfig_absolute_path . "/plugins/content/");
	$database->setQuery("SELECT id FROM #__plugins WHERE element='cptags' AND folder='content'");
	$id = $database->loadResult();
	//register if needed
	if(empty($id)){
		$database->setQuery("REPLACE INTO #__plugins SET name='Custom Properties Tags', element='cptags', folder='content', access=0, ordering='1', published='1'");
		$database->query();
		echo '<img src="images/tick.png"> Registering cptags<br />';
	}

	# Install bot_search_cptags
	echo '<img src="images/tick.png"> Installing Custom Properties Tags Search plugin... <br/>';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/search_bot.zip", $mosConfig_absolute_path . "/plugins/search/");
	$database->setQuery("SELECT id FROM #__plugins WHERE element='cptags' AND folder='search'");
	$id = $database->loadResult();
	//register if needed
	if(empty($id)){
		$database->setQuery("REPLACE INTO #__plugins SET name='Search - CP Tags', element='cptags', folder='search', access=0, ordering='1', published='1'");
		$database->query();
		echo '<img src="images/tick.png"> Registering search cptags<br />';
	}

	# Install bot_cptags.btn
	echo '<img src="images/tick.png"> Installing Custom Properties Tags Button... <br/>';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/btn.zip", $mosConfig_absolute_path . "/plugins/editors-xtd/");
	$database->setQuery("SELECT id FROM #__plugins WHERE element='cptags' AND folder = 'editors-xtd' ");
	$id = $database->loadResult();
	//register if needed
	if(empty($id)){
		$database->setQuery("REPLACE INTO #__plugins SET name='Custom Properties Tags Button', element='cptags', folder='editors-xtd', access=0, ordering='1', published='1'");
		$database->query();
		echo '<img src="images/tick.png"> Registering cptags button<br />';
	}

	# Install mod_cpsearch
	echo '<img src="images/tick.png"> Installing CP search module... <br/>';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/search.zip", $mosConfig_absolute_path . "/modules/mod_cpsearch/");
	// install language files
	install_language("/modules/mod_cpsearch/", false, true);
	$database->setQuery("SELECT id FROM #__modules WHERE module='mod_cpsearch' ");
	$id = $database->loadResult();
	//register if needed
	if(empty($id)){
		$database->setQuery("INSERT INTO #__modules SET title='Custom Properties Search',content='', position='left', module='mod_cpsearch', access='0', ordering='0', published='0'");
		$database->query();
		echo '<img src="images/tick.png"> Registering mod_cpsearch<br />';
	}

	# Install mod_cpcloud
	echo '<img src="images/tick.png"> Installing CP cloud module... <br/>';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/cloud.zip", $mosConfig_absolute_path . "/modules/mod_cpcloud/");
	// install language files
	install_language("/modules/mod_cpcloud/", false, true);
	$database->setQuery("SELECT id FROM #__modules WHERE module='mod_cpcloud' ");
	$id = $database->loadResult();
	//register if needed
	if(empty($id)){
		$database->setQuery("INSERT INTO #__modules SET title='Custom Properties Cloud',content='', position='left', module='mod_cpcloud', access='0', ordering='0', published='0'");
		$database->query();
		echo '<img src="images/tick.png"> Registering mod_cpcloud<br />';
	}

	#save old configuration file
	$cp_config = array();
	$old_config = array();
	if (file_exists($mosConfig_absolute_path . '/administrator/components/com_customproperties/cp_config.php')){
		require($mosConfig_absolute_path . '/administrator/components/com_customproperties/cp_config.php');
		$old_config = $cp_config;
	}

	# Unzip full components files
	echo '<img src="images/tick.png"> Installing components files...<br />';
	$unzipper = new JArchiveZip;
	$unzipper->extract($mosConfig_absolute_path . '/components/com_custompropertiesinstaller/com.zip', $mosConfig_absolute_path . '/components/com_customproperties/');
	// install language files
	install_language("/components/com_customproperties/", false, true);

	# Unzip full admin files
	echo '<img src="images/tick.png"> Installing components admin files...<br />';
	$unzipper->extract($mosConfig_absolute_path . "/components/com_custompropertiesinstaller/admin.zip", $mosConfig_absolute_path . "/administrator/components/com_customproperties/");
	install_language("/administrator/components/com_customproperties/", true, true);

	#merge with new config_file
	$new_config = array();
	if (file_exists($config_file = $mosConfig_absolute_path . '/administrator/components/com_customproperties/cp_config.php')){
		require($config_file);
		$new_config = $cp_config;
		$dummy = print_r($new_config, true); //trick to force cp_config reload
		$merged_config = array_merge($new_config, $old_config);
		saveConfig($merged_config, $config_file);
	}

	// install Joom!Fish plugin
	if (file_exists($mosConfig_absolute_path . '/administrator/components/com_joomfish')){
		echo '<img src="images/tick.png"/> Joom!Fish detected, installing JF content elements...<br />';
		// move file to Joom!Fish directory
		@copy( "$mosConfig_absolute_path/administrator/components/com_customproperties/jfcontentelements/translationCpfieldFilter.php",
		"$mosConfig_absolute_path/administrator/components/com_joomfish/contentelements/translationCpfieldFilter.php");

		@copy( "$mosConfig_absolute_path/administrator/components/com_customproperties/jfcontentelements/custom_properties_fields.xml",
		"$mosConfig_absolute_path/administrator/components/com_joomfish/contentelements/custom_properties_fields.xml");

		@copy( "$mosConfig_absolute_path/administrator/components/com_customproperties/jfcontentelements/custom_properties_values.xml",
		"$mosConfig_absolute_path/administrator/components/com_joomfish/contentelements/custom_properties_values.xml");
	}

	$install_content_ce = false;
	$ce_src_dir = "administrator/components/com_customproperties/samplece";
	$ce_dst_dir = "administrator/components/com_customproperties/contentelements";
	/* booklibrary CP content element */
	if (file_exists(JPATH_ROOT . '/administrator/components/com_booklibrary')){
		echo '<img src="images/tick.png"/> Booklibrary detected, installing booklibrary content elements...<br />';
		@copy( JPATH_ROOT. DS . "$ce_src_dir/booklibrary.xml",
		JPATH_ROOT. DS . "$ce_dst_dir/booklibrary.xml");
		$install_content_ce = true;
	}
	/* docman CP content element */
	if (file_exists(JPATH_ROOT . '/administrator/components/com_docman')){
		echo '<img src="images/tick.png"/> Docman, installing docman content elements...<br />';
		@copy( JPATH_ROOT. DS . "/$ce_src_dir/docman.xml",
		JPATH_ROOT. DS . "/$ce_dst_dir/docman.xml");
		$install_content_ce = true;
	}
	/* Phoca Gallery CP content element */
	if (file_exists(JPATH_ROOT. '/administrator/components/com_phocagallery')){
		echo '<img src="images/tick.png"/> Phoca Gallery, installing phocagallery content elements...<br />';
		@copy( JPATH_ROOT . "/$ce_src_dir/phocagallery.xml",
		JPATH_ROOT."/$ce_dst_dir/phocagallery.xml");
		@copy( JPATH_ROOT . "/$ce_src_dir/phocagallery.xml",
		JPATH_ROOT . "/$ce_dst_dir/phocacategory.xml");
		$install_content_ce = true;
	}
	/* Eventlist */
	if (file_exists(JPATH_ROOT. '/administrator/components/com_eventlist')){
		echo '<img src="images/tick.png"/> Eventlist, installing eventlist content elements...<br />';
		@copy( JPATH_ROOT . "/$ce_src_dir/eventlist.xml",
		JPATH_ROOT . "/$ce_dst_dir/eventlist.xml");
		$install_content_ce = true;
	}
//
//	/* Weblinks */
//	if (file_exists(JPATH_ROOT. '/administrator/components/com_weblinks')){
//		echo '<img src="images/tick.png"/> Weblinks, installing weblinks content elements...<br />';
//		@copy( JPATH_ROOT . "/$ce_dst_dir/weblinks.xml",
//		JPATH_ROOT . "/$ce_dst_dir/weblinks.xml");
//		$install_content_ce = true;
//	}

	/* Seyret */
	if (file_exists(JPATH_ROOT. '/administrator/components/com_seyret')){
		echo '<img src="images/tick.png"/> Seyret, installing seyret video content elements...<br />';
		@copy( JPATH_ROOT . "/$ce_src_dir/seyret.xml",
		JPATH_ROOT . "/$ce_dst_dir/seyret.xml");
		$install_content_ce = true;
	}

	if($install_content_ce){
	/* Seyret */
		echo '<img src="images/tick.png"/> Joomla Content, installing standard content elements...<br />';
		@copy( JPATH_ROOT . "/$ce_src_dir/content.xml",
		JPATH_ROOT . "/$ce_dst_dir/content.xml");
		$install_content_ce = true;
	}

	echo '<img src="images/tick.png"> Loading default configurations...<br /><br/>
					</code>
				</td>
			</tr>
			<tr>
				<td style="padding:1em" colspan="2" align="center">
					<strong>Component successfully installed/updated</strong><br/>
				</td>
			</tr>
			<tr>
				<td style="padding:1em" colspan="2" align="center">
					<h2>Review and <em>save</em> component, modules and plugin parameters.</h2>
					<h2>This is a *non optional* step.</h2>
				</td>
			</tr>
		</table>';

	// Clear cache
	$file_list = JFolder::files($mosConfig_cachepath ,".xml");
	foreach ($file_list as $val) {
		if (strstr($val, "cache_")){
			@unlink($mosConfig_cachepath . "/" . $val);
		}
	}
	$cache = JFactory::getCache();
	$cache->clean();
	return "Component successfully installed.";
}

/** this function installs language files for installed languages
 * @param string $source_dir relative source directory (eg : /modules/cpsearch/), Requires slashes before and after!
 * @param bool $admin_lang Is administrator language ? default false
 * @param bool $verbose verbose output, echoes the moved and deleted files
 *
 */
function install_language($source_dir, $admin_lang = false, $verbose = false){
	if(empty($source_dir)) return false;

	$dst_dir = $admin_lang ? DS . 'administrator' . DS .'language' . DS :  DS .'language'. DS;
	$mosConfig_absolute_path = JPATH_ROOT;
	$language_files = array();
	$language_files = JFolder::files($mosConfig_absolute_path . $source_dir ,".ini");
	if($language_files){
		foreach($language_files as $file){
			if(preg_match('/^([^\.]*)?\.??/', $file, $matches)){
				$prefix = $matches[1];
				if(file_exists($mosConfig_absolute_path . DS . "language" . DS . $prefix)){
					@unlink($mosConfig_absolute_path . $dst_dir .$prefix . DS. $file);
					rename($mosConfig_absolute_path . $source_dir .$file,
						$mosConfig_absolute_path . $dst_dir .$prefix . DS. $file );
						if($verbose) echo "install $file <br/>";
				}
				else{
					if($verbose) echo "unlink $file <br/>";
					unlink($mosConfig_absolute_path . $source_dir .$file);
				}
			}
		}
	}
}

/**
* Function to save configuration on file
* @param array $cp_config params array
* @returns true if save succedded , false otherwise
*/
function saveConfig($cp_config, $config_file){

	$result = false;
	if(! is_array($cp_config)) return $result;

	$txt = "<?php\n";
	foreach ($cp_config as $k=>$v) {
		if (!get_magic_quotes_gpc()) {
			$v = addslashes( $v );
		}
		$txt .= "\$cp_config[\"$k\"]='$v';\n";
	}
	$txt .= "?>";

	if ($fp = fopen( $config_file, "w")) {
		$result = fwrite($fp, $txt, strlen($txt));
		fclose ($fp);
		if($result === false) echo '<img src="images/publish_x.png"/> Can\'t save config file<br />';
	}
	else{
		echo '<img src="images/publish_x.png"/> Can\'t open config file in write mode<br />';
	}

	return $result;
}

/** cancello ricorsivamente un cartella ed il suo contenuto */
function deleteDir($dir){
	if (substr($dir, strlen($dir)-1, 1)!= '/')
		$dir .= '/';
	if ($handle = opendir($dir)){
		while ($obj = readdir($handle)){
			if ($obj!= '.' && $obj!= '..'){
				if (is_dir($dir.$obj)){
					if (!deleteDir($dir.$obj))
						return false;
				}
				elseif (is_file($dir.$obj)){
					if (!unlink($dir.$obj))
						return false;
				}
			}
		}
		closedir($handle);
		if (!@rmdir($dir))
			return false;
		return true;
	}
	return false;
}