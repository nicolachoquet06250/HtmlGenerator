<?php

namespace html_generator;

use html_generator\interfaces\Generator;
use HtmlBodyElement;
use HtmlHeadElement;

/**
 * Class HtmlGenerator
 *
 * @package html_generator
 *
 *
 * -- <head></head>
 * @method null|\meta meta(array $attrs = null)
 * @method null|\link link(array $attrs = null)
 * @method null|\script script(array $attrs = null)
 * @method null|\style style(array $attrs = null)
 * @method null|\title title(array $attrs = null)
 *
 *
 * -- <body></body>
 * @method null|\acronym acronym(array $attrs = null)
 * @method null|\basefont basefont(array $attrs = null)
 * @method null|\big big(array $attrs = null)
 * @method null|\clin clin(array $attrs = null)
 * @method null|\font font(array $attrs = null)
 * @method null|\listing listing(array $attrs = null)
 * @method null|\marquee marquee(array $attrs = null)
 * @method null|\nextid nextid(array $attrs = null)
 * @method null|\nobr nobr(array $attrs = null)
 * @method null|\spacer spacer(array $attrs = null)
 * @method null|\strike strike(array $attrs = null)
 * @method null|\tt tt(array $attrs = null)
 * @method null|\u u(array $attrs = null)
 * @method null|\xmp xmp(array $attrs = null)
 * @method null|\a a(array $attrs = null)
 * @method null|\p p(array $attrs = null)
 * @method null|\abbr abbr(array $attrs = null)
 * @method null|\address address(array $attrs = null)
 * @method null|\area area(array $attrs = null)
 * @method null|\aside aside(array $attrs = null)
 * @method null|\audio audio(array $attrs = null)
 * @method null|\b b(array $attrs = null)
 * @method null|\base base(array $attrs = null)
 * @method null|\blockquote blockquote(array $attrs = null)
 * @method null|\br br(array $attrs = null)
 * @method null|\cite cite(array $attrs = null)
 * @method null|\code code(array $attrs = null)
 * @method null|\dfn dfn(array $attrs = null)
 * @method null|\div div(array $attrs = null)
 * @method null|\em em(array $attrs = null)
 * @method null|\footer footer(array $attrs = null)
 * @method null|\header header(array $attrs = null)
 * @method null|\hr hr(array $attrs = null)
 * @method null|\html_var var(array $attrs = null)
 * @method null|\i i(array $attrs = null)
 * @method null|\img img(array $attrs = null)
 * @method null|\kdb kdb(array $attrs = null)
 * @method null|\li li(array $attrs = null)
 * @method null|\mark mark(array $attrs = null)
 * @method null|\nav nav(array $attrs = null)
 * @method null|\ol ol(array $attrs = null)
 * @method null|\pre pre(array $attrs = null)
 * @method null|\q q(array $attrs = null)
 * @method null|\rp rp(array $attrs = null)
 * @method null|\rt rt(array $attrs = null)
 * @method null|\ruby ruby(array $attrs = null)
 * @method null|\s s(array $attrs = null)
 * @method null|\samp samp(array $attrs = null)
 * @method null|\section section(array $attrs = null)
 * @method null|\small small(array $attrs = null)
 * @method null|\span span(array $attrs = null)
 * @method null|\strong strong(array $attrs = null)
 * @method null|\sub sub(array $attrs = null)
 * @method null|\sup sup(array $attrs = null)
 * @method null|\table table(array $attrs = null)
 * @method null|\td td(array $attrs = null)
 * @method null|\th time(array $attrs = null)
 * @method null|\tr tr(array $attrs = null)
 * @method null|\ul ul(array $attrs = null)
 * @method null|\wbr wbr(array $attrs = null)
 * @method null|\form form(array $attrs = null)
 * @method null|\input input(array $attrs = null)
 * @method null|\button button(array $attrs = null)
 * @method null|\select select(array $attrs = null)
 * @method null|\option option(array $attrs = null)
 *
 * @method null|\text text(array $attr = null)
 * @method null|\comment comment(array $attrs = null)
 *
 *
 * @method HtmlGenerator|string head(\HtmlHeadElement|array $element = null)
 * @method HtmlGenerator|string body(HtmlBodyElement|array $element = null)
 */
class HtmlGenerator implements Generator
{
    private $head_balises = ['meta', 'title', 'link', 'script', 'style'];
    private $head = '', $body = '', $framework;

    public function __construct(array $framework = Frameworks::FROM_SCRATCH)
    {
        $this->framework = $framework === Frameworks::FROM_SCRATCH ? false : $framework;

        if (isset($this->framework['css'])) {
            foreach ($this->framework['css'] as $css) {
                $css['integrity'] = isset($css['integrity']) ? $css['integrity'] : '';
                $this->head($this->link(['href' => $css['src'], 'integrity' => $css['integrity']]));
            }
        }

        if (isset($this->framework['js'])) {
            foreach ($this->framework['js'] as $js) {
                $js['integrity'] = isset($js['integrity']) ? $js['integrity'] : '';
                $this->head($this->script(['src' => $js['src'], 'integrity' => $js['integrity']]));
            }
        }
    }

    public function display($lang = 'fr')
    {
        $str = '';
        $str .= "<!DOCTYPE html>\n";
        $str .= "<html lang='{$lang}'>\n";
        $str .= $this->comment(['content' => 'voir site ( liste des balises HTML5 ) : http://41mag.fr/liste-des-balises-html5'])->display() . "\n";
        $str .= "<head>\n";
        if (!empty($this->framework)) {
            $str .= $this->comment(['content' => "{$this->framework['name']}-{$this->framework['version']}-doc : {$this->framework['doc']}"])->display() . "\n";
        }
        $str .= "{$this->head()}</head>\n";
        $str .= "<body>\n{$this->body()}</body>\n";
        $str .= "</html>";
        return $str;
    }

    /**
     * @param $name
     * @param $arguments
     * @return null|HtmlGenerator|\string
     * @throws \Exception
     */
    public function __call($name, $arguments = [])
    {
        switch ($name) {
            case 'head':
                /**
                 * @var HtmlHeadElement $element
                 */
                if (!empty($arguments) && $arguments[0]) {
                    if(gettype($arguments[0]) === 'object' && ($arguments[0] instanceof \head_not_autoclosed_tag || $arguments[0] instanceof \head_autoclosed_tag)) {
                        $element = $arguments[0];
                        if (in_array($element->get_name(), $this->head_balises)) {
                            $this->head .= "{$element->display()}\n";
                        }
                    }
                    elseif(gettype($arguments[0]) ==='array') {
                        $elements = $arguments[0];
                        foreach ($elements as $element) {
                            if (in_array($element->get_name(), $this->head_balises)) {
                                $this->head .= "{$element->display()}\n";
                            }
                        }
                    }
                    return $this;
                }
                return $this->head;
            case 'body':
                /**
                 * @var HtmlBodyElement $element
                 */
                if (!empty($arguments) && $arguments[0]) {
                    if(gettype($arguments[0]) === 'object' && ($arguments[0] instanceof \body_not_autoclosed_tag || $arguments[0] instanceof \body_autoclosed_tag)) {
                        $element = $arguments[0];
                        $this->body .= "{$element->display()}\n";
                    }
                    elseif (gettype($arguments[0]) === 'array') {
                        $elements = $arguments[0];
                        foreach ($elements as $element) {
                            $this->body .= "{$element->display()}\n";
                        }
                    }
                    return $this;
                }
                return $this->body;
            default:
                $classname = $name === 'var' ? 'html_var' : $name;
                $framework = $this->framework === Frameworks::FROM_SCRATCH ? false : $this->framework;

                $element = new $classname($framework);
                if (!empty($arguments) && $arguments[0]) {
                    $props = array_keys((array)$element);
                    foreach ($props as $id => $prop) {
                        preg_replace_callback('`([a-zA-Z]+)`', function ($matches) use (&$props, $id, $prop) {
                            $props[$id] = $matches[1];
                        }, $prop);
                    }

                    foreach ($arguments[0] as $prop => $valeur) {
                        if (in_array($prop, $props)) {
                            $element->$prop($valeur);
                        } else {
                            throw new \Exception("L'attribut {$prop} n'existe pas dans l'élément html ".htmlentities('<')."{$name}".htmlentities('>'));
                        }
                    }
                }
                return $element;
        }
    }
}