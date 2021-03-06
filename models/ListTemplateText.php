<?php

class ListTemplateText extends TemplateText
{

    private $list=[];

    public function __construct(array $text=NULL)
    {
        parent::__construct($text);//De esta forma si el array $text contiene la clave Keys la añade a la propiedad keys
        if (array_key_exists('content',$text) && is_array($text['content']))
            {
                $this->list=array_merge($this->list,$text['content']);
                
            }
    }
   
    /**
     * Devuelve un array con los contenidos de la lista ya preformateados 
     * canviado las claves por sus valores dentro del texto del contenido.
     * Para ello recorre la lista, añade el contenido y lo recupera formateado
     *
     * @return array
     */
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