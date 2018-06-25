<?php

namespace html_generator\interfaces;


use html_generator\Frameworks;

interface Generator {
	public function __construct(array $framework = Frameworks::FROM_SCRATCH);

	public function comment($text);

	public function a($href, $title, $text, $style = []);

	public function b($text, $style = []);

	public function br();

	public function hr();

	public function img($src, $alt, $title, $style = []);

	public function bdo();

	public function base($url = '');

	public function blockquote($text, $style = []);

	public function abbr($text, $style = []);

	public function address($text, $style = []);

	public function area($style = []);

	public function div($text = [], $style = []);

	public function nav($text = [], $style = []);

	public function aside($text = [], $style = []);

	public function section($text = [], $style = []);

	public function ol($li = [], $style = []);

	public function ul($li = [], $style = []);

	public function li($text, $style = []);

	public function audio($src, $style = []);

	public function meta_charset($value = '');

	public function title($text);

	public function meta($name, $content = '');

	public function link($rel, $href, $integrity = '');

	public function script($type, $src, $integrity = '');

	public function head($text);

	public function style($style = []);

	public function body($text);

	public function header($text = [], $style = []);

	public function footer($text = [], $style = []);

	public function display();
}