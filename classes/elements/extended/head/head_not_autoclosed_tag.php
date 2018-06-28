<?php

class head_not_autoclosed_tag
{
    use HtmlHeadElement;

    public function display($content = null): string
    {
        if(!$content) {
            if ($this->content()) {
                $content = $this->content();
            } else {
                $content = '';
            }
        }
        return "<{$this->get_name()}{$this->attrs()}>{$content}</{$this->get_name()}>";
    }
}