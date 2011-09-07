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

class FsfsControllerFaq extends FsfsController
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

    function pick()
    {
        JRequest::setVar( 'view', 'faqs' );
        JRequest::setVar( 'layout', 'pick'  );
        
        parent::display();
    }

	function edit()
	{
		JRequest::setVar( 'view', 'faq' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	function save()
	{
		$model =& $this->getModel('faq');

        $post = JRequest::get('post');
        $post['answer'] = JRequest::getVar('answer', '', 'post', 'string', JREQUEST_ALLOWRAW);
        
        $post['fullanswer'] = "";
        
        if (strpos($post['answer'],"system-readmore") > 0)
        {
            $pos = strpos($post['answer'],"system-readmore");
            $answer = substr($post['answer'], 0, $pos);
            $answer = substr($answer,0, strrpos($answer,"<"));
            
            $rest = substr($post['answer'], $pos);
            $rest = substr($rest, strpos($rest,">")+1);
            
            $post['answer'] = $answer;
            $post['fullanswer'] = $rest;                           
        }
        
		if ($model->store($post)) {
			$msg = JText::_( 'FAQ Saved!' );
		} else {
			$msg = JText::_( 'Error Saving FAQ' );
		}

		$link = 'index.php?option=com_fsf&view=faqs';
		$this->setRedirect($link, $msg);
	}


	function remove()
	{
		$model = $this->getModel('faq');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More FAQ Could not be Deleted' );
		} else {
			$msg = JText::_( 'FAQ(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}

	function unpublish()
	{
		$model = $this->getModel('faq');
		if (!$model->unpublish())
			$msg = JText::_( 'Error: There has been an error unpublishing an article' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}

	function publish()
	{
		$model = $this->getModel('faq');
		if (!$model->publish())
			$msg = JText::_( 'Error: There has been an error publishing an article' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}

	function orderup()
	{
		$model = $this->getModel('faq');
		if (!$model->changeorder(-1))
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}

	function orderdown()
	{
		$model = $this->getModel('faq');
		if (!$model->changeorder(1))
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}

	function saveorder()
	{
		$model = $this->getModel('faq');
		if (!$model->saveorder())
			$msg = JText::_( 'Error: There has been an error changing the order' );

		$this->setRedirect( 'index.php?option=com_fsf&view=faqs', $msg );
	}
}

//EENC
