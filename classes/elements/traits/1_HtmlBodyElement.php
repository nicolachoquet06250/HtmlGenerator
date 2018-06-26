<?php

/**
 * Trait HtmlBodyElement
 *
 * @method string|HtmlBodyElement		content(string $content = null)
 *
 * @method array|HtmlBodyElement 		style(array $style = null)
 * @method string|HtmlBodyElement 		id(string $id = null)
 * @method array|HtmlBodyElement 		class(array $class = null)
 * @method string|HtmlBodyElement 		title(string $title = null)
 * @method string|HtmlBodyElement 		accesskey(string $accesskey = null)
 * @method bool|HtmlBodyElement 		contenteditable(bool $contenteditable = null)
 * @method string|HtmlBodyElement 		contextmenu(string $contextmenu = null)
 * @method string|HtmlBodyElement 		dir(string $dir = null)
 * @method bool|HtmlBodyElement 		draggable(bool $draggable = null)
 * @method string|HtmlBodyElement 		hidden(string $hidden = null)
 * @method string|HtmlBodyElement 		lang(string $lang = null)
 * @method bool|HtmlBodyElement 		spellcheck(bool $spellcheck = null)
 * @method bool|HtmlBodyElement 		tabindex(int $tabindex = null)
 */
trait HtmlBodyElement {
	use HtmlElement;

    public static $LEFT_RIGHT = 'ltr';
    public static $RIGHT_LEFT = 'rtl';
    public static $AUTO = 'auto';

    protected $content = '';

    protected $style = [];
    protected $id = '';
    protected $class = [];
    protected $title = '';
    protected $accesskey = '';
    protected $contenteditable = 'false';
    protected $contextmenu = '';
    protected $dir = 'ltr';
    protected $draggable = 'false';
    protected $hidden = '';
    protected $lang = 'fr';
    protected $spellcheck = 'false';
    protected $tabindex = 0;

    public function attrs()
    {
        $str = '';
        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && $prop !== 'content' && $value !== '' && gettype($value) !== 'array') {
                $str .= " {$prop}='{$value}'";
            }
        }

        foreach ($this as $prop => $value) {
            if($prop !== 'framework' && gettype($value) === 'array') {
                if(!empty($value)) {
                    $str .= " {$prop}='";
                    if (isset($value[0])) {
                        $str .= implode(' ', $value);
                        $str .= "'";
                    } else {
                        foreach ($value as $sous_prop => $sous_value) {
                            $str .= "{$sous_prop}: ";
                            if (gettype($sous_value) === 'array') {
                                foreach ($sous_value as $id => $item) {
                                    $sous_value[$id] .= gettype($item) === 'integer' ? 'px' : '';
                                }
                            }
                            $str .= gettype($sous_value) === 'array' ? implode(' ', $sous_value) : $sous_value;
                            $str .= ';';
                        }
                        $str .= "'";
                    }
                }
            }
        }
        return $str;
    }

	public function display(): string
    {
        return "<{$this->get_name()}{$this->attrs()}>{$this->content()}</{$this->get_name()}>";
    }
}