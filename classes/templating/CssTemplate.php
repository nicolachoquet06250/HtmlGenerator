<?php

class CssTemplate
{
    private $vars, $path;
    private function __construct($path, $vars = [])
    {
        $this->path = "./generated/css/{$path}.css";
        $this->vars = $vars;
    }

    public function display() {
        $template = file_get_contents($this->path);
        foreach ($this->vars as $var => $value) {
            $template = str_replace("#{$var}#", $value, $template);
        }
        $template = str_replace("\n", '', $template);
        preg_replace_callback('`\#([A-Za-z0-9\-\_\?\.]+)\#`', function ($matches) use (&$template) {
            $template = str_replace($matches[0], '', $template);
        }, $template);
        return $template;
    }

    public static function instence($path, $vars = []) {
        return new CssTemplate($path, $vars);
    }
}