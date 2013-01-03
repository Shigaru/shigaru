<?php
/**
 *    @version [ Nightly Build ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2011 Highwood Design
 *    @license Creative Commons Attribution-Non-Commercial-No Derivative Works 3.0 Unported Licence
 *    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 */
class hwd_vs_tp_metacafeCom
{
	protected $oCode 	= '';
	protected $oXml;
    /**
     * Extracts the appropriate third party video code used to generate
     * the player and thumbnail images
     */
	function metacafeComProcessCode($raw_code)
	{
		$code = hwd_vs_tp_metacafeCom::metacafeComGetCode($raw_code);
		if (!empty($code))
		{
			$ext_v_code[0] = true;
			$ext_v_code[1] = $code;
			$ext_v_code[2] = '';
		}
		else
		{
			$ext_v_code[0] = false;
			$ext_v_code[1] = "";
			$ext_v_code[2] = "";
		}
		$oCode = code;
		return $ext_v_code;
	}
    /**
     * Extracts the appropriate third party video code used to generate
     * the player and thumbnail images
     */
	function metacafeComGetCode($raw_code)
	{
		$pos_u = strpos($raw_code, "/watch/");

		if ($pos_u === false)
		{
			return null;
		}
		else if ($pos_u)
		{
			$pos_u_start = $pos_u + 7;

			$pos_u_end = strpos($raw_code, "/", $pos_u_start);
			if ($pos_u_end === false)
			{
				$pos_u_end = strpos($raw_code, "&", $pos_u_start);
				if ($pos_u_end === false)
				{
					$code = substr($raw_code, $pos_u_start);
					$code = strip_tags($code);
					$code = preg_replace("/[^a-zA-Z0-9s_-]/", "", $code);
				}
				else if ($pos_u_end)
				{
					$length = $pos_u_end - $pos_u_start;
					$code = substr($raw_code, $pos_u_start, $length);
					$code = strip_tags($code);
					$code = preg_replace("/[^a-zA-Z0-9s_-]/", "", $code);
				}
			}
			else if ($pos_u_end)
			{
				$length = $pos_u_end - $pos_u_start;
				$code = substr($raw_code, $pos_u_start, $length);
				$code = strip_tags($code);
				$code = preg_replace("/[^a-zA-Z0-9s_-]/", "", $code);
			}
		}
		return $code;
	}

    /**
     * Extracts the title of the third party video
     */
	function metacafeComProcessVideo($raw_code, $processed_code=null)
	{
		$c = hwd_vs_Config::get_instance();
		$app = & JFactory::getApplication();
		define('MTC_API_URL', 'http://www.metacafe.com/api/item/');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, MTC_API_URL . $processed_code.'/');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//$feed holds a rss feed xml returned by youtube API
		$feed = curl_exec($ch);
		curl_close($ch);
		//Using SimpleXML to parse youtube's feed
		$oXml = simplexml_load_string($feed);
		$oVIdeoid = $oXml->xpath( "/rss/channel/item/id" );
		$oVIdeoid = (array)$oVIdeoid[0];
		$oVIdeoid = $oVIdeoid[0];
		
		//If no entry whas found, then youtube didn't find any video with specified id
		if(!$oVIdeoid) {
			$app->enqueueMessage("We couldn't find any video with this URL sorry...   ");
			return false;
			}
		
		$oThirdPartyVideoInfo->video_type		= 'metacafe.com';
		$oThirdPartyVideoInfo->video_id			= $oVIdeoid;
		
		$oTitle = $oXml->xpath( "/rss/channel/item/media:title" );
		$oTitle = (array)$oTitle[0];
		$oTitle = $oTitle[0];
		
		$oDesc = $oXml->xpath( "/rss/channel/item/media:description" );
		$oDesc = (array)$oDesc[0];
		$oDesc = $oDesc[0];
		
		$oTags = $oXml->xpath( "/rss/channel/item/media:keywords" );
		$oTags = (array)$oTags[0];
		$oTags = $oTags[0];
		
		$oDuration = $oXml->xpath( "/rss/channel/item/media:content/@duration" );
		$oDuration = (string) $oDuration[0]['duration'];
		$duration_formatted = str_pad(floor($oDuration/60), 2, '0', STR_PAD_LEFT) . ':' . str_pad($oDuration%60, 2, '0', STR_PAD_LEFT);
		
		$oThumbnail = $oXml->xpath( "/rss/channel/item/media:thumbnail/@url" );
		$oThumbnail = (string) $oThumbnail[0]['url'];

		$oThirdPartyVideoInfo->video_title		= $oTitle;
		$oThirdPartyVideoInfo->description		= $oDesc;
		$oThirdPartyVideoInfo->tags				= $oTags;
		$oThirdPartyVideoInfo->video_length		= $duration_formatted;
		$oThirdPartyVideoInfo->date_uploaded	= date('Y-m-d H:i:s');
		$oThirdPartyVideoInfo->remote_verified 	= $remote_verified;
		$oThirdPartyVideoInfo->thumbnail		= $oThumbnail;
		$oThirdPartyVideoInfo->error_msg 		= $failures;
		$oThirdPartyVideoInfo->videoclass		= 'metacafe';
		
		return $oThirdPartyVideoInfo;
	}
    

}
?>
