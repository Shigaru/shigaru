{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script type="text/javascript" src="{$domain}templates/rhuk_milkyway/js/chosen.jquery.min.js"></script>
{literal}
<script type="text/javascript">
jQuery(document).ready(function($){
	jQuery('.searchwrapper').shigaruSearch();
	jQuery('select#genre_id,select#language_id,select#intrument_id').addClass('w90').chosen({allow_single_deselect:true});
});


var oSearchParams = {
		ordering:'date_uploaded',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}{literal}'
	};
</script>
{/literal}
<div class="searchwrapper">
<div class="f90">
<div id="searchtabs">
		<div id="quicksearch" class="quicksearch">
			<span class="mtop12"></span>
			<form class="mtop12 mbot12" id="searchForm" action="{$formurl}" method="post" name="searchForm">
				<div class="w50 fleft">
					<input type="text" placeholder="Start typing and see our suggestions..." name="pattern" id="searchinput" maxlength="20" value="{$searchterm}" class="inputbox" />
					<button id="searchgo" class= button fnone" type="submit" onclick="this.form.submit();" name="Submit"><span class="gbqfi"></span></button>
					<input type="hidden" name="task"   value="search" />
				</div>	
				<div class="search-results-filter-categories fleft" style="display: block; ">
					<!--<p class="search-results-categories search-results-category-default_collection">
						<span class="styledCheckbox styledCheckboxChecked" for="search-results-input-category-default_collection">
							<label id="videos" for="search-results-input-category-default_collection">Videos </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-smartphones">
						<span class="styledCheckbox" for="search-results-input-category-smartphones">
							<label id="scomments" for="search-results-input-category-smartphones">Comments </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-help search-results-categories-last">
						<span class="styledCheckbox" for="search-results-input-category-help">
							<label id="users" for="search-results-input-category-help">Users</label>
						</span>
					</p>
					-->
				</div>		
			</form>
			
		</div>
   
    
</div>    

</div> 
<div class="contentpaneopen clear">
		
		<div id="resultfilters">
			<div>
				<h4><span class="icon-filter mright6"></span>Filters</h4>
			</div>	
			<div id="level_id" class="filter filtercheck videos">
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
			<div id="category_id" class="filter filtercheck videos">
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
			<div id="genre_id" class="filter filtercombo videos">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_GENRE}
				</label>
				<div  class="widget">
					{$genresCombo}
			</div>
				
			</div>
			<div id="language_id" class="filter filtercombo videos">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}
				</label>
				<div  class="widget">
					{$languagesCombo}
				</div>
				
			</div>
			<div id="intrument_id" class="filter filtercombo videos">
				<label>
				{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}
				</label>
				<div class="widget">
					{$instrumentsCombo}
				</div>
				
			</div>
			
			<div id="daterange" class="filter filtercheck videos">
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
			<div id="video_length" class="filter filtercheck videos">
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
<script type="text/javascript"><!--
google_ad_client = "ca-pub-1916456389191969";
/* search_module */
google_ad_slot = "7689083467";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		<!--	<div id="cb_sex" class="filter filtercheck users">
				<label>Sex</label>
				<div class="widget">
					<label>
					<input type="radio" value="1"><a href="#">Male</a>
					</label>
					<label>
					<input type="radio" value="2"><a href="#">Female</a>
					</label>
					<label>
					<input type="radio" checked="checked" value=""><a href="#">Male and female</a>
					</label>
				</div>
			</div>
			<div id="cb_agegroup" class="filter filtercombo users">
				<label>
				Age between:
				</label>
				<div  class="widget">
					<select name="cb_youragegroup" id="cb_youragegroup" class="required inputbox">
						<option value=""> </option>
						<option value="10 - 15" >10 - 15</option>
						<option value="15 - 20" >15 - 20</option>
						<option value="20 - 25" >20 - 25</option>
						<option value="25 - 30" >25 - 30</option>
						<option value="30 - 35" >30 - 35</option>
						<option value="35 - 40" >35 - 40</option>
						<option value="40 - 45" >40 - 45</option>
						<option value="45 - 50" >45 - 50</option>
						<option value="50 - 55" >50 - 55</option>
						<option value="55 - 60" >55 - 60</option>
						<option value="60 - 65" >60 - 65</option>
						<option value="65 - 70" >65 - 70</option>
						<option value="70 - 75" >70 - 75</option>
						<option value="75 - 80" >75 - 80</option>
						<option value="80 - 85" >80 - 85</option>
						<option value="85 - 90" >85 - 90</option>
						<option value="90 - 95" >90 - 95</option>
						<option value="95 -100" >95 -100</option>
						<option value="100 - 105">100 - 105</option>
					</select>
					<label>
					<input type="checkbox" value="1"><a href="#">with picture</a>
					</label>
				</div>
			</div>	
			<div id="cb_country" class="filter filtercombo users">
				<label>
				Country
				</label>
				<div  class="widget">
					{$countries}
				</div>
			</div>	
			<div id="instrumentsplay" class="filter filtercombo users">
				<label>
				Plays
				</label>
				<div  class="widget">
					{$instrumentsPlay}
				</div>	
			</div>
			<div id="instrumentlevel" class="filter filtercombo users">
				<label>
				Level
				</label>
				<div  class="widget">
					{$levelsCombo}
				</div>	
			</div>
			<div id="languagesspoken" class="filter filtercombo users">
				<label>
				Speaks
				</label>
				<div  class="widget">
					{$languagesspoken}
				</div>	
			</div>
			-->
		</div>	
		
		<div id="resultwrapper">
			
						<div class="f15em mbot12 mleft30">
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
						<div id="resultordering">
								<div>
									<h4>Order by:</h4>
								</div>	
								<a id="date_uploaded" href="#" class="order orderselected">Date uploaded</a>
								<a id="relevance" class="order" href="#">Relevance</a>
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
