<?php

/**
 * @package plugin ePrivacy
 * @copyright (C) 2010-2011 RicheyWeb - www.richeyweb.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ePrivacy Copyright (c) 2011 Michael Richey.
 * ePrivacy is licensed under the http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * ePrivacy version 1.2 for Joomla 1.6.x devloped by RicheyWeb
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

/**
 * ePrivacy system plugin
 */
class plgSystemePrivacy extends JPlugin {

    public $_eprivacy;
    public $_cookie;

    /**
     * Constructor
     *
     * @access	protected
     * @param	object	$subject The object to observe
     * @param 	array   $config  An array that holds the plugin configuration
     * @since	1.0
     */
    function plgSystemePrivacy(&$subject, $config) {
        $this->_eprivacy = false;
        $this->_cookie = false;
        parent::__construct($subject, $config);
    }

    function onAfterInitialise() {
        $app = JFactory::getApplication();

        // plugin should only run in the front-end
        if ($app->isAdmin()) {
            $this->_eprivacy = true;
            return true;
        }

        // this shouldn't affect logged in users
        $user = JFactory::getUser();
        if ($user->id) {
            $this->_eprivacy = true;
            return true;
        }
        if($accepted=JRequest::getVar('plg_system_eprivacy',false,'COOKIE')) {
            // user has the long term cookie
            $this->_eprivacy = true;
            setcookie('plg_system_eprivacy',$accepted,time()+60*60*24*30);
            return true;
        }
        if ($app->getUserState('plg_system_eprivacy', false)) {
            $this->_eprivacy = true;
            // user has already accepted cookies
            if($this->params->get('longtermcookie',0)) {
                $accepted = JRequest::getVar('plg_system_eprivacy',false,'COOKIE');
                exit();
                setcookie('plg_system_eprivacy',$accepted,time()+60*60*24*30);
            }
            return true;
        } else {
            if (JRequest::getVar('eprivacy', false)) {
                // user just accepted cookies
                $this->_eprivacy = true;
                $app->setUserState('plg_system_eprivacy', true);
                if($this->params->get('longtermcookie',0)) {
                    setcookie('plg_system_eprivacy',date('%Y-%m-%d %H:%i:%s'),time()+60*60*24*30);
                }
                return true;
            }else{
					// force accepted cookies
					$this->_eprivacy = true;
					$app->setUserState('plg_system_eprivacy', true);
					$this->_requestAccept();
					if($this->params->get('longtermcookie',0)) {
						setcookie('plg_system_eprivacy',date('%Y-%m-%d %H:%i:%s'),time()+60*60*24*30);
					}
				}
        }
        if(!$this->_eprivacy) {
        $this->_requestAccept();
            if ($this->_testHeaders()) {
                $this->_cleanHeaders();
            }
        // force accepted cookies
		/*$this->_eprivacy = true;
		$app->setUserState('plg_system_eprivacy', true);
		setcookie('plg_system_eprivacy','1',time()+60*60*24*30);*/
        }
        return true;
    }
    
    function onAfterRender() {
        if(JFactory::getUser()->id) $this->_eprivacy = true;
        if($this->_eprivacy) {
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
        $script[]='if(!document.__defineGetter__) {';
        $script[]="\tObject.defineProperty(document, 'cookie', {";
        $script[]="\t\tget: function(){return ''},";
        $script[]="\t\tset: function(){return true},";
//        $script[]="\t\tconfigurable:false"; // it sucks that this doesn't work for the cookie object
        $script[]="\t});";
        $script[]='} else {';
        $script[]="\t".'document.__defineGetter__("cookie", function() { return \'\';} );';
        $script[]="\t".'document.__defineSetter__("cookie", function() {} );';
        $script[]='}';
        $doc->addScriptDeclaration(implode("\n",$script));
    }

    function _requestAccept() {
        if(JFactory::getUser()->id) return true;
        $lang = JFactory::getLanguage();
        $this->loadLanguage('plg_system_eprivacy',JPATH_ADMINISTRATOR);
        $uri = $_SERVER['REQUEST_URI'];
        $query_string = explode('&', $_SERVER['QUERY_STRING']);
         $doc = JFactory::getDocument();
        $script=array();
        $script[]='jQuery(document).ready(function($){';
        $script[]="\tjQuery('#theidea').clone().prependTo( '#workareainit .workarea_wrapper' );";
        $script[]="\tjQuery('.workarea_wrapper #theidea #close').click(function(){jQuery(this).parent().fadeOut('slow'); });";
        $script[]="\tjQuery('.shigarunotice .close').click(function(){jQuery(this).parents('#system-message').fadeOut('slow');});";
        $script[]="\tjQuery('.workarea_wrapper #theidea').show();";
        $script[]='});';
        $doc->addScriptDeclaration(implode("\n",$script));
        if (count($query_string) && strlen($query_string[0])) {
            $uri.='&eprivacy=1';
        } else {
            $uri.='?eprivacy=1';
        }
        $msg.= '<p class="shigarunotice"><span class="close"></span>'.JText::_('PLG_SYS_EPRIVACY_MESSAGE');
        
        if(strlen(trim($this->params->get('policyurl','')))) {
            $msg.= '<a target="_blank" title="'.JText::_('PLG_SYS_EPRIVACY_POLICYTEXTTITLE').'" href="'.trim($this->params->get('policyurl','')).'">'.JText::_('PLG_SYS_EPRIVACY_POLICYTEXT').'</a>'.JText::_('PLG_SYS_EPRIVACY_POLICYTEXTEND').'</p>';
        }
        
        if($this->params->get('lawlink',1)) {
            $langtag = explode('-',JFactory::getLanguage()->getTag());
            $langtag = strtoupper($langtag[0]);
            if(in_array($langtag,array('BG','ES','CS','DA','DE','ET','EL','EN','FR','GA','IT','LV','LT','HU','MT','NL','PL','PT','RO','SK','SL','FI','SV'))) {
                $linklang = $langtag;
            } else {
                $linklang = 'EN';
            }
            $msg.= '<p><a href="http://eur-lex.europa.eu/LexUriServ/LexUriServ.do?uri=CELEX:32002L0058:'.$linklang.':NOT" onclick="window.open(this.href);return false;">'.JText::_('PLG_SYS_LAWLINK_TEXT').'</a></p>';
        }
        
        $msge = '</div><div class="content_box" id="theidea">
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
					<h3>Submit the url of a video tutorial in just under 1 minute!</h3>
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
		
		
		$doc = JFactory::getDocument();
		$doc->addCustomTag( $msge);
        
        
        $app = JFactory::getApplication();
        $app->enqueueMessage($msg, '');
    }
}
