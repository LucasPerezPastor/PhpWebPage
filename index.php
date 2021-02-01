<?php


//Fichero index.php
//por aquí pasan todas las peticiones

//para cuando trabajemos con sesiones

session_start();

//cargar recursos
require_once 'config/config.php'; //Archivo de configuración
require_once 'libraries/autoload.php';



//Invocar al controlador frontal
FrontController::main();

