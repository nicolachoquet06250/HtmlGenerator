<?php

/**
 * Class body_not_autoclosed_tag
 */
class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    protected $placement = [];

    private function add_to_classes_from_placement(&$classes, $framework_origin, $framework_actual, $class, $val) {
        if (gettype($val) === 'array') {
            foreach ($val as $sous_class => $sous_val) {
                if(isset($this->framework()['classes'][$class][$sous_class][$sous_val])) {
                    if(!in_array($this->framework()['classes'][$class][$sous_class][$sous_val], $this->class())) {
                        $classes[] = $this->framework()['classes'][$class][$sous_class][$sous_val];
                    }
                }
            }
        }
        else {
            if(gettype($class) === 'integer') {
                if (isset($this->framework()['classes'][$val])) {
                    if(!in_array($this->framework()['classes'][$val], $this->class())) {
                        $classes[] = $this->framework()['classes'][$val];
                    }
                }
            }
            else {
                if (isset($this->framework()['classes'][$class][$val])) {
                    $classes[] = $this->framework()['classes'][$class][$val];
                }
            }
        }
    }

    public function framework_classes()
    {
        $classes = $this->class();

        if(!empty($this->placement())) {
            foreach ($this->placement() as $class => $val) {
                if(gettype($val) === 'string' && gettype($class) === 'integer') {
                    $classes[] = $this->framework()['classes'][$val][''];
                }
                elseif (gettype($val) === 'array') {
                    foreach ($val as $sous_class => $sous_val) {
                        if(isset($this->framework()['classes'][$class][$sous_class][$sous_val])) {
                            if(!in_array($this->framework()['classes'][$class][$sous_class][$sous_val], $this->class())) {
                                $classes[] = $this->framework()['classes'][$class][$sous_class][$sous_val];
                            }
                        }
                        elseif(isset($this->framework()['classes'][$class][''])) {
                            $classes[] = $this->framework()['classes'][$class][''];
                        }
                    }
                }
                else {
                    if(gettype($class) === 'integer') {
                        if (isset($this->framework()['classes'][$val])) {
                            if(!in_array($this->framework()['classes'][$val], $this->class())) {
                                $classes[] = $this->framework()['classes'][$val];
                            }
                        }
                    }
                    else {
                        if (isset($this->framework()['classes'][$class][$val])) {
                            $classes[] = $this->framework()['classes'][$class][$val];
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

    public function display($html = null): string
    {
        if(!$html) {
            if ($this->content()) {
                $html = $this->content();
            } else {
                $html = '';
            }
        }

        $this->framework_classes();
        $retour = "<{$this->get_name()}{$this->attrs()}>{$html}</{$this->get_name()}>";
        preg_replace_callback('`placement=\'[^\']+\'`', function ($matches) use (&$retour) {
            $retour = str_replace(' '.$matches[0], '', $retour);
        }, $retour);
        return $retour;
    }
}