<?php

/**
 * Class marquee
 *
 * @deprecated
 */
class marquee {
	use HtmlElement;

	const SCROLL = 'scroll';
	const SLIDE = 'slide';
	const ALTERNATE = 'alternate';

	const LEFT = 'left';
	const RIGHT = 'right';
	const UP = 'up';
	const DOWN = 'down';

	protected $behavior = self::SCROLL;
	protected $bgcolor = '';
	protected $direction = self::LEFT;
	protected $height = '';
	protected $hspace = '';
	protected $loop = -1;
	protected $scrollamount = 6;
	protected $scrolldelay = 85;
	protected $truespeed = 0;
	protected $vspace = '';
	protected $width = '';
}