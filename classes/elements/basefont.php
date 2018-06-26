<?php

/**
 * Class basefont
 *
 * @method string|basefont color(string $color = null)
 * @method string|basefont face(string $face = null)
 * @method int|basefont size(int $size = null)
 *
 * @deprecated
 */
class basefont {
	use HtmlElement;

	protected $color = '#FFFFFF';
	protected $face = '';
	protected $size = 3;
}