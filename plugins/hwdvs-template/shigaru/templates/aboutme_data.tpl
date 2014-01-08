{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*} 
<div class="aboutme dropdown clearfix">
	<a href="#generalinfo" class="active"><span class="icon-caret-right pad6"></span> {$smarty.const._UE_CONTACT_INFO_HEADER}</a>
	{if $ShowWhere}<a href="#where" class="borleftgrey">{$smarty.const._UE_WHEREINWORLD}</a>{/if}
	{if $ShowMyBand}<a href="#myband" class="borleftgrey">{$smarty.const._UE_MYBAND}</a>{/if}
	{if $ShowPersonalSites}<a href="#personalsites" class="borleftgrey">{$smarty.const._UE_PERSONALSITES}</a>{/if}
	{if $ShowMusicalInterest}<a href="#musicalinterests" class="borleftgrey">{$smarty.const._UE_MUSICALINTERESTS}</a>{/if}
	{if $ShowOtherInterest}<a href="#otherinfo" class="borleftgrey">{$smarty.const._UE_OTHERINTERINFO}</a>{/if}
</div>
					
<h4 id="generalinfo" class="profilehead fontsig"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_CONTACT_INFO_HEADER}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="generalinfo" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._HWDVIDS_SELECT_NAME}:</span>
								<span>{$data->_cbuser->cb_fname} {$data->_cbuser->cb_lname}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_SEX}:</span>
								<span>{$sex}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_YOURAGEGROUP}:</span>
								<span>{$data->_cbuser->cb_youragegroup}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const.HWDVIDS_SHIGARU_COUNTRY}:</span>
								<span>{$cb_countryiam}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_LANGUAGE}:</span>
								<span>{$languages}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MEMBERSINCE}:</span>
								<span>{$timeRegistered}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_LASTONLINE}:</span>
								<span>{$lastvisitDate}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_TAGS}:</span>
								<span>{$data->_cbuser->cb_tags}</span>
								
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_IAM}:</span>
								<span>{$data->_cbuser->cb_iam}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>

{if $ShowWhere}
<h4 id="where" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_WHEREINWORLD}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._UE_COUNTRYIAM}:</span>
								<span>{$cb_countryiam}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_CITYREGION}:</span>
								<span>{$data->_cbuser->cb_cityiam}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_COUNTRYILIVE}:</span>
								<span>{$cb_countryilive}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_CITYREGION}:</span>
								<span>{$data->_cbuser->cb_cityilive}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_NATIVELANG}:</span>
								<span>{$cb_nativelang}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_OTHERLANG}:</span>
								<span>{$cb_otherlanguages}</span>
							</div>
							<div>
								<div id="map-canvas" style="height:350px;width:350px;"></div>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}
{if $ShowMyBand}
<h4 id="myband" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_MYBAND}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDNAME}:</span>
								<span>{$data->_cbuser->cb_bandname}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_OFFICIALWEBSITE}:</span>
								<span>{$data->_cbuser->cb_officialwebsite}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_PREVIOUSLYKNOWN}:</span>
								<span>{$data->_cbuser->cb_previouslyknownas}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDGENRE}:</span>
								<span>{$cb_bandgenre}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDSOUNDSLIKE}:</span>
								<span>{$data->_cbuser->cb_soundslike}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDMEMBERS}:</span>
								<span>{$data->_cbuser->cb_nobandmembers}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDMEMBERSNAMES}:</span>
								<span>{$data->_cbuser->cb_bandmembernames}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYBANDSIGNEDTORECORD}:</span>
								<span>{$data->_cbuser->cb_signedtorecordlabel}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_banddescription}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}

{if $ShowPersonalSites}
<h4 id="personalsites" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_PERSONALSITES}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYWEB1}:</span>
								<span>{$data->_cbuser->cb_myweb1}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_mywebdesc}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYWEB2}:</span>
								<span>{$data->_cbuser->cb_myweb2}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MYWEBDESC}:</span>
								<span>{$data->_cbuser->cb_mywebdesc2}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>

{/if}

{if $ShowMusicalInterest}
<h4 id="musicalinterests" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_MUSICALINTERESTS}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVMUSICGENRE}:</span>
								<span>{$cb_favmusicgenre}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_MUSICALINFLU}:</span>
								<span>{$data->_cbuser->cb_musicinflu}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVARTISTS}:</span>
								<span>{$data->_cbuser->cb_favartirsts}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_ARTBANDRECOMEND}:</span>
								<span>{$data->_cbuser->cb_newartistsrecom}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVSITES}:</span>
								<span>{$data->_cbuser->cb_favristerecomm}</span>
							</div>
						</div>
					</div>	
			</div>		
	</div>	
</div>
{/if}

{if $ShowOtherInterest}
<h4 id="otherinfo" class="profilehead fontsig mtop20"> <span class="icon-caret-right pad6 fontsig"></span> {$smarty.const._UE_OTHERINTERINFO}</h4>
<div class="profilebody other clearfix" data-symbol="H" data-category="other">
		<div id="friends" class="clearfix">
				<div>
					<div class="clearfix">	
						<div>
							<div>
								<span class="fontbold">{$smarty.const._UE_PHILOSOLIFE}:</span>
								<span>{$data->_cbuser->cb_philosolife}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_ILIKE}:</span>
								<span>{$data->_cbuser->cb_ilike}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_IDISLIKE}:</span>
								<span>{$data->_cbuser->cb_idislike}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_COUNTRIESTRAVELD}:</span>
								<span>{$cb_contriestravelled}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_COUNTRIESTOTRAVEL}:</span>
								<span>{$cb_countriestotravel}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_WHOTOMET}:</span>
								<span>{$data->_cbuser->cb_whotomet}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVBOOKS}:</span>
								<span>{$data->_cbuser->cb_favbooks}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVMOVIES}:</span>
								<span>{$data->_cbuser->cb_favmovies}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_FAVTV}:</span>
								<span>{$data->_cbuser->cb_favtv}</span>
							</div>
							<div>
								<span class="fontbold">{$smarty.const._UE_HOBBIES}:</span>
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
