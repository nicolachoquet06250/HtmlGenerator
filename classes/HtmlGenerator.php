<?php

namespace html_generator;

use html_generator\interfaces\Generator;
use HtmlBodyElement;
use HtmlHeadElement;

/**
 * Class HtmlGenerator
 *
 * @package html_generator
 *
 * @method void reset()
 * @method null|\b b(array $attrs = null)
 * @method null|\a a(array $attrs = null)
 * @method null|\meta meta(array $attrs = null)
 * @method null|\link link(array $attrs = null)
 * @method null|\script script(array $attrs = null)
 * @method null|\style style(array $attrs = null)
 * @method null|\title title(array $attrs = null)
 * @method HtmlGenerator|string head(\HtmlHeadElement $element = null)
 * @method HtmlGenerator|string body(HtmlBodyElement $element = null)
 */
class HtmlGenerator implements Generator {
	private $last_balise = '';
	private $head_balises = [
		'meta',
		'title',
		'link',
		'script',
		'style'
	];
	private $head = '',
			$body = '',
			$framework;

	public function __construct(array $framework = Frameworks::FROM_SCRATCH) {
		$this->framework = $framework === Frameworks::FROM_SCRATCH ? false : $framework;
	}

	public function display($lang = 'fr') {
		$str = '';
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
		$str .= "<!DOCTYPE html>\n";
		$str .= "<html lang='{$lang}'>\n";
		$str .= $this->comment('voir site ( liste des balises HTML5 ) : http://41mag.fr/liste-des-balises-html5')."\n";
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

	/**
	 * @param $name
	 * @param $arguments
	 * @return null
	 * @throws \Exception
	 */
	public function __call($name, $arguments = []) {
		switch ($name) {
			case 'reset':
				$balise = $this->last_balise;
				$this->$balise = null;
				break;
			case 'head':
                /**
                 * @var HtmlHeadElement $element
                 */
                if(!empty($arguments) && $arguments[0]) {
                    $element = $arguments[0];
                    if (in_array($element->get_name(), $this->head_balises)) {
                        $this->head .= "{$element->display()}\n";
                    }
                    return $this;
                }
                return $this->head;
			case 'body':
                /**
                 * @var HtmlBodyElement $element
                 */
                if(!empty($arguments) && $arguments[0]) {
                    $element = $arguments[0];
                    $this->body .= "{$element->display()}\n";
                    return $this;
                }
                return $this->body;
			default:
				$this->last_balise = $name;
				$classname   = $name === 'var' ? 'html_var' : $name;
				$framework   = $this->framework === Frameworks::FROM_SCRATCH ? false : $this->framework;
				if(!isset($this->$name) || $this->$name === null) {
					$this->$name = new $classname($framework);
					if (!empty($arguments) && $arguments[0]) {
						$props = array_keys((array)$this->$name);
						foreach ($props as $id => $prop) {
							preg_replace_callback('`([a-zA-Z]+)`', function ($matches) use (&$props, $id, $prop) {
								$props[$id] = $matches[1];
							}, $prop);
						}

						foreach ($arguments[0] as $prop => $valeur) {
							if (in_array($prop, $props)) {
								$this->$name()->$prop($valeur);
							} else {
								throw new \Exception("L'attribut {$prop} n'existe pas dans l'élément html <{$name}>");
							}
						}
					}
				}
				else {
					if (!empty($arguments) && $arguments[0]) {
						$props = array_keys((array)$this->$name);
						foreach ($props as $id => $prop) {
							preg_replace_callback('`([a-zA-Z]+)`', function ($matches) use (&$props, $id, $prop) {
								$props[$id] = $matches[1];
							}, $prop);
						}

						foreach ($arguments[0] as $prop => $valeur) {
							if (in_array($prop, $props)) {
								$this->$name()->$prop($valeur);
							} else {
								throw new \Exception("L'attribut {$prop} n'existe pas dans l'élément html <{$name}>");
							}
						}
					}
				}
				return $this->$name;
		}
		return null;
	}
}