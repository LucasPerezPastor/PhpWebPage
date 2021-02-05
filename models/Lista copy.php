<?php

class Lista extends Tag{
    
    const ORDERED="ol";
    const UNORDERED="ul";
    const ARTICLE="li";

    //Constantes con los valores del tipo de lista 
    //pueden ser ordenadas "ol" o desordenadas "ul"

    //public $type=SELF::UNORDERED;
    private $articles=[];
    
    public function __construct(string $type=SELF::UNORDERED,string $id,string $title='',string $src='',$attribute=NULL)
    {
        parent::__construct($id,$title,$src,$attribute);
        if ($type<>SELF::ORDERED && $type<>SELF::UNORDERED && $type<>SELF::ARTICLE){
            $this->setTypeOfAttribute(SELF::UNORDERED);
        // Si $type no coincide con las constantes de tipo de lista se asume que la lista
        //es desordenada
        }else{
            $this->setTypeOfAttribute($type);
        };
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
        if ($article instanceof Tag){
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
    public function removeAttributeById(string $id):bool{
        $ok=false;
        if ($this->getId()==$id){
            $this->removeAttribute();
            $ok=true;
        }
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->removeAttributeById($id);
            }else{
                if ($value->getId()==$id){
                    $value->removeAttribute();
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
     * @param [type] $attribute
     * @return boolean
     */
    public function updateAttributeByID(string $id,$attribute):bool{
        $ok=false;
        if ($this->getId()==$id){
            $this->updateAttribute($attribute);
            $ok=true;
        }
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->updateAttributeById($id,$attribute);
            }else{
                if ($value->getId()==$id){
                    $value->updateAttribute($attribute);
                    $ok=true;
                }
            }
        }
        return $ok;
    }

    /**
     * Borra los attribute de los articulos dentro de la lista
     * o el attribute de la propiedad de la clase si coincide con la Id.
     * Añade los attribute de los articulos dentro de la lista
     * o el attribute de la propiedad de la clase si coincide con la Id.
     * 
     * Devuelve true si ha localizado algúna lista o artículo con esa Id.
     *
     * @param string $id
     * @param [type] $attribute
     * @return boolean
     */
    public function addAttributeById(string $id,$attribute):bool{
        if ($this->removeAttributeById($id)){return $this->updateAttributeByID($id,$attribute);}else {return false;}
    }

    /**
     * Borra todos los attribute en función de:
     * Si $onlySubList es false borra los attribute de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo borra los attribute de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false borra los attribute de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no borrara los attribute de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function removeAllAttribute($onlySubList=false,$noArticles=false){
        if (!$onlySubList){$this->RemoveAttribute();};
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class))
            {
                $value->removeAllAttribute(false,$noArticles);
            }else{
                    if (!$onlySubList && !$noArticles){$value->RemoveAttribute();};
                }
            }
        }
    /**
     * Añade todos los attribute en función de:
     * Si $onlySubList es false añade los attribute de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo añade los attribute de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false añade los attribute de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no añadirá los attribute de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param [type] $attribute
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function updateAllAttribute($attribute,$onlySubList=false,$noArticles=false){
        if (!$onlySubList){$this->updateAttribute($attribute);};
        foreach ($this->articles as $value) {
            if (is_a($value,SELF::class)){
                $value->updateAllAttribute($attribute,false,$noArticles);
            }else{
                if (!$onlySubList && !$noArticles){$value->updateAttribute($attribute);};
            }
        }
    }
    /**
     *  Borra todos los attribute en función de:
     * Si $onlySubList es false borra los Attributede la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo borra los attribute de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false borra los attribute de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no borrara los attribute de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     * Añade todos los attribute en función de:
     * Si $onlySubList es false añade los attribute de la propiedad de la clase
     * y de las propiedades de la lista.
     * Si $onlySubList es true solo añade los attribute de la propiedad de las
     * lista que puedan estar añadidas dentro de la clase principal
     * Si $noArticles es false añade los attribute de las propiedades de los articulos
     * que haya dentro de la lista o sublistas.
     * Si $noArticles es true no añadirá los attribute de las propiedades de los articulos 
     * que haya dentro de la lista o sublistas.
     *
     * @param [type] $attribute
     * @param boolean $onlySubList
     * @param boolean $noArticles
     * @return void
     */
    public function addAllAttribute($attribute,$onlySubList=false,$noArticles=false){
        $this->removeAllAttribute($onlySubList,$noArticles);
        $this->updateAllAttribute($attribute,$onlySubList,$noArticles);
    }


    public function __toString()
    {
        $out='<'.$this->getTypeOfAttribute().' '.$this->getAttribute().' href="'.$this->getSrc().'">'.$this->getTitle();
        foreach ($this->articles as $value) {
           $out.=$value->__toString();
        }
        $out.="</{$this->getTypeOfAttribute()}>";
        return $out;
    }
}