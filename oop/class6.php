<?php 


class staticCal{
     public static $a = 20;
     public static $b = 10;

    public static function sum(){
        return self::$a + self::$b; 
    }

    public static function sub(){
        return self::$a - self::$b; 
    }

}

echo staticCal::sum();
echo "<br>";
echo staticCal::sub();




?>