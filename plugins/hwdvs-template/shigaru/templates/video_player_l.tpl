{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}

<script type="text/javascript" src="{$link_home}/plugins/hwdvs-template/default/js/tabber.js"></script>


{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
<div class="sic-container">
  
  <div>
{/if}  



        <div id="videoTitle" class="fleft">
				  <div>
					 <div class="fleft titleText">
					 {$videoplayer->titleText} {$videoplayer->editvideo} {$videoplayer->deletevideo}
					 </div>
					 <div class="fright">
							<div class="fleft mright6">{$smarty.const._HWDVIDS_INFO_SHARED}<br />{$videoplayer->username}</div><div class="fleft">{$videoplayer->avatar}</div>
					</div>
				  </div>
				  <div class="padding clear"><center>{$videoplayer->player}</center></div>
				 
      </div>  
      
      <div id="infocontext" class="fleft">
		  <div><span>{$smarty.const._HWDVIDS_INFO_PLAYS}</span><br /><b>{$videoplayer->views}</b></div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_DATEADDED}</span><br />{$videoplayer->upload_date}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_VIDEOLEVEL}</span><br />{$videoplayer->level}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}</span><br />{$videoplayer->instrument}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_GENRE}</span><br />{$videoplayer->genre}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}</span><br />{$videoplayer->language}</div>
		  <div><span>{$smarty.const._HWDVIDS_SELECT_RATING}</span><br />{$videoplayer->ratingsystem}</div>
		  <div><span>{$smarty.const._HWDVIDS_INFO_NOCOMM}</span><br />{$videoplayer->commentsNum}</div>
		  <div>{$songPlayer}</div>
		  
		  <div>
				  {if $print_nextprev}
					{$videoplayer->nextprev}
				  {/if}
		  </div>
		  <div>		  
				  {if $print_videourl}
					 <form name="vlink" action="#">{$smarty.const._HWDVIDS_TITLE_PERMALINK}<input type="text" value="{$videoplayer->videourl}" name="vlink" /></form>
				  {/if}
		  </div>		  
		</div>
		<div>
		</div>
	  </div> 

      
        <div class="clear">   </div>  
			<div class="padding"><strong>{$smarty.const._HWDVIDS_DESC}</strong><br /><p id="truncateMe">{$videoplayer->description}</p></div>
			


	<div class="standard">
	  <div class="padding">
            <div id="addremfav">{$videoplayer->favourties}</div>
            <div>{$videoplayer->reportmedia}</div>
          
         <!-- <div>{$videoplayer->vieworiginal}</div> -->
          <div style="padding: 5px 0;">{$videoplayer->switchquality}</div>
          <div class="padding">{$videoplayer->socialbmlinks}</div> 
		  <div class="padding">{if $print_addtogroup}{$videoplayer->addtogroup}<div id="add2groupresponse"></div>{/if}</div>
		  <div class="padding">{if $print_addtoplaylist}{$videoplayer->addtoplaylist}<div id="add2playlistresponse"></div>{/if}</div>
		  <span>{$smarty.const._HWDVIDS_SHIGARU_SEE_MORE_CATEGORY}</span>
		  
		  {$videoplayer->category}
          <div style="clear:both;"></div>
	    <div id="ajaxresponse"></div>
          <div style="clear:both;"></div>	
	  </div>
        </div>
      </div>
      

	  

	  
	  
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
		<li><a href="#comments-tabs-2">{$smarty.const._HWDVIDS_TAGS}</a></li>
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
			  {$videoplayer->tags}
	 
        </div>
      </div>  
      </div>
    </div>
    
    
    
   </div> 
   </div>
 </div> 
</div>   

<div style="clear:both;"></div>
