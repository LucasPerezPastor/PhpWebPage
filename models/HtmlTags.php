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

    const CONTENT_FOOTER="cf";
    const LINK_FOOTER="lf";

    const TITLE="title";
    const TEXT="text";
    const SMALL_TEXT="smalltext";

    const BUTTON_CLOSE="btn-close";
    const BUTTON="button";

    const BUTTON_CLOSE_MODAL="btnclsmod";
    const BUTTON_TARGET_MODAL="btntgmod";


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

    /**
     * Devuelve un string con la estructura $nameVariable="$preVariable $variable" 
     * en el caso que $variable tenga algun valor válido sino 
     * devuelve un string vacio salvo que $preVariable tenga valor por lo que 
     * devolvería $nameVariable="$preVariable"
     *
     * @param string $variable
     * @param string $nameVariable
     * @param string $preVariable
     * @return string
     */
    public static function returnValue(string $variable='',string $nameVariable='',string $preVariable=''):string{
        $out='';
        if (!empty($variable) && str_replace(' ','',$variable)<>''){
          if (!empty($preVariable)){$variable=$preVariable.' '.$variable;}  
          $out= $nameVariable.'="'.trim($variable).'"';
        }elseif (!empty($preVariable) && !empty($nameVariable))
        {
            $out= $nameVariable.'="'.$preVariable.'"';
        }
        return $out;
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

    public static function button(&$button):string
    {
        #$button=["id"=>'','title'=>'','class'=>'','type'=>'','target_modal'=>''];
        # Type puede ser vacio, BUTTON_CLOSE_MODAL , BUTTON_TARGET_MODAL

        $out='';
        if (is_array($button) && !empty($button) && $button==NULL)
        {
            $id=array_key_exists('id',$button)?self::returnValue($button['id'],'id'):'';
            $title=array_key_exists('title',$button)?$button['title']:'';
            $class=self::returnValue((array_key_exists('class',$button)?$button['class']:''),'class','btn');
            $type=array_key_exists('type',$button)?$button['type']:'';
            $target=array_key_exists('target_modal',$button)?self::returnValue($button['target_modal'],'data-bs-target'):'';
            if ($type===self::BUTTON_CLOSE_MODAL)
            {
              $innerType='data-bs-dismiss="modal"';    
            }elseif ($type===self::BUTTON_TARGET_MODAL)
            {
               $innerType= 'data-bs-toggle="modal"'.$target;
            }else{$innerType='';}
        }
        $out="<button type=\"button\" {$id} {$class} {$type} {$target}>{$title}</button>";    
        return $out;
    }

}