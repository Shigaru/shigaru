{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div class="roksearch_result_wrapper1 png">
	<div class="roksearch_result_wrapper2 png">
		<div class="roksearch_result_wrapper3 png">
			<div class="roksearch_result_wrapper4 png">
				<div class="{if $data->counter is even}roksearch_even {else }roksearch_odd{/if} png">
					<div class="searchResultThumb mtop12 mright12">
									{$data->thumbnail}	
									<span class="videotime"> {$data->duration} </span>			
									<div class="small"><span class="icon-user fontgreen">{$data->uploader}</div>
					</div>
					<div class="w50 fleft">
						<h3>{$data->title}</h3>
						
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
					

