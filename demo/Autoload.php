<?php

$required = [
	'../interfaces/Generator.php',
];

$dir = opendir('../classes/elements/traits');

while (($file = readdir($dir)) !== false) {
	if($file !== '.' && $file !== '..') {
		var_dump($file);
		$required[] = "../classes/elements/traits/{$file}";
	}
}

$dir = opendir('../classes/elements');

while (($file = readdir($dir)) !== false) {
	if(is_file("../classes/elements/{$file}") && $file !== '.' && $file !== '..') {
		$required[] = "../classes/elements/{$file}";
	}
}

$required[] = '../classes/Frameworks.php';
$required[] = '../classes/HtmlGenerator.php';

foreach ($required as $item) {
	require_once $item;
}
