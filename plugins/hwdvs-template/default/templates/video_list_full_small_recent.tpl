{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<!--
<div class="box">
<div style="width:{$thumbwidth}px;">{$data->thumbnail}</div>
<div >

<div class="listtitle">{$data->title} {$data->editvideo} {$data->deletevideo} {$data->publishvideo}</div>
<div class="listviews">{$data->views} {$smarty.const._HWDVIDS_INFO_VIEWS}</div>
<div class="listcat">{$smarty.const._HWDVIDS_INFO_CATEGORY}: {$data->category}</div>
{if $data->showrating}<div class="listrating">{$data->rating}</div>{/if}
<div class="listuploader">{$data->uploader}</div>
     
</div>
<div style="clear:both;"></div>
</div>
-->



<div class="box">
<div class="listthumb">{$data->thumbnail}</div>
<div >

<div class="listtitle">{$data->title} {$data->editvideo} {$data->deletevideo}</div>
<div class="listshared">{$smarty.const._HWDVIDS_INFO_SHARED}  {$data->uploader} </div>
<div class="listviews">{$data->upload_date}</div>
     
</div>
<div style="clear:both;"></div>
</div>












{* 
//////
//    <div class="listdesc">{$data->description}</div>
//    <div class="listduration">{$smarty.const._HWDVIDS_INFO_DURATION}: {$data->duration}</div>
//    <div class="listduration">{$smarty.const._HWDVIDS_DETAILS_VDATE}: {$data->upload_date}</div>
//    {$data->avatar}
//////
*}
