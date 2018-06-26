<?php

/**
 * Class spacer
 *
 * @deprecated
 */
class spacer {
	use HtmlElement;

	const HORIZONTAL = 'horizontal';
	const VERTICAL = 'vertical';
	const BLOCK = 'block';

	const LEFT = 'left';
	const RIGHT = 'right';
	const CENTER = 'center';

	protected $type = self::HORIZONTAL;
	protected $size = '';
	protected $width = '';
	protected $height = '';
	protected $align = '';
}