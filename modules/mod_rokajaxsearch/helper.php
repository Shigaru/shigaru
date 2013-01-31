<?php
/**
 * RokAjaxSearch Module
 *
 * @package RocketTheme
 * @subpackage rokajaxsearch
 * @version   2.2 June 13, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 *
 * Inspired on PixSearch Joomla! module by Henrik Hussfelt <henrik@pixpro.net>
 */

defined('_JEXEC') or die('Restricted access');
/**
 * @package RocketTheme
 * @subpackage rokajaxsearch
 */
class modRokajaxsearchHelper {
	function inizialize($css_style, $offset, &$params){
		global $mainframe;
		$theme = $params->get('theme', 'blue');
		
		JHTML::_('behavior.mootools');
		$doc =& JFactory::getDocument();
		
		$css = modRokajaxsearchHelper::getCSSPath('rokajaxsearch.css', 'mod_rokajaxsearch');
		$iebrowser = modRokajaxsearchHelper::getBrowser();
		$lastWords =  modRokajaxsearchHelper::getLatestSearchs();
		if($css_style == 1 && $css != false) {
			$doc->addStyleSheet($css);
			$doc->addStyleSheet(JURI::root(true) ."/modules/mod_rokajaxsearch/themes/$theme/rokajaxsearch-theme.css");
			
			if ($iebrowser) {
				$style = JURI::root(true) ."/modules/mod_rokajaxsearch/themes/$theme/rokajaxsearch-theme-ie$iebrowser";
				$check = dirname(__FILE__)."/themes/$theme/rokajaxsearch-theme-ie$iebrowser";

				if (file_exists($check.".css")) $doc->addStyleSheet($style.".css");
				elseif (file_exists($check.".php")) $doc->addStyleSheet($style.".php");
			}
			
		}
		
		
		
		
		
		
	}
	
	function getCSSPath($cssfile, $module) {
		global $mainframe;
		$tPath = 'templates/'.$mainframe->getTemplate().'/css/' . $cssfile . '-disabled';
		$bPath = 'modules/'.$module.'/css/' . $cssfile;
		$doc =& JFactory::getDocument();
		
		// If the template is asking for it, 
		// don't include default rokajaxsearch css
		if (!file_exists(JPATH_BASE.DS.$tPath)) {
			return JURI::root(true) .'/'.$bPath;
		} else {
			return false;
		}
	}
	
	function getBrowser() 
	{
		$agent = ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : false;
		$ie_version = false;
				
		if (preg_match("/msie/", $agent) && !preg_match("/opera/", $agent)){
            $val = explode(" ",stristr($agent, "msie"));
            $ver = explode(".", $val[1]);
			$ie_version = $ver[0];
			$ie_version = preg_replace("#[^0-9,.,a-z,A-Z]#", "", $ie_version);
		}
		
		return $ie_version;
	}
	
	function _getJSVersion() {
		if (version_compare(JVERSION, '1.5', '>=') && version_compare(JVERSION, '1.6', '<')){
			if (JPluginHelper::isEnabled('system', 'mtupgrade')){
				return "-mt1.2";
			} else {
				return "";
			}
		} else {
			return "";
		}
	}
	
	function getTotalVideosCount(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $hwdvs_joinv
					 . $where
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        modRokajaxsearchHelper::setLastVideoCount($total);
        return $total;
		}
	
	
	
	
	function setLastVideoCount($paramTotal){
		$session = & JFactory::getSession();
		$session->set('songcount', $paramTotal);
		}
	
	
	function getLatestSearchs() {
		$db = & JFactory::getDBO();
		$query = 'SELECT pattern FROM #__hwdvidssearchlog_term'; 
		$query .= ' WHERE 1';
		$query .= ' ORDER BY last_update DESC LIMIT 0,6';
		$db->setQuery($query);
		$db->loadObjectList();
		$wordList = $db->loadResultArray();
		$wordListFormat = '';
		$counter = 0;
		foreach ($wordList as &$value) {
			if($value!='' && $value!=' '){	
				if($counter === 0)
				$wordListFormat .= modRokajaxsearchHelper::getAnchor($value);
				else
					$wordListFormat .= ', '.modRokajaxsearchHelper::getAnchor($value);
			$counter++;
			}
		}
		return $wordListFormat;
		}
		
		function getAnchor($word) {
			$url ='';
				if(trim($word) != ''){	
					$url = JRoute::_("index.php?option=com_hwdvideoshare&task=search&Itemid=$Itemid");
					$url = str_replace("&amp;", "&", $url);

					$pos = strpos($url, "?");
					if ($pos === false)
					{
						$url = $url."?pattern=".$word;
					}
					else
					{
						$url = $url."&pattern=".$word;

					}
				}
			
			
				$searchLink = '<a href="'.$url.'&r='.rand().'" title="'.JText::_('View results for ').$word.'">'.$word.'</a>';
				return $searchLink ;
			}
	
}
