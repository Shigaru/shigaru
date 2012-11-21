{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<li>
	<div class="fleft thumb">{$data->thumbnail}<span class="videotime"> {$data->duration} </span></div>
	<div class="fleft">
		<h6>{$data->title} {$data->editvideo} {$data->deletevideo}</h6>
		<span class="fleft mright6">{$smarty.const._HWDVIDS_INFO_SHARED} </span>{$data->uploader}
	</div>
	<div class="plays">
		<div class="fright">
			<span>{$data->views}</span>
			<span class="fright playstext">{$smarty.const._HWDVIDS_INFO_PLAYS}</span>
		</div>
	</div>
</li>


