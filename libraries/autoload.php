<?php

//función que usaremos para buscar las clases
function load($clase){
    global $classmap; //Acceso a la variable global que hay en el archivo config.php
    
    //para cada directorio de la lista
    foreach ($classmap as $directorio) {
        $ruta="$directorio/$clase.php"; //calcula la ruta
       
        if (is_readable($ruta)){    //Si es legible...
            require_once $ruta;     //carga la clase
            
        break;                      //salimos del bucle para ahorrar iteraciones
            
        }
    }
}

spl_autoload_register("load");   //registrar la función de autoload