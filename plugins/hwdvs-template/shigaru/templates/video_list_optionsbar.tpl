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
<div class="vidlistpagination w63 f100 mtop2 fleft tcenter"></div>
<div id="options" class="clearfix fright">    
	<div class="btn-group" data-option-key="layoutMode">
	  <a class="btn active" href="#masonry" data-option-value="masonry" class="active"><i class="icon-th"></i></a>
	  <a class="btn" href="#cellsByRow" data-option-value="cellsByRow"><i class="icon-th-large"></i></a>
	  <a class="btn" href="#straightDown" data-option-value="straightDown"><i class="icon-th-list"></i></a>
	</div>
</div> <!-- #options -->
