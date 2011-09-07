<?php
require ( "sphinxapi.php" );

$cl = new SphinxClient ();
$cl->SetServer( "localhost", "9312" );
$cl->SetMatchMode ( SPH_MATCH_EXTENDED2 );
$cl->SetSortMode ( SPH_SORT_RELEVANCE );
$cl->AddQuery ( "viviendas", "shigaru" );
$res = $cl->RunQueries();
print_r($res);


?>
