<?php

$required = [
	'../interfaces/Generator.php',
];

$dir = opendir('../classes/elements/traits');
$tmp = [];
while (($file = readdir($dir)) !== false) {
	if($file !== '.' && $file !== '..') {
		$tmp[] = "../classes/elements/traits/{$file}";
	}
}

asort($tmp);

foreach ($tmp as $file) {
	$required[] = $file;
}

$dir = opendir('../classes/elements/extended');

while (($file = readdir($dir)) !== false) {
    if($file !== '.' && $file !== '..') {
        if(is_file("../classes/elements/extended/{$file}")) {
            $required[] = "../classes/elements/extended/{$file}";
        }
        else {
            $_dir = opendir("../classes/elements/extended/{$file}");
            while (($_file = readdir($_dir)) !== false) {
                if($_file !== '.' && $file !== '..') {
                    if(is_file("../classes/elements/extended/{$file}/{$_file}")) {
                        $required[] = "../classes/elements/extended/{$file}/{$_file}";
                    }
                }
            }
        }
    }
}

$dir = opendir('../classes/templating');

while (($file = readdir($dir)) !== false) {
    if($file !== '.' && $file !== '..') {
        $required[] = "../classes/templating/{$file}";
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
