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
					 <div class="fleft titleText">
					 {$videoplayer->titleText} {$videoplayer->editvideo} {$videoplayer->deletevideo}
					 </div>
					 <div class="fright mbot12">
							<div class="fleft mright6">{$smarty.const._HWDVIDS_INFO_SHARED}<br />{$videoplayer->username}</div><div class="fleft">{$videoplayer->avatar}</div>
					</div>
				  </div>
				  <div class="padding clear"><center>{$videoplayer->player}</center></div>
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
									<script type="text/javascript">
										{literal}
									(function(m,q,c){var s=function(h){var d=c.pinit,n="?",a,i,f,b;f=[];b=[];var j={},g=m.createElement("IFRAME"),r=h.getAttribute(c.att.count)||false,o=h.getAttribute(c.att.layout)||"horizontal";if(q.location.protocol==="https:")d=c.pinit_secure;f=h.href.split("?")[1].split("#")[0].split("&");a=0;for(i=f.length;a<i;a+=1){b=f[a].split("=");j[b[0]]=b[1]}a=f=0;for(i=c.vars.req.length;a<i;a+=1){b=c.vars.req[a];if(j[b]){d=d+n+b+"="+j[b];n="&"}f+=1}if(j.media&&j.media.indexOf("http")!==0)f=0;if(f===i){a=0;
for(i=c.vars.opt.length;a<i;a+=1){b=c.vars.opt[a];if(j[b])d=d+n+b+"="+j[b]}d=d+"&layout="+o;d=d+"&ref="+encodeURIComponent(m.URL);if(r!==false)d+="&count=1";g.setAttribute("src",d);g.setAttribute("scrolling","no");g.allowTransparency=true;g.frameBorder=0;g.style.border="none";g.style.width=c.layout[o].width+"px";g.style.height=c.layout[o].height+"px";h.parentNode.replaceChild(g,h)}else h.parentNode.removeChild(h)},p=m.getElementsByTagName("A"),l,e,k=[];e=0;for(l=p.length;e<l;e+=1)k.push(p[e]);e=0;
for(l=k.length;e<l;e+=1)k[e].href&&k[e].href.indexOf(c.button)!==-1&&s(k[e])})(document,window,{att:{layout:"count-layout",count:"always-show-count"},pinit:"http://pinit-cdn.pinterest.com/pinit.html",pinit_secure:"https://assets.pinterest.com/pinit.html",button:"//pinterest.com/pin/create/button/?",vars:{req:["url","media"],opt:["title","description"]},layout:{none:{width:43,height:20},vertical:{width:43,height:58},horizontal:{width:90,height:20}}});
										{/literal}
									</script>
									<a href="http://pinterest.com/pin/create/button/?url={$currentUrl}&media={$thumburl}&description={$videoplayer->description}" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
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
								<p id="truncateMe" class="mtop12">{$videoplayer->description}</p>
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
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_VIDEOLEVEL}</span><br />{$videoplayer->level}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_INSTRUMENT}</span><br />{$videoplayer->instrument}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_GENRE}</span><br />{$videoplayer->genre}</div>
		  <div><span>{$smarty.const._HWDVIDS_SHIGARU_LANGUAGE}</span><br />{$videoplayer->language}</div>
		  <div id="ratingsnow"><span>{$smarty.const._HWDVIDS_SELECT_RATING}</span><br />{$videoplayer->ratingsystem}</div>
		  <div><span>{$smarty.const._HWDVIDS_INFO_NOCOMM}</span><br />{$videoplayer->commentsNum}</div>
		  <!--<div>{$songPlayer}</div>-->	
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
	   jQuery(document).ready(function() {
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
