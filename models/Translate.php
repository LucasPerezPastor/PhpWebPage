<?php

class Translate extends AssociativeArrayObject
{
    

    private $errorTranslateMessage='';

    /**
     * En función del lenguaje seleccionado carga el archivo de idiomas que contiene la variable $data.
     * Si no encuentra ese archivo prueba a cargar el idioma por defecto especificado. Si al final
     * tampoco encuentra el idioma por defecto lanza una excepción para que sea tratatada por la página
     *
     * @param string $language
     * @param string $defaultLanguage
     * @param string $errorMessage
     */
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