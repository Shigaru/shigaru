{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script>
	var oSearchParams = {literal}{
		ordering:'date_uploaded',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}'
	};
</script>
{include file='header.tpl'}
<div id="deletevideomessage" class="dispnon span4">
	<div class="pad12">
		<div class="clearfix">
			<i class="icon-warning-sign fleft w20pc icon-3x fontyellow"></i> 
			<h4 class="fleft w80 mleft12 mtop12 fontbold">{$smarty.const._HWDVIDS_INFO_CONFIRMFRONTDEL}</h4>
		</div>	
		<p class="mtop24 f80">{$smarty.const._HWDVIDS_TITLE_CONFIRMDELETEEXPLAIN}</p>
		<div class="mtop24">
			<a class="cancel btn" href="#"> {$smarty.const._HWDVIDS_BUTTON_CANX}</a>
			<a class="btn btn-danger" href="#"><i class="icon-trash icon-large"></i> Delete</a>
		</div>
	</div>	
</div>
<div id="usersection" class="cbProfile mbot12">
<div class="f80 loadingcontent" style="line-height:200px"><i class="icon-spinner icon-spin"></i> {$smarty.const._HWDVIDS_SHIGARU_LOADING}...</div>	
</div>	
<div class="clearfix mtop12 f80">
	<div id="usermenuwrapper"  class="well fleft w15">
	<div class="f80 loadingcontent" style="line-height:550px"><i class="icon-spinner icon-spin"></i> {$smarty.const._HWDVIDS_SHIGARU_LOADING}...</div>	
	</div>
	<div id="videosmaincontent" class="fleft clearfix pad12">
		<div class="clearfix">
			<div class="clearfix">
				<div class="fleft f15em fontbold">
					<h3>
							{$smarty.const._HWDVIDS_SHIGARU_VIDEOSILIKED}</span>
						</h3>
				</div>
				<div class="fright">
					<!--<form class="">
						<label for="quick_links" class="sort-control-label">Quick Links:</label>
						<select class="quick_links" id="quick_links" name="quick_links">
							<option value="sortable_at" selected="selected">Share a video</option>
							<option value="username">Author</option>
							<option value="category">Category</option>
							<option value="average_rating">Rating</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</form>-->
				</div>
			</div>
			<div class="vidlistoptbar clearfix mtop20">					
				{include file='video_list_optionsbar.tpl'}   
		   </div>
		</div>
		
		<div id="resultcontainer" class="mtop20">
			<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> {$smarty.const._HWDVIDS_SHIGARU_LOADING}...</div>
		</div>
		<div class="vidlistoptbar clearfix mtop20">
			<div class="vidlistpagination w100 f100 fleft tcenter"></div>
		</div>	
	</div>
	<div class="fleft w15">
		
		<div class="mleft6 clearfix mtop20 mbot20">
			<div class="fontbold"><a class="mtop6 pad12 btn btn-danger fleft" href="{$uploadLink}"><i class="icon-share icon-4x fontwhite"></i> <br /><span class="icon-2x fontwhite">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU}</span></a></div>
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
<input type="hidden" id="user_id" name="user_id" value="{$user_id}" />	

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="{$baseurl}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/videosilike.js"></script>

