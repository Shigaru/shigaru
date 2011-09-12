{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
{if $print_multiple_featured}
    <div class="standard">
      {foreach name=outer item=data from=$featuredlist}
        {if $smarty.foreach.outer.first}{else}
          <div class="videoBox">
	  {include file="video_list_full.tpl"}
	  </div>
	  {if $smarty.foreach.outer.last}
	     <div style="clear:both;"></div>
	  {elseif $smarty.foreach.outer.index % $vpr == 0}
	     <div style="clear:both;"></div>
	  {/if}
        {/if}
      {/foreach}

      <div style="text-align:right;padding:5px;"><a href="{$featured_link}" title="{$smarty.const._HWDVIDS_INFO_MOREFEATUREDV}">{$smarty.const._HWDVIDS_INFO_MOREFEATUREDV}</a></div>
    </div>
  {/if}
//////
*}

<div id="whitebox" class="mtop12">
				<div class="whiteboxHeader random">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_RANDOM_VIDEOS}
							</h6>
						</div>
					
				</div>	
				<div id="whitebox_m">
					<div class="padding">
							<center>
								{$featured_video_player}
								<div id="randonvideodescrip"> {$featured_video_details->title}</div>
								<div id="randonvideoautor">{$smarty.const._HWDVIDS_INFO_SHARED}{$featured_video_details->uploader}</div>
								<div><b>{$smarty.const._HWDVIDS_DESC}&#58;</b> {$featured_video_details->description_truncated} <a href="{$featured_video_details->videourl}" tittle="{$smarty.const._HWDVIDS_MORE}">{$smarty.const._HWDVIDS_MORE} &raquo;</a></div>
								<div style="clear:both;"></div>
							</center>
					</div>
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
<br />
  
