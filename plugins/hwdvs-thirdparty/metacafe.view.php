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
     * Prepares the code to insert the third party video
     *
     * @param string $row  the $video_id output containing video paramters
     * @param int    $flv_width  the video width
     * @param int    $flv_height  the video height
     * @return       $code   the third party embed code
     */
    function metacafeComPrepareVideo($row, $flv_width=null, $flv_height=null, $autostart=null)
	{
		global $show_video_ad, $pre_url, $post_url, $smartyvs, $task, $pre_url, $post_url;
		$c = hwd_vs_Config::get_instance();

		jimport('joomla.html.parameter');
                $plugin =& JPluginHelper::getPlugin('hwdvs-thirdparty', 'youtube');
		$pluginParams = new JParameter( $plugin->params );

		$pp_playLocal     = $pluginParams->get('playLocal', '2');
		$pp_playerVersion = $pluginParams->get('playerVersion', '1');

		$code = null;

		$data = @explode(",", $row->video_id);
		$videocode = $data[0];

		

		$thumb_url = hwd_vs_tools::generatePlayerThumbnail($row);

		if (!empty($truepath) && $c->playlocal == "1")
		{
			$player = new hwd_vs_videoplayer();

			if ($show_video_ad == 1) {

				

					$xspf_playlist = JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xspf'.DS.$row->id.'.xml';
					@unlink($xspf_playlist);
					require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdrevenuemanager'.DS.'redrawplaylist.class.php');
					hwd_rm_playlist::writeFile($row, $truepath, $pre_url, $post_url, $thumb_url);

					if (file_exists($xspf_playlist)) {
						$flv_url = JURI::root(true)."/components/com_hwdvideoshare/xml/xspf/".$row->id.".xml";
						$flv_path = JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xspf'.DS.$row->id.'.xml';

						if ($c->loadswfobject == "on" && $task !=="grabjomsocialplayer") {
							$code.= $player->prepareplayer($flv_url, $flv_width, $flv_height, rand(100, 999), "playlist", $flv_path, null, $autostart, $row->id);
						} else {
							$code.= $player->prepareEmbeddedPlayer($flv_url, $flv_width, $flv_height, rand(100, 999), "playlist", $flv_path, null, $autostart, $row->id);
						}
						return $code;
					}
				

			}

			
			
				$code.= $player->prepareEmbeddedPlayer($truepath, $flv_width, $flv_height, rand(100, 999), "youtube", null, $thumb_url, $autostart, $row->id);
			

			return $code;

		} else {

			if ($flv_width==null) {
				$smartyvs->assign("player_width", $c->flvplay_width);
				$flv_width = ($c->flvplay_width);
			} else {
				$smartyvs->assign("player_width", $flv_width);
				if (preg_match("/%/", $flv_width)) {
					$flv_width = $flv_width;
				} else {
					$flv_width = $flv_width;
				}
			}
			if ($flv_height==null) {
				$flv_height = intval ($flv_width*$c->var_fb);
				$flv_height = $flv_height+25;
				$flv_height = $flv_height;
			} else {
				if (preg_match("/%/", $flv_height)) {
					$flv_height = $flv_height;
				} else {
					$flv_height = $flv_height;
				}
			}

			$protocol = "http://";
			if(is_callable(array('hwd_vs_tools', 'isSSL')))
			{
				if (hwd_vs_tools::isSSL())
				{
					$protocol = "https://";
				}
			}
			
			$code.= "<object 
							width=\"".$flv_width."\" 
							height=\"".$flv_height."\">
							<param name=\"movie&\"; value=\"http://www.metacafe.com/fplayer/".$videocode."/movie.swf\"></param>
							<param name=\"wmode\" value=\"transparent\"></param>
							<embed 	src=\"http://www.metacafe.com/fplayer/".$videocode."/movie.swf\" 
									allowFullScreen=\"true\"
									flashVars=\"playerVars=autoPlay=no\"
									allowScriptAccess=\"always\"
									pluginspage=\"http://www.macromedia.com/go/getflashplayer\" 
									type=\"application/x-shockwave-flash\" 
									wmode=\"transparent\" 
									width=\"".$flv_width."\" height=\"".$flv_height."\">
							</embed>
					</object>";

			
			
			return $code;
		}
	}
    /**
     * Prepares the code to insert the third party thumbnail image
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $vid  the video database id
     * @param int    $Itemid  the joomla menu id
     * @param int    $k  the alternating CSS integer
     * @return       $code   the full third party thumbnail image tag
     */
	function metacafeComPrepareThumb($option, $vid, $Itemid, $k, $width=null, $height=null, $class=null, $tooltip_data=null)
	{
		if (!isset($width)) {
			$width = $c->thumbwidth;
		}
		if (!isset($height)) {
			$height = $width*$c->tar_fb;
		}

		$code = "<img src=\"".youtubeComPrepareThumbURL($option, $vid)."\" border=\"0\" width=\"".$width."\" height=\"".$height."\" title=\"".$tooltip_data[1]." :: ".$tooltip_data[2]."\" class=\"bradius5 ".$class."\" />";
		return $code;
	}
    /**
     * Prepares the code to insert the third party thumbnail image
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $vid  the video database id
     * @param int    $Itemid  the joomla menu id
     * @param int    $k  the alternating CSS integer
     * @return       $code   the full third party thumbnail image tag
     */
	function metacafeComPrepareThumbURL($option, $vid)
	{
		$data = explode(",", $option);
		$thumbnail = @$data[1];

		if (!$thumbnail) {
			$code = URL_HWDVS_IMAGES.'default_thumb.jpg';
		} else {
			$code = $thumbnail;
		}
		return $code;
	}
	/**
     * Prepares the third party video link
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $vid  the video database id
     * @param int    $Itemid  the joomla menu id
     * @return       $code   the full third party thumbnail image tag
     */
	function metacafeComPrepareVideoURL($option)
	{
			if (@explode(",", $option)) {
				$data = explode(",", $option);
				$videocode = $data[0];
			} else { $videocode = "ERROR"; }

			$code = "http://www.youtube.com/watch?v=".$videocode;
			return $code;
	}
    /**
     * Prepares the third party video embed code
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $vid  the video database id
     * @param int    $Itemid  the joomla menu id
     * @return       $code   the full third party thumbnail image tag
     */
	function metacafeComPrepareVideoEmbed($option, $vid, $Itemid)
	{
		global $mosConfig_sitename, $mosConfig_live_site, $hwdvsItemid;
		$c = hwd_vs_Config::get_instance();
			if (@explode(",", $option)) {
				$data = explode(",", $option);
				$videocode = $data[0];
			} else { $videocode = "ERROR"; }

			$code = null;
			if ($c->embedreturnlink == 1) {
				$code.='<div><center>';
			}
			
			$code.= "<object 
							width=&#34;425&#34; 
							height=&#34;355&#34;>
							<param name=&#34;movie&#34; value=&#34;http://www.metacafe.com/fplayer/".$videocode."/movie.swf&#34;>
							</param><param name=&#34;wmode&#34; value=&#34;transparent&#34;>
							</param>
							<embed 	src=&#34;http://www.metacafe.com/fplayer/".$videocode."/movie.swf&#34; 
									type=&#34;application/x-shockwave-flash&#34; 
									wmode=&#34;transparent&#34; 
									width=&#34;425&#34; 
									height=&#34;355&#34;>
							</embed>
					</object>";
			if ($c->embedreturnlink == 1) {
                                $uri =& JURI::getInstance();
                                $base	= $uri->toString( array('scheme', 'host', 'port'));
                                $link	= $base.JRoute::_("index.php?option=com_hwdvideoshare&Itemid=$hwdvsItemid&task=viewvideo&video_id=$vid");

                                $jconfig = new jconfig();
                                $code.="<br /><a href=&#34;".$link."&#34; title=&#34;".$jconfig->sitename."&#34;>".$jconfig->sitename."</a></center></div>";
			}

			return $code;
	}
    /**
     * Prepares the third party video embed code
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $vid  the video database id
     * @param int    $Itemid  the joomla menu id
     * @return       $code   the full third party thumbnail image tag
     */
	function metacafeComPrepareFlvURL($option)
	{
		return false;
		global $mosConfig_sitename, $mosConfig_live_site;
		$c = hwd_vs_Config::get_instance();

		$data = explode(",", $option);

		$truepath = null;
		$truepath = downloadYT($data[0]) ;

		if (isset($truepath) && !empty($truepath)) {
			$truepath = urlencode( $truepath );
			return $truepath;
		}

		return false;

	}


?>
