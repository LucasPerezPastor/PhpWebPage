<?php

class Contenido
{
    public $title='',$description='',$url='',$author='';

    public function __construct($title='',$description='',$url='',$author=''){
        $this->title=$title;
        $this->description=$description;
        $this->url=$url;
        $this->author=$author;
    }
}
