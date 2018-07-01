<?php

/**
 * Class button
 *
 * @method string|input name(string $name = null)
 * @method string|button type(string $type = null)
 */
class button extends body_not_autoclosed_tag
{
    protected $name = '';
    protected $type = '';
}