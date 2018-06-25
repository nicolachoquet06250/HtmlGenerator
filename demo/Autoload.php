<?php

$required = [
	'../interfaces/Generator.php',
	'../classes/Frameworks.php',
	'../classes/HtmlGenerator.php',
];

foreach ($required as $item) {
	require_once $item;
}
