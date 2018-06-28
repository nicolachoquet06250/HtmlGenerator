<?php

/**
 * Class time
 *
 * @method string|time datetime(string $datetime = null)
 * @method string|time pubdate(string $pubdate = null)
 */
class time extends body_not_autoclosed_tag {


	public function __construct() {
		$this->datetime(date('Y-m-d H:i:s'));
	}

	protected $datetime = '';
	protected $pubdate = '';
}