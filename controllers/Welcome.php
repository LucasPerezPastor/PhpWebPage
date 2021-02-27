<?php
//controlador por defecto (config.php)

class Welcome {
   // método por defecto (config.php)
   
    public function index(){
        global $definitions;
        //carga la vista de portada
        include 'views/portada.php';
        var_dump($definitions);
    }
}