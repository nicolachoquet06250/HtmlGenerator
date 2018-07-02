<?php

/**
 * Class body_not_autoclosed_tag
 *
 * @method array|$this html(array $html = null)
 * @method string|$this scope(string $scope = null)
 * @method string|$this role(string $role = null)
 */
class body_not_autoclosed_tag
{
    use HtmlBodyElement;

    protected $scope = '';
    protected $role = '';
    protected $vars = [];
    protected $html = [];

    /**
     * @param null $vars
     * @return body_not_autoclosed_tag|array
     */
    public function vars($vars = null) {
        if($vars !== null) {
            $this->vars = $vars;
            return $this;
        }
        return $this->vars;
    }

    public function display($html = null): string
    {
        if(!$html) {
            if ($this->content()) {
                $html = $this->content();
                foreach ($this->vars as $var => $value) {
                    $html = str_replace("{{$var}}", $value, $html);
                }
            } else {
                $html = [];
                /**
                 * @var body_not_autoclosed_tag|body_autoclosed_tag $html_local
                 */
                foreach ($this->html() as $html_local) {
                    $html[] = $html_local->display();
                }
                $html = implode("\n", $html);
                foreach ($this->vars as $var => $value) {
                    $html = str_replace("{{$var}}", $value, $html);
                }
            }
        }

        $this->framework_classes();
        $retour = "<{$this->get_name()}{$this->attrs()}>{$html}</{$this->get_name()}>";
        preg_replace_callback('`placement=\'[^\']+\'`', function ($matches) use (&$retour) {
            $retour = str_replace(' '.$matches[0], '', $retour);
        }, $retour);
        return $retour;
    }
}