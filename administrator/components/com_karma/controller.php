<?php

defined('_JEXEC') or die();

jimport('joomla.application.component.controller');

class KarmaController extends JController
{
	function __construct()
	{
		parent::__construct();
	
	}
	
	function parameters()
	{		
			
		$row =& JTable::getInstance('KarmaConfiguration', 'Table');
					
		
		require_once(JPATH_COMPONENT.DS.'admin.karma.html.php');
		$option = JRequest::getCmd('option');
		HTML_Karma::parameters($option, $row);
		
	}
	
	
	function saveconfig()
	{
		$option = JRequest::getCmd('option');
		$this->setRedirect('index.php?option=' . $option);
		
		$post = JRequest::get('post');
		
		$row =& JTable::getInstance('KarmaConfiguration', 'Table');
				
		if (!$row->bind($post)) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		if (!$row->store()) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		$this->setMessage('Daylock saved...');
	}
	
	
	function save()
	{
		
		$option = JRequest::getCmd('option');
		$this->setRedirect('index.php?option=' . $option);
		
		$post = JRequest::get('post');
		
		$row =& JTable::getInstance('Karmatb', 'Table');
				
		if (!$row->bind($post)) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		if (!$row->store()) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		$this->setMessage('Karma saved...');
	}
	
	function edit()
	{
		$cid = JRequest::getVar('cid', array(), 'request', 'array');
		
		$row =& JTable::getInstance('Karmatb', 'Table');
					
		if (isset($cid[0])) {
			$row->load($cid[0]);
		}
		
		require_once(JPATH_COMPONENT.DS.'admin.karma.html.php');
		$option = JRequest::getCmd('option');
		HTML_Karma::edit($option, $row);
	}
	
	function delete()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);
		
		$cid = JRequest::getVar('cid', array(), 'request', 'array');
		
		$cids = implode(',', $cid);
		
			$db	=& JFactory::getDBO();
			$db->setQuery("DELETE FROM `#__karma_tb` where `user_id` in ($cids)");
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
			
			$this->setMessage('Karma(s) deleted from database...');
		}
	
	
	function ResetMonthly()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);
		
		$cid = JRequest::getVar('cid', array(), 'request', 'array');
		
		$cids = implode(',', $cid);
		
			$db	=& JFactory::getDBO();
			$db->setQuery("update `#__karma_tb` set `var_karma` = '0' where `user_id` in ($cids)");
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
			
			$this->setMessage('Monthly Karmas reset');
		}
	
	
	function ResetAllMonthly()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);

		$db	=& JFactory::getDBO();
	
			$db->setQuery('update `#__karma_tb` set `var_karma` = "0" where 1');
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
			
			$this->setMessage('All monthly Karmas reset');
		}
	
	
	function ResetAllTotal()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);

		$db	=& JFactory::getDBO();
	
			$db->setQuery('update `#__karma_tb` set `total_karma` = "0" where 1');
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
			
			$this->setMessage('All total Karmas reset');
		}
	
	function ResetTotal()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);
		
		$cid = JRequest::getVar('cid', array(), 'request', 'array');
		
		$cids = implode(',', $cid);
		
			$db	=& JFactory::getDBO();
			$db->setQuery("update `#__karma_tb` set `total_karma` = '0' where `user_id` in ($cids)");
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
			
		$this->setMessage('Karma reset...' . $action);
	}
	
	function listMessages()
	{
		$option = JRequest::getCmd('option');
		
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT * FROM #__karma_tb ORDER BY user_id ASC");
		$rows = $db->loadObjectList();
		
		require_once(JPATH_COMPONENT.DS.'admin.karma.html.php');
		HTML_Karma::listMessages($option, $rows);
	}
}

?>