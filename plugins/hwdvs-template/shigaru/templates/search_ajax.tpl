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
		filtering:null
	};
</script>
{/literal}
<div class="f15em mbot12 mleft30">
									{$totalvideos} {$smarty.const._HWDVIDS_META_SRF}
									<b> {$searchterm}</b>
									{if $totalvideos gt 0}
									<span class="f80">
										{$vpageCounter}
									</span>
									<?php endif; ?>
									{/if}	
						</div>
						<div id="resultordering">
								<div>
									<h4>Order by:</h4>
								</div>	
								<a id="relevance" href="#" class="order orderselected">Relevance</a>
								<a id="date_uploaded" class="order" href="#">Date uploaded</a>
								<a id="updated_rating" class="order" href="#">Rating</a>
								<a id="number_of_views" class="order" href="#">Views</a>
								<!--<a id="number_of_comments" class="order" href="#">Comments</a>-->
								{if $totalvideos gt 0}
										<div class="fright mright12">
											<label for="limit">
												<?php echo JText::_( 'Display Num' ); ?>
											</label>
											{$vpageLimits}
										</div>
										<div class="clear"></div>
									{/if}	
						</div>
									  {if $print_matchvids}
										{foreach name=outer item=data from=$matchingvids}
											  <div class="searchResultItem">
											  <div>
										  {include file="video_list_full.tpl"}
										  </div>
										  </div>
										{/foreach}
									  {else}
										<div class="padding">{$mvempty}</div>
									  {/if}
									  {$vpageNavigation}

