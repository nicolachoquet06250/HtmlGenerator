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
    public function __construct($framework = false)
    {
        parent::__construct($framework);
        if($framework && $framework['name'] === 'bootstrap') {
            $this->class(['form-control']);
        }
    }

    protected $name = '';
    protected $type = '';
    protected $placeholder = '';
    protected $value = '';

    public function display($html = null): string {
    	if($this->framework()) {
			$div = (new \html_generator\HtmlGenerator($this->framework()))
				->div()
				->placement($this->placement());
			$this->placement = [];
			$this->placement(['form' => 'control']);

			$props = [];
			foreach ($this as $prop => $val) {
				if($prop !== 'framework') {
					$props[$prop] = $val;
				}
			}
			$input = (new \html_generator\HtmlGenerator())->input($props);
			$html = $div->html([$input])
						->display();
		}
		else {
			$this->framework_classes();
    		$html = parent::display();
		}
		return $html;
	}
}