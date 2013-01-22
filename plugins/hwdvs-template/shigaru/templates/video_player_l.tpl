{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}


{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
<div class="f80 mtop24 sic-container">
  
  <div>
{/if}  



        <div id="videoTitle" class="fleft mbot20">
				  <div>
					 
					 <div class="fright mbot12">
							
							<div class="fleft">{$videoplayer->avatar}</div>
							{if $contentauthor}
							<div class="contentautor"><span>Content Owner</span></div>
							{/if}
					</div>
					<div class="fleft titleText">
					 <h2>{$videoplayer->titleText}</h2> {$videoplayer->editvideo} {$videoplayer->deletevideo}
					 
					 </div>
					 <div class="clear"></div>
				  </div>
				  <div class="padding clear">
					<div id="categoryinfo" class="{$catclass}">  
								
								<div class="fleft mright6"><span class="fontbold">{$videoplayer->category}</span></div>
								<div class="fright mright6"><span>{$smarty.const._HWDVIDS_INFO_SHARED}</span> {$videoplayer->uploader}</div>
								<div class="clear"></div>
					</div>
					<center>
						{$videoplayer->player}
					</center>
				  </div>
				  <div class="padding mtop24">
					  
						<div class="videoactions"> 
								
								<div class="fleft">{$videoplayer->reportmedia}</div>
								<div class="fleft" id="addremfav">{$videoplayer->favourties}</div>
								<div class="fleft">
									<iframe id="ifgoogleplus" src="https://plusone.google.com/_/+1/fastbutton?url={$currentUrl}" frameborder="0" width="67" height="25"></iframe>
								</div>
								<div class="fleft">
									<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en"></a>
									<script>{literal}!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");{/literal}</script>
								</div>
								<div class="fleft">
									<div class="fb-like" data-href="{$currentUrl}" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
								</div>
								<div class="fleft">
									<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
									<a href="http://pinterest.com/pin/create/button/?url={$currentUrl}&media={$thumburl}&description={$videoplayer->titleText}" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
								</div>
								<div class="clear">   </div> 
								 <div id="actionsresponse"><a class="" title="Close this message" href="#">x</a><div></div></div>
							</div>		
						<div id="circle-mod" class="w20pc">
						  <div id="container-circle">
								{$videoplayer->socialbmlinks}
							{if $print_videourl}
								<div id="button-66" class="btn">
								  <div><span>Link</span><form id="permalink" name="vlink" action="#"><input type="text" value="{$currentUrl}" name="vlink" /></form></div>
								</div>
<!--




								 
	-->						  {/if}
							<div id="base-button" class="mleft30">
							  <div><span>Share</span></div>
							</div>
						  </div>
						  
						   
						</div>
						<div class="fleft w70pc"> 
							
							<div class="mbot12">  
								<span class="fontbold f120 mbot6">{$smarty.const._HWDVIDS_DESC}</span><br />
								<p id="truncateMe" class="mtop12"><span id="videodecription">{$videoplayer->description} </span><a href="#" title="Click here to show full description" id="showmore">... [More]</a></p>
							</div>	
							 <span class="fontbold f120 mbot6">{$smarty.const._HWDVIDS_TAGS}</span><br />
							<p class="mtop12"> {$videoplayer->tags}</p>
							
						</div>
						 <div class="clear">   </div>  
				</div>
				
				 
      </div>  
      
      <div id="infocontext" class="fleft">
		  <div><span>{$smarty.const._HWDVIDS_INFO_PLAYS}</span><br /><b>{$videoplayer->views}</b></div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_DATEADDED}</span><br />{$videoplayer->upload_date}</div>
		  {if $showlevel}
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_VIDEOLEVEL}</span><br />{$videoplayer->level}</div>
		  {/if}
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}</span><br />{$videoplayer->instrument}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_GENRE}</span><br />{$videoplayer->genre}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}</span><br />{$videoplayer->language}</div>
		  <div id="ratingsnow"><span>{$smarty.const._HWDVIDS_SELECT_RATING}</span><br />{$videoplayer->ratingsystem}</div>
		  <div><span>{$smarty.const._HWDVIDS_INFO_NOCOMM}</span><br />{$videoplayer->commentsNum}</div>
		  <div>{$songPlayer}</div>
		<div class="clear"><h5>{$smarty.const._HWDVIDS_SHIGARU_ADS}</h5>{$google_adsense}</div>
		<div class="clear"><h5>{$smarty.const._HWDVIDS_SHIGARU_ADS}</h5>{$google_adsense}</div>			
		</div>
		
	  </div> 
		
      
		
		
        <div class="clear">   </div>  
			


	<div class="standard">
	  <div class="padding">
		  <!--
            <div id="addremfav">{$videoplayer->favourties}</div>
           
          
         <!-- <div>{$videoplayer->vieworiginal}</div> 
          <div style="padding: 5px 0;">{$videoplayer->switchquality}</div>
          <div class="padding"></div> 
		  <div class="padding">{if $print_addtogroup}{$videoplayer->addtogroup}<div id="add2groupresponse"></div>{/if}</div>
		  <div class="padding">{if $print_addtoplaylist}{$videoplayer->addtoplaylist}<div id="add2playlistresponse"></div>{/if}</div>
		  <span>{$smarty.const._HWDVIDS_SHIGARU_SEE_MORE_CATEGORY}</span>
		  
		  {$videoplayer->category}-->
          <div style="clear:both;"></div>
	    <div id="ajaxresponse"></div>
          <div style="clear:both;"></div>	
	  </div>
        </div>
      </div>
      


	  
	  
	  {literal}
	  <script type="text/javascript">
	   
	  
	   jQuery(document).ready(function() {
		
			
		  var len = 200;
		  var p = jQuery('#videodecription').html();
		  console.log(p.length);
		  if(p.length < len){
			  jQuery('#showmore').hide();
			  }else{
				 var trunc = p;
				 trunc = trunc.substring(0, len);
				 trunc = trunc.replace(/\w+$/, ''); 
				 jQuery('#videodecription').html(trunc);
				jQuery('#showmore').click(function(){
				  if(jQuery(this).html() == '... [Less]'){
				  jQuery('#videodecription').html(trunc);
				  jQuery(this).html('... [More]').attr('title',"Click here to show full description");
					}else{
						jQuery('#videodecription').html(p);
						jQuery(this).html('... [Less]').attr('title',"Click here to hide full description");
					  }
				  return false;
				  });
		  }	  
		 
		   
		jQuery('.sic-right .video_activity_header').shigaruTabs({slidesSelector:'.tab_wrapper',slidesWrapper:'.sic-right'});	
		jQuery('.workarea div.video_activity div.scoller').jScrollPane({showArrows:true});
        var delay = 40, delayTime, btns = jQuery('.btn');
        jQuery('#base-button').toggle(function(){
          jQuery(this).addClass('open');
          btns.each(function(i){
            delayTime = i * delay;
            var ele = jQuery(this);
            window.setTimeout(function(){
              ele.addClass('open');
            }, delayTime);
          });
        }, function(){
          jQuery(this).removeClass('open');
          var ii = 0;
          jQuery(jQuery(btns).get().reverse()).each(function(i){
            delayTime = i * delay;
            var ele = jQuery(this);
            window.setTimeout(function(){
              ele.removeClass('open');
            }, delayTime);
          });
        });
		});
	  </script>
	  {/literal}
	  
		

   
      
      </div>
      </div>
      
  
	
   


    

{if $print_nextprev or $print_videourl or $print_embedcode or $print_uservideolist or $print_relatedlist}
  </div>
</div>
{/if}
<div id="hwdvids" class="videoplayer">
<div class="sic-container workarea f80 mbot20">
  <div class="standard workarea_wrapper">
  <div class="sic-right slidesWrapper">
	  
	   
			<div id="tabs" class="content_box video_activity">
			<div class="video_activity_header">
				<h3>More videos</h3>
				<div>
				<ul>
					<li class="selected"><a href="#more-tabs-1">{$smarty.const._HWDVIDS_RELATED}</a></li>
					<li><a href="#more-tabs-2">{$smarty.const._HWDVIDS_TITLE_MOREBYUSR}</a></li>
					<li><a href="#more-tabs-3">{$smarty.const._HWDVIDS_MORECATVIDS}</a></li>
				</ul>
				</div>
			</div>
	<div id="more-tabs-1" class="tab_wrapper">
      <div class="scoller">
      <div class="list">
        <div class="box">
			<ul>
          {foreach name=outer item=data from=$listrelated}
	  {include file="video_list_small.tpl"}
          {/foreach}
          </ul>
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-2" class="tab_wrapper">
      <div class="scoller">
      <div class="list">
        <div class="box">
			<ul>
          {foreach name=outer item=data from=$userlist}
	  {include file="video_list_small.tpl"}
	      {/foreach}
			</ul>
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-3" class="tab_wrapper">
      <div class="scoller">
      <div class="list">
        <div class="box">
			<ul>
          {foreach name=outer item=data from=$categoryvideolist}
	  {include file="video_list_small.tpl"}
          {/foreach}
			</ul>
        </div>
      </div>  
      </div>
    </div>
    
    
</div> 
   </div>	  
	  
	  

  
  <div class="sic-center mbot20">
<div class="standard">
      <div class="list">
        <div class="content_box">   
	<div id="comments-tabs">

		<h3>{$smarty.const._HWDVIDS_TITLE_VIDCOMMS}</h3>
	
	
	<div id="comments-tabs-1" class="standard">
      <div class="">
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
</div>
<div style="clear:both;"></div>
</div>

<div class="usermessages" style="display:none; cursor: default"> 
	<div id="flagquestionwrap">         
		<div><a id="no" class="close"></a></div>
		<h1>{$smarty.const._HWDVIDS_TITLE_REPORTTHISVIDEO}</h1> 
        <input type="button" class="reddbuttonsubmit" id="yes" value="{$smarty.const._HWDVIDS_BUTTON_GO}" /> 
	</div>         
</div> 
