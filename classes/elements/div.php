<?php

/**
 * Class div
 *
 * @method div get_copy()
 * @method div get_void_copy()
 */
class div extends body_not_autoclosed_tag {

	public function attrs() {
        $str = '';
        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && $prop !== 'content' && $value !== '' && gettype($value) !== 'array' && $prop !== 'html' && $prop !== 'vars') {
                $str .= " {$prop}='{$value}'";
            }
        }

        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && gettype($value) === 'array' && $prop !== 'html' && $prop !== 'vars') {
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

        $this->framework_classes();

        $retour = "<{$this->get_name()}{$this->attrs()}>{$html}</{$this->get_name()}>";
        preg_replace_callback('`placement=\'[^\']+\'`', function ($matches) use (&$retour) {
            $retour = str_replace(' '.$matches[0], '', $retour);
        }, $retour);
        return $retour;
    }
}