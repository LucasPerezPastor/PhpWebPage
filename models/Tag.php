<?php

class Tag{

    //Clase que contien propiedades y métodos para un Tag

    private  $id='',$title=NULL,$src='', $attribute=NULL;
    private $typeOfAttribute='';

    // La variable $id debe tener valor siempre para poder localizar el árticulo 
    // dentro de la lista.

    public function __construct(string $id, $title='',string $src='',$attribute=NULL)
    {
        $this->id=$id;
        $this->title=$title;
        $this->src=$src;
        if ($attribute!=NULL){$this->addAttribute($attribute);}
    }

    /**
     *Borra los atributos del objeto
    *
    * @return void
    */
    public function removeAttribute()
    {
        $this->attribute=NULL;
    }

    /**
     * Borra los atributos del objeto 
    * y luego añade los nuevos attribute.
    *
    * @param [type] $attribute
    * @return void
    */
    public function addAttribute($attribute)
    {
        $this->removeAttribute();
        $this->updateAttribute($attribute);
    }

    /**
     * Añade atributos a los ya existentes
    *
    * @param [type] $attribute
    * @return void
    */
    public function updateAttribute($attribute)
    {
        if (is_string($attribute)){
            $this->attribute.=$attribute;
        }else{
            if (is_object($attribute)){$this->attribute.=$attribute->__toString();}     
        }
    }

    public function emptyValue($value,string $pre='',string $suf=''):string{
        if (empty($value) || $value==NULL){return '';}else{return $pre.$value.$suf;}
    }

    public function getId(string $pre='',string $suf=''):string{
        return $this->emptyValue($this->id,$pre,$suf);
    }

    public function getTitle(string $pre='',string $suf=''):string{
        return $this->emptyValue($this->title,$pre,$suf);
    }

    public function getAttribute(string $pre='',string $suf=''):string{
        return $this->emptyValue($this->attribute,$pre,$suf);
    }

    public function getSrc(string $pre='',string $suf=''):string{
        return $this->emptyValue($this->src,$pre,$suf);
    }

    public function getTypeOfAttribute(string $pre='',string $suf=''):string{
        return $this->emptyValue($this->typeOfAttribute,$pre,$suf);
    }

    public function setTypeOfAttribute(string $type){
        $this->typeOfAttribute=$type;
    }


    public function __toString()
    {
        return '<'.$this->getTypeOfAttribute().' id="'.$this->getId().'" '.$this->getAttribute().'  href="'.$this->getSrc().'">'.$this->getTitle().' </'.$this->getTypeOfAttribute().'>';
    }
}
