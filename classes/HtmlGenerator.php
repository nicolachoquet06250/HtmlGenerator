<?php

namespace html_generator;

use html_generator\interfaces\Generator;


class HtmlGenerator implements Generator {

	private $head = '',
			$body = '',
			$framework;

	public function __construct(array $framework = Frameworks::FROM_SCRATCH) {
		$this->framework = $framework === Frameworks::FROM_SCRATCH ? false : $framework;
		var_dump($this->framework);
	}

	public function display($lang = 'fr') {
		foreach ($this->framework['css'] as $css) {
			$css['integrity'] = isset($css['integrity']) ? $css['integrity'] : '';
			$this->head(
				$this->link('stylesheet', $css['src'], $css['integrity'])
			);
		}

		foreach ($this->framework['js'] as $js) {
			$js['integrity'] = isset($js['integrity']) ? $js['integrity'] : '';
			$this->head(
				$this->script('application/javascript', $js['src'], $js['integrity'])
			);
		}
		$str = "<!DOCTYPE html>\n";
		$str .= "<html lang='{$lang}'>\n";
		$str .= "<head>\n";
		$str .= $this->comment("{$this->framework['name']}-{$this->framework['version']}-doc : {$this->framework['doc']}")."\n";
		$str .= "{$this->head()}</head>\n";
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

	public function img($src, $alt, $title, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<img src='{$src}' alt='{$alt}' title='{$title}'{$style} />";
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

	public function div($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$str = "<div{$style}>\n";
		$str .= implode("\n", $text);
		$str .= "\n</div>";
		return $str;
	}

	public function nav($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$str = "<nav{$style}>\n";
		$str .= implode("\n", $text);
		$str .= "\n</nav>";
		return $str;
	}

	public function aside($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$str = "<aside{$style}>\n";
		$str .= implode("\n", $text);
		$str .= "\n</aside>";
		return $str;
	}

	public function audio($src, $style = []) {
		// TODO: Implement audio() method.
	}

	public function section($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$str = "<section{$style}>\n";
		$str .= implode("\n", $text);
		$str .= "\n</section>";
		return $str;
	}

	private function liste($tag, $li, $style) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$str = "<{$tag}{$style}>\n";
		$str .= implode("\n", $li);
		$str .= "\n</{$tag}>";

		return $str;
	}

	public function ol($li = [], $style = []) {
		return $this->liste(__FUNCTION__, $li, $style);
	}

	public function ul($li = [], $style = []) {
		return $this->liste(__FUNCTION__, $li, $style);
	}

	public function li($text, $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		return "<li{$style}>{$text}</li>";
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

	public function link($rel, $href, $integrity = '') {
		$integrity = $integrity !== '' ? " integrity='{$integrity}' crossorigin='anonymous'" : "";
		return "<link rel='{$rel}' href='{$href}'{$integrity} />";
	}

	public function script($type, $src, $integrity = '') {
		$integrity = $integrity !== '' ? " integrity='{$integrity}' crossorigin='anonymous'" : "";
		return "<script type='{$type}' src='{$src}'{$integrity}></script>";
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

	public function header($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$text = implode("\n", $text);
		return "<header{$style}>\n{$text}\n</header>";
	}

	public function footer($text = [], $style = []) {
		$style = !empty($style) ? " style='{$this->style($style, true)}'" : "";
		$text = implode("\n", $text);
		return "<footer{$style}>{$text}</footer>";
	}
}