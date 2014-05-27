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
		$this->_index 	= 'suggestsbands suggestvideosshig suggestssongs suggestsalbums';
        $this->_sphinx 	= new SphinxClient();
        $this->_sphinx->SetServer($pServer, (int) $pPort);
        $this->_sphinx->SetIndexWeights(array('suggestsbands' => 10, 'suggestvideosshig' => 5, 'suggestssongs' =>10, 'suggestsalbums' => 10));
        $this->_sphinx->SetRankingMode ( SPH_RANK_PROXIMITY );
        $this->_sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
        $this->_sphinx->SetSortMode(SPH_SORT_RELEVANCE);
    }
    
    function starIt ($q){
		return stripslashes($q).'*';
	}
       
    function search($query)
    {
		$text = $this->starIt(trim( $query ));
		$this->_query = $this->_sphinx->escapeString($text);
		$result = $this->_sphinx->Query($this->_query, $this->_index);
		$arr =array();
		$arrexc =array();
		$counter=0;
		$qlang = trim($_GET['lang']);
		foreach($result['matches'] as $key => $match) {
			$arrexc[] = $match["attrs"]["title"];
		}
		$excerpts = $this->_sphinx->BuildExcerpts($arrexc, 'suggestvideosshig', $text);
		
		foreach($result['matches'] as $key => $match) {
			$object = new StdClass;  
			$object->data 	= $excerpts[$counter]; 
			$object->value 	= $match["attrs"]["title"]; 
			$object->result = $match["attrs"]["title"]; 
			$object->weight = $match["weight"]; 
			$object->pic = $match["attrs"]["pic"]; 
			$object->originalsource = $match["attrs"]["source"]; 
			switch($match["attrs"]["source"]){
				case 'bsongssource':
				 if($qlang == 'en')
					$object->source = 'Songs';
					else
					$object->source = 'Canciones';
				break;
				case 'cbandsssource':
					if($qlang == 'en')
						$object->source = 'Bands';
						else
						$object->source = 'Artistas';
				break;
				case 'dalbumssource':
					if($qlang == 'en')
					$object->source = 'Albums';
					else
					$object->source = 'Albums';
				break;
				case 'avideossource':
					if($qlang == 'en')
					$object->source = 'Tutorials'; 
					else
					$object->source = 'Tutoriales'; 
					
				break;
				} 
			$object->id = $key ; 
			$object->excerpt = $excerpts[$counter];
			$arr[] = $object;
			$counter++;
			}
		/*echo '<pre>';
		//var_dump($result['matches']);
		var_dump($excerpts);
		echo '</pre>';*/
        $this->_total = $result['total_found'];
       
        return array(
						'excerpts'=>$excerpts,
						'matches'=>$arr
					);
    } 
}
?>
