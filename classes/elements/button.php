<?php

/**
 * Class button
 *
 * @method string|input name(string $name = null)
 * @method string|button type(string $type = null)
 */
class button extends body_not_autoclosed_tag
{
    public function __construct($framework = false)
    {
        parent::__construct($framework);
        if($framework && $framework['name'] === 'bootstrap') {
            $this->class(['btn', 'btn-primary']);
        }
    }

    protected $name = '';
    protected $type = '';
}