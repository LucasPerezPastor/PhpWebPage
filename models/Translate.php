<?php

class Translate
{

    public function __construct(string $language='')
    {
        require_once 'lang/'.$language.'.php';
        if (isset($data))
        {
            if (is_array($data))
            {
                foreach ($data as $definition=>$value) 
                {
                    # code...
                    if (is_array($value))
                    {
                        $this->{$definition}=$this->to_object($value);
                    }elseif (is_string($value) || is_numeric($value))
                    {
                        $this->{$definition}=$value;
                    }
                }
            }   
        }
             
    }


private function to_object(&$data)
{
    $object=new stdClass;
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
        return '';
    }
}


}