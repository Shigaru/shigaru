{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div class="box listitem">
	<div class="listthumb">{$data->thumbnail}</div>
	<div>
		<div class="entry-meta">
			<div class="entry-title">{$data->title} {$data->editvideo} {$data->deletevideo}</div>
			<div class="author">{$smarty.const._HWDVIDS_INFO_SHARED}  {$data->uploader} </div>
			<div class="sideinfo listviews listcomments fontred"><span class="dispnon">{$smarty.const._HWDVIDS_INFO_NOCOMM}</span>{$data->comments}</div>
     </div>    
	</div>
<div style="clear:both;"></div>
</div>



