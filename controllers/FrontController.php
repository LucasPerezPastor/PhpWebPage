<?php
//  CONTROLADOR FRONTAL

class Frontcontroller {

    

    // método principal del controlador frontal
    public static function main(){
        
           

        try{
            
            //GESTIÓN DE PETICIONES  
            //recuperar el controlador de la petición
            //si no llega el parámetro c , el conrtrolador es Welcome (config.php)
            //si llega c=libro, el controlador es LibroController
            
            $c=empty($_GET['c'])?DEFAULT_CONTROLLER:ucfirst($_GET['c']).'Controller'; //ucfirst pone en mayúcula la primera letra de la palabra
           
            //recuperar el método de la petición
            // si no llega el parámetro m, el métod es index (config.php)
            //si llega m=create, el método sería create()
            
            $m=empty($_GET['m'])?DEFAULT_METHOD:$_GET['m'];
            
            //recupera el parámetro de la petición
            
            $p=empty($_GET['p'])?false:$_GET['p'];
          
            
            //cargar el controlador correspondiente
            $controlador=new $c();
            
            //comprobar si existe el método
            if (!is_callable([$controlador,$m]))
                    throw new Exception("No existe la operación $m");
            
            //llama al método del controlador , pasando el parámetro

            
            
            $controlador->$m($p); //Ejemplo LibroController->create(5);
        } catch (Throwable $e){   //Throwable = para cualquier tipo de error o excepcion
            $mensaje=$e->getMessage(); //recupera el mensaje de error
            include 'views/error.php';  //carga la vista de error
        }
         
    }
}