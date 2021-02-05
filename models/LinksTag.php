<?php

class LinksTag{
private $list=[];

   
   public function addLink($link){
       if (property_exists($link,'rel') && property_exists($link,'src') 
            && property_exists($link,'type') && property_exists($link,'asTo') && property_exists($link,'title')){  
            $this->list[]=$link;
       }
   }

   public function __toString()
   {
       $out='';
       foreach ($this->list as $value) {
           $out.=HtmlTags::link($value->rel,$value->src,$value->type,$value->title,$value->asTo).PHP_EOL;
       }
       return $out;
   }
}