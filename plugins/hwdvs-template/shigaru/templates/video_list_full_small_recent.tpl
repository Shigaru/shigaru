{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<li>
	<div class="fleft thumb">{$data->thumbnail}</div>
	<div class="fleft">
		<h6>{$data->title} {$data->editvideo} {$data->deletevideo}</h6>
		<span class="fleft">{$smarty.const._HWDVIDS_INFO_SHARED} </span>{$data->uploader}
		<span> - {$data->duration} min</span>
	</div>
	<div class="plays">
		<div class="fright">
			<span>{$data->upload_date}</span>
		</div>
	</div>
</li>
