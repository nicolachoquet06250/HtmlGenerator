<?php

/**
 * Class input
 *
 * @method string|input name(string $name = null)
 * @method string|input type(string $type = null)
 * @method string|input placeholder(string $placeholder = null)
 * @method string|input value(string $value = null)
 */
class input extends body_autoclosed_tag
{
    protected $name = '';
    protected $type = '';
    protected $placeholder = '';
    protected $value = '';
}