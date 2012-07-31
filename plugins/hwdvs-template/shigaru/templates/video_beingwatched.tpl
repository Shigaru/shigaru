<div class="clear"></div>
<div id="beingwatched" class="workarea">
	<div class="workarea_odd">
		<div class="workarea_wrapper">
			<div class="content_box">
				<h3>{$smarty.const._HWDVIDS_BWN}</h3>
				<div class="beingwatched_header">
				</div>
				
				<div class="slidesWrapper">
					<div id="slide0" class="tab_wrapper">
						<ul>
					{foreach name=outer key=k item=data from=$nowlist}
					{$smarty.foreach.outer.total}
							<li>
								<span class="thumbplay"></span>
								{$data->thumbnail}
								{$data->title}
								<span>{$smarty.const._HWDVIDS_INFO_SHARED}{$data->uploader}</span>								
							</li>
						{if $smarty.foreach.outer.index is div by 5 or ($smarty.foreach.outer.index+1) eq $smarty.foreach.outer.total}	
						</ul>
						</div>
						<div id="slide{$smarty.foreach.outer.index}" class="tab_wrapper">
						<ul>
						{/if}	
					{/foreach}
					</ul>
					</div>
				</div>	
			</div>	
		</div>
	</div>	
</div>
				





 
