<?php

namespace html_generator;

use html_generator\interfaces\Generator;


class HtmlGenerator implements Generator {

	private $head = '',
			$body = '';

	public function __construct() {
	}

	public function display(array $framework = Frameworks::FROM_SCRATCH) {
		$str = "<!DOCTYPE html>\n";
		$str .= "<html>\n";
		$str .= "<head>\n{$this->head()}</head>\n";
		$str .= "<body>\n{$this->body()}</body>\n";
		$str .= "</html>";
		return $str;
	}

	public function comment($text) {
		$str = '<!-- ';
		if(gettype($text) === 'array') {
			$str .= "\n";
			foreach ($text as $item) {
				$str .= $item."\n";
			}
		}
		else {
			$str .= $text;
		}
		$str .= ' -->';

		return $str;
	}

	public function a($href, $title, $text, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<a href='{$href}' title='{$title}'{$style}>{$text}</a>";
	}

	public function b($text, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<b{$style}>{$text}</b>";
	}

	public function br() {
		return "<br />";
	}

	public function hr() {
		return "<hr />";
	}

	public function bdo() {
		// TODO: Implement bdo() method.
	}

	public function base($href = '') {
		return "<base href='{$href}'>";
	}

	public function blockquote($text, $style = []) {
		// TODO: Implement blockquote() method.
	}

	public function abbr($text, $style = []) {
		// TODO: Implement abbr() method.
	}

	public function address($text, $style = []) {
		// TODO: Implement address() method.
	}

	public function area($style = []) {
		// TODO: Implement area() method.
	}

	public function div($style = []) {
		// TODO: Implement div() method.
	}

	public function nav($style = []) {
		// TODO: Implement nav() method.
	}

	public function aside($style = []) {
		// TODO: Implement aside() method.
	}

	public function audio($src, $style = []) {
		// TODO: Implement audio() method.
	}

	public function meta_charset($value = '') {
		return "<meta charset='{$value}' />";
	}

	public function title($text) {
		return "<title>{$text}</title>";
	}

	public function meta($name = '', $content = '') {
		return "<meta name='{$name}' content='{$content}' />";
	}

	public function link($rel, $href) {
		return "<link rel='{$rel}' href='{$href}' />";
	}

	public function script($type, $src) {
		return "<script type='{$type}' src='{$src}'></script>";
	}

	public function head($text = null) {
		if(!$text) {
			return $this->head;
		}
		$this->head .= "{$text}\n";
		return null;
	}

	public function style($style = [], $included = false) {
		$str = "";
		if(!$included) {
			$str .= "<style>\n";
			foreach ($style as $selector => $styles) {
				$str .= "{$selector} {\n";
				foreach ($styles as $prop => $value) {
					$str .= "{$prop}:";
					if (gettype($value) === 'string') {
						$str .= " {$value}";
					} elseif (gettype($value) === 'integer') {
						$str .= " {$value}px";
					} else {
						foreach ($value as $item) {
							$str .= gettype($item) === 'string' ? " {$item}" : " {$item}px";
						}
					}
					$str .= ";\n";
				}
				$str .= "}\n";
			}
			$str .= "</style>";
		}
		else {
			$i = 0;
			foreach ($style as $prop => $value) {
				$str .= "{$prop}:";
				if (gettype($value) === 'string') {
					$str .= " {$value}";
				} elseif (gettype($value) === 'integer') {
					$str .= " {$value}px";
				} else {
					foreach ($value as $item) {
						$str .= gettype($item) === 'string' ? " {$item}" : " {$item}px";
					}
				}
				$str .= ";";
				$i++;
				if($i < count($style)) {
					$str .= " ";
				}
			}
		}
		return $str;
	}

	public function body($text = null) {
		if(!$text) {
			return $this->body;
		}
		$this->body .= "{$text}\n";
		return null;
	}

	public function header($text, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<header{$style}>\n{$text}\n</header>";
	}

	public function footer($text, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<footer{$style}>{$text}</footer>";
	}
}