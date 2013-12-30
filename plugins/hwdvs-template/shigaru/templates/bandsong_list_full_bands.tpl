{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="w15 mtop12 h100px fleft mleft30 other clearfix bandsong" data-symbol="H" data-category="other">
		<div class="clearfix">
				<div class="fleft">
					<div class="clearfix">	
						<div class="fleft w40">
							<div>
								{if $data->album_thumb neq ''}
								<img src="{$data->album_thumb}" width="50" height="50"/>
								{else}
								<img src="templates/rhuk_milkyway/images/vinyl-icon_big.png" width="50" height="50"/>
								{/if}
							</div>
						</div>
					</div>	
					<div>
						<div class="fontbold mleft6 mtop6">
							<a href="index.php?option=com_hwdvideoshare&task=searchbyoption&searchoption=cbandsssource&item_id={$data->bandid}" title="Click on this icon to navigate to this song's page">{$data->band_name}</a>
						</div>
					</div>
			</div>		
	</div>	
</div>
