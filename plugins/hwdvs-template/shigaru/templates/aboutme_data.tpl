{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*} 

<h4 class="profilehead fontsig"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_CONTACT_INFO_HEADER}</h4>
<div class="mleft12 other clearfix" data-symbol="H" data-category="other">
		<div id="generalinfo" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span>{$smarty.const._HWDVIDS_SELECT_NAME}</span>
								<span>{$data->_cbuser->cb_fname} {$data->_cbuser->cb_lname}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_SEX}</span>
								<span>{$sex}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_YOURAGEGROUP}</span>
								<span>{$data->_cbuser->cb_youragegroup}</span>
							</div>
							<div>
								<span>{$smarty.const.HWDVIDS_SHIGARU_COUNTRY}</span>
								<span>{$cb_countryiam}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_LANGUAGE}</span>
								<span>{$languages}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_MEMBERSINCE}</span>
								<span>{$timeRegistered}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_LASTONLINE}</span>
								<span>{$lastvisitDate}</span>
							</div>
							<div>
								<span>{$smarty.const._UE_TAGS}</span>
								<span>{$data->_cbuser->cb_tags}</span>
								
							</div>
							<div>
								<span>{$smarty.const._UE_IAM}</span>
								<span>{$data->_cbuser->cb_iam}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span>{$smarty.const._HWDVIDS_SELECT_NAME}</span>
								<div id="map-canvas" style="height:350px;width:350px;"></div>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>

<input type="hidden" value="{$data->_cbuser->cb_plug_lat}" id="lat" name="lat">
<input type="hidden" value="{$data->_cbuser->cb_plug_lng}" id="lng" name="lng">
