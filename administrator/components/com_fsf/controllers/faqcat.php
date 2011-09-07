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
<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//SENC

class FsfsControllerFaqcat extends FsfsController
{

	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'unpublish', 'unpublish' );
		$this->registerTask( 'publish', 'publish' );
		$this->registerTask( 'orderup', 'orderup' );
		$this->registerTask( 'orderdown', 'orderdown' );
		$this->registerTask( 'saveorder', 'saveorder' );
	}


	function edit()
	{
		JRequest::setVar( 'view', 'faqcat' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	function save()
	{
		$model =& $this->getModel('faqcat');

        $post = JRequest::get('post');
        $post['description'] = JRequest::getVar('description', '', 'post', 'string', JREQUEST_ALLOWRAW);

		if ($model->store($post)) {
			$msg = JText::_( 'FAQ Category Saved!' );
		} else {
			$msg = JText::_( 'Error Saving FAQ Category' );
		}

		$link = 'index.php?option=com_fsf&view=faqcats';
		$this->setRedirect($link, $msg);
	}


	function remove()
	{
		$model = $this->getModel('faqcat');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More FAQ Categories Could not be Deleted' );
		} else {
			$msg = JText::_( 'FAQ Category(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}

	function unpublish()
	{
		$model = $this->getModel('faqcat');
		if (!$model->unpublish())
			$msg = JText::_( 'Error: There has been an error unpublishing an article' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}

	function publish()
	{
		$model = $this->getModel('faqcat');
		if (!$model->publish())
			$msg = JText::_( 'Error: There has been an error publishing an article' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}

	function orderup()
	{
		$model = $this->getModel('faqcat');
		if (!$model->changeorder(-1))
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}

	function orderdown()
	{
		$model = $this->getModel('faqcat');
		if (!$model->changeorder(1))
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}

	function saveorder()
	{
		$model = $this->getModel('faqcat');
		if (!$model->saveorder())
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqcats', $msg );
	}
}

//EENC
