<?php
/**
* @version		1.5.0
* @package		AceSEF Library
* @subpackage	Database
* @copyright	2009-2011 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');
// Database class, extends JDatabase
class AceDatabase {

	protected static $_dbo;
	protected static $_row;
	/**
     * Sphinx Search object
     * @var SphinxClient
     */
    var $_sphinx = null;
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

	protected function __construct() {
		self::getDBO();
		
		
	}

	public static function getInstance() {
		static $instance;
		
		if (!isset($instance)) {
			$instance = new AceDatabase();
		}

		return $instance;
	}

	public static function getDBO() {
		if (!isset(self::$_dbo)) {
			self::$_dbo = JFactory::getDBO();
		}
	}
	
	//
	// Quote
	//
	public function quote($text, $escaped = true) {
		self::getDBO();
		$result = self::$_dbo->Quote($text, $escaped);
		self::showError();
	
		return $result;
	}
	
	//
	// Escape
	//
	public function getEscaped($text, $extra = false) {
		self::getDBO();
		$result = self::$_dbo->getEscaped($text, $extra);
		self::showError();
	
		return $result;
	}
	
	//
	// Run
	//
	public function query($query) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query);
		$result = self::$_dbo->query();
		self::showError();
		return $result;
	}
	
	//
	// Single value result
	//
	public function loadResult($query) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query);
		$result = self::$_dbo->loadResult();
		self::showError();

		return $result;
	}
	
	//
	// Single row results
	//
	public function loadRow($query) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query);
		$result = self::$_dbo->loadRow();
		
		self::showError();

		return $result;
	}
	
	public function loadAssoc($query) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query);
		$result = self::$_dbo->loadAssoc();
		self::showError();
		return $result;
	}
	
	private function crc32($val){
        $checksum = crc32($val);
        if($checksum < 0) $checksum += 4294967296;
        return $checksum;
    }
	
	/**
     * Constructor
     * @param string $hostname
     * @param int $port
     * @param string $index
     */
    private function doSphinxSearch($searchURL)
    {
        require_once(JPATH_SITE.DS.'plugins'.DS.'search'.DS.'sphinxapi.php');
        $pServer		= 'localhost' ;
		$pPort	 		= (int) 9312 ;
		$this->_index 	= 'indexSEF';
        $this->_sphinx 	= new SphinxClient();
        $this->_sphinx->SetServer($pServer, (int) $pPort);
        $this->_sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
        $this->_sphinx->SetSortMode(SPH_SORT_ATTR_DESC, 'date_added');
        $this->_sphinx->SetSortMode(SPH_SORT_RELEVANCE);
        $this->_sphinx->SetLimits(0, 1);
        $finalquery = str_replace("/", "\/", $searchURL);
        $result = $this->_sphinx->Query($finalquery, $this->_index);
        
        if ( $result===false )
		{
			$this->_row = null;

		} else{
			
				$resultids 	= array_keys($result["matches"]);
				$this->_row = AcesefFactory::getTable('AcesefSefUrls');
				$this->_row->load(implode(', ',$resultids));
		}
        return $this->_row;
    }
	
	public function loadObject($query) {
			// Run query
			self::getDBO();
			self::$_dbo->setQuery($query);
			$result = self::$_dbo->loadObject();
			self::showError();
		return $result;	
	}
	
	//
	// Single column results
	//
	public function loadResultArray($query, $index = 0) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query);
		$result = self::$_dbo->loadResultArray($index);
		self::showError();
		return $result;
	}

	//
	// Multi-Row results
	//
	public function loadRowList($query, $offset = 0, $limit = 0) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query, $offset, $limit);
		$result = self::$_dbo->loadRowList();
		self::showError();

		return $result;
	}
	
	public function loadAssocList($query, $key = '', $offset = 0, $limit = 0) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query, $offset, $limit);
		$result = self::$_dbo->loadAssocList($key);
		self::showError();

		return $result;
	}

	public function loadObjectList($query, $key = '', $offset = 0, $limit = 0) {
		// Run query
		self::getDBO();
		self::$_dbo->setQuery($query, $offset, $limit);
		$result = self::$_dbo->loadObjectList($key);
		self::showError();;
		return $result;
	}
	
	protected function showError() {
		if (AcesefFactory::getConfig()->show_db_errors == 1 && self::$_dbo->getErrorNum()) {
			throw new Exception(__METHOD__.' failed. ('.self::$_dbo->getErrorMsg().')');
		}
	}
}
