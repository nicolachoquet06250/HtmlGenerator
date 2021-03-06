<?php

/**
 * Class style
 *
 * @method array|style content(array $content = null)
 */
class style extends head_not_autoclosed_tag
{

    protected $content = [];

    public function display($html = null): string
    {
        $str = '';

        foreach ($this->content() as $selector => $value) {
            if(gettype($value) === 'object' && get_class($value) === 'CssTemplate') {
                /**
                 * @var CssTemplate $value
                 */
                $str .= $value->display();
            }
            else {
                $str .= "{$selector} {";
                foreach ($value as $prop => $valeur) {
                    if (gettype($valeur) === 'array') {
                        foreach ($valeur as $id => $item) {
                            if (gettype($item) === 'integer') {
                                $valeur[$id] = "{$item}px";
                            }
                        }
                    }
                    $valeur = (gettype($valeur) === 'array') ? implode(' ', $valeur) : $valeur;
                    $valeur .= (gettype($valeur) === 'integer') ? 'px' : '';
                    $str .= "{$prop}: {$valeur};";
                }
                $str .= "}";
            }
        };

        return "<style>{$str}</style>";
    }
}