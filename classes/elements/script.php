<?php

/**
 * Class script
 *
 * @method string|script src(string $href = null)
 * @method string|script integrity(string $integrity = null)
 * @method string|script rel(string $rel = null)
 * @method string|script type(string $type = null)
 * @method string|script content(string $content = null)
 */
class script extends head_not_autoclosed_tag {

	protected $content = '';

	protected $type = 'text/javascript';
	protected $rel = 'script';
	protected $integrity = '';
	protected $src = '';

	protected function attrs()
    {
        $str = '';
        foreach ($this as $attr => $value) {
            if($attr !== 'framework' && $value !== '' && $attr !== 'content') {
                if(gettype($value) !== 'array') {
                    $str .= "{$attr}='{$value}' ";
                }
            }
        }
        return $str;
    }

    public function display($html = null): string
    {
        return $this->content() ? "<script>{$this->content()}</script>" : "<script {$this->attrs()}></script>";
    }
}