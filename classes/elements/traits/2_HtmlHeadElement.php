<?php

trait HtmlHeadElement {
	use HtmlElement;

	public function display(): string
    {
        return "<{$this->get_name()} {$this->attrs()} />";
    }
}