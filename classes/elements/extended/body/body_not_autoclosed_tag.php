<?php

/**
 * Class body_not_autoclosed_tag
 */
class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    protected $placement = [];

    public function framework_classes()
    {
        $classes = $this->class();
        if(!empty($this->placement())) {
            foreach ($this->placement() as $class => $val) {
                if (gettype($val) === 'array') {
                    foreach ($val as $sous_class => $sous_val) {
                        if(isset($this->framework()['classes'][$class][$sous_class][$sous_val-1])) {
                            $classes[] = $this->framework()['classes'][$class][$sous_class][$sous_val-1];
                        }
                    }
                }
            }
        }
        $this->class($classes);
    }

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

        return "<{$this->get_name()}{$this->attrs()}>{$html}</{$this->get_name()}>";
    }
}