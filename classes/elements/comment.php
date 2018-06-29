<?php

/**
 * Class comment
 *
 * @method array|comment content(array $content = null)
 */
class comment extends body_not_autoclosed_tag
{

    public function display($html = null): string
    {
        if(gettype($this->content()) === 'array' && count($this->content()) > 1) {
            $content = "\n";
            $content .= implode("\n", $this->content());
            $content .= "\n";
        }
        else {
            $content = $this->content();
        }
        return "<!-- {$content} -->";
    }
}