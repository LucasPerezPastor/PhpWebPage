<?php
class Basic{

    
  

    //  pone el HEAD de la página HTML
  
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

    /*public static function navBarExplorer_(array $navBar=NULL,$id='',string $subclass='',bool $dropdown=false):array{
      $out=[];
      if (!empty($navBar)){
        if ($navBar["type"]==HtmlTags::LIST_UNORDERED || $navBar["type"]==HtmlTags::LIST_ORDERED){
          if ($dropdown){
            $keys=["{type}","{id_name}","{title}","{href}","{labelledby}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["src"],$navBar["title"],$id];
            $out[]=str_replace($keys,$words,'<{type} id={id_name} class="dropdown-menu" aria-labelledby="{labelledby}">{title}');
          }else{
            $keys=["{type}","{id_name}","{title}","{href}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["title"],$navBar["src"]];
            $out[]=str_replace($keys,$words,'<{type} id="{id_name}">{title}');
          }
          foreach ($navBar["include"] as $value) {
            $out=$out+$this->navBarExplorer($value,$id,"dropdown-item",$dropdown);
          }
          $out[]='</'.$navBar["type"].'>';
        }
        if ($navBar["type"]==HtmlTags::HYPERLINK){  
          if ($dropdown){
            // <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            $keys=["{type}","{id_name}","{title}","{labelledby}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["title"],$id];
            $out[]=str_replace($kys,$words,'<{type} id={id_name} class="nav-link dropdown-toggle" href="{href}" data-bs-toggle="dropdown" aria-expanded="false">{title}');
          }else{
            $keys=["{type}","{id_name}","{title}","{class}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["title"],"subclass"];
            $out[]=str_replace($keys,$words,'<{type} id="{id_name}" class="{class}">{title}');
          }
          foreach ($navBar["include"] as $value) {
            $out=$out+$this->navBarExplorer($value,$id,"",$dropdown);
          }
          $out[]='</'.$navBar["type"].'>';
        }
        if ($navBar["type"]==HtmlTags::LIST_ARTICLE){  
          if ($dropdown){
            //<li><a class="dropdown-item" href="#">Action</a></li>
            $keys=["{type}","{id_name}","{title}","{labelledby}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["title"],$id];
            $out[]=str_replace($keys,$words,'<{type} id={id_name}>{title}');
          }else{
            $keys=["{type}","{id_name}","{title}","{class}"];
            $words=[$navBar["type"],$navBar["id"],$navBar["title"],"subclass"];
            $out[]=str_replace($keys,$words,'<{type} id="{id_name}" class="{class}">{title}');
          }
          foreach ($navBar["include"] as $value) {
            $out=$out+$this->navBarExplorer($value,$id,"",$dropdown);
          }
          $out[]='</'.$navBar["type"].'>';
        }
      }
      return $out;
    } */

    public static function returnValue(string $variable='',string $nameVariable=''):string{
      if (!empty($variable)){
        return $nameVariable.'="'.$variable.'"';
      }else{
        return '';
      }
    }

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



          if ($navBar["type"]==HtmlTags::LIST_UNORDERED || $navBar["type"]==HtmlTags::LIST_ORDERED){
            
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
          }elseif($navBar["type"]==HtmlTags::LIST_ARTICLE)
          {  
            if ($dropdown){  
              $class='dropdown-item';
            }else{
              $dropdown=($navBar["method"]==HtmlTags::LIST_DROPDOWN)?true:false;
              
              $innerClass=$class;
              $class="nav-link";
              if ($dropdown){
                 $class.=" dropdown-toggle";
                 $dataBSToggle=HtmlTags::LIST_DROPDOWN;
                 $ariaExpanded="false";
              };
              if (strstr($navBar["method"],HtmlTags::LIST_ACTIVE)){
                $ariaCurrent="page";
              }
            }
          }elseif ($navBar["type"]==HtmlTags::HYPERLINK)
         
          {
            if (strstr($navBar["method"],HtmlTags::HYPERLINK_DISABLED)){
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


          
          $words=[$navBar["type"],self::returnValue($navBar["id"],"id"),
              $navBar["title"],self::returnValue($innerClass.' '.$navBar["method"],"class"),
              self::returnValue($navBar["src"],"href"),self::returnValue($labelledBy,"aria-labelledby"),
              self::returnValue($innerDataBSToggle,"data-bs-toggle"),self::returnValue($innerAriaExpanded,"aria-expanded"),
              self::returnValue($innerTabindex,"tabindex"),self::returnValue($innerAriaDisabled,"aria-disabled"),
              self::returnValue($innerAriaCurrent,"aria-current")
            ];
           
            

            $out[]=str_replace($keys,$words,'<{type} {id_name} {class} {href} {labelledby} {databasetoggle} {ariaexpanded} {tabindex} {ariadisabled} {ariacurrent} >{title}');
            
          
          

          if (array_key_exists("include",$navBar)){
            //Si existe la clave "include", hay dentro otro array            
            $out=array_merge($out,self::navBarExplorer($navBar["include"],$class,$dropdown,$id,$dataBSToggle,$ariaExpanded,$ariaCurrent));
          }
          $out[]='</'.$navBar["type"].'>'; 
          

          
        }else
        {
          // Al no existir la clave "type" , vamos a comprobar si dentro hay más arrays.
          $arrs=array_filter($navBar,'is_array');//Filtra elementos de un array usando una función 'is_array',
                                                //Devolverá un array con tantos 'true' como arrays haya dentro del array original 
          if (count($arrs)==count($navBar)){
            //Dterminamos que todos los elementos del array original son arrays

            foreach ($navBar as $value) {
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
  
    public static function nav(array $navBar=NULL,array $img=NULL,array $title=NULL){
      ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <?php
                $menu=self::navBarExplorer($navBar);//Generamos el menu de navegación a partir del array de valores
                foreach ($menu as $value) {//Nos devueelve un array de strings que iremos imprimiendo uno a uno
                  echo $value;
                }
              ?>
              <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
      <?php
    }

    
}