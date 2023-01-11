<?php 

require_once "./route.php";
class PersonalInformation{
    public static $name;
    public static $age;
    public static $class;

    function __construct($n,$a,$c)
    {
        self::$name = $n;
        self::$age = $a;
        self::$class = $c;
    }

    public static function  show()
    {
        $routes = new Router("hello");
        $routes->show();
    }
}
$personal = new PersonalInformation("shawon",'29',"10");
echo $personal::show();
// echo $personal::$age;