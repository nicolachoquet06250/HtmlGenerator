<?php

class body_autoclosed_tag
{
    use HtmlBodyElement;

    public function display($html = null): string
    {
        return "<{$this->get_name()}{$this->attrs()} />";
    }
}