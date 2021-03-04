<?php

class Translate
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
                    foreach ($data as $definition=>$value) 
                    {
                        # code...
                        if (is_array($value))
                        {
                            $this->{$definition}=$this->to_object($value,self::class);
                        }elseif (is_string($value) || is_numeric($value))
                        {
                            $this->{$definition}=$value;
                        }
                    }
                }   
            }
        }        
    }


private function to_object(&$data,string $class='stdClass')
{
    $object=new $class('',$this->errorTranslateMessage);
    foreach ($data as $key => $value) 
    {
        # code...
        if (is_array($value))
                {
                // Convert the array to an object
                        $value = $this->to_object($value);
                }
                // Add the value to the object
                $object->{$key} = $value;
    }
    return $object;

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