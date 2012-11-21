<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

//No Permision
defined('_JEXEC') or die('Restricted access');

// Imports
jimport('joomla.application.component.view');

class AcesefViewTags extends JView {

	function display($tpl = null) {
		$AcesefConfig	= AcesefFactory::getConfig();
		$mainframe 		=& JFactory::getApplication();
		$document		=& JFactory::getDocument();
		$jconfig		=& JFactory::getConfig();
		$params 		= $mainframe->getParams();
		$pathway 		= $mainframe->getPathway();
		$menu			= $mainframe->getMenu()->getActive();
		
		$this->data = false;
		
		$this->tag = trim(JRequest::getString('tag', null));
		
		if ($this->tag == '0') {
			$params->set('page_title', JText::_('All Tags'));
		} 
		elseif ($this->tag != '') {
			$params->set('page_title', $this->tag);
			$pathway->addItem($this->escape($this->tag));
			
			$this->data = $this->get('Data');
		}
		
		$title = $params->get('page_title', '');
		if (!empty($title)) {
			$document->setTitle($title);

			if ($jconfig->getValue('MetaTitle')) {
				$document->setMetadata('title', $title);
			}
		}

		$this->assignRef('AcesefConfig', 	$AcesefConfig);
		$this->assignRef('params', 			$params);
		$this->assignRef('items',			$this->get('Items'));
		$this->assignRef('pagination',		$this->get('Pagination'));
		
		parent::display($tpl);
	}
}