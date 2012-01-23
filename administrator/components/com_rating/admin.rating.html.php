<?php
/**
* @version 1.3
* @package Blank
* @copyright (C) 2008 www.lbm-services.de
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( $mainframe->getPath('class') );

class myPat{
	function &createTemplate() {
		global $option;
		
		//require_once( $mosConfig_absolute_path . '/includes/patTemplate/patTemplate.php' );
		//require_once(  '/libraries/pattemplate/patTemplate.php' );
		require_once( JPATH_SITE . '/plugins/system/legacy/patfactory.php' );
 
		$tmpl =& patFactory::createTemplate( $option, true, false );
		$tmpl->setRoot( dirname( __FILE__ ) . '/tmpl' );
 
		return $tmpl;
	}
}

class ADMIN_html{
	function showConfig($obj, $option){
		$tmpl =& myPat::createTemplate();
		$tmpl->setAttribute('body', 'src', 'admin.html');
		$tmpl->loadTemplate('body');
		
		$tmpl->addVar('config', 'IPPROTECT', JHTML::_('select.booleanlist', 'ipprotect', 'class="inputbox"', CLASS_rating::getConfig('ipprotect')));
		$tmpl->addVar('config', 'DAYLOCK', CLASS_rating::getConfig('daylock'));
		$tmpl->addVar('config', 'LIMIT', CLASS_rating::getConfig('limit'));		
		$tmpl->addVar('config', 'OPTION', $option);
		
		$tmpl->setAttribute('config', 'visibility', 'visible');
	
		$tmpl->displayParsedTemplate('form');
	}

	function showManagement($rows, $pageNav, $option){
		$tmpl =& myPat::createTemplate();
		$tmpl->setAttribute('body', 'src', 'admin.html');
		$tmpl->loadTemplate('body');
		
		for($i=0, $n=count($rows);$i<$n;$i++){
			$row=$rows[$i];
			$tmpl->addVar('userrow', 'CB', JHTML::_('grid.id',$i, $row->id));
			$tmpl->addVar('userrow', 'ID', $row->id);
			$tmpl->addVar('userrow', 'ROWNUM', ($i+1));
			$tmpl->addVar('userrow', 'NAME', $row->name);
			$tmpl->addVar('userrow', 'USERNAME', $row->username);
			$tmpl->addVar('userrow', 'EMAIL', $row->email);
			$tmpl->addVar('userrow', 'MONTHLY', intval($row->var_rating));
			$tmpl->addVar('userrow', 'TOTAL', intval($row->total_rating));
			
			$tmpl->parseTemplate('userrow', 'a');
		}
		
		$tmpl->addVar('management', 'LISTFOOTER', $pageNav->getListFooter());
		$tmpl->addVar('management', 'OPTION', $option);
		$tmpl->addVar('management', 'ROWCOUNT', count($rows));
		$tmpl->setAttribute('management', 'visibility', 'visible');
		$tmpl->displayParsedTemplate('form');
	}
	
	function edit($kObj, $rows, $userObj, $option){
		$tmpl =& myPat::createTemplate();
		$tmpl->setAttribute('body', 'src', 'admin.html');
		$tmpl->loadTemplate('body');
		
		$tmpl->addVar('editform', 'NAME', $userObj->name);
		$tmpl->addVar('editform', 'USERNAME', $userObj->username);
		$tmpl->addVar('editform', 'USERID', $userObj->id);
		$tmpl->addVar('editform', 'MONTHLY', intval($kObj->var_rating));
		$tmpl->addVar('editform', 'TOTAL', intval($kObj->total_rating));

		for($i=0, $n=count($rows);$i<$n;$i++){
			$row=$rows[$i];
			$tmpl->addVar('ratings', 'CB', JHTML::_('grid.id',$i, $row->id));
			$tmpl->addVar('ratings', 'ROWNUM', ($i+1));
			$tmpl->addVar('ratings', 'ID', $row->id);
			$tmpl->addVar('ratings', 'TYPE', $row->type);
			$tmpl->addVar('ratings', 'NAME', $row->my_name);
			$tmpl->addVar('ratings', 'TEXT', $row->text);
			$tmpl->addVar('ratings', 'REPLY', $row->reply);
			$tmpl->addVar('ratings', 'TIME', $row->timestamp);
		
			$tmpl->parseTemplate('ratings', 'a');
		}
		
		$tmpl->addVar('editform', 'ROWCOUNT', count($rows));
		$tmpl->addVar('editform', 'OPTION', $option);
//		$tmpl->addVar('ratings', 'LISTFOOTER', $pageNav->getListFooter());
		$tmpl->setAttribute('editform', 'visibility', 'visible');
		$tmpl->displayParsedTemplate('form');
	}
}

?>
