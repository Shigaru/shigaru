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
								<li class="first selected"><a href="#tabs-2">{$smarty.const._HWDVIDS_MOST_RECENT}</a></li>
								<li ><a href="#tabs-1">{$smarty.const._HWDVIDS_VIEWED}</a></li>
								<li><a href="#tabs-3">{$smarty.const._HWDVIDS_MOST_RATED}</a></li>
								<li><a href="#tabs-4">{$smarty.const._HWDVIDS_FAVOURED}</a></li>
								<li class="last"><a href="#tabs-5">{$smarty.const._HWDVIDS_MOST_COMMENTED}</a></li>
							</ul>
							
						</div>
						
						<div id="the_most_wrapper">	
								<div id="tabs-2" class="tab_wrapper ajaxload">
									<div class="tabmodcontrols w100 tcenter mbot6">
										<div class="btn-group">
										  <a class="btn date active" href="#allcategories">All</a>
										  <a class="btn date" href="#songtutorial">Song tutorials</a>
										  <a class="btn date" href="#theory">Theory</a>
										  <a class="btn date" href="#watchmeplay">Watch me play</a>
										</div>
										<div class="btn-group">
											<a class="btn tabreload" href="#"><i class="icon-repeat"></i> Reload</a>
										</div>
									</div>
									<div class="tabscroller">
										<ul id="recentvideoslist" class="dbo">
										 </ul>	 
								</div>	
							</div>
						</div>
						
							<div id="the_most_wrapper">	
								<div id="tabs-1" class="tab_wrapper loadondemand">
									<div class="tabmodcontrols w100 tcenter mbot6">
										<div class="btn-group">
										  <a class="btn date active" href="#alltime">All time</a>
										  <a class="btn date" href="#thismonth">This month</a>
										  <a class="btn date" href="#thisweek">This week</a>
										  <a class="btn date" href="#today">Today</a>
										</div>
										<div class="btn-group">
											<a class="btn tabreload" href="#"><i class="icon-repeat"></i> Reload</a>
										</div>
									</div>
									<div class="tabscroller">
										<ul id="mostviewed" class="xml">
										</ul>		
									</div>	
								</div>
								<!--<div class="viewmore"><a href="{$viewed_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>-->
							</div>
							
							<div id="the_most_wrapper">	
								<div id="tabs-3" class="tab_wrapper loadondemand">
								  <div class="tabmodcontrols w100 tcenter mbot6">
										<div class="btn-group">
										  <a class="btn date active" href="#alltime">All time</a>
										  <a class="btn date" href="#thismonth">This month</a>
										  <a class="btn date" href="#thisweek">This week</a>
										  <a class="btn date" href="#today">Today</a>
										</div>
										<div class="btn-group">
											<a class="btn tabreload" href="#"><i class="icon-repeat"></i> Reload</a>
										</div>
									</div>	
									<div class="tabscroller">
										<ul id="mostpopular" class="xml">
										</ul>
									</div>	
								</div>
								<!--<div class="viewmore"><a href="{$popular_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>


							{if $print_ads}{if $advert4}<div ><div class="padding"><div id="hwdadverts-nopadding">{$advert4}</div></div></div>{/if}{/if}
							
							
							<div id="the_most_wrapper">	
								<div id="tabs-4" class="tab_wrapper loadondemand">
									<div class="tabmodcontrols w100 tcenter mbot6">
										<div class="btn-group">
										  <a class="btn date active" href="#alltime">All time</a>
										  <a class="btn date" href="#thismonth">This month</a>
										  <a class="btn date" href="#thisweek">This week</a>
										  <a class="btn date" href="#today">Today</a>
										</div>
										<div class="btn-group">
											<a class="btn tabreload" href="#"><i class="icon-repeat"></i> Reload</a>
										</div>
									</div>
									<div class="tabscroller">
										<ul id="mostfavoured" class="xml">
										</ul>	
									</div>	
								</div>
							  <!--<div class="viewmore"><a href="{$featured_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>
							
							<div id="the_most_wrapper">	
								<div id="tabs-5" class="tab_wrapper loadondemand">
									<div class="tabmodcontrols w100 tcenter mbot6">
										<div class="btn-group">
										  <a class="btn date active" href="#alltime">All time</a>
										  <a class="btn date" href="#thismonth">This month</a>
										  <a class="btn date" href="#thisweek">This week</a>
										  <a class="btn date" href="#today">Today</a>
										</div>
										<div class="btn-group">
											<a class="btn tabreload" href="#"><i class="icon-repeat"></i> Reload</a>
										</div>
									</div>
									<div class="tabscroller">
										<ul id="mostcommented" class="dbo">
										</ul>
									</div>
							  </div>
							  <!--<div class="viewmore"><a href="{$recent_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>--> 
							</div>
			
							
					</div> <!-- fin tabs -->	
							
							
			</div>	
		</div>
	</div>			
</div>

</div>
<div class="clear"></div>
<div id="beingwatched" class="workarea">
	<div class="workarea_odd">
		<div class="workarea_wrapper">
			<div class="content_box">
				<h3 class="mbot12">{$smarty.const._HWDVIDS_BWN}</h3>
			</div>	
		</div>
	</div>	
</div>
				

<div class="clear"></div>
<div class="workarea_wrapper">
<div class="workarea">
	<div class="workarea_wrapper">
			<div class="w100 tcenter mtop25">
				<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab" id="Player_15f536d8-0473-4bed-afb3-001f3f827d48"  WIDTH="600px" HEIGHT="200px"> <PARAM NAME="movie" VALUE="http://ws.amazon.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fshigarucom-20%2F8010%2F15f536d8-0473-4bed-afb3-001f3f827d48&Operation=GetDisplayTemplate"><PARAM NAME="quality" VALUE="high"><PARAM NAME="bgcolor" VALUE="#FFFFFF"><PARAM NAME="allowscriptaccess" VALUE="always"><embed src="http://ws.amazon.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fshigarucom-20%2F8010%2F15f536d8-0473-4bed-afb3-001f3f827d48&Operation=GetDisplayTemplate" id="Player_15f536d8-0473-4bed-afb3-001f3f827d48" quality="high" bgcolor="#ffffff" name="Player_15f536d8-0473-4bed-afb3-001f3f827d48" allowscriptaccess="always"  type="application/x-shockwave-flash" align="middle" height="200px" width="600px"></embed></OBJECT> <NOSCRIPT><A HREF="http://ws.amazon.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fshigarucom-20%2F8010%2F15f536d8-0473-4bed-afb3-001f3f827d48&Operation=NoScript">Amazon.com Widgets</A></NOSCRIPT>
			</div>	
		<div class="leftcolumn">
			<div class="content_box video_activity">
					<h3>Popular tags</h3>
					<div class="video_activity_header">
						<div>
							<ul>
								<li class="selected"><a href="#instruments" title="Click to see popular Instruments">Instruments</a></li>
								<li><a href="#bands" title="Click to see popular bands">Bands</a></li>
								<li><a href="#songs" title="Click to see popular Songs">Songs</a></li>
								<!--<li><a href="#albums" title="Click to see popular Albums">Albums</a></li>-->
								<li><a href="#genre" title="Click to popular Genres">Genres</a></li>
							</ul>
						</div>
					</div>
					<div class="slidesWrapper">
						<div id="instruments" class="tab_wrapper tags ajaxload">
							<div class="tabscroller">
								<ul id="instrumentstags" class="tags">
									</ul>	
							</div>	
						</div>
						<div id="bands" class="tab_wrapper tags loadondemand">
							<div class="tabscroller">
								<ul id="bandtags" class="tags">
								</ul>
							</div>		
						</div>
						
						<div id="songs" class="tab_wrapper tags loadondemand">
							<div class="tabscroller">
								<ul id="songstags" class="tags">
								</ul>	
							</div>	
						</div>
						
						<!--<div id="albums" class="tab_wrapper tags loadondemand">
							<div class="tabscroller">
								<ul id="albumstags" class="tags">
								</ul>	
							</div>	
						</div>-->
						
						<div id="genre" class="tab_wrapper tags loadondemand">
							<div class="tabscroller">
								<ul id="genretags" class="tags">
								</ul>	
							</div>	
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
								<li class="selected"><a href="#comments-tabs-1">{$smarty.const._HWDVIDS_LATESTCOMM}</a></li>
								<li><a href="#comments-tabs-2">{$smarty.const._HWDVIDS_POPUCOMM}</a></li>
								<!--<li><a href="#comments-tabs-3">{$smarty.const._HWDVIDS_RECENTUPDATES}</a></li>
								<li><a href="#comments-tabs-4">{$smarty.const._HWDVIDS_RECENTACTVITY}</a></li>
								<li><a href="#comments-tabs-5">{$smarty.const._HWDVIDS_TOPPOSTERS}</a></li>-->	
							</ul>
						</div>	
					</div>
					<div class="slidesWrapper">
						<div id="comments-tabs-1" class="tab_wrapper comments ajaxload">
							<div class="tabscroller">
								<ul id="shiggymodjcomments" class="rendermod">
								</ul>	
							</div>	
						</div>
					</div>  
					<div class="slidesWrapper">			
						<div id="comments-tabs-2" class="tab_wrapper comments loadondemand">
							<div class="tabscroller">
								<ul id="shiggymodjcomments--mostPopularComments" class="rendermod">
								</ul>
							</div>	
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
									<li class="selected"><a href="#recently" title="Click to see recently online members">Recently Online Members</a></li>
									<li ><a href="#newusers" title="Click to see new users in Shigaru">New users</a></li>
									<!--<li><a href="#topvideo" title="Click to see more Songs">Top Video Posters</a></li>
									<li><a href="#recentstatus" title="Click to see Genres">Recent Status Updates</a></li>-->
									<li><a href="#recentprofile" title="Click to see recent profile activity">Recent Profile Activity</a></li>
								</ul>
							</div>
							<div class="slidesWrapper">
								<div id="recently" class="tab_wrapper community bwhite ajaxload">
									<div class="tabscroller">
										<div id="shiggymodzncbmembers" class="rendermod">
										</div>
									</div>	
								</div>
								<div id="newusers" class="tab_wrapper community bwhite loadondemand">
									<div class="tabscroller">
										<div id="shiggymods4jnewusers" class="rendermod">
										</div>
									</div>	
								</div>
								<div id="recentprofile" class="tab_wrapper community bwhite loadondemand">
									<div class="tabscroller">
										<div id="shiggymodcb_superactivity" class="rendermod">
										</div>
									</div>
								</div>
							</div>	
					</div>
		</div>
	</div>
  </div>	
</div>	
<!-- {$zncbmembers} -->			
{include file='header.tpl'}
<div class="clear"></div>

<!--{include file='footer.tpl'}-->
