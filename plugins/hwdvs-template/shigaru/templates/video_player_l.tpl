{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/videoplayer.min.js"></script>
<script type="text/javascript" src="components/com_jcomments/js/jcomments-v2.1.js?v=2"></script>
 <script type="text/javascript" src="components/com_jcomments/libraries/joomlatune/ajax.js"></script>
{include file='header.tpl'}

{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
<div class="f80 mtop24 sic-container">
  
  <div>
{/if}  



        <div id="videoTitle" class="fleft">
				  <div class="clearfix">
					 {if $contentauthor}
					 <div class="fright mbot12">
						<div class="contentautor"><span>Content Owner</span></div>
					</div>
					{/if}
					<div class="fleft {if $contentauthor}w85{else}w100{/if}">
						<div class="fleft mbot12">{$videoplayer->avatar}</div>
						<div class="fleft mright6 titleText w85">
							<h2 >{$videoplayer->titleText}</h2>
							<!--<div class="fright mbot6 mright6 f12em"><button title="Click on this button to subscribe to this user's channel" class="btn btn-danger fleft">Follow<i class="icon-circle-arrow-right padleft4"></i></button><div class="fleft timesactioned mtop8"><i class="icon-angle-left"></i><i class="icon-caret-left"></i><span>{$videoplayer->commentsNum}</span></div></div>-->
							<span class="mleft20">{$smarty.const._HWDVIDS_INFO_SHARED}</span> {$videoplayer->uploader}
						</div>
					<div>
						{$videoplayer->editvideo} {$videoplayer->deletevideo}
					</div>	
					 
				</div>
				<div class="clear"></div>
				  </div>
				  <div class="padding clear">
						<div class="clearfix">
							<div class="fleft">
							{$videoplayer->player}
							</div>	
							<div class="fleft" id="sideinfobox">
								  <div id="categoryinfo" class="{$catclass}">  
										<h4><span class="fontbold">{$videoplayer->category}</span></h4>
								  </div>
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_INFO_PLAYS}</span><br /><b>{$videoplayer->views}</b></div>
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_DATEADDED}</span><br />{$videoplayer->upload_date}</div>
								  {if $showlevel}
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_VIDEOLEVEL}</span><br />{$videoplayer->level}</div>
								  {/if}
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}</span><br />{$videoplayer->instrument}</div>
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_GENRE}</span><br />{$videoplayer->genre}</div>
								  <div><span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}</span><br />{$videoplayer->language}</div>
								  <div class="fontbold"><a class="mtop6 pad12 btn btn-primary fleft" href="{$uploadLink}"><i class="icon-share icon-4x"></i> Share a video</a></div>
							</div>	
						</div>	
				  </div>
				  <div class="padding mtop24">
					  
						<div class="videoactions clearfix"> 
								<div class="clearfix">
									<div class="fleft mright6">{$videoplayer->likebutton}</div>
									<div class="fleft mright6">{$videoplayer->learnlater}</div>
									<div class="fleft mright6" id="addremfav">{$videoplayer->favourties}</div>
									<div class="fleft mright6 clearfix">{$videoplayer->addtoplaylist}</div>
									<div class="fleft mbot6 mright6"><button id="btncomments" title="Click on this button to add/view comments about this video" class="btn fleft"><i class="icon-comments padright4"></i>Comments</button><div class="fleft timesactioned mtop8"><i class="icon-angle-left"></i><i class="icon-caret-left"></i><span>{$videoplayer->commentsNum}</span></div></div>
									<div class="fleft">{$videoplayer->reportmedia}</div>
								</div>
								<div class="clearfix">
									<div class="fleft mleft20 mtop6">
										<div class="fleft">{$videoplayer->ratingsystem}</div>
										<div class="fleft mleft20"><a target="_blank" id="tuner" class="mtop6 pad12 btn btn-large btn-info fontwhite fleft" href="#"><i class="icon-bolt"></i> Tuner</a></div>
									</div>
									<div class="fright mtop6">
										<div class="fleft mright12">
											<div class="fb-like" data-href="{$currentUrl}" data-send="false" data-layout="box_count" data-width="100" data-show-faces="false"></div>
											{literal}<script>(function(d, s, id) {
											  var js, fjs = d.getElementsByTagName(s)[0];
											  if (d.getElementById(id)) return;
											  js = d.createElement(s); js.id = id;
											  js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1";
											  fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk'));</script>{/literal}
										</div>
										<div class="fleft mright12">
											{literal}<a href="https://twitter.com/share" class="twitter-share-button" data-url="{$currentUrl}" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
											<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>{/literal}
										</div>
										<div class="fleft mright12">
											{literal}<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
											<script type="text/javascript">
											  (function() {
												var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
												po.src = 'https://apis.google.com/js/plusone.js';
												var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
											  })();
											</script>{/literal}
										</div>
										<div class="fleft mright12 mtop20">
											<a href="http://pinterest.com/pin/create/button/?url={$currentUrl}" class="pin-it-button" count-layout="vertical"><img border="0" src="http://assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
											<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
										</div>
										<div class="fleft mright12">
											{literal}<!-- Place this tag where you want the su badge to render -->
											<su:badge layout="5"></su:badge>
											<script type="text/javascript">
											  (function() {
												var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
												li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
												var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
											  })();
											</script>{/literal}
										</div>
									</div>	
								</div>	
								<div class="clear">   </div> 
								 <div id="actionsresponse"><a class="" title="Close this message" href="#">x</a><div></div></div>
							</div>		
						
						<div class="mleft12"> 
							<div class="clearfix">
								<div class="clearfix padright12 mbot20">
									<h4 class="fontbold f120 mbot6">{$smarty.const._HWDVIDS_DESC}</h4>
									<div id="truncateMe" class="overhidden mtop12 h40px">
										<span id="videodecription">{$videoplayer->description} </span>
									</div>
									<div class="w100 tcenter bortopgrey mtop20 dispnon"><a href="#" title="Click here to show full description" class="btn mtopl12" id="showmoredesc"><i class="icon-double-angle-down"></i></a></div>
								</div>
								<div class="fleft w49 padright12">  
									<h4 class="fontbold f120 mbot6">{$smarty.const._HWDVIDS_TAGS}</h4>
									<div id="tagwrap" class="mtop12 overhidden h200px"> 
										<span>
											{$videoplayer->tags}										
										</span>	
									</div>
									<div class="w100 tcenter bortopgrey mtop20 dispnon"><a href="#" title="Click here to show all tags" class="btn mtopl12" id="showmoretags"><i class="icon-double-angle-down"></i></a></div>
								</div>	
								{if $songPlayer}
								 <div class="fleft w49 borleftgrey">
									<h4 class="mleft12 fontbold f120 mbot6">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_LISTENORIGINAL}</h4>
									<div class="padl20 pad12 clearfix">
										<span class="f100 mbot6">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_LISTENORIGINALTIP}</span><br />
										{if $songPlayer}<div class="mtop12">{$songPlayer}</div>{/if}
										<a target="_blank" class="mtop6 btn btn-small fleft" href="http://click.linksynergy.com/fs-bin/click?id=TGukOHUv*wg&offerid=221756.10000004&type=3&subid=0" ><i class="icon-headphones padright4"></i>Listen on Rdio</a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=TGukOHUv*wg&bids=221756.10000004&type=3&subid=0" /></a>
										<a target="_blank" class="mtop6 btn btn-small fright mrightl18" href="http://click.linksynergy.com/fs-bin/click?id=TGukOHUv*wg&offerid=221756.10000005&type=3&subid=0" ><i class="icon-shopping-cart padright4"></i>Download on Rdio</a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=TGukOHUv*wg&bids=221756.10000005&type=3&subid=0" /></a>
									</div>	
								</div>
								{else}
								<div class="fleft w49 mtop8">
									<iframe src="http://rcm.amazon.com/e/cm?t=shigarucom-20&o=1&p=12&l=bn1&mode=mi&browse=51575011&fc1=000000&lt1=_blank&lc1=3366FF&bg1=FFFFFF&f=ifr" marginwidth="0" marginheight="0" width="300" height="250" border="0" frameborder="0" style="border:none;" class="mleft30" scrolling="no"></iframe>
								</div>
								{/if}
								<!--<a href="http://www.thomann.de/index.html?partner_id=47062&page=es/index.html">
								<img src="http://www.thomann.de/bilder/linkpartn1.gif" width="110" height="35" border="0" alt="Musikhaus Thomann Linkpartner">
								</a>-->
							</div>	
							
						</div>
						<div id="comments-tabs">
							<div class="fleft w49 borleftgrey mtop12 clearfix padright12 mbot20">
								<h4 class="fontbold f120 mbot6">{$smarty.const._HWDVIDS_TITLE_VIDCOMMS}</h4>
								<div id="comments-tabs-1" class="standard">
										  {if $print_comments}
											  {$videoplayer->comments}
										{/if} 
								</div>
							</div>	
							<div id="comments-tabs-1" class="fleft w49 borleftgrey mtop12">
								
							</div>
							
						</div>
						 <div class="clear">   </div>  
				</div>
				
				 
      </div>  
      
      <div id="infocontext" class="fleft">
		   <div class="box">
				 <div class="mbot12 w100 tcenter">
					  <script type="text/javascript"><!--
						google_ad_client = "ca-pub-1916456389191969";
						/* player_page_wide */
						google_ad_slot = "6940060261";
						google_ad_width = 300;
						google_ad_height = 250;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
				  </div>
				 <h4 class="fontbold tshadowwhite mbot6">{$smarty.const._HWDVIDS_RELATED}</h4>
				  <ul id="relatedvideos">
					  {foreach name=outer item=data from=$listrelated}
							{include file="video_list_small.tpl"}
					  {/foreach}
					  {foreach name=outer item=data from=$userlist}
						{include file="video_list_small.tpl"}
					  {/foreach}
					  {foreach name=outer item=data from=$categoryvideolist}
						{include file="video_list_small.tpl"}
					  {/foreach}
				  </ul>
				  <div class="loadingcontent" style="line-height:200px"><i class="icon-spinner icon-spin"></i> Loading...</div>
				  <div class="w100 tcenter bortopgrey mtop25">
					  <a id="morerelated" href="#" title="Click to display more related videos" class="btn mtopl12"><i class="icon-plus-sign"></i> Show more</a></div> 
				  </div>		
				  <div class="mtop24 mleft12 mbot12 w100 tcenter">
					  <script type="text/javascript"><!--
						google_ad_client = "ca-pub-1916456389191969";
						/* player_page_wide */
						google_ad_slot = "6940060261";
						google_ad_width = 300;
						google_ad_height = 250;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
				  </div>	  
			 <div>
			</div>	
		</div>
		
	  </div> 
        <div class="clear">   </div>  
	<div class="standard">
	  <div class="padding">
          <div style="clear:both;"></div>
			<div id="ajaxresponse"></div>
          <div style="clear:both;"></div>	
		</div>
  </div>
		

{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
  </div>
</div>
{/if}

<div class="usermessages" style="display:none; cursor: default"> 
	<div id="flagquestionwrap">         
		<div><a id="no" class="close"></a></div>
		<h1>{$smarty.const._HWDVIDS_TITLE_REPORTTHISVIDEO}</h1> 
        <input type="button" class="reddbuttonsubmit" id="yes" value="{$smarty.const._HWDVIDS_BUTTON_GO}" /> 
	</div>         
</div> 

