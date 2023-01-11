<?php


class student{
    public $name;
    public $course;

    public function __construct($n,$c)
    {
        $this->name = $n;
        $this->course = $c;
    }
}

$obj1 = new student("shakil","PHP");
$obj2 = clone $obj1;

echo $obj1->name = "shawon";
echo $obj2->name;
// echo "</br>";
// echo $obj1->course;