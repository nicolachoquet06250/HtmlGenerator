<?php

/**
 * Trait HtmlElement
 *
 * @method bool|array|HtmlElement 	framework(bool|array $framework = null)
 */
trait HtmlElement {
	protected $framework;

	public function __construct($framework = false) {
		$this->framework($framework);
	}

	public function data($name, $value = null) {
		$name = "data_{$name}";
		if($value !== null) {
            $this->$name = $value;
        }
		return $this->$name;
	}

	public function __call($name, $arguments) {
	    if(in_array($name, get_class_methods($this->get_name()))) {
	        if(isset($arguments[0])) {
	            $arguments = $arguments[0];
            }
	        return $this->$name($arguments);
        }
		if(in_array($name, array_keys(get_object_vars($this)))) {
			if(!(!empty($arguments) && $arguments[0])) {
				return $this->$name;
			}

			if(gettype($arguments[0]) === 'array') {
			    foreach ($arguments[0] as $key => $valeur) {
			        if(gettype($key) === 'integer') {
			            if(gettype($this->$name) === 'string' || $this->$name === null) {
			                $this->$name = [];
                        }
                    }
					$this->$name[$key] = $valeur;
				}
			}
			else {
				$this->$name = $arguments[0];
			}


			return $this;
		}
		if($name === 'data') {
		    if(count($arguments) === 1 || count($arguments) === 2) {
		        $arguments[1] = isset($arguments[1]) ? $arguments[1] : null;
                return $this->data($arguments[0], $arguments[1]);
            }
		}
		return null;
	}

	public function __invoke($content = '') {
		if($content === '') {
			return $this->content();
		}
		return $this->content($content);
	}

	public function display($html = null):string {
		return $this->content();
	}

	public function get_name() {
	    return explode('\\', get_class($this))[count(explode('\\', get_class($this)))-1];
    }

    protected function attrs() {
        return '';
    }
}