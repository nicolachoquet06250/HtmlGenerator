<?php

/**
 * Class style
 *
 * @method array|style content(array $content = null)
 */
class style
{
    use HtmlHeadElement;

    protected $content = [];

    public function display(): string
    {
        $str = '';

        foreach ($this->content() as $selector => $value) {
            $str .= "{$selector} {";
            foreach ($value as $prop => $valeur) {
                if(gettype($valeur) === 'array') {
                    foreach ($valeur as $id => $item) {
                        if (gettype($item) === 'integer') {
                            $valeur[$id] = "{$item}px";
                        }
                    }
                }
                $valeur = (gettype($valeur) === 'array') ? implode(' ', $valeur) : $valeur;
                $str .= "{$prop}: {$valeur};";
            }
            $str .= "}";
        };

        return "<style>{$str}</style>";
    }
}