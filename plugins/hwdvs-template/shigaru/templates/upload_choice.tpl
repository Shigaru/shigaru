{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="content_box">
<h3 class="mbot12">{$smarty.const._HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU}</h3>
</div>
{include file='header.tpl'}

<div id="videouploadwrap">
	
			<div  class="mbot12">
				<form name="videoupload" action="{$form_upload}" method="post">
					<div class="f100 mtop24">{$smarty.const._HWDVIDS_SHIGARU_THANKYOU} <span class="boldred">{$username}</span> {$smarty.const._HWDVIDS_SHIGARU_SUBMIT_THANKYOU_DECIDING}</div>
					<div class="f100 mtop24"><span class="fontbold">Step 1/2: </span>Copy and paste the url (link) of the music tutorial that you have uploaded or found on another site.</div>
						<div  class="tright">
						  <input name="videourl" id="videourl" placeholder="Paste or type here the URL of the video. Example: http://www.youtube.com/watch?v=B6lbqdKC5NQy" value="" class="inputtext mbot12" size="42" />
						  <br />
						</div>  
						<div class="fleft">
						  <span class="mright6 mtopl6">{$smarty.const._HWDVIDS_TITLE_SUPWEB}</span>
						  {$supported_websites}
						  
						</div>  
						<div  class="fright tright">
						  <input type="submit" name="send"  class="reddbuttonsubmit button fnone mtop12" value="{$smarty.const._HWDVIDS_SHIGARU_SUBMITURL}" />
						  <input type="hidden" name="videotype" value="thirdparty" />
					  </div>
					  <br class="clear"/>
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



</form>


</div>
</div>


