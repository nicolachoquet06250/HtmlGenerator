<?php

/**
 * Class title
 *
 * @method string|title content(string $content = null)
 */
class title {
	use HtmlHeadElement;

	protected $content = '';

	public function display(): string
    {
        return "<{$this->get_name()}>{$this->content()}</{$this->get_name()}>";
    }
}