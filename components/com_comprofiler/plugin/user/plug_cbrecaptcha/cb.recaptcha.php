<?php
/**
* reCAPTCHA Tab Class for handling CB Registrations
* @version $Id: cb.recaptcha.php 2008-07-30 iosoft $
* @package Community Builder
* @subpackage cb.recaptcha.php
* @author Mr. Ayan Debnath (aka: iosoft)
* @copyright © 2008 Future iOsoft Technology, INDIA
* @license http://creativecommons.org/licenses/by-nc-nd/2.5/in/
**/

defined( '_VALID_MOS' ) or defined('_JEXEC') or defined( '_VALID_CB' ) or die('Direct Access to this location is not allowed.');

if(isset($_PLUGINS)) 
{
	if(!defined('_UE_CAPTCHA_Label'))		DEFINE('_UE_CAPTCHA_Label','Security Code');
	if(!defined('_UE_CAPTCHA_Desc'))		DEFINE('_UE_CAPTCHA_Desc','Enter Security Code from image');
	if(!defined('_UE_CAPTCHA_NOT_VALID'))	DEFINE('_UE_CAPTCHA_NOT_VALID','Invalid Security Code');

	$_PLUGINS->registerFunction( 'onBeforeRegisterForm',		'onBeforeRegisterForm',			'getReCAPTCHAtab' );
	$_PLUGINS->registerFunction( 'onBeforeUserRegistration',	'onBeforeUserRegistration',		'getReCAPTCHAtab' );
	$_PLUGINS->registerFunction( 'onLostPassForm', 				'onLostPassForm',				'getReCAPTCHAtab' );
	//$_PLUGINS->registerFunction( 'onLostPassForm', 				'onLostPassFormB',				'getReCAPTCHAtab' );
	$_PLUGINS->registerFunction( 'onBeforeNewPassword',			'onBeforeNewPassword',			'getReCAPTCHAtab' );
	$_PLUGINS->registerFunction( 'onAfterEmailUserForm', 		'onAfterEmailUserForm',			'getReCAPTCHAtab' );
	$_PLUGINS->registerFunction( 'onBeforeEmailUser',			'onBeforeEmailUser',			'getReCAPTCHAtab' );
}

class getReCAPTCHAtab extends cbTabHandler {
	
	/**   Constructor   **/	
	function getReCAPTCHAtab() {
		$this->cbTabHandler();
	}

	/**   Generates HTML code for reCAPTCHA   **/
	function _getHTMLcaptcha() {
		
		require_once('recaptchalib.php'); /**    reCAPTCHA Library   **/
		
		$params = $this->params;

		if($params->get('recaptchaTheme','red')=='custom')
		{		
		   $style = "\n<style type=\"text/css\"> .recaptchatable .recaptcha_image_cell, #recaptcha_table { background-color:".$params->get('recaptchaBackgroundRGB','#156c94')." !important; } #recaptcha_table { border-color: ".$params->get('recaptchaBorderRGB','#ffffff')." !important; } #recaptcha_response_field { border-color: #000000 !important;background-color:".$params->get('recaptchaTextBackRGB','#ffffff')." !important; }</style>";
		   $style.= "\n<script type=\"text/javascript\">var RecaptchaOptions = {theme : 'clean', lang : '" . $params->get('recaptchaLang','en') . "'};</script>\n";
		}
		else
		   $style = "\n<script type=\"text/javascript\">var RecaptchaOptions = {theme : '" . $params->get('recaptchaTheme','red') . "', lang : '" . $params->get('recaptchaLang','en') . "'};</script>\n";
		
		return $style . recaptcha_get_html($params->get('recaptchaPubKey','')) . "<br />&nbsp;"; /**   Generating CORE reCAPTCHA form   **/
	}
	
	/**   Generates the HTML to display the registration tab/area   **/
	function getDisplayRegistration($tab, $user, $ui) {

		$params = $this->params;
        if (!$params->get('captchaRegistration',1)) {
        	return;
		}
		
		$return = "<tr>";                                              
		$return .= "<td class=\"titleCell\">" . _UE_CAPTCHA_Label . ":</td>";
		$return .= "<td class=\"fieldCell\">" . $this->_getHTMLcaptcha() . "</td>";
		$return .= "</tr>";
		
		return $return;
	}
	
	/**   Registration Form Submit   **/
	function onBeforeUserRegistration( &$row, &$rowExtras ) {
		global $ueConfig, $mainframe, $_PLUGINS;
				
		if ( ! session_id() ) {
			session_start();
		}
		
		require_once('recaptchalib.php');
		$params = $this->params;
		$resp = recaptcha_check_answer ($params->get('recaptchaPrvKey',''),
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);
		
		if ( ! $resp->is_valid ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;
	}
	
	/**   This function is needed only to fix a bug in CB 1.0.2 (hopefully with next version this could be removed).   */
	function onBeforeRegisterForm( $option, $emailpass, &$regErrorMSG, &$fieldsQuery ) {
		global $_PLUGINS;
		
		$params = $this->params;
        if (!$params->get('captchaRegistration',1)) {
        	return;
		}
		
		$_PLUGINS->_iserror = false;	// ugly bug fix of CB 1.0.2
	}
	
	/**   Lost Password Form   **/
	function onLostPassForm( $ui ) {

		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return;
		}

		$return = array( 0 => _UE_CAPTCHA_Label . ':', 1 => $this->_getHTMLcaptcha() );
		return $return;
	}
	
	/**   Lost Password Form-B   **/
	function onLostPassFormB( $ui ) {

		$params = $this->params;
        if (!$params->get('captchaNewPassword',1)) {
        	return;
		}
		
		$captchaInput = "<input class=\"inputbox\" type=\"text\" name=\"".$this->_getPagingParamName("captcha")."\" mosReq=\"1\" mosLabel=\"". _UE_CAPTCHA_Label . ":\" value=\"\" size=\"20\" />";
		
		//$return = array( 0 => _UE_CAPTCHA_Label . ':', 1 => $captchaInput );
		return $return;
	}
	
	/**   Lost Password Form Submit   **/
	function onBeforeNewPassword( $user_id, &$newpass, &$subject, &$message ) {
		global $ueConfig, $mainframe, $_PLUGINS;
		
		if ( ! session_id() ) {
			session_start();
		}
		
		require_once('recaptchalib.php');
		$params = $this->params;
		$resp = recaptcha_check_answer ($params->get('recaptchaPrvKey',''),
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);

		if ( ! $resp->is_valid ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;	
	}

	/**   Generates the HTML to display security image on forgotten email form   **/
	function onAfterEmailUserForm( &$rowFrom, &$rowTo, &$warning, $ui ) {
    	global $mosConfig_live_site;

		$params = $this->params;
        if (!$params->get('captchaEmailUser',1)) {
        	return;
		}
	
		return $this->_getHTMLcaptcha();
	}

	function onBeforeEmailUser( &$rowFrom, &$rowTo, $ui ) {
		global $ueConfig, $mainframe, $_PLUGINS;
		
		if ( ! session_id() ) {
			session_start();
		}

		require_once('recaptchalib.php');
		$params = $this->params;
		$resp = recaptcha_check_answer ($params->get('recaptchaPrvKey',''),
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);

		if ( ! $resp->is_valid ) {
			$_PLUGINS->raiseError(0);
			$_PLUGINS->_setErrorMSG( _UE_CAPTCHA_NOT_VALID );
		}
		return true;	
	}

	
	/**
	* WARNING: THIS METHOD IS EXPERIMENTAL !
	* WARNING: UNCHECKED ACCESS! On purpose unchecked access for M2M operations
	* Generates the HTML to display for a specific component-like page for the tab. WARNING: unchecked access !
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @param array _POST data for saving edited tab content as generated with getEditTab
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated, or null if nothing to display
	
	function getTabComponent($tab, $user, $ui, $postdata) {
		global $mosConfig_live_site, $mosConfig_absolute_path, $database, $my;
		
		if ( ! session_id() ) {
			session_start();
		}
		
		include_once( $mosConfig_absolute_path . '/components/com_comprofiler/plugin/user/plug_cbcaptcha/captchasecurityimages.php');

		$params = $this->params;
		
		// Plugin Parameters
		$cbcaptcha_width = $params->get('captchaWidth', '150');
		$cbcaptcha_height = $params->get('captchaHeight', '40');
		$cbcaptcha_chars = $params->get('captchaChars', '5');
		$cbcaptcha_font2use = $params->get('captchaFont', '0');
		$cbcaptcha_backgroundRGB = $params->get('captchaBackgroundRGB','255,255,255');
		if (substr_count($cbcaptcha_backgroundRGB,',')!=2) {
			$cbcaptcha_backgroundRGB = '255,255,255';
		}      
		$cbcaptcha_captchaTextRGB = $params->get('captchaTextRGB','20,40,100');
		if (substr_count($cbcaptcha_captchaTextRGB,',')!=2) {
			$cbcaptcha_captchaTextRGB = '20,40,100';
		}
		$cbcaptcha_captchaNoiseRGB = $params->get('captchaNoiseRGB','100,120,180');
		if (substr_count($cbcaptcha_captchaNoiseRGB,',')!=2) {
			$cbcaptcha_captchaNoiseRGB = '100,120,180';              
		}
		$captchaGenerator = new CaptchaSecurityImages();
		$captchaGenerator->setfont($cbcaptcha_font2use);
		
		$brgb = explode(",",$cbcaptcha_backgroundRGB);
		$captchaGenerator->setrgb($brgb[0],'br');
		$captchaGenerator->setrgb($brgb[1],'bg');
		$captchaGenerator->setrgb($brgb[2],'bb');
			
		$trgb = explode(",",$cbcaptcha_captchaTextRGB);
		$captchaGenerator->setrgb($trgb[0],'tr');
		$captchaGenerator->setrgb($trgb[1],'tg');
		$captchaGenerator->setrgb($trgb[2],'tb');
				
		$nrgb = explode(",",$cbcaptcha_captchaNoiseRGB);
		$captchaGenerator->setrgb($nrgb[0],'nr');
		$captchaGenerator->setrgb($nrgb[1],'ng');
		$captchaGenerator->setrgb($nrgb[2],'nb');
		
		$code = $captchaGenerator->generate( $cbcaptcha_width, $cbcaptcha_height, $cbcaptcha_chars );
		
		$_SESSION['security_code'] = $code;

		return null;
	}*/
} // end class getReCAPTCHAtab.
?>
