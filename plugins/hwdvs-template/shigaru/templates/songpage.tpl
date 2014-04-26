{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script>
	var bandId 			= "{$song->bandid}";
	var bandName		= "{$song->songname|addslashes}";
	var searchoption 	= "{$song->source}";
	var oSearchParams = {literal}{
		ordering:'date_uploaded',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}'
	};
</script>
<div class="workarea">
	<div class="workarea_wrapper clearfix mbot30">
		
		<div class="fleft w67">
			<div>
				<h3 class="fontbold f150">{$song->songname}</h3>
			</div>
			<div>
				<a href="{$bandurl}" alt=""><span class="f150">{$song->band_name}</span></a>
			</div>	
			<div>
				<a href="{$albumurl}" alt=""><span class="f90">{$song->album_name}</span></a>
			</div>	
			<div>
				<div class="mtop20">
					<h5>{$smarty.const._HWDVIDS_SHIGARU_RELATEDVIDEOS}</h5>
					<div id="resultwrapper">
			
										<div class="f15em mbot12 clearfix">
											<div id="searchsummarytext" class="fleft">
										
											</div>
											<div class="fright f80">		
												{if $totalvideos gt 0}
														<div class="f80">
															<label for="limit">
																Display
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
			</div>
		</div>
		<div class="mleft20 fleft">
			{if $song->album_thumb neq ''}
			<img src="{$song->album_thumb}" width="200" height="200"/>
			{else}
			<img src="templates/rhuk_milkyway/images/vinyl-icon_big.png" width="200" height="200"/>
			{/if}
			<div class="w330 mtop20">
					<div>
						<h5 class="fontbold mbot20"><i class="icon-bookmark fontsig f150"></i> {$smarty.const._HWDVIDS_SHIGARU_BANDMOREINFO} {$song->band_name}</h5>
						<div id="bandinfo" class="f80">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
						<h5 class="fontbold mtop20 mbot20"><i class="icon-ticket fontsig f150"></i> <span id="inyourarea" class="dispnon">{$smarty.const._HWDVIDS_SHIGARU_EVENTSINYOURAREA}</span><span id="forthisband">{$smarty.const._HWDVIDS_SHIGARU_BANDEVENTS}  {$song->band_name}</span></h5>
						<span id="inyourareaexplain" class="dispnon"><i class="icon-info-sign fontblue"></i> <span class="f80">{$smarty.const._HWDVIDS_SHIGARU_NOBANDEVENTS} {$song->band_name} {$smarty.const._HWDVIDS_SHIGARU_NOBANDEVENT2}</span></span>
						<div id="bandevents" class="f80 mtop12">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
					</div>
					<div class="mtop20 mleft20">
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
					</div>
				</div>
		</div>
	<div>
<div>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/bandpage.js"></script>
<script type="text/javascript" src="{$domain}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
