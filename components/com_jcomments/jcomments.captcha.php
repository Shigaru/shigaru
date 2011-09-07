<?php
/**
 * JComments - Joomla Comment System
 *
 * CAPTCHA - Automatic test to tell computers and humans apart
 *
 * @version 2.0
 * @package JComments
 * @filename jcomments.captcha.php
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/
// define directory separator short constant
if (!defined( 'DS' )) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

class JCommentsCaptcha
{
	function check( $code )
	{
		@session_start();
		$_SESSION['comments-captcha-attempts'] = intval($_SESSION['comments-captcha-attempts']) + 1;
		return (($code != '') && ($code == $_SESSION['comments-captcha-code']));
	}

	function attempts()
	{
		return $_SESSION['comments-captcha-attempts'];
	}

	function destroy()
	{
		unset($_SESSION['comments-captcha-code']);
		$_SESSION['comments-captcha-attempts'] = 0;
	}

	function image()
	{
		mt_srand((double)microtime()*1000000);
		@session_start();

		if(!isset($_SESSION['comments-captcha-attempts'])) {
			$_SESSION['comments-captcha-attempts'] = 1;
		} else {
			$_SESSION['comments-captcha-attempts']++;
		}

		if (!isset($_SESSION['comments-captcha-code'])
		|| ($_SESSION['comments-captcha-attempts'] >= 3)) {
			$_SESSION['comments-captcha-code'] = mt_rand(10000, 99999);
			$_SESSION['comments-captcha-attempts'] = 1;
		}

		$kcaptcha = JCOMMENTS_LIBRARIES . DS . 'kcaptcha' . DS . 'kcaptcha.php';

		if (is_file($kcaptcha)) {
			if (!class_exists('KCAPTCHA')) {
				require_once($kcaptcha);
			}
			$captcha = new KCAPTCHA();
			$_SESSION['comments-captcha-code'] = $captcha->getKeyString();
			$_SESSION['comments-captcha-attempts'] = 1;
		} else {
			$im = ImageCreate(60, 18);
			$fontcolor = ImageColorAllocate($im, 170, 170, 170);
			$linecolor = ImageColorAllocate($im, 196, 196, 196);
			$bordercolor = ImageColorAllocate($im, 200, 200, 200);
			for($x=10; $x <= 100; $x+=10) {
				ImageLine($im, $x, 0, $x, 50, $linecolor);
			}
			ImageLine($im, 0, 9, 100, 9, $linecolor);
			ImageLine($im, 0, 0, 0, 50, $bordercolor);
			ImageLine($im, 0, 0, 100, 0, $bordercolor);
			ImageLine($im, 0, 17, 100, 17, $bordercolor);
			ImageLine($im, 59, 0, 59, 17, $bordercolor);
			ImageString($im, 5, 8, 1, $_SESSION['comments-captcha-code'], $fontcolor);
			header('Content-Type: image/jpeg');
			ImageJPEG($im,'',75);
			ImageDestroy($im);
		}
		exit;
	}
}
?>