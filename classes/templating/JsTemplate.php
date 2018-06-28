<?php

class JsTemplate
{
    private $vars, $path;
    private function __construct($path, $vars = [])
    {
        $this->path = "./generated/js/{$path}";
        $this->vars = $vars;
    }

    public function display() {
        $template = file_get_contents($this->path);
        foreach ($this->vars as $var => $value) {
            $template = str_replace("{{$var}}", $value, $template);
        }
        return $template;
    }

    public static function instence($path, $vars = []) {
        return new JsTemplate($path, $vars);
    }
}