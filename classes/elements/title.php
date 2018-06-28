<?php

/**
 * Class title
 *
 * @method string|title content(string $content = null)
 */
class title extends head_not_autoclosed_tag {

	protected $content = '';

	public function display($html = null): string
    {
        return "<{$this->get_name()}>{$this->content()}</{$this->get_name()}>";
    }
}