{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="workarea">
	<div class="workarea_wrapper">
		<div id="homepromo">
			{$smarty.const._HWDVIDS_HOMEPROMO} 
			<a href="{$tenreasonsurl}" title="{$tenreasonstext} Shigaru">{$tenreasonstext}</a>
		</div>
		<div id="totalvideos">
			<span class="fontbold">{$smarty.const._HWDVIDS_INFO_TOTVID}: </span><span class="fontred">{$totalvideos}</span> {$smarty.const._HWDVIDS_SHIGARU_TOTALCATEGORIZED}
		</div>
	</div>
</div>

<div class="workarea">
	<div class="workarea_wrapper">
		<div class="leftcolumn">
			<div id="random_video" class="content_box">
				{if $print_featured}
					  <div class="hwdmodule-h3">
						{if $print_featured_player}
						  {include file="featured_videos_01.tpl"}
						{else}
						  {include file="featured_videos_02.tpl"}
						{/if}
					  </div>
					{/if}
			</div>
		</div>
		<div class="rightcolumn">
			<div class="content_box">
				<h3>The "Most" in Shigaru</h3>
					<div id="the_most" class="slidesContainer">
						<div id="the_most_title">
							<h6><span>MOST</span></h6>
							<ul>
								<li class="first selected"><a href="#tabs-1">{$title_mostviewed}</a></li>
								<li><a href="#tabs-2">{$smarty.const._HWDVIDS_MOST_RECENT}</a></li>
								<li><a href="#tabs-3">{$smarty.const._HWDVIDS_MOST_RATED}</a></li>
								<li><a href="#tabs-4">{$title_mostfavoured}</a></li>
								<li class="last"><a href="#tabs-5">{$smarty.const._HWDVIDS_MOST_COMMENTED}</a></li>
							</ul>
						</div>
						{if $print_mostpopular}
							<div id="the_most_wrapper">	
								<div id="tabs-1" class="tab_wrapper">
								  			{foreach name=outer item=data from=$mostviewedlist}
											{include file="video_list_small_viewed.tpl"}
											{/foreach}
								</div>
								<!--<div class="viewmore"><a href="{$viewed_link}dsadasdas" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>-->
							</div>
							
							{/if}
							<div id="the_most_wrapper">	
								<div id="tabs-2" class="tab_wrapper">
									{if $print_videolist}
									  {foreach name=outer item=data from=$list}
										  {include file="video_list_full_small_recent.tpl"}
										  {if $smarty.foreach.outer.last}
											 <div style="clear:both;"></div>
										  {elseif $smarty.foreach.outer.index % $vpr-($vpr-1) == 0}
											 <div style="clear:both;"></div>
										  {/if}
									  {/foreach}
									  {else}
										<div class="padding">{$smarty.const._HWDVIDS_INFO_NRV}</div>
									  {/if}
									  <!--<div class="viewmore"><a href="{$recent_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
								</div>
							</div>
							
							<div id="the_most_wrapper">	
								<div id="tabs-3" class="tab_wrapper">
								  {foreach name=outer item=data from=$mostpopularlist}
									{include file="video_list_small_popular.tpl"}
								  {/foreach}
								</div>
								<!--<div class="viewmore"><a href="{$popular_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>


							{if $print_ads}{if $advert4}<div ><div class="padding"><div id="hwdadverts-nopadding">{$advert4}</div></div></div>{/if}{/if}
							
							{if $print_mostfavoured}
							<div id="the_most_wrapper">	
								<div id="tabs-4" class="tab_wrapper">
								  {foreach name=outer item=data from=$mostfavouredlist}
									{include file="video_list_small_favoured.tpl"}
								  {/foreach}
								</div>
							  <!--<div class="viewmore"><a href="{$featured_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>
							{/if}
							
							<div id="the_most_wrapper">	
								<div id="tabs-5" class="tab_wrapper">
									{if $print_videolist}
									  {foreach name=outer item=data from=$mostcommented}
										  {include file="video_list_full_small_comments.tpl"}
									  {/foreach}
									 {/if} 
							  </div>
							  <!--<div class="viewmore"><a href="{$recent_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>
			
							
					</div> <!-- fin tabs -->	
							
							
			</div>	
		</div>
	</div>			
</div>



 {if $print_nowlist}
        {include file="video_beingwatched.tpl"}
    {/if}

<div class="clear"></div>
<div class="workarea">
	<div class="workarea_wrapper">
		<div class="leftcolumn">
			<div class="content_box video_activity">
					<h3>Popular tags</h3>
					<div class="video_activity_header">
						<div>
							<ul>
								<li class="selected"><a href="#bands" title="Click to see more Bands">Bands</a></li>
								<li><a href="#instruments" title="Click to see more Instruments">Instruments</a></li>
								<li><a href="#songs" title="Click to see more Songs">Songs</a></li>
								<li><a href="#genre" title="Click to see Genres">Genre</a></li>
							</ul>
						</div>
					</div>
					<div class="slidesWrapper">
						<div id="bands" class="tab_wrapper tags">
							<ul>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Gungs N' Roses</span><span class="hits">158</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Rosendo</span><span class="hits">123</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Picolo</span><span class="hits">656</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Van Halen</span><span class="hits">65</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Reincidentes</span><span class="hits">765</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Mama Ladilla</span><span class="hits">124</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Cria cuervos</span><span class="hits">48</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pipi calzaslargas</span><span class="hits">242</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pocoyo baila panamericano</span><span class="hits">1953</span></a></li>
							</ul>
						</div>
						<div id="instruments" class="tab_wrapper tags">
							<ul>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Gungs N' Roses</span><span class="hits">158</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Rosendo</span><span class="hits">123</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Picolo</span><span class="hits">656</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Van Halen</span><span class="hits">65</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Reincidentes</span><span class="hits">765</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Mama Ladilla</span><span class="hits">124</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Cria cuervos</span><span class="hits">48</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pipi calzaslargas</span><span class="hits">242</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pocoyo baila panamericano</span><span class="hits">1953</span></a></li>
							</ul>
						</div>
						<div id="songs" class="tab_wrapper tags">
							<ul>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Gungs N' Roses</span><span class="hits">158</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Rosendo</span><span class="hits">123</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Picolo</span><span class="hits">656</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Van Halen</span><span class="hits">65</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Reincidentes</span><span class="hits">765</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Mama Ladilla</span><span class="hits">124</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Cria cuervos</span><span class="hits">48</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pipi calzaslargas</span><span class="hits">242</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pocoyo baila panamericano</span><span class="hits">1953</span></a></li>
							</ul>
						</div>
						<div id="genre" class="tab_wrapper tags">
							<ul>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Gungs N' Roses</span><span class="hits">158</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Rosendo</span><span class="hits">123</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Picolo</span><span class="hits">656</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Van Halen</span><span class="hits">65</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Reincidentes</span><span class="hits">765</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Mama Ladilla</span><span class="hits">124</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Cria cuervos</span><span class="hits">48</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pipi calzaslargas</span><span class="hits">242</span></a></li>
								<li><a href="#" title="Click to see more videos for Gungs N' Roses"><span class="fleft">Pocoyo baila panamericano</span><span class="hits">1953</span></a></li>
							</ul>
						</div>
					</div>
			</div>
		</div>	
		<div class="rightcolumn">
			<div class="content_box video_activity">
					<h3>Comments</h3>
					<div class="video_activity_header">
						<div>
							<ul>
								<li><a href="#comments-tabs-1">{$smarty.const._HWDVIDS_LATESTCOMM}</a></li>
								<li><a href="#comments-tabs-2">{$smarty.const._HWDVIDS_POPUCOMM}</a></li>
								<li><a href="#comments-tabs-3">{$smarty.const._HWDVIDS_RECENTUPDATES}</a></li>
								<li><a href="#comments-tabs-4">{$smarty.const._HWDVIDS_RECENTACTVITY}</a></li>
								<li><a href="#comments-tabs-5">{$smarty.const._HWDVIDS_TOPPOSTERS}</a></li>
							</ul>
						</div>	
					</div>
					<div class="slidesWrapper">
						<div id="comments-tabs-1" class="tab_wrapper comments">
							{$smarty.const._HWDVIDS_LATESTCOMMINTRO}
							 {$latestcomments}
						</div>
					</div>  
						
					<div class="slidesWrapper">			
						<div id="comments-tabs-2" class="tab_wrapper comments">
							{$smarty.const._HWDVIDS_POPUCOMMINTRO}
							{$mostpopularcomments}
						</div>
					</div>
					
					<div class="slidesWrapper">
							<div id="comments-tabs-3" class="tab_wrapper comments">
								{$smarty.const._HWDVIDS_RECENTUPDATESINTRO}
								{$whatareyou}
							</div>
					</div>
					
					<div class="slidesWrapper">
						<div id="comments-tabs-4" class="tab_wrapper comments">
							{$smarty.const._HWDVIDS_RECENTACTVITYINTRO}
							{$recentactivity}
						</div>
					 </div>  
					 
					<div class="slidesWrapper">
						<div id="comments-tabs-5" class="tab_wrapper comments">
							{$smarty.const._HWDVIDS_TOPPOSTERSINTRO}
							{$topposters}
						</div>
					</div>  			
		   </div> <!-- fin tabs -->
	</div>
</div>	
</div>
</div>
<div class="clear"></div>
<div class="workarea">
  <div class="workarea_odd">
	<div class="workarea_wrapper">
		<div class="content_box">
					<div class="content_box video_activity">
							<h3>Community</h3>
							<div class="video_activity_header bwhite">
								<ul>
									<li class="selected"><a href="#newusers" title="Click to see more Bands">New users</a></li>
									<li><a href="#recently" title="Click to see more Instruments">Recenty Online Members</a></li>
									<li><a href="#topvideo" title="Click to see more Songs">Top Video Posters</a></li>
									<li><a href="#recentstatus" title="Click to see Genres">Recent Status Updates</a></li>
									<li><a href="#recentprofile" title="Click to see Genres">Recent Profile Activity</a></li>
								</ul>
							</div>
							<div class="slidesWrapper">
								<div id="newusers" class="tab_wrapper community bwhite">
									<ul>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_10.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_11.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_12.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_14.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_13.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_15.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_1.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_2.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_3.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_4.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
									</ul>
								</div>
								<div id="recently" class="tab_wrapper community bwhite">
									<ul>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_10.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_11.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_12.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_14.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_13.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_15.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_1.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_2.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_3.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_4.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
									</ul>
								</div>
								<div id="topvideo" class="tab_wrapper community bwhite">
									<ul>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_10.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_11.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_12.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_14.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_13.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_15.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_1.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_2.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_3.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_4.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
									</ul>
								</div>
								<div id="recentstatus" class="tab_wrapper community bwhite">
									<ul>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_10.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_11.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_12.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_14.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_13.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_15.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_1.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_2.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_3.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_4.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
									</ul>
								</div>
								<div id="recentprofile" class="tab_wrapper community bwhite">
									<ul>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_10.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_11.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_12.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_14.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_13.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_15.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_1.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_2.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_3.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_4.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_5.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_6.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_7.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_8.jpg" alt="Shigaru.com" /></a></li>
										<li><a href="#" title="Click to see more videos for Gungs N' Roses"><img height="80" width="80" src="img/community/profile_9.jpg" alt="Shigaru.com" /></a></li>
									</ul>
								</div>
							</div>	
					</div>
		</div>
	</div>
  </div>	
</div>	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

{include file='header.tpl'}
{if $print_mostviewed or $print_mostviewed or $print_mostpopular}
<div class="sic-container">
  
  <div class="sic-left">
<div id="tabs">
	

	
  
  
  <div id="whitebox">
				<div class="whiteboxHeader adverts">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_ADS}
							</h6>
						</div>
				</div>
				<div id="whitebox_m">
  
					{$google_adsense}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 

  
  
  
  
  
		
		
		
			<div id="whitebox">
				<div class="whiteboxHeader community">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_OURFACES}
							</h6>
						</div>
				</div>
				

  
					{$zncbmembers}

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		 
 
 
		
		<div id="whitebox">
				<div class="whiteboxHeader tweeter">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_TWITTER}
							</h6>
						</div>
				</div>			
				
				<div id="whitebox_m" class="scoller h150">
					{$tweetdisplay}
				</div>
				
				<div class="viewmore">
					<a href="http://twitter.com/shigaru" title="{$smarty.const._HWDVIDS_SHIGARU_FOLLOWUSTWEET}">
						{$smarty.const._HWDVIDS_SHIGARU_FOLLOWUSTWEET}
					</a>
				</div>	
				

		</div>
		
	
		
		
		
		
		
		<div id="whitebox">
				<div class="whiteboxHeader subscribe">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_SUBSCRIBE}
							</h6>
						</div>
					
				</div>			
				

				<div id="whitebox_m">
					{$subscribe}
				</div>
				<div class="viewmore"><a href="/shigaru/index.php?option=com_acymailing&view=archive&Itemid=68" title="{$smarty.const._HWDVIDS_SUBSARCHIVE}">{$smarty.const._HWDVIDS_SUBSARCHIVE}</a></div>	

				
		</div>
		
		
		
		<div id="withoutMusic">
					<blockquote cite="Brian Littrell">
						<p>
						{$smarty.const._HWDVIDS_WITHOUTMUSIC}
						</p>
					</blockquote>
					<p id="explainLink">Friedrich Nietzsche </p>
				</div>
		
		
		
 </div>
  

  <div class="sic-center">
{/if}
  
    

    {if $print_ads}{if $advert3}<div ><div class="padding"><div id="hwdadverts-nopadding">{$advert3}</div></div></div>{/if}{/if}
    
   
 
 
 
 
 
 
 
    
 <div id="tabs-tags">   
    <ul>
		<li><a href="#tabs-tags-1">{$smarty.const._HWDVIDS_POP_BANDS}</a></li>
		<li><a href="#tabs-tags-2">{$smarty.const._HWDVIDS_POP_TAGS}</a></li>
		<li><a href="#tabs-tags-3">{$smarty.const._HWDVIDS_POP_GENRES}</a></li>
	</ul>
    
    <div id="tabs-tags-1" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSBANDSINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$bandtagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
    
    
    
    <div id="tabs-tags-2" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$instagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
     
        
    <div id="tabs-tags-3" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSGENREINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$gentagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
 </div>   
  
  
  <div id="whitebox">
				<div class="whiteboxHeader adverts">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_ADS}
							</h6>
						</div>
					
				</div>
				

				<div id="whitebox_m">
  
					{$google_adsense}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 

  
    
    
    <div id="whitebox">
				
					<div class="whiteboxHeader facefans">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_FACEFAN}
							</h6>
						</div>
					</div>
				<div id="whitebox_m">
					<center>
						<div id="fb-root"></div>
						<div class="fb-like-box" data-href="http://www.facebook.com/pages/Shigarucom/203892893007914" data-width="350" data-show-faces="true" data-border-color="#fff" data-stream="false" data-header="false"></div>
					</center>	  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
	
    

    
    <div id="whitebox">
				<div class="whiteboxHeader donate">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_DONATETO}
							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
					<div class="promotext">
						{$smarty.const._HWDVIDS_DONATETEXT}
					</div>
					<div id="donatebutton">{$donate}</div>
					<div class="clr"></div>
					
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
   
    
    <div id="whitebox">
				<div class="whiteboxHeader followus">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_FOLLOW}
							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
					<div class="promotext">
						{$smarty.const._HWDVIDS_FOLLOWOTHERSHITES}
					</div>
					{$socialmedialinks}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>	
		<div id="addTop">
			
			<div id="backtotop">
				<a href="#up">{$smarty.const._HWDVIDS_TOPPAGE}</a>
			</div>
			{$AddThis}
		</div>
{if $print_mostviewed or $print_mostviewed or $print_mostpopular}
  </div>
</div>
{/if}
<div style="clear:both;"></div>

<!--{include file='footer.tpl'}-->
