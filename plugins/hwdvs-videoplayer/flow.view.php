<?php
/**
 *    @version [ Masterton ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2009 Highwood Design
 *    @license Creative Commons Attribution-Non-Commercial-No Derivative Works 3.0 Unported Licence
 *    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC3.5
 */
class hwd_vs_videoplayer {
    /**
     * Prepares the code to insert the third party video
     *
     * @param string $option  the $video_id output containing video paramters
     * @param int    $flv_width  the video width
     * @param int    $flv_height  the video height
     * @return       $code   the third party embed code
     */
    function prepareplayer($flv_url, $flv_width=427, $flv_height=340, $ui=0, $mediatype="video", $flv_path=null, $thumb_url=null, $autostart=null, $video_id=null, $rtmp=null)
	{
		$code = hwd_vs_videoplayer::prepareEmbeddedPlayer($flv_url, $flv_width, $flv_height, $ui, $mediatype, $flv_path, $thumb_url, $autostart, $video_id, $rtmp);
		return $code;
	}
    function prepareEmbeddedPlayer($flv_url, $flv_width=427, $flv_height=340, $ui=0, $mediatype="video", $flv_path=null, $thumb_url=null, $autostart=null, $video_id=null, $rtmp=null)
	{
		global $task, $smartyvs, $option, $show_longtail, $longtail_channel, $mainframe;
		if (!defined('HWDVIDSPATH')) { define('HWDVIDSPATH', dirname(__FILE__).'/../../'); }
		$c = hwd_vs_Config::get_instance();

		$code=null;

		$params = $this->getMyParams('flow');

	    if (isset($flv_width) && !empty($flv_width)) {
	    	$param_width = $flv_width;
	    } else {
	    	$param_width = $c->flvplay_width;
		}
	    if (isset($flv_height) && !empty($flv_height)) {
	    	$param_height = $flv_height;
	    } else {
	    	$param_height = $param_width*$c->var_fb;
		}

	    $param_height = intval($param_height+24);

		$smartyvs->assign("player_width", $param_width);
		$ui = rand(100, 999);

	    $param_accelerated = $params->get('accelerated', 0);
	    $param_autoBuffering = $params->get('autoBuffering', 1);
	    $param_autoPlay = $params->get('autoPlay', 0);
	    $param_repeat = $params->get('repeat', 0);
	    $param_bufferLength = $params->get('bufferLength', 3);
	    $param_linkUrl = $params->get('linkUrl', '');
	    $param_scaling = $params->get('scaling', 0);
	    $param_pseudostreaming = $params->get('pseudostreaming', 0);
	    $param_start = $params->get('start', 0);

	    $param_key = $params->get('key', '');
	    $param_logo = $params->get('logo', '');

	    $param_backgroundColor      = $params->get('backgroundColor', '#222222');
	    $param_durationColor        = $params->get('durationColor', '#ffffff');
	    $param_volumeSliderColor    = $params->get('volumeSliderColor', '#000000');
	    $param_bufferColor          = $params->get('bufferColor', '#445566');
	    $param_buttonOverColor      = $params->get('buttonOverColor', '#728B94');
	    $param_sliderColor          = $params->get('sliderColor', '#000000');
	    $param_progressColor        = $params->get('progressColor', '#112233');
	    $param_volumeSliderGradient = $params->get('volumeSliderGradient', 'none');
	    $param_backgroundGradient   = $params->get('backgroundGradient', '[0.6,0.3,0,0,0]');
	    $param_borderRadius         = $params->get('borderRadius', '0px');
	    $param_buttonColor          = $params->get('buttonColor', '#5F747C');
	    $param_tooltipTextColor     = $params->get('tooltipTextColor', '#ffffff');
	    $param_sliderGradient       = $params->get('sliderGradient', 'none');
	    $param_timeColor            = $params->get('timeColor', '#01DAFF');
	    $param_progressGradient     = $params->get('progressGradient', 'medium');
	    $param_timeBgColor          = $params->get('timeBgColor', '#555555');
	    $param_tooltipColor         = $params->get('tooltipColor', '#5F747C');
	    $param_bufferGradient       = $params->get('bufferGradient', 'none');
	    $param_cbheight             = $params->get('height', '24');
	    $param_opacity              = $params->get('opacity', '1.0');

		$clip_param = "";
		if ($param_accelerated == 1) {
		  $clip_param.= ",accelerated: true";
		} else if ($param_accelerated == 0) {
		  $clip_param.= ",accelerated: false";
		}
		if ($param_autoBuffering == 1) {
		  $clip_param.= ",autoBuffering: true";
		} else if ($param_autoBuffering == 0) {
		  $clip_param.= ",autoBuffering: false";
		}
		if (isset($autostart) && $autostart == "0") {
		  $clip_param.= ",autoPlay: false";
		  $autoPlay = "false";
		} else if ($param_autoPlay == 1 || (isset($autostart) && $autostart == "1")) {
		  $clip_param.= ",autoPlay: true";
		  $autoPlay = "true";
		} else {
		  $clip_param.= ",autoPlay: false";
		  $autoPlay = "false";
		}
		$clip_param.= ",bufferLength: ".$param_bufferLength;
		if (isset($param_linkUrl) && !empty($param_linkUrl)) {
			$clip_param.= ",linkUrl: ".$param_linkUrl;

		}
		if ($param_scaling == 0) {
			$clip_param.= ",scaling: \"scale\"";
		} else if ($param_scaling == 1) {
			$clip_param.= ",scaling: \"fit\"";
		} else if ($param_scaling == 2) {
			$clip_param.= ",scaling: \"half\"";
		} else if ($param_scaling == 3) {
			$clip_param.= ",scaling: \"orig\"";
		}

		if (($c->loadmootools == "on") && (strpos(JURI::base(true), "/administrator") === false)) {
			JHTML::_('behavior.mootools');
		}

		if ($mediatype == "playlist" && !is_array($flv_url)) {

			// parse xml playlists
			require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xmlparse.class.php');
			$parser = new HWDVS_xmlParse();
			$path = 'xspf'.DS.@basename($flv_url, ".xml");
			$parsed_list = $parser->parse($path);

			if (count($parsed_list) > 0) {
				$preRoll = false;
				$flv_url = '';
				for ($i=0, $n=count($parsed_list); $i < $n; $i++)
				{
					$pos = strpos($parsed_list[$i]['location'], "http");
					if ($pos === false) {
						$vURL = 'http://'.$_SERVER['HTTP_HOST'].$parsed_list[$i]['location'];
					} else {
						$vURL = $parsed_list[$i]['location'];
					}
					$flv_url[$i] = urlencode($vURL);
				}
			} else {
				$preRoll = true;
			}

		} else {

			$preRoll = true;

		}

		if ($param_pseudostreaming == 1 || $param_pseudostreaming == 2) {

			$streamer = true;

		} else {

			$streamer = false;

		}

		if ($streamer && $rtmp !== 1)
		{
			$provider = ", provider: 'hwdvsservice' ";

			if ($param_start > 0) {

				$provider.= ", start: '".$param_start."' ";

			}

			$streamer_plugin = "hwdvsservice: {
										   url: '".JURI::root()."plugins/hwdvs-videoplayer/flow/flowplayer.pseudostreaming-3.1.3.swf'
                                },";
		}
		else if ($rtmp == "1")
		{

			//$rtmp_file = "vod/demo.flowplayer/metacafe.flv";
			//$rtmp_streamer = "rtmp://vod01.netdna.com/play";
			//$rtmp_file = "christopherandkatrina/Christopher%20Hussey%20and%20Katrina%20Branson%20-%20Routine%20-%20Turn%20It%20On%2c%20Turn%20It%20Up%20-%20US%20Open%202006.mp4";
			//$rtmp_streamer = "rtmp://s30ivv0t2ww666.cloudfront.net/cfx/st";

			$parsed_url = parse_url($flv_url);

			$rtmp_file_temp = $parsed_url['path'];
			$rtmp_file_temp = explode(":", $rtmp_file_temp, 2);

			if (!empty($rtmp_file_temp[1])) {

				$rtmp_file = $rtmp_file_temp[1];

				$rtmp_streamer_temp = $rtmp_file_temp[0];
				$rtmp_streamer_temp = explode("/", $rtmp_streamer_temp);;

				$rtmp_path = implode("/", $rtmp_streamer_temp);

				$type = $rtmp_streamer_temp[count($rtmp_streamer_temp)-1];

				$rtmp_streamer = $parsed_url['scheme']."://".$parsed_url['host'].$rtmp_path;

			} else {

				$rtmp_file = null;
				$rtmp_streamer = null;

			}

			$flv_url = $rtmp_file;
			$netConnectionUrl = $rtmp_streamer;

			$provider = ", provider: 'hwdvsservice' ";
			$streamer_plugin = "hwdvsservice: {
										   url: '".JURI::root()."plugins/hwdvs-videoplayer/flow/flowplayer.rtmp-3.1.3.swf',
                                           netConnectionUrl: '".$netConnectionUrl."'
                                },";

			$clip_param = "";

		} else {

			$provider = "";
			$streamer_plugin = "";

		}

		$code.='<script type="text/javascript" src="'.JURI::root().'plugins/hwdvs-videoplayer/flow/flowplayer-3.1.4.min.js"></script>
				<a
					style="display:block;width:'.$param_width.'px;height:'.$param_height.'px;"
					id="hwdvideo_'.$ui.'">
				</a>
				<script type="text/javascript" language="javajcript">';
				//if ($c->ieoa_fix == 1) { $code.='window.addEvent(\'domready\', function(){'; } else { /* $code.='function goFlash() {'; */ }
				if ($c->ieoa_fix == 1) { $code.='window.addEvent(\'domready\', function(){'; } else { $code.='function goFlash() {'; }

		  if (!empty($param_key))
		  {
			$code.='flowplayer("hwdvideo_'.$ui.'", {src: "'.JURI::root().'plugins/hwdvs-videoplayer/flow/flowplayer.commercial-3.1.5.swf", wmode: "transparent"}, {';
			$code.= 'key: "'.$param_key.'",';

			  if (!empty($param_logo))
			  {
				$code.= 'logo: {
		                     url: "'.$param_logo.'",
				             fullscreenOnly: false,
				         },';
			  }
		  }
		  else
		  {
			$code.='flowplayer("hwdvideo_'.$ui.'", {src: "'.JURI::root().'plugins/hwdvs-videoplayer/flow/flowplayer-3.1.5.swf", wmode: "transparent"}, {';
		  }

		  if ($rtmp == "1" || $streamer) {} else
		  {
			$code.= 'type: "video",';
		  }

		  $code.='canvas: {backgroundColor: "transparent"},
		          plugins:  {';

		  if ($streamer || $rtmp == "1") {

			$code.= $streamer_plugin;

		  }

		  $code.='controls: {';
if ($mediatype == "playlist" && $preRoll && !empty($flv_url[0]))
{
				$code.='display: \'none\',';
}
else
{
				$code.='backgroundColor: \''.$param_backgroundColor.'\',
						durationColor: \''.$param_durationColor.'\',
						volumeSliderColor: \''.$param_volumeSliderColor.'\',
						bufferColor: \''.$param_bufferColor.'\',
						buttonOverColor: \''.$param_buttonOverColor.'\',
						sliderColor: \''.$param_sliderColor.'\',
						progressColor: \''.$param_progressColor.'\',
						volumeSliderGradient: \''.$param_volumeSliderGradient.'\',
						backgroundGradient: '.$param_backgroundGradient.',
						borderRadius: \''.$param_borderRadius.'\',
						buttonColor: \''.$param_buttonColor.'\',
						tooltipTextColor: \''.$param_tooltipTextColor.'\',
						sliderGradient: \''.$param_sliderGradient.'\',
						timeColor: \''.$param_timeColor.'\',
						progressGradient: \''.$param_progressGradient.'\',
						timeBgColor: \''.$param_timeBgColor.'\',
						tooltipColor: \''.$param_tooltipColor.'\',
						bufferGradient: \''.$param_bufferGradient.'\',
						height: '.$param_cbheight.',
						opacity: '.$param_opacity.',';
}
if ($mediatype == "playlist" && !$preRoll)
{
				$code.='playlist: true,';
}
			$code.='   }
					},';

		  $data = '';

		  if (!empty($thumb_url)) { $data.= '{ url:\''.$thumb_url.'\', autoPlay: true '.$provider.'},'; }

		  if ($mediatype == "playlist") {

			// if (!empty($flv_url[0])) { $data.= '\''.$flv_url[0].'\','; }

			if ($preRoll) {

				if (!empty($flv_url[0])) {
											   $data.= '{url:\''.$flv_url[0].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().hide(); }, onBeforeFinish: function ()  { return false; }},';
				}

				if (!empty($flv_url[1])) {

					if (empty($flv_url[0])) {
						if (isset($autostart) && $autostart == "0") {
						  $autoPlay = "false";
						} else if ($param_autoPlay == 1 || (isset($autostart) && $autostart == "1")) {
						  $autoPlay = "true";
						}
					} else {
						$autoPlay = 'true';
					}

					if (empty($flv_url[2]) && $param_repeat == "1") {
											   $data.= '{url:\''.$flv_url[1].'\' '.$provider.', autoPlay: '.$autoPlay.', onStart: function() { this.getControls().show(); }, onBeforeFinish: function ()  { return false; }}';
					} else if (empty($flv_url[2]) && $param_repeat == "0") {
											   $data.= '{url:\''.$flv_url[1].'\' '.$provider.', autoPlay: '.$autoPlay.', onStart: function() { this.getControls().show(); } }';
					} else {
											   $data.= '{url:\''.$flv_url[1].'\' '.$provider.', autoPlay: '.$autoPlay.', onStart: function() { this.getControls().show(); } },';
					}

				}

				if (!empty($flv_url[2])) {
						if ($param_repeat == "1") {
											   $data.= '{url:\''.$flv_url[2].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().hide(); }, onBeforeFinish: function ()  { return false; }}';
						} else if ($param_repeat == "0") {
											   $data.= '{url:\''.$flv_url[2].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().hide(); } }';
						}
				}

			} else {

				for ($i=1, $n=count($flv_url); $i < $n; $i++)
				{

					if (!empty($flv_url[$i])) {

						if (empty($flv_url[$i+1]) && $param_repeat == "1") {
											   $data.= '{url:\''.$flv_url[$i].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().show(); }, onBeforeFinish: function ()  { return false; }}';
						} else if (empty($flv_url[$i+1]) && $param_repeat == "0") {
											   $data.= '{url:\''.$flv_url[$i].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().show(); } }';
						} else {
											   $data.= '{url:\''.$flv_url[$i].'\' '.$provider.', autoPlay: true, onStart: function() { this.getControls().show(); } },';
						}

					}

				}

			}

			//if (!empty($flv_url[1])) {
			//	if (empty($flv_url[2]) && $param_repeat == "1") {
			//						   $data.= '{url:\''.$flv_url[1].'\', autoPlay: true, onStart: function() { this.getControls().show(); }, onBeforeFinish: function ()  { return false; }}';
			//	} else if (empty($flv_url[2]) && $param_repeat == "0") {
			//						   $data.= '{url:\''.$flv_url[1].'\', autoPlay: true, onStart: function() { this.getControls().show(); } }';
			//	} else {
			//						   $data.= '{url:\''.$flv_url[1].'\', autoPlay: true, onStart: function() { this.getControls().show(); } },';
			//	}
			//}
			//
			//if (!empty($flv_url[2])) { $data.= '{url:\''.$flv_url[2].'\', autoPlay: true, onBeforeFinish: function ()  { return false; }}'; }

		  } else {

			if (!empty($flv_url[1])) {
				if ( $param_repeat == "1") {
									   $data.= '{url:\''.$flv_url.'\' '.$clip_param.' '.$provider.', autoPlay: '.$autoPlay.', onBeforeFinish: function ()  { return false; }}';
				} else {
									   $data.= '{url:\''.$flv_url.'\' '.$clip_param.' '.$provider.', autoPlay: '.$autoPlay.'}';
				}
			}

		  }

		$code.='    playlist: ['.$data.']';
		$code.='});';
				//if ($c->ieoa_fix == 1) { $code.='});'; } else { /* $code.='} goFlash();'; */ }
				if ($c->ieoa_fix == 1) { $code.='});'; } else { $code.='} goFlash();'; }
		$code.='</script>';

		return $code;
	}
    function prepareEmbedCode($flv_url, $flv_width=427, $flv_height=340, $ui=0, $mediatype="video", $flv_path=null, $thumb_url=null)
	{
		global $task, $mosConfig_sitename, $option, $mainframe;
		if (!defined('HWDVIDSPATH')) { define('HWDVIDSPATH', dirname(__FILE__).'/../../'); }
		$c = hwd_vs_Config::get_instance();

	    $param_width = 427;
	    $param_height = intval($param_width*$c->var_fb);

		$code=null;

		$data=null;
		if (!empty($thumb_url)) { $data.= '{ \'url\':\''.$thumb_url.'\', \'autoPlay\':true},'; }
		$data.= '{\'url\':\''.$flv_url.'\',\'autoPlay\':false}';


		if ($c->embedreturnlink == 1) {
			$code.='<div><center>';
		}
		$code.="<embed id=&#34;hwdvideo&#34; width=&#34;".$param_width."&#34; height=&#34;".$param_height."&#34; flashvars=&#34;config={";
		$code.="'type':'video','playerId':'hwdvideo','autoPlay':false,'playlist': [".$data."]";
		$code.="}&#34; bgcolor=&#34;#000000&#34; pluginspage=&#34;http://www.adobe.com/go/getflashplayer&#34; type=&#34;application/x-shockwave-flash&#34; quality=&#34;high&#34; allowscriptaccess=&#34;always&#34; allowfullscreen=&#34;true&#34; src=&#34;".JURI::root()."plugins/hwdvs-videoplayer/flow/flowplayer-3.1.5.swf&#34;/>";

		if ($c->embedreturnlink == 1) {
			$jconfig = new jconfig();
			$code.='<br /><a href=&#34;'.JURI::root().'&#34; title=&#34;'.$jconfig->sitename.'&#34;>'.$jconfig->sitename.'</a></center></div>';
		}
		return $code;
	}
	/**
	* Compiles information to add or edit a plugin
	* @param string The current GET/POST option
	* @param integer The unique id of the record to edit
	*/
	function getMyParams($element) {

		$plugin =& JPluginHelper::getPlugin('hwdvs-videoplayer', $element);
		$pluginParams = new JParameter( $plugin->params );
		return $pluginParams;

	}
}
?>