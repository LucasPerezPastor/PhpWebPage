<?php

class TemplateText
{

    private $keys=[];
    private $content='';
   

    /**
     * Construiremos el objecto con los valores de $text, siempre y cuando
     * $text sea un array asociativo que contenga la clave $keys y la clave $content.
     * $keys debe ser otro array asociativo donde estarán las claves=>valor que se
     * usaran para susbtituir valores dentro de $content. 
     * $content debe ser un string. Los valores se pasan por referencia.
     *
     * @param [type] $text
     */
    public function __construct(&$text)
    {
        if (is_array($text))
        {
            if (array_key_exists('keys',$text))
            {
                $this->keys=$text['keys'];
            }
            if (array_key_exists('content',$text) && is_string($text['content']))
            {
                $this->content=$text['content'];
            }
        }

        
    }


    /**
     * Devuelve un string pero antes sustituye todas las claves de la propiedad content 
     * por los valores que hay guardados en la propiedad $keys.
     * Para substoituir estos valores dentro del string content debe de estar la clave
     * envuelta en {$nombre de la clave}.
     *
     * @return string
     */
    public function getContent():string
    {
        $out='';
        if (!empty($this->content) && $this->content!=NULL)
        {
            $out=$this->content;
            if (is_array($this->keys) && !empty($this->keys) && $this->keys!=NULL)
            {
                foreach ($this->keys as $key => $value) 
                {
                    # code...
                    $out=str_replace('{$'.$key.'}',$value,$out);
    
                }
            }
        }
         
        return $out;
    }


    public function __toString()
    {
        return $this->getContent();
    }

}