{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
{literal}
<script type="text/javascript">
oSearchParams.ordering='{/literal}{$sort}{literal}',
oSearchParams.filtering=null;
</script>
{/literal}
					<div id="searchsummary" class="f15em mbot12 clearfix">
									{$totalvideos} 
									{if $searchterm eq ''}
										{$smarty.const._HWDVIDS_META_SRCCEE}
									{else}
										{$smarty.const._HWDVIDS_META_SRF}
									{/if}	
									<b> {$searchterm}</b>
									{if $totalvideos gt 0}
									<span class="f80">
										{$vpageCounter}
									</span>
									{/if}
						</div>	
						
						{if $print_matchvids}
								<div id="resultsajax">
									{foreach name=outer item=data from=$matchingvids}
									  {include file="video_list_full.tpl"}
									{/foreach}
									</div>
								  {else}
									<div class="padding">{$smarty.const._HWDVIDS_INFO_NUV}</div>
								  {/if}
									  
									  <div class="videopagination">
									  {$vpageNavigation}
									  </div>

