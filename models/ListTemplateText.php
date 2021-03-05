<?php

class ListTemplateText extends TemplateText
{
    private $list=[];

    public function __construct(array $text=NULL)
    {
        parent::__construct($text);
        if (array_key_exists('content',$text) && is_array($text['content']))
            {
                $this->list=array_merge($this->list,$text['content']);
                
            }
    }
   
    public function getListcontent():array
    {
        $out=[];
        foreach ($this->list as $value) {
            # code...
            $this->setContent($value);
            $out[].=$this->getContent();
        }
        return $out;
    }
}