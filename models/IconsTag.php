<?php 

class IconsTag{

   private $list=[];


   public function addIcon($icono){
       if (property_exists($icono,'src') && property_exists($icono,'rel') 
            && property_exists($icono,'width') && property_exists($icono,'heigth')){  
            $this->list[]=$icono;
       }
   }

   public function __toString()
   {
       $out='';
       foreach ($this->list as $value) {
           $out.=HtmlTags::icon($value->rel,$value->src,$value->width,$value->heigth).PHP_EOL;
       }
       return $out;
   }
}