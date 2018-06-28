<?php

/**
 * Class meta
 *
 * @method string|meta charset(string $charset = null)
 * @method string|meta name(string $name = null)
 * @method string|meta content(string $content = null)
 */
class meta extends head_autoclosed_tag {

	protected $charset = '';
	protected $name = '';
	protected $content = '';

	public function attrs()
    {
        if($this->charset() !== '') {
            $str = " charset='{$this->charset()}'";
        }
        else {
            $str = " name='{$this->name()}' content='{$this->content()}'";
        }

        return $str;
    }
}