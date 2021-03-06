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
require_once(JPATH_SITE.DS.'plugins'.DS.'search'.DS.'sphinxapi.php');
/**
 * ACL functions: original code from com_comprofiler
 *
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC2.13
 */
class hwd_vs_search
{
	/**
     * Total sphinx search time in seconds
     * @var float
     */
    var $_searchTime = 0;

    /**
     * Total sphinx search records found
     * @var int
     */
    var $_total = 0;

    var $_query = '';

    /**
     * Sphinx index name
     * @var string
     */
    var $_index = '';

    /**
     * Sphinx Search object
     * @var SphinxClient
     */
    var $_sphinx = null;
    /**
     * Query SQL for all accessible category data
     *
     * @return       Nothing
     */
     
     /**
     * Constructor
     * @param string $hostname
     * @param int $port
     * @param string $index
     */
    function init($index='indexVideos',$sortingfield='relevance')
    {
        
        $pServer		= 'localhost' ;
		$pPort	 	= (int) 9312 ;
		$pIndex 		= $index;
		$this->_index = $pIndex;
        $this->_sphinx = new SphinxClient();
        $this->_sphinx->SetServer($pServer, (int) $pPort);
        $this->_sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
        
    }
     
     function initSearch($index='indexVideos',$sortingfield='relevance')
    {
        if(!$this->_sphinx)
			hwd_vs_search::init($index);
        hwd_vs_search::setOrder($sortingfield);
    }
     
     /**
     *
     * @return boolean
     */
    function isConnected()
    {
        return $this->_sphinx->IsConnectError();
    }

    function setLimit($offset=0, $limit=20)
    {
        $this->_sphinx->SetLimits($offset, $limit);
    }
    
    function storeSearch($parampattern, $paramtotalfound,$paramsearchtype){
		$app = & JFactory::getApplication();
		if($app->getUserState("com_hwdvideoshare.searchpattern")!=$parampattern && strlen($parampattern) > 2)
			hwd_vs_search::saveSearch($parampattern,$paramtotalfound,$paramsearchtype);
		}
	
	function saveSearchPattern($parampattern){
		$checkedpattern = hwd_vs_search::checkSearchPattern($parampattern);
		if($checkedpattern)
			return $checkedpattern[0]->id;
			else
				return hwd_vs_search::doSavePattern($parampattern);
		}
	
	function doSavePattern($parampattern){
		$db 			= & JFactory::getDBO();
		$row 			= new hwdvidssearchlog_term($db);
		$app 			= & JFactory::getApplication();
		$_POST['pattern'] 		= $parampattern;
		$_POST['last_update'] = date("Y-m-d H:i:s");
		if (!$row->bind($_POST)){
			// Add a message to the message queue
			$app->enqueueMessage('Error storing search', 'error');
			return false;
		}
		if (!$row->store())		{
			// Add a message to the message queue
			$app->enqueueMessage('Error storing search', 'error');
			return false;
			}
			
		return $row->id;			
		}
		
		
	
	function checkSearchPattern($parampattern){
		$db 	= & JFactory::getDBO();
		$rowid 	= null;
        $query 	= 'SELECT * FROM #__hwdvidssearchlog_term WHERE pattern=\''.$parampattern.'\'';
        $db->SetQuery($query);
        $row 	= $db->loadObjectList();
		if($row)
			hwd_vs_search::increasePatternHitsCounter($row);
			
		return $row;
		}	
	
	function increasePatternHitsCounter($paramrow){
		$db 			= & JFactory::getDBO();
		$row 			= new hwdvidssearchlog_term($db);
		$counthits 		= intval($paramrow[0]->count)+1;
		$query 	= 'UPDATE  #__hwdvidssearchlog_term SET  count = '.$counthits.',last_update =  \''.date("Y-m-d H:i:s").'\' WHERE  id='.$paramrow[0]->id;
		$db->SetQuery($query);
        $row 	= $db->loadObjectList();
        return $row;
		}
		
	function saveSearch($parampattern, $totalfound, $searchtype){
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$termsaved = hwd_vs_search::saveSearchPattern($parampattern);
		$_POST['term_id'] 		= $termsaved;
		if($my->id)$_POST['user_id']= $my->id; else $_POST['user_id'] 		= 0;			
		$_POST['date_searched'] = date("Y-m-d H:i:s");
		$_POST['number_results']= $totalfound;
		if(strstr($parampattern,$app->getUserState("com_hwdvideoshare.searchpattern")))
			$_POST['is_refined'] 	= 1;
			else
				$_POST['is_refined'] 	= 0;
		$lang =& JFactory::getLanguage();
		$_POST['language_id'] 	= $lang->getTag();
		$_POST['type_search'] 	= $searchtype;
		$row 			= new hwdvidssearchlog_term($db);
		hwd_vs_search::doSaveSearchPatternHit($_POST);
		$app->setUserState( "com_hwdvideoshare.searchpattern",$parampattern);
		}
	
	function doSaveSearchPatternHit($parampostobj){
		$db 			= & JFactory::getDBO();
		$row 			= new hwdvidssearchlog_hits($db);
		$app 			= & JFactory::getApplication();
		if (!$row->bind($parampostobj)){
			// Add a message to the message queue
			$app->enqueueMessage('Error storing search hit', 'error');
			return false;
		}
		if (!$row->store())		{
			// Add a message to the message queue
			$app->enqueueMessage('Error storing search hit', 'error');
			return false;
			}
		return $row;	
		}
		
    /**
     * Perform search
     * @param string $query
     * @return boolean
     */
    function search($query,$limitstart, $limitv,$sort,$level_id,$category_id,$genre_id,$language_id,$daterange,$intrument_id,$video_length)
    {
       hwd_vs_search::initSearch('indexVideos',$sort);
		$limit              = isset($_REQUEST['limit']) ? (int) $_REQUEST['limit'] : 50 ;
		if(0 === $limit) {
			$limit = 10000;
		}
		// clean up our search text
		$text = trim( $query );
		$this->_query = $this->_sphinx->escapeString($text);
		hwd_vs_search::setFilters($level_id,$category_id,$genre_id,$language_id,$daterange,$intrument_id,$video_length);
		hwd_vs_search::setLimit($limitstart, $limitv);
        $result = $this->_sphinx->Query($this->_query, $this->_index);
       /* echo '<pre>';
		var_dump($result);
		echo '</pre>';*/
        if ( $result === false ) {
            echo "Query failed: " . $this->_sphinx->GetLastError() . ".\n";
            //return false;
	} else if ( $this->_sphinx->GetLastWarning() ) {
            echo "WARNING: " . $this->_sphinx->GetLastWarning() . "\n";
            //return false;
        }

        if ( ! empty($result["matches"]) ) {
            $this->_matches = $result["matches"];
            hwd_vs_search::storeSearch($searchText,$result['total_found'],0);
	}
        $this->_searchTime = $result['time'];
        $this->_total = $result['total_found'];
       
        return $result;
    }
    
    /**
     * Perform search
     * @param string $query
     * @return boolean
     */
    function searchUsers($query,$limitstart, $limitv,$sort)
    {
       hwd_vs_search::initSearch('indexUsers');
		$limit              = isset($_REQUEST['limit']) ? (int) $_REQUEST['limit'] : 50 ;
		if(0 === $limit) {
			$limit = 10000;
		}
		// clean up our search text
		$text = trim( $query );
		$this->_query = $this->_sphinx->escapeString($text);	
		//hwd_vs_search::setFilters($level_id,$category_id,$genre_id,$language_id,$daterange,$intrument_id,$video_length);
		hwd_vs_search::setLimit($limitstart, $limitv);
        $result = $this->_sphinx->Query($this->_query, $this->_index);
        /*echo '<pre>';
		var_dump($result);
		echo '</pre>';*/
        if ( $result === false ) {
            echo "Query failed: " . $this->_sphinx->GetLastError() . ".\n";
            //return false;
	} else if ( $this->_sphinx->GetLastWarning() ) {
            echo "WARNING: " . $this->_sphinx->GetLastWarning() . "\n";
            //return false;
        }

        if ( ! empty($result["matches"]) ) {
            $this->_matches = $result["matches"];
	}
        $this->_searchTime = $result['time'];
        $this->_total = $result['total_found'];
       
        return $result;
    }
    /**
     * Perform search
     * @param string $query
     * @return boolean
     */
    function searchVideoSongs($query,$limitstart, $limitv,$sort)
    {
       hwd_vs_search::initSearch('videosongs');
		$limit              = isset($_REQUEST['limit']) ? (int) $_REQUEST['limit'] : 50 ;
		if(0 === $limit) {
			$limit = 10000;
		}
		// clean up our search text
		$text = trim( $query );
		$searchText = $text;
		$this->_query = $this->_sphinx->escapeString($searchText);		
		//hwd_vs_search::setFilters($level_id,$category_id,$genre_id,$language_id,$daterange,$intrument_id,$video_length);
		hwd_vs_search::setLimit($limitstart, $limitv);
        $result = $this->_sphinx->Query($this->_query, $this->_index);
        /*echo '<pre>';
		var_dump($result);
		echo '</pre>';*/
        if ( $result === false ) {
            echo "Query failed: " . $this->_sphinx->GetLastError() . ".\n";
            //return false;
	} else if ( $this->_sphinx->GetLastWarning() ) {
            echo "WARNING: " . $this->_sphinx->GetLastWarning() . "\n";
            //return false;
        }

        if ( ! empty($result["matches"]) ) {
            $this->_matches = $result["matches"];
	}
        $this->_searchTime = $result['time'];
        $this->_total = $result['total_found'];
       
        return $result;
    }
    
    function getDisplayUserResults($matchingVideos){
		$db =& JFactory::getDBO();
        $user   =& JFactory::getUser();
		$ids = hwd_vs_search::getIds($matchingVideos);
        $results = array();
        if (!empty($ids)) {
			$orderVideos = " ORDER BY FIELD(p.user_id, ". implode(', ', $ids) . ")";	
            $query ='SELECT DISTINCT u.registerDate,u.lastvisitDate,u.id as id,UNIX_TIMESTAMP(u.registerDate) AS date_added,u.name,u.username,u.email,p.id,p.user_id,p.firstname, 
            p.cb_youragegroup,p.avatar,p.cb_fname, p.cb_lname, p.cb_country,p.cb_language, p.cb_sex, p.cb_countryiam, p.cb_cityiam, 
			p.cb_instruplay, p.cb_instruequip, p.cb_instrulearn,p.cb_instrusing,p.cb_instruteach
			FROM jos_comprofiler AS p LEFT JOIN jos_users AS u ON p.user_id = u.id'
			. ' WHERE p.user_id in ( ' . implode(', ',$ids) . ')'
            . $orderVideos
            ;
            $db->setQuery($query);
            $results = $db->loadObjectList();
		}
            return $results;
		
		}
    
    function getDisplayVideoResults($matchingVideos,$sort=0){
		$db =& JFactory::getDBO();
        $user   =& JFactory::getUser();
		$ids = hwd_vs_search::getIds($matchingVideos);
        $results = array();
        if (!empty($ids)) {
			$orderVideos ='';
			if ($sort == 'relevance')
				{
					$orderVideos = " ORDER BY FIELD(v.id, ". implode(', ', $ids) . ")";
				}
				else if ($sort == 'date_uploaded')
				{
					$orderVideos = " ORDER BY v.date_uploaded DESC";
				}
				else if ($sort == 'updated_rating')
				{
					$orderVideos = " ORDER BY v.updated_rating DESC";
				}
				else if ($sort == 'number_of_views')
				{
					$orderVideos = " ORDER BY v.number_of_views DESC";
				}
				else
				{
					$orderVideos = " ORDER BY FIELD(v.id, ". implode(', ', $ids) . ")";
				}
            $query ='SELECT DISTINCT v.id as id, v.video_type,v.video_id,v.title,v.description,v.tags,v.song_id,v.band_id,v.language_id,v.category_id,v.genre_id,v.intrument_id,v.level_id,
			UNIX_TIMESTAMP(v.date_uploaded) AS date_added,v.video_length,v.allow_comments,v.allow_embedding,v.allow_ratings,v.rating_number_votes,v.rating_total_points,v.user_id,
			v.updated_rating,v.published,v.number_of_comments,v.public_private,v.thumb_snap,v.thumbnail,v.approved,v.number_of_views,u.username as username 
			FROM #__hwdvidsvideos AS v JOIN #__users AS u ON v.user_id = u.id'
			. ' WHERE v.id in ( ' . implode(', ',$ids) . ')'
            . $orderVideos
            ;
            

            $db->setQuery($query);
            $results = $db->loadObjectList();
		}
            return $results;
		
		}

    function getResults()
    {
        return array();
    }

    function getIds($matchingVideos)
    {
        if (!empty($matchingVideos["matches"]) && is_array($matchingVideos["matches"])){
            return array_keys($matchingVideos["matches"]);
        }
    }

    function setMatchMode($mode)
    {
        switch ($mode) {
            case 'exact':
                $this->_sphinx->SetMatchMode(SPH_MATCH_PHRASE);
                break;
            case 'all':
                $this->_sphinx->SetMatchMode(SPH_MATCH_ALL);
                break;
            case 'any':
            default:
                $this->_sphinx->SetMatchMode(SPH_MATCH_ANY);
                break;
        }

    }

    function setOrder($order)
    {
        switch ($order) {
            case 'relevance':
                $this->_sphinx->SetSortMode(SPH_SORT_RELEVANCE);
                break;
            case 'date_uploaded':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'date_added');
                break;
            case 'updated_rating':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'updated_rating');
                break;
            case 'number_of_views':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'number_of_views');
                break;
            case 'number_of_comments':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'number_of_comments');
                break;
            default:
                $this->_sphinx->SetSortMode(SPH_SORT_RELEVANCE);
                break;
        }

    }
    
    function convertArrayString2Int($array){
		$oArray = $array;
			foreach ($oArray as $key => $var) {
				$oArray[$key] = (int)$var;
			}
		return $oArray;
		
		}
    
    function crc32($val){
        $checksum = crc32($val);
        if($checksum < 0) $checksum += 4294967296;
        return $checksum;
    }
    
    function setFilters($level_id,$category_id,$genre_id,$language_id,$daterange,$intrument_id,$video_length)
    {
        if($level_id != '')$this->_sphinx->SetFilter('level_id', hwd_vs_search::convertArrayString2Int(explode(",", $level_id)), FALSE);
        if($category_id != '' && $category_id != '0' && $category_id != 0 )$this->_sphinx->SetFilter('category_id', hwd_vs_search::convertArrayString2Int(explode(",", $category_id)), FALSE);
        if($genre_id != '')$this->_sphinx->SetFilter('genre_id', array((int)$genre_id), FALSE);
        if($language_id != '')$this->_sphinx->SetFilter('language_int', array(crc32( $language_id )), FALSE);
        if($intrument_id != '')$this->_sphinx->SetFilter('intrument_id', array((int)$intrument_id), FALSE);
		if($daterange != ''){
				switch ($daterange) {
					case '1':
						$this->_sphinx->SetFilterRange('date_added', time() - (60 * 60 * 24 * 7),time());
						break;
					case '2':
						$this->_sphinx->SetFilterRange('date_added', time() - (60 * 60 * 24 * 30),time());
						break;
					case '3':
						$this->_sphinx->SetFilterRange('date_added', time() - (60 * 60 * 24 * 365),time());
						break;	
					default:
						break;
					}
				
			}
        if($video_length != ''){
				switch ($video_length) {
					case '1':
						$this->_sphinx->SetFilterFloatRange('vid_length', floatval('0.00'), floatval('3.00'));
						break;
					case '2':
						$this->_sphinx->SetFilterFloatRange('vid_length', floatval('3.00'), floatval('10.00'));
						break;
					case '3':
						$this->_sphinx->SetFilterFloatRange('vid_length', floatval('10.00'), floatval('99999999.99'));
						break;	
					default:
						break;
					}
				
			}

    }
     
	function search_split_terms($terms){
		$terms = preg_replace("/\"(.*?)\"/e", "hwd_vs_search::search_transform_term('\$1')", $terms);
		$terms = preg_split("/\s+|,/", $terms);
		$out = array();
		foreach($terms as $term){
		$term = preg_replace("/\{WHITESPACE-([0-9]+)\}/e", "chr(\$1)", $term);
		$term = preg_replace("/\{COMMA\}/", ",", $term);
		$out[] = $term;
		}
		return $out;
	}
	function search_transform_term($term){
		$term = preg_replace("/(\s)/e", "'{WHITESPACE-'.ord('\$1').'}'", $term);
		$term = preg_replace("/,/", "{COMMA}", $term);
		return $term;
	}
	function search_escape_rlike($string){
		$string = preg_replace("/([.\[\]*^\$])/", '\\\$1', $string);
		// 20110102 dhorsfall
		// remove parentheses
		$string = str_replace("(", "", $string);
		$string = str_replace(")", "", $string);
		$string = str_replace("\\", "", $string);
		return $string;
	}
	function search_db_escape_terms($terms)
	{
		$out = array();
		foreach($terms as $term)
		{
			$verifiedTerm = hwd_vs_search::search_escape_rlike($term);
			if (!empty($verifiedTerm))
			{
				$out[] = '[[:<:]]'.AddSlashes(hwd_vs_search::search_escape_rlike($term)).'[[:>:]]';
				// 20110119 dhorsfall
				// optional partial word search
				// $out[] = AddSlashes($verifiedTerm);
			}
		}
		return $out;
	}
	function search_rx_escape_terms($terms){
		$out = array();
		foreach($terms as $term){
		$out[] = '\b'.preg_quote($term, '/').'\b';
		}
		return $out;
	}
	function search_sort_results($a, $b){
		$ax = $a[score];
		$bx = $b[score];
		if ($ax == $bx){ return 0; }
		return ($ax > $bx) ? -1 : 1;
	}
	function search_html_escape_terms($terms){
		$out = array();
		foreach($terms as $term){
		if (preg_match("/\s|,/", $term)){
		$out[] = '"'.HtmlSpecialChars($term).'"';
		}else{
		$out[] = HtmlSpecialChars($term);
		}
		}
		return $out;
	}
	function search_pretty_terms($terms_html){
		if (count($terms_html) == 1){
		return array_pop($terms_html);
		}
		$last = array_pop($terms_html);
		return implode(', ', $terms_html)." and $last";
	}
	function search_perform_videos($type="core",$pattern=null,$category_id=null)
	{
        global $limitstart, $hwdvs_joinv, $hwdvs_joing, $hwdvs_selectv, $hwdvs_selectg;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

        if (empty($pattern))
        {
        	$pattern = JRequest::getVar( 'pattern', '' );
        }
        if (empty($category_id))
        {
        	$category_id = JRequest::getInt( 'category_id', '0' );
        }

        $ep          = JRequest::getVar( 'ep', '' );
        $ex          = JRequest::getVar( 'ex', '' );

        $limitv     = intval($c->vpp);

		if ($c->search_method == 1)
		{
        	$pattern     = addslashes($pattern);
			$search_vcols = "";
			if ($c->search_title == "on")
			{
				$search_vcols.= "title";
			}
			if ($c->search_title == "on" && ($c->search_descr == "on" || $c->search_keywo == "on"))
			{
				$search_vcols.= ",";
			}
			if ($c->search_descr == "on")
			{
				$search_vcols.= "description";
			}
			if ($c->search_descr == "on" && $c->search_keywo == "on")
			{
				$search_vcols.= ",";
			}
			if ($c->search_keywo == "on")
			{
				$search_vcols.= "tags";
			}

			$terms = hwd_vs_search::search_split_terms($pattern);
			$ft_pattern = implode(" ", $terms);

			if (empty($ep) && empty($ex))
			{
				$wherevids = " WHERE MATCH ($search_vcols) AGAINST ('$ft_pattern')";
			}
			else
			{
				$bm = "";
				if (!empty($pattern))
				{
					foreach($terms as $term){
						$bm.= " +$term";
					};
				}
				if (!empty($ep))
				{
					$ep_terms = hwd_vs_search::search_split_terms($ep);
					$ft_ep = implode(" ", $ep_terms);
					$bm.= " \"$ft_ep\"";
				}
				if (!empty($ex))
				{
					$ex_terms = hwd_vs_search::search_split_terms($ex);
					foreach($ex_terms as $ex_term){
						$bm.= " -$ex_term";
					}
				}
				$wherevids = " WHERE MATCH ($search_vcols) AGAINST ('$bm' IN BOOLEAN MODE)";
			}
		}
		else
		{
			$terms = hwd_vs_search::search_split_terms($pattern);
			$terms_db = hwd_vs_search::search_db_escape_terms($terms);
			$parts_v = array();
			foreach($terms_db as $term_db)
			{
				$search_vcols = "";
				if ($c->search_title == "on")
				{
					$parts_v[] = "video.title RLIKE '$term_db'";
				}
				if ($c->search_descr == "on")
				{
					$parts_v[] = "video.description RLIKE '$term_db'";
				}
				if ($c->search_keywo == "on")
				{
					$parts_v[] = "video.tags RLIKE '$term_db'";
				}
			}
			$parts_v = implode(' OR ', $parts_v);

			$wherevids = " WHERE ($parts_v)";
		}

		if ($category_id > 0)
		{
			$wherevids.= " AND video.category_id = $category_id";
		}

		$wherevids.= " AND video.published = 1 AND video.approved = 'yes'";

		//echo $wherevids."<br>";
		return $wherevids;
	}
	function search_perform_groups($type="core",$pattern=null)
	{
        global $limitstart, $hwdvs_joinv, $hwdvs_joing, $hwdvs_selectv, $hwdvs_selectg;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

        if (empty($pattern))
        {
        	$pattern = JRequest::getVar( 'pattern', '' );
        }

        $pattern     = addslashes($pattern);
        $ep          = JRequest::getVar( 'ep', '' );
        $ex          = JRequest::getVar( 'ex', '' );

        $limitg     = intval($c->gpp);

		if ($c->search_method == 1)
		{
			$search_gcols = "";
			if ($c->search_title == "on")
			{
				$search_gcols.= "group_name";
			}
			if ($c->search_title == "on" && $c->search_descr == "on")
			{
				$search_gcols.= ",";
			}
			if ($c->search_descr == "on")
			{
				$search_gcols.= "group_description";
			}

			$terms = hwd_vs_search::search_split_terms($pattern);
			$ft_pattern = implode(" ", $terms);

			if (empty($ep) && empty($ex))
			{
				$wheregroups = " WHERE MATCH ($search_gcols) AGAINST ('$ft_pattern')";
			}
			else
			{
				$bm = "";
				if (!empty($pattern))
				{
					foreach($terms as $term){
						$bm.= " +$term";
					};
				}
				if (!empty($ep))
				{
					$ep_terms = hwd_vs_search::search_split_terms($ep);
					$ft_ep = implode(" ", $ep_terms);
					$bm.= " \"$ft_ep\"";
				}
				if (!empty($ex))
				{
					$ex_terms = hwd_vs_search::search_split_terms($ex);
					foreach($ex_terms as $ex_term){
						$bm.= " -$ex_term";
					}
				}
				$wheregroups = " WHERE MATCH ($search_gcols) AGAINST ('$bm' IN BOOLEAN MODE)";
			}
		}
		else
		{
			$terms = hwd_vs_search::search_split_terms($pattern);
			$terms_db = hwd_vs_search::search_db_escape_terms($terms);
			$parts_g = array();
			foreach($terms_db as $term_db)
			{
				$search_gcols = "";
				if ($c->search_title == "on")
				{
					$parts_g[] = "group_name RLIKE '$term_db'";
				}
				if ($c->search_descr == "on")
				{
					$parts_g[] = "group_description RLIKE '$term_db'";
				}
			}
			$parts_g = implode(' OR ', $parts_g);

			$wheregroups = " WHERE $parts_g";
		}

		$wheregroups.= " AND g.published = 1";

		//echo $wheregroups."<br>";
		return $wheregroups;
	}
}
?>
