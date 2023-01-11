<?php 

// for connection 

$conn = mysqli_connect("localhost","root","","dbname");
$conn = new mysqli("localhost","root","","dbname");



// run sql query 
mysqli_query($conn,$query);
$conn->query($query);

// run sql query 
mysqli_close($conn);
$conn->close();

// mysqli fetch functions 

mysqli_fetch_assoc($result);
mysqli_fetch_all($result);
mysqli_fetch_array($result);
mysqli_fetch_row($result);
mysqli_fetch_field($result);

$result->fetch_assoc;
$result->fetch_all;
$result->fetch_array;
$result->fetch_row;
$result->fetch_field;


// mysqli afftected rows 
mysqli_affected_rows($query);
// $conn->query();
// $conn->affected_rows();

// mysqli error functions 

mysqli_connect_error($conn);
mysqli_connect_errno($conn);
mysqli_error($conn);
mysqli_error_list($conn);

// $conn->connect_error();
// $conn->connect_errno();
// $conn->error();
// $conn->error_list();



?>