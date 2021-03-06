<?php

class AssociativeArrayObject
{
// Clase que a partir de un array asociativo genera las propiedades en fución del 
// par clave=>valor siendo clave la propiedad y valor su valor.
// Es de caracter recursivo por lo que si una clave tiene un array como valor,
// esta propiedad tendra una clase AssociativeObject como valor

    

    public function __construct(array $data=NULL)
    {  
        if (isset($data))
        {
            if (is_array($data))
            {
                foreach ($data as $definition=>$value) 
                {
                    # code...
                    if (is_array($value))// Si value es un array entonces debemos crear un objeto de la clase AssociativeObject que contenga los valores
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

    /**
     * Crea un objeto de la clase especificada en el caso 
     * de no especificar sería stdClass y le añade las claves=>valor del array como
     * propiedades, en el caso que el valor de la clave sea un array se vuelve a llamar de
     * forma recursiva para crear un objeto como valor de esa propiedad
     *
     * @param [type] $data
     * @param string $class
     * @return void
     */
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

    /**
     * Cualquier get pasa por este método y si existe devuelve su valor, en caso contrario devuelve ''
     *
     * @param [type] $property
     * @return void
     */
    public function __get($property) 
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }else
        {
            return '';
        }
    }

    /**
     * Devuelve un array con la estrutura de las propiedades=>valor pasando a ser Clave=>valor.
     * Si el valor de una propiedad es un objeto vuelve a invocar el método para convertirlo en 
     * un array.
     */
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