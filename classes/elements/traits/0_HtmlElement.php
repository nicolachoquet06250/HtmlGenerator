<?php

/**
 * Trait HtmlElement
 *
 * @method bool|array|$this 	framework(bool|array $framework = null)
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
	    // place un attribut data-$name sur un tag
        if($name === 'data') {
            if(count($arguments) === 1 || count($arguments) === 2) {
                $arguments[1] = isset($arguments[1]) ? $arguments[1] : null;
                return $this->data($arguments[0], $arguments[1]);
            }
        }
	    // vérifie que le nom de méthode recherchée est bien une méthode de l'objet
	    if(in_array($name, get_class_methods($this->get_name()))) {
	        if(isset($arguments[0])) {
	            $arguments = $arguments[0];
            }
	        return $this->$name($arguments);
        }
        // vérifie que le nom de méthode recherchée est bien une propriété de la classe
		if(in_array($name, array_keys(get_object_vars($this)))) {
		    // si il n'y a pas de paramètre, retourner la valeur de l'attribut demandé
			if(empty($arguments)) {
                return $this->$name;
			}

            // si il y a un commentaire, et que c'est un tableau
			if(gettype($arguments[0]) === 'array') {
			    foreach ($arguments[0] as $key => $valeur) {
			        if(gettype($key) === 'integer'
                        && (gettype($this->$name) === 'string' || $this->$name === null)) {
			            $this->$name = [];
			        }
					$this->$name[$key] = $valeur;
				}
			}
			// sinon, on affecte la valeur en paramètre à l'attribut
			else {
				$this->$name = $arguments[0];
			}

			return $this;
		}
		return null;
	}

	public function __invoke($content = '') {
		if($content !== '') {
			return $this->content($content);
		}
		return $this;
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

    /**
     * @return HtmlElement
     */
    public function get_void_copy() {
	    $class = get_class($this);

	    return new $class();
    }

    /**
     * @return HtmlElement
     */
    public function get_copy() {
        return clone $this;
    }

}