<?php
/**
 *    @version [ Nightly Build ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2011 Highwood Design
 *    @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 ***
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * This class is the HTML generator for hwdVideoShare frontend
 *
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
class hwd_vs_html
{
    /**
     *
     */
    function frontpage($featured_file, $rowsNbwType)
    {
		global $Itemid, $smartyvs, $hwdvsTemplateOverride, $limit, $limitstart, $j15, $j16;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();
		$app = & JFactory::getApplication();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		if ($limitstart > 0)
		{
			$pageNumber = intval(($limitstart/$c->vpp) + 1);
			if ($pageNumber > 1)
			{
				$metatitle.= " - ".JText::_('PAGE')." $pageNumber";
			}
		}

		// set the page/meta title
		$doc->setTitle( $metatitle );
		$doc->setMetaData( 'title' , $metatitle );
	
		// define javascript
		hwd_vs_javascript::confirmdelete();

		
		
		$smartyvs->assign("print_featured", 1);
		hwd_vs_tools::logViewing($featured_file[0]->id);
		$featured_video_player = hwd_vs_tools::generateVideoPlayer($featured_file[0], "100%", $c->fvid_h);
		$smartyvs->assign("featured_video_details", hwd_vs_tools::generateVideoDetails($featured_file[0], null, null, null, $Itemid, null, null));
		$smartyvs->assign("featured_video_player", $featured_video_player);
		$meta_description = hwd_vs_tools::generateMetaText($featured_file[0]->description);
		$meta_tags = hwd_vs_tools::generateMetaText($featured_file[0]->tags);

		// set the page/meta title
		$doc->setMetaData( 'description' , $meta_description );
		$doc->setMetaData( 'keywords' , $meta_tags );


		if (isset($hwdvsTemplateOverride['thumbWidth6'])) {
			$thumbwidth = $hwdvsTemplateOverride['thumbWidth6'];
		} else {
			$thumbwidth = null;
		}
		$smartyvs->assign( "featured_link" , JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=featuredvideos") );
		$smartyvs->assign( "print_featured_player", $c->feat_show );

		// link to thn reasons
		
		jimport( 'joomla.methods' ); 
		$tenreasonstext = JText::_('10 reasons to join!');
		$tenreasonstemp = 'index.php?option=com_content&id=56';
		$tenreasonsurl = JRoute::_($tenreasonstemp);
		$smartyvs->assign("tenreasonstext", $tenreasonstext);
		$smartyvs->assign("tenreasonsurl", $tenreasonsurl);
		$shiggymemberssurl = $live_path . "modules/mod_zncbmembers/tmpl/js/shiggymembers.js";
		$smartyvs->assign("shiggymemberssurl", $shiggymemberssurl);
		$doc->addStyleSheet(JURI::base(true) . '/' . "modules/mod_zncbmembers/tmpl/css/default.css", 'text/css');
		$smartyvs->display('index.tpl');
		return;
    }
    
    
    /**
     *
     */
    function songpage($song)
    {
		global $Itemid, $smartyvs;	
		$smartyvs->assign("song", $song[0]);
		$lang = JFactory::getLanguage();
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		$domain = JURI::root();
	    $smartyvs->assign("domain", $domain);
	    $smartyvs->assign("bandurl", JRoute::_('index.php?option=com_hwdvideoshare&task=searchbyoption&searchoption=cbandsssource&item_id='.$song[0]->bandid.'&lang='.substr($lang->getTag(),0,2)));
	    $smartyvs->assign("albumurl", JRoute::_('index.php?option=com_hwdvideoshare&task=searchbyoption&searchoption=dalbumssource&item_id='.$song[0]->albumid.'&lang='.substr($lang->getTag(),0,2)));
		$smartyvs->display('songpage.tpl');
		
		return;
    }
    
    /**
     *
     */
    function bandpage($band)
    {
		global $Itemid, $smartyvs;
		$smartyvs->assign("band", $band[0]);
		$smartyvs->assign("songs", $band);
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		$domain = JURI::root();
	    $smartyvs->assign("domain", $domain);
		$smartyvs->display('bandpage.tpl');
		return;
    }
    
    /**
     *
     */
    function atoz($counts)
    {
		global $Itemid, $smartyvs;
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$lang = JFactory::getLanguage();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		$domain = JURI::root();
	    $smartyvs->assign("domain", $domain);
	    $smartyvs->assign("songorband", 'song');
	    $smartyvs->assign("totalbands", $counts[0]);
	    $smartyvs->assign("totalsongs", $counts[1]);
	    $smartyvs->assign("bandsurl", JRoute::_('index.php?option=com_hwdvideoshare&task=atozbands&lang='.substr($lang->getTag(),0,2)));
	    $smartyvs->assign("songsurl", JRoute::_('index.php?option=com_hwdvideoshare&task=atoz&lang='.substr($lang->getTag(),0,2)));
		$smartyvs->display('atoz.tpl');
		return;
    }
    
    /**
     *
     */
    function atozbands($counts)
    {
		global $Itemid, $smartyvs;
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$lang = JFactory::getLanguage();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		$domain = JURI::root();
	    $smartyvs->assign("domain", $domain);
	    $smartyvs->assign("songorband", 'band');
	    $smartyvs->assign("totalbands", $counts[0]);
	    $smartyvs->assign("totalsongs", $counts[1]);
	    $smartyvs->assign("bandsurl", JRoute::_('index.php?option=com_hwdvideoshare&task=atozbands&lang='.substr($lang->getTag(),0,2)));
	    $smartyvs->assign("songsurl", JRoute::_('index.php?option=com_hwdvideoshare&task=atoz&lang='.substr($lang->getTag(),0,2)));
		$smartyvs->display('atoz.tpl');
		return;
    }
    
    /**
     *
     */
    function albumpage($album)
    {
		global $Itemid, $smartyvs, $hwdvsTemplateOverride;	
		$lang = JFactory::getLanguage();
		$smartyvs->assign("album", $album[0]);
		$smartyvs->assign("songs", $album);
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		$songIds = array();
		for($j = 0;$j<count($album);$j++){
			$songIds[]=$album[$j]->songid;
			}
		$videosAlbum = hwd_vs_tools::getVideosBySongs($songIds);
		$matchingvids = hwd_vs_tools::generateVideoListFromSql($videosAlbum, null, '133');
		$domain = JURI::root();
		$smartyvs->assign("bandurl", JRoute::_('index.php?option=com_hwdvideoshare&lang=en&task=searchbyoption&searchoption=cbandsssource&item_id='.$album[0]->bandid.'&lang='.substr($lang->getTag(),0,2)));
	    $smartyvs->assign("domain", $domain);
	    $smartyvs->assign("videosAlbum", $matchingvids);
		$smartyvs->display('albumpage.tpl');
		return;
    }
    
    
    /**
     *
     */
    function search($totalvids, $matchingvids, $videoNav, $totalgroups, $matchinggroups, $groupNav, $searchterm, $category_id=0,$timetaken=0,$isAjax='no',$searchtype='videos',$fromtop=0)
    {
		global $Itemid, $smartyvs, $hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();

	    $domain = JURI::root();
	    $smartyvs->assign("domain", $domain);
		$smartyvs->assign("searchterm", $searchterm);
		$smartyvs->assign("totalvideos", $totalvids);
		$smartyvs->assign("timetaken", $timetaken);
		$levelsCombo = hwd_vs_tools::generateVideoCombos('id as a, label as b','hwdvidslevels','id','level_id',true,false,true);
		$instrumentsCombo = hwd_vs_tools::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','instrument','intrument_id',true,true,true);				
		$languagesCombo = hwd_vs_tools::generateVideoCombos('id, iso_code as a, literalkey as b','hwdvidslanguages','id','language_id',true,true,true);
		$genresCombo = hwd_vs_tools::generateVideoCombos('id as a, genre as b','hwdvidsgenres','genre','genre_id',true,true,true);	
		$languagesspoken = hwd_vs_tools::generateVideoCombos('id, iso_code as a, literalkey as b','hwdvidslanguages','id','languagesspoken',true,true,true);
		$countries = hwd_vs_tools::generateVideoCombos('id as a, literalkey as b','countries','id','countries',true,true,true);
		$instrumentsPlay = hwd_vs_tools::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','instrument','intrumentplays',true,true,true);				
		$smartyvs->assign("instrumentsCombo", $instrumentsCombo);
		$smartyvs->assign("genresCombo", $genresCombo);
		$smartyvs->assign("languagesCombo", $languagesCombo);
		$smartyvs->assign("languagesspoken", $languagesspoken);
		$smartyvs->assign("instrumentsPlay", $instrumentsPlay);
		$smartyvs->assign("countries", $countries);
		$smartyvs->assign("levelsCombo", $levelsCombo);
		$smartyvs->assign("categorySearchSelect", hwd_vs_tools::categoryList(_HWDVIDS_SHIGARU_SHIGAR_COMBO_SELECT, $category_id, _HWDVIDS_INFO_NOCATS, 1, "category_id", 0));
		$smartyvs->assign("formurl", JRoute::_( 'index.php?option=com_hwdvideoshare&task=search&Itemid=28' ));
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		$pageURL = str_replace("ajax_search", "displayresults", $pageURL);
		$pageURL = str_replace("&ajax=yes", "", $pageURL);
		$smartyvs->assign("pageURL", $pageURL);
		if (count($matchingvids) > 0) {
			
			$smartyvs->assign("print_matchvids", 1);
			if($searchtype == 'videos' || $searchtype == 'videosongs'){
			$matchingvids = hwd_vs_tools::generateVideoListFromSql($matchingvids, null, $hwdvsTemplateOverride['thumbWidth1']);
			}else if($searchtype == 'users'){
				$matchingvids = hwd_vs_tools::generateUserListFromSql($matchingvids, null, $hwdvsTemplateOverride['thumbWidth1']);
				}
			$smartyvs->assign("matchingvids", $matchingvids);

			$vpage = $totalvids - $c->vpp;
			$vpageNavigation = null;
			$vpageCounter= null;
			if ( $vpage > 0 )
			{
				$vpageNavigation.= $videoNav->getPagesLinks()."<br />";
				if ($videoNav->get('pages.current') < $videoNav->get('pages.total')) 
					$vpageCounter= '('.$videoNav->getPagesCounter().')';
					
				$vpageLimits= $videoNav->getLimitBox( );
			}
			$smartyvs->assign("vpageNavigation", $vpageNavigation);
			$smartyvs->assign("vpageCounter", $vpageCounter);
			$smartyvs->assign("vpageLimits", $vpageLimits);


		} else {
			$smartyvs->assign("mvempty", _HWDVIDS_INFO_NMV);
		}

		if (count($matchinggroups) > 0) {
			$smartyvs->assign("print_matchgrps", 1);
			$matchinggroups = hwd_vs_tools::generateGroupListFromSql($matchinggroups);
			$smartyvs->assign("matchinggroups", $matchinggroups);
			
			$gpage = $totalgroups - $c->gpp;
			$gpageNavigation = null;
			if ( $gpage > 0 )
			{
				$gpageNavigation.= $groupNav->getPagesLinks()."<br />";
				$gpageNavigation.= $groupNav->getPagesCounter();
			}
			$smartyvs->assign("gpageNavigation", $gpageNavigation);


		} else {
			$smartyvs->assign("mgempty", _HWDVIDS_INFO_NMG);
		}
		
		if($isAjax=='yes'){
			$smartyvs->assign("mvempty", _HWDVIDS_INFO_NMVFILT);
			if($fromtop){
				$smartyvs->display('search_ajax_header.tpl');				
			}else{
				if($searchtype == 'videos' || $searchtype == 'videosongs')
				$smartyvs->display('search_ajax.tpl');	
				else if ($searchtype == 'users')
					$smartyvs->display('search_ajax_users.tpl');
				}
			exit;	
		}	
		$smartyvs->display('search.tpl');	
		return;
    }
    /**
     *
     */
    function uploadMedia($uploadpage, $videotype, $checksecurity, $title, $description, $category_id, $tags, $public_private, $allow_comments, $allow_embedding, $allow_ratings, $md5password,$fylePath,$videourl,$fromError=false,$paramPartyVideoInfo=null)
    {
		global $Itemid, $my, $params, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();
		$app = & JFactory::getApplication();
		$active = &$menu->getActive();
		$session = JFactory::getSession();
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}
		
		  
		
	

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_UPLD );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_UPLD );
		hwd_vs_tools::generateActiveLink(4);
		hwd_vs_tools::generateBreadcrumbs();
		$oFromError = '0';
		$supported_websites = hwd_vs_tools::generateSupportedWebsiteList();
		$smartyvs->assign("supported_websites", $supported_websites);
		$smartyvs->assign("username",$my->username);
		$ip = getenv("REMOTE_ADDR") ;
		$smartyvs->assign("ipaddress",$ip);
		if ($uploadpage == "2") {

			$allowedformats = hwd_vs_tools::generateAllowedFormats();
			$smartyvs->assign("allowed_formats", $allowedformats);
			$smartyvs->assign("maximum_upload", $c->maxupld);

			if ($c->locupldmeth == "3")
			{
				require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_perl.php');
				$smartyvs->display('upload_local_perl.tpl');
				return;
			}
			else if ($c->locupldmeth == "2")
			{
				require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_flash.php');
				$smartyvs->display('upload_local_flash.tpl');
				return;
			}
			else if ($c->locupldmeth == "0")
			{
				require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_php.php');
				$smartyvs->display('upload_local_php.tpl');
				return;
			}
			else if ($c->locupldmeth == "4")
			{
				require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_warp.php');
				$smartyvs->display('upload_local_warp.tpl');
				return;
			}
			else
			{
				require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_php.php');
				$smartyvs->display('upload_local_php.tpl');
				return;
			}

		} else if ($uploadpage == "thirdparty") {
			$app->setUserState( "com_hwdvideoshare.upload_selection", "tp" );
			if($paramPartyVideoInfo == null)
				$oThirdPartyVideoInfo = hwd_vs_tools::getThirdPartyVideoInfo($videourl);		
				else{
						$oThirdPartyVideoInfo=$paramPartyVideoInfo;
						$smartyvs->assign( "selectedgenre",$paramPartyVideoInfo->genre_id);
						$smartyvs->assign( "selectedtype",$paramPartyVideoInfo->category_id);
						$smartyvs->assign( "selectedtareyou",$paramPartyVideoInfo->original_autor);
						$smartyvs->assign( "selectedtinst",$paramPartyVideoInfo->intrument_id);
						$smartyvs->assign( "selectedband",$paramPartyVideoInfo->originalband);
						$smartyvs->assign( "selectedsong",$paramPartyVideoInfo->songtitle);
						$smartyvs->assign( "selectedlevel",$paramPartyVideoInfo->level_id);
						$smartyvs->assign( "selectedlang",$paramPartyVideoInfo->language_id);
						$oFromError = '1';
					}
			$instrumentsCombo = hwd_vs_tools::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','instrument','intrument_id',true,true,true);		
			$levelsCombo = hwd_vs_tools::generateVideoCombos('id as a, label as b','hwdvidslevels','id','level_id',true,false,true);		
			$languagesCombo = hwd_vs_tools::generateVideoCombos('id, iso_code as a, literalkey as b','hwdvidslanguages','literalkey','language_id',true,true,true);
			$genresCombo = hwd_vs_tools::generateVideoCombos('id as a, genre as b','hwdvidsgenres','genre','genre_id',true,true,true);		
			$captcha = hwd_vs_tools::generateCaptcha();
			$editor =& JFactory::getEditor();
			$editorparams = array( 'smilies'=> '0' ,
							 'style'  => '1' ,  
							 'layer'  => '0' , 
							 'table'  => '0' ,
							 'clear_entities'=>'0'
							 );
			$domain = JURI::root();
			// save remote thumbnail to disk
			$data = $oThirdPartyVideoInfo->video_id;
			$thumburl = $oThirdPartyVideoInfo->thumbnail;
			$smartyvs->assign( "thumburl",$thumburl);
			$smartyvs->assign( "fromerror",$oFromError);
			$smartyvs->assign( "titleplain",htmlspecialchars(stripslashes($oThirdPartyVideoInfo->video_title)));
			$smartyvs->assign( "descriptionplain",stripslashes($oThirdPartyVideoInfo->description));
			$smartyvs->assign( "description", $editor->display("description",$oThirdPartyVideoInfo->description,600,200,20,20,false,$editorparams));
			$smartyvs->assign( "descriptionsave",$editor->save( 'description' ));
			$smartyvs->assign("videoInfo", $oThirdPartyVideoInfo);
			$smartyvs->assign("infoPassed", 'true');
			$smartyvs->assign("captcha", $captcha);
			$smartyvs->assign("domain", $domain);
			$lang =& JFactory::getLanguage();
			$smartyvs->assign("form_tp",JRoute::_( 'index.php?option=com_hwdvideoshare&Itemid=29&task=addconfirm&lang='.substr($lang->getTag(),0,2)));
			$smartyvs->assign("instrumentsCombo", $instrumentsCombo);
			$smartyvs->assign("levelsCombo", $levelsCombo);
			$smartyvs->assign("languagesCombo", $languagesCombo);
			$lang =& JFactory::getLanguage();
			$smartyvs->assign("currentlang", $lang->getTag());
			$smartyvs->assign("genresCombo", $genresCombo);
			$smartyvs->assign("videourl",$videourl);
			$doc->addCustomTag( '<link rel="stylesheet" type="text/css" media="all" href="'.JURI::root( true ).'/templates/rhuk_milkyway/css/chosen.css" />' );
		
			if(is_object($oThirdPartyVideoInfo))
				$smartyvs->display('upload_thirdparty.tpl');
				 else
					$smartyvs->display('upload_choice.tpl');
			return;

		} else if ($uploadpage == "1") {
			JHTML::_('behavior.formvalidation');
			$doc->addCustomTag( '<link rel="stylesheet" type="text/css" media="all" href="'.JURI::root( true ).'/templates/rhuk_milkyway/css/chosen.css" />' );
			$instrumentsCombo = hwd_vs_tools::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','instrument','intrument_id',true,true,true);		
			$levelsCombo = hwd_vs_tools::generateVideoCombos('id as a, label as b','hwdvidslevels','id','level_id',true,false,true);		
			$languagesCombo = hwd_vs_tools::generateVideoCombos('id, iso_code as a, literalkey as b','hwdvidslanguages','id','language_id',true,true,true);
			$genresCombo = hwd_vs_tools::generateVideoCombos('id as a, genre as b','hwdvidsgenres','genre','genre_id',true,true,true);
			$editor =& JFactory::getEditor();
			$smartyvs->assign( "description", $editor->display("description",$oThirdPartyVideoInfo->description,350,200,20,20,1) );
            
			$smartyvs->assign( "print_wysiwyg", 1 );
			$smartyvs->assign("fylePath",$fylePath);
			$app->setUserState( "com_hwdvideoshare.upload_selection", "local" );
			hwd_vs_javascript::checkuploadform();
			$captcha = hwd_vs_tools::generateCaptcha();
			$smartyvs->assign("captcha", $captcha);
			$smartyvs->assign("instrumentsCombo", $instrumentsCombo);
			$smartyvs->assign("levelsCombo", $levelsCombo);
			$smartyvs->assign("languagesCombo", $languagesCombo);
			$smartyvs->assign("genresCombo", $genresCombo);
			$smartyvs->display('upload_local.tpl');
			return;

		} else if ($uploadpage == "0") {
			require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'views'.DS.'upload_flash.php');
			$allowedformats = hwd_vs_tools::generateAllowedFormats();
			$smartyvs->assign("allowed_formats", $allowedformats);
			$smartyvs->assign("maximum_upload", $c->maxupld);
			hwd_vs_javascript::checkaddform();
			$captcha = hwd_vs_tools::generateCaptcha();
			$smartyvs->assign("captcha", $captcha);
			$upload_selection = $app->getUserState( "com_hwdvideoshare.upload_selection", '' );
			if ($upload_selection == "tp") {
				$tpselect = 'selected="selected"';
			} else {
				$tpselect = '';
			}
			$smartyvs->assign("tpselect", $tpselect);
			$smartyvs->display('upload_choice.tpl');
			return;

		}
    }
    /**
     *
     */
    function uploadConfirm($uploadname, $row)
    {
		global $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_UPLDSUC );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_UPLDSUC );
		hwd_vs_tools::generateActiveLink(4);
		hwd_vs_tools::generateBreadcrumbs();

		$smartyvs->assign("videolink", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewvideo&video_id=".$row->id));
		$smartyvs->assign("uploadname", stripslashes($uploadname));
		$smartyvs->assign("url_upld_another", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=upload"));
		if ($c->aav == 1) {
			$smartyvs->assign("video_wait_message", _HWDVIDS_INFO_VIDEOWAIT1);
		} else {
			$smartyvs->assign("video_wait_message", _HWDVIDS_INFO_VIDEOWAIT2);
		}



		$smartyvs->display('upload_local_confirm.tpl');
		return;
    }
    /**
     *
     */
    function addConfirm($uploadname, $failures, $row)
    {
		global $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_ADDSUC );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_ADDSUC );
		hwd_vs_tools::generateActiveLink(4);
		hwd_vs_tools::generateBreadcrumbs();
		hwd_vs_javascript::checkuploadform();
		$smartyvs->assign("referrer", 'http://'.$_SERVER['HTTP_HOST'].JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewvideo&video_id=".$row->id));
		$smartyvs->assign("videolink", 'http://'.$_SERVER['HTTP_HOST'].JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewvideo&video_id=".$row->id));
		$smartyvs->assign("failures", $failures);
		$smartyvs->assign("thumbnail", hwd_vs_tools::generateVideoThumbnailLink($row->id, $row->video_id, $row->video_type, $row->thumbnail, 0, $c->thumbwidth, $c->thumbwidth*3/4, null));
		$smartyvs->assign("title", stripslashes(htmlentities($row->title)));
		$smartyvs->assign("description", stripslashes($row->description));
		$smartyvs->assign("tags", stripslashes($row->tags));
		$smartyvs->assign("rowid", $row->id);
		$smartyvs->assign("rowuid", $row->user_id);
		$smartyvs->assign("print_sharing", 0);
		$smartyvs->assign("url_upld_another", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=upload"));
		$smartyvs->assign("form_save_video", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=savevideo"));
		$smartyvs->assign("uploadname", stripslashes($uploadname));
		$smartyvs->assign("username", stripslashes($my->username)); 
		$thumbbase = hwd_vs_tools::generateThumbnailURL( $row->id, $row->video_id, $row->video_type, $row->thumbnail, "large" );
		$smartyvs->assign("thumbpath", $thumbbase); 
		if ($c->aav == 1) {
			$smartyvs->assign("waitmessage", _HWDVIDS_INFO_VIDEOWAIT3);
		} else {
			$smartyvs->assign("waitmessage", _HWDVIDS_INFO_VIDEOWAIT2);
		}

		if ($my->id == 0 || $c->allowvidedit == 0)
		{
			$smartyvs->assign("showEditForm", 0);
		}
		else
		{
			$smartyvs->assign("showEditForm", 1);

			if ($row->public_private == "registered") {
				$smartyvs->assign("so1p", "");
				$smartyvs->assign("so1r", " selected=\"selected\"");
				$smartyvs->assign("so1value", "registered");
			} else if ($row->public_private == "public") {
				$smartyvs->assign("so1p", " selected=\"selected\"");
				$smartyvs->assign("so1r", "");
				$smartyvs->assign("so1value", "public");
			}
			if ($row->allow_comments == 0) {
				$smartyvs->assign("so21", "");
				$smartyvs->assign("so20", " selected=\"selected\"");
				$smartyvs->assign("so2value", "0");
			} else if ($row->allow_comments == 1) {
				$smartyvs->assign("so21", " selected=\"selected\"");
				$smartyvs->assign("so20", "");
				$smartyvs->assign("so2value", "1");
			}
			if ($row->allow_embedding == 0) {
				$smartyvs->assign("so31", "");
				$smartyvs->assign("so30", " selected=\"selected\"");
				$smartyvs->assign("so3value", "0");
			} else if ($row->allow_embedding == 1) {
				$smartyvs->assign("so31", " selected=\"selected\"");
				$smartyvs->assign("so30", "");
				$smartyvs->assign("so3value", "1");
			}
			if ($row->allow_ratings == 0) {
				$smartyvs->assign("so41", "");
				$smartyvs->assign("so40", " selected=\"selected\"");
				$smartyvs->assign("so4value", "0");
			} else if ($row->allow_ratings == 1) {
				$smartyvs->assign("so41", " selected=\"selected\"");
				$smartyvs->assign("so40", "");
				$smartyvs->assign("so4value", "1");
			}

                        if ($c->multiple_cats == "1")
			{
				$db->SetQuery("SELECT categoryid FROM #__hwdvidsvideo_category WHERE videoid = $row->id");
				$rows = $db->loadObjectList();
				$selected = array();
                                for ($i = 0, $n = count($rows); $i < $n; $i++)
				{
					$selected[] = $rows[$i]->categoryid;
				}
			}
			else
			{
				$selected = $row->category_id;
			}
			$smartyvs->assign("categoryselect", hwd_vs_tools::categoryList(_HWDVIDS_SHIGARU_SHIGAR_COMBO_SELECT, $selected, _HWDVIDS_INFO_NOCATS, 1) );
		}

		$smartyvs->display('upload_thirdparty_confirm.tpl');

		return;
    }
    
    
    
    
    /**
     *
     */
    function viewVideo($row)
    {
		global $Itemid, $smartyvs, $hwdvsTemplateOverride, $videoplayer;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();
		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// decode
		$meta_title = hwd_vs_tools::generateMetaText(stripslashes($row->title));
		$meta_description = hwd_vs_tools::generateMetaText($row->description);
		$meta_tags = hwd_vs_tools::generateMetaText($row->tags);

		// set the page/meta title
		$doc->setTitle( $metatitle." - ".$meta_title );
		$doc->setMetaData( 'title' , $metatitle." - ".$meta_title );
		$doc->setMetaData( 'description' , $meta_description );
		$doc->setMetaData( 'keywords' , $meta_tags );
		$doc->addCustomTag('<link rel="image_src" href="'.hwd_vs_tools::generateThumbnailURL( $row->id, $row->video_id, $row->video_type, $row->thumbnail ).'" />');
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs($row, $meta_title);
		if($row->category_id == '1')
			$smartyvs->assign("catclass", 'tuto');
			else if($row->category_id == '2')
				$smartyvs->assign("catclass", 'nontuto');
				else if($row->category_id == '3')
					$smartyvs->assign("catclass", 'theory');
		$smartyvs->assign("videoplayer", hwd_vs_tools::generateVideoDetails($row, null, null, null, $Itemid, null, true));
		if($row->category_id !='2')
			$smartyvs->assign("showlevel", 1);
			else
				$smartyvs->assign("showlevel", 0);
		$smartyvs->assign("contentauthor", $row->original_autor);		
		//$smartyvs->assign("videoplayer", $videoplayer);
		//var_dump(hwd_vs_tools::generateVideoDetails($row, null, null, null, $Itemid, null, null));
		/*if (count($related_videos) > 0 && $c->showrevi == "1")
		{
			if (isset($hwdvsTemplateOverride['thumbWidth8']))
			{
				$thumbwidth = '96';
			}
			else
			{
				$thumbwidth = null;
			}
			$smartyvs->assign("print_relatedlist", 1);
			$listrelated = hwd_vs_tools::generateVideoListFromSql($related_videos, "", $hwdvsTemplateOverride['thumbWidth1']);
			$smartyvs->assign("listrelated", $listrelated);
		}
		else
		{
			$smartyvs->assign("listrelated", "There are no related videos.");
		}

		if (count($userrows) > 0 && $c->showuldr == "1")
		{
			if (isset($hwdvsTemplateOverride['thumbWidth7']))
			{
				$thumbwidth = '96';
			}
			else
			{
				$thumbwidth = null;
			}
			
			$smartyvs->assign("print_uservideolist", 1);
			$userlist = hwd_vs_tools::generateVideoListFromSql($userrows, "", $hwdvsTemplateOverride['thumbWidth1']);
			$smartyvs->assign("userlist", $userlist);
			// Fix needed for Joomla template issue
			jimport('joomla.html.pane');
			$pane =& JPane::getInstance('tabs');
			$starttab7 = $pane->startPanel(_HWDVIDS_TITLE_MOREBYUSR." $row->username", 'panel6' );
			$smartyvs->assign( "starttab7", $starttab7 );
		}
		else
		{
			$smartyvs->assign("userlist", "This user does not have any other videos.");
		}

		if (count($categoryrows) > 0 && $c->showmftc == "1")
		{
			if (isset($hwdvsTemplateOverride['thumbWidth9']))
			{
				$thumbwidth = '96';
			}
			else
			{
				$thumbwidth = null;
			}
			$smartyvs->assign("print_categoryvideolist", 1);
			$categoryvideolist = hwd_vs_tools::generateVideoListFromSql($categoryrows, "", $hwdvsTemplateOverride['thumbWidth1']);
			$smartyvs->assign("categoryvideolist", $categoryvideolist);
		}
		else
		{
			$smartyvs->assign("categoryvideolist", "There are no more videos in this category.");
		}*/
		if($row->category_id != '3' && $row->song_id)
			$songPlayer = hwd_vs_tools::getSongPlayer($row->song_id);
		$currentUrl = JURI::current();
		
		$smartyvs->assign("currentUrl", $currentUrl);
		
		jimport( 'joomla.application.module.helper' );
		/* google_adsense box*/
		$google_adsensemodule = JModuleHelper::getModule('j_google_adsense');
		$google_adsense = JModuleHelper::renderModule($google_adsensemodule);
		$smartyvs->assign("google_adsense", $google_adsense); 
		
		
		//$params = array();
		//$limitstart = 0;
		//$article->text = $smartyvs->fetch('video_player.tpl');
		//JPluginHelper::importPlugin('content');
		//$dispatcher =& JDispatcher::getInstance();
		//$results = $dispatcher->trigger('onPrepareContent', array (& $article, & $params, $limitstart));
		
		$smartyvs->assign("songPlayer", $songPlayer);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload");
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->assign("thumburl", hwd_vs_tools::generateThumbnailURL( $row->id, $row->video_id, $row->video_type, $row->thumbnail ));
		
		$smartyvs->assign("showMoreButton", 1);
		$smartyvs->display('video_player.tpl');
		
		return;
    }
    /**
     *
     */
    function categories($rows, $pageNav, $total)
    {
		global $Itemid, $smartyvs, $j15, $j16;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_CATS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_CATS );
		hwd_vs_tools::generateActiveLink(2);
		hwd_vs_tools::generateBreadcrumbs();

		if ( $c->cordering == "orderASC" ) {
			$order = ' ORDER BY ordering ASC, category_name';
		} else if ( $c->cordering == "orderDESC" ) {
			$order = ' ORDER BY ordering DESC, category_name';
		} else if ( $c->cordering == "nameASC" ) {
			$order = ' ORDER BY category_name ASC';
		} else if ( $c->cordering == "nameDESC" ) {
			$order = ' ORDER BY category_name DESC';
		} else if ( $c->cordering == "novidsASC" ) {
			$order = ' ORDER BY num_vids ASC';
		} else if ( $c->cordering == "novidsDESC" ) {
			$order = ' ORDER BY num_vids DESC';
		} else if ( $c->cordering == "nosubsASC" ) {
			$order = ' ORDER BY num_subcats ASC';
		} else if ( $c->cordering == "nosubsDESC" ) {
			$order = ' ORDER BY num_subcats DESC';
		} else {
			$order = ' ORDER BY ordering, category_name';
		}

		$k = 0;
		$topCounter = 0;
		if (count($rows) > 0) {
			$smartyvs->assign("print_categories", 1);
			$z = 0;
			for ($i=0, $m=count($rows); $i < $m; $i++)
			{
				$row = $rows[$i];

				if ($c->bviic == 1)
				{
                                        if (!hwd_vs_access::checkAccess($row->access_v, $row->access_v_r, 4, 0, "", "", "", "exclamation.png", 0, "category.$row->id", 1, "view"))
					{
						continue;
					}
				}

				$list[$z]->level = 0;
				$list[$z]->thumbnail = hwd_vs_tools::generateCategoryThumbnailLink( $row, $k, $c->thumbwidth, $c->thumbwidth*$c->tar_fb, null);
				$list[$z]->title = hwd_vs_tools::generateCategoryLink($row->id, $row->category_name);
				$list[$z]->num_vids = $row->num_vids;
				$list[$z]->num_subcats = $row->num_subcats;
				$list[$z]->description = hwd_vs_tools::truncateText(strip_tags($row->category_description), $c->truncdesc);
				$list[$z]->k = $k;
				$list[$z]->countTopLevel = $topCounter;
				$k = 1 - $k;

				$where = ' WHERE published = 1';
				$where.= ' AND parent = '.$row->id;
				if ($c->cat_he == 1) {
					$where.= ' AND num_vids > 0';
				}

				$query = 'SELECT *'
						. ' FROM #__hwdvidscategories'
						. $where
						. $order
						;
				$db->setQuery( $query );
				$subs1 = $db->loadObjectList();
				if (count($subs1) > 0)
				{
					for ($j=0, $n=count($subs1); $j < $n; $j++)
					{
						$z++;
						$sub1 = $subs1[$j];

						if ($c->bviic == 1)
						{
							if (!hwd_vs_access::allowAccess( $sub1->access_v, $sub1->access_v_r, hwd_vs_access::userGID( $my->id )))
							{
								continue;
							}
						}

						$list[$z]->level = 1;
						$list[$z]->thumbnail = hwd_vs_tools::generateCategoryThumbnailLink($sub1, $k, $c->thumbwidth, $c->thumbwidth*$c->tar_fb, null);
						$list[$z]->title = hwd_vs_tools::generateCategoryLink($sub1->id, $sub1->category_name);
						$list[$z]->num_vids = $sub1->num_vids;
						$list[$z]->num_subcats = $sub1->num_subcats;
						$list[$z]->description = null;
						$list[$z]->k = $k;
						$list[$z]->countTopLevel = $topCounter;
						$k = 1 - $k;

						$where = ' WHERE published = 1';
						$where.= ' AND parent = '.$sub1->id;
						if ($c->cat_he == 1) {
							$where.= ' AND num_vids > 0';
						}

						$query = 'SELECT *'
								. ' FROM #__hwdvidscategories'
								. $where
								. $order
								;
						$db->setQuery( $query );
						$subs2 = $db->loadObjectList();
						if (count($subs2) > 0)
						{
							for ($l=0, $o=count($subs2); $l < $o; $l++)
							{
								$z++;
								$sub2 = $subs2[$l];

								if ($c->bviic == 1)
								{
									if (!hwd_vs_access::allowAccess( $sub2->access_v, $sub2->access_v_r, hwd_vs_access::userGID( $my->id )))
									{
										continue;
									}
								}

								$list[$z]->level = 2;
								$list[$z]->thumbnail = null;
								$list[$z]->title = hwd_vs_tools::generateCategoryLink($sub2->id, $sub2->category_name);
								$list[$z]->num_vids = $sub2->num_vids;
								$list[$z]->num_subcats = $sub2->num_subcats;
								$list[$z]->description = null;
								$list[$z]->k = $k;
								$list[$z]->countTopLevel = $topCounter;
								$k = 1 - $k;
							}
						}
					}
				}
			$z++;
			$topCounter++;
			}
			$smartyvs->assign("list", $list);
		}

		if ($c->custordering == 1) {
			$smartyvs->assign("print_orderselect", 1);
		}

		$page = $total - $c->cpp;
		$pageNavigation = null;
		if ( $page > 0 )
		{
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('category_index.tpl');
		return;
    }
    /**
     *
     */
    function viewCategory($rows, $pageNav, $total, $cat_id, $cat, $subcats)
    {
    	global $Itemid, $smartyvs, $j16;
		$c = hwd_vs_Config::get_instance();
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
$app = & JFactory::getApplication();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_CATS." - ".$cat->category_name );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_CATS." - ".$cat->category_name );
		hwd_vs_tools::generateActiveLink(2);
		hwd_vs_tools::generateBreadcrumbs($cat, $cat->category_name);

		$smartyvs->assign("category_id", $cat->id);
		$smartyvs->assign("category_name", $cat->category_name);
		$smartyvs->assign("category_description", $cat->category_description);
		$smartyvs->assign("category_nov", $cat->num_vids);

		if (count($rows) > 0)
		{
			$smartyvs->assign("print_videolist", 1);
			$list = hwd_vs_tools::generateVideoListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		if (count($rows) > 0)
		{
			if ($c->feat_as == "yes")
			{
				$as = "1";
			}
			else if ($c->feat_as == "no")
			{
				$as = "0";
			}
			else if ($c->feat_as == "first")
			{
				$fas_check = $app->getUserState( "hwdvs_fas_check", "notviewed" );
				if ($fas_check !== "viewed")
				{
					$app->setUserState( "hwdvs_fas_check", "viewed" );
					$as = "1";
				}
				else
				{
					$as = "0";
				}
			}
			else
			{
				$as = null;
			}

			if ($c->usehq == "1")
			{
				$quality = "hd";
			}
			else if ($c->usehq == "2")
			{
				$quality = "sd";
			}
			else
			{
				$quality = null;
			}

			if ($c->fvid_w == 0) { $c->fvid_w = "100%"; }
			$category_video_player = hwd_vs_tools::generateVideoPlayer($rows[0], $c->fvid_w, $c->fvid_h, $as, $quality);
			$smartyvs->assign("category_video_player", $category_video_player);
		}

		if (count($subcats) > 0)
		{
			$smartyvs->assign("print_subcats", 1);

			$k=0;
			for ($i=0, $m=count($subcats); $i < $m; $i++)
			{
				$row = $subcats[$i];
				$subcatlist[$i]->level = 0;
				$subcatlist[$i]->thumbnail = hwd_vs_tools::generateCategoryThumbnailLink( $row, $k, $c->thumbwidth, $c->thumbwidth*$c->tar_fb, null);
				$subcatlist[$i]->title = hwd_vs_tools::generateCategoryLink($row->id, $row->category_name);
				$subcatlist[$i]->num_vids = $row->num_vids;
				$subcatlist[$i]->num_subcats = $row->num_subcats;
				$subcatlist[$i]->description = hwd_vs_tools::truncateText(strip_tags($row->category_description), $c->truncdesc);
				$subcatlist[$i]->k = $k;
				$k = 1 - $k;
			}
			$smartyvs->assign("subcatlist", $subcatlist);
		}

		if ($c->custordering == 1)
		{
			$smartyvs->assign("print_orderselect", 1);
		}


		if (count($rows) == 0 && count($subcats) > 0) {
			templateSetCategoryTab('subcategories');
		} else {
			templateSetCategoryTab('videos');
		}

		$smartyvs->display('category_view.tpl');
		return;
    }
    /**
     *
     */
    function groups($rows, $rowsfeatured, $pageNav, $total)
    {
		global $Itemid, $smartyvs, $params;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_GRPS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_GRPS );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

		$k = 0;
		if (count($rowsfeatured) > 0) {
			$smartyvs->assign("print_featured", 1);
			$featuredlist = hwd_vs_tools::generateGroupListFromSql($rowsfeatured);
			$smartyvs->assign("featuredlist", $featuredlist);
		}

		if (count($rows) > 0) {
			$smartyvs->assign("print_grouplist", 1);
			$list = hwd_vs_tools::generateGroupListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->gpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->assign( "featured_link" , JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=featuredgroups")  );

		$smartyvs->display('group_index.tpl');
		return;
    }
    /**
     *
     */
    function createGroup()
    {
		global $Itemid, $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_NGRPS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_NGRPS );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_javascript::checkaddgroupform();
		hwd_vs_tools::generateBreadcrumbs();

		$form_add_group = JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=savegroup");
		$smartyvs->assign("form_add_group", $form_add_group);
		$captcha = hwd_vs_tools::generateCaptcha();
		$smartyvs->assign("captcha", $captcha);

		$smartyvs->display('group_add.tpl');
		return;
    }
    /**
     *
     */
    function viewGroup($rows, $pageNav, $total, $members, $groupdetails)
    {
		global $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_GRPS." - ".$groupdetails->group_name );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_GRPS." - ".$groupdetails->group_name );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_tools::generateBreadcrumbs();

		$smartyvs->assign("group_name", stripslashes($groupdetails->group_name));
		$smartyvs->assign("group_description", stripslashes($groupdetails->group_description));


		$group->totalmembers = $groupdetails->total_members;
		$group->totalvideos = $groupdetails->total_videos;
		$group->administrator = hwd_vs_tools::generateUserFromID($groupdetails->adminid, $groupdetails->username, $groupdetails->name);


		$group->groupmembership = hwd_vs_tools::generateGroupMembershipStatus($groupdetails);
		$group->reportgroup = hwd_vs_tools::generateReportGroupButton($groupdetails);
		$group->deletegroup = hwd_vs_tools::generateDeleteGroupButton($groupdetails);
		$group->editgroup = hwd_vs_tools::generateEditGroupButton($groupdetails);

		$smartyvs->assign("group", $group);




		if (count($members) > 0) {
			$smartyvs->assign("print_memberslist", 1);

			for ($i=0, $n=count($members); $i < $n; $i++) {
				$row = $members[$i];
				$memberslist[$i]->id = $row->id;
				$memberslist[$i]->username = $row->username;
			}

			$smartyvs->assign("memberslist", $memberslist);
		}



		if (count($rows) > 0) {
			$smartyvs->assign("print_videolist", 1);
			$list = hwd_vs_tools::generateVideoListFromSql($rows);
			$smartyvs->assign("list", $list);
		}



		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);





		$group->comments = hwd_vs_tools::generateGroupComments($groupdetails);

		$smartyvs->display('group_view.tpl');
		return;



    }
    /**
     *
     */
    function yourVideos($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->display('video_yourvideos.tpl');
		return;
    }
    /**
     *
     */
    function watchHistory($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->display('video_watchhistory.tpl');
		return;
    }
    /**
     *
     */
    function learnLater($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();

		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload");
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->display('video_learnlater.tpl');
		return;
    }
    /**
     *
     */
    function videosIlike($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->display('video_videosilike.tpl');
		return;
    }
    
    /**
     *
     */
    function aboutMe($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();

		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}
		
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_SHIGARU_ABOUTME );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_SHIGARU_ABOUTME );
		
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload");
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->display('aboutme.tpl');
		return;
    }
    /**
     *
     */
    function yourVideosCreated($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadlink", $uploadLink);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->display('video_yourvideos_created.tpl');
		return;
    }
    /**
     *
     */
    function yourVideosShared($total,$otheruser='no',$user_id)
    {
		global $smartyvs, $limitstart,$Itemid,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();
		
		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		$baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("user_id", $user_id);
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->display('video_yourvideos_shared.tpl');
		return;
    }
    /**
     *
     */
    function yourFavourites($total,$otheruser='no',$user_id)
    {
		global $Itemid, $smartyvs,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();
		$jUser = null;
		$my = & JFactory::getUser();
		$lang = JFactory::getLanguage();
		$ismyprofile = 'no';
		if ($c->showrating == 1 || $c->showviews == 1 || $c->showduration == 1 || $c->showuplder == 1) { $infowidth = 150; } else { $infowidth = 0; }
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}
		if($otheruser==$my->id){
			$user_id = $my->id;
			$jUser = & JFactory::getUser();
			$ismyprofile = 'yes';
			}else{
				$user_id = $otheruser;
				$jUser = & JFactory::getUser($otheruser);
				}
		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YFAVS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YFAVS );
	    $baseurl = JURI::root();
		$smartyvs->assign("baseurl", $baseurl);
		$smartyvs->assign("pageNavigation", $pageNavigation);
		$smartyvs->assign("otheruser", $otheruser);
		$smartyvs->assign("total", $total);
		$smartyvs->assign("ismyprofile", $ismyprofile);
		$smartyvs->assign("user_id", $user_id);
		$smartyvs->assign("username", $jUser->username);
		$uploadLink = JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".substr($lang->getTag(),0,2));
		$smartyvs->assign("uploadLink", $uploadLink);
		$smartyvs->display('video_yourfavourites.tpl');
		return;

    }
    /**
     *
     */
    function featuredVideos($rows, $pageNav, $total)
    {
		global $Itemid, $smartyvs,$hwdvsTemplateOverride;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_FEATU );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_FEATU );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_videolist", 1);
			$list = hwd_vs_tools::generateVideoListFromSql($rows,null,$hwdvsTemplateOverride['thumbWidth1']);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('video_featuredvideos.tpl');
		return;
    }
    /**
     *
     */
    function yourGroups($rows, $pageNav, $total)
    {
		global $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YGRPS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YGRPS );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_grouplist", 1);
			$list = hwd_vs_tools::generateGroupListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('group_yourgroups.tpl');
		return;
    }
    /**
     *
     */
    function yourMemberships($rows, $pageNav, $total)
    {
		global $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YGRPM );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YGRPM );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_grouplist", 1);
			$list = hwd_vs_tools::generateGroupListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('group_yourgroupmemberships.tpl');
		return;
    }
    /**
     *
     */
    function featuredGroups($rows, $pageNav, $total)
    {
		global $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_FEATG );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_FEATG );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_grouplist", 1);
			$list = hwd_vs_tools::generateGroupListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('group_featuredgroups.tpl');
		return;
    }
    /**
     *
     */
    function editVideoInfo($row)
    {
    	global $Itemid, $smartyvs, $Itemid;
        $c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$db = & JFactory::getDBO();
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		$referrer = JRequest::getVar( 'url', '' );

        // decode
        $meta_title = html_entity_decode($row->title);
        // set the page/meta title
        $doc->setTitle( $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
        $doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::checkEditForm();
		hwd_vs_tools::generateBreadcrumbs();

			$smartyvs->assign("thumbnail", hwd_vs_tools::generateVideoThumbnailLink($row->id, $row->video_id, $row->video_type, $row->thumbnail, 0, null, null, null));
			$smartyvs->assign("title", stripslashes(htmlentities($row->title)));

			if (!hwd_vs_access::allowAccess( $c->gtree_edtr, $c->gtree_edtr_child, hwd_vs_access::userGID( $my->id )))
			{
				$smartyvs->assign( "description", stripslashes($row->description) );
			}
			else
			{
				$editor      =& JFactory::getEditor();
				$smartyvs->assign( "description", $editor->display("description",stripslashes($row->description),350,250,40,20,1) );
				$smartyvs->assign( "print_wysiwyg", 1 );
			}

			$smartyvs->assign("tags", stripslashes($row->tags));
			$smartyvs->assign("rowid", $row->id);
			$smartyvs->assign("rowuid", $row->user_id);
			$smartyvs->assign("print_sharingoptions", 1);
			$smartyvs->assign("form_save_video", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=savevideo"));
			$smartyvs->assign("referrer", $referrer);

				if ($row->public_private == "registered")
				{
					$smartyvs->assign("so1p", "");
					$smartyvs->assign("so1r", " selected=\"selected\"");
					$smartyvs->assign("so1m", "");
					$smartyvs->assign("so1w", "");
					$smartyvs->assign("so1value", "registered");
				}
				else if ($row->public_private == "public")
				{
					$smartyvs->assign("so1p", " selected=\"selected\"");
					$smartyvs->assign("so1r", "");
					$smartyvs->assign("so1m", "");
					$smartyvs->assign("so1w", "");
					$smartyvs->assign("so1value", "public");
				}
				else if ($row->public_private == "me")
				{
					$smartyvs->assign("so1p", "");
					$smartyvs->assign("so1r", "");
					$smartyvs->assign("so1m", " selected=\"selected\"");
					$smartyvs->assign("so1w", "");
					$smartyvs->assign("so1value", "me");
				}
				else if ($row->public_private == "password")
				{
					$smartyvs->assign("so1p", "");
					$smartyvs->assign("so1r", "");
					$smartyvs->assign("so1m", "");
					$smartyvs->assign("so1w", " selected=\"selected\"");
					$smartyvs->assign("so1value", "password");
				}


				if ($row->allow_comments == 0) {
					$smartyvs->assign("so21", "");
					$smartyvs->assign("so20", " selected=\"selected\"");
					$smartyvs->assign("so2value", "0");
				} else if ($row->allow_comments == 1) {
					$smartyvs->assign("so21", " selected=\"selected\"");
					$smartyvs->assign("so20", "");
					$smartyvs->assign("so2value", "1");
				}
				if ($row->allow_embedding == 0) {
					$smartyvs->assign("so31", "");
					$smartyvs->assign("so30", " selected=\"selected\"");
					$smartyvs->assign("so3value", "0");
				} else if ($row->allow_embedding == 1) {
					$smartyvs->assign("so31", " selected=\"selected\"");
					$smartyvs->assign("so30", "");
					$smartyvs->assign("so3value", "1");
				}
				if ($row->allow_ratings == 0) {
					$smartyvs->assign("so41", "");
					$smartyvs->assign("so40", " selected=\"selected\"");
					$smartyvs->assign("so4value", "0");
				} else if ($row->allow_ratings == 1) {
					$smartyvs->assign("so41", " selected=\"selected\"");
					$smartyvs->assign("so40", "");
					$smartyvs->assign("so4value", "1");
				}

			if ($c->multiple_cats == "1")
			{
				$db->SetQuery("SELECT categoryid FROM #__hwdvidsvideo_category WHERE videoid = $row->id");
				$rows = $db->loadObjectList();
				$selected = array();
                                for ($i = 0, $n = count($rows); $i < $n; $i++)
				{
					$selected[] = $rows[$i]->categoryid;
				}
			}
			else
			{
				$selected = $row->category_id;
			}
			$smartyvs->assign("categoryselect", hwd_vs_tools::categoryList(_HWDVIDS_SHIGARU_SHIGAR_COMBO_SELECT, $selected, _HWDVIDS_INFO_NOCATS, 1) );
			$instrumentsCombo = hwd_vs_tools::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','instrument','intrument_id',true,true,true);		
			$levelsCombo = hwd_vs_tools::generateVideoCombos('id as a, label as b','hwdvidslevels','id','level_id',true,false,true);		
			$languagesCombo = hwd_vs_tools::generateVideoCombos('id, iso_code as a, literalkey as b','hwdvidslanguages','id','language_id',true,true,true);	
			$genresCombo = hwd_vs_tools::generateVideoCombos('id as a, genre as b','hwdvidsgenres','genre','genre_id',true,true,true);		
			$captcha = hwd_vs_tools::generateCaptcha();
			$editor =& JFactory::getEditor();
			$editorparams = array( 'smilies'=> '0' ,
							 'style'  => '1' ,  
							 'layer'  => '0' , 
							 'table'  => '0' ,
							 'clear_entities'=>'0'
							 );
			$domain = JURI::root();
			// save remote thumbnail to disk
			$data = $oThirdPartyVideoInfo->video_id;
			$thumburl = hwd_vs_tools::get_final_url( "http://img.youtube.com/vi/".$data."/default.jpg");
			$smartyvs->assign( "thumburl",$thumburl);
			$smartyvs->assign( "fromerror",$oFromError);
			$smartyvs->assign( "titleplain",htmlspecialchars(stripslashes($row->title)));
			$smartyvs->assign( "descriptionplain",stripslashes(stripslashes($row->description)));
			$smartyvs->assign( "description", $editor->display("description",stripslashes($row->description),600,200,20,20,false,$editorparams));
			$smartyvs->assign( "descriptionsave",$editor->save( 'description' ));
			$smartyvs->assign("domain", $domain);
			$smartyvs->assign("instrumentsCombo", $instrumentsCombo);
			$smartyvs->assign("levelsCombo", $levelsCombo);
			$smartyvs->assign("languagesCombo", $languagesCombo);
			$lang =& JFactory::getLanguage();
			$smartyvs->assign("currentlang", $lang->getTag());
			$smartyvs->assign("genresCombo", $genresCombo);
			$smartyvs->assign("intrument_id", $row->intrument_id);
			$smartyvs->assign("original_autor", $row->original_autor);
			$smartyvs->assign("level_id", $row->level_id);
			$smartyvs->assign("genre_id", $row->genre_id);
			$smartyvs->assign("language_id", $row->language_id);
			$smartyvs->assign("song_id", hwd_vs_tools::getSongById($row->song_id));
			$smartyvs->assign("band_id", hwd_vs_tools::getBandById($row->band_id));
			$smartyvs->assign("category_id", $row->category_id);
			

		$smartyvs->display('video_edit.tpl');
		return;
    }
    /**
     *
     */
    function editGroupInfo($row, $grp_members)
    {
    	global $Itemid, $smartyvs, $Itemid;
        $c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

        // decode
        $meta_title = html_entity_decode($row->group_name);
        // set the page/meta title
        $doc->setTitle( $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
        $doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

			$smartyvs->assign("title", stripslashes($row->group_name));
			$smartyvs->assign("description", stripslashes($row->group_description));
			$smartyvs->assign("rowid", $row->id);
			$smartyvs->assign("rowuid", $row->adminid);


		if (count($grp_members) > 0) {
			$smartyvs->assign("print_grp_members", 1);
			$grp_memberlist = hwd_vs_tools::generateGroupMemberList($grp_members);
			$smartyvs->assign("grp_memberlist", $grp_memberlist);
		}

			$smartyvs->assign("form_edit_group", JURI::root(true)."/index.php?option=com_hwdvideoshare&task=updategroup");

		$smartyvs->display('group_edit.tpl');
		return;
    }
    /**
     *
     */
    function createChannel()
    {
		global $Itemid, $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_NGRPS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_NGRPS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::checkaddgroupform();
		hwd_vs_tools::generateBreadcrumbs();

		$form_add_channel = JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=saveChannel");
		$smartyvs->assign("form_add_channel", $form_add_channel);
		$captcha = hwd_vs_tools::generateCaptcha();
		$smartyvs->assign("captcha", $captcha);

		$query = "SELECT username FROM #__users WHERE id = $my->id";
		$db->SetQuery( $query );
		$username = $db->loadResult();
		$smartyvs->assign("username", $username);
		$smartyvs->assign("channelUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=$Itemid&task=viewchannel&user_id=$my->id"));

		$smartyvs->display('channel_add.tpl');
		return;
    }
    /**
     *
     */
    function channels($rows, $rowsfeatured, $pageNav, $total)
    {
		global $Itemid, $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_FEATU );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_FEATU );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_channellist", 1);
			$list = hwd_vs_tools::generateChannelListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('channel_index.tpl');
		return;
    }
    /**
     *
     */
    function viewChannel($channel, $rows, $type, $pageNav, $total, $rows_favourites, $rows_recentlyviewed)
    {
		global $Itemid, $smartyvs, $hwdvsTemplateOverride, $limit, $print_glink, $print_plink, $j16;
		$c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle );
		$doc->setMetaData( 'title' , $metatitle );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();

		// define javascript
		hwd_vs_javascript::confirmdelete();

		switch ($type)
		{
			case "videos":

				if (count($rows) > 0) {
					$smartyvs->assign("print_list", 1);
					$list = hwd_vs_tools::generateVideoListFromSql($rows, null, $hwdvsTemplateOverride['thumbWidth1']);
					$smartyvs->assign("list", $list);
				}

				$rpp = $c->vpp;
				$smartyvs->assign("noItems", _HWDVIDS_NOUV);

			break;
			case "groups":

				if (count($rows) > 0) {
					$smartyvs->assign("print_list", 1);
					$list = hwd_vs_tools::generateGroupListFromSql($rows, null, $hwdvsTemplateOverride['thumbWidth1']);
					$smartyvs->assign("list", $list);
				}

				$rpp = $c->gpp;
				$smartyvs->assign("noItems", _HWDVIDS_NOUG);

			break;
			case "playlists":

				if (count($rows) > 0) {
					$smartyvs->assign("print_list", 1);
					$list = hwd_vs_tools::generatePlaylistListFromSql($rows, null, $hwdvsTemplateOverride['thumbWidth1']);
					$smartyvs->assign("list", $list);
				}

				$rpp = $c->vpp;
				$smartyvs->assign("noItems", _HWDVIDS_NOUP);

			break;
		}

		$smartyvs->assign("type", $type);

		$page = $total - $rpp;
		$pageNavigation = null;
		if ( $page > 0 )
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);



		if (count($rows_favourites) > 0) {
			$smartyvs->assign("print_favouriteslist", 1);
			$list_favourites = hwd_vs_tools::generateVideoListFromSql($rows_favourites, null, 50);
			$smartyvs->assign("list_favourites", $list_favourites);
		}

		if (count($rows_recentlyviewed) > 0) {
			$smartyvs->assign("print_recentlyviewedlist", 1);
			$list_recentlyviewed = hwd_vs_tools::generateVideoListFromSql($rows_recentlyviewed, null, 50);
			$smartyvs->assign("list_recentlyviewed", $list_recentlyviewed);
		}

		if (isset($channel->id))
		{
			$channelData->editchannel = hwd_vs_tools::generateEditChannelLink($channel);
			$channelData->channel_description = $channel->channel_description;
			$channelData->user_id = intval($channel->user_id);
			$channelData->views = intval($channel->views);
			$channelData->subscribe = hwd_vs_tools::generateChannelSubscriptionStatus($channel);
			$channelData->registerDate = strftime("%l%P - %b %e, %Y", strtotime($channel->registerDate));
			$channelData->lastvisitDate = strftime("%l%P - %b %e, %Y", strtotime($channel->lastvisitDate));
			$channelData->subscribers = $channel->subscribers;
			$channelData->uploads = $channel->uploads;
			$channelData->thumbnail = $channel->thumbnail;
			if (!empty($channelData->thumbnail))
			{
				$smartyvs->assign("displayChannelThumbnail", 1);
			}
		}
		else
		{
			$channelData->user_id = intval($channel->user_id);
		}
		$smartyvs->assign("channelData", $channelData);

		$query = "SELECT username FROM #__users WHERE id = $channel->user_id";
		$db->SetQuery( $query );
		$username = $db->loadResult();
		$smartyvs->assign("username", $username);

		$smartyvs->assign("channelTitle", sprintf(_HWDVIDS_C_TITLE, $username));

		$smartyvs->assign("selectUploads", 1);
		$smartyvs->assign("selectUploadsUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=uploads"));
		$smartyvs->assign("selectUploadsText", sprintf(_HWDVIDS_C_UPLOADS, $username));

		$smartyvs->assign("selectFavourites", 1);
		$smartyvs->assign("selectFavouritesUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=favourites"));
		$smartyvs->assign("selectFavouritesText", sprintf(_HWDVIDS_C_FAVOURITES, $username));

		$smartyvs->assign("selectViewed", 1);
		$smartyvs->assign("selectViewedUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=viewed"));
		$smartyvs->assign("selectViewedText", sprintf(_HWDVIDS_C_VIEWED, $username));

		$smartyvs->assign("selectLiked", 1);
		$smartyvs->assign("selectLikedUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=liked"));
		$smartyvs->assign("selectLikedText", sprintf(_HWDVIDS_C_LIKED, $username));

		$smartyvs->assign("selectDisliked", 1);
		$smartyvs->assign("selectDislikedUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=disliked"));
		$smartyvs->assign("selectDislikedText", sprintf(_HWDVIDS_C_DISLIKED, $username));

		if ($print_glink)
		{
			$smartyvs->assign("selectGroups", 1);
			$smartyvs->assign("selectGroupsUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=groups"));
			$smartyvs->assign("selectGroupsText", sprintf(_HWDVIDS_C_GROUPS, $username));
		}

		if ($print_plink)
		{
			$smartyvs->assign("selectPlaylists", 1);
			$smartyvs->assign("selectPlaylistsUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=playlists"));
			$smartyvs->assign("selectPlaylistsText", sprintf(_HWDVIDS_C_PLAYLISTS, $username));
		}

		if ($print_glink)
		{
			$smartyvs->assign("selectMemberships", 1);
			$smartyvs->assign("selectMembershipsUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=memberships"));
			$smartyvs->assign("selectMembershipsText", sprintf(_HWDVIDS_C_MEMBERSHIPS, $username));
		}

		$smartyvs->assign("selectSubscriptions", 1);
		$smartyvs->assign("selectSubscriptionsUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewChannel&user_id=".$channelData->user_id."&sort=subscriptions"));
		$smartyvs->assign("selectSubscriptionsText", sprintf(_HWDVIDS_C_SUBSCRIPTIONS, $username));

		$smartyvs->display('channel_view.tpl');
		return;
    }
    /**
     *
     */
    function editChannelInfo($row)
    {
    	global $Itemid, $smartyvs, $Itemid;
        $c = hwd_vs_Config::get_instance();
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

        // decode
        $meta_title = html_entity_decode($row->channel_name);
        // set the page/meta title
        $doc->setTitle( $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
        $doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_EVIDS." - ".$meta_title );
		hwd_vs_tools::generateActiveLink(3);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

		$smartyvs->assign("channel_description", stripslashes($row->channel_description));
		$smartyvs->assign("cid", $row->id);


		$form_edit_channel = JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=updateChannel");
		$smartyvs->assign("form_edit_channel", $form_edit_channel);
		$captcha = hwd_vs_tools::generateCaptcha();
		$smartyvs->assign("captcha", $captcha);

		$query = "SELECT username FROM #__users WHERE id = $my->id";
		$db->SetQuery( $query );
		$username = $db->loadResult();
		$smartyvs->assign("username", $username);
		$smartyvs->assign("channelUrl", JRoute::_("index.php?option=com_hwdvideoshare&Itemid=$Itemid&task=viewchannel&user_id=$my->id"));

		$smartyvs->display('channel_edit.tpl');
		return;
    }
    /**
     *
     */
    function createPlaylist()
    {
		global $Itemid, $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_NPL );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_NPL );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::checkAddPlaylistForm();
		hwd_vs_tools::generateBreadcrumbs();

		$form_add_playlist = JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=savePlaylist");
		$smartyvs->assign("form_add_playlist", $form_add_playlist);
		$captcha = hwd_vs_tools::generateCaptcha();
		$smartyvs->assign("captcha", $captcha);

		$smartyvs->display('playlist_add.tpl');
		return;
    }
    /**
     *
     */
    function playlists($rows, $rowsfeatured, $pageNav, $total)
    {
		global $Itemid, $smartyvs, $params;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_GRPS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_GRPS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

		$k = 0;
		if (count($rowsfeatured) > 0) {
			$smartyvs->assign("print_featured", 1);
			$featuredlist = hwd_vs_tools::generatePlaylistListFromSql($rowsfeatured);
			$smartyvs->assign("featuredlist", $featuredlist);
		}

		if (count($rows) > 0) {
			$smartyvs->assign("print_grouplist", 1);
			$list = hwd_vs_tools::generatePlaylistListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->gpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->assign( "featured_link" , JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=featuredgroups")  );

		$smartyvs->display('playlist_index.tpl');
		return;
    }
    /**
     *
     */
    function editPlaylist($row, $pl_videos)
    {
    	global $Itemid, $smartyvs, $Itemid;
        $c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

        // decode
        $meta_title = html_entity_decode($row->playlist_name);
        // set the page/meta title
        $doc->setTitle( $metatitle." - "._HWDVIDS_META_EPL." - ".$meta_title );
        $doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_EPL." - ".$meta_title );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

		$smartyvs->assign("playlist_name", stripslashes($row->playlist_name));
		$smartyvs->assign("playlist_description", stripslashes($row->playlist_description));
		$smartyvs->assign("playlist_id", $row->id);

		if (count($pl_videos) > 0) {
			$smartyvs->assign("print_pl_videos", 1);

			for ($i=0, $n=count($pl_videos); $i < $n; $i++) {
				$row = $pl_videos[$i];

				$pl_video_list[$i]->thumbnail_url = hwd_vs_tools::generateThumbnailURL( $row->id, $row->video_id, $row->video_type, $row->thumbnail );
				$pl_video_list[$i]->title = hwd_vs_tools::truncateText(strip_tags(stripslashes($row->title)), $c->truntitle);
				$pl_video_list[$i]->vid = $row->id;
				$pl_video_list[$i]->counter = $i+1;

			}

			$smartyvs->assign("pl_video_list", $pl_video_list);
		}

		$smartyvs->assign("form_edit_playlist", JURI::root(true)."/index.php?option=com_hwdvideoshare&task=updatePlaylist");

		$smartyvs->display('playlist_edit.tpl');
		return;
    }
    /**
     *
     */
    function viewPlaylist($row)
    {
    	global $Itemid, $smartyvs, $Itemid;
        $c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

        // decode
        $meta_title = html_entity_decode($row->playlist_name);
        // set the page/meta title
        $doc->setTitle( $metatitle." - "._HWDVIDS_META_EPL." - ".$meta_title );
        $doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_EPL." - ".$meta_title );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_javascript::confirmdelete();
		hwd_vs_tools::generateBreadcrumbs();

		$smartyvs->assign("playlist_name", stripslashes($row->playlist_name));
		$smartyvs->assign("playlist_description", stripslashes($row->playlist_description));
		$smartyvs->assign("playlist_id", $row->id);

		$hwdvids_params['autostart'] 	= 1;
		$hwdvids_params['extended'] 	= 1;

		$hwdvids_params['thumb_width'] 		= 60;
		$hwdvids_params['mod_hwd_itemid'] 	= 0;
		$hwdvids_params['trunc_title'] 		= '';
		$hwdvids_params['trunc_descr'] 		= '';

		if ($hwdvids_params['mod_hwd_itemid'] == 0)
		{
			$hwdvids_params['mod_hwd_itemid'] = hwd_vs_tools::generateValidItemid();
		}

		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'xml'.DS.'xmlparse.class.php');
		$parser = new HWDVS_xmlParse();
		$parsed_list = $parser->parse("pl_$row->id");

		if (count($parsed_list) > 0)
		{
			$smartyvs->assign("vid", $parsed_list[0]['id']);

			$row->video_id = "";
			$row->video_type = "playlist";
			$row->playlist = JURI::base( true )."/components/com_hwdvideoshare/xml/xspf/pl_$row->id.xml";
			$video_player = hwd_vs_tools::generateVideoPlayer( $row, null, null, $hwdvids_params['autostart'] );

			if ($hwdvids_params['extended'] == 1)
			{
				$tooltip = 1;
				$list = hwd_vs_tools::generateVideoListFromXml($parsed_list, $hwdvids_params['thumb_width'], $hwdvids_params['mod_hwd_itemid'], $tooltip, $hwdvids_params['trunc_title'], $hwdvids_params['trunc_descr'], "hwdvs_insert_playlist_video");
				$smartyvs->assign("list", $list);
			}
		}
		else
		{
			hwd_vs_tools::infomessage(4, 0, "Empty playlist", "This playlist does not contactin any videos", "exclamation.png", 0);
			return;
		}

                $param_width = $c->flvplay_width;
                $param_height = $param_width*$c->var_fb;

		$random = rand();
		$smartyvs->assign("print_extended", 1);
		$smartyvs->assign("random", $random);

		$hwdvs_ajax_video_js = "<script language=\"javascript\" type=\"text/javascript\">
				<!--
				//Browser Support Code
				function hwdvs_insert_playlist_video(video_id){

					var ajaxRequest;  // The variable that makes Ajax possible!

					document.getElementById('hwdvs_player_container".$random."').style.padding = \"0\";
					document.getElementById('hwdvs_player_container".$random."').style.margin = \"0\";
					document.getElementById('hwdvs_player_container".$random."').innerHTML = '<div style=\"padding:5px;\">Loading...<br /><img src=\"".JURI::root( true )."/plugins/community/hwdvideoshare/loading.gif\"></div>';

					try{
						// Opera 8.0+, Firefox, Safari
						ajaxRequest = new XMLHttpRequest();
					} catch (e){
						// Internet Explorer Browsers
						try{
							ajaxRequest = new ActiveXObject(\"Msxml2.XMLHTTP\");
						} catch (e) {
							try{
								ajaxRequest = new ActiveXObject(\"Microsoft.XMLHTTP\");
							} catch (e){
								// Something went wrong
								alert(\"Your browser broke!\");
								return false;
							}
						}
					}
					// Create a function that will receive data sent from the server
					ajaxRequest.onreadystatechange = function(){
						if(ajaxRequest.readyState == 4){
							document.getElementById('hwdvs_player_container".$random."').style.padding = \"0\";
							document.getElementById('hwdvs_player_container".$random."').style.margin = \"0\";
							document.getElementById('hwdvs_player_container".$random."').innerHTML = ajaxRequest.responseText;

							var theInnerHTML = ajaxRequest.responseText;
							var theID = 'hwdvs_player_container".$random."';
							setAndExecute(theID,theInnerHTML);
						}
					}
					ajaxRequest.open(\"GET\", \"".JURI::root( true )."/index.php?option=com_hwdvideoshare&task=grabajaxplayer&Itemid=".$hwdvids_params['mod_hwd_itemid']."&template=mod_hwd_vs_video_playlist_container&width=".$param_width."&height=".$param_height."&tmpl=component&video_id=\" + video_id, true);
					ajaxRequest.send(null);

					function setAndExecute(divId, innerHTML)
					{
						var div = document.getElementById(divId);
						div.innerHTML = innerHTML;
						var x = div.getElementsByTagName(\"script\");
						for(var i=0;i<x.length;i++)
						{
							eval(x[i].text);
						}
					}
				}

				//-->
			 </script>";
		$doc->addCustomTag($hwdvs_ajax_video_js);


		$smartyvs->assign("hwdvids_params", $hwdvids_params);
		$smartyvs->assign("video_player", $video_player);
		$smartyvs->display('playlist_view.tpl');

		return;
    }
    /**
     *
     */
    function pending($rows, $pageNav, $total)
    {
		global $smartyvs, $Itemid;
		$c = hwd_vs_Config::get_instance();

		// load the menu name
		jimport( 'joomla.application.menu' );
		$menu   = &JMenu::getInstance('site');
		$mparams = &$menu->getParams($Itemid);
		$mparams_pt	= $mparams->get( 'page_title', '');

		jimport( 'joomla.document.document' );
		$doc = & JFactory::getDocument();

		$active = &$menu->getActive();

		if (!empty($mparams_pt)) {
			$metatitle = $mparams_pt;
		} else if (!empty($active->name)) {
			$metatitle = $active->name;
		} else {
			$metatitle = _HWDVIDS_META_DEFAULT;
		}

		// set the page/meta title
		$doc->setTitle( $metatitle." - "._HWDVIDS_META_YVIDS );
		$doc->setMetaData( 'title' , $metatitle." - "._HWDVIDS_META_YVIDS );
		hwd_vs_tools::generateActiveLink(1);
		hwd_vs_tools::generateBreadcrumbs();

		if (count($rows) > 0) {
			$smartyvs->assign("print_videolist", 1);
			$list = hwd_vs_tools::generateVideoListFromSql($rows);
			$smartyvs->assign("list", $list);
		}

		$page = $total - $c->vpp;
		$pageNavigation = null;
		if ( $page > 0 ) 
                {
			if ($j16)
			{
				$pageNavigation.= "<div class=\"pagination\">";
			}
			$pageNavigation.= $pageNav->getPagesLinks();
			//$pageNavigation.= "<br />".$pageNav->getPagesCounter();
			if ($j16)
			{
				$pageNavigation.= "</div>";
			}
		}
		$smartyvs->assign("pageNavigation", $pageNavigation);

		$smartyvs->display('video_pending.tpl');
		return;
    }
}
?>
