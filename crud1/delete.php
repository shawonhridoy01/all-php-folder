<?php 

include './conn.php';

$id = $_GET['id'];


$selectQuery = "select image from blog where id= $id";
$selectQueryResult = mysqli_query($conn,$selectQuery);
$row = mysqli_fetch_assoc($selectQueryResult);

if(file_exists('uploads/'.$row['image'])){
    unlink('uploads/'.$row['image']);
}



$deleteQuery = "delete from blog where id= $id";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);


if($deleteQueryResult){
    $message =  "Your data has been deleted";
    header('location: http://localhost/crud1/index.php?msg='.$message);
}else{
    $message =  "Your data is not deleted";
    header('location: http://localhost/crud1/index.php?msg='.$message);
}



?>