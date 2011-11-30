{* 
//////
//    @version [ Nightly Build ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2011 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div class="headerText">{$smarty.const._HWDVIDS_SHIGARU_ONEOFTWO}</div>
{include file='header.tpl'}
<div class="f100">{$smarty.const._HWDVIDS_SHIGARU_THANKYOU} <span class="boldred">{$username}</span> {$smarty.const._HWDVIDS_SHIGARU_FILLUPTHIS}</div>

<form name="videoadd" action="{$form_tp}" method="post" onsubmit="return chkform()">

<div id="videodetailswrap">
  <div>{$smarty.const._HWDVIDS_SHIGARU_MANDATORYFIELDS}</div>
  <input name="embeddump" value="{$videourl}" class="inputbox" type="hidden" />
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></div>
	<div class="inputinfovideo mbot6">{$categoryselect}</div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO} <font class="required">*</font></div>
	<div class="inputinfovideo"><input type="text" value="" name="videotitle" size="40"/></div>
	<br />
	<div class="videohelptext">{$smarty.const._HWDVIDS_SHIGARU_EXAMPLETITLE}</div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></div>
	<div class="inputinfovideo"><input type="text" value="" name="originalband" size="40"/></div>
	<br />
	<div class="videohelptext">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></div>
	<div class="inputinfovideo"><input type="text" value="" name="songtitle" size="40"/></div>
	<br />
	<div class="videohelptext">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_SHIGARUUSER} <font class="required">*</font></div>
	<div class="inputinfovideo mbot6"><input type="text" value="{$username}" disabled="disabled" name="originalband" size="40"/></div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_AREYOUCREATOR} <font class="required">*</font></div>
	<div class="inputinfovideo">
			<label>{$smarty.const._HWDVIDS_SHIGARU_YES}<input type="radio" name="areyou" value="yes"></label>
			<label>{$smarty.const._HWDVIDS_SHIGARU_NO}<input type="radio" name="areyou" value="no"></label>
	</div>
	<br />
	<div class="videohelptext">{$smarty.const._HWDVIDS_SHIGARU_COPYRIGHTREASONS}</div>
  </div>
  <div class="clear">
	<div class="videoinfolabel">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP} <font class="required">*</font></div>
	<div class="videohelptext">{$smarty.const._HWDVIDS_SHIGARU_TEXTDESCRIPTION}</div>
	<div id="wysigyginfovideo">{$description}</div>
	<br />
	
  </div>
  <div class="clear">
	{if $print_captcha}
    {$captcha}
    <div class="videoinfolabel">{$smarty.const._HWDVIDS_INFO_SECURECODE} <font class="required">*</font></div>
    <div class="inputinfovideo">
		<input id="security_code" name="security_code" type="text" />
	</div>	
    {/if}
  </div>
</div>

{include file='sharingoptions.tpl'}

<div class="fright">
  
    
    <input type="submit" name="send" class="button fnone mtop12" value="{$smarty.const._HWDVIDS_BUTTON_ADD}" />
</div>

<input type="hidden" name="videotype" value="".$videotype."" />
</form>




