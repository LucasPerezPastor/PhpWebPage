<?php
//controlador por defecto (config.php)

class Welcome {
   // método por defecto (config.php)
   
    public function index(){
        
        //carga la vista de portada
        // se deben indicar que variables son globales para que funcionen las vistas
        // para ello cargamos el archivo de configuracion globalVariables.php
        require_once 'config/globalVariables.php';
        include 'views/portada.php';
        
    }
}