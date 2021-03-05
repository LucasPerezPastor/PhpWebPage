<?php

class AssociativeArrayObject
{


    

    public function __construct(array $data=NULL)
    {  
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


    private function to_object(&$data,string $class='stdClass')
    {
        $object=new $class();
        foreach ($data as $key => $value) 
        {
            # code...
            if (is_array($value))
                    {
                    // Convert the array to an object
                            $value = $this->to_object($value,self::class);
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

    public function getToArray():array
    {
        $out=[];
        foreach ($this as $key => $value) {
            # code...
            if (is_object($value))
            {
                $out=array_merge($out,[$key=>$this->$key->getToArray()]);
            }else
            {
                $out=array_merge($out,[$key=>$value]);
            }
        }
        return $out;
    }

}