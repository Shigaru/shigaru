{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
{if $songorband eq 'song'}
{foreach name=outer item=data from=$results}
	{include file="bandsong_list_full.tpl"}
{/foreach}
{else}
{foreach name=outer item=data from=$results}
	{include file="bandsong_list_full_bands.tpl"}
{/foreach}
{/if}
