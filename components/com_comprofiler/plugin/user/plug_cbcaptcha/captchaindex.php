<?php
/**
* Captcha Tab Class for handling CB Registration, CB lost password,  CB member email and CB Contact form submissions
* @version $Id$
* @package plug_cbcaptcha
* @subpackage captchaindex.php
* @author Nant and Beat
* @copyright (C) Nant, JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL v2
* @final 2.0
*/


define( '_VALID_MOS', 1 );
include_once( '../../../../../globals.php' );
if ( isset($_GET['urlmode']) && isset($_GET['captchasid']) ) {
	$urlmode = $_GET['urlmode']; // Expected values image or audio
	$captchasid = $_GET['captchasid'];
} else {
	die ( 'invalid session' );	
}
if ( ! preg_match( '/^[A-Za-z0-9]*$/', $captchasid ) ) {
	die( 'invalid access' );
}
session_id(strip_tags($captchasid));
session_start();
if ( ( count($_SESSION) == 0 ) ||
	( ($urlmode == "audio") && ( ! isset( $_SESSION['cbcaptchaparams']['captchaCode'] ) ) ) ||
	( ! isset( $_SESSION['cbcaptchaparams'] ) ) || 
	( ! is_array($_SESSION['cbcaptchaparams'] ) ) ) {
   
	die( 'invalid session.' );
}

$thispath = dirname(__FILE__);
switch($urlmode) {
	case 'audio':
		if (empty( $_SESSION['cbcaptchaparams']['captchaCode'] )) {
			die( 'no security code in session during audio generation' );
		} else {
			$captcha_code = $_SESSION['cbcaptchaparams']['captchaCode'];
		}
		$AudioAbsolutePath = $thispath . '/audio/';
		$sounds = array();
		$sound_ext = '.mp3';
        
		for($i=0;$i<strlen($captcha_code);$i++){
			$sound_segment = $captcha_code{$i};

			$file = $AudioAbsolutePath . $sound_segment . $sound_ext;
			if(!@file_exists($file)) {
				die( 'missing audio segment.' );
			}                                              
			$sounds[] = $file;
		}
		// header( 'Cache-Control: no-store, no-cache, must-revalidate' );			// header("Cache-Control: public, must-revalidate");
		// header("Pragma: hack");													///????
		// header('Cache-Control: private, community="UCI"');						///????
		header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-store, no-cache, must-revalidate' );
		header( 'Cache-Control: post-check=0, pre-check=0', false );
		header( 'Pragma: no-cache' );

		header("Content-type: " . 'audio/mpeg');
		header("Content-Disposition: attachment; filename=cbcaptcha" . $sound_ext . ';');
		header("Content-Transfer-Encoding: binary");
            
		if ($sound_ext == '.mp3') {
			$audiocaptcha = joinmp3s($sounds);
		}

		header("Content-Length: " . strlen($audiocaptcha));
		echo $audiocaptcha;
		break;
	case 'image':
		include_once( $thispath . '/captchasecurityimages.php');
        $cbcaptchaparms = $_SESSION['cbcaptchaparams'];   
		// Get Plugin Parameters from session
		$cbcaptcha_width = $cbcaptchaparms['captchaWidth'];
		$cbcaptcha_height = $cbcaptchaparms['captchaHeight'];
		$cbcaptcha_font2use = $cbcaptchaparms['captchaFont'];
        $cbcaptcha_backgroundRGB = $cbcaptchaparms['captchaBackgroundRGB'];
        if (substr_count($cbcaptcha_backgroundRGB,',')!=2) {
        	$cbcaptcha_backgroundRGB = '255,255,255';
		}      
        $cbcaptcha_captchaTextRGB = $cbcaptchaparms['captchaTextRGB'];
        if (substr_count($cbcaptcha_captchaTextRGB,',')!=2) {
        	$cbcaptcha_captchaTextRGB = '20,40,100';
		}              
        $cbcaptcha_captchaNoiseRGB = $cbcaptchaparms['captchaNoiseRGB'];
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

		$code = $_SESSION['cbcaptchaparams']['captchaCode'];
		$code = $captchaGenerator->generateImage($cbcaptcha_width, $cbcaptcha_height, $code);	
		break;
	}
	
exit();

/**
* Joins an array of mp3 sound files into one stream.
* It strips individual tags and just keeps the last one.
*/
function joinmp3s($mp3files) {
	$out = '';
	$filecount = count($mp3files);
	$i = 0;
	foreach ($mp3files as $mp3file) {
		$i++;
		if ($i != $filecount) {
			$offset = 128;
		} else {
			$offset = 0;
		}
		$fh = fopen($mp3file, 'rb');
		$size = filesize($mp3file);
		$out .= fread($fh, $size-$offset);
		fclose($fh);
	}
	return $out;
}

?>
