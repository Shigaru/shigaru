<?php
function hwdVideoShareBuildRoute(&$query)
{
	require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'config.hwdvideoshare.php');
	require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'initialise.php');
	hwdvsInitialise::language('plugs');

	$segments = array();

	$db =& JFactory::getDBO();
	jimport('joomla.filter.output');
	$escapeRouteChar	= array('.', '\\', '/', '@', '#', '?', '!', '^', '&', '<', '>', '\'' , '"', '*', ',' );
	if (isset($query['task']))
	{
		switch ($query['task'])
		{
			case 'frontpage':
				$segments[] = URLSafe(_HWDVS_SEF_FP);
				unset( $query['task'] );
			break;

			case 'upload':
				$segments[] = URLSafe(_HWDVS_SEF_UPLOAD);
				unset( $query['task'] );
			break;

			case 'uploadconfirmperl':
				$segments[] = URLSafe(_HWDVS_SEF_UPLOADEDP);
				unset( $query['task'] );
			break;

			case 'uploadconfirmflash':
				$segments[] = URLSafe(_HWDVS_SEF_UPLOADEDF);
				unset( $query['task'] );
			break;

			case 'uploadconfirmphp':
				$segments[] = URLSafe(_HWDVS_SEF_UPLOADEDB);
				unset( $query['task'] );
			break;

			case 'addconfirm':
				$segments[] = URLSafe(_HWDVS_SEF_ADDED);
				unset( $query['task'] );
			break;

			
			case 'yourvideos':
				$segments[] = URLSafe(_HWDVS_SEF_YV);
				unset( $query['task'] );
			break;

			case 'yourfavourites':
				$segments[] = URLSafe(_HWDVS_SEF_YF);
				unset( $query['task'] );
			break;

			case 'yourgroups':
				$segments[] = URLSafe(_HWDVS_SEF_YG);
				unset( $query['task'] );
			break;

			case 'yourmemberships':
				$segments[] = URLSafe(_HWDVS_SEF_YM);
				unset( $query['task'] );
			break;

			case 'editvideo':
				$segments[] = URLSafe(_HWDVS_SEF_EDITVIDEO);
				unset( $query['task'] );
			break;

			case 'featuredvideos':
				break;

			case 'categories':
				$segments[] = URLSafe(_HWDVS_SEF_CATEGORIES);
				unset( $query['task'] );
			break;
			case 'search':
				$segments[] = 'search';
				unset( $query['task'] );
				unset( $query['component'] );
				unset( $query['option'] );
			break;

			case 'gotocategory':
				$segments[] = URLSafe(_HWDVS_SEF_VC);
				unset( $query['task'] );
			break;
			case 'searchbyoption':
				$app = JFactory::getApplication();
				$menu = $app->getMenu();
				$items = $menu->getItems('component', 'com_hwdvideoshare');
				if (!isset($query['Itemid']))   
				$query['Itemid'] =  $items->id;  
				if (!isset($query['Itemid']))   
					$query['Itemid'] =  $items->id;
				if (isset($query['searchoption'])){
						if($query['searchoption'] == 'bsongssource'){
								$segments[] = 'songs';
								$oSong = slug(getSongById($query['item_id']));
								$segments[] = $oSong;
							}else{
								$segments[] = 'bands';
								$oBand = slug(getBandById($query['item_id']));
								$segments[] = $oBand;
								}
					}
				$segments[] = $query['item_id'];
				unset( $query['task'] );
				unset( $query['searchoption'] );
				unset( $query['option'] );
				unset( $query['item_id'] );
			break;

			case 'nextvideo':
				break;

			case 'previousvideo':
				break;

			case 'search':
				break;

			case 'displayresults':
				$segments[] = URLSafe(_HWDVS_SEF_DR);
				unset( $query['task'] );
				if (empty($query['category_id'])) { $query['category_id'] = 0; }
				$segments[] = $query['category_id'];
				unset( $query['category_id'] );
			break;

			case 'viewvideo':
		
				$vid = intval($query['video_id']);
				$sqlquery = 'SELECT v.title, v.uri, c.category_name'
					   . ' FROM #__hwdvidsvideos AS v'
					   . ' LEFT JOIN #__hwdvidscategories AS c ON c.id = v.category_id'
					   . ' WHERE v.id = '.$vid
					   ;
				$db->SetQuery($sqlquery);
				$row = $db->loadObject();

				if (!isset($row->category_name)) { $row->category_name = ''; }
				if (!isset($row->title)) { $row->title = ''; }
				if (!isset($row->uri)) { $row->uri = ''; }

				$categoryName 	= URLSafe(html_entity_decode($row->category_name));
				$videoName 	    = URLSafe(html_entity_decode($row->title));
				if($row->uri == ''){
					saveVideoUri(slug($videoName),$query['video_id']);
					}
				unset( $query['task'] );
				unset( $query['video_id'] );
				$segments[] = slug($categoryName);
				$segments[] = slug($videoName);
				
			break;

			case 'viewcategory':
				$cid = intval($query['cat_id']);
				$sqlquery = 'SELECT c.category_name'
					   . ' FROM #__hwdvidscategories AS c'
					   . ' WHERE c.id = '.$cid
					   ;
				$db->SetQuery($sqlquery);
				$category_name = $db->loadResult();

				$categoryName 	= URLSafe(html_entity_decode($category_name));

				$segments[] = URLSafe(_HWDVS_SEF_VIEWCATEGORY);
				unset( $query['task'] );
				$segments[] = $query['cat_id'];
				unset( $query['cat_id'] );
				$segments[] = $categoryName;
			break;

			

			default:
				$segments[] = $query['task'];
				unset( $query['task'] );
			break;

////
// downloadfile
// deliverthumb
// savegroup
// deletegroup
// joingroup
// leavegroup
// savevideo
// deletevideo
// setusertemplate
// publishvideo
// rate
// addfavourite
// removefavourite
// addvideotogroup
// reportvideo
// reportgroup
// ajax_rate
// ajax_addtofavourites
// ajax_removefromfavourites
// ajax_reportvideo
// ajax_addvideotogroup
// grabjomsocialplayer
// insertVideo

		}
	}
	
	return $segments;
	
}

function getSongById($song_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidssongs AS a'; 
		$query .= ' WHERE a.id ='.$song_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }

function getBandById($band_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidsbands AS a'; 
		$query .= ' WHERE a.id ='.$band_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }

function saveVideoUri($paramUri,$paramId){
	
	$db =& JFactory::getDBO();
	$sqlquery = 'UPDATE #__hwdvidsvideos SET uri = "'.$paramUri.'"'.
					   ' WHERE id = '.$paramId;
	$db->SetQuery($sqlquery);
	
	$row = $db->query();
	return $row;
	}
	
function getVideoByUri ($paramUri){
	$db =& JFactory::getDBO();
	$sqlquery = 'SELECT v.id'
					   . ' FROM #__hwdvidsvideos AS v'
					   . ' WHERE v.uri = "'.$paramUri.'"'
					   ;
	$db->SetQuery($sqlquery);
	$row = $db->loadObject();
	return $row;
	}	

function slug($string){
	$chars = 'Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Ã|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ê|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ő|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, ã|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ê|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, õ|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, м|m, Н|N, н|n, П|P, п|p, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ş|S, İ|I, Ğ|G, ş|s, ğ|g, ı|i, $|S, ¥|Y, £|L, ù|u, °|o, º|o, ª|a';
	$oUri = $string;
	$elements = explode(',', $chars);
			foreach ($elements as $element) {
				@list($source, $destination) = explode('|', JString::trim($element));
				
				$source = JString::trim($source);
				$destination = JString::trim($destination);
				
				// Empty source, continue
                if ($source == '') {
					continue;
				}
				
				$oUri = str_replace($source, $destination, $oUri);
			}
	
	$oUri = str_replace('//', '/', $oUri);
	$oUri = str_replace('--', '-', $oUri);
	$oUri = rtrim($oUri, '-');
	//return strtolower(trim(preg_replace(array('/\'/', '/[^a-zA-Z0-9\-!.,+]+/', '/(^_|_$)/'), array('', 'Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Ã|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ê|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ő|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, ã|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ê|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, õ|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, м|m, Н|N, н|n, П|P, п|p, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ş|S, İ|I, Ğ|G, ş|s, ğ|g, ı|i, $|S, ¥|Y, £|L, ù|u, °|o, º|o, ª|a', ''), $string)));
	return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($oUri, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
	}

function hwdVideoShareParseRoute($segments)
{
	require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'config.hwdvideoshare.php');
	require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'initialise.php');
	hwdvsInitialise::getJVersion();
	hwdvsInitialise::language('plugs');
	$vars = array();
	switch($segments[0])
	{
		case URLSafe(_HWDVS_SEF_FP):
			$vars['task'] = 'frontpage';
		break;

		case URLSafe(_HWDVS_SEF_UPLOAD):
			$vars['task'] = 'upload';
		break;

		case URLSafe(_HWDVS_SEF_UPLOADEDP):
			$vars['task'] = 'uploadconfirmperl';
		break;

		case URLSafe(_HWDVS_SEF_UPLOADEDF):
			$vars['task'] = 'uploadconfirmflash';
		break;

		case URLSafe(_HWDVS_SEF_UPLOADEDB):
			$vars['task'] = 'uploadconfirmphp';
		break;

		case URLSafe(_HWDVS_SEF_ADDED):
			$vars['task'] = 'addconfirm';
		break;

		case URLSafe(_HWDVS_SEF_YV):
			$vars['task'] = 'yourvideos';
		break;

		case URLSafe(_HWDVS_SEF_YF):
			$vars['task'] = 'yourfavourites';
		break;

		case URLSafe(_HWDVS_SEF_EDITVIDEO):
			$vars['task'] = 'editvideo';
		break;

		case URLSafe(_HWDVS_SEF_FEATUREDVIDEOS):
			$vars['task'] = 'featuredvideos';
		break;

		case URLSafe(_HWDVS_SEF_FEATUREDGROUPS):
			$vars['task'] = 'featuredgroups';
		break;

		case URLSafe(_HWDVS_SEF_RSS):
			$vars['task'] = 'rss';
			$vars['feed'] = $segments[1];
		break;

		case URLSafe(_HWDVS_SEF_CATEGORIES):
			$vars['task'] = 'categories';
		break;

		case URLSafe(_HWDVS_SEF_VC):
			$vars['task'] = 'gotocategory';
		break;


		case URLSafe(_HWDVS_SEF_DR):
			$vars['task'] = 'displayresults';
			$vars['category_id'] = $segments[1];
		break;

		case URLSafe(_HWDVS_SEF_VIEWVIDEO):
			$vars['task'] = 'viewvideo';
			$vars['video_id'] = $segments[1];
		break;

		case URLSafe(_HWDVS_SEF_VIEWCATEGORY):
			$vars['task'] = 'viewcategory';
			$vars['cat_id'] = $segments[1];
		break;
		
		case URLSafe(_HWDVS_SEF_VIEWCATEGORY):
			$vars['task'] = 'viewcategory';
			$vars['cat_id'] = $segments[1];
		break;

		default:
			$oSegment = preg_replace("/[^A-Za-z0-9 ]/", '', $segments[0]);
			if($oSegment === "songtutorial" || $oSegment === "theory" || $oSegment === "watchmeplay"){
				$oVideoId = getVideoByUri(str_replace(":", '-', $segments[1]));
				$vars['task'] = 'viewvideo';
				$vars['video_id'] = $oVideoId->id;
				}else{
					$vars['task'] = $segments[0];
					}
				
		break;
	}
	return $vars;
}
if (!function_exists('URLSafe'))
{
	function URLSafe($string)
	{
		jimport( 'joomla.filter.output' );
		$string = JFilterOutput::stringURLSafe($string);
		return $string;
	}
}

?>
