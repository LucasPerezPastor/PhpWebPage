<?php

class FacebookOpenGraph{
    
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
                $out=(empty($this->appId))?'':HtmlTags::meta('fb:app_id',$this->appId,$prop);
                if ($this->contenido!=NULL){                       
                        $out.=(property_exists($this->contenido,'title'))?HtmlTags::meta($og.'title',$this->contenido->title,$prop):'';
                        $out.=(property_exists($this->contenido,'description'))?HtmlTags::meta($og.'description',$this->contenido->description,$prop):'';
                        $out.=(property_exists($this->contenido,'author'))?HtmlTags::meta('article:author',$this->contenido->author,$prop):'';
                        $out.=(property_exists($this->contenido,'url'))?HtmlTags::meta($og.'url',$this->contenido->url,$prop):'';
                }
                if ($this->imagen!=NULL){
                        $out.=(property_exists($this->imagen,'src'))?HtmlTags::meta($og.'image',$this->imagen->src,$prop):'';
                        $out.=(property_exists($this->imagen,'alt'))?HtmlTags::meta($og.'image:alt',$this->imagen->alt,$prop):'';    
                }
                $out.=(empty($this->type))?'':HtmlTags::meta($og.'type',$this->type,$prop);
                $out.=(empty($this->siteName))?'':HtmlTags::meta($og.'site_name',$this->siteName,$prop);
                $out.=(empty($this->locale))?'':HtmlTags::meta($og.'locale',$this->locale,$prop);
                return $out;
        }
   
}

