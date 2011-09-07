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

<div class="standard">
  <h2>{$smarty.const._HWDVIDS_BWN}</h2>
  <center>
    <div id="{$iCID}">
      <ul id="{$iCID}_content" class="jcarousel-skin-tango">  
        {foreach name=outer item=data from=$nowlist}
        <li>
                {$data->thumbnail}
                <div class="desc {$iCID}_item">
                    
                </div>
        </li>
        {/foreach}
      </ul>  
    </div> 
  </center>
</div>

{/if}








 
