<?php

class HeadContentTag{
    
    private $title='',$description='',$author='';

    public function __construct(string $title='',string $author='',string $description=''){
        $this->title=$title;
        $this->author=$author;
        $this->description=$description;
        
    }


    public function __toString()
    {
        $out='';
        $out.=HtmlTags::title($this->title).PHP_EOL;
        $out.=HtmlTags::meta('author',$this->author,'name').PHP_EOL;
        $out.=HtmlTags::meta('description',$this->description,'name').PHP_EOL;
        return $out;
    }
}