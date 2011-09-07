{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}

<form name="videoadd" action="{$form_tp}" method="post" onsubmit="return chkaddform()">

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_TITLE_UPLDADDTP}</h2>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="150">{$smarty.const._HWDVIDS_VURL} <font class="required">*</font></td>
      <td><input name="embeddump" value="" class="inputbox" size="20" style="width: 200px;" /></td>
    </tr>
    <tr>
      <td>{$smarty.const._HWDVIDS_CATEGORY} <font class="required">*</font></td>
      <td>{$categoryselect}</td>
       <td>{$smarty.const._HWDVIDS_CATEGORY} <font class="required">*</font></td>
      <td>{$genresselect}</td>
    </tr>
    <tr>
      <td>{$smarty.const._HWDVIDS_CATEGORY} <font class="required">*</font></td>
      <td>{$instrumentsselectlist}</td>
       <td>{$smarty.const._HWDVIDS_CATEGORY} <font class="required">*</font></td>
      <td>{$languagesselectlist}</td>
    </tr>
    <tr>
      <td colspan="2"><font class="required">*</font> {$smarty.const._HWDVIDS_INFO_REQUIREDFIELDS}</td>
    </tr>
  </table>
</div>

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_TITLE_SUPWEB}</h2>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td>{$supported_websites}</td>
    </tr>
  </table>
</div>

{include file='sharingoptions.tpl'}

<div class="standard">
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="150"></td>
      <td><input type="submit" name="send" class="inputbox" value="{$smarty.const._HWDVIDS_BUTTON_ADD}" /></td>
    </tr>
  </table>
</div>

<input type="hidden" name="videotype" value="".$videotype."" />
</form>

{include file='footer.tpl'}



