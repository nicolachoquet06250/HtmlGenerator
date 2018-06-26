<?php

ini_set('display_errors', 'on');

use \html_generator\Frameworks;

require_once 'Autoload.php';

try {
    $generateur = new \html_generator\HtmlGenerator(Frameworks::BOOTSTRAP());


    $meta = $generateur->meta();
    $meta->charset('utf-8');

    $generateur->reset();
    $meta1 = $generateur->meta();
    $meta1->name('description');
    $meta1->content('voila une description');

    $link = $generateur->link()
        ->href('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')
        ->integrity('sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp');

    $script = $generateur->script()
        ->src('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')
        ->integrity('sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp');

    $style = $generateur->style()
        ->content([
            '#array' => [
                'border' => [1, 'solid', 'black'],
                'color' => 'blue'
            ]
        ]);

    $title = $generateur->title()
        ->content('mon titre');

    $generateur
        ->head($meta)
        ->head($meta1)
        ->head($link)
        ->head($script)
        ->head($style)
        ->head($title);

    $b = $generateur->b();
    $b->id('test');
    $b->title('mon titre');
    $b->style(['color' => 'blue']);
    $b->style(['border' => [1, 'solid', 'black']]);
    $b->class([
        'ma_classe',
        'col',
        'm1',
        's12'
    ]);
    $b->content('test de text en gras');

    $a = $generateur->a();
    $a->href('index.php?mavariable=2')
        ->content('text')
        ->style(['color' => 'red']);

    $comment = $generateur->comment();
    $comment->content(['test', 'toto']);

    $generateur
        ->body($a)
        ->body($b)
        ->body($generateur->br())
        ->body($generateur->hr())
        ->body($comment);


    if(!is_dir('./generated')) {
        mkdir('./generated/', 0777, true);
    }
    file_put_contents('./generated/index.html', $generateur->display()."\n");
    include './generated/index.html';
}
catch (Exception $e) {
	exit($e->getMessage()."\n");
}