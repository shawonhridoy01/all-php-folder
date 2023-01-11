<?php 


class student{
    private $name;
    private $age;

    private function setValue($name,$age){
        $this->name = $name;
        $this->age = $age;
    }

    function __call($method, $arguments)
    {   
        if(method_exists($this,$method)){
            call_user_func_array([$this,$method],$arguments);
        }else{
            echo "method doesn't exists";
        }
        
    }
}

// $obj = new student();
$obj->setValue('shawon',34)

?>