<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class SubscriberViewSubscriber extends JView
{
	var $searchFields = array('a.subid','a.userid');
	var $selectedFields = array('a.*','b.gid','b.username');
	var $searchFieldsChoose = array('a.name','a.email','a.id','a.username');
	var $selectedFieldsChoose = array('a.*');
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function listing(){
		$pageInfo = null;
		$app =& JFactory::getApplication();
		$doc =& JFactory::getDocument();
		JHTML::_('behavior.modal','a.modal');
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName();
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.subid','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
		$selectedList = $app->getUserStateFromRequest( $paramBase."filter_lists",'filter_lists',0,'int');
		$selectedStatus = $app->getUserStateFromRequest( $paramBase."filter_status",'filter_status',0,'int');
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		if(empty($pageInfo->limit->value)) $pageInfo->limit->value = 500;
		$database	=& JFactory::getDBO();
		$displayFields = array();
		$displayFields['name'] = null;
		$displayFields['name']->fieldname = 'NAMECAPTION';
		$displayFields['email'] = null;
		$displayFields['email']->fieldname = 'EMAILCAPTION';
		$displayFields['html'] = null;
		$displayFields['html']->fieldname = 'RECEIVE_HTML';
		$filters = array();
		if(!empty($pageInfo->search)){
			foreach($displayFields as $fieldname => $onfield){
				if($fieldname == 'html') continue;
				$this->searchFields[] = 'a.'.$fieldname;
			}
			$searchVal = '\'%'.$database->getEscaped($pageInfo->search,true).'%\'';
			$filters[] = implode(" LIKE $searchVal OR ",$this->searchFields)." LIKE $searchVal";
		}
		$leftJoinQuery = array();
		if(empty($selectedList) || ($selectedStatus == -2)){
			$fromQuery = ' FROM '.acymailing::table('subscriber').' as a ';
			$leftJoinQuery[] = acymailing::table('users',false).' as b ON a.userid = b.id';
			if($selectedStatus == 1){
				$filters[] = 'a.accept > 0';
			}elseif($selectedStatus == -1){
				$filters[] = 'a.accept < 1';
			}elseif($selectedStatus == -2){
				$leftJoinQuery[] = acymailing::table('listsub').' as c on a.subid = c.subid '.(empty($selectedList) ? 'AND c.status = 1' : 'AND listid = '.$selectedList);
				$filters[] = 'c.listid IS NULL';
			}elseif($selectedStatus == 2){
				$filters[] = 'a.confirmed < 1';
			}elseif($selectedStatus == 3){
				$filters[] = 'a.enabled > 0';
			}elseif($selectedStatus == -3){
				$filters[] = 'a.enabled < 1';
			}
		}else{
			$fromQuery = ' FROM '.acymailing::table('listsub').' as c';
			$leftJoinQuery[] = acymailing::table('subscriber').' as a ON a.subid = c.subid';
			$leftJoinQuery[] = acymailing::table('users',false).' as b ON a.userid = b.id';
			$filters[] = 'c.listid = '.intval($selectedList);
			if(!in_array($selectedStatus,array(-1,1,2))) $selectedStatus = 1;
			$filters[] = 'c.status = '.$selectedStatus;
		}
		$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$this->selectedFields).$fromQuery;
		$query .= ' LEFT JOIN '.implode(' LEFT JOIN ',$leftJoinQuery);
		if(!empty($filters)){
			$query .= ' WHERE ('.implode(') AND (',$filters).')';
		}
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$database->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $database->loadObjectList('subid');
		$database->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $database->loadResult();

		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
		$filters = null;
		if(empty($selectedList)){
			$statusType = acymailing::get('type.statusfilter');
		}else{
			$statusType = acymailing::get('type.statusfilterlist');
		}
		$listsType = acymailing::get('type.lists');
		$filters->status = $statusType->display('filter_status',$selectedStatus);
		$filters->lists = $listsType->display('filter_lists',$selectedList);
		$query = 'SELECT name,id FROM #__core_acl_aro_groups';
		$database->setQuery( $query );
		$joomGroups = $database->loadObjectList('id');
		$joomGroups[0]->name = JText::_('VISITOR');
		$js = "function massactions(){
			if(window.document.adminForm.boxchecked.value < 1){
				window.document.getElementById('massaction').style.display = 'none';
				return;
			}
			i = 0;
			mylink = 'index.php?option=com_acymailing&ctrl=filter&tmpl=component&subid=';
			while(window.document.getElementById('cb'+i)){
				if(window.document.getElementById('cb'+i).checked) mylink += window.document.getElementById('cb'+i).value+',';
				i++;
			}
			window.document.getElementById('masslink').href= mylink;
			window.document.getElementById('massaction').style.display = '';
		}";
		$doc->addScriptDeclaration( $js );
		acymailing::setTitle(JText::_('Users'),'user','subscriber');
		$bar = & JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Link', 'import', JText::_('IMPORT'), acymailing::completeLink('data&task=import') );
		JToolBarHelper::custom('export', 'export', '',JText::_('EXPORT'), false);
		JToolBarHelper::divider();
		JToolBarHelper::addNew();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList(JText::_('VALIDDELETEITEMS',true));
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','subscriber-listing');
		$bar->appendButton( 'Link', 'acymailing', JText::_('JOOMEXT_CPANEL'), acymailing::completeLink('dashboard') );
		$this->assignRef('lists',$listsType->getData());
		$this->assignRef('toggleClass',acymailing::get('helper.toggle'));
		$this->assignRef('rows',$rows);
		$this->assignRef('filters',$filters);
		$this->assignRef('pageInfo',$pageInfo);
		$this->assignRef('joomGroups',$joomGroups);
		$this->assignRef('pagination',$pagination);
		$this->assignRef('config',acymailing::config());
		$this->assignRef('displayFields',$displayFields);
		$this->assignRef('customFields',acymailing::get('class.fields'));
	}
	function choose(){
		$pageInfo = null;
		$app =& JFactory::getApplication();
		$paramBase = ACYMAILING_COMPONENT.'.'.$this->getName().'_'.$this->getLayout();
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.name','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'asc',	'word' );
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		$db	=& JFactory::getDBO();
		$filters = array();
		if(!empty($pageInfo->search)){
			$searchVal = '\'%'.$db->getEscaped($pageInfo->search,true).'%\'';
			$filters[] = implode(" LIKE $searchVal OR ",$this->searchFieldsChoose)." LIKE $searchVal";
		}
		$query = 'SELECT SQL_CALC_FOUND_ROWS '.implode(',',$this->selectedFieldsChoose).' FROM #__users as a';
		if(!empty($filters)){
			$query .= ' WHERE ('.implode(') AND (',$filters).')';
		}
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$db->setQuery($query);
		$db->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $db->loadObjectList();
		$db->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $db->loadResult();
		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
		$this->assignRef('rows',$rows);
		$this->assignRef('pageInfo',$pageInfo);
		$this->assignRef('pagination',$pagination);
	}
	function form(){
		$subid = acymailing::getCID('subid');
		if(!empty($subid)){
			$subscriberClass = acymailing::get('class.subscriber');
			$subscriber = $subscriberClass->getFull($subid);
			$subscription = $subscriberClass->getSubscription($subid);
		}else{
			$listType = acymailing::get('class.list');
			$subscription = $listType->getLists();
			$subscriber = null;
			$subscriber->created = time();
			$subscriber->html = 1;
			$subscriber->confirmed = 1;
			$subscriber->blocked = 0;
			$subscriber->accept = 1;
			$subscriber->enabled = 1;
			$iphelper = acymailing::get('helper.user');
			$subscriber->ip = $iphelper->getIP();
		}

		acymailing::setTitle(JText::_('USER'),'user','subscriber&task=edit&subid='.$subid);
		$bar = & JToolBar::getInstance('toolbar');
		if(!empty($subscriber->userid)){
			$bar->appendButton( 'Link', 'edit', JText::_('EDIT_JOOMLA_USER'), 'index.php?option=com_users&task=edit&cid[]='.$subscriber->userid );
			JToolBarHelper::spacer();
		}
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::divider();
		$bar->appendButton( 'Pophelp','subscriber-form');
		$filters = null;
		$quickstatusType = acymailing::get('type.statusquick');
		$filters->statusquick = $quickstatusType->display('statusquick');
		$this->assignRef('subscriber',$subscriber);
		$this->assignRef('subscription',$subscription);
		$this->assignRef('filters',$filters);
		$this->assignRef('statusType',acymailing::get('type.status'));
	}
}
