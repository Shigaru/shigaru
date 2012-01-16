{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div id="homepromo">{$smarty.const._HWDVIDS_HOMEPROMO} <a href="{$tenreasonsurl}" title="{$tenreasonstext} Shigaru">{$tenreasonstext}</a>
<br /> </div>

<div id="totalvideos">
	<span class="fontbold">{$smarty.const._HWDVIDS_INFO_TOTVID}: </span><span class="fontred">{$totalvideos}</span> {$smarty.const._HWDVIDS_SHIGARU_TOTALCATEGORIZED}
</div>

{include file='header.tpl'}
{if $print_mostviewed or $print_mostviewed or $print_mostpopular}
<div class="sic-container">
  
  <div class="sic-left">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">{$title_mostviewed}</a></li>
		<li><a href="#tabs-2">{$smarty.const._HWDVIDS_MOST_RECENT}</a></li>
		<li><a href="#tabs-3">{$smarty.const._HWDVIDS_MOST_RATED}</a></li>
		<li><a href="#tabs-4">{$title_mostfavoured}</a></li>
		<li><a href="#tabs-5">{$smarty.const._HWDVIDS_MOST_COMMENTED}</a></li>
	</ul>

	{if $print_mostpopular}
    <div id="tabs-1" ">
      <div class="scoller">
      <div class="list">
        <div class="box">
			{foreach name=outer item=data from=$mostviewedlist}
	  {include file="video_list_small_viewed.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
          
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="{$viewed_link}dsadasdas" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>
    </div>
    
    {/if}
    
    <div id="tabs-2" >
      <div class="scoller">
      <div class="list">
        <div class="box">
		{if $print_videolist}

          {foreach name=outer item=data from=$list}
			  <div class="videoBox">
			  {include file="video_list_full_small_recent.tpl"}
			  </div>
			  {if $smarty.foreach.outer.last}
				 <div style="clear:both;"></div>
			  {elseif $smarty.foreach.outer.index % $vpr-($vpr-1) == 0}
				 <div style="clear:both;"></div>
			  {/if}
          {/foreach}
      
		  {else}
			<div class="padding">{$smarty.const._HWDVIDS_INFO_NRV}</div>
		  {/if}
	<!--{$pageNavigation}-->  
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="{$recent_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>
    </div>
 

    <div id="tabs-3" >
      <div class="scoller">
      <div class="list">
        <div class="box">
          {foreach name=outer item=data from=$mostpopularlist}
	  {include file="video_list_small_popular.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="{$popular_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>
    </div>


    {if $print_ads}{if $advert4}<div ><div class="padding"><div id="hwdadverts-nopadding">{$advert4}</div></div></div>{/if}{/if}
    
    {if $print_mostfavoured}
    <div id="tabs-4" >
      <div class="scoller">
      <div class="list">
        <div class="box">
          {foreach name=outer item=data from=$mostfavouredlist}
	  {include file="video_list_small_favoured.tpl"}
	  <div style="clear:both;"></div>
          {/foreach}
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="{$featured_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>
    </div>
    {/if}
    
    <div id="tabs-5" >
      <div class="scoller">
      <div class="list">
        <div class="box">
		{if $print_videolist}

          {foreach name=outer item=data from=$mostcommented}
			  <div class="videoBox">
			  {include file="video_list_full_small_comments.tpl"}
			  </div>
			  {if $smarty.foreach.outer.last}
				 <div style="clear:both;"></div>
			  {elseif $smarty.foreach.outer.index % $vpr-($vpr-1) == 0}
				 <div style="clear:both;"></div>
			  {/if}
          {/foreach}
      
		  {else}
			<div class="padding">{$smarty.const._HWDVIDS_INFO_NRV}</div>
		  {/if}
	<!--{$pageNavigation}-->  
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="{$recent_link}" title="{$smarty.const._HWDVIDS_WATCHMORE}">{$smarty.const._HWDVIDS_WATCHMORE}</a></div>
    </div>

    
	
    
    
	
  </div> <!-- fin tabs -->
  
  
  <div id="whitebox">
				<div class="whiteboxHeader adverts">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_ADS}
							</h6>
						</div>
				</div>
				<div id="whitebox_m">
  
					{$google_adsense}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 

  
  
  
  <div id="comments-tabs">
	<ul>
		<li><a href="#comments-tabs-1">{$smarty.const._HWDVIDS_LATESTCOMM}</a></li>
		<li><a href="#comments-tabs-2">{$smarty.const._HWDVIDS_POPUCOMM}</a></li>
		<li><a href="#comments-tabs-3">{$smarty.const._HWDVIDS_RECENTUPDATES}</a></li>
		<li><a href="#comments-tabs-4">{$smarty.const._HWDVIDS_RECENTACTVITY}</a></li>
		<li><a href="#comments-tabs-5">{$smarty.const._HWDVIDS_TOPPOSTERS}</a></li>
	</ul>
	
	<div id="comments-tabs-1" >
      <div class="scoller h250">
      <div class="introtext">
		{$smarty.const._HWDVIDS_LATESTCOMMINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$latestcomments}
        </div>
      </div>  
      </div>
    </div>
				
	<div id="comments-tabs-2" >
      <div class="scoller h250">
      <div class="introtext">
		{$smarty.const._HWDVIDS_POPUCOMMINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$mostpopularcomments}
        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-3" >
      <div class="scoller h250">
      <div class="introtext">
		{$smarty.const._HWDVIDS_RECENTUPDATESINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$whatareyou}
        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-4" >
      <div class="scoller h250">
      <div class="introtext">
		{$smarty.const._HWDVIDS_RECENTACTVITYINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$recentactivity}
        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-5" >
      <div class="scoller h250">
      <div class="introtext">
		{$smarty.const._HWDVIDS_TOPPOSTERSINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$topposters}
        </div>
      </div>  
      </div>
    </div>
    
    
    
    		
  </div> <!-- fin tabs -->
  
		
		
		
			<div id="whitebox">
				<div class="whiteboxHeader community">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_OURFACES}
							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
  
					{$zncbmembers}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		 
 
 
		
		<div id="whitebox">
				<div class="whiteboxHeader tweeter">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_TWITTER}
							</h6>
						</div>
				</div>			
				
				<div id="whitebox_m" class="scoller h150">
					{$tweetdisplay}
				</div>
				
				<div class="viewmore">
					<a href="http://twitter.com/shigaru" title="{$smarty.const._HWDVIDS_SHIGARU_FOLLOWUSTWEET}">
						{$smarty.const._HWDVIDS_SHIGARU_FOLLOWUSTWEET}
					</a>
				</div>	
				

		</div>
		
	
		
		
		
		
		
		<div id="whitebox">
				<div class="whiteboxHeader subscribe">
					<div>
							<h6>
							{$smarty.const._HWDVIDS_SUBSCRIBE}
							</h6>
						</div>
					
				</div>			
				

				<div id="whitebox_m">
					{$subscribe}
				</div>
				<div class="viewmore"><a href="/shigaru/index.php?option=com_acymailing&view=archive&Itemid=68" title="{$smarty.const._HWDVIDS_SUBSARCHIVE}">{$smarty.const._HWDVIDS_SUBSARCHIVE}</a></div>	

				
		</div>
		
		
		
		<div id="withoutMusic">
					<blockquote cite="Brian Littrell">
						<p>
						{$smarty.const._HWDVIDS_WITHOUTMUSIC}
						</p>
					</blockquote>
					<p id="explainLink">Friedrich Nietzsche </p>
				</div>
		
		
		
 </div>
  

  <div class="sic-center">
{/if}
  
    {if $print_featured}
      <div class="hwdmodule-h3">
        {if $print_featured_player}
          {include file="featured_videos_01.tpl"}
        {else}
          {include file="featured_videos_02.tpl"}
        {/if}
      </div>
    {/if}

    {if $print_ads}{if $advert3}<div ><div class="padding"><div id="hwdadverts-nopadding">{$advert3}</div></div></div>{/if}{/if}
    
    {if $print_nowlist}
      <div class="hwdmodule-h4">
        {include file="video_beingwatched.tpl"}
      </div>
    {/if}
 
 
 
 
 
 
 
    
 <div id="tabs-tags">   
    <ul>
		<li><a href="#tabs-tags-1">{$smarty.const._HWDVIDS_POP_BANDS}</a></li>
		<li><a href="#tabs-tags-2">{$smarty.const._HWDVIDS_POP_TAGS}</a></li>
		<li><a href="#tabs-tags-3">{$smarty.const._HWDVIDS_POP_GENRES}</a></li>
	</ul>
    
    <div id="tabs-tags-1" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSBANDSINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$bandtagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
    
    
    
    <div id="tabs-tags-2" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$instagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
     
        
    <div id="tabs-tags-3" >
      <div class="scoller miniscoller">
      <div class="introtext">
		{$smarty.const._HWDVIDS_SHIGARU_TAGSGENREINTRO}
      </div>
      <div class="list">
        <div class="box">
          {$gentagsList}
	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
 </div>   
  
  
  <div id="whitebox">
				<div class="whiteboxHeader adverts">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_ADS}
							</h6>
						</div>
					
				</div>
				

				<div id="whitebox_m">
  
					{$google_adsense}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 

  
    
    
    <div id="whitebox">
				
					<div class="whiteboxHeader facefans">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_FACEFAN}
							</h6>
						</div>
					</div>
				<div id="whitebox_m">
					<center>
						<div id="fb-root"></div>
						<div class="fb-like-box" data-href="http://www.facebook.com/pages/Shigarucom/203892893007914" data-width="350" data-show-faces="true" data-border-color="#fff" data-stream="false" data-header="false"></div>
					</center>	  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
	
    

    
    <div id="whitebox">
				<div class="whiteboxHeader donate">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_DONATETO}
							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
					<div class="promotext">
						{$smarty.const._HWDVIDS_DONATETEXT}
					</div>
					<div id="donatebutton">{$donate}</div>
					<div class="clr"></div>
					
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
   
    
    <div id="whitebox">
				<div class="whiteboxHeader followus">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_SHIGARU_FOLLOW}
							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
					<div class="promotext">
						{$smarty.const._HWDVIDS_FOLLOWOTHERSHITES}
					</div>
					{$socialmedialinks}
  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>	
		<div id="addTop">
			
			<div id="backtotop">
				<a href="#up">{$smarty.const._HWDVIDS_TOPPAGE}</a>
			</div>
			{$AddThis}
		</div>
{if $print_mostviewed or $print_mostviewed or $print_mostpopular}
  </div>
</div>
{/if}
<div style="clear:both;"></div>

<!--{include file='footer.tpl'}-->
