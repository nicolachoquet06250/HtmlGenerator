<?php

ini_set('display_errors', 'on');

use \html_generator\Frameworks;

require_once 'Autoload.php';

try {
    echo '<pre>';

	$generateur = new \html_generator\HtmlGenerator(Frameworks::BOOTSTRAP());

    //echo '<h1>B</h1>';
	$b = $generateur->b();
    $generateur->reset();
	$b->id('test')
        ->title('mon titre')
        ->style(['color' => 'blue'])
        ->class([
        'ma_classe',
        'col',
        'm1',
        's12'
    ]);

    //echo '<h1>A</h1>';
    $a = $generateur->a();
    $a->href('index.php?mavariable=2')
        ->content('text')
        ->style(['color' => 'red']);


    //echo '<h1>META</h1>';
    $meta = $generateur->meta();
    $meta->charset('utf-8');

    //echo '<h1>META1</h1>';
    $generateur->reset();
    $meta1 = $generateur->meta();
    $meta1->name('description');
    $meta1->content('voila une description');

    //echo '<h1>LINK</h1>';
    $link = $generateur->link()
        ->href('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')
        ->integrity('sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp');

    //echo '<h1>SCRIPT</h1>';
    $script = $generateur->script()
        ->src('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')
        ->integrity('sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp');

    //echo '<h1>STYLE</h1>';
    $style = $generateur->style()
        ->content([
            '#array' => [
                'border' => [1, 'solid', 'black'],
                'color' => 'blue'
            ]
        ]);

    //echo '<h1>TITLE</h1>';
    $title = $generateur->title()
        ->content('mon titre');

    //echo '<h1>TEST</h1>';
    $generateur
        ->head($meta)
        ->head($meta1)
        ->head($link)
        ->head($script)
        ->head($style)
        ->head($title);

    echo htmlentities($generateur->head());

	echo '</pre>';
}
catch (Exception $e) {
	exit($e->getMessage()."\n");
}
//$b = new b();
//$b->framework(Frameworks::BOOTSTRAP());

//($b->id('test')
//  ->style(['color' => 'blue'])
//  ->class(['toto', 'test'])
//  ->title('mon titre'))
//('test');
//
//var_dump(
//	$b->id(),
//	$b->style(),
//	$b->class(),
//	$b->title(),
//	$b->content()
//);

//$generator = new \html_generator\HtmlGenerator(\html_generator\Frameworks::BOOTSTRAP());
//
//$generator->head(
//	$generator->meta('viewport', 'width=device-width, initial-scale=1.0')
//);
//$generator->head(
//	$generator->meta_charset('utf-8')
//);
//$generator->head(
//	$generator->title('Page de test avec Html Generator')
//);
//$generator->head(
//	$generator->base('http://nicolaschoquet.fr/')
//);
//$generator->head(
//	$generator->style(
//		[
//			'header' => [
//				'border' => [
//					1, 'solid', 'black'
//				],
//				'height' => 'auto'
//			]
//		]
//	)
//);
//
//$header = $generator->header( [
//	$generator->comment('text'),
//	$generator->a('ormframeworkV2/rest/HelloWorld/test2/prenom=Nicolas',
//				  'test de ormframework',
//				  'test avec ormframework',
//				  [
//				  	'color' => 'blue',
//					'border' => [
//						1, 'solid', 'black'
//					]
//				  ]
//	),
//	$generator->b('toto',
//				  [
//					  'color' => 'red',
//					  'border' => [
//						  1, 'solid', 'blue'
//					  ]
//				  ]
//	),
//	$generator->br(),
//	$generator->ul(
//		[
//			$generator->li('mon text'),
//			$generator->li('mon deuxième text')
//		]
//	),
//	$generator->ol(
//		[
//			$generator->li('mon text'),
//			$generator->li('mon deuxième text')
//		]
//	),
//	]
//);
//
//$section = $generator->section(
//	[
//		$generator->b('test',
//					  [
//						  'color' => 'red',
//						  'border' => [
//							  1, 'solid', 'blue'
//						  ]
//					  ]
//		),
//		$generator->img(
//			'https://moncompte.doctissimo.local/static/generated/v2/merged/flat/design/logo_beauty_lab_pink.png?v=1529918344',
//			'logo BeautyLab',
//			'BeautyLab',
//			[
//				'background-color' => 'black'
//			]
//			),
//	]
//);
//
//$footer = $generator->footer(
//	[
//		$generator->ul(
//			[
//				$generator->li('text dans la liste de mon footer'),
//				$generator->li('text 2 dans la liste de mon footer')
//			]
//		),
//	],
//	[
//		'border' => [ 1, 'solid', 'black']
//	]
//);
//$generator->body($header);
//$generator->body($section);
//$generator->body($footer);
//
//if(!is_dir('./generated')) {
//	mkdir('./generated/', 0777, true);
//}
//file_put_contents('./generated/index.html', $generator->display()."\n");
//include './generated/index.html';