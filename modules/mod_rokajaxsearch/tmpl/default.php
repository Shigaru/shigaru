<?php
/**
 * RokAjaxSearch Module
 *
 * @package RocketTheme
 * @version   2.2 June 13, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 *
 * Inspired on PixSearch Joomla! module by Henrik Hussfelt <henrik@pixpro.net>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$websearch = ($params->get('websearch', 0)) ? 1 : 0;
$blogsearch = ($params->get('blogsearch', 0)) ? 1 : 0;
$imagesearch = ($params->get('imagesearch', 0)) ? 1 : 0;
$videosearch = ($params->get('videosearch', 0)) ? 1 : 0;

$theme = $params->get('theme', 'blue');

$api = ($params->get('websearch_api') != '');

$app =& JFactory::getApplication();
$limit = $app->getUserStateFromRequest('com_search.limit', 'limit', $app->getCfg('list_limit'), 'int');

?>
<dl id="blue">
<form name="rokajaxsearch" id="rokajaxsearch" class="<?php echo $theme; ?>" action="<?php echo JURI::Base()?>" method="get">
<dt><div class="rokajaxsearch <?php echo $params->get('moduleclass_sfx'); ?>">
	<div class="roksearch-wrapper">
		<input id="roksearch_search_str" name="searchword" type="text" class="inputbox" value="<?php echo JText::_('SEARCH'); ?>" />
	</div>
	<input type="hidden" name="searchphrase" value="<?php echo $params->get("searchphrase")?>"/>
	<input type="hidden" name="limit" value="<?php echo $limit; ?>" />
	<input type="hidden" name="ordering" value="<?php echo $params->get("ordering")?>" />
	<input type="hidden" name="view" value="search" />
	<input type="hidden" name="Itemid" value="99999999" />
	<input type="hidden" name="option" value="com_search" />
	<input id="searchgo" class="button fnone" type="submit" onclick="this.form.rokajaxsearch.focus();" value="<?php echo JText::_('Go'); ?>" name="Submit">
	<?php if (($websearch || $blogsearch || $imagesearch || $videosearch) && $api): ?>
		<div class="search_options">
			<label style="float: left; margin-right: 8px">
					<input type="radio" name="search_option[]" value="local" checked="checked" /><?php echo JText::_('LOCAL_SEARCH'); ?>
			</label>
			
			<?php if ($websearch): ?>
			<label style="float: left;">
				<input type="radio" name="search_option[]" value="web" /><?php echo JText::_('WEB_SEARCH'); ?>
			</label>
			<?php endif; ?>
			
			<?php if ($blogsearch): ?>
			<label style="float: left;">
				<input type="radio" name="search_option[]" value="blog" /><?php echo JText::_('BLOG_SEARCH'); ?>
			</label>
			<?php endif; ?>
			
			<?php if ($imagesearch): ?>
			<label style="float: left;">
				<input type="radio" name="search_option[]" value="images" /><?php echo JText::_('IMAGE_SEARCH'); ?>
			</label>
			<?php endif; ?>
			
			<?php if ($videosearch): ?>
			<label style="float: left;">
				<input type="radio" name="search_option[]" value="videos" /><?php echo JText::_('VIDEO_SEARCH'); ?>
			</label>
			<?php endif; ?>
		</div>
		<div class="clr"></div>
	<?php endif; ?>

	<div id="roksearch_results"></div>
</div>
<div id="rokajaxsearch_tmp" style="visibility:hidden;display:none;"></div>
</form>
</dt>
<dd><?php echo JText::_('Recently searched >>'); ?> <?php echo $params->latestSearchs; ?></dd>
</dl>
