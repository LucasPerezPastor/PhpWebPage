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
        echo self::meta(self::META_CHARSET,$headContent[self::META_CHARSET]).PHP_EOL;
        echo self::viewPort($headContent["viewport"]).PHP_EOL;
        echo self::title($headContent["title"]).PHP_EOL;
        echo self::meta('author',$headContent["author"],'name').PHP_EOL;
        echo self::meta('description',$headContent["description"],'name').PHP_EOL;
      };
      if (!is_null($favicons)){
        foreach ($favicons as $value) {
          echo self::icon($value["rel"],$value["src"],$value[self::WIDTH],$value[self::HEIGHT]).PHP_EOL;
        }
      };
      if (!is_null($links)){
        foreach ($links as $value) {
          echo self::link($value["rel"],$value["src"],$value["type"],$value["title"],$value["asto"]).PHP_EOL;
        }
      };
      if (!is_null($javaScripts)){
        
        foreach ($javaScripts as $value) {
          echo self::srcJavaScript($value).PHP_EOL;
        }
      };
      if (!is_null($faceBookOpenGraph)){
        $prop='property';
        $og='og:';
        echo self::meta('fb:app_id',$faceBookOpenGraph["appid"],$prop).PHP_EOL;
        echo self::meta($og.'title',$faceBookOpenGraph["content"]["title"],$prop).PHP_EOL;
        echo self::meta($og.'description',$faceBookOpenGraph["content"]["description"],$prop).PHP_EOL;
        echo self::meta('article:author',$faceBookOpenGraph["content"]["author"],$prop).PHP_EOL;
        echo self::meta($og.'url',$faceBookOpenGraph["content"]["url"],$prop).PHP_EOL;
        echo self::meta($og.'image',$faceBookOpenGraph[self::IMG]["src"],$prop).PHP_EOL;
        echo self::meta($og.'image:alt',$faceBookOpenGraph[self::IMG]["alt"],$prop).PHP_EOL;    
        echo self::meta($og.'type',$faceBookOpenGraph["type"],$prop).PHP_EOL;
        echo self::meta($og.'site_name',$faceBookOpenGraph["sitename"],$prop).PHP_EOL;
        echo self::meta($og.'locale',$faceBookOpenGraph["locale"],$prop).PHP_EOL;
      };
      if (!is_null($twitterCard)){
        $prop='name';
        $twit='twitter:';
        $out='';
        echo self::meta($twit.'title',$twitterCard["content"]["title"],$prop).PHP_EOL;
        echo self::meta($twit.'description',$twitterCard["content"]["description"],$prop).PHP_EOL;
        echo self::meta($twit.'creator',$twitterCard["content"]["author"],$prop).PHP_EOL;
        echo self::meta($twit.'url',$twitterCard["content"]["url"],$prop).PHP_EOL;
        echo self::meta($twit.'image',$twitterCard[self::IMG]["src"],$prop).PHP_EOL;
        echo self::meta($twit.'image:alt',$twitterCard[self::IMG]["alt"],$prop).PHP_EOL;    
        echo self::meta($twit.'card',$twitterCard["card"],$prop).PHP_EOL;
        echo self::meta($twit.'site',$twitterCard["site"],$prop).PHP_EOL;
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
          $navId=(array_key_exists(self::ID,$navBar))?$navBar[self::ID]:'';
          $navTitle=(array_key_exists("title",$navBar))?$navBar["title"]:'';
          $navSrc=(array_key_exists("src",$navBar))?$navBar["src"]:'';

          if ($navType==self::LIST_UNORDERED || $navType==self::LIST_ORDERED){           
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
          }elseif($navType==self::LIST_ARTICLE)
          {  
            if ($dropdown){  
              $class='dropdown-item';
            }else{
              $dropdown=($navMethod==self::LIST_DROPDOWN)?true:false;              
              $innerClass=$class;
              $class="nav-link";
              if ($dropdown){
                 $class.=" dropdown-toggle";
                 $dataBSToggle=self::LIST_DROPDOWN;
                 $ariaExpanded="false";
              };
              if (strstr($navMethod,self::LIST_ACTIVE)){
                $ariaCurrent="page";
              }
            }
          }elseif ($navType==self::HYPERLINK)         
           {
            if (strstr($navMethod,self::HYPERLINK_DISABLED)){
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
          $words=[$navType,self::returnValue($navId,self::ID),
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
              $id=isset($value[self::ID])?$value[self::ID]:'';
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
    public static function nav(array $navBar=NULL,array $toClass=NULL,string $title='',string $href="#",$logo=NULL,array $language=NULL,array $search=NULL){
      $navClass='navbar-dark bg-dark';
      if (!empty($toClass) && !is_null($toClass))
      {
        $navClass='';
        $navClass=(array_key_exists('navColor',$toClass) && !is_null($toClass['navColor']))?$toClass['navColor'].' ':'navbar-dark ';
        $navClass.=(array_key_exists('navBgColor',$toClass) && !is_null($toClass['navBgColor']))?$toClass['navBgColor'].' ':'bg-dark';
        $navClass.=(array_key_exists('class',$toClass) &&  !is_null($toClass['class']))?$toClass['class'].' ':'';
        $navClass=trim($navClass);
      }
      ?>
        
        <nav class="navbar navbar-expand-md <?php echo $navClass?> fixed-top">
         
          
    
        
          <div class="container-fluid">
          
            <a class="navbar-brand" href="<?php echo $href?>">
              <?php
              if (!empty($logo))
              {
               self::imgToHtml($logo);            
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

              $isSearch=(!is_null($search) && !empty($search))?true:false;
              $isLanguage=(!is_null($language) && !empty($language))?true:false;

              if ($isLanguage){
                ?>
                  <div class="container col-lg-4  col-md-6 col-xs-12 mx-1">  
                    <div class="row justify-content-end my-2">
                      <select class="form-select form-select-sm" id="languageSelector" aria-label="languageSelect" style="width:auto;">
                      <?php
                        # $key es el valor que tendrá el option y después $value sera un array asociativo bidimensional con
                        # $selected que si vale true deber ser la opción por defecto del select y $title que es el texto a mostrar
                        foreach ($language as $key => $value) {
                          # code...
                          ?>
                            <option <?php echo (array_key_exists('selected',$value)?(($value['selected']==true)?'selected':''):'');?> value="<?php echo $key?>"><?php echo (array_key_exists('title',$value)?$value['title']:'')?></option>
                            <?php
                        }
                          ?>
                      </select>
                    </div>
                <?php
              }
              if ($isLanguage && $isSearch)
              {
                ?>
                  <div class="row ms-auto">
                <?php
              }   
                if ($isSearch){
                  ?>
                    <form class="d-flex"  action="<?php echo (array_key_exists("action",$search)?$search["action"]:'')?>" method="<?php echo (array_key_exists("method",$search)?$search["method"]:'')?>">
                  <input class="form-control me-2" type="search" placeholder="<?php echo (array_key_exists("placeholder",$search)?$search["placeholder"]:'')?>" 
                              aria-label="Search">
                  <button class="btn btn-outline-success" type="submit"><?php echo (array_key_exists("name",$search)?$search["name"]:'')?></button>
                </form>
                  <?php
                }
                if ($isLanguage && $isSearch)
                {
                  ?>
                  </div>
                  <?php    
                }
                if ($isLanguage)
                {
                  ?>    
                  </div>
                <?php
              }
              ?> 
            </div>
          </div>
         
        </nav>
      <?php
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
                      if ($value["type"]==self::CONTENT_FOOTER)
                      {
                        echo ("<p>{$value["content"]}</p>");
                      }elseif ($value["type"]==self::LINK_FOOTER)
                      {
                        // Definimos las clases a añadir en función del tipo de elemento
                        $toClass=[["type"=>self::LIST_UNORDERED,"class"=>"list-unstyled mb-0"],
                                  ["type"=>self::HYPERLINK,"class"=>"text-dark"]];
                        self::listExplorerToHtml($value["include"],$toClass);
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
              <div class="col-lg-3 col-md-3 col-sm-12 text-start">
                <?php echo (array_key_exists('copyright',$informationFooter)?$informationFooter['copyright']:'')?>
              </div>
              <div class="col-lg-6 col-md-8 col-sm-12 text-center">
              <?php echo (array_key_exists('legal_advice',$informationFooter)?$informationFooter['legal_advice']:'')?>
              <?php echo (array_key_exists('privacy_policy',$informationFooter)?$informationFooter['privacy_policy']:'')?>
              <?php echo (array_key_exists('cookies_policy',$informationFooter)?$informationFooter['cookies_policy']:'')?>
              </div>
            
          </div>
          <?php
          }
          ?>
         
        </footer>
        <!-- Footer -->
      <?php
    }


    


    public static function linkModal(string $targetLink='',array $externalLink=NULL):string
    {
       # $externalLink=['container_class'=>'','id'=>'','type'=>'','class'=>'','title'=>'' ];
        # 'type' de $externalLink puede ser self::HYPERLINK o self::BUTTON

      $out='';

      if (!empty($externalLink) && $externalLink!=NULL)
      {
        $containerClass= array_key_exists('container_class',$externalLink)?self::returnValue($externalLink['container_class'],'class'):'';
        $typeLink=array_key_exists('type',$externalLink)?
        (($externalLink['type']==self::HYPERLINK || $externalLink['type']==self::BUTTON)?$externalLink['type']:self::BUTTON):self::BUTTON;
        $linkTitle=array_key_exists('title',$externalLink)?$externalLink['title']:'';
        $linkClass=array_key_exists('class',$externalLink)?$externalLink['class']:'';
        $linkId=array_key_exists(self::ID,$externalLink)?self::returnValue($externalLink[self::ID],self::ID):'';
      }else
      {
        $containerClass='';
        $typeLink=self::BUTTON;
        $linkTitle="Modal {$targetLink}";
        $linkClass="btn-primary";
        $linkId='';
      }
      $out="<div {$containerClass}>".PHP_EOL;
      $out.= '<'.$typeLink.' '.$linkId.' '.(($typeLink==self::BUTTON)?'type="button"':'').(self::returnValue((($typeLink==self::BUTTON)?'btn ':'').$linkClass,'class')).
      ' data-bs-toggle="modal" data-bs-target="#'.$targetLink.'" >'.$linkTitle.'</'.$typeLink.'>'.PHP_EOL;
      $out.="</div>".PHP_EOL;
        return $out;
    }
    
    public static function makeModal(array $modal=NULL, array $externalLink=NULL){
      # $modal=['id'=>'','title'=>'','class'=>'','align'=>'','static'=>false,'body'=>['','','',''],buttons=>[[type=>'close',class_btn=>'btn-secondary',id=>'',title=>'Close']]]
      # $externalLink=['container_class'=>'','id'=>'','type'=>'','class'=>'','title'=>''];
      # 'type' de $externalLink puede ser self::HYPERLINK o self::BUTTON
      

      # <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      # <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
      if (!empty($modal) && $modal!=NULL)
      {
      $id=array_key_exists(self::ID,$modal)?$modal[self::ID]:((array_key_exists('title',$modal))?$modal['title'].'ModalCenteredScrollable':'ModalCenteredScrollable');
      $idAriaLabelledBy=$id.'title';
      $classModalDialog='';
        $classModalInnerContent='';
      if (array_key_exists('class',$modal))
      {
        $classes=explode(' ',$modal['class']);
        
        foreach ($classes as $clas) {
          # code...
          if ($clas==self::STYLE_NO_BORDER)
          {
            $classModalInnerContent.=' '.$clas;
          }else
          {
            $classModalDialog.=' '.$clas;
          }
        }
        $classModalInnerContent=trim($classModalInnerContent);
        $classModalDialog.=(strpos($classModalDialog,self::STYLE_MODAL_DIALOG_CENTERED)!==false || 
                            strpos($classModalDialog,self::STYLE_MODAL_DIALOG_START)!==false || 
                            strpos($classModalDialog,self::STYLE_MODAL_DIALOG_END)!==false)?'':' '.self::STYLE_MODAL_DIALOG_CENTERED;
        $classModalDialog=trim($classModalDialog);
      }else
      {
        $classModalDialog=self::STYLE_MODAL_DIALOG_CENTERED;
      }
      $static=(array_key_exists('static',$modal))?(($modal['static']==true)?'data-bs-backdrop="static" data-bs-keyboard="false"':''):'';
      ?>
      <div class="modal fade" id="<?php echo $id?>" <?php echo $static ?>tabindex="-1" aria-labelledby="<?php echo $idAriaLabelledBy?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable <?php echo $classModalDialog?>" >
          <div class="modal-content">
            <div class="modal-header <?php echo $classModalInnerContent?>">
              <h5 class="modal-title" id="<?php echo $idAriaLabelledBy?>"><?php echo (array_key_exists('title',$modal)?$modal['title']:'')?></h5>
              <button type="button" id="closeHeader<?php echo ucfirst($id)?>" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body <?php echo $classModalInnerContent?>">
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
            <div class="modal-footer <?php echo $classModalInnerContent?>">
              <?php if (array_key_exists('buttons',$modal))
              {
                foreach ($modal['buttons'] as $button) 
                {
                  # code...
                  # Buscamos dentro del array buttons y vamos imprimiendo los buttons que existan
                  # si no hay especificado la clase del button sera del tipo btn-secondary
                  self::buttonToHtml($button,'btn-secondary');
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
      if (!empty($externalLink) && $externalLink!=NULL)
      {
        echo self::linkModal($id,$externalLink);
      }    
      }
    }




    /**
     * Genera un carousel de imágenes con texto. Las imágenes con titulo y descripción vienen dadas por el 
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
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
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
   * En función del tipo de elemento indicado en el array card , imprime la etiqueta 
   * correspondiente en código html .
   *
   * @param array $value
   * @param string $toClass
   * @return void
   */
  public static function typeCardToHTML(array $value, string $toClass='')
  {
    if (array_key_exists("type",$value))
    {
      if ($value["type"]==self::TITLE)
      {?>
        <h5 class="card-title"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></h5>
      <?php
      }elseif ($value["type"]==self::TEXT)
      {?>
        <p class="card-text"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></p>
      <?php
      }elseif ($value["type"]==self::SMALL_TEXT){
      ?>
        <p class="card-text"><small class="text-muted"><?php echo (array_key_exists("content",$value)?$value["content"]:'')?></small></p>
      <?php
      }elseif ($value["type"]==self::LIST_UNORDERED || $value["type"]==self::LIST_ARTICLE|| $value["type"]==self::HYPERLINK)
      {
        // Definimos las clases a añadir en función del tipo de elemento
        $toClass=[["type"=>self::LIST_UNORDERED,"class"=>"list-group".$toClass],
        ["type"=>self::LIST_ARTICLE,"class"=>"list-group-item".$toClass],
         ["type"=>self::HYPERLINK,"class"=>"card-link","classbtn"=>"btn btn-primary"]];
          self::listExplorerToHtml($value,$toClass);                    
      }
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
    $toClass=(array_key_exists('class',$card))?$card['class']:'';
    if (!empty($card) && $card!=NULL){
      if ($horizontal)
      {?>
        <div class="card <?php echo $toClass?> mb-3">
          <div class="row g-0">
            <div class="col-lg-4 col-md-4 col-sm-12">
       <?php 
      }else
      {?>
        <div class="card <?php echo $toClass?>">
      <?php
      }
            if (array_key_exists(self::IMG,$card))
            {
              $src=(array_key_exists("src",$card[self::IMG]))?$card[self::IMG]["src"]:'';
              $alt=(array_key_exists("alt",$card[self::IMG]))?$card[self::IMG]["alt"]:'';
              $width=(array_key_exists("width",$card[self::IMG]))?self::returnValue($card[self::IMG][self::WIDTH],self::WIDTH):'';
              $height=(array_key_exists("height",$card[self::IMG]))?self::returnValue($card[self::IMG][self::HEIGHT],self::HEIGHT):'';
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
                  self::typeCardToHtml($value,$toClass);
                }
              }?>             
            </div>
            <?php 
              if (array_key_exists('footer',$card))
              {
                ?>
                <div class="card-footer">
                <?php
                   foreach ($card["footer"] as $value) 
                   {
                    self::typeCardToHtml($value,$toClass);
                    }
                ?>
                </div>
                <?php
              }
            ?>
      <?php if ($horizontal){?>
          </div>
        </div>
      <?php
      }?>
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
  public static function cardGroup(array $cards=NULL, int $columns=1,bool $horizontal=true)
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
              self::card($value,$horizontal);
            ?>
            </div>
            <?php
          }
        }
    ?>
    </div>
    <?php    
  }

  /**
   * Genera un div con con dos texto en diferentes tamaños para 
   * poner un título y una descripción
   *
   * @param [type] $title
   * @param string $content
   * @return void
   */
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
        <?php
          echo (!empty($innerTitle))?"<h6>{$innerTitle}</h6>".PHP_EOL:'';
          echo (!empty($innerContent))?"<h2>{$innerContent}</h2>".PHP_EOL:'';
        ?>
      </div>
      <?php
    }
  }
}
 