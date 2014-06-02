<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_1
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ShigarucontactController extends JController
{
	/**
	 * Method to display the view
	 *
	 * @access    public
	 */
	function display()
	{
		parent::display();
	}
	
	/**
	 * Method to send the message and respond with confimartion message
	 *
	 * @access    public
	 */
	
	function sendcontactmessage(){
			$app = & JFactory::getApplication();
			$name     =   Jrequest::getVar( 'name', '' );;  
			$email    =   Jrequest::getVar( 'email', '' );
			$subject  =   Jrequest::getVar( 'subject', '' );  
			$message  =   Jrequest::getVar( 'message', '' );
			$mailer =& JFactory::getMailer();
			$config =& JFactory::getConfig();
			$sender = array( 
				$config->getValue( 'config.mailfrom' ),
				$config->getValue( 'config.fromname' ) );
			$mailer->setSender($sender);
			$recipient = array('admin@shigaru.com');
			$mailer->addRecipient($recipient);
			$mailer->setSubject($subject);
			$mailer->setBody($body);
			$body   = $message.' <br /> Message sent by:'.$name.'('.$email.')';
			$mailer->isHTML(true);
			$mailer->Encoding = 'base64';
			$mailer->setBody($body);
			$send =& $mailer->Send();
			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
			if ( $send !== true ) {
				JError::raiseWarning( 100, JText::_('SHIGCONTACT_EMAILSENTERROR').': ' . $send->message);
			} else {
				$app =& JFactory::getApplication();
				$app->enqueueMessage(JText::_('SHIGCONTACT_EMAILSENT'));
			}
			
		   $app->redirect( $url );
	}

}
