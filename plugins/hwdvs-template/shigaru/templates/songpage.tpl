{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script>
	var bandId 			= "{$band->bandid}";
	var bandName		= "{$band->band_name}";
	var searchoption 	= "{$band->source}";
	var oSearchParams = {literal}{
		ordering:'date_uploaded',
		filtering:null,
		currentUrl:'{/literal}{$pageURL}'
	};
</script>
<div class="workarea">
	<div class="workarea_wrapper clearfix mbot30">
		<div class="fleft">
			<img width="200" height="200" src="{$song->album_thumb}" />
		</div>
		<div class="mleft20 fleft">
			<div>
				<h3 class="fontbold f150">{$song->songname}</h3>
			</div>
			<div>
				<a href="" alt=""><span class="f150">{$song->band_name}</span></a>
			</div>	
			<div>
				<a href="" alt=""><span class="f90">{$song->album_name}</span></a>
			</div>	
			<div>
				<div><h5>{$smarty.const._HWDVIDS_SHIGARU_RELATEDVIDEOS}</h5></div>
			<div>
		</div>
	<div>
<div>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/bandpage.js"></script>
<script type="text/javascript" src="{$domain}/templates/rhuk_milkyway/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.js"></script>
