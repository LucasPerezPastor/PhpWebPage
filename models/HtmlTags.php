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

    const STYLE_MODAL_DIALOG_CENTERED="modal-dialog-centered";
    const STYLE_MODAL_DIALOG_START="modal-dialog-start";
    const STYLE_MODAL_DIALOG_END="modal-dialog-end";
    const STYLE_NO_BORDER="no-border";


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

    public static function button(&$button, string $defaultClass=''):string
    {
        #$button=["id"=>'','title'=>'','class'=>'','type'=>'','target_modal'=>''];
        # Type puede ser vacio, BUTTON_CLOSE_MODAL , BUTTON_TARGET_MODAL
        # en el caso que el button sea del tipo BUTTON_CLOSE_MODAL añadimos "data-bs-dismiss="modal"
        # en el caso que el button sea del tipo BUTTON_TARGET_MODAL añadimos " data-bs-dismiss="modal" data-bs-toggle="modal data-bs-target="#{nombre del id del modal}" "

        $out='';
       
        
        if (is_array($button) && !empty($button) && $button!=NULL)
        {
            $id=array_key_exists('id',$button)?self::returnValue($button['id'],'id'):'';
            $title=array_key_exists('title',$button)?$button['title']:'';
            $class=self::returnValue((array_key_exists('class',$button)?$button['class']:(!empty($defaultClass)?$defaultClass:'')),'class','btn');
            $type=array_key_exists('type',$button)?$button['type']:'';
            $target=array_key_exists('target_modal',$button)?self::returnValue('#'.$button['target_modal'],'data-bs-target'):'';
            if ($type==self::BUTTON_CLOSE_MODAL || $type==self::BUTTON_TARGET_MODAL)
            {
              $innerType='data-bs-dismiss="modal"';//.($type==self::BUTTON_TARGET_MODAL)?' data-bs-toggle="modal"'.$target:'';    
              if ($type==self::BUTTON_TARGET_MODAL){$innerType.=' data-bs-toggle="modal"'.$target;}
            }else{$innerType='';}
            $out=$id.' '.$class.' '.$innerType.' '.$target;
            $out='<button type="button" '.trim($out).'>'.$title.'</button>';  
        }
         
        return $out;
    }

    public static function buttonToHtml(&$button,string $defaultClass='')
    {
        $out=self::button($button,$defaultClass);
        if (!empty($out)){echo $out;}
    }


    /**
     * Devuelve un array con una estructura de lista en Html5 en función del array
     * de datos recibidos por $list. Cada elemento del array nuevo generado es una línea en Html5.
     * La variable $toClass es otro array multidimensional asociativo para indicar que clases
     * añadir en función del tipo de elemento de lista
     *
     * @param array $list
     * @param array $toClass
     * @return array
     */
    public static function listExplorer(&$list,array $toClass=NULL):array
    {
      $out=[];     
      //Tipos válidos para el array $list
      $arrayType=[self::LIST_UNORDERED,self::LIST_ORDERED,self::LIST_ARTICLE,self::HYPERLINK];
      if (is_array($list) && !empty($list) && $list!=NULL)
      {
       
        $keys=["{type}","{id_name}","{title}","{class}","{href}"];       
        if (array_key_exists("type",$list))
        {//Si existe la clave "type" es una rray asociativo
          //Si el array $list no tiene alguna de las claves=>valor las pone en valor vacio.
          $listType=$list["type"];
          $listMethod=(array_key_exists("method",$list))?$list["method"]:'';
          $listId=(array_key_exists("id",$list))?$list["id"]:'';
          $listTitle=(array_key_exists("title",$list))?$list["title"]:'';
          $listSrc=(array_key_exists("src",$list))?$list["src"]:'';
          $isButton=(array_key_exists("btn",$list))?(($list["btn"]==true)?$list["btn"]:false):false;

          $listRel=(array_key_exists("rel",$list))?$list["rel"]:1; //si no existe rel la relación será 1 a 1
          if (is_array($toClass) && !empty($toClass) && $toClass!=NULL)
          {
            $existType=array_search($listType,array_column($toClass,"type"));//Buscamos dentro del array $toClass si hay alguna key con valor $listType
                                                                            //Si $exisType no es explicitamente false es que existe una key con el valor $listType
                                                                            //en $exisType se guarda la posición del array que contiene esa key
            $innerClass=($existType===false)?'':(($isButton)?(array_key_exists("classbtn",$toClass[$existType])?$toClass[$existType]["classbtn"]:((array_key_exists("class",$toClass[$existType]))?$toClass[$existType]["class"]:''))
            :((array_key_exists("class",$toClass[$existType]))?$toClass[$existType]["class"]:''));
            //Operador ternario anidado , si $exisType es explicitamente false entonces $innerClass vale '', en el caso contrario,
            //vamos a mirar si $isButton es true por lo que si es true mirariamos si existe la clave "classbtn" para obtener su valor,
            //si no existe esta clave miraremos si existe la clabe "class" para obtener su valor y si no existe esa clave valdrá ''
            //en el caso que $isButton sea false miraremos si exsite la clave "class" par obtner su valor y en el caso contrario valdrá ''
          }else 
          {
              $innerClass='';
          }

          if (in_array($listType,$arrayType))
          {
            $keys=["{type}","{id_name}","{title}","{class}","{href}"];//asignamos las palabras claves que serán substituidas en un array   
            $words=[$listType,self::returnValue($listId,"id"),
            $listTitle,self::returnValue($innerClass.' '.$listMethod,"class"),
            self::returnValue($listSrc,"href"),];//asignamos el valor que substituirá a las palabras claves en otro array
            //substituimos las palabras clave por sus valores y lo guardamos en el array $out[]
            $out[]=str_replace($keys,$words,'<{type} {id_name} {class} {href} >{title}');
            if (array_key_exists("include",$list)){
              //Si existe la clave "include", hay dentro otro array por lo que llamamos recursivamente al método listExplorer
              //para que nos devuelva un un array de strings            
              $out=array_merge($out,self::listExplorer($list["include"],$toClass));
            }
            $out[]='</'.$listType.'>'; 
          }
        }else
        {
          // Al no existir la clave "type" , vamos a comprobar si dentro hay más arrays.
          $arrs=array_filter($list,'is_array');//Filtra elementos de un array usando una función 'is_array',
          //Devolverá un array con tantos 'true' como arrays haya dentro del array original 
          if (count($arrs)==count($list))
          {
            //Determinamos que todos los elementos del array original son arrays
            // Y pasaremos a recorrer estos arrays para llamar de forma recursiva al método y pasarle los parámetros del array
            foreach ($list as $value) {
              //Añadimos al array $out el resultado de pasarle de forma recursiva el array al método
              $out=array_merge($out,self::listExplorer($value,$toClass));
          }
          }else
          {
            //El Array recibido no es válido
          };
        }
      } 
      return $out;
    }

    static function listExplorerToHtml(&$list,&$toClass)
    {
        $out=[];
        $out=self::listExplorer($list,$toClass);
        foreach ($out as $value) {
            # code...
            echo $value;
          }
    }
}