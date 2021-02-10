<?php
class Basic{

    
  

    //  pone el HEAD de la página HTML
  
    /**
     * Crea elementos del Head de una página HTML.
     * Para ello se basa en varios arrays que pueden ser arrays asociativos o 
     * arrays de arrays asociativos con los parámetros necesarios
     * para crear los elementos HTML. Utiliza las llamadas a métodos de la 
     * clase HtmlTags para generar el código HTML necesario.
     *
     * @param array $headContent
     * @param array $favicons
     * @param array $links
     * @param array $javaScripts
     * @param array $faceBookOpenGraph
     * @param array $twitterCard
     * @return void
     */
    public static function head(array $headContent=NULL,array $favicons=NULL,array $links=NULL,array $javaScripts=NULL,array $faceBookOpenGraph=NULL,array $twitterCard=NULL)
    {
      if (!is_null($headContent)){
        echo HtmlTags::meta('charset',$headContent["charset"]).PHP_EOL;
        echo HtmlTags::viewPort($headContent["viewport"]).PHP_EOL;
        echo HtmlTags::title($headContent["title"]).PHP_EOL;
        echo HtmlTags::meta('author',$headContent["author"],'name').PHP_EOL;
        echo HtmlTags::meta('description',$headContent["description"],'name').PHP_EOL;
      };
      if (!is_null($favicons)){
        foreach ($favicons as $value) {
          echo HtmlTags::icon($value["rel"],$value["src"],$value["width"],$value["heigth"]).PHP_EOL;
        }
      };
      if (!is_null($links)){
        foreach ($links as $value) {
          echo HtmlTags::link($value["rel"],$value["src"],$value["type"],$value["title"],$value["asto"]).PHP_EOL;
        }
      };
      if (!is_null($javaScripts)){
        foreach ($javaScripts as $value) {
          echo HtmlTags::srcJavaScript($value).PHP_EOL;
        }
      };
      if (!is_null($faceBookOpenGraph)){
        $prop='property';
        $og='og:';
        echo HtmlTags::meta('fb:app_id',$faceBookOpenGraph["appid"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'title',$faceBookOpenGraph["content"]["title"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'description',$faceBookOpenGraph["content"]["description"],$prop).PHP_EOL;
        echo HtmlTags::meta('article:author',$faceBookOpenGraph["content"]["author"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'url',$faceBookOpenGraph["content"]["url"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'image',$faceBookOpenGraph["img"]["src"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'image:alt',$faceBookOpenGraph["img"]["alt"],$prop).PHP_EOL;    
        echo HtmlTags::meta($og.'type',$faceBookOpenGraph["type"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'site_name',$faceBookOpenGraph["sitename"],$prop).PHP_EOL;
        echo HtmlTags::meta($og.'locale',$faceBookOpenGraph["locale"],$prop).PHP_EOL;
      };
      if (!is_null($twitterCard)){
        $prop='name';
        $twit='twitter:';
        $out='';
        echo HtmlTags::meta($twit.'title',$twitterCard["content"]["title"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'description',$twitterCard["content"]["description"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'creator',$twitterCard["content"]["author"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'url',$twitterCard["content"]["url"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'image',$twitterCard["img"]["src"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'image:alt',$twitterCard["img"]["alt"],$prop).PHP_EOL;    
        echo HtmlTags::meta($twit.'card',$twitterCard["card"],$prop).PHP_EOL;
        echo HtmlTags::meta($twit.'site',$twitterCard["site"],$prop).PHP_EOL;
      };
    }

    /**
     * Devuelve un string con la estructura $nameVariable="$variable" 
     * en el caso que $variable tenga algun valor válido sino 
     * devuelve un string vacio
     *
     * @param string $variable
     * @param string $nameVariable
     * @return string
     */
    public static function returnValue(string $variable='',string $nameVariable=''):string{
      if (!empty($variable) && str_replace(' ','',$variable)<>''){
        return $nameVariable.'="'.trim($variable).'"';
      }else{
        return '';
      }
    }


     //Creacion del NAV de la página web

    /**
     *  Devuelve un array de Strings con una estructura de lista para el Nav de la 
     *  página , se basa en un starter-template de Bootstrap con bavBar collapsable.
     *  Recorre el array $navBar para crear la estructura de listas con sus links correspodientes
     *  y añadiendo las clases de BootsTrap necesarias. A la hora de recorrer el array de arrays de 
     *  navBar genera llamadas recursivas al mismo métod estático pasandole los parámetros necesarios 
     *  para ir creando las cadenas de strings.
     *
     * @param array $navBar
     * @param string $class
     * @param boolean $dropdown
     * @param string $id
     * @param string $dataBSToggle
     * @param string $ariaExpanded
     * @param string $ariaCurrent
     * @return array
     */
    public static function navBarExplorer(array $navBar=NULL,string $class='',bool $dropdown=false,string $id='',string $dataBSToggle='',string $ariaExpanded='',string $ariaCurrent=''):array{
      /* Ejemplo de Menu de navegación
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      */
      
      $out=[];     
      if (!empty($navBar)){
        $innerClass='';
        $labelledBy='';
        $innerDataBSToggle='';
        $innerAriaExpanded='';
        $innerTabindex="";//"-1" 
        $innerAriaDisabled="";//"true"
        $innerAriaCurrent='';//"page"
        $keys=["{type}","{id_name}","{title}","{class}","{href}","{labelledby}","{databasetoggle}","{ariaexpanded}","{tabindex}","{ariadisabled}","{ariacurrent}"];       
        if (array_key_exists("type",$navBar)){//Si existe la clave "type" es una rray asociativo
          //Si el array NavBar  no tiene alguna de las claves=>valor las pone en valor nulo.
          $navType=$navBar["type"];
          $navMethod=(array_key_exists("method",$navBar))?$navBar["method"]:'';
          $navId=(array_key_exists("id",$navBar))?$navBar["id"]:'';
          $navTitle=(array_key_exists("title",$navBar))?$navBar["title"]:'';
          $navSrc=(array_key_exists("src",$navBar))?$navBar["src"]:'';
          if ($navType==HtmlTags::LIST_UNORDERED || $navType==HtmlTags::LIST_ORDERED){           
            if ($dropdown){
              $innerClass="dropdown-menu";
              $labelledBy=$id;
              $class="";
              $dataBSToggle="";
              $ariaExpanded="";              
            }else{
              //<ul class="navbar-nav me-auto mb-2 mb-md-0">
              $innerClass="navbar-nav me-auto mb-2 mb-md-0";
              $class="nav-item";
              $dropdown=false;
            }          
          }elseif($navType==HtmlTags::LIST_ARTICLE)
          {  
            if ($dropdown){  
              $class='dropdown-item';
            }else{
              $dropdown=($navMethod==HtmlTags::LIST_DROPDOWN)?true:false;              
              $innerClass=$class;
              $class="nav-link";
              if ($dropdown){
                 $class.=" dropdown-toggle";
                 $dataBSToggle=HtmlTags::LIST_DROPDOWN;
                 $ariaExpanded="false";
              };
              if (strstr($navMethod,HtmlTags::LIST_ACTIVE)){
                $ariaCurrent="page";
              }
            }
          }elseif ($navType==HtmlTags::HYPERLINK)         
           {
            if (strstr($navMethod,HtmlTags::HYPERLINK_DISABLED)){
            //<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            $innerTabindex="-1";//"-1" 
            $innerAriaDisabled="true";//"true"           
            };
            $innerClass=$class;
            $innerAriaCurrent=$ariaCurrent;
            if ($dropdown){
              //<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
              //<li><a class="dropdown-item" href="#">Action</a></li>
              $innerAriaExpanded=$ariaExpanded;
              $innerDataBSToggle=$dataBSToggle; 
            }
          }
          $words=[$navType,self::returnValue($navId,"id"),
              $navTitle,self::returnValue($innerClass.' '.$navMethod,"class"),
              self::returnValue($navSrc,"href"),self::returnValue($labelledBy,"aria-labelledby"),
              self::returnValue($innerDataBSToggle,"data-bs-toggle"),self::returnValue($innerAriaExpanded,"aria-expanded"),
              self::returnValue($innerTabindex,"tabindex"),self::returnValue($innerAriaDisabled,"aria-disabled"),
              self::returnValue($innerAriaCurrent,"aria-current")
            ];
            $out[]=str_replace($keys,$words,'<{type} {id_name} {class} {href} {labelledby} {databasetoggle} {ariaexpanded} {tabindex} {ariadisabled} {ariacurrent} >{title}');
          if (array_key_exists("include",$navBar)){
            //Si existe la clave "include", hay dentro otro array            
            $out=array_merge($out,self::navBarExplorer($navBar["include"],$class,$dropdown,$id,$dataBSToggle,$ariaExpanded,$ariaCurrent));
          }
          $out[]='</'.$navType.'>';  
        }else
        {
          // Al no existir la clave "type" , vamos a comprobar si dentro hay más arrays.
          $arrs=array_filter($navBar,'is_array');//Filtra elementos de un array usando una función 'is_array',
                                                //Devolverá un array con tantos 'true' como arrays haya dentro del array original 
          if (count($arrs)==count($navBar)){
            //Determinamos que todos los elementos del array original son arrays
            // Y pasaremos a recorrer estos arrays para llamar de forma recursiva al método y pasarle los parámetros del array
            foreach ($navBar as $value) {
              //Añadimos al array $out el resultado de pasarle de forma recursiva el array al método
              $out=array_merge($out,self::navBarExplorer($value,$class,$dropdown,$id,$dataBSToggle,$ariaExpanded,$ariaCurrent));
              $id=isset($value["id"])?$value["id"]:'';
            }
          }else
          {
            //El Array recibido no es válido
          }
        };
      }
      return $out;
    }
  
    /**
     * Genera el menú de navegación 
     *
     * @param array $navBar
     * @param array $img
     * @param array $title
     * @return void
     */
    public static function nav(array $navBar=NULL,string $title='',string $href="#",array $logo=NULL,array $search=NULL){
      ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $href?>">
              <?php
              if (!empty($logo))
              {
               
                if (array_key_exists("src",$logo) && !empty($logo["src"]))
                {
                  ?>
                  <img src="<?php echo $logo["src"]?>" 
                  alt="<?php echo (array_key_exists("alt",$logo)?$logo["alt"]:'')?>" 
                  width="<?php echo (array_key_exists("width",$logo)?$logo["width"]:'')?>" 
                  height="<?php echo (array_key_exists("height",$logo)?$logo["height"]:'')?>" class="d-inline-block align-top">
                  <?php
                }               
              }
              echo $title;
              ?>
              
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsDefault">
              <?php
                //<ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>
                $menu=self::navBarExplorer($navBar);//Generamos el menu de navegación a partir del array de valores
                foreach ($menu as $value) {//Nos devueelve un array de strings que iremos imprimiendo uno a uno
                  echo $value;
                }
              if (!empty($search)){
                ?>
                  <form class="d-flex" action="<?php echo (array_key_exists("action",$search)?$search["action"]:'')?>" method="<?php echo (array_key_exists("method",$search)?$search["method"]:'')?>">
                    <input class="form-control me-2" type="search" placeholder="<?php echo (array_key_exists("placeholder",$search)?$search["placeholder"]:'')?>" 
                                  aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><?php echo (array_key_exists("name",$search)?$search["name"]:'')?></button>
                  </form>
                <?php
              }
              ?> 
            </div>
          </div>
        </nav>
      <?php
    }

    
}