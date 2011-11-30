{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="headerText">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU}</div>
{include file='header.tpl'}
<div class="f100">{$smarty.const._HWDVIDS_SHIGARU_THANKYOU} <span class="boldred">{$username}</span> {$smarty.const._HWDVIDS_SHIGARU_SUBMIT_THANKYOU_DECIDING}</div>
<script type="text/javascript">
	{literal}
		jQuery(document).ready(function(){
			jQuery(".inputtext").click(function () {
				  jQuery("#videouploadwrap ol li").removeClass("active");
				  jQuery(this).parents('.upoptions').get(0).addClass("active",1500); 	
			});
		});
	{/literal}
</script>
	

<div id="videouploadwrap">
  <div id="twooptions" class="fontbold f15em">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_OPTIONS}</div>
	<ol>
		<li class="upoptions">
				<span class="fontbold mbot12">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_UPLOADPC}</span>
				<br />
					<div  class="mtop24 tright">
						<form name="videoupload" action="{$form_upload}" method="post">
								  <label for="example1_field">{$smarty.const._HWDVIDS_FLASHUPDL_startMessage}</label>
								  <input name="MAX_FILE_SIZE" value="{$max_upld}" type="hidden" />
								  <input class="inputtext" size="42" name="myFile" id="example1_field" type="file" />
								   <input type="hidden" name="uploadpage" value="1" />
								   <input type="hidden" name="videotype" value="00" />
						 <div  class="mtop24 tright">
							 <div class="fright w70">
								<span class="boldred">{$smarty.const._HWDVIDS_SHIGARU_FORMATSACCEPTED}</span> 
								<br />
								{$smarty.const._HWDVIDS_INFO_ALLUPLD} {$allowed_formats}
								<br />
								{$smarty.const._HWDVIDS_SHIGARU_OR} {$allowed_formats}
								<br />
								<span class="boldred">{$smarty.const._HWDVIDS_SHIGARU_FILESIZE}</span> 
								<br />
								<ul class="mbot12">
									<li>{$smarty.const._HWDVIDS_SHIGARU_NOTOVER}</li>
									<li>{$smarty.const._HWDVIDS_SHIGARU_UNDERMIN}</li>
									<li>{$smarty.const._HWDVIDS_SHIGARU_LONGVIDEO}</li>
								</ul>	
							</div>
							
							<br class="clear"/>
							 <input type="submit" name="send"  class="button fnone mtop12" value="{$smarty.const._HWDVIDS_SHIGARU_UPLOADVIDEO}" />
						</div>		 
						</form>
					</div>	
		 
		
		</li>
		<div id="orOptions" ><span class="fontbold f15em">{$smarty.const._HWDVIDS_SHIGARU_OR}</span><div></div></div>			
		<li class="upoptions"><span class="fontbold mbot12">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_URL}</span>
			<br />
			<div  class="mtop24 tright">
				<form name="videoupload" action="{$form_upload}" method="post">

					  {$smarty.const._HWDVIDS_VURL} <input name="videourl" value="" class="inputtext mbot12" size="42" />
					  <br />
					  <span class="mright6">{$smarty.const._HWDVIDS_TITLE_SUPWEB}</span>
					  {$supported_websites}
					  <br class="clear"/>
					  <input type="submit" name="send"  class="button fnone mtop12" value="{$smarty.const._HWDVIDS_SHIGARU_SUBMITURL}" />
					  <input type="hidden" name="videotype" value="thirdparty" />
					</form>
				</div>
			
		</li>
	</ol>


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

<div id="uploadlegal">
	<h1 class="fontbold f15em">{$smarty.const._HWDVIDS_SHIGARU_IMPORTANT}</h1>
	<ul>
		<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_BYCLICKING}</span></li>
		<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_YOURIP} {$ipaddress}</span></li>
		<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_VIDEOREVIEWED}</span></li>
		<li><span class="tblack">{$smarty.const._HWDVIDS_SHIGARU_LEGALADVERT}</span></li>
	</ul>

</div>



