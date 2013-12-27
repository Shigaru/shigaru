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
			<img width="200" height="200" src="{$album->album_thumb}" />
		</div>
		<div class="mleft20 fleft">
			<div>
				<h3 class="fontbold f150">{$album->album_name}</h3>
			</div>
			<div>
				<a href="" alt=""><span class="f150">{$album->band_name}</span></a>
			</div>
			<div>
				<ul class="mtop20 mbot20">
					{foreach name=outer item=data from=$songs}
					 <li class="{if $smarty.foreach.outer.index is even}ac_odd{else}ac_even{/if}">	
						<div class="clearfix">
							<div>
								{$data->songname}
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
