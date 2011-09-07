<?php

defined('_JEXEC') or die();

jimport('joomla.application.component.controller');

class cbactivityController extends JController
{
	function __construct()
	{
		parent::__construct();
	}
	
	function save()
	{
		$option = JRequest::getCmd('option');
		$this->setRedirect('index.php?option=' . $option);
		
		$post = JRequest::get('post');
		
		$row =& JTable::getInstance('DailyMessage', 'Table');
				
    if (!$row->bind($post)) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		if (!$row->store()) {
			return JError::raiseWarning(500, $row->getError());
		}
		
		$this->setMessage('Configuration Saved');
	}
	
	function remove()
	{
		$option = JRequest::getCmd('option');
		
		$this->setRedirect('index.php?option=' . $option);

		$db	=& JFactory::getDBO();
		$cid = JRequest::getVar('cid', array(), 'request', 'array');
		$count = count($cid);
		
		if ($count)
		{
		  $i=0;
		  while ($i < $count) {
  			$db->setQuery('DELETE FROM #__supera_log WHERE id = '.$cid[$i]);
        $db->query();
        $i++;
      }
			if (!$db->query()) {
				$this->setMessage('Error in sql query');
			} else {
  			if ($count > 1) {
  				$s = 'ies';
  			} else {
  				$s = 'y';
  			}
  			
  			$this->setMessage('Activit' . $s . ' removed');
  		}
		}
	}
	
	function listMessages()
	{
  global $mainframe;
  $limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
  $limitstart = JRequest::getVar('limitstart', 0);

		$option = JRequest::getCmd('option');
		
		$db	=& JFactory::getDBO();
    $query = "SELECT count(*) FROM #__supera_log";
    $db->setQuery( $query );
    $total = $db->loadResult();
    
		$query = "SELECT * FROM #__supera_log ORDER BY actidate DESC";
    $db->setQuery( $query, $limitstart, $limit );
		$rows = $db->loadObjectList();
		
    jimport('joomla.html.pagination');
    $pageNav = new JPagination($total, $limitstart, $limit);
    
		require_once(JPATH_COMPONENT.DS.'admin.cbactivity.html.php');
		HTML_cbactivity::listMessages( $option, $rows, $pageNav );
	}

	function configure()
	{
		$option = JRequest::getCmd('option');
		
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT * FROM #__supera_conf");
		$rows = $db->loadObjectList();
		
		require_once(JPATH_COMPONENT.DS.'admin.cbactivity.html.php');
		HTML_cbactivity::listConfiguration($option, $rows);
	}

	function CB_Config()
	{
		$option = JRequest::getCmd('option');
		
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT * FROM #__supera_conf");
		$rows = $db->loadObjectList();
		
		require_once(JPATH_COMPONENT.DS.'admin.cbactivity.html.php');
		HTML_cbactivity::listConfiguration($option, $rows);
	}
}

?>