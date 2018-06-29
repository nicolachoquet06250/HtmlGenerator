<?php

/**
 * Class link
 *
 * @method string|link href(string $href = null)
 * @method string|link integrity(string $integrity = null)
 * @method string|link rel(string $rel = null)
 * @method string|link type(string $type = null)
 */
class link extends head_autoclosed_tag {

	protected $href = '';
	protected $integrity = '';
	protected $rel = 'stylesheet';
	protected $type = 'text/css';

	protected function attrs()
    {
        $str = '';
        foreach ($this as $attr => $value) {
            if($attr !== 'framework' && $value !== '' && $attr !== 'content') {
                if(gettype($value) !== 'array') {
                    $str .= " {$attr}='{$value}'";
                }
            }
        }
        return $str;
    }
}