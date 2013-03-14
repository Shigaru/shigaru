<div class="clear"></div>
<div id="beingwatched" class="workarea">
	<div class="workarea_odd">
		<div class="workarea_wrapper">
			<div class="content_box">
				<h3 class="mbot12">{$smarty.const._HWDVIDS_BWN}</h3>
				<div class="beingwatched_header">
					<div>
							<ul>
								{foreach name=outer key=k item=data from=$nowlist}
								{if ($smarty.foreach.outer.iteration is div by 6 and ($smarty.foreach.outer.iteration) neq $smarty.foreach.outer.total) or $smarty.foreach.outer.index eq 0}
									{if $smarty.foreach.outer.index neq 0}
										<li><a title="Click to see page {$smarty.foreach.outer.iteration/5+1}" href="#being{$smarty.foreach.outer.index}">{$smarty.foreach.outer.iteration/5+1}</a></li>
									{else}
										<li class="selected"><a title="Click to see the first page" href="#being{$smarty.foreach.outer.index}">1</a></li>
									{/if}	
								{/if}	
								{/foreach}
							</ul>
							<div class="clear"></div>				
						</div>
				</div>
				
				<div class="slidesWrapper">					
					<div id="being0" class="tab_wrapper ajaxload">
						<ul id="beingwatched" class="being">
					{foreach name=outer key=k item=data from=$nowlist}
							<li>
								
								{$data->thumbnail}
								{$data->title}
								<span class="viduploader">{$smarty.const._HWDVIDS_INFO_SHARED}{$data->uploader}</span>								
							</li>
						{if ($smarty.foreach.outer.iteration is div by 6 or ($smarty.foreach.outer.iteration) eq $smarty.foreach.outer.total) and $smarty.foreach.outer.index neq 0}	
							</ul>
							</div>
							{if ($smarty.foreach.outer.index+1) neq $smarty.foreach.outer.total}	
								<div id="being{$smarty.foreach.outer.index}" class="tab_wrapper">
								<ul>
							{/if}
						{/if}	
					{/foreach}
					</ul>
					</div>
				</div>
					
			</div>	
		</div>
	</div>	
</div>
				





 
