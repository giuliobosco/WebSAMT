<?php

require_once 'Sub.php';
require_once 'Obs.php';

$sub = new Sub();

$obs = array();
array_push($obs, new Obs());
array_push($obs, new Obs());
array_push($obs, new Obs());

foreach ($obs as $ob) {
	$sub->attach($ob);
}

echo "updating\n";
$sub->notify();

echo "\nupdating again\n";
$sub->notify();

echo "\nend\n";