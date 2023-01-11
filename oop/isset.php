<?php 

// class abc{
//     public $name = "shawon";
//     private $age = 23;

//     function __isset($name)
//     {
//         echo isset($this->$name);
//     }

// }
// $obj = new abc();
// // echo isset($obj->name);
// echo isset($obj->age);

class abc{
    private $details = ['name' => "shawon","age" => 23];

    function __isset($key)
    {   
        
        echo isset($this->details[$key]);
    }

}
// $obj = new abc();

echo isset($obj->age);
