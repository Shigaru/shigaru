{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="content_box">
<h3 class="mtop12">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU}</h3>
{include file='header.tpl'}
</div>
<script type="text/javascript">
	{literal}
		jQuery(document).ready(function(){
			jQuery(".inputtext").click(function () {
				  jQuery("#videouploadwrap ul li").removeClass("active");
				  jQuery(this).parents('.upoptions').get(0).addClass("active",1500); 	
			});
		});
	{/literal}
</script>
	

<div id="videouploadwrap">
	
			<div  class="mbot12">
				<form name="videoupload" action="{$form_upload}" method="post">
					<div class="f100 mtopl6">{$smarty.const._HWDVIDS_SHIGARU_THANKYOU} <span class="boldred">{$username}</span> {$smarty.const._HWDVIDS_SHIGARU_SUBMIT_THANKYOU_DECIDING}</div>
						<div  class="tright">
						  <input name="videourl" id="videourl" placeholder="Paste or type here the URL of the video" value="" class="inputtext mbot12" size="42" />
						  <br />
						  <span class="mright6 mtopl6">{$smarty.const._HWDVIDS_TITLE_SUPWEB}</span>
						  {$supported_websites}
						  <br class="clear"/>
						  <input type="submit" name="send"  class="reddbuttonsubmit button fnone mtop12" value="{$smarty.const._HWDVIDS_SHIGARU_SUBMITURL}" />
						  <input type="hidden" name="videotype" value="thirdparty" />
					  </div>
					</form>
				</div>
				<div id="uploadlegal">
					<h1 class="fontbold f15em">{$smarty.const._HWDVIDS_SHIGARU_IMPORTANT}</h1>
					<ul>
						<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_BYCLICKING}</span></li>
						<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_YOURIP} {$ipaddress}</span></li>
						<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_VIDEOREVIEWED}</span></li>
						<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_LEGALADVERT}</span></li>
					</ul>

				</div>
		

        <!--<select name="videotype">
          <option value="00"></option>
          <option value="thirdparty" {$tpselect}></option>
        </select>-->
 
</div>

<div>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="150"></td>
      <td></td>
    </tr>
  </table>
</div>

</form>


</div>
</div>


