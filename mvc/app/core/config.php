<?php 


if($_SERVER['SERVER_NAME'] == "localhost"){
    // database config 
    define("DBNAME","my_db");
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPASSWORD","");
    define("DBDRIVER","");
    define("ROOT","http://localhost/mvc/public/");
}else{

        // database config 
        define("DBNAME","my_db");
        define("DBHOST","localhost");
        define("DBUSER","root");
        define("DBPASSWORD","");
        define("DBDRIVER","");
        
    define("ROOT","https://www.shawonhridoy.com");
}
