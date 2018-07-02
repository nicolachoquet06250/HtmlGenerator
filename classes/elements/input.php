<?php

use html_generator\HtmlGenerator;

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

    public function display($html = null): string {
    	if($this->framework()) {
            $this->placement(['input' => 'field']);
            $div = (new HtmlGenerator($this->framework()))->div()->placement($this->placement());
            $this->reset_placement();

            if (($this->type() === 'button' || $this->type() === 'submit' || $this->type() === 'reset') && $this->framework()['name'] !== 'bootstrap') {
                $this->placement(['btn', 'btn' => 'primary']);
            }
            $this->placement(['form' => 'control']);
            $this->framework_classes();
			$props = [];
			foreach ($this as $prop => $val) {
				if($prop !== 'framework') {
					$props[$prop] = $val;
				}
			}
            $input = (new HtmlGenerator())->input($props);
			$html = $div->html([$input])
						->display();
		}
		else {
    		$html = parent::display();
		}
		return $html;
	}
}