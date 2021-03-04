<?php


//Fichero index.php
//por aquí pasan todas las peticiones

//para cuando trabajemos con sesiones

// iniciamos una sesion
 session_start();

//cargar recursos
require_once 'config/config.php'; //Archivo de configuración
require_once 'libraries/autoload.php';
//Idioma de la página
//verificamos si hay cambios de lenguaje mediante POST


if (isset($_POST["lang"]) && in_array($_POST['lang'],LIST_LANG)) 

    {
        
        $_SESSION["lang"] = $_POST["lang"];
        $pt="POST:".$_POST["lang"];
    }

  // verificamos la sesion creada
  if (isset($_SESSION['lang'])) 
  {
    $language = $_SESSION["lang"];

  } else 
  {
    $language=DEFAULT_LANGUAGE;
  }


try
 {
    //code...
    $definitions=new Translate($language,DEFAULT_LANGUAGE,'#TEXT_NOT_FOUND!');
    //Cargamos las definiciones en función del idioma seleccionado o en su defecto
    //si este no existe en el idioma indicado por defecto
} catch (\Throwable $th) 
{
    //throw $th;
    exit($th->getMessage()); //recupera el mensaje de error
    //En el caso que no existan ni el idioma seleccionado ni el idioma por defecto salimos de la página
    //indicando el error.
}

require_once 'config/viewConfig.php';//Archivo de configuración relacionado con los templates de vistas que requieren la carga previa de clases



//Invocar al controlador frontal
FrontController::main();

