<?php

class SrcJavaScriptsTag{

    private $list=[];

    public function __construct($src='')
    {
        $this->addSrc($src);
    }

    public function addSrc($src=''){
        if (!empty($src)){
            if (is_string($src)){
                $this->list[]=$src;
            }else
            {
              foreach ($src as $value) {
                 $this->list[]=$value;
              }      
            }
        }
    }

    public function __toString()
    {
        $out='';
        foreach ($this->list as $value) {
           $out.=HtmlTags::srcJavaScript($value).PHP_EOL;
        }
        return $out;
    }
}