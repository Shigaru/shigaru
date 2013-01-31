{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="buttonbar">
			<a href="#" title="Click on the icon to close this window" class="fright"><i class="icon-remove-circle"></i></a>
			<h4 class="fleft"><i class="icon-beer f120 pad6"></i>New video added, cheers!</h4>
			<div class="clear"></div>
			<div class="fleft thumb">{$data->thumbnail}<span class="videotime"> {$data->duration} </span></div>
			<div class="fleft">{$data->title}</div>
			<div class="plays">
				<div class="fright">
					<span>{$data->avatar}{$data->uploader}</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
</div>

