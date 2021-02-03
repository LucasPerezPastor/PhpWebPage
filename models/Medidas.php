<?php

class Medidas{

    public $width=0,$heigth=0;


    public function __construct(int $width=0, int $heigth=0)
    {
        $this->width=$width;
        $this->heigth=$heigth;
    }
}