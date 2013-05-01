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
        jQuery.ajax({
            url: oListUrl
        }).done(function (data) {
			jQuery('#resultcontainer').hide().html(data).fadeIn();
			jQuery(".loadingcontent").hide();
            initVideoList();
        })
	
	function initVideoList(){
		
      // add randomish size classes
      $container.find('.resultelement').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
      
      $container.isotope({
        itemSelector : '.resultelement',
        masonry : {
          columnWidth : 238
        },
        masonryHorizontal : {
          rowHeight: 120
        },
        cellsByRow : {
          columnWidth : 330,
          rowHeight: 225
        }
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
		   oItems.find('.searchResultInfo').hide().css({'margin-top':'0','border-left':'none','padding':'0'}).parent().css('width','100%').prev().css('width','100%');
		   oItems.css({'width': "218px",'height':'140px',fontSize:'100%','padding':'4px 0 0 0','border':'none'});
		   oItems.find('img.bradius5').css({width: "87px"}).prev().css('width','87px');;
		   jQuery('.searchResultInfo .extendedinfo').hide();
		   switch(options.layoutMode){
					case 'masonry':
								oItems.css('border-bottom','1px dotted gray');
								oItems.find('.searchResultInfo').hide();
								break;
					case 'cellsByRow':
								oItems.css('border-bottom','none').animate({ 
									width: "300px",
									height: "207px",
									fontSize:'100%'
								  });
								  oItems.find('img.bradius5').animate({ 
									width: "120px"
								  }).prev().css('width','120px').parent().next().css('margin-top','-20px');
								  jQuery('.searchResultInfo').css({'margin-top':'6px','border-bottom':'1px dotted gray', 'padding-bottom':'12px', 'padding-top':'0'}).show();
								break;				
					case 'straightDown':
								oItems.css({'height':'130px','border-bottom':'1px dotted gray', 'padding-bottom':'2px', 'padding-top':'4px'}).find('.searchResultInfo').addClass('fleft').prev().addClass('fleft');
								oItems.animate({ 
									width: "100%",
									fontSize:'110%'
								  });
								  oItems.find('img.bradius5').animate({ 
									width: "116px"
								  }).prev().css('width','116px').parent().next().css('margin-top','-20px');
								  jQuery('.searchResultInfo .extendedinfo').fadeIn();
								  jQuery('.searchResultInfo').css({'border-left':'1px dotted gray','border-bottom':'none','padding-left':'12px'}).show().parent().css('width','60%').prev().css('width','40%');
								  oItems.find('.twolinestitle').hide();
								  oItems.find('.longtitle').show();
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
							<option value="username">Author</option>
							<option value="category">Category</option>
							<option value="average_rating">Rating</option>
							<option value="sales_count">Sales</option>
							<option value="cost">Price</option>
						</select>
					</div>	
					<!--<a href="#" class="fleft fontred pad6"><i class="icon-arrow-up icon-large fontblack"></i></a>
					<input class="icon-search mleft30 fleft" type="text" placeholder="Search your videos..."/>-->
					
				</form>
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
	</div>
	<div class="fleft w15">
		<div class="mleft6">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1916456389191969";
			/* profile */
			google_ad_slot = "2073720662";
			google_ad_width = 120;
			google_ad_height = 240;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		<div class="well">
			<ul class="nav nav-list mtop12">
			  <li><a href="#">What to Watch</a></li>	
	
			  <li><a href="#">Watch History</a></li>	
	
			  <li><a href="#">Search History</a></li>	
	
			  <li><a href="#">What is Hot!</a></li>	
	
			  <li><a href="#">My Subscriptions</a></li>	
	
			  <li><a href="#">My Alerts</a></li>	
	
			  <li>
				<a href="#">My Videos</a>
				<ul class="mtop6">
					<li class="active"><a href="#">Videos I Created ({$total})</a></li>
					<li><a href="#">Videos I Shared ({$total})</a></li>
					<li class="divider"></li>
					<li><a href="#">My Playlists</a></li>
					<li><a href="#">My 'Learn Later' Videos</a></li>
					<li><a href="#">My Favourites</a></li>
					<li><a href="#">Videos I Like</a></li>
				</ul>
			  </li>
	
			  <li><a href="#">Comments</a></li>
	
			  <li><a href="#">Status Updates</a></li>
	
			  <li><a href="#">My Shigaru Friends</a></li>
			</ul>
		</div> 
	</div> 
</div>	



