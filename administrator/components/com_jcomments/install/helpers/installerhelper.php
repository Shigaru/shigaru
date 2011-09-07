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
 * @copyright (C) 2008 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

class JCommentsInstallerHelper
{
	/**
	 * Returns component's version info from .xml file
	 *
	 * @return object Object with two fields: releaseVersion and releaseDate 
	 */
	function getVersionInfo()
	{
		static $versionInfo;
		global $mainframe;

		if (!isset($versionInfo)) {
			
			$versionInfo = new StdClass();
			$versionInfo->releaseVersion = 'x.x.x.x';
			$versionInfo->releaseDate = date('Y');

			$file = JCOMMENTS_ADMIN . DS . 'jcomments.xml';
			
			if (!is_file($file)) {
				$file = JCOMMENTS_ADMIN . DS . 'jcomments10.xml';
				
				if (!is_file($file)) {
					$file = JCOMMENTS_ADMIN . DS . 'jcomments15.xml';
					
					if (!is_file($file)) {
						$file = JCOMMENTS_ADMIN . DS . 'manifest.xml';
					}
				}
			}
			
			if (JCOMMENTS_JVERSION == '1.0') {
				require_once ($mainframe->getCfg('absolute_path') . DS . 'includes' . DS . 'domit' . DS . 'xml_domit_lite_include.php');

				$xmlDoc = new DOMIT_Lite_Document();
				$xmlDoc->resolveErrors(false);
			
			
				if (is_file($file)) {
					if ($xmlDoc->loadXML($file, false, true)) {
						$root = &$xmlDoc->documentElement;
						if (($root->getTagName() == 'mosinstall' || $root->getTagName() == 'install') && ($root->getAttribute("type") == "component")) {
							$element = &$root->getElementsByPath('creationDate', 1);
							$versionInfo->releaseDate = $element ? $element->getText() : date('Y');
							$element = &$root->getElementsByPath('version', 1);
							$versionInfo->releaseVersion = $element ? $element->getText() : '';
						}
					}
				}
			} else if (JCOMMENTS_JVERSION == '1.5') {
				$data = JApplicationHelper::parseXMLInstallFile($file);
				$versionInfo->releaseDate = $data['creationdate'];
				$versionInfo->releaseVersion = $data['version'];
			}
		}
		
		return $versionInfo;
	}
	
	/**
	 * Chmods files and directories recursivly to given permissions
	 *
	 * @param	string	$path		Root path to begin changing mode [without trailing slash]
	 * @param	string	$filemode	Octal representation of the value to change file mode to [null = no change]
	 * @param	string	$foldermode	Octal representation of the value to change folder mode to [null = no change]
	 * @return	boolean	True if successful [one fail means the whole operation failed]
	 */
	function setPermissions( $path, $filemode = '0644', $foldermode = '0755' )
	{
		// Initialize return value
		$ret = true;
		
		if (is_dir($path)) {
			$dh = opendir($path);
			while (($file = readdir($dh)) !== false) {
				if ($file != '.' && $file != '..') {
					$fullpath = $path . '/' . $file;
					if (is_dir($fullpath)) {
						if (!JCommentsInstallerHelper::setPermissions($fullpath, $filemode, $foldermode)) {
							$ret = false;
						}
					} else {
						if (isset($filemode)) {
							if (!@ chmod($fullpath, octdec($filemode))) {
								$ret = false;
							}
						}
					}
				}
			}
			closedir($dh);
			if (isset($foldermode)) {
				if (!@ chmod($path, octdec($foldermode))) {
					$ret = false;
				}
			}
		} else {
			if (isset($filemode)) {
				$ret = @ chmod($path, octdec($filemode));
			}
		}
		return $ret;
	}

	function deleteFile( $file )
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			jimport('joomla.filesystem.file');
			return JFile::delete($file);
		} else {
			@unlink($file);
		}
		return true;
	}

	function copyFile( $src, $dst )
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			jimport('joomla.filesystem.file');
			return JFile::copy($src, $dst);
		} else {
			return @copy($src, $dst);
		}
	}

	function installPlugin($name, $element, $folder, $files, $message, $errorMessage, &$installer)
	{
		static $ordering, $plugins;

		$db =& JCommentsFactory::getDBO();

		if (JCOMMENTS_JVERSION == '1.0') {
			global $mainframe;
			$pluginsName = 'mambots';
			$pluginsTable = '#__mambots';
			$pluginsDstPath = $mainframe->getCfg('absolute_path') . DS . 'mambots' . DS . $folder;
			$pluginsQuery = "INSERT INTO `#__mambots` (`name`, `element`, `folder`, `access`, `ordering`, `published` ) VALUES ('%s', '%s', '%s', 0, %s, 1 );";
			$pluginsExt = 'x10';
		} else if (JCOMMENTS_JVERSION == '1.5') {
			$version = new JVersion();
			if (version_compare('1.6', $version->getShortVersion()) <= 0) {
				$pluginsName = 'plugins';
				$pluginsTable = '#__extensions';
				$pluginsDstPath = JPATH_ROOT . DS . 'plugins' . DS . $folder;
				$pluginsQuery = "INSERT INTO `#__extensions` (`type`, `name`, `element`, `folder`, `access`, `ordering`, `enabled`) VALUES ('plugin', '%s', '%s', '%s', 1, %s, 1 );";
				$pluginsExt = 'x15';
			} else {
				$pluginsName = 'plugins';
				$pluginsTable = '#__plugins';
				$pluginsDstPath = JPATH_ROOT . DS . 'plugins' . DS . $folder;
				$pluginsQuery = "INSERT INTO `#__plugins` (`name`, `element`, `folder`, `access`, `ordering`, `published` ) VALUES ('%s', '%s', '%s', 0, %s, 1 );";
				$pluginsExt = 'x15';
			}
		}

		if (empty($ordering)) {
			$db->setQuery("SELECT folder, MAX(ordering) as maxid FROM `" . $pluginsTable . "` GROUP BY `folder`;");
			$ordering = @$db->loadObjectList('folder');
			//echo $db->getErrorMsg();
		}

		if (empty($plugins)) {
			$db->setQuery("SELECT CONCAT(folder, '.', element) as plugin FROM `" . $pluginsTable . "` WHERE `folder` <> '' order by `folder`;");
			$plugins = $db->loadResultArray();
			//echo $db->getErrorMsg();
		}

		$pluginsSrcPath = JCOMMENTS_ADMIN . DS . 'install' . DS . 'plugins' . DS . $folder;

		if(!is_writable($pluginsDstPath . DS)) {
			@chmod($pluginsDstPath . DS, 0755);
		}

		$result = true;

		$files[] = $element . '.php';
		$files[] = $element . '.' . $pluginsExt;

		foreach($files as $file) {

		 	$dstFileName = $pluginsDstPath . DS . $file;
		 	$srcFileName = $pluginsSrcPath . DS . $file;

			if (strpos($dstFileName, $pluginsExt) !== false) {
				$dstFileName = str_replace($pluginsExt, 'xml', $dstFileName);
			}

		 	if (is_file($dstFileName)) {
		 		JCommentsInstallerHelper::deleteFile($dstFileName);
		 	}

		 	$result = $result && JCommentsInstallerHelper::copyFile($srcFileName, $dstFileName);
		}

		if (!in_array($folder . '.' . $element, $plugins)) {
			$maxId = isset($ordering[$folder]) ? intval($ordering[$folder]->maxid) + 1 : 0;
			$db->setQuery(sprintf($pluginsQuery, $name, $element, $folder, $maxId));
			$db->query();
		}
		
		if ($message != '') {
			$installer->addMessage(JText::_($message), $result);
			
			if (!$result && $errorMessage != '') {
				$installer->addWarning(JText::sprintf($errorMessage, $pluginsName));
			}
		}
	}

	function uninstallPlugin($element, $folder, $files = array())
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			global $mainframe;
			$pluginsTable = '#__mambots';
			$pluginsDstPath = $mainframe->getCfg('absolute_path') . DS . 'mambots' . DS . $folder;
		} else if (JCOMMENTS_JVERSION == '1.5') {
			$version = new JVersion();
			if (version_compare('1.6.0.0', $version->getShortVersion()) <= 0) {
				$pluginsTable = '#__extensions';
				$pluginsDstPath = JPATH_ROOT . DS . 'plugins' . DS . $folder;
			} else {
				$pluginsTable = '#__plugins';
				$pluginsDstPath = JPATH_ROOT . DS . 'plugins' . DS . $folder;
			}
		}

		$files[] = $element . '.php';
		$files[] = $element . '.xml';

		foreach($files as $file) {

		 	$dstFileName = $pluginsDstPath . DS . $file;

		 	if (is_file($dstFileName)) {
		 		JCommentsInstallerHelper::deleteFile($dstFileName);
		 	}
		}

		$db =& JCommentsFactory::getDBO();
		$db->setQuery("DELETE FROM `" . $pluginsTable . "` WHERE `element` = '" . $element . "' and `folder` = '" . $folder . "';");
		$db->query();
	}

	function extractArchive( $source , $destination )
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			global $mainframe;
			require_once( $mainframe->getCfg('absolute_path') . '/administrator/includes/pcl/pclzip.lib.php' );
			require_once( $mainframe->getCfg('absolute_path') . '/administrator/includes/pcl/pclerror.lib.php' );

			$zipfile = new PclZip( $source );
			if((substr(PHP_OS, 0, 3) == 'WIN')) {
				define('OS_WINDOWS',1);
			} else {
				define('OS_WINDOWS',0);
			}
			return $zipfile->extract(PCLZIP_OPT_PATH, $destination);

		} else {
			jimport('joomla.filesystem.file');
			jimport('joomla.filesystem.folder');
			jimport('joomla.filesystem.archive');
			jimport('joomla.filesystem.path');

			$destination = JPath::clean( $destination );
			$source	= JPath::clean( $source );
			return JArchive::extract($source , $destination);
		}
	}

	function extractJCommentsPlugins()
	{
		$source	= JCOMMENTS_BASE . DS . 'plugins' . DS . 'plugins.zip';
		$destination = JCOMMENTS_BASE . DS . 'plugins' . DS;
	
		return JCommentsInstallerHelper::extractArchive($source , $destination);
	}

	function removeJCommentsPlugins()
	{
		$source	= JCOMMENTS_BASE . DS . 'plugins' . DS . 'plugins.zip';
		$destination = JCOMMENTS_BASE . DS . 'plugins' . DS;
	
		return JCommentsInstallerHelper::extractArchive($zip , $destination);
	}
}
?>