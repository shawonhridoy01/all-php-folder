<?php 

// class myclass{
//     public function name(){
//         echo "Class name is ". get_class($this);
//     }
// }

// $obj = new myclass();
// echo "Class name is ". get_class($obj);
// $obj->name();




// class abc{

// }
// class xyz extends abc{
//     public function name(){
//         echo "Parent Class name is ". get_parent_class($this);
//     }
// }

// $obj = new xyz();
// echo "Parent Class name is ". get_parent_class($obj);
// $obj->name();




// class myclass{
//     function __construct()
//     {
        
//     }

//     function myfunction1()
//     {
        
//     }

//     function myfunction2()
//     {
        
//     }



// }

// $class_methods = get_class_methods("myclass");

// // print_r($class_methods);
// foreach($class_methods as $methods){
//     echo $methods."<br>";
// }




class myclass{
    public $var1='shawon';
    public $var2 = 23;
    public $var3;
    private $var4;
}

$obj = new myclass();
$class_var = get_class_vars("myclass");
print_r($class_var);