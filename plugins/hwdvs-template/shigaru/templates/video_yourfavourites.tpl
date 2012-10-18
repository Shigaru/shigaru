{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}
{if $otheruser eq 'no'}
<div class="content_box">
<h3 class="mbot12">{$smarty.const._HWDVIDS_TITLE_YOURFAVS}</h3>
</div>
{/if}
<span class="mleft12 f15em fontbold">{$total}</span> <span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_VIDEOSFAVORITED}</span>


<div id="resultwrapper">
  {if $print_videolist}
    {foreach name=outer item=data from=$list}
          <div class="searchResultItem">
          <div>
	  {include file="video_list_full.tpl"}
			</div>
		</div>
	  {if $smarty.foreach.outer.last}
	     <div style="clear:both;"></div>
	  {elseif $smarty.foreach.outer.index % $vpr-($vpr-1) == 0}
	     <div style="clear:both;"></div>
	  {/if}
    {/foreach}
  {else}
    <div class="padding">{$smarty.const._HWDVIDS_INFO_NFV}</div>
  {/if}
  <div align="center" class="mtop25">
  {$pageNavigation}
  </div>
</div>

