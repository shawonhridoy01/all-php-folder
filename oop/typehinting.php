<?php 


// function sum(int $v){
//     echo $v+12;
// }
// // sum(10);
// sum("sum");



function fruits(array $fruits){
    if($fruits == array()){
        echo "please inter a array";
    }else{
        print_r($fruits);
    }
}

// fruits("shawon");