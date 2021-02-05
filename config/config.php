<?php


//lista de directorios donde debe buscar el Autoload

$classmap=['controllers','models','libraries','templates'];


//PARAMETROS DE CONFIGURACION DE LA BDD
//Se declaran constantes
define('DB_HOST', 'localhost');     //host
define('DB_USER', 'root');          //usuario
define('DB_PASS', '');              //password
define('DB_NAME', 'biblioteca');    //base de datos
define('DB_CHARSET', 'utf8');       //codificacion
    
//CONTROLADOR Y METODO POR DEFECTO
define('DEFAULT_CONTROLLER','Welcome');
define('DEFAULT_METHOD','index');

//PARA EL ENVIO DE MAIL DE CONTACTO
define('CONTACT_EMAIL','thelucaS_p@hotmail.com');

//DIRECTORIO DONDE GUARDAMOS LAS IMAGENES
define('DEFAULT_IMAGE_LIBROS','imagenes/libros');

//TEMPLATE A USAR EN LAS VISTAS
define('TEMPLATE','Basic');

//TITULO DE LA PAGINA
define('TITLE','Titulo de la página');

//DESCRIPCION DE LA PAGINA
define('DESCRIPTION','Descripcion de la página');

//AUTOR DE LA PÁGINA 
define('AUTHOR','Autor de la página');

//CSS A USAR PARA LAS VISTAS
define('CSS_BASIC_FILE','css/starter-template.css'); // Custom styles for this template -->
define ('CSS_BOOTSTRAP','css/bootstrap.min.css'); // Bootstrap core CSS -->



