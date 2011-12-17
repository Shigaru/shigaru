{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

<div id="hwdvids">
  <div class="standard">
    
    <div id="hwdvs_player_container{$random}"><div class="padding">{$video_player}</div></div>

    {if $print_extended}

    {literal}
    <script type='text/javascript'>window.addEvent('domready', function(){ hwdvs_insert_playlist_video({/literal}{$vid}{literal}) });</script>
    {/literal}

    {foreach name=outer item=data from=$list}
      <div style="float:left;">
    {include file="mod_hwd_vs_list.tpl"}
      </div>
    {/foreach}
    <div style="clear:both;"></div>

    {/if}
    
  </div>    
</div>
