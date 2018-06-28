<?php

ini_set('display_errors', 'on');

use \html_generator\Frameworks;

require_once 'Autoload.php';

try {
    // Factory declaration
    $page = new \html_generator\HtmlGenerator(Frameworks::BOOTSTRAP());

    // Meta charset declaration
    $meta = $page->meta();
    $meta->charset('utf-8');

    // meta description declaration
    $meta1 = $page->meta();
    $meta1  ->name('description')
            ->content('voila une description');

    // Style declaration
    $style = $page->style()
        ->content([
            '#array' => [
                'border' => [1, 'solid', 'black'],
                'color' => 'blue'
            ]
        ]);

    // Javascript script declaration
    $link_color = 'red';
    $script = $page->script()->content(
        // Template Javascript dans lequel on peux mettre des variables
        JsTemplate::instence(
            'script.js',
            [
                'color' => $link_color
            ]
        )->display()
    );

    // Page title declaration
    $title = $page->title()
        ->content('mon titre');

    // Add tags to head page
    $page->head([$meta, $meta1, $title, $style, $script]);

    // <b> tag declaration
    $b = $page->b();
    $b  ->id('test')
        ->title('mon titre')
        ->style(['color' => 'blue'])
        ->style(['border' => [1, 'solid', 'black']])
        ->class([
            'ma_classe',
            'col',
            'm1',
            's12'
        ])
        ->content('test de text en gras');

    // <a> tag declaration
    $a = $page->a();
    $a  ->href('index.php?mavariable=2')
        ->content('text')
        ->class(['link']);

    // Add <a> tag into <p> tag
    $p = $page->p();
    $p->html([$a]);

    // comment declaration
    $comment = $page->comment();
    $comment->content(['test', 'toto']);

    // <div> tag declaration
    $div1 = $page->div(['title' => 'voir un autre titre', 'html' => [$a, $b, $comment]])
                 ->placement(
                     [
                         'col' => [
                             'm' => 2,
                             's' => 3,
                             'xs' => 12
                         ],
                         'offset' => [
                             'm' => 10,
                             's' => 9
                         ]
                     ]
                 );

    // <div> tag declaration
    $div = $page->div();
    $div->title('ma div');
    $div->html([$b, $a, $comment, $div1])->style(['height' => 50, 'border' => [1, 'solid', 'black']]);

    // <nav> tag declaration
    $nav = $page->nav()->html([$b, $a])->style(['height' => 50, 'border' => [1, 'solid', 'black']]);

    // <br> and <hr> tags declarations
    $br = $page->br();
    $hr = $page->hr();

    // Add tags to body page
    $page->body([$p, $b, $br, $hr, $comment, $div, $nav]);


    // page generation
    if(!is_dir('./generated')) {
        mkdir('./generated/', 0777, true);
    }
    file_put_contents('./generated/index.html', $page->display()."\n");
    include './generated/index.html';
}
catch (Exception $e) {
	exit($e->getMessage()."\n");
}