<?php

class HtmlTags{
    //En esta clase están recogiosa métodos estáticos relacionados
    //con el código HTML5

    const VIEWPORT_DEVICE_WIDTH='device-width';
    const VIEWPORT_DEVICE_HEIGHT='device-height';

    const ICON_REL_BASIC='icon';
    const ICON_REL_BASIC_OLD='shortcut icon';
    const ICON_REL_APPLE='apple-touch-icon-precomposed';

    const LINK_STYLESHEET="stylesheet";
    const LINK_CANONICAL="canonical";
    const LINK_AMPHTML=" amphtml";
    const LINK_MANIFEST="manifest";
    const LINK_AUTHOR="author";
    const LINK_LICENSE="license";
    const LINK_ALTERNATE="alternate";
    const LINK_ME="me";
    const LINK_ARCHIVES="archives";
    const LINK_INDEX="index";
    const LINK_SELF_REL="self";
    const LINK_FIRST="first";
    const LINK_LAST="last";
    const LINK_PREV="prev";
    const LINK_NEXT="next";
    const LINK_EDITURI="EditURI";
    const LINK_PINGBACK="pingback";
    const LINK_WEBMENTION="webmention";
    const LINK_MICROPUB="micropub";
    const LINK_SEARCH="search";
    const LINK_DNS_PREFETCH="dns-prefetch";
    const LINK_PRECONNECT="preconnect";
    const LINK_PREFETCH="prefetch";
    const LINK_PRERENDER="prerender";
    const LINK_PRELOAD="preload";

    const LIST_ORDERED="ol";
    const LIST_UNORDERED="ul";
    const LIST_ARTICLE="li";
    const LIST_DROPDOWN="dropdown";
    const LIST_ACTIVE="active";
    
    const HYPERLINK="a";
    const HYPERLINK_DISABLED="disabled";


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

    public static function viewPort(array $viewPort=NULL){
        if (!is_null($viewPort)){
            $out='';
            $out.=(empty($viewPort["width"]))?'':'width='.$viewPort["width"].', ';
            $out.=(empty($viewPort["heigth"]))?'':'heigth='.$viewPort["heigth"].', ';
            $out.=($viewPort["userScalable"]=="YES" || $viewPort["userScalable"]=="NO")?'user-scalable='.$viewPort["userScalable"].', ':'';
            $out.=($viewPort["initialScale"]!=0)?'initial-scale='.$viewPort["initialScale"].', ':'';
            $out.=($viewPort["maximumScale"]!=0)?'maximum-scale='.$viewPort["maximumScale"].', ':'';
            $out.=($viewPort["minimunScale"]!=0)?'minimum-scale='.$viewPort["minimumScale"].'':'';
            $out=rtrim($out,', ');
    
            return HtmlTags::meta('viewport',$out,'name').PHP_EOL;
        }
       
    }
}