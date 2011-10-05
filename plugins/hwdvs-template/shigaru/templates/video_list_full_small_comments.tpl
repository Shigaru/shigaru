{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}


<div class="box">
<div class="listthumb">{$data->thumbnail}</div>
<div >

<div class="listtitle">{$data->title} {$data->editvideo} {$data->deletevideo}</div>
<div class="listshared">{$smarty.const._HWDVIDS_INFO_SHARED}  {$data->uploader} </div>
<div class="listviews listcomments"><span class="dispnon">{$smarty.const._HWDVIDS_INFO_NOCOMM}</span>{$data->comments}</div>
     
</div>
<div style="clear:both;"></div>
</div>



