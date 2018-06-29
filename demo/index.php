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
    $meta1->name('description')('voila une description');

    // Style declaration
    $border_color = 'black';
    $style = $page->style()([CssTemplate::instence(
        'styles',
        [
            'color' => $border_color,
        ]
    )]);

    // Javascript script declaration
    $link_color = 'red';
    $script = $page->script()(
        // Template Javascript dans lequel on peux mettre des variables
        JsTemplate::instence(
            'script',
            [
                'color' => $link_color
            ]
        )->display()
    );

    // Page title declaration
    $title = $page->title()('mon titre');

    // Add tags to head page
    $page->head([$meta, $meta1, $title, $style, $script]);

    // <br> and <hr> tags declarations
    $br = $page->br();
    $hr = $page->hr();

    $container = $page->div();
    $container->placement(['container']);

    $row = $page->div([
        'style' => ['height' => 50],
        'placement' => ['row']
    ]);

    $col6 = $page->div([
        'class' => ['height_50', 'bg_red', 'border'],
        'placement' => ['col' => ['xs' => 'auto']]
    ]);

    $col6_2 = clone $col6;
    $col6_3 = clone $col6;
    $col6_4 = clone $col6;

    $span1 = $page->span(['html' => [
        ($page->b()('Voici une div de {nb}/12'))->class(['yellow'])
    ]]);

    $span2 = $page->span(['html' => [
        ($page->b()('Voici une autre div de {nb}/12'))->class(['yellow'])
    ]]);

    $row->html([
        $col6->html([$span1]),
        $col6_2->html([$span2]),
        $col6_3->html([$span2]),
        $col6_4->html([$span2]),
        $col6
    ]);

    $nb_col = count($row->html());

    $span1->html()[0]->content(str_replace('{nb}', $nb_col, $span1->html()[0]->content()));
    $span2->html()[0]->content(str_replace('{nb}', $nb_col, $span2->html()[0]->content()));

    $container->html([$row]);
    // Add tags to body page
    $page->body([$container]);


    // page generation
    /*if(!is_dir('./generated')) {
        mkdir('./generated/', 0777, true);
    }
    file_put_contents('./generated/index.html', $page->display()."\n");
    include './generated/index.html';*/

    echo $page->display();
}
catch (Exception $e) {
	exit($e->getMessage()."\n");
}