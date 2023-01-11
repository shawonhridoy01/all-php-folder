<?php 

class Student{
    public $name,$roll,$class,$paid,$due,$totalMoney;
    public function __construct($name,$roll,$class,$paid,$totalMoney)
    {
        $this->name = $name;
        $this->roll = $roll;
        $this->class = $class;
        $this->paid = $paid;
        $this->totalMoney = $totalMoney;
    }

    public function studentData(){
        $this->totalDue = $this->totalMoney - $this->paid;
        echo "Student Name is " . $this->name . " and roll is " . $this->roll . " and class is ". $this->class . ".He paid ". $this->paid . " and his due is " .  $this->totalDue ;
    }


}

$studentOne = new Student("Shawon",10,"Ten",5000,10000);
$studentTwo = new Student("hridoy",3,"two",2000,10000);
echo $studentOne->studentData();
echo "<br>";
echo $studentTwo->studentData();



?>