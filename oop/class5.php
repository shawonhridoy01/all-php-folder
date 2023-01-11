<?php 


interface A{
    function sum($a,$b);
    function sub($a,$b);
}

interface B{
    function mul($a,$b);
    function div($a,$b);
}

class Calculation implements A,B{
    public function sum($c,$d){
        return $c + $d;
    }

    public function sub($c,$d){
        return $c - $d;
    }
    public function mul($c,$d){
        return $c * $d;
    }
    public function div($c,$d){
        return $c / $d;
    }

    


}

$obj = new Calculation();

echo $obj->sum(20,10);
echo "<br>";
echo $obj->sub(20,10);
echo "<br>";
echo $obj->mul(20,10);
echo "<br>";
echo $obj->div(20,10);
echo "<br>";



?>