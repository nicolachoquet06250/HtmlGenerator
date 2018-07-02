<?php

use html_generator\HtmlGenerator;

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

    public function display($html = null): string
    {
        if ($this->framework()) {
            $div = (new HtmlGenerator($this->framework()))->div()->placement($this->placement());
            $this->reset_placement();
            $this->placement(['btn', 'btn' => 'primary']);
            $this->placement(['form' => 'control']);
            $this->framework_classes();
            $props = [];
            foreach ($this as $prop => $val) {
                if ($prop !== 'framework') {
                    $props[$prop] = $val;
                }
            }
            $button = (new HtmlGenerator())->button($props);
            $html = $div->html([$button])->display();
        } else {
            $html = parent::display();
        }
        return $html;
    }
}