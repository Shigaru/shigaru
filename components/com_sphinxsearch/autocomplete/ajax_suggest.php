<?php
require_once 'functions.php';

$q = trim($_GET['q']);
$results;
$autoCompleteSearch = new SphinxAutoComplete();
$results = $autoCompleteSearch->search($q);

function cmp($a, $b){return strcmp($a->originalsource, $b->originalsource);}
usort($results['matches'],'cmp');
echo json_encode($results['matches']);
exit();
