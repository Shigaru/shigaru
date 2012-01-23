{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div class="box">
<div style="float:left;">{$data->thumbnail}</div>
<div >

<div class="listtitle">{$data->title} {$data->editvideo} {$data->deletevideo}</div>
<div class="listshared">{$smarty.const._HWDVIDS_INFO_SHARED}  {$data->uploader} </div>
<div class="listviews"> {$smarty.const._HWDVIDS_INFO_PLAYS} <br /> <span class="fontred">{$data->views}</span></div>
     
</div>
<div style="clear:both;"></div>
</div>
