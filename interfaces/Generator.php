<?php

namespace html_generator\interfaces;


use html_generator\Frameworks;

interface Generator {
	public function __construct(array $framework = Frameworks::FROM_SCRATCH);

	public function display();
}