<?php


//Archivo de configuracion de las variables generales de
//las vistas que se utilizan en los templates

// global $language;


//***VARIABLES PARA EL HEAD DE LA PAGINA WEB */

//"width" y "height" de la variable $viewPort tienen valores contenidos en la clase HtmlTags(VIEWPORT_DEVICE_WITDH Y VIEWPORT_DEVICE_HEIGHT)
define("HEAD_CONTENT",["charset"=>'utf-8',"author"=>'Author',"description"=>'Description',"title"=>'Title',
"viewport"=>["width"=>HtmlTags::VIEWPORT_DEVICE_WIDTH,"heigth"=>'',"initialScale"=>0,"minimunScale"=>0,"maximumScale"=>0,"userScalable"=>'']]);


$favicon=[];
// "rel" de la variable $icon tienen valores contenidos en la clase HtmlTags (ICON_REL_BASIC,ICON_REL_BASIC_OLD,ICON_REL_APPLE)

$favicon[]=["rel"=>HtmlTags::ICON_REL_BASIC,"src"=>'#', "width"=>100,"heigth"=>100];;//ir añadiendo iconos al array
$favicon[]=["rel"=>HtmlTags::ICON_REL_APPLE,"src"=>'#', "width"=>100,"heigth"=>100];;//ir añadiendo iconos al array

define("FAVICONS",$favicon);

//"rel" de la variable $link tienen valores contenidos en la clase HtmlTags
//( LINK_STYLESHEET,LINK_CANONICAL,LINK_AMPHTML,LINK_MANIFEST,LINK_AUTHOR,
//  LINK_LICENSE,LINK_ALTERNATE,LINK_ME,LINK_ARCHIVES,LINK_INDEX,LINK_SELF_REL,
//  LINK_FIRST,LINK_LAST,LINK_PREV,LINK_NEXT,LINK_EDITURI,LINK_PINGBACK,LINK_WEBMENTION
//  LINK_MICROPUB,LINK_SEARCH,LINK_DNS_PREFETCH,LINK_PRECONNECT,LINK_PREFETCH
//  LINK_PRERENDER,LINK_PRELOAD)

$lnks=[];
$links[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'css/bootstrap.min.css',"asto"=>'',"type"=>'',"title"=>''];;//Ir añadiendo links al array.
$links[]=["rel"=>HtmlTags::LINK_STYLESHEET,"src"=>'css/starter-template.css',"asto"=>'',"type"=>'',"title"=>''];;//Ir añadiendo links al array.
define("LINKS_HEAD",$links);

define ("EXTERNAL_JAVA_SCRIPTS",["js/bootstrap.bundle.min.js","#"]);

//Social Media

//FaceBook
$contenido=["title"=>'Title',"description"=>'Description',"url"=>'#',"author"=>'Author'];
$img=["src"=>'#',"alt"=>'Alt'];
define("FACEBOOKOPENGRAPH",["content"=>$contenido,"img"=>$img,"appid"=>'',"type"=>'',"sitename"=>'',"locale"=>'']);


//Twitter

//Se pueden usar los arrays $contenido y $img de Social Media de Facebook.
//$contenido=["title"=>'',"description"=>'',"url"=>'',"author"=>''];
//$img=["src"=>'',"alt"=>''];
define('TWITTER_CARD',["content"=>$contenido,"img"=>$img,"card"=>'',"site"=>'']);

//** VARIABLES PARA EL NAV DE LA PAGINA WEB */

//Deficinicion del array asociativo para las listas
//["type"=>Tipo de lista se obtiene de los valores de HtmlTag como LIST_ORDERED,LIST_UNORDERED,LIST_ARTICLE,HYPERLINK=
//  "id"=>Identidicador del item de la lista,
//  "method"=>En el caso de un menu se puede indicar que es un menu desplegable con el valor de HtmlTag LIST_DROPDOWM,
//  "include"=>Nuevo Array asociativo con todos los Arrays de lista que estan incluidos dentro de esta lista.
//  "title"=>Titulo de la lista,
//  "src"=>Dirección de Hyperlink donde nos envía ese item de la lista



$item1=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>HtmlTags::LIST_ACTIVE,"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>'']];
$item2=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>'']];
$item3=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>HtmlTags::HYPERLINK_DISABLED,"title"=>'',"src"=>'']];
$subMenu4=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>
            [["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>'']],
            ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>'']],
            ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>'']],
            ]];
$item4=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'',"method"=>HtmlTags::LIST_DROPDOWN,"title"=>'',"src"=>'',"include"=>
        [["type"=>HtmlTags::HYPERLINK,"id"=>'',"method"=>'',"title"=>'',"src"=>''],
        $subMenu4]];

$nav=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'',"method"=>'',"title"=>'',"src"=>'',"include"=>[
        $item1,$item2,$item3,$item4]];


$item1=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item1',"method"=>HtmlTags::LIST_ACTIVE,"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item1',"title"=>'Hyperlink',"src"=>'#']];
$item2=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item2',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item2',"title"=>'Hyperlink',"src"=>'#']];
$item3=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item3',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlink1item3',"method"=>HtmlTags::HYPERLINK_DISABLED,"title"=>'Hyperlink',"src"=>'#']];
$subMenu4=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'submenuitem4',"include"=>
                [["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item1',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item1',"title"=>'Hyperlink',"src"=>'#']],
                ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item2',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item2',"title"=>'Hyperlink',"src"=>'#']],
                ["type"=>HtmlTags::LIST_ARTICLE,"id"=>'submenuitem4item2',"include"=>["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinksubmenuitem4item2',"title"=>'Hyperlink',"src"=>'#']],
                ]];
$item4=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item4',"method"=>HtmlTags::LIST_DROPDOWN,"include"=>
        [["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinkitem4',"title"=>'Hyperlink',"src"=>'#'],
        $subMenu4]];

$subMenu5=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'submenuitem5',"include"=>
        [["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#']],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#']],
        ["type"=>HtmlTags::LIST_ARTICLE,"include"=>["type"=>HtmlTags::HYPERLINK,"src"=>'#']],
        ]];
$item5=["type"=>HtmlTags::LIST_ARTICLE,"id"=>'item5',"method"=>HtmlTags::LIST_DROPDOWN,"include"=>
[["type"=>HtmlTags::HYPERLINK,"id"=>'hyperlinkitem5',"title"=>'Hyperlink',"src"=>'#'],
$subMenu5]];

$nav=["type"=>HtmlTags::LIST_UNORDERED,"id"=>'menu',"method"=>'',"title"=>'',"src"=>'',"include"=>[
        $item1,$item2,$item3,$item4,$item5]];

define('NAVBAR',$nav);


//Logo de la página

define('LOGO',["src"=>"img/logo.jpg","alt"=>"Logo","width"=>100,"height"=>24]);

//Formulario de búqueda

define('SEARCH_FORM',["name"=>"busqueda","placeholder"=>"Búsqueda","method"=>"POST","action"=>"#"]);

//Idioma de la página
$language='es';




