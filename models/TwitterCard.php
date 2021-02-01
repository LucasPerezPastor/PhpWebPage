<?php

class TwitterCard{
    
        public $card='',$site='',$imagen=NULL,$contenido=NULL;

       

        public function __construct( $contenido=NULL, $imagen=NULL,string $card='',string $site='')
        {
                $this->contenido=$contenido;
                $this->imagen=$imagen;
                $this->card=$card;
                $this->site=$site;
        }

        public function  __toString():string{
                $prop='name';
                $twit='twitter:';
                $out='';
                if ($this->contenido!=NULL){                       
                        $out.=(property_exists($this->contenido,'title'))?HtmlTags::meta($twit.'title',$this->contenido->title,$prop):'';
                        $out.=(property_exists($this->contenido,'description'))?HtmlTags::meta($twit.'description',$this->contenido->description,$prop):'';
                        $out.=(property_exists($this->contenido,'author'))?HtmlTags::meta($twit.'creator',$this->contenido->author,$prop):'';
                        $out.=(property_exists($this->contenido,'url'))?HtmlTags::meta($twit.'url',$this->contenido->url,$prop):'';
                }
                if ($this->imagen!=NULL){
                        $out.=(property_exists($this->imagen,'src'))?HtmlTags::meta($twit.'image',$this->imagen->src,$prop):'';
                        $out.=(property_exists($this->imagen,'alt'))?HtmlTags::meta($twit.'image:alt',$this->imagen->alt,$prop):'';    
                }
                $out.=(empty($this->card))?'':HtmlTags::meta($twit.'card',$this->card,$prop);
                $out.=(empty($this->site))?'':HtmlTags::meta($twit.'site',$this->site,$prop);
                return $out;
        }
   
}

