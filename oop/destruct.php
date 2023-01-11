<?php 

class abc{
    public $age = 23;
    public function __construct($name)
    {
        echo "this is mohammad ". $name;
    }

    public function mymethod(){
        echo "hello everyone";
    }

    public function __destruct()
    {
        echo "this is destructor function".$this->age;
    }
}

$obj = new abc("shawon","23");

$obj->mymethod();