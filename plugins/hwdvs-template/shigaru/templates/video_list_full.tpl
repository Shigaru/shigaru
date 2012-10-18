{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}


<div class='searchResultInfo f80'>	
							<div class="fleft mright24 mtopl6">
								<div>
										<label for="plays" class="searchLabels">
											{$smarty.const._HWDVIDS_INFO_VIEWS}
										<div class="boxwhite pad2 tright">{$data->views}</div>
										</label>
									</div>
									<div>
										<label for="username" class="searchLabels">
										Rating:<br />
										</label>
										{$data->rating}
									</div>
									<div>
										<label for="username" class="searchLabels">
										Comments:<br />
										<div class="boxwhite pad2 tright">1</div>
										</label>
									</div>
							</div>		
							<div class="fleft w70pc pad6 boxwhite">	
								<div class="mbot12">	
									<div class="mbot20">
										<label for="title" class="searchLabels">
										Video Title:
										</label>
										{$data->title}
										<span id="videosearchtitle"></span>
									</div>	
									<div class="mbot20">
										<label for="username" class="searchLabels">
										Shared By:
										</label>
										<a href="" class="">
										<span id="videosearchusername">{$data->uploader}</span>
										</a>
									</div>	
								</div>		
								<div class="horizontal-rule"></div>
								<div class="padtop12">
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										Instrument: <br /> {$data->instrument}
										</label>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										Genre:<br /> {$data->genre}
										</label>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										Level:<br /> {$data->level}
										</label>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										Language:<br /> {$data->language}
										</label>
									</div>
								</div>
									
							</div>	
							<div class="searchResultThumb mtop6 mright12">
									{$data->thumbnail}	
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
