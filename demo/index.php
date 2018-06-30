<?php

ini_set('display_errors', 'on');

use \html_generator\Frameworks;

require_once 'Autoload.php';

try {
    // Factory declaration
    $page = new \html_generator\HtmlGenerator(Frameworks::BOOTSTRAP('v3'));

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
                'color' => $page->br()->display().$link_color
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

    $col3 = $page->div([
        'class' => ['height_50', 'bg_red', 'border'],
        'placement' => ['col' => ['xs' => 3]]
    ]);

    $span1 = $page->span(['html' => [
        ($page->b()('Voici une div de {nb}/12'))->class(['yellow'])
    ]]);

    $span2 = $page->span(['html' => [
        ($page->span())->placement(['icon' => 'ok'])->class(['yellow']),
        ($page->b()('Voici une autre div de {nb}/12'))->class(['yellow'])
    ]]);

    $col6_2 = $col3->get_copy()->html([$span2]);

    $col3->html([$span1]);

    $cols = [
        $col3,
        $col6_2,
        $col6_2,
        $col3,
    ];

    $nb_col = count($cols);

    $row->html($cols)->vars(['nb' => $nb_col]);

    $row_2 = clone $row;
    $row_3 = clone $row;

    $container->html([
        $row,
        $row_2,
        $row_3,
    ]);
    // Add tags to body page
    $page->body([
        $container
    ]);


    // page generation
    echo $page->display();
    /*if(!is_dir('./generated')) {
        mkdir('./generated/', 0777, true);
    }
    file_put_contents('./generated/index.html', $page->display()."\n");
    include './generated/index.html';*/
}
catch (Exception $e) {
	exit($e->getMessage()."\n");
}