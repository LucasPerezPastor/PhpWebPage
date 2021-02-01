<?php

class HtmlTags{
    //En esta clase están recogiosa métodos estáticos relacionados
    //con el código HTML5




    public static function meta(string $clave='',string $value='',string $type=''):?String{
        if (!empty($value) && !empty($clave)){
            $out=($clave=="charset")?'<meta '.$clave.'="'.$value.'">':(empty($type)?NULL:'<meta '.$type.'="'.$clave.'" content="'.$value.'">');             
            return $out;
        }
        return NULL;
    }
}