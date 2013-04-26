{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="resultelement other clearfix nonmetal" data-symbol="H" data-category="other">
	<div class="clearfix">	
		<div class="fleft w40">
			<div>
				{$data->thumbnail}
				<span class="videotime">{$data->duration}</span>
			</div>
		</div>
		<div class="fright w59">
			<div class="clearfix">
				<div class="clearfix">
					<div class="fleft">
						{$data->avatar}
					</div>	
					<div class="fleft f90">
						<span>{$smarty.const._HWDVIDS_INFO_SHARED}</span>
						<div>{$data->uploader}</div>
					</div>
				</div>	
				<div class="clearfix">
					<div class="f80 mleft6 fleft">
						{$smarty.const._HWDVIDS_INFO_PLAYS}: {$data->views}
					</div>
					<div id="{$userdetails->cb_country}" class="fright mright12 userflag"></div>
					
				</div>	
				<div class="clearfix">
					
					<div class="f80 mleft6">{$data->upload_date}</div>
				</div>
			</div>
			
		</div>
	</div>	
		<div>
			<div class="mtop6">
				{$data->titletrunc}
			</div>
		</div>
</div>
<!--    
<div class="item">{$data->titleplain}
 {$data->thumbnail}
  <div class="">
    <small class="">{$smarty.const._HWDVIDS_INFO_VIEWS}{$data->views}</small>
    <small class="">Comments:</small>
    <div class="">{$data->rating}   
    </div>
  </div>
</li>

<div class='searchResultInfo f80'>
							{if isset($data->editvideo)}		
							<div class="buttonbar">
										{$data->editvideo}
										{$data->deletevideo}
									</div>	
							{/if}		
							
								<div class="padtop12">
									<div class="fleft mleft12 w20pc">
										<label for="username" class="searchLabels">
										Instrument: <br /> <span>{$data->instrument}</span>
										</label>
									</div>	
									<div class="fleft mleft12 w20pc">
										<label for="username" class="searchLabels">
										Genre:<br /> <span>{$data->genre}</span>
										</label>
									</div>	
									<div class="fleft mleft12 w20pc">
										<label for="username" class="searchLabels">
										Level:<br /> <span>{$data->level}</span>
										</label>
									</div>	
									<div class="fleft mleft12 w20pc">
										<label for="username" class="searchLabels">
										Language:<br /> <span>{$data->language}</span>
										</label>
									</div>
									<div class="clear"></div>
								</div>
									
							</div>	
							</div>
							
					</div>					
				<div class="clear"></div>
				
	















{* 
//////
//    <div class="listdesc">{$data->description}</div>
//    <div class="listduration">{$smarty.const._HWDVIDS_INFO_DURATION}: {$data->duration}</div>
//    <div class="listduration">{$smarty.const._HWDVIDS_DETAILS_VDATE}: {$data->upload_date}</div>
//    {$data->avatar}
//////
*}
-->
