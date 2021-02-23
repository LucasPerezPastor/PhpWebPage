<?php
class Basic extends HtmlTags{

    
  

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
          //Si el array NavBar  no tiene alguna de las claves=>valor las pone en valor vacio.
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
     * @param array $search
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
    public static function listExplorer(array $list=NULL,array $toClass=NULL):array
    {
      $out=[];     
      //Tipos válidos para el array $list
      $arrayType=[HtmlTags::LIST_UNORDERED,HtmlTags::LIST_ORDERED,HtmlTags::LIST_ARTICLE,HtmlTags::HYPERLINK];
      if (!empty($list))
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
          $existType=array_search($listType,array_column($toClass,"type"));//Buscamos dentro del array $toClass si hay alguna key con valor $listType
                                                                          //Si $exisType no es explicitamente false es que existe una key con el valor $listType
                                                                          //en $exisType se guarda la posición del array que contiene esa key

          $innerClass=($existType===false)?'':(($isButton)?(array_key_exists("classbtn",$toClass[$existType])?$toClass[$existType]["classbtn"]:((array_key_exists("class",$toClass[$existType]))?$toClass[$existType]["class"]:''))
          :((array_key_exists("class",$toClass[$existType]))?$toClass[$existType]["class"]:''));
         

          //Operador ternario anidado , si $exisType es explicitamente false entonces $innerClass vale '', en el caso contrario,
          //vamos a mirar si $isButton es true por lo que si es true mirariamos si existe la clave "classbtn" para obtener su valor,
          //si no existe esta clave miraremos si existe la clabe "class" para obtener su valor y si no existe esa clave valdrá ''
          //en el caso que $isButton sea false miraremos si exsite la clave "class" par obtner su valor y en el caso contrario valdrá ''

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

    /**
     * Genera el footer de la página.
     * Recibe un array $footer en el que se indica si hay titulo con texto y si hay listas de navegación.
     * Cada elemento que se le indica , también indica la relación de ancho entre ellos. Siendo la suma de todos <12.
     * En el caso que la suma de relaciones supere 12 las relacones pasarán a ser de 1 a 1
     *
     * @param array $footer
     * @return void
     */
    public static function footer(array $footer=NULL,array $informationFooter=NULL){
      ?>
        <!-- Footer -->
        <footer class="bg-light text-center text-lg-start">
          <!-- Grid container -->
          <div class="container p-4">
            <!--Grid row-->
            <div class="row">
              
              
              <?php 
                if (!empty($footer) || $footer!=NULL)
                {
                  $width=array_sum(array_column($footer, "rel"));
                  $elements=count($footer);  
                  $div=($width<12)?intdiv(12,$width):1;
                  foreach ($footer as $value) {
                    # code...
                    ?>
                    <!--Grid column-->
                    <div class="col-lg-<?php echo ($div*$value["rel"])?> col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><?php echo $value["title"]?></h5>                  
                      <?php 
                      if ($value["type"]==HtmlTags::CONTENT_FOOTER)
                      {
                        echo ("<p>{$value["content"]}</p>");
                      }elseif ($value["type"]==HtmlTags::LINK_FOOTER)
                      {
                        // Definimos las clases a añadir en función del tipo de elemento
                        $toClass=[["type"=>HtmlTags::LIST_UNORDERED,"class"=>"list-unstyled mb-0"],
                                  ["type"=>HtmlTags::HYPERLINK,"class"=>"text-dark"]];
                        $list=SELF::listExplorer($value["include"],$toClass);
                        foreach ($list as $value) {
                          # code...
                          echo $value;
                        }
                      } ?>
                    </div>
                    <!--Grid column-->
                    <?php
                  }
              }
              ?>            
            </div>
            <!--Grid row-->
          </div>
          <!-- Grid container -->
          <?php
          if (!empty($informationFooter) && $informationFooter!=NULL)
          {?>
            <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2)">
              <div class="col-lg-3 col-md-3 col-sm-12 text-start">TODO
                <?php echo (array_key_exists('copyright',$informationFooter)?$informationFooter['copyright']:'')?>
              </div>
              <div class="col-lg-6 col-md-8 col-sm-12 text-center">
              <?php echo (array_key_exists('legaladvice',$informationFooter)?$informationFooter['copyright']:'')?>
              <?php echo (array_key_exists('privacypolicy',$informationFooter)?$informationFooter['copyright']:'')?>
              <?php echo (array_key_exists('cookiespolicy',$informationFooter)?$informationFooter['copyright']:'')?>
              </div>
            
          </div>
          <?php
          }
          ?>
         
        </footer>
        <!-- Footer -->
      <?php
    }


    public static function warning(array $warning,array $options=NULL)
    {
      # $button=["id"=>'','title'=>'','class_button=>''];
      # $warning=['id'=>'','title'=>'','body'=>['',''','',''],'buttons'=>[$button,$button]];
      # $options=['class'=>'','position'=>''];
      if (!empty($warning))
      {
        if (!empty($options) && $options!=NULL){
          $top=(array_key_exists('position',$options))?(($options['position']=='top')?true:false):false;
          $innerClass=(array_key_exists('class',$options))?$options['class']:'';

  
        }else
        {
          $top=false;
          $innerClass='';

        }
        ?>
        <div <?php echo (array_key_exists('id',$warning))?self::returnValue($warning['id'],'id'):''; ?> class="fixed-<?php echo ($top)?'top':'bottom'?> modal-dialog modal-xl <?php echo $innerClass;?>">
          <div class="modal-content">
                <div class="modal-header" style='border: none;'>
                  <h5 class="modal-title"><?php echo (array_key_exists('title',$warning))?$warning['title']:''; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style='border: none;'>
                <?php
                  if (array_key_exists('body',$warning))
                    {
                      foreach ($warning['body'] as $value) 
                      {
                        # code...
                        echo "<p>{$value}</p>";
                      }
                    }
                ?>
                </div>
                <div class="modal-footer" style='border: none;'>
                <?php
                if (array_key_exists('buttons',$warning))
                    {
                      foreach ($warning['buttons'] as $value) 
                      {
                        # code...
                        ?>
                        <button type="button" <?php echo (array_key_exists('id',$value))?self::returnValue($value['id'],'id'):''; ?>  class="btn <?php echo (array_key_exists('class',$value))?$value['class']:''; ?>" data-bs-dismiss="modal">
                        <?php echo (array_key_exists('title',$value))?$value['title']:''; ?></button>
                       

                        <button type="button" <?php echo (array_key_exists('id',$value)?self::returnValue($value['id'],'id'):'')?> 
                        class="btn <?php echo (array_key_exists('class',$value)?$value['class_btn']:'btn-secondary')?>" 
                        <?php echo (array_key_exists('type',$value)?(($value['type'==HtmlTags::BUTTON_CLOSE])?:'data-bs-dismiss="modal"'):'')?> 
                        >
                        <?php echo (array_key_exists('title',$value)?$value['title']:'')?></button>

                        <?php
                      }
                    }
                ?>
                
                </div>
          </div>
        </div>
        <?php
      } 
    }


    public static function linkModal(string $targetLink='',array $externalLink=NULL):string
    {
       # $externalLink=['container_class'=>'','id'=>'','type'=>'','class'=>'','title'=>''];
        # 'type' de $externalLink puede ser HtmlTags::HYPERLINK o HtmlTags::BUTTON

      $out='';

      if (!empty($externalLink) && $externalLink!=NULL)
      {
        $containerClass= array_key_exists('container_class',$externalLink)?self::returnValue($externalLink['container_class'],'class'):'';
        $typeLink=array_key_exists('type',$externalLink)?
        (($externalLink['type']==HtmlTags::HYPERLINK || $externalLink['type']==HtmlTags::BUTTON)?$externalLink['type']:HtmlTags::BUTTON):HtmlTags::BUTTON;
        $linkTitle=array_key_exists('title',$externalLink)?$externalLink['title']:'';
        $linkClass=array_key_exists('class',$externalLink)?$externalLink['class']:'';
        $linkId=array_key_exists('id',$externalLink)?self::returnValue($externalLink['id'],'id'):'';
      }else
      {
        $containerClass='';
        $typeLink=HtmlTags::BUTTON;
        $linkTitle="Modal {$targetLink}";
        $linkClass="btn-primary";
        $linkId='';
      }
      $out="<div {$containerClass}>".PHP_EOL;
      $out.= '<'.$typeLink.' '.$linkId.' '.(($typeLink==HtmlTags::BUTTON)?'type="button"':'').(self::returnValue((($typeLink==HtmlTags::BUTTON)?'btn ':'').$linkClass,'class')).
      ' data-bs-toggle="modal" data-bs-target="#'.$targetLink.'" >'.$linkTitle.'</'.$typeLink.'>'.PHP_EOL;
      $out.="</div>".PHP_EOL;
      /*
      ?>
        <div <?php echo $containerClass?>>
        <?php
          echo '<'.$typeLink.' '.$linkId.' '.(($typeLink==HtmlTags::BUTTON)?'type="button"':'').(self::returnValue((($typeLink==HtmlTags::BUTTON)?'btn ':'').$linkClass,'class')).
          ' data-bs-toggle="modal" data-bs-target="#'.$targetLink.'" >'.$linkTitle.'</'.$typeLink.'>';
        ?>
        </div>
        <?php
        */
        return $out;
    }
    
    public static function makeModal(array $modal=NULL, array $externalLink=NULL){
      # $modal=['id'=>'','title'=>'','class'=>'','body'=>['','','',''],buttons=>[[type=>'close',class_btn=>'btn-secondary',id=>'',title=>'Close']]]
      # $externalLink=['container_class'=>'','id'=>'','type'=>'','class'=>'','title'=>''];
      # 'type' de $externalLink puede ser HtmlTags::HYPERLINK o HtmlTags::BUTTON
      if (!empty($modal) && $modal!=NULL)
      {
      $id=array_key_exists('id',$modal)?$modal['id']:((array_key_exists('title',$modal))?$modal['title'].'ModalCenteredScrollable':'ModalCenteredScrollable');
      $idAriaLabelledBy=$id.'title';
      ?>
      <div class="modal fade " id="<?php echo $id?>" tabindex="-1" aria-labelledby="<?php echo $idAriaLabelledBy?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable <?php echo (array_key_exists('class',$modal)?$modal['class']:'')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="<?php echo $idAriaLabelledBy?>"><?php echo (array_key_exists('title',$modal)?$modal['title']:'')?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php
                if (array_key_exists('body',$modal))
                {
                  foreach ($modal['body'] as $value) {
                    # code...
                    echo "<p>{$value}</p>";
                  }
                }
              ?>
            </div>
            <div class="modal-footer">
              <?php if (array_key_exists('buttons',$modal))
              {
                foreach ($modal['buttons'] as $button) 
                {
                  # code...
                  # Buscamos dentro del array buttons y vamos imprimiendo los buttons que existan
                  # en el caso que el button sea del tipo BUTTON_CLOSE añadimos "data-bs-dismiss="modal"
                  # si no hay especificado la clase del button sera del tipo btn-secondary
                ?>
                <button type="button" <?php echo (array_key_exists('id',$button)?self::returnValue($button['id'],'id'):'')?> 
                class="btn <?php echo (array_key_exists('class_btn',$button)?$button['class_btn']:'btn-secondary')?>" 
                <?php echo (array_key_exists('type',$button)?(($button['type'==HtmlTags::BUTTON_CLOSE])?:'data-bs-dismiss="modal"'):'')?> 
                >
                <?php echo (array_key_exists('title',$button)?$button['title']:'')?></button>
              <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
      echo self::linkModal($id,$externalLink);
      }
    }




    /**
     * Genera un carousel de imágenes con texto. Las imáagenes con titulo y descripción vienen dadas por el 
     * array $data Carousel. La variable booleana $controls indica si queremos que que salgan las flechas de 
     * "prev" y "next". La variable $indicators indica si queremos que salgan unos indicadores sobre la página
     * la el contenido que estamos.
     *
     * @param array $dataCarousel
     * @param boolean $controls
     * @param boolean $indicators
     * @return void
     */
    public static function carousel(array $dataCarousel=NULL,bool $controls=true, bool $indicators=true)
    {

      if (!empty($dataCarousel) && $dataCarousel!=NULL)
      {
        ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <?php
        if ($indicators){
        ?>
         <div class="carousel-indicators">
        <?php
            $count=0;
            foreach ($dataCarousel as $value) 
            {
              # code...
              // Añadimos el valor de $count al metadadato data-slide-to para permitir el carousel
              // comprobamos si esxiste la clave "active" en el array y en el caso que el valor
              // de la clave sea 1 entoces añadimos la clase "active"
              $active=array_key_exists("active",$value)?$value["active"]:0;
              ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $count?>" aria-label="Slide <?php echo ($count+1)?>" <?php echo ($active==1)?'class="active" aria-current="true"':'';?>></button>
              <?php
              
              $count++;
            }
        ?>
        </div>
        <?php
        }
        ?>
        <div class="carousel-inner">
        <?php
            foreach ($dataCarousel as $value) 
            {
              //Asignamos valores por defecto en función de si existen dichas claves en el array recibido
              $active=array_key_exists("active",$value)?$value["active"]:0;
              $imgSrc=array_key_exists("img_src",$value)?$value["img_src"]:'';
              $imgAlt=array_key_exists("img_alt",$value)?$value["img_alt"]:'';
              $title=array_key_exists("title",$value)?$value["title"]:'';
              $content=array_key_exists("content",$value)?$value["content"]:''; 
              ?>
                <div class="carousel-item <?php echo ($active==1)?'active':'';?>">
                <img class="d-block w-100" height="200" <?php  echo self::returnValue($imgSrc,"src")?> <?php  echo self::returnValue($imgAlt,"alt")?>>
                  <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo $title?></h5>
                  <p><?php echo $content?></p>
                  </div>
                </div>
              <?php
            }
        ?>
        </div>
        <?php
        if ($controls)
        {
        ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <?php
        }
        ?>
        </div>
        <?php  
    }
  } 


  /**
   * Genera una tarjeta establecida por los valores del array $card.
   * En este array esta definido la imagen , si tiene títulos , contenido , listas o texto en pequeño.
   * La variable $horizontal indica si queremos una tarjeta en horizontal en este caso el valor es true 
   * o en vertical en este caso el valor sería false.
   *
   * @param array $card
   * @param boolean $horizontal
   * @return void
   */
  public static function card(array $card=NULL, bool $horizontal=true){
    // Si $horizontal = false , card estará en formato vertical con la imagen en la parte superior
    if (!empty($card) && $card!=NULL){
      if ($horizontal)
      {?>
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-lg-4 col-md-4 col-sm-12">
       <?php 
      }else
      {?>
        <div class="card">
      <?php
      }
            if (array_key_exists("img",$card))
            {
              $src=(array_key_exists("src",$card["img"]))?$card["img"]["src"]:'';
              $alt=(array_key_exists("alt",$card["img"]))?$card["img"]["alt"]:'';
              $width=(array_key_exists("width",$card["img"]))?'width="'.$card["img"]["width"].'"':'';
              $height=(array_key_exists("height",$card["img"]))?'height="'.$card["img"]["height"].'"':'';
            ?>
              <img <?php echo $horizontal?'':'class="card-img-top"'?> src="<?php echo $src?>" alt="<?php echo $alt?>" <?php echo $width?> <?php echo $height?>>
            <?php
            }
      if ($horizontal)
      {?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
      <?php
      }
            ?>      
            <div class="card-body">
              <?php 
              if (array_key_exists("body",$card))
              {
                foreach ($card["body"] as $value) {
                  # code...
                  if (array_key_exists("type",$value))
                  {
                    if ($value["type"]==HtmlTags::TITLE)
                    {?>
                      <h5 class="card-title"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></h5>
                    <?php
                    }elseif ($value["type"]==HtmlTags::TEXT)
                    {?>
                      <p class="card-text"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></p>
                    <?php
                    }elseif ($value["type"]==HtmlTags::SMALL_TEXT){
                    ?>
                      <p class="card-text"><small class="text-muted"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></small></p>
                    <?php
                    }elseif ($value["type"]==HtmlTags::LIST_UNORDERED || $value["type"]==HtmlTags::LIST_ARTICLE|| $value["type"]==HtmlTags::HYPERLINK)
                    {
                      // Definimos las clases a añadir en función del tipo de elemento
                      $toClass=[["type"=>HtmlTags::LIST_UNORDERED,"class"=>"list-group"],
                      ["type"=>HtmlTags::LIST_ARTICLE,"class"=>"list-group-item"],
                       ["type"=>HtmlTags::HYPERLINK,"class"=>"card-link","classbtn"=>"btn btn-primary"]];
                        $list=SELF::listExplorer($value,$toClass);
                        foreach ($list as $value)     
                      {
                          # code...
                          echo $value;
                      }                      
                    }
                  }  
                }
              }?>             
            </div>
          <?php if ($horizontal){ echo "</div>";}?>
        </div>
      </div>   
    <?php
    }
  }

  /**
   * Genera un grupo de tarjetas a partir del array $cards que contiene arrays tipo $card.
   * La variable $columns indica de cuantas columnas será el grupo de terjetas.
   *
   * @param array $cards
   * @param integer $columns
   * @return void
   */
  public static function cardGroup(array $cards=NULL, int $columns=1)
  {
    ?>    
    <div class="row row-cols-1 row-cols-md-<?php echo $columns;?> g-4">
      <?php 
        if (!empty($cards) && $cards!=NULL)
        {
          foreach ($cards as $value) 
          {
            # code...
            ?>
            <div class="col">
            <?php
              self::card($value);
            ?>
            </div>
            <?php
          }
        }
    ?>
    </div>
    <?php    
  }

  public static function sectionTitle($title=NULL, string $content='')
  {
    $innerTitle='';
    $innerContent='';
    if (!empty($title) && $title!=NULL)
    {
      if (is_array($title))
      {
        # si es un array los valores de 'title' y de 'content' deberían venir dentro.
          if (array_key_exists("title",$title))
          {
            # ponemos  el título
            $innerTitle=$title['title'];
            if (array_key_exists("content",$title))
            {
              #ponemos el contenido
              $innerContent=$title['content'];
            }else
            {
              if (!empty($content))
              {
                # si no esta la clave content en el array buscamos si el contenido viene dado por $content
                $innerContent=$content;
              }
            }
          }
      }else
      {
        # no es un array por lo que el titulo vendrá en la variable $title y el contenido en la variable $content
        # ponemos el titulo
        $innerTitle=$title;
        if (!empty($content))
          {
            # si no esta la clave content en el array buscamos si el contenido viene dado por $content
            $innerContent=$content;
          }
      }
      ?>
      <div class="section-title">
        <h6><?php echo $innerTitle;?></h6>
        <h2><?php echo $innerContent;?></h2>
      </div>
      <?php
    }
  }
}
 