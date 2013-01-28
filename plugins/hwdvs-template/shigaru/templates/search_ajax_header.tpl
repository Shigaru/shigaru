{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div id="roksearch_results" class="roksearch_results">
	<div class="roksearch_wrapper1">
		<div class="roksearch_wrapper2">
			<div class="roksearch_wrapper3">
				<div class="roksearch_wrapper4">
				{if $totalvideos gt 0}
					<div class="roksearch_header png">
							<span class="fleft f120 fontbold fontblack pad6">{$totalvideos} Results </span>
							<a href="#" class="btn fright pad6" title="CLick on this link to view all search results">
								<span class="icon-eye-open"></span>
								<span class="pad4">View all results</span>
							</a>
							<div class="clear"></div>
					</div>
				{/if}	
					<div class="container-wrapper">
									  {if $print_matchvids}
										{foreach name=outer item=data from=$matchingvids}
										  {include file="video_list_search_header.tpl"}
										{/foreach}
									  {else}
										<div class="clear"></div>
										<div class="padding novideos pad12 fontbold tcenter"><span class="icon-tint"></span>{$mvempty}</div>
									  {/if}
					</div>
				{if $totalvideos gt 0}	
					<div class="roksearch_header png">
							<span class="fleft f120 fontbold fontblack pad6">{$totalvideos} Results </span>
							<a href="#" class="btn fright pad6" title="CLick on this link to view all search results">
								<span class="icon-eye-open"></span>
								<span class="pad4">View all results</span>
							</a>
							<div class="clear"></div>
					</div>
				{/if}	
				</div>
			</div>
		</div>
	</div>
</div>
