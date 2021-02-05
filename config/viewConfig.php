<?php


//Archivo de configuracion de las variables generales de
//las vistas que se utilizan en los templates

// global $language;

//definimos el charset
define ('CHARSET',$charset_html);
//ViewPort del HEAD
$viewPort=new ViewPortTag(ViewPortTag::DEVICE_WIDTH,1,1);
define  ('VIEWPORT',$viewPort);
// Configuración de la variable contenido de la cabecera HEAD (titulo , author , descripción)
$contentHead=New HeadContentTag(TITLE,AUTHOR,DESCRIPTION);
define('CONTENT_HEAD',$contentHead);
// Lista de los iconos Favicons a cargar por la página.
$listIcons=New IconsTag();
$listIcons->addIcon(New Icono(Icono::REL_BASIC,'direccion del Icono',100,100));
$listIcons->addIcon(New Icono(Icono::REL_APPLE,'direccion del Icono',100,100));
define('LIST_ICONS',$listIcons);
//Lista de links del HEAD incluido los CSS FILES
$links=New LinksTag();//Creación del objeto
$links->addLink(new Link(Link::STYLESHEET,CSS_BASIC_FILE));//Usar el método addLink para ir añadiendo diferentes links
$links->addLink(new Link(Link::STYLESHEET,CSS_BOOTSTRAP));
define('LINKS',$links);
//Lista de Script externos de JavaScript
$externalJavaScripts=New SrcJavaScriptsTag(); //Creación del objeto
$externalJavaScripts->addSrc('Mi Java script');//Usar el método addSrc para añadir diferentes rutas de archivos JavaScript
define('EXTERNAL_JAVASCRIPT',$externalJavaScripts);
//Social
//FaceBook Open Graph
$faceBookOpenGraph=new FacebookOpenGraphTag(
    new Contenido('titulo','descripcion','url','author'), 
    new Imagen('direccion','alt'),'appId','type','site_name','locale');
define('FACEBOOK_OPENGRAPH',$faceBookOpenGraph);
//Twitter
$twitterCard=new TwitterCardTag(
    new Contenido('titulo','descripcion','url','author'), 
    new Imagen('direccion','alt'),'card','site');  
define('TWITTER_CARD',$twitterCard);
//Idioma de la página
$language='es';




