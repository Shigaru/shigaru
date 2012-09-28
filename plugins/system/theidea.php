<?php

/**
 * @package plugin theidea
 * @copyright (C) 2010-2011 RicheyWeb - www.richeyweb.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * theidea Copyright (c) 2011 Michael Richey.
 * theidea is licensed under the http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * theidea version 1.2 for Joomla 1.6.x devloped by RicheyWeb
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

/**
 * theidea system plugin
 */
class plgSystemtheidea extends JPlugin {

    public $_theidea;
    public $_cookie;

    /**
     * Constructor
     *
     * @access	protected
     * @param	object	$subject The object to observe
     * @param 	array   $config  An array that holds the plugin configuration
     * @since	1.0
     */
    function plgSystemtheidea(&$subject, $config) {
        $this->_theidea = false;
        $this->_cookie = false;
        parent::__construct($subject, $config);
    }

    function onAfterDispatch() {
        $app = JFactory::getApplication();

        // plugin should only run in the front-end
        if ($app->isAdmin()) {
            $this->_theidea = true;
            return true;
        }

        // this shouldn't affect logged in users
        $user = JFactory::getUser();
        if ($user->id) {
            $this->_theidea = true;
            return true;
        }
        
        if($accepted=JRequest::getVar('plg_system_theidea',false,'COOKIE')) {
            // user has the long term cookie
            $this->_theidea = true;
            setcookie('plg_system_theidea',$accepted,time()+60*60*24*30);
            return true;
        }
        if ($app->getUserState('plg_system_theidea', false)) {
            $this->_theidea = true;
            // user has already accepted cookies
            if($this->params->get('longtermcookie',0)) {
                $accepted = JRequest::getVar('plg_system_theidea',false,'COOKIE');
                setcookie('plg_system_theidea',$accepted,time()+60*60*24*30);
            }
            return true;
        } else {
            if (JRequest::getVar('theidea', false)) {
                // user just accepted cookies
                $this->_theidea = true;
                $app->setUserState('plg_system_theidea', true);
                if($this->params->get('longtermcookie',0)) {
                    setcookie('plg_system_theidea',date('%Y-%m-%d %H:%i:%s'),time()+60*60*24*30);
                }
                return true;
            }
        }
        if(!$this->_theidea) {
        $this->_requestAccept();
            if ($this->_testHeaders()) {
                $this->_cleanHeaders();
            }
       $this->_theidea = true;
                $app->setUserState('plg_system_theidea', true);
                if($this->params->get('longtermcookie',0)) {
                    setcookie('plg_system_theidea',date('%Y-%m-%d %H:%i:%s'),time()+60*60*24*30);
                }    
        }
        return true;
    }
    
    function onAfterRender() {
        if(JFactory::getUser()->id) $this->_theidea = true;
        if($this->_theidea) {
            if($this->_cookie) header($this->_cookie);
            return true;
        }
        if ($this->_testHeaders()) {
            $this->_cleanHeaders();
        }
        return true;
    }

    function _testHeaders() {
        if(JFactory::getUser()->id) return false;
        foreach (headers_list() as $header) {
            if (preg_match('/Set-Cookie/', $header)) {
                $this->_cookie = $header;
                return true;
            }
        }
        return false;
    }

    function _cleanHeaders() {
        $phpversion = explode('.', phpversion());
        if ($phpversion[1] >= 3) {
            header_remove('Set-Cookie');
        } else {
            header('Set-Cookie:');
        }
    }

    function _blockJSCookies() {
        if(JFactory::getUser()->id) return true;
        $doc = JFactory::getDocument();
		$script=array();
		$script[]='jQuery(document).ready(function($){';
		$script[]='var oObjectwidth = jQuery(\'#homepromo\').width();';
		$script[]='var oWindowWidth = jQuery(window).width();';
		$script[]='var oWindowHeight = jQuery(window).height();';
		$script[]='var oLeftPosition  = (oWindowWidth - oObjectwidth) / 2;';
		$script[]='var oObjectHeight = jQuery(\'#theidea\').height()+110;';
		$script[]='var oTopPosition  = ((oWindowHeight - oObjectHeight)) / 2;';
		$script[]='if(oTopPosition < 100){';
		$script[]='jQuery(\'#theidea\').css({\'height\':(oWindowHeight-150)+\'px\',\'overflow-y\':\'auto\'});';
		$script[]='oTopPosition = 25;';
		$script[]='}';
		
		$script[]="\tjQuery.blockUI({ message: jQuery('#theidea'),css : { border : 'none', height: 'auto', 'text-align':'left','cursor': 'auto', 'width': (oObjectwidth+20)+'px', 'top': oTopPosition, 'left' : oLeftPosition   } });";
		$script[]="\tjQuery('.blockUI #theidea #close').click(function(){jQuery('#workareainit .workarea_wrapper #theidea').parent().fadeOut('slow'); jQuery.unblockUI(); });";
		$script[]="\tjQuery('#theidea').clone().prependTo( '#workareainit .workarea_wrapper' );jQuery('#theidea').hide();";
		$script[]="\tsetTimeout(function() {jQuery('#theidea').show();";
		$script[]="\tjQuery.unblockUI({ ";
		$script[]="\tonUnblock: function(){   ";
		$script[]="\tjQuery('.workarea_wrapper #theidea #close').click(function(){jQuery(this).parent().fadeOut('slow'); });}";
		$script[]="\t});";
		$script[]="\t}, 10000); ";
		$script[]='});';
		$doc->addScriptDeclaration(implode("\n",$script));
    }

    function _requestAccept() {
        if(JFactory::getUser()->id) return true;
        $menu = JSite::getMenu();
		if ($menu->getActive() == $menu->getDefault()) {
				$this->_blockJSCookies();
				$lang = JFactory::getLanguage();
				$this->loadLanguage('plg_system_theidea',JPATH_ADMINISTRATOR);
				$uri = $_SERVER['REQUEST_URI'];
				$query_string = explode('&', $_SERVER['QUERY_STRING']);
				if (count($query_string) && strlen($query_string[0])) {
					$uri.='&theidea=1';
				} else {
					$uri.='?theidea=1';
				}
				
				
				
				$msg = '<div class="content_box" id="theidea">
							<a id="close" class="close"></a>
							<h3>What is the shigaru community about?</h3>
							<ul class="mbot30">
								<li id="finding">Finding and sharing the best music video tutorials already on the web (Youtube, Google Videos, etc.)
								</li>
								<li id="categorizing">Categorizing them by instrument, level, genre and language.
								</li>
								<li id="notaggregator">Not just another content aggregator website.
								</li>
							</ul>
							<h3>Why categorize video tutorials already on Youtube, etc.?</h3>
							<ul class="mbot30">
								<li id="submit">It\'s really quick to submit a video url.
								</li>
								<li id="grabbed">The original title, video description and tags are automatically copied for you!
								</li>
								<li id="fillout">All you have to do is fill out a few more fields, that\'s all.
								</li>
							</ul>
							<h3>Help us grow this music tutorial database!</h3>
							<ul>
								<li id="signupto">
									<a href="" title="Click on this link to navigate to the sign up form">Sign up</a> and start submitting videos
								</li>
								<li id="coolprofile">Create your own cool profile page, make friends, promote your music or music related services... for free!
								</li>
								
							</ul>
							<div id="thanks">
								<div>
									<span class="nonvis">Thank you!</span>
								</div>	
							</div>
							<div class="clear"></div>
							</div>';
				//$msg.= '<p>'.JText::_('PLG_SYS_theidea_MESSAGE').'</p>';
				
			   // if(strlen(trim($this->params->get('policyurl','')))) {
				   // $msg.= '<p><a href="'.trim($this->params->get('policyurl','')).'">'.JText::_('PLG_SYS_theidea_POLICYTEXT').'</a></p>';
			   // }
				
				
				$doc = JFactory::getDocument();
				$doc->addCustomTag( $msg);
     }   
    }
}
