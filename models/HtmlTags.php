<?php

class HtmlTags{
    //En esta clase están recogiosa métodos estáticos relacionados
    //con el código HTML5




    public static function meta(string $clave='',string $value='',string $type=''):?string{
        if (empty($value) || empty($clave)){
            return NULL;
        } else {
            $out=($clave=="charset")?'<meta '.$clave.'="'.$value.'">':(empty($type)?NULL:'<meta '.$type.'="'.$clave.'" content="'.$value.'">');             
            return $out;
        }
       
    }

    public static function icon(string $rel='',string $src='',int $width=0, int $heigth=0):?string{
        if (empty($rel) || empty($src) || $width==0 || $heigth==0){
            return NULL;
        } else {
            return '<link rel="'.$rel.'" sizes="'.$width.'x'.$heigth.'" href="'.$src.'">';
        }
        
    }

    public static function link(string $rel='',string $src='',string $type='', string $title='',string $asTo=''):?string{
        if (empty($rel) || empty($src)){
            return NULL;
        } else {
            $out='<link rel="'.$rel.'" href="'.$src.'"';
            $out.=(empty($type) && empty($title))?'':' type="'.$type.'" title="'.$title.'"';
            $out.=(empty($asTo))?'':' as="'.$asTo.'"';
            $out.='>';
            return $out;
        }
        
    }

    public static function srcJavaScript($src=''){
        return '<script src="'.$src.'"></script>';
    }

    public static function title($title):?string{
        if (empty($title)){return NULL;}else{return "<title>{$title}</title>";};
    }
}