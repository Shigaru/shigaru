{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div id="whitebox" class="mtop12">
				<div class="whiteboxHeader">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_FEATURED_VIDEOS}
							</h6>
						</div>
					
				</div>			
				

				<div id="whitebox_m">
						{if $print_multiple_featured}
						  {foreach name=outer item=data from=$featuredlist}
							  <div class="videoBox">
						  {include file="video_list_full.tpl"}
						  </div>
						  {if $smarty.foreach.outer.last}
							 <div style="clear:both;"></div>
						  {elseif $smarty.foreach.outer.index % $vpr-($vpr-1) == 0}
							 <div style="clear:both;"></div>
						  {/if}
						  {/foreach}

						  <div style="text-align:right;padding:5px;"><a href="{$featured_link}" title="{$smarty.const._HWDVIDS_INFO_MOREFEATUREDV}">{$smarty.const._HWDVIDS_INFO_MOREFEATUREDV}</a></div>
						  {/if}
</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
