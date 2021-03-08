<?php


//Archivo de configuracion de las variables generales de
//las vistas que se utilizan en los templates

//La variable definitions es un objeto con todos los textos en el idioma seleccionado


//***VARIABLES PARA EL HEAD DE LA PAGINA WEB */

//"width" y "height" de la variable $viewPort tienen valores contenidos en la clase HtmlTags(VIEWPORT_DEVICE_WITDH Y VIEWPORT_DEVICE_HEIGHT)
/*define("HEAD_CONTENT",[HtmlTags::META_CHARSET=>'utf-8',"author"=>'Author',"description"=>'Description',"title"=>'Title',
"viewport"=>[HtmlTags::WIDTH=>HtmlTags::VIEWPORT_DEVICE_WIDTH,HtmlTags::HEIGHT=>'',"initialScale"=>0,"minimunScale"=>0,"maximumScale"=>0,"userScalable"=>'']]);*/
$headContent=[HtmlTags::META_CHARSET=>$definitions->{HtmlTags::META_CHARSET},"author"=>$definitions->author,"description"=>$definitions->description->secundario,
"title"=>$definitions->title->principal,
"viewport"=>[HtmlTags::WIDTH=>HtmlTags::VIEWPORT_DEVICE_WIDTH,HtmlTags::HEIGHT=>'',"initialScale"=>0,"minimunScale"=>0,"maximumScale"=>0,"userScalable"=>'']];

$favicons=[];
// "rel" de la variable $icon tienen valores contenidos en la clase HtmlTags (ICON_REL_BASIC,ICON_REL_BASIC_OLD,ICON_REL_APPLE)

$favicons[]=["rel"=>HtmlTags::ICON_REL_BASIC,"src"=>'#', HtmlTags::WIDTH=>100,HtmlTags::HEIGHT=>100];;//ir añadiendo iconos al array
$favicons[]=["rel"=>HtmlTags::ICON_REL_APPLE,"src"=>'#', HtmlTags::WIDTH=>100,HtmlTags::HEIGHT=>100];;//ir añadiendo iconos al array

//define("FAVICONS",$favicon);

//"rel" de la variable $link tienen valores contenidos en la clase HtmlTags
//( LINK_STYLESHEET,LINK_CANONICAL,LINK_AMPHTML,LINK_MANIFEST,LINK_AUTHOR,
//  LINK_LICENSE,LINK_ALTERNATE,LINK_ME,LINK_ARCHIVES,LINK_INDEX,LINK_SELF_REL,
//  LINK_FIRST,LINK_LAST,LINK_PREV,LINK_NEXT,LINK_EDITURI,LINK_PINGBACK,LINK_WEBMENTION
//  LINK_MICROPUB,LINK_SEARCH,LINK_DNS_PREFETCH,LINK_PRECONNECT,LINK_PREFETCH
//  LINK_PRERENDER,LINK_PRELOAD)

$lnksHead=[];
$linksHead[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'css/bootstrap.min.css',"asto"=>'',"type"=>'',"title"=>''];;//Ir añadiendo links al array.
//$links[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',"asto"=>'',"type"=>'',"title"=>''];
$linksHead[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'css/starter-template.css',"asto"=>'',"type"=>'',"title"=>''];;//Ir añadiendo links al array.
$linksHead[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'css/template.css',"asto"=>'',"type"=>'',"title"=>''];;//Ir añadiendo links al array.

//define("LINKS_HEAD",$links);


$externalJavaScript=["js/jquery-3.5.1.min.js","js/bootstrap.min.js","js/main.js"];
//define ("EXTERNAL_JAVA_SCRIPTS",["js/jquery-3.5.1.min.js","js/bootstrap.min.js"]);
//define ("EXTERNAL_JAVA_SCRIPTS",["https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js","https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"]);


//Social Media

//FaceBook
$contenido=["title"=>$definitions->facebookOG->title->principal,"description"=>$definitions->facebookOG->description->principal,
                "url"=>'#',"author"=>$definitions->facebookOG->author->principal];
$img=["src"=>'#',"alt"=>$definitions->facebookOG->imageAlt->principal];
$faceBookOpenGraph=["content"=>$contenido,HtmlTags::IMG=>$img,"appid"=>'',"type"=>'',"sitename"=>'',"locale"=>''];

//define("FACEBOOKOPENGRAPH",["content"=>$contenido,HtmlTags::IMG=>$img,"appid"=>'',"type"=>'',"sitename"=>'',"locale"=>'']);


//Twitter

//$contenido=["title"=>'',"description"=>'',"url"=>'',"author"=>''];
//$img=["src"=>'',"alt"=>''];
$contenido=["title"=>$definitions->twitterCard->title->principal,"description"=>$definitions->twitterCard->description->principal,
                "url"=>'#',"author"=>$definitions->twitterCard->author->principal];
$img=["src"=>'#',"alt"=>$definitions->twitterCard->imageAlt->principal];
$twitterCard=["content"=>$contenido,HtmlTags::IMG=>$img,"card"=>'',"site"=>''];

//define('TWITTER_CARD',["content"=>$contenido,HtmlTags::IMG=>$img,"card"=>'',"site"=>'']);

//** VARIABLES PARA EL NAV DE LA PAGINA WEB */

//Deficinicion del array asociativo para las listas
//["type"=>Tipo de lista se obtiene de los valores de HtmlTag como LIST_ORDERED,LIST_UNORDERED,LIST_ARTICLE,HYPERLINK=
//  "id"=>Identidicador del item de la lista,
//  "method"=>En el caso de un menu se puede indicar que es un menu desplegable con el valor de HtmlTag LIST_DROPDOWM,
//  "include"=>Nuevo Array asociativo con todos los Arrays de lista que estan incluidos dentro de esta lista.
//  "title"=>Titulo de la lista,
//  "src"=>Dirección de Hyperlink donde nos envía ese item de la lista


$item1=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item1',"method"=>HtmlTags::LIST_ACTIVE,"include"=>
                ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item1',"title"=>$definitions->navBar->menu->link,"src"=>'#']];
$item2=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item2',"include"=>
                ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item2',"title"=>$definitions->navBar->menu->link2,"src"=>'#']];
$item3=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item3',"include"=>
                ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item3',"method"=>HtmlTags::HYPERLINK_DISABLED,"title"=>$definitions->navBar->menu->link3,"src"=>'#']];
$subMenu4=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'submenuitem4',"include"=>
                [["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item1',"include"=>
                        ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item1',"title"=>$definitions->navBar->menu->link4->sublink->link1,"src"=>'#']],
                ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item2',"include"=>
                        ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item2',"title"=>$definitions->navBar->menu->link4->sublink->link2,"src"=>'#']],
                ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item2',"include"=>
                        ["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item3',"title"=>$definitions->navBar->menu->link4->sublink->link3,"src"=>'#']],
                ]];
$item4=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item4',"method"=>HtmlTags::LIST_DROPDOWN,"include"=>
        [["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinkitem4',"title"=>$definitions->navBar->menu->link4->title,"src"=>'#'],$subMenu4]];

$navBar=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'menu',"method"=>'',"title"=>'',"src"=>'',"include"=>[
        $item1,$item2,$item3,$item4]];

$navBarClass=['class'=>'','navColor'=>'navbar-dark','navBgColor'=>'bg-dark'];//Se definen las clase del navBar       
//define('NAVBAR',$navBar);


//Logo de la página

$logo=["src"=>"img/logo.jpg","alt"=>$definitions->navBar->logo,HtmlTags::WIDTH=>100,HtmlTags::HEIGHT=>24];

//define('LOGO',["src"=>"img/logo.jpg","alt"=>"Logo",HtmlTags::WIDTH=>100,HtmlTags::HEIGHT=>24]);

//Formulario de búqueda

$searchForm=["name"=>$definitions->navBar->searchForm->name,"placeholder"=>$definitions->navBar->searchForm->placeHolder,"method"=>"POST","action"=>"#"];

//define('SEARCH_FORM',["name"=>"busqueda","placeholder"=>"Búsqueda","method"=>"POST","action"=>"#"]);




//Contenido del footer
//Crearemos un array multidimensional de arrays asociativos.
//Este array asociativo esta formado por la claves:
        //"type"=HtmlTags::CONTENT_FOOTER || HtmlTags::LINK_FOOTER
        //"title"= Titulo del contenido
        //"content"= Contenido del footer en el caso de ser un CONTENT_FOOTER
        //"include"= Array asociativo para listas con la misma estructura que el array de listas 
        //"rel"=Relacion entre los diferentes componentes del footer , es un número que especifica
        //      la relación de ancho entre los componentes , normalmente un CONTET_FOOTER sera un "2" de 2 a 1 
        //      y los links seria un "1" de 1 a 1.
        //"id"=Id del elemento

//El orden de los arrays dentro del array principal es el orden de muestra de izquierda a derecha o top->bottom en el caso de pantallas pequeñas.

$contentFooter=["type"=>HtmlTags::CONTENT_FOOTER,"title"=>"CONTENT FOOTER","content"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
voluptatem veniam, est atque cumque eum delectus sint!","rel"=>2];

$listLink1=["type"=>HtmlTags::LIST_UNORDERED,HtmlTags::ID=>'submenuitem5',"include"=>
        [["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link1"]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link2"]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link3"]],
        ]];

$link1=["type"=>HtmlTags::LINK_FOOTER,"title"=>"LINK1","rel"=>1,"include"=>$listLink1];

$listLink2=["type"=>HtmlTags::LIST_UNORDERED,HtmlTags::ID=>'submenuitem5',"include"=>
        [["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link1"]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link2"]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link3"]],
        ]];

$link2=["type"=>HtmlTags::LINK_FOOTER,"title"=>"LINK1","rel"=>3,"include"=>$listLink1];

$footer=[$contentFooter,$link1,$link2];

//define('FOOTER',[$contentFooter,$link1,$link2]);


//Datos para el Carousel
//Crearemos un array multidimensional de arrays asociativos.
//Este array asociativo esta formado por la claves:
                //"img_src"=Dirección de la unicación de la imagen.
                //"img_alt"=Texto alternativo de la imagen.
                //"tile"=Subtitulo del carousel.
                //"content"=Contenido del subtitulo.
                //"active"=Indica si es el elemento activo para que funcionen los indicadores de carousel. El valor debe ser 1 y siempre debe haber uno de los aarays con "active"=>1

$carousel1=["img_src"=>"#","img_alt"=>"text alternative","title"=>"Lorem ipsum dolor sit amet consectetur","content"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit.","active"=>1];
$carousel2=["img_src"=>"#","img_alt"=>"text alternative","title"=>"Lorem ipsum dolor sit amet consectetur","content"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit."];
$carousel3=["img_src"=>"#","img_alt"=>"text alternative","title"=>"Lorem ipsum dolor sit amet consectetur","content"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit."];
$carousel4=["img_src"=>"#","img_alt"=>"text alternative","title"=>"Lorem ipsum dolor sit amet consectetur","content"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit."];

$carousel=[$carousel1,$carousel2,$carousel3,$carousel4];

//define("CAROUSEL",[$carousel1,$carousel2,$carousel3,$carousel4]);


//Datos de las tarjetas (Card)
//Las tarjetas contienen una imagen ["src"=>"...","alt"=>"...","width"=>0,"height"=>0]
//Después tiene un "body" que puede contener titulos, textos , listas o textos de letra pequeña
//Las tarjetas son un array de dos arrays [img,body] y body puede ser un array multidimensional y el orden de muestra 
//va en función del orden del array.

$img=["src"=>"#","alt"=>"...",HtmlTags::WIDTH=>100,HtmlTags::HEIGHT=>100];
$firstTitle=["type"=>HtmlTags::TITLE,"content"=>"Lore ipsum dolor sit amet"];
$secondTitle=["type"=>HtmlTags::TITLE,"content"=>"Lore ipsum dolor sit amert"];
$firstText=["type"=>HtmlTags::TEXT,"content"=>"Lore ipsum dolor sit amet consectetur"];
$listLink=["type"=>HtmlTags::LIST_UNORDERED,HtmlTags::ID=>'submenuitem5',"include"=>
        [["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link1","btn"=>true]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link2"]],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#',"title"=>"Link3"]],
        ]];
$body=[$firstTitle,$firstText,$secondTitle,$listLink];

$cardPresent=[HtmlTags::IMG=>$img,"body"=>$body,'class'=>'no-border'];

//define("CARD_PRESENT",[HtmlTags::IMG=>$img,"body"=>$body]);


//Grupo de tarjetas 
//Es un array multidimensional con arrays de tarjetas dentro

$cardGroup=[$cardPresent,$cardPresent,$cardPresent,$cardPresent];

//define ("CARD_GROUP",[CARD_PRESENT,CARD_PRESENT,CARD_PRESENT,CARD_PRESENT,CARD_PRESENT]);

// MODALS
// ['id'=>'','title'=>'','class'=>'','align'=>'','body'=>['','','',''],buttons=>[[type=>'close',class_btn=>'btn-secondary',id=>'',title=>'Close']]]
// $externalLink=['container_class'=>'','id'=>'','type'=>'','class'=>'','title'=>''];
//' type' de $externalLink puede ser self::HYPERLINK o self::BUTTON
//Modal Informacion cookies

$bodyInfoCookies= new ListTemplateText($definitions->cookiesPolicy->getToArray());

$infoCookies=['id'=>'infoCookies','title'=>$definitions->cookiesPolicy->title,'body'=>$bodyInfoCookies->getListcontent(),'buttons'=>[
        ['id'=>'acceptInfoCookies','type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>$definitions->infoCookies->acceptCookies],
        ['id'=>'closeInfoCookies','type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>$definitions->infoCookies->close]]];


// Modal del aviso de cookies

$warningCookies=['id'=>'warningCookies','class'=>HtmlTags::STYLE_MODAL_DIALOG_END.' modal-xl '.HtmlTags::STYLE_NO_BORDER,'static'=>true,
'buttons'=>['id'=>'moreInfoCookies',['type'=>HtmlTags::BUTTON_TARGET_MODAL,'target_modal'=>'infoCookies','title'=>$definitions->warningCookies->moreInfoCookies],
        ['id'=>'acceptCookies','type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>$definitions->warningCookies->acceptCookies],
        ['id'=>'closeCookies','type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>$definitions->warningCookies->close]]];


//Array de idiomas disponibles

$languages=[ES_LANG=>['title'=>$definitions->language->es,'selected'=>($language==ES_LANG)?true:false],
        CAT_LANG=>['title'=>$definitions->language->cat,'selected'=>($language==CAT_LANG)?true:false]];


