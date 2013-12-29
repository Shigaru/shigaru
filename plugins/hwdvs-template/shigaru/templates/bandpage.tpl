{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script>
	var bandId 			= "{$band->bandid}";
	var searchoption 	= "{$band->source}";
</script>
<div class="workarea">
	<div class="workarea_wrapper clearfix mbot30">
		<div class="fleft">
			<img width="200" height="200" src="{$band->album_thumb}" />
		</div>
		<div class="mleft20 fleft w80pc">
			<div>
				<h3 class="fontbold f150">{$band->band_name}</h3>
			</div>
			
			<div>
				<h5 class="fontbold mtop20">{$smarty.const._HWDVIDS_SHIGARU_SONGS}</h5>
				<ul class="mtop20 mbot20">
					{foreach name=outer item=data from=$songs}
					 <li class="{if $smarty.foreach.outer.index is even}ac_odd{else}ac_even{/if}">	
						<div class="clearfix">
							<div class="fleft">
								{$data->songname}
							</div>
							<div class="fleft">
								{$data->album_name}
							</div>
						</div>
					</li>	
					{/foreach}
				</ul>
			</div>
			<div class="clearfix">
				<div class="fleft w45 f80">
					<div>
						<h5>{$smarty.const._HWDVIDS_SHIGARU_RELATEDVIDEOS}</h5>
						<div id="">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
					</div>
				</div>
				<div  class="fright w45">
					<div>
						<h5 class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_BANDMOREINFO} {$band->band_name}</h5>
						<div id="bandinfo" class="f80">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
						<h5 class="fontbold mtop20"><span id="inyourarea" class="dispnon">{$smarty.const._HWDVIDS_SHIGARU_EVENTSINYOURAREA}</span><span id="forthisband">{$smarty.const._HWDVIDS_SHIGARU_BANDEVENTS}  {$band->band_name}</span></h5>
						<span id="inyourareaexplain" class="dispnon">{$smarty.const._HWDVIDS_SHIGARU_NOBANDEVENTS} {$band->band_name} {$smarty.const._HWDVIDS_SHIGARU_NOBANDEVENT2}</span>
						<div id="bandevents" class="f80">
							<div class="f80 loadingcontent" style="line-height:250px">
								<i class="icon-spinner icon-spin"></i> Loading...
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div>
<div>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/bandpage.js"></script>
