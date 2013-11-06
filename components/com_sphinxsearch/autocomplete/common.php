<?php
define ( "FREQ_THRESHOLD", 40 );
define ( "SUGGEST_DEBUG", 0);
define ( "LENGTH_THRESHOLD", 2 );
define ( "LEVENSHTEIN_THRESHOLD", 2 );
define ( "TOP_COUNT", 1 );
define ("SPHINX_20",false);
//database PDO
$ln = new PDO( 'mysql:host=localhost;dbname=shigaru;charset=utf8', 'root', 'vector2005' );

//Sphinx PDO
$ln_sph = new PDO( 'mysql:host=localhost;port=9306' , 'root', 'vector2005');
?>
