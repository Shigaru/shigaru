<?php
/**
* Captcha Tab Class for handling CB Registration, CB lost password,  CB member email and CB Contact form submissions
* @version $Id$
* @package plug_cbcaptcha
* @subpackage cb.captcha.php
* @author Nant and Beat
* @copyright (C) Nant, JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL v2
* @final 2.0
*/

/** ensure this file is being included by a parent file */
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

/** These should be present in default_language file!
if (!defined('_UE_CAPTCHA_Label')) DEFINE('_UE_CAPTCHA_Label','Security Code');
if (!defined('_UE_CAPTCHA_Enter_Label')) DEFINE('_UE_CAPTCHA_Enter_Label','Enter Security Code');
if (!defined('_UE_CAPTCHA_Desc')) DEFINE('_UE_CAPTCHA_Desc','Enter Security Code from image. If no image is present then try disabling your advertisement blocker and then refresh this page. Otherwise please contact the website administrator for assistance.');
if (!defined('_UE_CAPTCHA_NOT_VALID')) DEFINE('_UE_CAPTCHA_NOT_VALID','Invalid Security Code');
if (!defined('_UE_CAPTCHA_ALT_IMAGE')) DEFINE('_UE_CAPTCHA_ALT_IMAGE','Image with security code embedded in it');
if (!defined('_UE_CAPTCHA_AUDIO')) DEFINE('_UE_CAPTCHA_AUDIO','click here to hear the letters');
if (!defined('_UE_CAPTCHA_AUDIO_POPUP_TITLE')) DEFINE('_UE_CAPTCHA_AUDIO_POPUP_TITLE','CB Captcha Audio Playback');
if (!defined('_UE_CAPTCHA_AUDIO_POPUP_DESCRIPTION')) DEFINE('_UE_CAPTCHA_AUDIO_POPUP_DESCRIPTION','Listen to audio playback of captcha image');
if (!defined('_UE_CAPTCHA_AUDIO_DOWNLOAD')) DEFINE('_UE_CAPTCHA_AUDIO_DOWNLOAD','Click to externally play or download audio file');
if (!defined('_UE_CAPTCHA_AUDIO_CLICK2DOWNLOAD')) DEFINE('_UE_CAPTCHA_AUDIO_CLICK2DOWNLOAD','(right-click or control-click)');
if (!defined('_UE_CAPTCHA_AUDIO_POPUP_CLOSEWINDOW')) DEFINE('_UE_CAPTCHA_AUDIO_POPUP_CLOSEWINDOW','Click to close window');
**/

DEFINE('_CAPTCHAPGPOP_media'
	,'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n'
	.'<html xmlns="http://www.w3.org/1999/xhtml">\n'
	.'  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>[captchatitle]</title></head>\n'
	.'  <body bgcolor="#9999ff">\n'
	.'    <div align="center">\n'
	.'      <b style ="font-size:12px;font-family:Lucida,sans-serif;line-height:1.6">[captchatitle]</b><br />\n'
	.'      <object width="[captchaobjectwidth]" height="[captchaobjectheight]" type="[captchaobjtypetag]" data="[captchafilepath]">\n'
	.'        <param name="src" value="[captchafilepath]" />\n'
	.'        <param name="type" value="[captchaobjtypetag]" />\n'
	.'        <param name="autostart" value="true" />\n'
	.'        <param name="autoplay" value="true" />\n'
	.'        <param name="showcontrols" value="1" />\n'
	.'        <param name="showstatusbar" value="1" />\n'
	.'        <embed src ="[captchafilepath]"\n'
	.'               type="[captchaembtypetag]"\n'
	.'               autoplay="true"\n'
	.'               width="[captchaobjectwidth]"\n'
	.'               height="[captchaobjectheight]"\n'
	.'               bgcolor="#9999ff">\n'
	.'        </embed>\n'
	.'      </object><br />\n'
	.'    </div>\n'
	.'    <b style ="font-size:12px;font-family:Lucida,sans-serif;font-style:italic;line-height:1.6">[captchadescription]</b><br />\n'
	.'    <p style="font-size:12px;font-family:Lucida,sans-serif;text-align:center">\n'
	.'      <a href="[captchafilepath]">' . _UE_CAPTCHA_AUDIO_DOWNLOAD . '</a>\n'
	.'      <br /><span style="font-size:10px">' . _UE_CAPTCHA_AUDIO_CLICK2DOWNLOAD . '</span>\n'
	.'    </p>\n'
	.'    <form action="..." >\n'
	.'      <div align="center">\n'
	.'        <input type="button" value="' . _UE_CAPTCHA_AUDIO_POPUP_CLOSEWINDOW . '" onclick="javascript:window.close();" />\n'
	.'      </div>\n'
	.'    </form>\n'
	.'  </body>\n'
	.'</html>');


if (isset($_PLUGINS)) {
//	$_PLUGINS->registerFunction( 'onBeforeRegisterForm',		'onBeforeRegisterForm',			'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onBeforeUserRegistration',	'onBeforeUserRegistration',		'getcaptchaTab' );

	$_PLUGINS->registerFunction( 'onLostPassForm', 				'onLostPassForm',				'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onLostPassForm', 				'onLostPassFormB',				'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onBeforeNewPassword',			'onBeforeNewPassword',			'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onStartNewPassword',			'onStartNewPassword',			'getcaptchaTab' );

	$_PLUGINS->registerFunction( 'onAfterEmailUserForm', 		'onAfterEmailUserForm',			'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onBeforeEmailUser',			'onBeforeEmailUser',			'getcaptchaTab' );

	$_PLUGINS->registerFunction( 'onAfterEmailToContactForm', 	'onAfterEmailToContactForm',	'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onBeforeSendEmailToContact',	'onBeforeSendEmailToContact',	'getcaptchaTab' );

	$_PLUGINS->registerFunction( 'onGetCaptchaHtmlElements', 	'onGetCaptchaHtmlElements',		'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onCheckCaptchaHtmlElements',	'onCheckCaptchaHtmlElements',	'getcaptchaTab' );

	$_PLUGINS->registerFunction( 'onAfterLoginForm',			'onAfterLoginForm',				'getcaptchaTab' );
	$_PLUGINS->registerFunction( 'onBeforeLogin',				'onBeforeLogin',				'getcaptchaTab' );
}

class getcaptchaTab extends cbTabHandler {
	/**
	* Constructor
	*/	
	function getCaptchaTab() {
		$this->cbTabHandler();
	}
	
	/**
	 * Generates a random code based on function params
	 *
	 * @param  int     $numofcharacters  number of characters in code
	 * @param  string  $setofcharacters  characters to use for code
	 * @return string  random code
	 */
	function _generateCode($numofcharacters=6,$setofcharacters='abcdefhijklmnopqrstuvwxyz') {
		$possible = $setofcharacters;
		$code = '';
		$i = 0;
		while ($i < $numofcharacters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
	/**
	* Retrieves relevant CB Captcha parameters and puts in session
	*/
	function _putCaptchaParameters() {
		
		static $cbcaptchaparms	=	array();

		if ( count( $cbcaptchaparms ) == 0 ) {
			$params		=	$this->params;
			// Plugin Parameters with default settings
			$cbcaptchaparms['captchaWidth']				= $params->get('captchaWidth', '95');
			$cbcaptchaparms['captchaHeight']			= $params->get('captchaHeight', '30');
			$cbcaptchaparms['captchaNumChars']			= $params->get('captchaNumChars', '5');
			$cbcaptchaparms['captchaCharSet']			= $params->get('captchaCharSet', 'abcdefhijklmnopqrstuvwxyz'); 
			$cbcaptchaparms['captchaFont']				= $params->get('captchaFont', '0');
	        $cbcaptchaparms['captchaBackgroundRGB']		= $params->get('captchaBackgroundRGB', '255,255,255');
	        if ( substr_count($cbcaptchaparms['captchaBackgroundRGB'],',') != 2 ) {
	        	$cbcaptchaparms['captchaBackgroundRGB']	= '255,255,255';
			}      
	        $cbcaptchaparms['captchaTextRGB']			= $params->get('captchaTextRGB', '20,40,100');
	        if ( substr_count($cbcaptchaparms['captchaTextRGB'],',') != 2 ) {
	        	$cbcaptchaparms['captchaTextRGB']		= '20,40,100';
			}              
	        $cbcaptchaparms['captchaNoiseRGB']			= $params->get('captchaNoiseRGB', '100,120,180');
	        if ( substr_count($cbcaptchaparms['captchaNoiseRGB'],',') != 2 ) {
	        	$cbcaptchaparms['captchaNoiseRGB']		= '100,120,180';              
			}
			$cbcaptchaparms['captchaSecurityMode']		= $params->get('captchaSecurityMode', 0);
	
			$cbcaptchaparms['captchaCode']	= $this->_generateCode( $cbcaptchaparms['captchaNumChars'], $cbcaptchaparms['captchaCharSet'] );
			if ( session_id() == '' ) {
				session_start();
			}
			
	        $_SESSION['cbcaptchaparams']	=	$cbcaptchaparms; 	// this is needed to send data to stand-alone php file
		}
	}
	
	/**
	* Gets relevant plugin parameters and generates HTML code
	* to link to captcha dynamic image file
	*/
	function _getHTMLcaptcha() {
		global $mainframe;

		if ( session_id() == "" ) {
			session_start();
		}
		
		$this->_putCaptchaParameters();					 

		$imageUrl = $mainframe->getCfg( 'live_site' ) . '/components/com_comprofiler/plugin/user/plug_cbcaptcha/captchaindex.php?urlmode=image&captchasid='.session_id();

		$CaptchaImage = '<img id="imagescaptchup" src="' . $imageUrl . '" alt="'. htmlspecialchars(_UE_CAPTCHA_ALT_IMAGE) . '" />';
		
		return $CaptchaImage;                                           
	}
	
	/**
	* Generates HTML code
	* to link to audio playback dynamic mp3 file 
	*/
	function _getHTMLaudio() {
        global $mainframe;
        
		if ( session_id() == "" ) {
			session_start();
		}

		$speaker_png = $mainframe->getCfg( 'live_site' ) . "/components/com_comprofiler/plugin/user/plug_cbcaptcha/images/sound.png";					 

		$audioURL = $mainframe->getCfg( 'live_site' ) . '/components/com_comprofiler/plugin/user/plug_cbcaptcha/captchaindex.php?urlmode=audio&captchasid='.session_id();

		$captchavieweros = $this->_CheckUserOS();
		$captchabrowser = $this->_CheckUserBrowser();

		if ($captchavieweros == 'Win') {
			switch($captchabrowser) {
				case 'IE':
					$soundobjtype = 'application/x-mplayer2';
					$soundembtype = 'audio/mpeg';
					break;
				case 'FIREFOX':
					$soundobjtype = 'application/x-mplayer2';
					$soundembtype = 'audio/mpeg';
					break;					
				case 'OPERA':
					$soundobjtype = 'application/x-mplayer2';
					$soundembtype = 'audio/mpeg';
					break;
				case 'SAFARI':
					$soundobjtype = 'application/x-mplayer2';
					$soundembtype = 'audio/mpeg';
					break;										
				case 'OTHER':
					$soundobjtype = 'application/x-mplayer2';
					$soundembtype = 'audio/mpeg';
					break;					
			}
		} else {
			switch($captchabrowser) {
				case 'IE':
					$soundobjtype = 'audio/mpeg';
					$soundembtype = 'audio/mpeg';
					break;
				case 'FIREFOX':
					$soundobjtype = 'audio/mpeg';
					$soundembtype = 'audio/mpeg';
					break;					
				case 'OPERA':
					$soundobjtype = 'audio/mpeg';
					$soundembtype = 'audio/mpeg';
					break;					
				case 'SAFARI':
					$soundobjtype = 'audio/mpeg';
					$soundembtype = 'audio/mpeg';
					break;										
				case 'OTHER':
					$soundobjtype = 'audio/mpeg';
					$soundembtype = 'audio/mpeg';
					break;					
			}	
		}
		
		$htmlcode = "<script type=\"text/javascript\" src=\"" . $mainframe->getCfg( 'live_site' ) . "/components/com_comprofiler/plugin/user/plug_cbcaptcha/js/captchapopup.js\"></script>";
		$htmlpopupcode = _CAPTCHAPGPOP_media;
		$htmlpopupcode = str_replace("[captchatitle]", _UE_CAPTCHA_AUDIO_POPUP_TITLE, $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchadescription]", _UE_CAPTCHA_AUDIO_POPUP_DESCRIPTION, $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchafilepath]",$audioURL, $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchaobjectwidth]", '280', $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchaobjectheight]", '69', $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchaobjtypetag]", $soundobjtype, $htmlpopupcode);
		$htmlpopupcode = str_replace("[captchaembtypetag]", $soundembtype, $htmlpopupcode);
		$htmlpopupcode = htmlspecialchars($htmlpopupcode);
		$popupwinwidth = '320';
		$charsperwidth = floor($popupwinwidth / 8);	// 7 pixels per character
		$extrawinheight_title = floor(strlen(_UE_CAPTCHA_AUDIO_POPUP_TITLE) / $charsperwidth) * 10 ;
		$extrawinheight_desc = floor(strlen(_UE_CAPTCHA_AUDIO_POPUP_DESCRIPTION) / $charsperwidth) * 10 ;
		$popupwinheight = 220 + $extrawinheight_title + $extrawinheight_desc;
		$popupwinid = 111;
		$CaptchaAudioPopup = $htmlcode . '<a href="' . $audioURL . '" target="_blank" onclick="javascript:CAPTCHAHTMLPOPUP(' . "'$htmlpopupcode','$popupwinwidth','$popupwinheight','$popupwinid'" . '); return false">' 
			. '<img style="cursor:pointer;border:0px;" src="' . $speaker_png . '" alt="' . htmlspecialchars(_UE_CAPTCHA_AUDIO) .'" title="' . htmlspecialchars(_UE_CAPTCHA_AUDIO) . '" /></a>';

		return $CaptchaAudioPopup;
		
	}

	/**
	* Test captcha
	*/
    function testCaptcha() {
		$params = $this->params;

		$CaptchaImage = $this->_getHTMLcaptcha();

		$return = $CaptchaImage;
		if (!$params->get('captchaSecurityMode',0)) {
			$return .= $this->_getHTMLaudio();	
		}

		return $return;
	}

	
	/**
	* Generates the HTML to display the registration tab/area
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed (here null)
	* @param int 1 for front-end, 2 for back-end
	* @return mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayRegistration($tab, $user, $ui) {
		
		$params = $this->params;
        if (!$params->get('captchaRegistration',1)) {
        	return null;
		}
		
		$CaptchaImage = $this->_getHTMLcaptcha();
		$return =	"
		 <script language=\"javascript\">
			jQuery(document).ready(function($){					
					jQuery('#captchanewcode').click(function(e) {
						oURL= jQuery('#imagescaptchup').attr('src')+'&refreshcaptcha=true';
						jQuery('#imagescaptchup').remove();
						jQuery('#catchawrap').append('<img id=\"imagescaptchup\" src=\"'+oURL+'\" />');	
					});
				
				});
				
			</script>";
										
		$return .= "<div class=\"mbot6 sectiontableentry1\"><div id=\"catchawrap\">\n";                                              
		$return .= "	<span class=\"titleCell\">" . htmlspecialchars(_UE_CAPTCHA_Label) . ":</span>\n";
		$return .= 	$CaptchaImage;
		if (!$params->get('captchaSecurityMode',0)) {
			$return .= $this->_getHTMLaudio();	
		}
		
		$return .= "</div><div class=\"mbot6 clear cb_field\">\n";
		$return .= "	<span class=\"titleCell\">" . htmlspecialchars(_UE_CAPTCHA_Enter_Label) . ":</span>\n";
		$return .= "	<input class=\"inputbox required\" id=\"captchacaptcha\" type=\"text\" name=\"".$this->_getPagingParamName("captcha")."\" mosReq=\"1\" mosLabel=\"". _UE_CAPTCHA_Label . "\" value=\"\" size=\"20\" />";
		$return .= getFieldIcons($ui, true, false, _UE_CAPTCHA_Desc, _UE_CAPTCHA_Label . ":");
		$return .="<a id=\"captchanewcode\">New Code?</a>";
		$return .= "</div></div>\n";
		
		return $return;
	}
	
	/**
	* This function is called before user registration and checks if the correct security
	* code was entered during registration application.
	* If not - then the application fails, a popup message is displayed and the applicant must try again.
	*/
	function onBeforeUserRegistration( &$row, &$rowExtras ) {
		global $mainframe, $_PLUGINS;

		$params = $this->params;
        if (!$params->get('captchaRegistration',1)) {
        	return;
		}
		
		if ( session_id() == "" ) {
			session_start();
		}

		if ( ! (( $_SESSION['cbcaptchaparams']['captchaCode'] == $this->_getReqParam("captcha")) && ( ! empty($_SESSION['cbcaptchaparams']['captchaCode'] )) ) ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
			//echo "\n</div>";
		}
		return true;
	}
	
	/**    
	* This function is needed only to fix a bug in CB 1.0.2 (hopefully with next version this could be
	* removed). 
	*/
	function onBeforeRegisterForm( $option, $emailpass, &$regErrorMSG, &$fieldsQuery ) {
		global $_PLUGINS;

		$params = $this->params;
        if (!$params->get('captchaRegistration',1)) {
        	return;
		}
		
		$_PLUGINS->_iserror = false;			// ugly bug fix of CB 1.0.2
	}

	/**
	* Displays captcha on lost password form 
	*/
	function onLostPassForm( $ui ) {

		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return;
		}

		if (!$params->get('captchaSecurityMode',0)) {
			$CaptchaImage = $this->_getHTMLcaptcha() . $this->_getHTMLaudio();
		} else {
			$CaptchaImage = $this->_getHTMLcaptcha();		
		}		
		$return = array( 0 => "", 1 => $CaptchaImage );
		return $return;		
	}
	
	/**
	* Displays captcha check on lost password form 
	*/
	function onLostPassFormB( $ui ) {
    	global $mainframe;
    	
		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return null;
		}
		
		$captchaInput = "<input class=\"inputbox\" type=\"text\" name=\"".$this->_getPagingParamName("captcha")."\" mosReq=\"1\" mosLabel=\"". htmlspecialchars(_UE_CAPTCHA_Enter_Label) . ":\" value=\"\" size=\"20\" />"
				.  "<img src='" . $mainframe->getCfg( 'live_site' ) . "/components/com_comprofiler/images/required.gif' width='16' height='16' alt='*' title='" . htmlspecialchars(_UE_FIELDREQUIRED) . "' /> ";
		
		$return = array( 0 => _UE_CAPTCHA_Enter_Label . ':', 1 => $captchaInput );
		return $return;
	}
	
	/**
	* Checks code entered during forgotten password form validation 
	*/
	function onBeforeNewPassword( $user_id, &$newpass, &$subject, &$message ) {
		global $_PLUGINS;

		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return null;
		}
		
		if ( session_id() == "" ) {
			session_start();
		}

		if ( ! (($_SESSION['cbcaptchaparams']['captchaCode'] == $this->_getReqParam("captcha")) && ( ! empty($_SESSION['cbcaptchaparams']['captchaCode'] )) ) ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;	
	}

	/**
	* Checks code entered during forgotten password form validation 
	*/
	function onStartNewPassword( &$checkusername, &$confirmEmail ) {
		global $_PLUGINS;

		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return null;
		}
		
		if ( session_id() == "" ) {
			session_start();
		}

		if ( ! (($_SESSION['cbcaptchaparams']['captchaCode'] == $this->_getReqParam("captcha")) && ( ! empty( $_SESSION['cbcaptchaparams']['captchaCode'] )) ) ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;	
	}

	/**
	* Generates the HTML to display security image on forgotten email form
	*/
	function onAfterEmailUserForm( ) {
		return $this->_generateHTML( 'captchaEmailUser' );
	}
	/**
	* Generates the HTML to display security image on CB email to contact form
	*/
	function onAfterEmailToContactForm( ) {
		return $this->_generateHTML( 'captchaContactForm' );
	}
	/**
	* Generates the HTML to display security image on CB email to contact form
	*/
	function onAfterLoginForm( $name_lenght, $pass_lenght, $horizontal, $class_sfx, &$params ) {
		global $_PLUGINS;

		$params = $this->params;
		$captchalogintitle = getLangDefinition( trim( $params->get( 'captchaLoginFormSecurityFieldTitle', _UE_CAPTCHA_Enter_Label ) ) );
 		
		$elems = $this->_generateHTML( 'captchaLoginForm', false, $pass_lenght, 0, $class_sfx );
		$html =	'<div class="mod_login_captcha_image">' . $elems[0] . '</div>';
		if ( $params->get('captchaLoginFormIncludeSecurityFieldTitle',1 ) && $captchalogintitle ) {
			$html .= '<div class="mod_login_captcha_title">' . $captchalogintitle . '</div>';
		}
		$html .= '<div class="mod_login_captcha_field">' . $elems[1] . '</div>';
		return $html;
	}
	/**
	* Generates the HTML to display security image on forgotten email form
	*/
	function onGetCaptchaHtmlElements( $generateFullHtml = true ) {
		return $this->_generateHTML( 'captchaOtherUses', $generateFullHtml );
	}
	/**
	 * Generates HTML depending on parameter
	 *
	 * @param  string  $setting the name of the param setting
	 * @param  boolean $generateFullHtml if TRUE: return string of a div, if FALSE: returns array( images, input field )
	 * @return string|array
	 */
	function _generateHTML( $setting, $generateFullHtml = true, $inputSize = 20, $defaultSetting = 1 ) {
    	global $mainframe, $my;
    	
		$params 		=	$this->params;
		$settingValue	=	$params->get( $setting, $defaultSetting );
        if ( ( $settingValue == 0 ) || ( ( $settingValue == 2 ) && $my->id ) ) {
        	return null;
		}

		if (!$params->get('captchaSecurityMode',0)) {
			$CaptchaImage = $this->_getHTMLcaptcha() . $this->_getHTMLaudio();
		} else {
			$CaptchaImage = $this->_getHTMLcaptcha();		
		}		

		$CaptchaInputField = "<input class=\"inputbox\" type=\"text\" name=\"" . $this->_getPagingParamName("captcha") . "\" mosReq=\"1\" mosLabel=\"" . htmlspecialchars(_UE_CAPTCHA_Label) . "\" value=\"\" size=\"" . $inputSize . "\" autocomplete=\"off\" />";

		if ( $generateFullHtml ) {
			$return = "<div style=\"margin-left:160px;\">" . $CaptchaImage . "</div>";
			$return .= "<div style=\"float:left; position:relative; left:0px; width:160px;\">" . htmlspecialchars(_UE_CAPTCHA_Enter_Label) . ":</div>\n";
			$return .= "<div style=\"float:left; position:relative; left:0px;\">"
					.  $CaptchaInputField
					.  "<img src='" . $mainframe->getCfg( 'live_site' ) . "/components/com_comprofiler/images/required.gif' width='16' height='16' alt='*' title='" . htmlspecialchars(_UE_FIELDREQUIRED) . "' /> "
					.  "</div>"
					.  "<div style=\"clear:both;\">&nbsp;</div>";
		} else {
			$return	= array( $CaptchaImage, $CaptchaInputField );
		}
		return $return;
	}

	/**
	* Checks code entered during email user form validation 
	*/
	function onBeforeEmailUser( ) {
		return $this->_checkCaptcha( 'captchaEmailUser' );
	}
	/**
	* Checks code entered during email to CB contact form validation 
	*/
	function onBeforeSendEmailToContact( ) {
		return $this->_checkCaptcha( 'captchaContactForm' );
	}
	/**
	* Checks code entered during CB login form validation 
	*/
	function onBeforeLogin( ) {
		return $this->_checkCaptcha( 'captchaLoginForm' );
	}
	/**
	* Checks code entered during any other form for validation 
	*/
	function onCheckCaptchaHtmlElements( ) {
		return $this->_checkCaptcha( 'captchaOtherUses' );
	}
	/**
	* Checks code entered during email user form validation 
	*/
	function _checkCaptcha( $setting ) {
		global $_PLUGINS, $my;

		$params 		=	$this->params;
		$settingValue	=	$params->get( $setting, 1 );
        if ( ( $settingValue == 0 ) || ( ( $settingValue == 2 ) && $my->id ) ) {
        	return null;
		}
		
		if ( session_id() == "" ) {
			session_start();
		}

		if ( ! (($_SESSION['cbcaptchaparams']['captchaCode'] == $this->_getReqParam("captcha")) && ( ! empty($_SESSION['cbcaptchaparams']['captchaCode'] )) ) ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;	
	}
	
	/**
	* Joins array of mp3 audio files to dynamically
	* create a combined audio playback sequence of the captcha code
	*/
	function joinmp3s($mp3files) {
		$out = '';
		$numfiles = count($mp3files);
		$i = 0;
		foreach ($mp3files as $mp3file) {
			$i++;
			if ($i == $numfiles) {
				$offsetlength = 0;
			} else {
				$offsetlength = 128;
			}
			$fh = fopen($mp3file, 'rb');
			$size = filesize($mp3file);
			$out .= fread($fh, $size-$offsetlength);
			fclose($fh);
		}
		return $out;
	}

	/**
	* Returns viewers browser type
	*/
	function _CheckUserBrowser() {
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (strstr($useragent,'IE')) {
			$browser = 'IE';
		} else {
			if (strstr($useragent,'Firefox')) {
				$browser = 'FIREFOX';
			} else {
				if (strstr($useragent,'Opera')) {
					$browser = 'OPERA';
				} else {
					if (strstr($useragent,'Safari')) {
						$browser = 'SAFARI';
					} else {
						$browser = 'OTHER';
					}
				}
			}
		}	
		return $browser;
	}

	/**
	* Returns viewers operating system
	*/
	function _CheckUserOS() {	
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		if (strstr($useragent,'Win')) {
			$os = 'Win';
		} else {
			if (strstr($useragent,'Mac')) {
				$os = 'Mac';
			} else {
				if (strstr($useragent,'Linux')) {
					$os = 'Linux';
				} else {
					if (strstr($useragent,'Unix')) {
						$os = 'Unix';
					} else {
						$os = 'Other';
					}
				}
			}
		}
		return $os;
	}
	
	/**
	* Parse calls to get GD Version and Freetype Support status of server installation 
	*/
	function showReqAndTest($name,$value,$control_name) {
        $htmlcaptcha = "GD: <font color=green>" . $this->getModuleSetting('gd','GD Version') . "</font><br />";
        $htmlcaptcha .= "Freetype: <font color=green>" . $this->getModuleSetting('gd','FreeType Support') . "</font><br /><br />";
        $htmlcaptcha .= "<b>Sample Rendering (based on settings)</b><br /><br />";
		return $htmlcaptcha . $this->testCaptcha();
	}

	/**
	* Parse phpinfo 
	*/
	function parsePHPModules() {
		ob_start();
		phpinfo(INFO_MODULES);
		$s = ob_get_contents();
		ob_end_clean();
		$s = strip_tags($s,'<h2><th><td>');
		$s = preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$s);
		$s = preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$s);
		$vTmp = preg_split('/(<h2>[^<]+<\/h2>)/',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
		$vModules = array();
		for ($i=1;$i<count($vTmp);$i++) {
			if (preg_match('/<h2>([^<]+)<\/h2>/',$vTmp[$i],$vMat)) {
				$vName = trim($vMat[1]);
				$vTmp2 = explode("\n",$vTmp[$i+1]);
   				foreach ($vTmp2 AS $vOne) {
    				$vPat = '<info>([^<]+)<\/info>';
    				$vPat3 = "/$vPat\s*$vPat\s*$vPat/";
    				$vPat2 = "/$vPat\s*$vPat/";
    				if (preg_match($vPat3,$vOne,$vMat)) { // 3cols
     					$vModules[$vName][trim($vMat[1])] = array(trim($vMat[2]),trim($vMat[3])); 
    				} elseif (preg_match($vPat2,$vOne,$vMat)) { // 2cols
     					$vModules[$vName][trim($vMat[1])] = trim($vMat[2]); 
    				} 
				} 
			} 
		} 
		return $vModules;
	}

	/**
	* Get phpinfo module settings 
	*/
	function getModuleSetting($pModuleName,$pSetting) {
		$vModules = $this->parsePHPModules();
		return $vModules[$pModuleName][$pSetting];
	}
	
} // end class getCaptchaTab.
?>
