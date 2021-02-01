<?php

class Imagen{
    //Clase imagen que contiene las propiedades src y alt

    public $src='', $alt='';

    public function __construct(string $src='',string $alt=''){
        $this->src=$src;
        $this->alt=$alt;
    }

}