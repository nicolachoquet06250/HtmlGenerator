<?php

namespace html_generator\interfaces;


use html_generator\Frameworks;

interface Generator {
	public function __construct();

	public function comment($text);

	public function a($href, $title, $text, $style = []);

	public function b($text, $style = []);

	public function br();

	public function hr();

	public function bdo();

	public function base($url = '');

	public function blockquote($text, $style = []);

	public function abbr($text, $style = []);

	public function address($text, $style = []);

	public function area($style = []);

	public function div($style = []);

	public function nav($style = []);

	public function aside($style = []);

	public function audio($src, $style = []);

	public function meta_charset($value = '');

	public function title($text);

	public function meta($name, $content = '');

	public function link($rel, $href);

	public function script($type, $src);

	public function head($text);

	public function style($style = []);

	public function body($text);

	public function header($text, $style = []);

	public function footer($text, $style = []);

	public function display(array $framework = Frameworks::FROM_SCRATCH);
}