{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="resultelement other clearfix" data-symbol="H" data-category="other">
		<div class="videolistoptions">
			<a class="btn btn-small" href="#"><i class="icon-cog"></i></a>
			<ul class="dropdown-menu">
				<li>{$data->editvideo}</li>
				<li>{$data->deletevideo}</li>
			</ul>
		</div>
		<div class="clearfix">
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
										<div class="{$userdetails->cb_country} userflag">
										</div>
									</div>	
									<div class="clearfix fleft f90">
										<span>{$smarty.const._HWDVIDS_INFO_SHARED}</span>
										<div class="clearfix">
											<div>{$data->uploader}</div>
										</div>
										
									</div>
								</div>	
								<div class="clearfix mtop6">
									<div class="f80 mleft6 fleft">
										{$smarty.const._HWDVIDS_INFO_PLAYS}: <span class="fontbold">{$data->views}</span>
									</div>
								</div>	
								<div class="clearfix">
									<div class="f80 mleft6">{$data->upload_date}</div>
								</div>
							</div>
							
						</div>
					</div>	
					<div>
						<div class="twolinestitle mleft6 mtop6">
							{$data->title}
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
								<div class="fleft mleft6 w20pc">
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
								<div class="fleft mleft6 w20pc mtop6">
									<label for="rating" class="searchLabels">
									Rating: <span>{$data->rating}</span>
									</label>
								</div>
								<div class="fleft mleft12 w70 mtop6">
									<label for="description" class="searchLabels">
									Description: <br /><span>{$data->descriptiontrunc}</span>
									</label>
								</div>
							</div>
						
					</div>
					
					
			</div>		
	</div>
	<div class="longtitle mtop12 mleft6 dispnon">
					{$data->title}
	</div>		
</div>
