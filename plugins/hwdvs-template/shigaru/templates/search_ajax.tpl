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
<div class="f15em mbot12 mleft30">
									{$totalvideos} 
									{if $searchterm eq ''}
										{$smarty.const._HWDVIDS_META_SRCC}
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
						<div id="resultordering">
								<div>
									<h4>Order by:</h4>
								</div>	
								<a id="date_uploaded" class="order" href="#">Date uploaded</a>
								<a id="relevance" href="#" class="order orderselected">Relevance</a>
								<a id="updated_rating" class="order" href="#">Rating</a>
								<a id="number_of_views" class="order" href="#">Views</a>
								<!--<a id="number_of_comments" class="order" href="#">Comments</a>-->
								{if $totalvideos gt 0}
										<div class="fright mright12">
											<label for="limit">
												Display
											</label>
											{$vpageLimits}
										</div>
										<div class="clear"></div>
									{else}
										<div class="clear"></div>
									  {/if}	
						</div>
						{if $print_matchvids}
								<div id="resultcontainer">
									{foreach name=outer item=data from=$list}
									  {include file="video_list_full.tpl"}
									{/foreach}
									</div>
								  {else}
									<div class="padding">{$smarty.const._HWDVIDS_INFO_NUV}</div>
								  {/if}
									  
									  <div class="videopagination">
									  {$vpageNavigation}
									  </div>

