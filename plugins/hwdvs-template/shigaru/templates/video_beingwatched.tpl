<div class="clear"></div>
<div id="beingwatched" class="workarea">
	<div class="workarea_odd">
		<div class="workarea_wrapper">
			<div class="content_box">
				<h3>{$smarty.const._HWDVIDS_BWN}</h3>
				<div class="beingwatched_header">
				</div>
				<div class="slidesWrapper">
					<div id="one" class="tab_wrapper">
						<ul>
							{foreach name=outer key=k item=data from=$nowlist}
							<li>
								<span class="thumbplay"></span>
								{$data->thumbnail}
								{$data->title}
								<span>{$smarty.const._HWDVIDS_INFO_SHARED}{$data->uploader}</span>
								{$data->rating}
							</li>
							{/foreach}
						</ul>
					</div>	
				</div>	
			</div>	
		</div>
	</div>	
</div>
				





 
