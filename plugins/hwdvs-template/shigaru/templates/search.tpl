{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="searchwrapper">
<div class="f90">
<div id="searchtabs">
		<div id="quicksearch" class="quicksearch">
			<span class="mtop12"></span>
			<form class="mtop12 mbot12" id="searchForm" action="{$formurl}" method="post" name="searchForm">
				<div class="w50 fleft">
					<input type="text" name="pattern" id="searchinput" maxlength="20" value="{$searchterm}" class="inputbox" />
					<button id="searchgo" class= button fnone" type="submit" onclick="this.form.submit();" name="Submit"><span class="gbqfi"></span></button>
					<input type="hidden" name="task"   value="search" />
				</div>	
				<!--<div class="search-results-filter-categories fleft" style="display: block; ">
					<p class="search-results-categories search-results-category-default_collection">
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
				</div>		-->
			</form>
			
		</div>
   
    
</div>    

</div> 
<div class="contentpaneopen clear">
		
		<div id="resultfilters">
			<div>
				<h4><span class="icon-filter mright6"></span>{$smarty.const._HWDVIDS_SHIGARU_FILTERS}</h4>
			</div>	
			<div id="level_id" class="filter filtercheck videos">
				<label>{$smarty.const._HWDVIDS_SHIGARU_DIFFICULTYLEVEL}</label>
				<div class="widget">
					<label>
					<input type="checkbox" value="10"><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LEVELS_ABSOLUTE_BEGINNER}</a>
					</label>
					<label>
					<input type="checkbox" value="20"><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LEVELS_BEGINNER}</a>
					</label>
					<label>
					<input type="checkbox" value="30"><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LEVELS_INTERMEDIATE}</a>
					</label>
					<label>
					<input type="checkbox" value="40"><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LEVELS_UPPER_INTERMEDIATE}</a>
					</label>
					<label>
					<input type="checkbox" value="50"><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LEVELS_EXPERT}</a>
					</label>
				</div>
			</div>
			<div id="category_id" class="filter filtercheck videos">
				<label>{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO}</label>
				<div class="widget">
					<label for="category_id_default">
						<input type="radio" value="" id="category_id_default" name="category_id" checked="checked"><span><a href="#">{$smarty.const._HWDVIDS_ALL}</a></span>
					</label>
					<label for="category_id_1">
						<input type="radio" value="1" id="category_id_1" name="category_id"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_SONGTUTORIALS}</a></span>
					</label>
					<label for="category_id_3">
						<input type="radio" value="3" id="category_id_2" name="category_id"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_THEORY}</a></span>
					</label>
					<label for="category_id_2">
						<input type="radio" value="2" id="category_id_3" name="category_id"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_WATCHMEPLAY}</a></span>
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
				{$smarty.const._HWDVIDS_SHIGARU_DATE}
				</label>
				<div class="widget">
					<label for="daterange_default">
						<input type="radio" value="" id="daterange_default" name="daterange" checked="checked"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_ANYTIME}</a></span>
					</label>
					<label for="daterange_1">
						<input type="radio" value="1" id="daterange_1" name="daterange"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LASTWEEK}</a></span>
					</label>
					<label for="daterange_2">
						<input type="radio" value="2" id="daterange_2" name="daterange"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LASTMONTH}</a></span>
					</label>
					<label for="daterange_3">
						<input type="radio" value="3" id="daterange_3" name="daterange"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LASTYEAR}</a></span>
					</label>
				</div>
				
			</div>
			<div id="video_length" class="filter filtercheck videos">
				<label>
				{$smarty.const._HWDVIDS_LENGTH}
				</label>
				<div class="widget">
					<label for="video_length_default">
						<input type="radio" value="" id="video_length_default" name="video_length" checked="checked"><span><a href="#">{$smarty.const._HWDVIDS_ALL}</a></span>
					</label>
					<label for="video_length_1">
						<input type="radio" value="1" id="video_length_1" name="video_length"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_SHORVIDEOS}</a></span>
					</label>
					<label for="video_length_2">
						<input type="radio" value="2" id="video_length_2" name="video_length"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_MEDIUMVIDEOS}</a></span>
					</label>
					<label for="video_length_3">
						<input type="radio" value="3" id="video_length_3" name="video_length"><span><a href="#">{$smarty.const._HWDVIDS_SHIGARU_LONGVIDEOS}</a></span>
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
			
						<div class="f15em mbot12 clearfix">
							<div id="searchsummarytext" class="fleft">
						
							</div>
							<div class="fright f80">		
								{if $totalvideos gt 0}
										<div class="f80">
											<label for="limit">
												{$smarty.const._HWDVIDS_SHIGARU_DISPLAY}
											</label>
											{$vpageLimits}
										</div>
									  {/if}
							</div>
						</div>	
		
									<div id="videoresultwrapper" class="f80">
										<div class="vidlistoptbar clearfix mtop20">					
											{include file='video_list_optionsbar.tpl'}   
										</div>
										<div id="resultcontainer" class="mtop20">
											<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...
											</div>
										</div>
										<div class="vidlistoptbar clearfix mtop20">
												<div class="vidlistpagination w100 f100 fleft tcenter">
												</div>
										</div>
									</div>
	</div>
</div>

<div style="clear:both;"></div>
<div id="deletevideomessage" class="dispnon span4">
	<div class="pad12">
		<div class="clearfix">
			<i class="icon-warning-sign fleft w20pc icon-3x fontyellow"></i> 
			<h4 class="fleft w80 mleft12 mtop12 fontbold">{$smarty.const._HWDVIDS_INFO_CONFIRMFRONTDEL}</h4>
		</div>	
		<p class="mtop24 f80">{$smarty.const._HWDVIDS_TITLE_CONFIRMDELETEEXPLAIN}</p>
		<div class="fright mtop24">
			<a class="cancel btn" href="#"> {$smarty.const._HWDVIDS_BUTTON_CANX}</a>
			<a class="btn btn-danger" href="#"><i class="icon-trash icon-large"></i> Delete</a>
		</div>
	</div>	
</div>
<script type="text/javascript" src="{$domain}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
<script type="text/javascript" src="{$domain}/templates/rhuk_milkyway/js/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="{$domain}/templates/rhuk_milkyway/css/chosen.css" type="text/css" />
{literal}
<script type="text/javascript">
jQuery(document).ready(function($){
	var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList({needsHeaderProfile:false,reScrollOnLoad:true});
	jQuery('select#genre_id,select#language_id,select#intrument_id').addClass('w90').chosen({allow_single_deselect:true});
});
var oSearchParams = {
		ordering:'date_uploaded',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}{literal}'
	};
</script>
{/literal}
