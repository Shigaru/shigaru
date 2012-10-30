{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}


<div class='searchResultInfo f80'>	
							
							<div class="pad6 boxwhite">	
							<div class="searchResultThumb mtop12 mright12">
									{$data->avatar}	
								</div>		
							<div class="fleft w75">
								<div class="mbot12">	
									<div class="mbot20">
										<label for="title" class="searchLabels">
										Username:
										</label>
										<span>{$data->userlink}</span>
									</div>	
								</div>		
								<div class="horizontal-rule"></div>
								<div class="padtop12">
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Country: <br /> <span>{$data->cb_country}</span>
										</label>
									</div>	
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Age:<br /> <span>{$data->cb_age}</span>
										</label>
									</div>	
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Teacher:<br /> <span>{$data->teacher}</span>
										</label>
									</div>
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Favourite genres:<br /> <span>{$data->cb_favmusicgenre}</span>
										</label>
									</div>
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Member since:<br /> <span>{$data->member_since}</span>
										</label>
									</div>
									<div class="fleft mleft12">
										<label for="username" class="searchLabels">
										Last login:<br /> <span>{$data->last_login}</span>
										</label>
									</div>
									<div class="clear"></div>
								</div>
									
							</div>	<div class="clear"></div>
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
