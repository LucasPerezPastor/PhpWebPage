<?php

class Lista extends Article{
    
    const ORDERED="ol";
    const UNORDERED="ul";

    //Constantes con los valores del tipo de lista 
    //pueden ser ordenadas "ol" o desordenadas "ul"

    public $type=SELF::UNORDERED;
    private $articles=[];

    public function __construct(string $type=SELF::UNORDERED,string $id,string $title='',string $src='',$tags=NULL)
    {
        parent::__construct($id,$title,$src,$tags);
        if ($type<>SELF::ORDERED && $type<>SELF::UNORDERED){$type=SELF::UNORDERED;};
        // Si $type no coincide con las constantes de tipo de lista se asume que la lista
        //es desordenada
        $this->type=$type;
    }

    /**
     * Añade un articulo a la lista siempre
     * que el objeto sea instancia de la clase Article
     * por lo que puede ser Article o Lista
     *
     * @param [type] $article
     * @return void
     */
    public function addArticle($article){
        if ($article instanceof Article){
            $this->articles[]=$article;
        }
       
    }

    /**
     * Borra los tags de los articulos dentro de la lista
     * o el tags de la propiedad de la clase si coincide con la Id.
     * 
     * Devuelve true si ha localizado algúna lista o artículo con esa Id.
     *
     * @param string $id
     * @return boolean
     */
    public function removeTagsById(string $id):bool{
        $ok=false;
        if ($this->getId()==$id){
            $this->removeTags();
            $ok=true;
        }
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->removeTagsById($id);
            }else{
                if ($value->getId()==$id){
                    $value->removeTags();
                    $ok=true;
                }
            }
        }
        return $ok;
    }

    /**
     * Añade los tags de los articulos dentro de la lista
     * o el tags de la propiedad de la clase si coincide con la Id.
     * 
     *  Devuelve true si ha localizado algúna lista o artículo con esa Id.
     *
     * @param string $id
     * @param [type] $tags
     * @return boolean
     */
    public function updateTagsByID(string $id,$tags):bool{
        $ok=false;
        if ($this->getId()==$id){
            $this->updateTags($tags);
            $ok=true;
        }
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->updateTagsById($id,$tags);
            }else{
                if ($value->getId()==$id){
                    $value->updateTags($tags);
                    $ok=true;
                }
            }
        }
        return $ok;
    }

    /**
     * Borra los tags de los articulos dentro de la lista
     * o el tags de la propiedad de la clase si coincide con la Id.
     * Añade los tags de los articulos dentro de la lista
     * o el tags de la propiedad de la clase si coincide con la Id.
     * 
     * Devuelve true si ha localizado algúna lista o artículo con esa Id.
     *
     * @param string $id
     * @param [type] $tags
     * @return boolean
     */
    public function addTagsById(string $id,$tags):bool{
        if ($this->removeTagsById($id)){return $this->updateTagsByID($id,$tags);}else {return false;}
    }

    /**
     * Borra todos los tags en función de:
     * Si $onlySubList es false borra los tags de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo borra los tags de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false borra los tags de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no borrara los tags de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function removeAllTags($onlySubList=false,$noArticles=false){
        if (!$onlySubList){$this->removeTags();};
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class))
            {
                $value->removeAllTags(false,$noArticles);
            }else{
                    if (!$onlySubList && !$noArticles){$value->removeTags();};
                }
            }
        }
    /**
     * Añade todos los tags en función de:
     * Si $onlySubList es false añade los tags de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo añade los tags de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false añade los tags de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no añadirá los tags de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param [type] $tags
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function updateAllTags($tags,$onlySubList=false,$noArticles=false){
        if (!$onlySubList){$this->updateTags($tags);};
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->updateAllTags($tags,false,$noArticles);
            }else{
                if (!$onlySubList && !$noArticles){$value->updateTags($tags);};
            }
        }
    }
    /**
     *  Borra todos los tags en función de:
     * Si $onlySubList es false borra los tags de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo borra los tags de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false borra los tags de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no borrara los tags de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     * Añade todos los tags en función de:
     * Si $onlySubList es false añade los tags de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo añade los tags de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false añade los tags de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no añadirá los tags de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param [type] $tags
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function addAllTags($tags,$onlySubList=false,$noArticles=false){
        $this->removeAllTags($onlySubList,$noArticles);
        $this->updateAllTags($tags,$onlySubList,$noArticles);
    }


    public function __toString()
    {
        $out='<'.$this->type.' '.$this->getTags().' href="'.$this->getSrc().'">'.$this->getTitle();
        foreach ($this->articles as $value) {
           $out.=$value->__toString();
        }
        $out.="</{$this->type}>";
        return $out;
    }
}