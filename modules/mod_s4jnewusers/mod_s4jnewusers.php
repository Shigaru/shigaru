<?php
/**
 * @package Module s4j New Users for Joomla! 1.5.x, 1.6.x, 1.7.x and 2.5.x
 * @version $Id: mod_s4jnewusers$
 * @author Software4Joomla.com
 * @copyright (C) 2007 - 2012 Software4Joomla
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * CB framework
 * @global CBframework $_CB_framework
 */
global $_CB_framework, $_CB_database, $ueConfig, $mainframe, $_SERVER;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	if ( ! file_exists( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' ) ) {
		echo 'CB not installed';
		return;
	}
	include_once( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' );
} else {
	if ( ! file_exists( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' ) ) {
		echo 'CB not installed';
		return;
	}
	include_once( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' );
}
cbimport( 'cb.database' );

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

//if modul was copied, check the class
if( !class_exists("s4jNewUsers") ) {
		
	class s4jNewUsers {
		var $_s4j	= null;
		var $_db	= null;
		var $_params= null;
		
		function s4jNewUsers( &$params ) {
			global $database;
			$this->_db 		=& JFactory::getDBO();
			$this->_s4j		= new s4jLibNewUsers( $params, 2,  "mod_s4jnewusers" );
			$this->_params	=& $params;
		}
		
		
		function GetDataRows() {
			$max_user_shown	= $this->_params->get('max_user_shown', 3); 
			
			$sql = "SELECT DISTINCT
						u.id, u.username, u.name,
						s.userid as s4jonline";
			$sql .= $this->_s4j->GetFields();
			
			$sql .= " FROM ". $this->_s4j->GetTables();
			$sql .= $this->_s4j->GetFilter("c", "u", "WHERE");
			$sql .=	" ORDER BY registerdate DESC
					  LIMIT 0, " . $max_user_shown;
					
			$this->_db->setQuery( $sql );
			$rows = $this->_db->loadObjectList();
			return $rows;
		}
		
		function Show() {
			$columns_count	= $this->_params->get('columns_count', 5); 
			$rows			= $this->GetDataRows();
			
			$tr 			= 1;
			$ind			= 1;
			$rows_count		= count($rows); //NOTE: Improve later
	
			$result 		= "<div class=\"pe-container\"><ul id=\"pe-thumbs\" class=\"pe-thumbs\">"; // TODO: Change template
			foreach ($rows as $row) {
				if( $tr == 1) 
					$result .= "";
				$result .= "".$this->_s4j->GetUser( $row )."";
				
				if($tr == $columns_count) {
					$result .= "";
					$tr=1;
				} else if( $ind == $rows_count ) {
					for($j = $tr; $j < $columns_count; $j++) {
						$result .= "";
					}
					$result .= "";
	
				} else {
					$tr++;
				}
				$ind++;
	
			}
	
			$result 		.= "</ul></div>";
			return $result;
		}
	}


}
	

$obj = new s4jNewUsers( $params ); 
echo $obj->Show();
	

/*
$enablecache = $params->get('enablecache', 0);
if( $enablecache == 1 ) {
	$cache =& mosCache::getCache( 'mod_s4jnewusers' );
	$cache->call( 's4jNewUsersCaching',  $params );
} else {
	s4jNewUsersCaching( $params );
} 
*/
?>
