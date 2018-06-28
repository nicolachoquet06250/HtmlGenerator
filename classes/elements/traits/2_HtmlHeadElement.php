<?php

trait HtmlHeadElement {
	use HtmlElement;

	public function display($html = null): string
    {
        return "<{$this->get_name()} {$this->attrs()} />";
    }
}