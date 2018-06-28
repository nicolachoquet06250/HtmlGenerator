<?php

class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    public function display($html = null): string
    {
        if(!$html) {
            if ($this->content()) {
                $html = $this->content();
            } else {
                $html = '';
            }
        }
        return "<{$this->get_name()}{$this->attrs()}>{$html}</{$this->get_name()}>";
    }
}