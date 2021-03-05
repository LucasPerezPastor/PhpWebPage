<?php

class Translate extends AssociativeArrayObject
{


    private $errorTranslateMessage='';

    public function __construct(string $language='',string $defaultLanguage='',string $errorMessage=NULL)
    {
        if (!is_null($errorMessage)){$this->errorTranslateMessage=$errorMessage;}

        if (!empty($language))
        {
            $path='lang/'.$language.'.php';
            $pathDefault='lang/'.$defaultLanguage.'.php';
            if (file_exists($path))
            {
                require_once $path;
            }elseif (file_exists($pathDefault))
            {
                require_once $pathDefault;
            }else
            {
                throw new Exception('LANGUAGE NOT FOUND, IDIOMA NO LOCALIZADO');
            }

            
            
            if (isset($data))
            {
                if (is_array($data))
                {
                    parent::__construct($data);
                }   
            }
        }        
    }



    public function __get($property) 
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }else
        {
            return $this->errorTranslateMessage;
        }
    }


}