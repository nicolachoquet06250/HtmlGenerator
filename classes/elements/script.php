<?php

/**
 * Class script
 *
 * @method string|script src(string $href = null)
 * @method string|script integrity(string $integrity = null)
 * @method string|script rel(string $rel = null)
 * @method string|script type(string $type = null)
 */
class script {
	use HtmlHeadElement;

	protected $type = 'application/javascript';
	protected $rel = 'javascript';
	protected $integrity = '';
	protected $src = '';

	protected function attrs()
    {
        $str = '';
        foreach ($this as $attr => $value) {
            if($attr !== 'framework') {
                if(gettype($value) !== 'array') {
                    $str .= "{$attr}='{$value}' ";
                }
            }
        }
        return $str;
    }
}