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
class hwd_vs_tp_YoutubeCom
{
    /**
     * Extracts the appropriate third party video code used to generate
     * the player and thumbnail images
     */
	function YoutubeComProcessCode($raw_code)
	{
		$code = hwd_vs_tp_YoutubeCom::YoutubeComGetCode($raw_code);
		if (!empty($code))
		{
			$ext_v_code[0] = true;
			$ext_v_code[1] = $code;
			$ext_v_code[2] = $thumbnail;
		}
		else
		{
			$ext_v_code[0] = false;
			$ext_v_code[1] = "";
			$ext_v_code[2] = "";
		}
		return $ext_v_code;
	}
    /**
     * Extracts the appropriate third party video code used to generate
     * the player and thumbnail images
     */
	function YoutubeComGetCode($raw_code)
	{
		$pos_u = strpos($raw_code, "v=");

		if ($pos_u === false)
		{
			return null;
		}
		else if ($pos_u)
		{
			$pos_u_start = $pos_u + 2;

			$pos_u_end = strpos($raw_code, "&", $pos_u_start);
			if ($pos_u_end === false)
			{
				$pos_u_end = strpos($raw_code, "#", $pos_u_start);
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
     * Extracts the Video of the third party 
     */
	function YoutubeComProcessVideo($raw_code, $processed_code=null)
	{
		$c = hwd_vs_Config::get_instance();
		$app = & JFactory::getApplication();
		define('YTV_API_URL', 'http://gdata.youtube.com/feeds/api/videos/');
		
		if (empty($processed_code))$code = hwd_vs_tp_YoutubeCom::YoutubeComGetCode($raw_code);
				else $code = $processed_code;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, YTV_API_URL . $code);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//$feed holds a rss feed xml returned by youtube API
		$feed = curl_exec($ch);
		curl_close($ch);
		 
		//Using SimpleXML to parse youtube's feed
		$xml = simplexml_load_string($feed);
		//If no entry whas found, then youtube didn't find any video with specified id
		if(!$xml) {
			$app->enqueueMessage("We couldn't find any video with this URL sorry...   ");
			return false;
			}
		$media = $xml->children('media', true);
		$oVideoGroup = $media->group;
		
		$oThirdPartyVideoInfo->video_type		= 'youtube.com';
		$oThirdPartyVideoInfo->video_id			= $processed_code;
		
		$content_attributes = $oVideoGroup->content->attributes();
		$vid_duration = $content_attributes['duration'];
		$duration_formatted = str_pad(floor($vid_duration/60), 2, '0', STR_PAD_LEFT) . ':' . str_pad($vid_duration%60, 2, '0', STR_PAD_LEFT);
			
		$oTitle = (string)$oVideoGroup->title;
		$oDesc  = (string)$oVideoGroup->description;
		$oTags 	= hwd_vs_tp_YoutubeCom::YoutubeComProcessKeywords($raw_code, $processed_code);
		
		$oThumbnail = "http://img.youtube.com/vi/".$processed_code."/default.jpg";

		$oThirdPartyVideoInfo->video_title		= $oTitle;
		$oThirdPartyVideoInfo->description		= $oDesc;
		$oThirdPartyVideoInfo->tags				= $oTags[1];
		$oThirdPartyVideoInfo->video_length		= $duration_formatted;
		$oThirdPartyVideoInfo->date_uploaded	= date('Y-m-d H:i:s');
		$oThirdPartyVideoInfo->remote_verified 	= $remote_verified;
		$oThirdPartyVideoInfo->thumbnail		= $oThumbnail;
		$oThirdPartyVideoInfo->error_msg 		= $failures;
		$oThirdPartyVideoInfo->videoclass		= 'youtube';
		
		return $oThirdPartyVideoInfo;
	}
	
	
	/**
     * Extracts the keywords of the third party video
     */
	function YoutubeComProcessKeywords($raw_code, $processed_code=null)
	{
		$c = hwd_vs_Config::get_instance();

		if (empty($processed_code))
		{
			$code = hwd_vs_tp_YoutubeCom::YoutubeComGetCode($raw_code);
		}
		else
		{
			$code = $processed_code;
		}

		$watchvideourl = "http://www.youtube.com/watch?v=".$code;
		$watchvideourl = hwd_vs_tools::get_final_url( $watchvideourl );

		$ext_v_keywo    = array();
		$ext_v_keywo[0] = "";
		$ext_v_keywo[1] = "";

		if (function_exists('curl_init'))
		{
			$curl_handle=curl_init();
			curl_setopt($curl_handle,CURLOPT_URL,$watchvideourl);
			curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,20);
			curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);

			if (!empty($buffer))
			{
				preg_match('/<meta name="keywords" content="([^"]+)/',$buffer, $match);
				if (!empty($match[1]))
				{
					$ext_v_keywo[0] = 1;
					$ext_v_keywo[1] = $match[1];
					$ext_v_keywo[1] = strip_tags($ext_v_keywo[1]);
					$ext_v_keywo[1] = trim($ext_v_keywo[1]);
					$ext_v_keywo[1] = hwdEncoding::XMLEntities($ext_v_keywo[1]);
					$ext_v_keywo[1] = hwdEncoding::charset_decode_utf_8($ext_v_keywo[1]);
					$ext_v_keywo[1] = addslashes($ext_v_keywo[1]);
					$ext_v_keywo[1] = hwd_vs_tools::truncateText($ext_v_keywo[1], 1000);
				}
			}
		}
		if ($ext_v_keywo[0] == '1')
		{
			if ($ext_v_keywo[1] == '')
			{
				$ext_v_keywo[1] = _HWDVIDS_UNKNOWN;
			}
		}
		else
		{
			$ext_v_keywo[0] = 0;
			$ext_v_keywo[1] = _HWDVIDS_UNKNOWN;
		}
		return $ext_v_keywo;
	}
    
	
   
}
?>
