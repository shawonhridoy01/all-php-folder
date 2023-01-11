<?php 

class student{
    private $name;

    public function __get($name)
    {
        echo "this is a none existing or private property . $name";
    }
    public function __set($name, $value)
    {
        if(property_exists($this,$name)){
            $this->$name = $value;
        }else{
            echo "property does not exists";
        }
    }
}

// $obj = new student();
echo $obj->name = "shakil";
// echo $obj->name;