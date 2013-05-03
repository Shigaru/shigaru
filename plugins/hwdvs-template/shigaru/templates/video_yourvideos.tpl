{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="{$baseurl}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>

<script type="text/javascript">
	{literal}
jQuery(document).ready(function() {
	var isHorizontal = false;
	var $container = jQuery('#resultcontainer');
	var oListUrl = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_myvideos&format=raw";
    jQuery('span.pagination a.page').click(function(e){
					$container.isotope( 'destroy' );
					doLoadAjaxContent(transformPageUrls(e));
					e.preventDefault();
				});
	
	// change layout
      
      var $optionSets = jQuery('#options .btn-group'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('active') ) {
          return false;
        }
        var $optionSet = $this.parents('.btn-group');
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options );
         
          
          
        } else {
          // otherwise, apply new options
          $container.isotope( options );
          
        }
        
        return false;
      });			    
	doLoadAjaxContent(oListUrl);
	
	function doLoadAjaxContent(paramUrl){
		jQuery('#resultcontainer').html('<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>');
		jQuery.ajax({
            url: paramUrl
        }).done(function (data) {
			jQuery('#resultcontainer').hide().html(data).fadeIn().find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			jQuery(".loadingcontent").hide();
			initVideoList();
        });
		
	}
	
	function transformPageUrls(e){	
			var oLimitStart = e.target.href.substring(e.target.href.indexOf("&limitstart=")+12,e.target.href.length);
				if(oLimitStart.indexOf('&')>0)
					oLimitStart = oLimitStart.substring(0,oLimitStart.indexOf('&'));
				oLimitStart +=  "&limitstart="+oLimitStart;
			return oListUrl+oLimitStart;	
			}
		
	
	
	
		
	function initVideoList(){
		
      // add randomish size classes
      
      
      $container.isotope({
        itemSelector : '.resultelement',
        masonry : {
          columnWidth : 238
        },
        masonryHorizontal : {
          rowHeight: 160
        },
        cellsByRow : {
          columnWidth : 330,
          rowHeight: 215
        }
      });
	}
	
	
		
	
	
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {
          // orientation change
          // need to do some clean up for transitions and sizes
          var style = isHorizontal ? 
            { height: '80%', width: $container.width() } : 
            { width: 'auto' };
          // stop any animation on container height / width
          $container.filter(':animated').stop();
          // disable transition, apply revised style
          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').isotope( options );
          }, 100 )
        } else {
		   var oItems = jQuery('#resultcontainer .resultelement');	
		   oItems.find('.twolinestitle').show();
		   oItems.find('.longtitle').hide();
		   oItems.find('.searchResultInfo').hide().css({'margin':'0','border-left':'none','padding':'0'}).parent().css('width','100%').prev().css('width','100%');
		   oItems.css({'width': "218px",'height':'140px',fontSize:'100%','padding':'4px 0 0 0','border':'none',margin:0});
		   oItems.find('img.bradius5').css({width: "87px"}).prev().css('width','87px');;
		   jQuery('.searchResultInfo .extendedinfo').hide();
		   switch(options.layoutMode){
					case 'masonry':
								oItems.css({'border-bottom':'1px dotted gray','margin':'12px 0px 0px 12px'});
								oItems.find('.searchResultInfo').hide();
								oItems.find('.thumbplay').css('margin','20px 0 0 28px');
								break;
					case 'cellsByRow':
								oItems.css('border-bottom','1px dotted gray').animate({ 
									width: "300px",
									height: "210px",
									fontSize:'100%',
									'padding-top':'0',
									'margin':'-12px 0 0 -12px'
								  });
								  oItems.find('img.bradius5').animate({ 
									width: "120px"
								  }).prev().css('width','120px').parent().next().css('margin-top','-20px');
								  oItems.find('.thumbplay').css('margin','31px 0 0 48px');
								  jQuery('.searchResultInfo').css({'border-bottom':'none','margin':'3px 0 0 0', 'padding-bottom':'3px', 'padding-top':'0'}).show();
								break;				
					case 'straightDown':
								oItems.css({'border-bottom':'1px dotted gray', 'padding':'4px 2px 2px 0'}).find('.searchResultInfo').addClass('fleft').prev().addClass('fleft');
								oItems.animate({ 
									width: "98%",
									height: "140px",
									fontSize:'110%'
								  });
								  oItems.find('img.bradius5').animate({ 
									width: "114px"
								  }).prev().css('width','114px').parent().next().css('margin-top','-20px');
								  jQuery('.searchResultInfo .extendedinfo').fadeIn();
								  jQuery('.searchResultInfo').css({'border-left':'1px dotted gray','border-bottom':'none','padding-left':'12px'}).show().parent().css('width','60%').prev().css('width','40%');
								  oItems.find('.twolinestitle').hide();
								  oItems.find('.longtitle').show();
								  oItems.find('.thumbplay').css('margin','31px 0 0 45px');
								break;			
					  }
          $container.isotope( options, function(){
			 
			  
			  } );
			  
			   
        }
      }
      
} );
	{/literal}	
</script>	
{include file='header.tpl'}
{if $otheruser eq 'no'}
{/if}
<div class="clearfix mtop12 f80">
	<div class="well fleft w15">
		<ul class="nav nav-list mtop12">
		  <li><a href="#">What to Watch</a></li>	

		  <li><a href="#">Watch History</a></li>	

		  <li><a href="#">Search History</a></li>	

		  <li><a href="#">What is Hot!</a></li>	

		  <li><a href="#">My Subscriptions</a></li>	

		  <li><a href="#">My Alerts </a><span class="mleft6"><i class="icon-bell"></i> <span class="fontred">(0) New</span></span></li>	

		  <li>
			<a href="#">My Videos</a>
			<ul class="mtop6">
				<li class="active"><a href="#">Videos I Created</a></li>
				<li><a href="#">Videos I Shared</a></li>
				<li class="divider"></li>
				<li><a href="#">My Playlists</a></li>
				<li><a href="#">My 'Learn Later'</a></li>
				<li><a href="#">My Favourites</a></li>
				<li><a href="#">Videos I Like</a></li>
			</ul>
		  </li>

		  <li><a href="#">Comments</a></li>

		  <li><a href="#">Status Updates</a></li>

		  <li><a href="#">My Shigaru Friends</a></li>
		</ul>
	</div>   
	<div id="videosmaincontent" class="fleft clearfix pad12">
		<div class="clearfix">
			<div class="clearfix">
				<div class="fleft f15em fontbold">
					<h3>{$smarty.const._HWDVIDS_TITLE_YOURVIDS}</h3>
				</div>
				<div class="fright">
					<form class="">
						<label for="quick_links" class="sort-control-label">Quick Links:</label>
						<select class="quick_links" id="quick_links" name="quick_links">
							<option value="sortable_at" selected="selected">Share a video</option>
							<option value="username">Author</option>
							<option value="category">Category</option>
							<option value="average_rating">Rating</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</form>
				</div>
			</div>
			<div id="vidlistoptbar" class="clearfix mtop20">					
				<form class="fleft clearfix">
					<div class="fleft">
						<label for="sort_by" class="sort-control-label">Sort by:</label>
						<select class="sort_select" id="sort_by" name="sort_by"><option value="sortable_at" selected="selected">Date</option>
							<option value="username">Rating</option>
							<option value="category">Category</option>
							<option value="average_rating">Liked</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</div>	
					<!--<a href="#" class="fleft fontred pad6"><i class="icon-arrow-up icon-large fontblack"></i></a>
					<input class="icon-search mleft30 fleft" type="text" placeholder="Search your videos..."/>-->
					
				</form>
				<div class="w63 mtop2 fleft tcenter">{$pageNavigation}</div>
				<div id="options" class="clearfix fright">    
					<div class="btn-group" data-option-key="layoutMode">
					  <a class="btn active" href="#masonry" data-option-value="masonry" class="active"><i class="icon-th"></i></a>
					  <a class="btn" href="#cellsByRow" data-option-value="cellsByRow"><i class="icon-th-large"></i></a>
					  <a class="btn" href="#straightDown" data-option-value="straightDown"><i class="icon-th-list"></i></a>
					</div>
				</div> <!-- #options -->
		   </div>
		</div>
		
		<div id="resultcontainer">
			<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
		</div>
		<div id="vidlistoptbar" class="clearfix mtop20">
			<div class="w100 fleft tcenter">{$pageNavigation}</div>
		</div>	
	</div>
	<div class="fleft w15">
		
		<div class="mleft6 clearfix mtop20 mbot20">
			<div class="fontbold"><a class="mtop6 pad12 btn btn-primary fleft" href="{$uploadLink}"><i class="icon-share icon-4x fontblack"></i> <span class="icon-3x fontblack">Share a video</span></a></div>
		</div> 
		<div class="mleft6 clearfix">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1916456389191969";
			/* profile */
			google_ad_slot = "7689083467";
			google_ad_width = 160;
			google_ad_height = 600;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div> 
	</div> 
</div>	



