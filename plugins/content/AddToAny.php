<?php
/**
* @author Bill Smith (www.tonystoolshed.com, toolmaster[at]tonystoolshed.com)
* This plugin will add an "addtoany" button to your pages for 
* social bookmarking.
* version 1.5
* @license GNU/GPLv2
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.event.plugin');


class plgContentAddToAny extends JPlugin
{
  
	// Constructor
	function plgContentAddToAny( &$subject, $params )
	{
		parent::__construct( $subject, $params );
		global $mainframe;
		$plugin =& JPluginHelper::getPlugin('content', 'AddToAny');
		$pluginParams = new JParameter( $plugin->params );
		$cssflag = $pluginParams->def('addtoany_customcssflag', 0);
		$cssvalue = $pluginParams->def('addtoany_customcssvalue', 0);

		$css = "<style type=\"text/css\">" . " .a2a_dd img {border:0; } ";
		// add custom css to header if set
		if ($cssflag && !empty($cssvalue))
			$css .= $cssvalue;
	     	$css .= "</style>";
		$mainframe->addCustomHeadTag($css);

	}

	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;

		$document =& JFactory::getDocument();
		$plugin =& JPluginHelper::getPlugin('content', 'AddToAny');
		$pluginParams = new JParameter( $plugin->params );
		$buttonStyle = $pluginParams->def('addtoany_buttonname', 0);
		$hoverStyle = $pluginParams->def('addtoany_hover', 0);
		#$target = $pluginParams->def('addtoany_target', 0);

		$mainColor = $pluginParams->def('addtoany_colormain', 0);
		$bgColor = $pluginParams->def('addtoany_colorbg', 0);
		$borderColor = $pluginParams->def('addtoany_colorborder', 0);
		$linkColor = $pluginParams->def('addtoany_colorlink', 0);
		$hoverColor = $pluginParams->def('addtoany_colorhover', 0);

		$location = $pluginParams->def('addtoany_location', 0);
		$customTag = $pluginParams->def('addtoany_customtag', 0);
		$showintro = $pluginParams->def('addtoany_intro', 0);
		$showfront = $pluginParams->def('addtoany_frontpage', 0);
		$showInSection = $pluginParams->def('addtoany_showinsec', 0);
		$showInCategory = $pluginParams->def('addtoany_showincat', 0);
		$sectionSkipString = $pluginParams->def('addtoany_section_skip', 0);
		$categorySkipString = $pluginParams->def('addtoany_category_skip', 0);
		$articleSkipString = $pluginParams->def('addtoany_article_skip', 0);

		$cssflag = $pluginParams->def('addtoany_customcssflag', 0);
		$cssvalue = $pluginParams->def('addtoany_customcssvalue', 0);

		$showCredit = $pluginParams->def('addtoany_credit', 0);

		// get value of view variable
		$currentPage = JRequest :: getVar('view');

		// 1.3 - this is used in several loop so put up here
		$sectionSkipString = trim($sectionSkipString);
		$sectionSkipString = str_replace(" ", "", $sectionSkipString);
		$sectionSkipArray = explode(',', $sectionSkipString);
		$categorySkipString = trim($categorySkipString);
		$categorySkipString = str_replace(" ", "", $categorySkipString);
		$categorySkipArray = explode(',', $categorySkipString);
		$articleSkipString = trim($articleSkipString);
		$articleSkipString = str_replace(" ", "", $articleSkipString);
		$articleSkipArray = explode(',', $articleSkipString);
		if (JString::strlen(strip_tags($article->fulltext)) !='0')
			$isPartial = "true";
		else
			$isPartial = NULL;

		// see if this is the front page
		if ($currentPage == "frontpage")
		{
			if ($showfront == '0')
				$showButton = "1";
			if ($isPartial && $showintro != "1")
				$showButton = "";
		}
		elseif ($currentPage == "section" && $showInSection != "0" && !empty($article->sectionid))
		{
			// see if this section should be skipped
			if (!empty($sectionSkipString))
			{
				if (!in_array($article->sectionid, $sectionSkipArray))
					$showButton = "1";
			}
			else
				$showButton = "1";
			if ($isPartial && $showintro != "1")
				$showButton = "";
		}
		elseif ($currentPage == "category" && $showInCategory != "0" && !empty($article->catid))
		{
			// see if this category should be skipped
			if (!empty($categorySkipString) || !empty($sectionSkipString))
			{
				// also need to make sure parent section
				// is not being skipped
				if (!in_array($article->catid, $categorySkipArray) && !in_array($article->sectionid, $sectionSkipArray))
					$showButton = "1";
			}
			else
				$showButton = "1";
			if ($isPartial && $showintro != "1")
				$showButton = "";
		}
		elseif ($currentPage == "article")
		{
			// see if this article should be skipped
			if (!empty($articleSkipString) || !empty($categorySkipString) || !empty($sectionSkipString))
			{
				if (!in_array($article->catid, $categorySkipArray) && !in_array($article->sectionid, $sectionSkipArray) && !in_array($article->id, $articleSkipArray))
					$showButton = "1";
			}
			else
			{
				$showButton = "1";
			}
			// do not use under articles as it will cause
			// button not to appear - assume article means
			// you have full content
			#if ($isPartial && $showintro != "1")
				#$showButton = "";
		}
		// must be some other kind of page, don't show
		else
			$showButton = "";

		if ($showButton)
		{
			#if ($cssflag && !empty($cssvalue))
				#// wrap div tag around link
				$link = "<div class=\"addtoany\">";
			#else
				// reset string value
				#$link = "";

			// create button
			// 10/24/09 - v 1.4
			// onmouseover and onmouseout are no longer needed
			#$link .=  "<a class=\"a2a_dd\" onmouseover=\"a2a_show_dropdown(this)\" onmouseout=\"a2a_onMouseOut_delay()\" href=\"http://www.addtoany.com/share_save?linkname=";
			$link .=  "<a class=\"a2a_dd\" href=\"http://www.addtoany.com/share_save?linkname=";
			$link .= rawurlencode(utf8_encode($article->title));
			$link .= "&amp;linkurl=";
			$link .= rawurlencode(utf8_encode($this->plgGetPageUrl($article)));
			$link .= "\"";
	
			// open in new window, or not
			#if ($target == '0')
			// always opening in new window now
				$link .= " target=\"_blank\"";
	
			// close <a> tag
			$link .= ">";
	
			// set button image to use
			if ($buttonStyle == "1")
				$link .= "<img src=\"plugins/content/addtoany_images/share_save_120_16.gif\" width=\"120\" height=\"16\" alt=\"Share/Save/Bookmark\"/>";
			elseif ($buttonStyle == "2")
				$link .= "<img src=\"plugins/content/addtoany_images/share_save_256_24.gif\" width=\"256\" height=\"24\" alt=\"Share/Save/Bookmark\"/>";
			elseif ($buttonStyle == "3")
				$link .= "<img src=\"plugins/content/addtoany_images/favicon.png\" width=\"16\" height=\"16\" alt=\"Share/Save/Bookmark\"/>";
			elseif ($buttonStyle == "4")
				$link .= "Save &amp; Share";
			elseif ($buttonStyle == "5" && $customTag)
				$link .= $customTag;
			elseif ($buttonStyle == "6")
				$link .= "<img src=\"plugins/content/addtoany_images/share_save_171_16.png\" width=\"171\" height=\"16\" alt=\"Share/Save/Bookmark\"/>";
			elseif ($buttonStyle == "7")
				$link .= "<img src=\"plugins/content/addtoany_images/share_save_256_24.png\" width=\"256\" height=\"24\" alt=\"Share/Save/Bookmark\"/>";
			else
				$link .= "<img src=\"plugins/content/addtoany_images/share_save_171_16.gif\" width=\"171\" height=\"16\" alt=\"Share/Save/Bookmark\"/>";
	
			$link .= "</a>";
			$link .= "<script type=\"text/javascript\">";
			$link .= "a2a_linkname=";
			#$link .= "document.title";
			// use article title, not current page
			$theTitle = addslashes($article->title);
			$link .= "\"" . $theTitle . "\"";
			$link .= ";";
			$link .= "a2a_linkurl=\"";
			#$link .= $this->plgGetPageUrl($article);
			// for this link, replace &amp; with &
			$thisUrl = $this->plgGetPageUrl($article);
			$thisUrl = str_replace("&amp;", "&", $thisUrl);
			$link .= $thisUrl;
			$link .= "\"; ";

			// add custom colors, if any
			if (!empty($mainColor))
			{
				$mainColor = str_replace("#", "", $mainColor);
				$link .= "a2a_color_main=\"$mainColor\";";
			}
			if (!empty($bgColor))
			{
				$bgColor = str_replace("#", "", $bgColor);
				$link .= "a2a_color_bg=\"$bgColor\";";
			}
			if (!empty($borderColor))
			{
				$borderColor = str_replace("#", "", $borderColor);
				$link .= "a2a_color_border=\"$borderColor\";";
			}
			if (!empty($linkColor))
			{
				$linkColor = str_replace("#", "", $linkColor);
				$link .= "a2a_color_link_text=\"$linkColor\";";
			}
			if (!empty($hoverColor))
			{
				$hoverColor = str_replace("#", "", $hoverColor);
				$link .= "a2a_color_link_text_hover=\"$hoverColor\";";
			}
			if (!empty($hoverStyle))
				$link .= "a2a_onclick=\"1\";";

			$link .= "</script>";
			$link .= "<script type=\"text/javascript\" src=\"http://static.addtoany.com/menu/page.js\"></script>";

			// show credit button - default is off
			if ($showCredit == "1")
			{
				$link .= "&nbsp;&nbsp;<a class=\"a2a_dd\" href=\"http://www.tonystoolshed.com\" target=\"_blank\"><img src=\"plugins/content/addtoany_images/tt_icon.png\" width=\"16\" height=\"16\" alt=\"Free Joomla Plugin Courtesy of Tony's Toolshed\"></a>";
			}

			#if ($cssflag && !empty($cssvalue))
				// close div tag
				$link .= "</div>";

			// add button to page
			if ($location == 1)
				$article->text = $link . $article->text;
			else
				$article->text = $article->text . $link;
		}
	}

	function plgGetPageUrl(&$obj)
	{
	
		if (!is_null($obj)) 
		{
			require_once( JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php' );
			$url = JRoute::_(ContentHelperRoute::getArticleRoute($obj->slug, $obj->catslug, $obj->sectionid));
			$uri =& JURI::getInstance();
      			$base  = $uri->toString( array('scheme', 'host', 'port'));
			$url = $base . $url;
			$url = JRoute::_($url, true, 0);
			return $url;
		}
	}
}
