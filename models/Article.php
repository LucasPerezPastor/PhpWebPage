<?php

class Article{

    //Clase que contien propiedades y métodos para un articulo de una lista HTML

    private  $id='',$title=NULL,$src='', $tags=NULL;

    // La variable $id debe tener valor siempre para poder localizar el árticulo 
    // dentro de la lista.

    public function __construct(string $id,$title='',string $src='',$tags=NULL)
    {
        $this->id=$id;
        $this->title=$title;
        $this->src=$src;
        if ($tags!=NULL){$this->addTags($tags);}
    }

    /**
     *Borra los Tags del objeto
     *
     * @return void
     */
    public function removeTags(){
        $this->tags=NULL;
    }

    /**
     * Borraorra los tags del objeto 
     * y luego añade los nuevos tags.
     *
     * @param [type] $tags
     * @return void
     */
    public function addTags($tags){
        $this->removeTags();
        $this->updateTags($tags);
    }

    /**
     * Añade Tags a los ya existentes
     *
     * @param [type] $tags
     * @return void
     */
    public function updateTags($tags){
        if (is_string($tags)){
            $this->tags.=$tags;
        }else{
           if (is_object($tags)){$this->tags.=$tags->__toString();}     
        }
    }

    public function getId():string{
        return $this->id;
    }

    public function getTitle():string{
        return $this->title;
    }

    public function getTags():string{
        return ($this->tags==NULL)?'':$this->tags;
    }

    public function getSrc():string{
        return $this->src;
    }
 



    public function __toString()
    {
        return '<li '.$this->tags.'  href="'.$this->src.'">'.$this->title.' </li>';
    }
}