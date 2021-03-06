{* 
//////
//    @version [ Nightly Build ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2011 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{if $print_sharing}

{literal}
<script language="javascript">
function ShowPasswordField(f)
{
	box = f.public_private;
	uploadstatus = box.options[box.selectedIndex].value;
		if (uploadstatus == 'password')
		{
		document.getElementById("passwordField").style.visibility="visible";
		document.getElementById("passwordField").style.height="auto";
		}
		else
		{
		document.getElementById("passwordField").style.visibility="hidden";
		document.getElementById("passwordField").style.height="0px";
		}
}
</script>
{/literal}

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_TITLE_OPTIONS}</h2>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        {if $usershare1}
        <tr>
            <td width="150">{$smarty.const._HWDVIDS_ACCESS}</td>
            <td>
		<select name="public_private" onChange="ShowPasswordField(this.form)">
		<option value="public"{$so1p}>{$smarty.const._HWDVIDS_SELECT_PUBLIC}</option>
		<option value="registered"{$so1r}>{$smarty.const._HWDVIDS_SELECT_REG}</option>
		<option value="me"{$so1m}>{$smarty.const._HWDVIDS_SELECT_ME}</option>
		<option value="password"{$so1w}>{$smarty.const._HWDVIDS_SELECT_PASSWORD}</option>
		</select>
	    </td>
	</tr>
        {else}
	<tr>
	    <td colspan="2"><input type="hidden" name="public_private" value="{$so1value}"></td>
	</tr>
        {/if}
        {if $usershare2}
        <tr>
            <td width="150">{$smarty.const._HWDVIDS_ACOMMENTS}</td>
            <td>
		<select name="allow_comments">
		<option value="1"{$so21}>{$smarty.const._HWDVIDS_SELECT_ALLOWCOMMS}</option>
		<option value="0"{$so20}>{$smarty.const._HWDVIDS_SELECT_DONTALLOWCOMMS}</option>
		</select>
	    </td>
	</tr>
        {else}
	<tr>
	    <td colspan="2"><input type="hidden" name="allow_comments" value="{$so2value}"></td>
	</tr>
        {/if}
        {if $usershare3}
        <tr>
            <td width="150">{$smarty.const._HWDVIDS_AEMBEDDING}</td>
            <td>
		<select name="allow_embedding">
		<option value="1"{$so31}>{$smarty.const._HWDVIDS_SELECT_ALLOWEMB}</option>
		<option value="0"{$so30}>{$smarty.const._HWDVIDS_SELECT_DONTALLOWEMB}</option>
		</select>
	    </td>
	</tr>
        {else}
	<tr>
	    <td colspan="2"><input type="hidden" name="allow_embedding" value="{$so3value}"></td>
	</tr>
        {/if}
        {if $usershare4}
        <tr>
            <td width="150">{$smarty.const._HWDVIDS_ARATINGS}</td>
            <td>
		<select name="allow_ratings">
		<option value="1"{$so41}>{$smarty.const._HWDVIDS_SELECT_ALLOWRATE}</option>
		<option value="0"{$so40}>{$smarty.const._HWDVIDS_SELECT_DONTALLOWRATE}</option>
		</select>
	    </td>
	</tr>
        {else}
	<tr>
	    <td colspan="2"><input type="hidden" name="allow_ratings" value="{$so4value}"></td>
	</tr>
        {/if}
    </table>
</div>
{else}
<input type="hidden" name="public_private" value="{$so1value}" />
<input type="hidden" name="allow_comments" value="{$so2value}" />
<input type="hidden" name="allow_embedding" value="{$so3value}" />
<input type="hidden" name="allow_ratings" value="{$so4value}" />
{/if}

<div id="passwordField" {if $so1value ne "password"}style="visibility:hidden;height:0;"{/if}>
<div class="standard">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="150">Password</td>
            <td>
		<input name="hwdvspassword" value="" type="password" class="inputbox" size="20" maxlength="500" style="width: 200px;" />
	    </td>
	</tr>
    </table>
</div>
</div>
