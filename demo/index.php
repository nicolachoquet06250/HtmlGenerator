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
    $style = $page->style()(
        // Template css dans lequel on peux mettre des variables
        [CssTemplate::instence(
            'styles',
            [
                'color' => $border_color,
            ]
        )]
    );

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

    // Add <title> tag
    $title = $page->title()('mon titre');

    // Add tags to head page
    $page->head([$meta, $meta1, $title, $style, $script]);

    // Add <br> and <hr> tags declarations
    $br = $page->br();
    $hr = $page->hr();

    // Add <div> tag
    $container = $page->div();
    $container->placement(['container']);

    // create first row
    /*$row = $page->div([
        'style' => ['height' => 50],
        'placement' => ['row']
    ]);

    // create first col
    $col3 = $page->div([
        'class' => ['height_50', 'bg_red', 'border'],
        'placement' => ['col' => ['xs' => 3]]
    ]);


    // Add <span> tags
    $span1 = $page->span(['html' => [
        ($page->b()('Voici une div de {nb}/12'))->class(['yellow'])
    ]]);
    $span2 = $page->span(['html' => [
        ($page->span())->placement(['icon' => 'ok'])->class(['yellow']),
        ($page->b()('Voici une autre div de {nb}/12'))->class(['yellow'])
    ]])->vars(['nb' => 1]);

    $col6_2 = $col3->get_copy()->html([$span2]);

    $col3->html([$span1]);

    // create table of cols
    $cols = [
        $col3,
        $col6_2,
        $col6_2,
        $col3,
    ];

    $nb_col = count($cols);

    // Add cols to row
    $row->html($cols)->vars(['nb' => $nb_col]);

    // clone first row for create others rows
    $row_2 = clone $row;
    $row_3 = clone $row;

    // create table of row
    $rows = [
        $row,
        $row_2,
        $row_3,
    ];*/

    $row = $page->div()->placement(['row']);

    $form = $page->form()
        ->method('GET')
        ->action('#');

    $div_email = $page->div()
        ->placement(['col' => ['xs' => 12]]);
    $input_email = $page->input()
        ->type('email')
        ->placeholder('email');
    $div_email->html([$input_email]);

    $div_password = $page->div()
        ->placement(['col' => ['xs' => 12]]);
    $input_password = $page->input()
        ->type('password')
        ->placeholder('password');
    $div_password->html([$input_password]);

    $div_submit = $page->div()
        ->placement(['col' => ['xs' => 3]]);
    $input_submit = $page->input()
        ->type('submit')
        ->value('Se connecter');
    $div_submit->html([$input_submit]);

    $form->html([
        $div_email,
        $div_password,
        $div_submit,
    ]);

    $div_form = $page->div()
        ->placement(['col' => ['xs' => 12]]);

    $div_form->html([$form]);

    $row->html([
        $div_form,
    ]);

    $rows = [
        $row,
    ];

    $container->html($rows);
    // Add tags to body page
    $page->body([
        $container
    ]);


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