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
<div class="f80 loadingcontent" style="line-height:200px"><i class="icon-spinner icon-spin"></i> Loading...</div>	
</div>	
<div class="clearfix mtop12 f80">
	<div id="usermenuwrapper"  class="well fleft w15">
	<div class="f80 loadingcontent" style="line-height:550px"><i class="icon-spinner icon-spin"></i> Loading...</div>	
	</div>
	<div id="videosmaincontent" class="fleft clearfix pad12">
		<div class="clearfix">
			<div class="clearfix">
				<div class="f15em fontbold">
					<h3 class="fontbold">
							{$smarty.const._HWDVIDS_SHIGARU_ABOUTME}</span>
					</h3>
					<div class="aboutme dropdown clearfix">
						<a href="#generalinfo" class="active"><span class="icon-caret-right pad6"></span> {$smarty.const._UE_CONTACT_INFO_HEADER}</a>
						<a href="#friends" class="borleftgrey">{$smarty.const._UE_YOURCONNECTIONS}</a>
						<a href="#where" class="borleftgrey">{$smarty.const._UE_WHEREINWORLD}</a>
						<a href="#myband" class="borleftgrey">{$smarty.const._UE_MYBAND}</a>
						<a href="#personalsites" class="borleftgrey">{$smarty.const._UE_PERSONALSITES}</a>
						<a href="#musicalinterests" class="borleftgrey">{$smarty.const._UE_MUSICALINTERESTS}</a>
						<a href="#otherinfo" class="borleftgrey">{$smarty.const._UE_OTHERINTERINFO}</a>
					</div>
				</div>
			</div>
		</div>
		
		<div id="resultcontainer" class="mtop20">
			<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
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
<input type="hidden" id="user_id" name="user_id" value="{$user_id}" />	

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/aboutme.js"></script>

