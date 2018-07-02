<?php

/**
 * Trait HtmlBodyElement
 *
 * @method string|$this		content(string $content = null)
 *
 * @method array|$this 		style(array $style = null)
 * @method string|$this 		id(string $id = null)
 * @method array|$this 		class(array $class = null)
 * @method string|$this 		title(string $title = null)
 * @method string|$this 		accesskey(string $accesskey = null)
 * @method bool|$this 		contenteditable(bool $contenteditable = null)
 * @method string|$this 		contextmenu(string $contextmenu = null)
 * @method string|$this 		dir(string $dir = null)
 * @method bool|$this 		draggable(bool $draggable = null)
 * @method string|$this 		hidden(string $hidden = null)
 * @method string|$this 		lang(string $lang = null)
 * @method bool|$this 		spellcheck(bool $spellcheck = null)
 * @method bool|$this 		tabindex(int $tabindex = null)
 *
 * events
 * @method string|$this onclick(string $onclick = null)
 */
trait HtmlBodyElement {
	use HtmlElement;

    public static $LEFT_RIGHT = 'ltr';
    public static $RIGHT_LEFT = 'rtl';
    public static $AUTO = 'auto';

    protected $content = '';
	protected $placement = [];

    protected $style = [];
    protected $id = '';
    protected $class = [];
    protected $title = '';
    protected $accesskey = '';
    protected $contenteditable = 'false';
    protected $contextmenu = '';
    protected $dir = 'ltr';
    protected $draggable = 'false';
    protected $hidden = '';
    protected $lang = 'fr';
    protected $spellcheck = 'false';
    protected $tabindex = 0;

    protected $onclick = '';

    public function attrs()
    {
        $str = '';
        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && $prop !== 'content' && $value !== '' && gettype($value) !== 'array' && $prop !== 'placement' && $prop !== 'html') {
                $str .= " {$prop}='{$value}'";
            }
        }

        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && $prop !== 'content' && gettype($value) === 'array' && $prop !== 'placement' && $prop !== 'html') {
                if(!empty($value)) {
                   $str .= " {$prop}='";
                    if (isset($value[0])) {
                        $str .= implode(' ', $value);
                        $str .= "'";
                    } else {
                        foreach ($value as $sous_prop => $sous_value) {
                            $str .= "{$sous_prop}: ";
                            if (gettype($sous_value) === 'array') {
                                foreach ($sous_value as $id => $item) {
                                    $sous_value[$id] .= gettype($item) === 'integer' ? 'px' : '';
                                }
                            }
                            if(gettype($sous_value) === 'integer') {
                                $sous_value .= 'px';
                            }
                            if(gettype($sous_value) === 'array') {
                                $str .= implode(' ', $sous_value);
                            }
                            else {
                                $str .= $sous_value;
                            }
                            $str .= ';';
                        }
                        $str .= "'";
                    }
                }
            }
        }
        return $str;
    }

	public function display($html = null): string
    {
        return "<{$this->get_name()}{$this->attrs()}>{$this->content()}</{$this->get_name()}>";
    }

    public function framework_classes()
    {
        $classes = $this->class();

        if (!empty($this->placement())) {
            foreach ($this->placement() as $class => $val) {
                if (gettype($val) === 'string' && gettype($class) === 'integer') {
                    if (isset($this->framework()['classes'][$val][''])) {
                        if (!in_array($this->framework()['classes'][$val][''], $classes)) {
                            $classes[] = $this->framework()['classes'][$val][''];
                        }
                    }
                } elseif (gettype($val) === 'array') {
                    foreach ($val as $sous_class => $sous_val) {
                        if (isset($this->framework()['classes'][$class][$sous_class][$sous_val])) {
                            if (!in_array($this->framework()['classes'][$class][$sous_class][$sous_val], $classes)) {
                                $classes[] = $this->framework()['classes'][$class][$sous_class][$sous_val];
                            }
                        } elseif (isset($this->framework()['classes'][$class][''])) {
                            if (!in_array($this->framework()['classes'][$class][''], $classes)) {
                                $classes[] = $this->framework()['classes'][$class][''];
                            }
                        }
                    }
                } else {
                    if (gettype($class) === 'integer') {
                        if (isset($this->framework()['classes'][$val])) {
                            if (!in_array($this->framework()['classes'][$val], $classes)) {
                                $classes[] = $this->framework()['classes'][$val];
                            }
                        }
                    } else {
                        if (isset($this->framework()['classes'][$class][$val])) {
                            if (!in_array($this->framework()['classes'][$class][$val], $classes)) {
                                $classes[] = $this->framework()['classes'][$class][$val];
                            }
                        }
                    }
                }
            }
        }
        $this->class($classes);
    }

	/**
	 * @param null|array $placement
	 * @return $this|array
	 */
	public function placement($placement = null) {
		if($placement === null) {
			return $this->placement;
		}
		foreach ($placement as $key => $value) {
			$this->placement[$key] = $value;
		}
		return $this;
	}

    public function reset_placement()
    {
        $this->placement = [];
    }
}