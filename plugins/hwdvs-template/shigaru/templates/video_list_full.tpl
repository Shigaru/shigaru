{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="resultelement other clearfix {if $smarty.foreach.data.iteration is even}evenrow{/if}" data-symbol="H" data-category="other">
	<div class="fleft">
			<div class="clearfix">	
				<div class="fleft w40">
					<div>
						{$data->thumbnail}
						<span class="videotime">{$data->duration}</span>
						<!--<a class="videocomments"><i class="pad2 icon-comment-alt"><span class="f80">{$data->comments}</span></i></a>-->
						
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
						<div class="clearfix mtop6">
							<div class="f80 mleft6 fleft">
								{$smarty.const._HWDVIDS_INFO_PLAYS}: {$data->views}
							</div>
							<div id="{$userdetails->cb_country}" class="fright mright24 userflag">
							</div>
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
	<div class="fleft">
			<div class='searchResultInfo dispnon'>
				<!--{if isset($data->editvideo)}		
				<div class="buttonbar">
							{$data->editvideo}
							{$data->deletevideo}
				</div>	
				{/if}-->		
				
					<div class="clearfix padtop12">
						<div class="fleft w20pc">
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
					</div>
					<div class="extendedinfo">
						<div class="fleft w20pc mtop6">
							<label for="rating" class="searchLabels">
							Rating: <span>{$data->rating}</span>
							</label>
						</div>
						<div class="fleft mleft12 w70 mtop6">
							<label for="description" class="searchLabels">
							Description: <span>{$data->descriptiontrunc}</span>
							</label>
						</div>
					</div>
				
			</div>
	</div>		
			
</div>
