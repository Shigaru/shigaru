<?php
require_once('./components/com_hwdvideoshare/hwdvideoshare.class.php');
require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'config.hwdvideoshare.php');
require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'initialise.php');
class PlgSphinxSearch
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
     * Constructor
     * @param string $hostname
     * @param int $port
     * @param string $index
     */
    function PlgSphinxSearch($hostname, $port, $index)
    {
        $this->_index = $index;

        $this->_sphinx = new SphinxClient();
        $this->_sphinx->SetServer($hostname, (int) $port);
        $this->_sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
		hwdvsInitialise::language();
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

    /**
     * Perform search
     * @param string $query
     * @return boolean
     */
    function search($query)
    {
        $this->_query = $query;
        

        $result = $this->_sphinx->Query($query, $this->_index);
        /*echo '<pre>';
			print_r($result);
        echo '</pre>';
*/
        if ( $result === false ) {
            //echo "Query failed: " . $this->_sphinx->GetLastError() . ".\n";\
            return false;
	} else if ( $this->_sphinx->GetLastWarning() ) {
            //echo "WARNING: " . $this->_sphinx->GetLastWarning() . "\n";
            return false;
        }

        if ( ! empty($result["matches"]) ) {
            $this->_matches = $result["matches"];
	}
        $this->_searchTime = $result['time'];
        $this->_total = $result['total_found'];
    }

    function getResults()
    {
        return array();
    }

    function getIds()
    {
        if (!empty($this->_matches) && is_array($this->_matches)){
            return array_keys($this->_matches);
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
            case 'newest':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'date_added');
                break;
            case 'oldest':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_ASC, 'date_added');
                break;
            case 'popular':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'date_added');
                break;
            case 'category':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_ASC, 'date_added');
                break;
            case 'alpha':
                $this->_sphinx->SetSortMode(SPH_SORT_ATTR_ASC, 'date_added');
                break;
            default:
                break;
        }

    }
}
