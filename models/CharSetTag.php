<?php

class CharSetTag{

    private $charset='';

    public function __construct(string $charset="utf-8")
    {
        $this->charset=$charset;
    }

    public function __toString()
    {
        return HtmlTags::meta('charset',$this->charset).PHP_EOL;
    }
}