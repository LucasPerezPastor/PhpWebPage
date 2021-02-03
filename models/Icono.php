<?php

class Icono{

    public $rel='',$src='', $width=0,$heigth=0;

    const REL_BASIC='icon';
    const REL_BASIC_OLD='shortcut icon';
    const REL_APPLE='apple-touch-icon-precomposed';


    public function __construct(string $rel,string $src='',int $width=0, int $heigth=0){
        $this->src=$src;
        $this->rel=$rel;
        $this->width=$width;
        $this->heigth=$heigth;
    }

    
}
