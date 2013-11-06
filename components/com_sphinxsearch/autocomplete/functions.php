<?php
require ( "../sphinxapi.php" );
class SphinxAutoComplete {
    var $_total = 0;
    var $_query = '';
    var $_index = '';
    var $_sphinx = null;

    function __construct() {
        $pServer		= '127.0.0.1' ;
		$pPort	 		= (int) 9312 ;
		$this->_index 	= 'suggestsearched suggestsvideos';
        $this->_sphinx 	= new SphinxClient();
        $this->_sphinx->SetServer($pServer, (int) $pPort);
        $this->_sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
        $this->_sphinx->SetSortMode(SPH_SORT_RELEVANCE);
    }
    
    function starIt ($q){
		return $q.'*';
	}
       
    function search($query)
    {
		$text = $this->starIt(trim( $query ));
		$this->_query = $text;
		$result = $this->_sphinx->Query($text, $this->_index);
		$arr =array();
		foreach($result['matches'] as $key => $match) {
		  $arr[] = $match["attrs"]["title"];
		}
		$excerpts = $this->_sphinx->BuildExcerpts($arr, 'suggestsvideos', $text);
		/*echo '<pre>';
		var_dump($result['matches']);
		var_dump($excerpts);
		echo '</pre>';*/
        $this->_total = $result['total_found'];
       
        return $excerpts;
    } 
}
?>
