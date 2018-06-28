<?php

class head_autoclosed_tag
{
    use HtmlHeadElement;

    public function display($html = null): string
    {
        return "<{$this->get_name()}{$this->attrs()} />";
    }
}