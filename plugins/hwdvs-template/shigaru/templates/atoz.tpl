{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script>
	var songorband 			= "{$songorband}";
</script>
<div class="workarea">
	<div class="workarea_wrapper clearfix mbot30">	
			<div class="clearfix">
				<div class="clearfix"> 
					<div class="fleft"><i class="icon-sort-by-alphabet f120"></i> </div>
					<ul class="fleft mleft20">
						<li class="fleft mright12 ">	
							<h5 class=""><a href="{$bandsurl}" title=""><span class="fontbold {if $songorband eq 'band'}fontblue{/if} f120" >{$smarty.const._HWDVIDS_SHIGARU_AZBANDSTEXT}</span> ({$totalbands})</a></h5>
						</li>
						<li class="fleft">	
							|
						</li>
						<li class="fleft {if $songorband eq 'song'}{/if} mleft12">
							<h5 class=""><a href="{$songsurl}" title=""><span class="fontbold {if $songorband eq 'song'}fontblue{/if} f120" > {$smarty.const._HWDVIDS_SHIGARU_AZSONGSTEXT}</span> ({$totalsongs})</a></h5>
						</li>
						
					</ul>		
				</div>
			<div>
			<div>
				
					<div id="videoresultwrapper" class="f80 clearfix fleft w75">
						<div class="listNav clearfix">
							<div class="pagination fontbold">
									<a class="a page selected" href="#">A</a>
									<a class="b page" href="#">B</a>
									<a class="c page" href="#">C</a>
									<a class="d page" href="#">D</a>
									<a class="e page" href="#">E</a>
									<a class="f page" href="#">F</a>
									<a class="g page" href="#">G</a>
									<a class="h page" href="#">H</a>
									<a class="i page" href="#">I</a>
									<a class="j page" href="#">J</a>
									<a class="k page disabled" href="#">K</a>
									<a class="l page" href="#">L</a>
									<a class="m page" href="#">M</a>
									<a class="n page" href="#">N</a>
									<a class="o page disabled" href="#">O</a>
									<a class="p page" href="#">P</a>
									<a class="q page" href="#">Q</a>
									<a class="r page" href="#">R</a>
									<a class="s page" href="#">S</a>
									<a class="t page" href="#">T</a>
									<a class="u page" href="#">U</a>
									<a class="v page" href="#">V</a>
									<a class="w page" href="#">W</a>
									<a class="x page" href="#">X</a>
									<a class="y page" href="#">Y</a>
									<a class="z page disabled" href="#">Z</a>
								</div>
						</div>
						<div id="resultcontainer" class="clearfix mtopl6">
							<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
						<div class="listNav clearfix">
							<div class="pagination fontbold">
									<a class="a page selected" href="#">A</a>
									<a class="b page" href="#">B</a>
									<a class="c page" href="#">C</a>
									<a class="d page" href="#">D</a>
									<a class="e page" href="#">E</a>
									<a class="f page" href="#">F</a>
									<a class="g page" href="#">G</a>
									<a class="h page" href="#">H</a>
									<a class="i page" href="#">I</a>
									<a class="j page" href="#">J</a>
									<a class="k page disabled" href="#">K</a>
									<a class="l page" href="#">L</a>
									<a class="m page" href="#">M</a>
									<a class="n page" href="#">N</a>
									<a class="o page disabled" href="#">O</a>
									<a class="p page" href="#">P</a>
									<a class="q page" href="#">Q</a>
									<a class="r page" href="#">R</a>
									<a class="s page" href="#">S</a>
									<a class="t page" href="#">T</a>
									<a class="u page" href="#">U</a>
									<a class="v page" href="#">V</a>
									<a class="w page" href="#">W</a>
									<a class="x page" href="#">X</a>
									<a class="y page" href="#">Y</a>
									<a class="z page disabled" href="#">Z</a>
								</div>
						</div>
					</div>
					<div class="clearfix fleft mleft12 w20pc">	
						<h5 class="fontbold mtop20 mbot20"><i class="icon-ticket fontsig f150"></i> <span id="inyourarea">{$smarty.const._HWDVIDS_SHIGARU_EVENTSINYOURAREA}</span></h5>
						<a href="#" title="Click on this link to view the map in larger size" class="f80 dispnon" id="largemap">View large map</a>
						<div id="bandevents" class="f80 mtop12">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
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
<script type="text/javascript" src="{$domain}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/atoz.js"></script>
