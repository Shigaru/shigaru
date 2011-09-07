<?php
//no direct access
defined('_JEXEC') or die('Restricted Access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$helper = new modTagCloudHelper($params->get('minWordLength'), $params->get('maxRowCount'));

$data = '';
//fetch all words from content
if ($params->get('articles'))
{
	$data .= $helper->getWords('content', '`title`, `introtext`, `fulltext`', '`state`=1');
}

//fetch all words from ccboard forums
if ($params->get('ccboard'))
{
	$data .= $helper->getWords('ccb_posts', '`post_subject`, `post_text`', '`hold`=0');
}

//fetch all words from content
if ($params->get('virtuemart'))
{
	$data .= $helper->getWords('vm_products', '`product_s_desc`, `product_desc`, `product_name`', '`publish`=Y');
}

//fetch all words from content
if ($params->get('jcomments'))
{
	$data .= $helper->getWords('jcomments', '`title`, `comment`', '`published`=1');
}

//fetch all k2Comments
if ($params->get('k2comments'))
{
	$data .= $helper->getWords('k2_comments', '`title`, `commentText`', '`published`=1');
}

//fetch all k2Content
if ($params->get('k2content'))
{
	$data .= $helper->getWords('k2_items', '`title`, `introtext`, `fulltext`', '`published`=1');
}

//The magic..
$realWordList = $helper->filterWords($data, $params->get('excludeList'));
$wordArray = $helper->parseString($realWordList, $params->get('tagCount'));

//output it all.
echo '<div class="tagCloud">';
$helper->outputWords($wordArray, $params->get('minSize'), $params->get('maxSize'));
echo '</div>';

//add the authors signature, don't delete this. Just disable it in extensions->module manager->Udjamaflip's Automated Tag Cloud module
if ($params->get('signature'))
{
	echo '<a href="http://www.udjamaflip.com" title="Joomla Tag Cloud developed by Andy Sharman at www.udjamaflip.com" style="display:block;" target="_blank"><small>Tag Cloud by Andy Sharman</small></a>';	
}