{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="workarea">
	<div class="workarea_wrapper clearfix mbot30">
		<div class="fleft">
			<img width="200" height="200" src="{$band->album_thumb}" />
		</div>
		<div class="mleft20 fleft">
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
			<div>
				<div><h5>{$smarty.const._HWDVIDS_SHIGARU_RELATEDVIDEOS}</h5></div>
			<div>
		</div>
	<div>
<div>
