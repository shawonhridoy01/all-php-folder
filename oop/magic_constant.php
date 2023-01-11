<?php 


// __LINE__
// __FILE__
// __DIR__
// __FUNCTION__
// __CLASS__
// __METHOD__
// __TRAIT__
// __NAMESPACE__


// echo "Line Number : " . __LINE__ ;
// echo "<br>";
// echo "Line Number : " . __LINE__;
// echo "Full path of this file  : " . __FILE__;
// echo "Full path of this Directory  : " . __DIR__;

// function myfuntion(){
//     echo "the funtion name is ". __FUNCTION__;
// }

// myfuntion();

// class myClass{
//     public function getClassName(){
//         return "the class name is ". __CLASS__;
//     }
// }
// $obj = new myClass();
// echo $obj->getClassName();

// class myClass{
//     public function getClassName(){
//         return "the method name is ". __METHOD__;
//     }
// }
// $obj = new myClass();
// echo $obj->getClassName();

namespace namespacename;
class myClass{
    public function getNamespaceName(){
        return "the method name is ". __NAMESPACE__;
    }
}
$obj = new myClass();
echo $obj->getNamespaceName();




