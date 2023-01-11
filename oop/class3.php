<?php 

class Employee{
    public $name,$age,$salary;

    function __construct($n,$a,$s)
    {
        $this->name = $n;
        $this->age = $a;
        $this->salary = $s;
    }

    public function info(){
        return "Employee Name is " . $this->name . ". Employee Age is " . $this->age . ". Employee Salary is " . $this->salary;
    }
}


class Manager extends Employee{
    public function info(){
        $this->totalSalary = $this->salary + 3000;
        return  "Manager Name is " . $this->name . ". Manager Age is " . $this->age . ". Manager Salary is " . $this->totalSalary;
    }
}

// $employee = new Employee('Shawon',23,12000);
$manager = new Manager('Shawon',23,12000);
$employee = new Employee('Shawon',23,12000);

echo $employee->info();
echo $manager->info();

?>