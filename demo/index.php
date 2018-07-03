<?php

ini_set('display_errors', 'on');
echo '<meta charset="utf-8">';
use \html_generator\Frameworks;
use \html_generator\HtmlGenerator;

require_once 'Autoload.php';

try {
	$bootstrap_version = isset($_GET['b_version']) ? $_GET['b_version'] : (isset($argv[1]) ? $argv[1] : 'v4');
    // Factory declaration
	$framework = isset($_GET['f']) && $_GET['f'] === 'materialize' ? Frameworks::MATERIALIZE() : Frameworks::BOOTSTRAP($bootstrap_version);
    $page = new HtmlGenerator($framework);

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

    $row = $page->div()->placement(['row']);

    $form = $page->form()
        ->method('GET')
        ->action('#');

    $input_email = $page->input()
        ->type('email')
        ->placeholder('email')
		->placement(['col' => ['xs' => 12]])
		->id('email');

    $input_password = $page->input()
        ->type('password')
        ->placeholder('password')
		->class(['text'])
		->placement(['col' => ['xs' => 12]])
		->id('pw');

    $input_submit = $page->input()
        ->type('submit')
        ->value('Se connecter')
		->placement(['col' => ['xs' => 3]])->style(['cursor' => 'pointer'])->id('sub')->onclick(function () {
            return JsTemplate::instence('onclick/onclick_button', ['var' => 'test',])->display();
        });

    $form->html([
        $input_email,
        $input_password,
        $input_submit,
    ]);

    $div_form = $page->div()
        ->placement(['col' => ['xs' => 12]]);

    $div_form->html([$form]);

    $row->html([
        $div_form,
    ]);

    $row_2 = $page->div()->placement(['row']);
    $col1 = $page->div()->placement(['col' => ['xs' => 13]]);
    $col2 = $col1->get_copy();
    $col3 = $col1->get_copy();
    $col4 = $col1->get_copy();

    $row_2->html([
    	$col1->html([$page->text()('pour Materialize v1, tape ?f=materialize')]),
		$col2->html([$page->text()('pour Bootstrap v3, tape ?b_version=v3')]),
		$col3->html([$page->text()('pour Bootstrap v4, tape ?b_version=v4')]),
		$col4->html([$page->text()('par défault, c\'est BootstrapV4')])
	]);

    $rows = [
        $row,
		$row_2,
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