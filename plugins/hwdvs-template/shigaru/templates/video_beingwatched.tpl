{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{if $print_nowlist eq 2}

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_BWN}</h2>
  <center>
    {$bwn_modContent}
  </center>
</div>

{else}
		<script src="templates/rhuk_milkyway/js/cufon-yui.js" type="text/javascript"></script>
		<script src="templates/rhuk_milkyway/js/Bebas_400.font.js" type="text/javascript"></script>
		<script type="text/javascript" src="templates/rhuk_milkyway/jquery.easing.1.3.js"></script>
		{literal}
			<style type="text/css">
          span.reference a{
			text-shadow:1px 1px 1px #fff;
			color:#999;
			text-transform:uppercase;
            text-decoration:none;
            position:fixed;
            right:10px;
            top:10px;
            font-size:13px;
			font-weight:bold;
          }
          span.reference a:hover{
            color:#555;
          }
		  h1.title{
			  color:#777;
			  font-size:30px;
			  margin:10px;
			  font-weight:normal;
			  text-shadow:1px 1px 1px #fff;
			}
      </style>
      <script type="text/javascript">
			Cufon('.cn_wrapper h1,h2', {
				textShadow: '-1px 1px black'
			});
			
			window.setInterval(event, 5000);
			function event() {
			  /*if(((getCurrentIndex()+1(<jQuery(".cn_item").length) && ){
			  
			  }*/
			  if((getCurrentIndex()+1)<jQuery(".cn_item").length)
				jQuery(jQuery(".cn_item")[getCurrentIndex()+1]).trigger('click');
					else
						jQuery(jQuery(".cn_item")[0]).trigger('click');
			}
			
			function getCurrentIndex(){
				var _currentBeing = 0;
				jQuery(".cn_item").each(function(index,value){
					if(jQuery(this).hasClass('selected'))
						_currentBeing = index;
				});
				return _currentBeing;
			}
		</script>
		{/literal}
 <div id="whitebox">
				<div class="whiteboxHeader beingwatched">
						<div>
							<h6>
							{$smarty.const._HWDVIDS_BWN}
							</h6>
						</div>
				</div>
				<div class="cn_wrapper">
					<div id="cn_preview" class="cn_preview">
							{foreach name=outer key=k item=data from=$nowlist}
							<div class="cn_content"   {if $smarty.foreach.outer.index eq 0}style="top:5px;"{/if}>
									{$data->thumbnail}
									<h1>{$data->title}</h1>
									<span class="cn_date">{$data->rating}</span>
									<span class="cn_category">{$smarty.const._HWDVIDS_INFO_CATEGORY}: {$data->category}</span>
									<span class="cn_uploader">{$smarty.const._HWDVIDS_INFO_SHARED}{$data->uploader}</span>
									<p>{$data->descriptiontrunc}</p>
								</div>
							{/foreach}
							 </div>
							<div id="cn_list" class="cn_list">	
							   <div class="cn_page" style="display:block;">
								{foreach name=outer key=k item=data from=$nowlist}
									<div class="cn_item {if $smarty.foreach.outer.index eq 0}selected{/if}">
										<h2>{$data->titleplain}</h2>
									</div>
									{if ($smarty.foreach.outer.index+1) is div by 4 && $smarty.foreach.outer.index neq 0}
										</div>
										{if ($smarty.foreach.outer.index+1)  lt $smarty.foreach.outer.total}
										<div class="cn_page">
										{/if}
										
									{/if}
									{if ($smarty.foreach.outer.index+1) eq $smarty.foreach.outer.total}
										</div>
									{/if}
								{/foreach}
								<div class="cn_nav">
									<a id="cn_prev" class="cn_prev disabled"></a>
									<a id="cn_next" class="cn_next"></a>
								</div>
							 </div> 
					  
				</div>

					<div id="whitebox_b">
						<div id="whitebox_bl">
							<div id="whitebox_br"></div>
						</div>
					</div>
			</div>
	 	  
				
				
				
				
				
				
				
			

{/if}








 
