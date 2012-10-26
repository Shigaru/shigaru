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
jQuery(document).ready(function($){
	jQuery('.searchwrapper').shigaruSearch();
});


var oSearchParams = {
		ordering:'relevance',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}{literal}'
	};
</script>
{/literal}
<div class="searchwrapper">
<div class="f90">
<div id="searchtabs">
		<div id="quicksearch" class="quicksearch">
			<span class="mtop12"><?php echo JText::_('Start typing and see our suggestions...'); ?></span>
			<form class="mtop12 mbot12" id="searchForm" action="{$formurl}" method="post" name="searchForm">
				<div class="w50 fleft">
					<input type="text" name="pattern" id="searchinput" maxlength="20" value="{$searchterm}" class="inputbox" />
					<button id="searchgo" class= button fnone" type="submit" onclick="this.form.submit();" name="Submit"><span class="gbqfi"></span></button>
					<input type="hidden" name="task"   value="search" />
				</div>	
				<div class="search-results-filter-categories fleft" style="display: block; ">
					<p class="search-results-categories search-results-category-default_collection">
						<input name="search-results-category" type="checkbox" checked="" id="search-results-input-category-default_collection" value="default_collection" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox styledCheckboxChecked" for="search-results-input-category-default_collection">
							<label for="search-results-input-category-default_collection">Videos </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-smartphones">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-smartphones" value="smartphones" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-smartphones">
							<label for="search-results-input-category-smartphones">Comments </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-help search-results-categories-last">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-help" value="help" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-help">
							<label for="search-results-input-category-help">Users</label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-help search-results-categories-last">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-help" value="help" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-help">
							<label for="search-results-input-category-help">All</label>
						</span>
					</p>
				</div>		
			</form>
			
		</div>
   
    
</div>    

</div> 
<div class="contentpaneopen clear">
		
		<div id="resultfilters">
			<div>
				<h4>Filters</h4>
			</div>	
			<div id="level_id" class="filter filtercheck">
				<label>Difficulty level</label>
				<div class="widget">
					<label>
					<input type="checkbox" value="10"><a href="#">Absolute Beginner</a>
					</label>
					<label>
					<input type="checkbox" value="20"><a href="#">Beginner</a>
					</label>
					<label>
					<input type="checkbox" value="30"><a href="#">Intermediate</a>
					</label>
					<label>
					<input type="checkbox" value="40"><a href="#">Upper Intermediate</a>
					</label>
					<label>
					<input type="checkbox" value="50"><a href="#">Expert</a>
					</label>
				</div>
			</div>
			<div id="category_id" class="filter filtercheck">
				<label>Type of video</label>
				<div class="widget">
					<label for="category_id_default">
						<input type="radio" value="" id="category_id_default" name="category_id" checked="checked"><span><a href="#">All</a></span>
					</label>
					<label for="category_id_3">
						<input type="radio" value="1" id="category_id_1" name="category_id"><span><a href="#">Tutorial - How to play a song/tune</a></span>
					</label>
					<label for="category_id_3">
						<input type="radio" value="2" id="category_id_2" name="category_id"><span><a href="#">Music Theory Tutorial</a></span>
					</label>
					<label for="category_id_3">
						<input type="radio" value="3" id="category_id_3" name="category_id"><span><a href="#">Non Tutorial (Watch me play!)</a></span>
					</label>
				</div>
			</div>
			<div id="genre_id" class="filter filtercombo">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_GENRE}
				</label>
				<div id="builttype" class="widget">
					{$genresCombo}
				</div>
				
			</div>
			<div id="language_id" class="filter filtercombo">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}
				</label>
				<div id="builttype" class="widget">
					{$languagesCombo}
				</div>
				
			</div>
			<div id="intrument_id" class="filter filtercombo">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}
				</label>
				<div class="widget">
					{$instrumentsCombo}
				</div>
				
			</div>
			
			<div id="daterange" class="filter filtercheck">
				<label>
				Date
				</label>
				<div class="widget">
					<label for="daterange_default">
						<input type="radio" value="" id="daterange_default" name="daterange" checked="checked"><span><a href="#">Anytime</a></span>
					</label>
					<label for="daterange_1">
						<input type="radio" value="1" id="daterange_1" name="daterange"><span><a href="#">Last week</a></span>
					</label>
					<label for="daterange_2">
						<input type="radio" value="2" id="daterange_2" name="daterange"><span><a href="#">Last month</a></span>
					</label>
					<label for="daterange_3">
						<input type="radio" value="3" id="daterange_3" name="daterange"><span><a href="#">Last year</a></span>
					</label>
				</div>
				
			</div>
			<div id="video_length" class="filter filtercheck">
				<label>
				Duration
				</label>
				<div class="widget">
					<label for="video_length_default">
						<input type="radio" value="" id="video_length_default" name="video_length" checked="checked"><span><a href="#">All</a></span>
					</label>
					<label for="video_length_1">
						<input type="radio" value="1" id="video_length_1" name="video_length"><span><a href="#">Short videos (1-3min)</a></span>
					</label>
					<label for="video_length_2">
						<input type="radio" value="2" id="video_length_2" name="video_length"><span><a href="#">Medium videos (3-10min)</a></span>
					</label>
					<label for="video_length_3">
						<input type="radio" value="3" id="video_length_3" name="video_length"><span><a href="#">Long videos (+10min)</a></span>
					</label>
				</div>			
			</div>
		</div>	
		
		<div id="resultwrapper">
			
						<div class="f15em mbot12 mleft30">
									
									{if $searchterm eq ''}
										{$smarty.const._HWDVIDS_META_SRCCEE}
									{else}
										{$totalvideos} 
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
									{else}
										<div class="clear"></div>
									  {/if}
						</div>		
		
									<div id="videoresultwrapper">
									  {if $print_matchvids}
									  
										{foreach name=outer item=data from=$matchingvids}
											  <div class="searchResultItem">
											  <div>
										  {include file="video_list_full.tpl"}
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
									   </div>
	</div>
</div>

<div style="clear:both;"></div>
