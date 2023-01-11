<?php 

class abc{
    public function __toString()
    {
        return "Can't Print a object as a string. Class ". get_class($this);
    }
}

// $obj = new abc();

echo $obj;