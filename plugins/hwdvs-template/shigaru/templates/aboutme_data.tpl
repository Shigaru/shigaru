{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*} 
<div class="aboutme dropdown clearfix">
	<a href="#generalinfo" class="active"><span class="icon-caret-right pad6"></span> {$smarty.const._SHIG_CONTACT_INFO_HEADER}</a>
	{if $ShowWhere}<a href="#where" class="borleftgrey">{$smarty.const._SHIG_WHEREINWORLD}</a>{/if}
	{if $ShowMyBand}<a href="#myband" class="borleftgrey">{$smarty.const._SHIG_MYBAND}</a>{/if}
	{if $ShowPersonalSites}<a href="#personalsites" class="borleftgrey">{$smarty.const._SHIG_PERSONALSITES}</a>{/if}
	{if $ShowMusicalInterest}<a href="#musicalinterests" class="borleftgrey">{$smarty.const._SHIG_MUSICALINTERESTS}</a>{/if}
	{if $ShowOtherInterest}<a href="#otherinfo" class="borleftgrey">{$smarty.const._SHIG_OTHERINTERINFO}</a>{/if}
</div>
					
<h4 id="generalinfo" class="profilehead fontsig"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_CONTACT_INFO_HEADER}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="generalinfo" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._HWDVIDS_SELECT_NAME}:</span>
								<span>{$data->_cbuser->cb_fname} {$data->_cbuser->cb_lname}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_SEX}:</span>
								<span>{$sex}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_YOURAGEGROUP}:</span>
								<span>{$data->_cbuser->cb_youragegroup}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const.HWDVIDS_SHIGARU_COUNTRY}:</span>
								<span>{$cb_countryiam}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_LANGUAGE}:</span>
								<span>{$languages}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MEMBERSINCE}:</span>
								<span>{$timeRegistered}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_LASTONLINE}:</span>
								<span>{$lastvisitDate}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_TAGS}:</span>
								<span>{$data->_cbuser->cb_tags}</span>
								
							</div>
							<div class="w100 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_IAM}:</span>
								<span>{$data->_cbuser->cb_iam}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>

{if $ShowWhere}
<h4 id="where" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_WHEREINWORLD}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_COUNTRYIAM}:</span>
								<span>{$cb_countryiam} ({$data->_cbuser->cb_cityiam})</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_COUNTRYILIVE}:</span>
								<span>{$cb_countryilive} ({$data->_cbuser->cb_cityilive})</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_NATIVELANG}:</span>
								<span>{$cb_nativelang}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_OTHERLANG}:</span>
								<span>{$cb_otherlanguages}</span>
							</div>
							<div class="w50 fleft mbot6">
								<div id="map-canvas" style="height:350px;width:350px;"></div>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}
{if $ShowMyBand}
<h4 id="myband" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_MYBAND}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDNAME}:</span>
								<span>{$data->_cbuser->cb_bandname}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_OFFICIALWEBSITE}:</span>
								<span>{$data->_cbuser->cb_officialwebsite}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_PREVIOUSLYKNOWN}:</span>
								<span>{$data->_cbuser->cb_previouslyknownas}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDGENRE}:</span>
								<span>{$cb_bandgenre}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDSOUNDSLIKE}:</span>
								<span>{$data->_cbuser->cb_soundslike}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDMEMBERS}:</span>
								<span>{$data->_cbuser->cb_nobandmembers}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDMEMBERSNAMES}:</span>
								<span>{$data->_cbuser->cb_bandmembernames}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYBANDSIGNEDTORECORD}:</span>
								<span>{$data->_cbuser->cb_signedtorecordlabel}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_banddescription}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}

{if $ShowPersonalSites}
<h4 id="personalsites" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_PERSONALSITES}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYWEB1}:</span>
								<span>{$data->_cbuser->cb_myweb1}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_mywebdesc}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYWEB2}:</span>
								<span>{$data->_cbuser->cb_myweb2}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_mywebdesc2}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>

{/if}

{if $ShowMusicalInterest}
<h4 id="musicalinterests" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_MUSICALINTERESTS}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVMUSICGENRE}:</span>
								<span>{$cb_favmusicgenre}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_MUSICALINFLU}:</span>
								<span>{$data->_cbuser->cb_musicinflu}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVARTISTS}:</span>
								<span>{$data->_cbuser->cb_favartirsts}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_ARTBANDRECOMEND}:</span>
								<span>{$data->_cbuser->cb_newartistsrecom}</span>
							</div>
							<div class="w50 fleft mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVSITES}:</span>
								<span>{$data->_cbuser->cb_favristerecomm}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}

{if $ShowOtherInterest}
<h4 id="otherinfo" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._SHIG_OTHERINTERINFO}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_PHILOSOLIFE}:</span>
								<span>{$data->_cbuser->cb_philosolife}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_ILIKE}:</span>
								<span>{$data->_cbuser->cb_ilike}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_IDISLIKE}:</span>
								<span>{$data->_cbuser->cb_idislike}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_COUNTRIESTRAVELD}:</span>
								<span>{$cb_contriestravelled}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_COUNTRIESTOTRAVEL}:</span>
								<span>{$cb_countriestotravel}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_WHOTOMET}:</span>
								<span>{$data->_cbuser->cb_whotomet}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVBOOKS}:</span>
								<span>{$data->_cbuser->cb_favbooks}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVMOVIES}:</span>
								<span>{$data->_cbuser->cb_favmovies}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_FAVTV}:</span>
								<span>{$data->_cbuser->cb_favtv}</span>
							</div>
							<div class="mbot6">
								<span class="fontbold">{$smarty.const._SHIG_HOBBIES}:</span>
								<span>{$data->_cbuser->cb_hobbies}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}
<input type="hidden" value="{$data->_cbuser->cb_plug_lat}" id="lat" name="lat">
<input type="hidden" value="{$data->_cbuser->cb_plug_lng}" id="lng" name="lng">
