<?php

/**
 * Class a
 *
 * @method string|a 	name(string $name = null)
 * @method string|a 	href(string $href = null)
 * @method string|a 	target(string $target = null)
 * @method string|a 	rel(string $rel = null)
 * @method string|a 	hreflang(string $hreflang = null)
 * @method string|a 	media(string $media = null)
 * @method string|a 	type(string $type = null)
 */
class a extends body_not_autoclosed_tag {

	protected $name = '';
	protected $href = '';
	protected $target = '';
	protected $rel = '';
	protected $hreflang = '';
	protected $media = '';
	protected $type = '';
}