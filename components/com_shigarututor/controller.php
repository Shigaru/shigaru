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
class ShigarututorController extends JController
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
	 * Method to display extract the last activity for the channel
	 *
	 * @access    public
	 */
	
	function getrecentchannelactivity(){
		  require_once(JPATH_SITE.DS.'components'.DS.'com_shigarututor'.DS.'shigarututor.class.php');
		  $f = new shigarututorTools;
		  $oActivity = $f->getRecentChannelActivity();
		  echo $oActivity;
		  exit;
	}
	
	/**
	 * Method to display extract the last activity for the channel
	 *
	 * @access    public
	 */
	
	function getchannelplaylists(){
		  require_once(JPATH_SITE.DS.'components'.DS.'com_shigarututor'.DS.'shigarututor.class.php');
		  $f = new shigarututorTools;
		  $oPlaylists = $f->getChannelPlaylists();
		  echo $oPlaylists;
		  exit;
	}
	
	/**
	 * Method to display the shigaru video page
	 *
	 * @access    public
	 */
	
	function gotovideo(){
		  require_once(JPATH_SITE.DS.'components'.DS.'com_shigarututor'.DS.'shigarututor.class.php');
		  $lang = JFactory::getLanguage();	
		  $f = new shigarututorTools;
		  $url = '';
		  $video_id = Jrequest::getVar( 'video_id', '' );
		  $oShigaruVideo = $f->getVideoByExternalId($video_id);
		  $app = & JFactory::getApplication();
		  if($oShigaruVideo)
			$url = JRoute::_('index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=28&video_id='.$oShigaruVideo->id.'&lang='.substr($lang->getTag(),0,2));
			else{
					$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
					JError::raiseNotice( 100, JText::_('NOTYETINSHIGARU'));
				}
		  $app->redirect( $url );
	}

}
