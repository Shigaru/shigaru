{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<li class="clearfix dispnon">
	<div class="fleft thumb mbot6">{$data->thumbnail}<span class="videotime"> {$data->duration} </span></div>
	<div class="fleft w60 mbot6">
		<h6>{$data->title} {$data->editvideo} {$data->deletevideo}</h6>
	</div>
	<div class="clear tshadowwhite">
		<div class="fleft"><span class="fleft mright6">{$smarty.const._HWDVIDS_INFO_SHARED} </span> {$data->uploader}</div>
		<div class="fright"><span class="fright playstext">{$data->views} {$smarty.const._HWDVIDS_INFO_PLAYS}</span></div>
	</div>
</li>
