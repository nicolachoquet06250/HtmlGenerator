<?php

require_once 'Autoload.php';

$generator = new \html_generator\HtmlGenerator(\html_generator\Frameworks::MATERIALIZE());

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
				'height' => 'auto'
			]
		]
	)
);

$header = $generator->header( [
	$generator->comment('text'),
	$generator->a('ormframeworkV2/rest/HelloWorld/test2/prenom=Nicolas',
				  'test de ormframework',
				  'test avec ormframework',
				  [
				  	'color' => 'blue',
					'bodrer' => [
						1, 'solid', 'black'
					]
				  ]
	),
	$generator->b('toto',
				  [
					  'color' => 'red',
					  'bodrer' => [
						  1, 'solid', 'blue'
					  ]
				  ]
	),
	$generator->br(),
	$generator->ul(
		[
			$generator->li('mon text'),
			$generator->li('mon deuxième text')
		]
	),
	$generator->ol(
		[
			$generator->li('mon text'),
			$generator->li('mon deuxième text')
		]
	),
	]
);

$section = $generator->section(
	[
		$generator->b('test',
					  [
						  'color' => 'red',
						  'bodrer' => [
							  1, 'solid', 'blue'
						  ]
					  ]
		),
		$generator->img(
			'https://moncompte.doctissimo.local/static/generated/v2/merged/flat/design/logo_beauty_lab_pink.png?v=1529918344',
			'logo BeautyLab',
			'BeautyLab',
			[
				'background-color' => 'black'
			]
			),
	]
);

$footer = $generator->footer(
	[
		$generator->ul(
			[
				$generator->li('text dans la liste de mon footer'),
				$generator->li('text 2 dans la liste de mon footer')
			]
		),
	],
	[
		'border' => [ 1, 'solid', 'black']
	]
);
$generator->body($header);
$generator->body($section);
$generator->body($footer);


echo $generator->display()."\n";