<?php

/**
 * Class body_not_autoclosed_tag
 *
 * @method array|$this html(array $html = null)
 * @method string|$this scope(string $scope = null)
 * @method string|$this role(string $role = null)
 */
class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    protected $scope = '';
    protected $role = '';
    protected $vars = [];
    protected $html = [];

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
     * @param null $vars
     * @return body_not_autoclosed_tag|array
     */
    public function vars($vars = null) {
        if($vars !== null) {
            $this->vars = $vars;
            return $this;
        }
        return $this->vars;
    }

    public function display($html = null): string
    {
        if(!$html) {
            if ($this->content()) {
                $html = $this->content();
                foreach ($this->vars as $var => $value) {
                    $html = str_replace("{{$var}}", $value, $html);
                }
            } else {
                $html = [];
                /**
                 * @var body_not_autoclosed_tag|body_autoclosed_tag $html_local
                 */
                foreach ($this->html() as $html_local) {
                    $html[] = $html_local->display();
                }
                $html = implode("\n", $html);
                foreach ($this->vars as $var => $value) {
                    $html = str_replace("{{$var}}", $value, $html);
                }
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