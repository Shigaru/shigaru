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
		<div class="videolistoptions">
			<a class="btn btn-small" href="#"><i class="icon-cog"></i></a>
			<ul class="dropdown-menu">
				<li>{$data->editvideo}</li>
				<li>{$data->deletevideo}</li>
			</ul>
		</div>
		<span class="fleft">{$smarty.const._HWDVIDS_INFO_SHARED} </span>{$data->uploader}
	</div>
	<div class="plays">
		<div class="fright">
			<span>{$data->views}</span>
			<span class="fright playstext">{$smarty.const._HWDVIDS_INFO_PLAYS}</span>
		</div>
	</div>
</li>
