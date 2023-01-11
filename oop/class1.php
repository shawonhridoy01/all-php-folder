<?php 


class Calculation{
    // public $a = 23;
    // public $b = 10;
    public $a,$b,$c;


    public function sum(){
        $this->c = $this->a + $this->b;
        return $this->c;
    }

    public function sub(){
        $this->c = $this->a - $this->b;
        return $this->c;
    }

}

$cal = new Calculation();
$cal->a = 23;
$cal->b = 10;
echo "Sum of this two number is " . $cal->sum();
echo "<br>";
echo "Sub of this two number is " . $cal->sub();
    


?>