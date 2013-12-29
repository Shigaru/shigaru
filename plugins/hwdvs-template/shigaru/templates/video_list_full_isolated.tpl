{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
		<div class="clearfix">
				<div class="fleft w80pc f90">
					<div class="f120 mleft6 fontbold">
						{$data->title}
					</div>
					<div class="mtop20 clearfix">
						<div class="fleft">	
					<div>
							<div class="f90">		
								
									<div class="clearfix">
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
			</div>
				</div>
				<div class="fright f90">
					<div>
							{$data->avatar}
							<div>
							<span>{$smarty.const._HWDVIDS_INFO_SHARED}</span>
							<div class="clearfix">
									<div>{$data->uploader}</div>
							</div>
						</div>
					</div>
				</div>
		</div>			
		
