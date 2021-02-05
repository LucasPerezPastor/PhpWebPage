<?php

class FacebookOpenGraphTag{
    
        public $appId='',$type='',$siteName='',$locale='', $imagen=NULL,$contenido=NULL;

       

        public function __construct( $contenido=NULL, $imagen=NULL,string $appId='',string $type='',string $siteName='',string $locale=''){
                $this->contenido=$contenido;
                $this->imagen=$imagen;
                $this->appId=$appId;
                $this->siteName=$siteName;
                $this->locale=$locale;
                $this->type=$type;
        }

        public function  __toString():string{
                $prop='property';
                $og='og:';
                $out='';
                $out=(empty($this->appId))?'':HtmlTags::meta('fb:app_id',$this->appId,$prop).PHP_EOL;
                if ($this->contenido!=NULL){                       
                        $out.=(property_exists($this->contenido,'title'))?HtmlTags::meta($og.'title',$this->contenido->title,$prop).PHP_EOL:'';
                        $out.=(property_exists($this->contenido,'description'))?HtmlTags::meta($og.'description',$this->contenido->description,$prop).PHP_EOL:'';
                        $out.=(property_exists($this->contenido,'author'))?HtmlTags::meta('article:author',$this->contenido->author,$prop).PHP_EOL:'';
                        $out.=(property_exists($this->contenido,'url'))?HtmlTags::meta($og.'url',$this->contenido->url,$prop).PHP_EOL:'';
                }
                if ($this->imagen!=NULL){
                        $out.=(property_exists($this->imagen,'src'))?HtmlTags::meta($og.'image',$this->imagen->src,$prop).PHP_EOL:'';
                        $out.=(property_exists($this->imagen,'alt'))?HtmlTags::meta($og.'image:alt',$this->imagen->alt,$prop).PHP_EOL:'';    
                }
                $out.=(empty($this->type))?'':HtmlTags::meta($og.'type',$this->type,$prop).PHP_EOL;
                $out.=(empty($this->siteName))?'':HtmlTags::meta($og.'site_name',$this->siteName,$prop).PHP_EOL;
                $out.=(empty($this->locale))?'':HtmlTags::meta($og.'locale',$this->locale,$prop).PHP_EOL;
                return $out;
        }
   
}

