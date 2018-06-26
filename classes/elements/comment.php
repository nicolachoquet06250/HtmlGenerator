<?php

/**
 * Class comment
 *
 * @method array|comment content(array $content = null)
 */
class comment
{
    use HtmlBodyElement;

    public function display(): string
    {
        $content = $this->content();
        if(count($this->content()) > 1) {
            $content = "\n";
            $content .= implode("\n", $this->content());
            $content .= "\n";
        }
        return "<!-- {$content} -->";
    }
}