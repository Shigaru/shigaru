<?php 
/**
 * @package JV Facebook Fanbox module for Joomla! 1.5
 * @author http://www.joomlavision.com
 * @copyright (C) 2010- JoomlaVision.Com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

	//no direct access
	defined('_JEXEC') or die('Restricted access');// no direct access
	
	// Include the syndicate functions only once
	require_once( dirname(__FILE__).DS.'helper.php');
	$jv_opt = modJvFacebookHelper::getFbOpt($params);
	switch ( $jv_opt )
		{
			case 'fb_activity_feed':
				$jv_fbhtml = modJvFacebookHelper::getActivityFeed($params);
				break;
			case 'fb_like_box':
				$jv_fbhtml = modJvFacebookHelper::getFanbox($params);
				break;
			case 'fb_live_stream':
				$jv_fbhtml = modJvFacebookHelper::getLiveStream($params);
				break;
			case 'fb_recommendations':
				$jv_fbhtml = modJvFacebookHelper::getRecommendations($params);
				break;			
		}
	require(JModuleHelper::getLayoutPath('mod_jv_facebook'));
?>