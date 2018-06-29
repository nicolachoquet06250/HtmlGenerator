<?php

class text extends body_not_autoclosed_tag
{
    public function display($html = null): string
    {
        return $this->content();
    }
}