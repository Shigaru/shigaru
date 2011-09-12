{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{if $print_nowlist eq 2}

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_BWN}</h2>
  <center>
    {$bwn_modContent}
  </center>
</div>

{else}

 <div id="whitebox">
				<div class="whiteboxHeader beingwatched">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_BWN}
							</h6>
						</div>
				</div>
				<div id="whitebox_m">
					<center>
						<div id="{$iCID}">
						  <ul id="{$iCID}_content" class="jcarousel-skin-tango">  
							{foreach name=outer item=data from=$nowlist}
							<li>
									{$data->thumbnail}
									<div class="desc {$iCID}_item">
										
									</div>
							</li>
							{/foreach}
						  </ul>  
						</div> 
					  </center>
				</div>

					<div id="whitebox_b">
						<div id="whitebox_bl">
							<div id="whitebox_br"></div>
						</div>
					</div>
			</div>
	 
	 
		<br />		  
				
				
				
				
				
				
				
			

{/if}








 
