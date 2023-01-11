<?php 


include "./conn.php";
include "inc/header.php";

$titleError = null;
$imageError = null;
$uploadStatus = true;
$update = true;
if (isset($_POST['update'])) {
    $blog_id = $_POST['blog_id']; 
    $title = $_POST['title']; 
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];
    $image = "uploads/".$_POST['image'];

    if($_FILES['new_image']){
        
        $imageName = $_FILES['new_image']['name'];
        $tmpName = $_FILES['new_image']['tmp_name'];
        $size = $_FILES['new_image']['size'];
        $validExtension = ['jpg','png','jpeg'];

        $imageExtension = explode('.',$imageName,2);
        // $ext = strtolower($imageExtension[1]);
        $ext = strtolower(end($imageExtension));
        $randomImage = time().$imageName;

    


        if(empty($imageName)){
            $imageError = "Image field is required";
            $uploadStatus = false;
        }elseif(!in_array($ext,$validExtension)){
            $imageError = "jpg,png,jpeg is accepted";
            $uploadStatus = false;
        }elseif($size > (1000 * 100)){
            $imageError = "image size must be less than 100kb";
            $uploadStatus = false;
        }else{

                if(file_exists($image)){
                    unlink($image);
                    move_uploaded_file($tmpName,'uploads/'.$randomImage);
                    $uploadStatus = true;
                }else{
                    move_uploaded_file($tmpName,'uploads/'.$randomImage);
                    $uploadStatus = true;
                }
        }
        
    }


    
    // title validation check 
    if(empty($title)){
        $titleError = "Title field is required";
        $update = false;
    }elseif(strlen($title) > 255){
        $titleError = 'Title must be less than 255 char';
        $update = false;
    }elseif(strlen($title) < 10){
        $titleError = 'Title must be greater 10 char';
        $update = false;
    }else{
        $validTitle =  mysqli_real_escape_string($conn,$_POST['title']);
        $update = true;
    }

        
    // sub Title  validation check 
    if(empty($sub_title)){
        $subTitleError = "Sub Title field is required";
        $update = false;
    }elseif(strlen($sub_title) > 255){
        $subTitleError = 'Sub Title must be less than 255 char';
        $update = false;
    }elseif(strlen($title) < 10){
        $subTitleError = ' Sub Title must be greater 10 char';
        $update = false;
    }else{
        $validSubtitle =  mysqli_real_escape_string($conn,$_POST['sub_title']);
        $update = true;
    }

            
    // Description  validation check 
    if(empty($description)){
        $descriptionError = "Description field is required";
        $update = false;
    }elseif(strlen($description) > 2000){
        $descriptionError = 'Description must be less than 255 char';
        $update = false;
    }elseif(strlen($description) < 10){
        $descriptionError = ' Description must be greater 10 char';
        $update = false;
    }else{
        $validDescription =  mysqli_real_escape_string($conn,$_POST['description']);
        $update = true;
    }





    if($update == true && $uploadStatus == true){
        $updateQuery = "UPDATE blog SET title='$validTitle',sub_title ='$validSubtitle',description ='$validDescription', image ='$randomImage' WHERE id = $blog_id";
        $updateQueryResult = mysqli_query($conn,$updateQuery);
        
        if($updateQueryResult){
            $message =  "Your data has been updated";
            header('location: http://localhost/crud1/index.php?msg='.$message);
        }else{
            echo "data not updateed";
        }
    }




} 






?>