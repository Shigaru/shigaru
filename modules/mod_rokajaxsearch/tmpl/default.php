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
$uploadUrl =  JRoute::_("index.php?option=com_hwdvideoshare&task=upload");
$theme = $params->get('theme', 'blue');

$api = ($params->get('websearch_api') != '');

$app =& JFactory::getApplication();
$limit = $app->getUserStateFromRequest('com_search.limit', 'limit', $app->getCfg('list_limit'), 'int');

?>
<div class="clearfix upper">
	<div class="rokajaxsearch fleft w40">
		<form name="rokajaxsearch" id="rokajaxsearch" class="<?php echo $theme; ?>" action="index.php?option=com_hwdvideoshare&task=search" method="get">
			<div class="roksearch-wrapper">
				<input id="roksearch_search_str" name="pattern" type="text" placeholder="Search bands, songs, genres, instruments..." class="inputbox search"  />
			</div>
			<input type="hidden" name="limit" value="<?php echo $limit; ?>" />
			<input type="hidden" name="task" value="search" />
			<input type="hidden" name="Itemid" value="28" />
			<input type="hidden" name="option" value="com_hwdvideoshare" />
		</form>
	</div>
	<div class="fright clearfix w50">
		<div class="fleft clearfix w30 tright">
			<div class="clearfix">
					<div class="profileoptions btn-group close f80 pad12 fright">
					  <a class="btn" href="#"><i class="icon-cog fontblack"></i> <span class="fontblack">Quick Links</span></a>
					  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="icon-caret-down fontblack"></span></a>
						<ul class="dropdown-menu" style="display: none;">
							<li><a href="#" title="View your own profile">10 Reasons to sign up</a></li>
							<li><a href="#" title="View your own profile">Share a video</a></li>
							<li><a href="#" title="View your own profile">10 Reasons to sign up</a></li>
							<li><a href="#" title="View your own profile">10 Reasons to sign up</a></li>
						</ul>
					</div>
				</div>
			<div class="fontbold clearfix padright12">
				<a class="btn btn-primary fright icon-2x" title="'.JText::_('Click on this link to upload a video!').'" href="<?php echo $uploadUrl ?>">
					<i class="fontblack icon-share"></i> <span class="fontblack"> Share a video</span>
				</a>
			</div>					
		</div>
		<div class="fright w60">
			<div class="clearfix">
				<div id="statistics">Site Statistics</div>
				<div class="f90 bradius5 clearfix">
					<div class="fleft f120 w40">
						<div class="fontbold f110 mtop6">Total Videos:</div>
						<div class="fontorange fontbold f120 w80pc tright"><?php echo $params->totalCount; ?></div>
					</div>	
					<div class="fright padright12 clearfix w45">	
						<div class="clearfix">
							<div class="w60 tleft fleft">Song Tutorials:</div>
							<div class="fontorange fontbold w30 tright fleft"><?php echo $params->songCount; ?></div>
						</div>
						<div class="clearfix">
							<div class="w60 tleft fleft">Theory:</div>
							<div class="fontorange fontbold w30 tright fleft"><?php echo $params->theoryCount; ?></div>
						</div>
						<div class="clearfix">
							<div class="w60 tleft fleft">Instruments:</div>
							<div class="fontorange fontbold w30 tright fleft"><?php echo $params->watchmeCount; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<div id="nav_browse_search_recently" class="clearfix tcenter bbwhite">
		<div>	
			<a class="fontbold padright12 borrightdottedgrey" href="#" title="Click on this link to Browse A-Z Artits">Browse A-Z Artits</a>
			<a class="fontbold padleft4 padright12 borrightdottedgrey" href="#" title="Click on this link to Browse A-Z Songs">Browse A-Z Songs</a>
			<span class="padleft4"><?php echo JText::_('Recently searched >>'); ?></span> <?php echo $params->latestSearchs; ?>
		</div>
	</div>

