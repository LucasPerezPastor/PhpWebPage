<?php

class Article extends Tag{

    public function __construct(string $id, $title='',string $src='',$attribute=NULL){
        parent::__construct($id,$title,$src,$attribute);
        $this->setTypeOfAttribute('li');
    }
}