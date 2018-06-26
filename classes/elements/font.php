<?php

/**
 * Class font
 *
 * @method string|font color(string $color = null)
 * @method string|font face(string $face = null)
 * @method int|font size(int $size = null)
 *
 * @deprecated
 */
class font {
	use HtmlBodyElement;

	protected $color = '#FFFFFF';
	protected $face = '';
	protected $size = 3;
}