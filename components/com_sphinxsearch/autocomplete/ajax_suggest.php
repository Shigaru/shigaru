<?php
require_once 'functions.php';

$arr =array();
$q = trim($_GET['q']);
$results;
$autoCompleteSearch = new SphinxAutoComplete();
$results = $autoCompleteSearch->search($q);
$counter = 0;
foreach ($results['matches'] as $key => $value) {
    echo '<div class="clearfix"><div class="fleft w85">'.$results['excerpts'][$counter].'</div><img width="50" class="fleft" src="/shigaru/hwdvideos/thumbs/tp-'.$key.'.jpg"/></div>'.'|'.$results['excerpts'][$counter]. "\n";
    /*echo '<pre>';
    var_dump($value);
    echo '</pre>';*/
    $counter++;
}
exit();
