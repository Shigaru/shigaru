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
	var $container = jQuery('#resultcontainer');
      
      
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
          columnWidth : 120
        },
        masonryHorizontal : {
          rowHeight: 120
        },
        cellsByRow : {
          columnWidth : 240,
          rowHeight : 240
        },
        cellsByColumn : {
          columnWidth : 240,
          rowHeight : 240
        }
      });
      
      
      // change layout
      var isHorizontal = false;
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
          $container.isotope( options );
        }
      }


      
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
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
} );
	{/literal}	
</script>	
{include file='header.tpl'}
{if $otheruser eq 'no'}
{/if}
<div class="clearfix mtop12">
	<div class="well fleft w20pc f90">
		<ul class="nav nav-list">
		  <li><a href="#">What to Watch</a></li>	
		  <li class="divider"></li>
		  <li><a href="#">Watch History</a></li>	
		  <li class="divider"></li>
		  <li><a href="#">Search History</a></li>	
		  <li class="divider"></li>
		  <li><a href="#">What is Hot!</a></li>	
		  <li class="divider"></li>
		  <li><a href="#">My Subscriptions</a></li>	
		  <li class="divider"></li>
		  <li><a href="#">My Alerts</a></li>	
		  <li class="divider"></li>
		  <li>
			<a href="#">My Videos</a>
			<ul class="padleft4">
				<li class="active"><a href="#">Videos I Created ({$total})</a></li>
				<li><a href="#">Videos I Shared ({$total})</a></li>
				<li class="divider"></li>
				<li><a href="#">My Playlists</a></li>
				<li><a href="#">My 'Learn Later' Videos</a></li>
				<li><a href="#">My Favourites</a></li>
				<li><a href="#">Videos I Like</a></li>
			</ul>
		  </li>
		  <li class="divider"></li>
		  <li><a href="#">Comments</a></li>
		  <li class="divider"></li>
		  <li><a href="#">Status Updates</a></li>
		  <li class="divider"></li>
		  <li><a href="#">My Shigaru Friends</a></li>
		</ul>
	</div>   
	<div class="fright clearfix w75">
		<div class="clearfix mbot12">
			<div class="fleft fontbold"><h3>{$smarty.const._HWDVIDS_TITLE_YOURVIDS}</h3></div>
			
			<div id="options" class="fright clearfix">    
				<div class="btn-group" data-option-key="layoutMode">
				  <a class="btn" href="#masonry" data-option-value="masonry" class="active"><i class="icon-th"></i></a>
				  <a class="btn" href="#cellsByRow" data-option-value="cellsByRow"><i class="icon-th-large"></i></a>
				  <a class="btn" href="#straightDown" data-option-value="straightDown"><i class="icon-th-list"></i></a>
				</div>
			</div> <!-- #options -->
			<form class="fright">
			  <div class="input-prepend mright12">
				<span class="add-on"><i class="icon-search"></i></span>
				<input class="span2" type="text" placeholder="Search your videos...">
			  </div>
			</form>	
			<form class="fright">
				<label for="sort_by" class="sort-control-label">Sort by:</label>
					<select class="sort_select" id="sort_by" name="sort_by"><option value="sortable_at" selected="selected">Date</option>
						<option value="username">Author</option>
						<option value="category">Category</option>
						<option value="average_rating">Rating</option>
						<option value="sales_count">Sales</option>
						<option value="cost">Price</option>
					</select>
				<a href="#" class="fontred pad6"><i class="icon-arrow-up icon-large"></i></a>
			</form>
		</div>
	  {if $print_videolist}
		<div id="resultcontainer" class="well">
		{foreach name=outer item=data from=$list}
		  {include file="video_list_full.tpl"}
		{/foreach}
		</div>
	  {else}
		<div class="padding">{$smarty.const._HWDVIDS_INFO_NUV}</div>
	  {/if}
	</div>
	
</div>	
<div align="center" class="mtop25">
  {$pageNavigation}
  </div>


