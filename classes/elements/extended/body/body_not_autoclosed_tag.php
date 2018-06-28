<?php

/**
 * Class body_not_autoclosed_tag
 *
 * @method array|body_not_autoclosed_tag        placement(array $placement = null)
 */
class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    protected $placement = [];

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