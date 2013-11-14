<?php
require_once 'functions.php';

$arr =array();
$q = trim($_GET['q']);
$results;
$autoCompleteSearch = new SphinxAutoComplete();
$results = $autoCompleteSearch->search($q);
function cmp($a, $b){return strcmp($a->source, $b->source);}
usort($results['matches'],'cmp');
echo json_encode($results['matches']);
exit();
