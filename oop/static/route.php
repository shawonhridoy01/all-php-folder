<?php 

class Router{


    public $routes;

    function __construct($r)
    {
        $this->routes = $r;
    }

    public function show(){
        echo $this->routes . " this is mohammad shawon  Hriody"  ;
    }
}


