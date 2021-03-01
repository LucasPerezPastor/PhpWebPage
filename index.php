<?php


//Fichero index.php
//por aquí pasan todas las peticiones

//para cuando trabajemos con sesiones

session_start();

//cargar recursos
require_once 'config/config.php'; //Archivo de configuración
require_once 'libraries/autoload.php';
//Idioma de la página
$language='es';

$definitions=new Translate($language);
require_once 'config/viewConfig.php';//Archivo de configuración relacionado con los templates de vistas que requieren la carga previa de clases



//Invocar al controlador frontal
FrontController::main();

