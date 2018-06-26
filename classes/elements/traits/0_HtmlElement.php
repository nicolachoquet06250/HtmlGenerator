<?php

/**
 * Trait HtmlElement
 *
 * @method bool|array|HtmlElement 	framework(bool|array $framework)
 *
 * @method string|HtmlElement		content(string $content = null)
 *
 * @method array|HtmlElement 		style(array $style = null)
 * @method string|HtmlElement 		id(string $id = null)
 * @method array|HtmlElement 		class(array $class = null)
 * @method string|HtmlElement 		title(string $title = null)
 * @method string|HtmlElement 		accesskey(string $accesskey = null)
 * @method bool|HtmlElement 		contenteditable(bool $contenteditable = null)
 * @method string|HtmlElement 		contextmenu(string $contextmenu = null)
 * @method string|HtmlElement 		dir(string $dir = null)
 * @method bool|HtmlElement 		draggable(bool $draggable = null)
 * @method string|HtmlElement 		hidden(string $hidden = null)
 * @method string|HtmlElement 		lang(string $lang = null)
 * @method bool|HtmlElement 		spellcheck(bool $spellcheck = null)
 * @method bool|HtmlElement 		tabindex(int $tabindex = null)
 */
trait HtmlElement {
	protected $framework;

	public static $LEFT_RIGHT = 'ltr';
	public static $RIGHT_LEFT = 'rtl';
	public static $AUTO = 'auto';

	protected $content = '';

	protected $style = [];
	protected $id = '';
	protected $class = [];
	protected $title = '';
	protected $accesskey = '';
	protected $contenteditable = 'false';
	protected $contextmenu = '';
	protected $dir = 'ltr';
	protected $draggable = 'true';
	protected $hidden = '';
	protected $lang = 'fr';
	protected $spellcheck = 'false';
	protected $tabindex = 0;

	public function __construct($framework = false) {
		$this->framework($framework);
	}

	public function data($name, $value) {
		$name = "data_{$name}";
		$this->$name = $value;
	}

	public function __call($name, $arguments) {
		if(in_array($name, array_keys(get_object_vars($this)))) {
			if(!(!empty($arguments) && $arguments[0])) {
				return $this->$name;
			}

			if(gettype($arguments[0]) === 'array') {
				foreach ($arguments[0] as $key => $valeur) {
					$this->$name[$key] = $valeur;
				}
			}
			else {
				$this->$name = $arguments[0];
			}


			return $this;
		}
		if($name === 'data') {
			if((!empty($arguments))) {
				if($arguments[0]) {
					$name = "data_{$arguments}";
				}
			}
			if(!(!empty($arguments) && $arguments[1])) {
				return $this->$name;
			}
			$this->$name = $value;
		}
		return null;
	}

	public function __invoke($content = '') {
		if($content === '') {
			return $this->content();
		}
		return $this->content($content);
	}

	public function display():string {
		return $this->content();
	}
}