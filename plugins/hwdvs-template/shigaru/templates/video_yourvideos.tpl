{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="{$baseurl}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
{include file='header.tpl'}
{if $otheruser eq 'no'}
{/if}
<div class="clearfix mtop12 f80">
	<div class="well fleft w15">
		<ul class="nav nav-list mtop12">
		  <li><a href="#">What to Watch</a></li>	

		  <li><a href="#">Watch History</a></li>	

		  <li><a href="#">Search History</a></li>	

		  <li><a href="#">What is Hot!</a></li>	

		  <li><a href="#">My Subscriptions</a></li>	

		  <li><a href="#">My Alerts </a><span class="mleft6"><i class="icon-bell"></i> <span class="fontred">(0) New</span></span></li>	

		  <li>
			<a href="#">My Videos</a>
			<ul class="mtop6">
				<li class="active"><a href="#">Videos I Created</a></li>
				<li><a href="#">Videos I Shared</a></li>
				<li class="divider"></li>
				<li><a href="#">My Playlists</a></li>
				<li><a href="#">My 'Learn Later'</a></li>
				<li><a href="#">My Favourites</a></li>
				<li><a href="#">Videos I Like</a></li>
			</ul>
		  </li>

		  <li><a href="#">Comments</a></li>

		  <li><a href="#">Status Updates</a></li>

		  <li><a href="#">My Shigaru Friends</a></li>
		</ul>
	</div>   
	<div id="videosmaincontent" class="fleft clearfix pad12">
		<div class="clearfix">
			<div class="clearfix">
				<div class="fleft f15em fontbold">
					<h3>{$smarty.const._HWDVIDS_TITLE_YOURVIDS}</h3>
				</div>
				<div class="fright">
					<form class="">
						<label for="quick_links" class="sort-control-label">Quick Links:</label>
						<select class="quick_links" id="quick_links" name="quick_links">
							<option value="sortable_at" selected="selected">Share a video</option>
							<option value="username">Author</option>
							<option value="category">Category</option>
							<option value="average_rating">Rating</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</form>
				</div>
			</div>
			<div class="vidlistoptbar clearfix mtop20">					
				<form class="fleft clearfix">
					<div class="fleft">
						<label for="sort_by" class="sort-control-label">Sort by:</label>
						<select class="sort_select" id="sort_by" name="sort_by"><option value="sortable_at" selected="selected">Date</option>
							<option value="username">Rating</option>
							<option value="category">Category</option>
							<option value="average_rating">Liked</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</div>	
					<!--<a href="#" class="fleft fontred pad6"><i class="icon-arrow-up icon-large fontblack"></i></a>
					<input class="icon-search mleft30 fleft" type="text" placeholder="Search your videos..."/>-->
					
				</form>
				<div class="vidlistpagination w63 f100 mtop2 fleft tcenter"></div>
				<div id="options" class="clearfix fright">    
					<div class="btn-group" data-option-key="layoutMode">
					  <a class="btn active" href="#masonry" data-option-value="masonry" class="active"><i class="icon-th"></i></a>
					  <a class="btn" href="#cellsByRow" data-option-value="cellsByRow"><i class="icon-th-large"></i></a>
					  <a class="btn" href="#straightDown" data-option-value="straightDown"><i class="icon-th-list"></i></a>
					</div>
				</div> <!-- #options -->
		   </div>
		</div>
		
		<div id="resultcontainer">
			<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
		</div>
		<div class="vidlistoptbar clearfix mtop20">
			<div class="vidlistpagination w100 f100 fleft tcenter"></div>
		</div>	
	</div>
	<div class="fleft w15">
		
		<div class="mleft6 clearfix mtop20 mbot20">
			<div class="fontbold"><a class="mtop6 pad12 btn btn-primary fleft" href="{$uploadLink}"><i class="icon-share icon-4x fontblack"></i> <span class="icon-3x fontblack">Share a video</span></a></div>
		</div> 
		<div class="mleft6 clearfix">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1916456389191969";
			/* profile */
			google_ad_slot = "7689083467";
			google_ad_width = 160;
			google_ad_height = 600;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div> 
	</div> 
</div>	



