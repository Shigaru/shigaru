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
var oSearchParams = {
		ordering:'{/literal}{$sort}{literal}',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}{literal}' 
	};
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
								<a id="relevance" href="#" class="order orderselected">Relevance</a>
								<a id="date_uploaded" class="order" href="#">Most videos submitted</a>
								<a id="updated_rating" class="order" href="#">Most comments</a>
								<a id="number_of_views" class="order" href="#">Most followed</a>
								{if $totalvideos gt 0}
										<div class="fright mright12">
											<label for="limit">
												Show
											</label>
											{$vpageLimits}
										</div>
										<div class="clear"></div>
									{else}
										<div class="clear"></div>
									  {/if}	
						</div>
									  {if $print_matchvids}
										{foreach name=outer item=data from=$matchingvids}
											  <div class="searchResultItem">
											  <div>
										  {include file="video_list_users.tpl"}
										  </div>
										  </div>
										{/foreach}
									  {else}
										<div class="clear"></div>
										<div class="padding novideos">{$mvempty}</div>
									  {/if}
									  <div class="videopagination">
									  {$vpageNavigation}
									  </div>

