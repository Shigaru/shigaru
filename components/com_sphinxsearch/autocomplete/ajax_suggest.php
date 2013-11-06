<?php
require_once 'functions.php';

$arr =array();
$q = trim($_GET['term']);
$results;
$autoCompleteSearch = new SphinxAutoComplete();
$results = $autoCompleteSearch->search($q);
foreach ($results as $value) {
    $arr [] = htmlentities($value, UTF-8);
}
echo json_encode($arr);
exit();
