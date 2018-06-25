<?php

require_once 'Autoload.php';

$generator = new \html_generator\HtmlGenerator();

$generator->head(
	$generator->meta('viewport', 'width=device-width, initial-scale=1.0')
);
$generator->head(
	$generator->meta_charset('utf-8')
);
$generator->head(
	$generator->title('Page de test avec Html Generator')
);
$generator->head(
	$generator->base('http://nicolaschoquet.fr/')
);
$generator->head(
	$generator->style(
		[
			'header' => [
				'border' => [
					1, 'solid', 'black'
				],
				'height' => 50
			]
		]
	)
);

$header = $generator->header(
	$generator->comment('text')."\n".
	$generator->a('ormframeworkV2/rest/HelloWorld/test2/prenom=Nicolas',
				  'test de ormframework',
				  'test avec ormframework',
				  [
				  	'color' => 'blue',
					'bodrer' => [
						1, 'solid', 'black'
					]
				  ])."\n".
	$generator->b('toto')."\n".
	$generator->br()."\n".$generator->hr()
);
$generator->body($header);


var_dump($generator->display());