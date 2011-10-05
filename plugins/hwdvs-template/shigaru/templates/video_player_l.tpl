{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}

{literal}
<script type="text/javascript">

document.write('<style type="text/css">.tabber{display:none;}<\/style>');

var tabberOptions = {

  'manualStartup':true,

  'onLoad': function(argsObj) {
    if (argsObj.tabber.id == 'tab2') {
      alert('Finished loading tab2!');
    }
  },

  'onClick': function(argsObj) {

    var t = argsObj.tabber; 
    var id = t.id; 
    var i = argsObj.index; 
    var e = argsObj.event;

    if (id == 'tab2') {
      return confirm('Swtich');
    }
  },

  'addLinkId': true

};
</script>
{/literal}
<script type="text/javascript" src="{$link_home}/plugins/hwdvs-template/default/js/tabber.js"></script>

{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
<div class="sic-container">
  
  <div>
{/if}  
	<div id="tabs">
	<ul>
		<li><a href="#tabs-1">{$smarty.const._HWDVIDS_SHIGARU_VIDEO} {$smarty.const._HWDVIDS_SHIGARU_TUTORIALS}</a></li>
		<li><a href="#tabs-2">{$smarty.const._HWDVIDS_SHIGARU_VIDEO} {$smarty.const._HWDVIDS_SHIGARU_DESCRIPTION}</a></li>
		<li><a href="#tabs-3">{$smarty.const._HWDVIDS_SHIGARU_VIDEO} {$smarty.const._HWDVIDS_SHIGARU_TAGS}</a></li>
	</ul>
	<div id="tabs-1" class="standard">
      <div class="list">
        <div class="box">
				  <div>
					 <div class="fleft">
					 {$videoplayer->title} {$videoplayer->editvideo} {$videoplayer->deletevideo}
					 </div>
					 <div class="fright">
							{$videoplayer->avatar}
					</div>
				  </div>
				  <div class="padding clear"><center>{$videoplayer->player}</center></div>
				 {if $print_nextprev}
					<div class="padding">{$videoplayer->nextprev}</div>
				  {/if}
				  {if $print_videourl}
					  <div class="padding"><form name="vlink" action="#"><div>{$smarty.const._HWDVIDS_TITLE_PERMALINK}</div><input type="text" value="{$videoplayer->videourl}" name="vlink" /></form></div>
				  {/if}
				  {if $print_embedcode}
					  <div class="padding"><form name="elink" action="#"><div>{$smarty.const._HWDVIDS_INFO_VIDEMBEDCODE}</div><input type="text" value="{$videoplayer->embedcode}" name="elink" /></form></div>
				  {/if}
      </div>  
      </div>
    </div>  
      
   <div id="tabs-2" class="standard">
      <div class="list">
        <div class="box">   
			<div class="padding"><strong>{$smarty.const._HWDVIDS_DESC}</strong><br /><p id="truncateMe">{$videoplayer->description}</p></div>
			
      <div class="tabber" id="tab1">
    {if $videoplayer->ratingsystem or $videoplayer->downloadoriginal or $videoplayer->vieworiginal or $videoplayer->downloadflv or $videoplayer->favourties or $videoplayer->reportmedia}
      <div class="tabbertab">
      <h2>{$smarty.const._HWDVIDS_RATING}</h2>
	<div class="standard">
	  <div class="padding">
          <div style="float:right;">
            <div>{$videoplayer->downloadoriginal}</div>
            <div>{$videoplayer->downloadflv}</div>
            <div id="addremfav">{$videoplayer->favourties}</div>
            <div>{$videoplayer->reportmedia}</div>
          </div>
          {$videoplayer->ratingsystem}
          <div>{$videoplayer->vieworiginal}</div>
          <div style="padding: 5px 0;">{$videoplayer->switchquality}</div>
          <div style="clear:both;"></div>
	    <div id="ajaxresponse"></div>
          <div style="clear:both;"></div>	
	  </div>
        </div>
      </div>
      {/if}
      {if $videoplayer->socialbmlinks or $print_addtogroup}
      <div class="tabbertab">
      <h2>{$smarty.const._HWDVIDS_SHARE}</h2>
	<div class="standard">
	  <div class="padding">{$videoplayer->socialbmlinks}</div> 
	  <div class="padding">{if $print_addtogroup}{$videoplayer->addtogroup}<div id="add2groupresponse"></div>{/if}</div>
	  <div class="padding">{if $print_addtoplaylist}{$videoplayer->addtoplaylist}<div id="add2playlistresponse"></div>{/if}</div>
	</div>
      </div>
      {/if}
      {if $print_description or $print_tags or $print_tags or $videoplayer->category}
      <div class="tabbertab">
      <h2>{$smarty.const._HWDVIDS_INFO}</h2>
	<div class="standard">
	  {if $print_description}
	  
	  <div class="padding"><strong>{$smarty.const._HWDVIDS_DESC}</strong><br /><p id="truncateMe">{$videoplayer->description}</p></div>{/if}
	  
	  <!--
	  {literal}
	  <script type="text/javascript">
	   
	  var len = 200;
	  var p = document.getElementById('truncateMe');
	  if (p) {
	   
	    var trunc = p.innerHTML;
	    if (trunc.length > len) {
	   
	      /* Truncate the content of the P, then go back to the end of the
	         previous word to ensure that we don't truncate in the middle of
	         a word */
	      trunc = trunc.substring(0, len);
	      trunc = trunc.replace(/\w+$/, '');
	   
	      /* Add an ellipses to the end and make it a link that expands
	         the paragraph back to its original size */
	      trunc += '<a href="#" ' +
	        'onclick="this.parentNode.innerHTML=' +
	        'unescape(\''+escape(p.innerHTML)+'\');return false;">' +
	        '... [ More ]<\/a>';
	      p.innerHTML = trunc;
	    }
	  }
	   
	  </script>
	  {/literal}
	  -->

	  {if $print_tags}<div class="padding"><strong>{$smarty.const._HWDVIDS_TAGS}</strong><br />{$videoplayer->tags}</div>{/if}
	  <div class="padding">{$videoplayer->category}</div>
	  <div class="padding"><!--{$videoplayer->views}--></div>
	  <div class="padding"><!--{$videoplayer->upload_date}--></div>
	</div>
      </div>
      {/if}
    </div>
      
      </div>
      </div>
      </div>
      
      </div>
 </div>   
	
   


    

{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
  </div>
</div>
{/if}
<div id="hwdvids">
<div class="sic-container">
  
  <div class="sic-right">
	  
	  <div class="standard">
      <div class="list">
        <div class="box">   
			<div id="tabs">
				<ul>
					<li><a href="#more-tabs-1">{$smarty.const._HWDVIDS_RELATED}</a></li>
					<li><a href="#more-tabs-2">{$smarty.const._HWDVIDS_TITLE_MOREBYUSR} {$videoplayer->uploader}</a></li>
					<li><a href="#more-tabs-3">{$smarty.const._HWDVIDS_MORECATVIDS}</a></li>
				</ul>
	
	<div id="more-tabs-1" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          {foreach name=outer item=data from=$listrelated}
	  {include file="video_list_small.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-2" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          {foreach name=outer item=data from=$userlist}
	  {include file="video_list_small.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-3" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          {foreach name=outer item=data from=$categoryvideolist}
	  {include file="video_list_small.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
        </div>
      </div>  
      </div>
    </div>
    
    
   </div> 
   </div>
</div> 
   </div>	  
	  
	  
</div>
  
  <div class="sic-center">
<div class="standard">
      <div class="list">
        <div class="box">   
	<div id="comments-tabs">
	<ul>
		<li><a href="#comments-tabs-1">{$smarty.const._HWDVIDS_TITLE_VIDCOMMS}</a></li>
		<li><a href="#comments-tabs-2">{$smarty.const._HWDVIDS_TITLE_VIDCOMMS}</a></li>
	</ul>
	
	<div id="comments-tabs-1" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          {if $print_comments}
			  {$videoplayer->comments}
		{/if} 
        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-2" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          {if $print_comments}
			  {$videoplayer->comments}
		{/if} 
        </div>
      </div>  
      </div>
    </div>
    
   </div> 
   </div>
 </div> 
</div>   

<div style="clear:both;"></div>

<script type="text/javascript">
tabberAutomatic(tabberOptions);
</script>

