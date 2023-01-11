<?php


include "./conn.php";
include "inc/header.php";

$titleError = null;
$imageError = null;
$uploadStatus = true;
$insert = true;
if (isset($_POST['add_data'])) {
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];

    if($_FILES['image']){
        
        $imageName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $validExtension = ['jpg','png','jpeg'];
        // $fileInfo = @getimagesize($tmpName);
        // $width = $fileInfo[0];
        // $height = $fileInfo[1];
        
        // print_r($fileInfo);
        $imageExtension = explode('.',$imageName,2);
        $ext = strtolower($imageExtension[1]);
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
        }

        // elseif($width > 300){
        //     $imageError = "Image width must be greater than 300px";
        // }elseif($height > 300){
            //     $imageError = "Image  height must be greater than 300px";   
            // }
            else{
                move_uploaded_file($tmpName,'uploads/'.$randomImage);
                $uploadStatus = true;
        }
        
    }


    
    // title validation check 
    // if(empty($title)){
    //     $titleError = "Title field is required";
    //     $insert = false;
    // }elseif(strlen($title) > 255){
    //     $titleError = 'Title must be less than 255 char';
    //     $insert = false;
    // }elseif(strlen($title) < 10){
    //     $titleError = 'Title must be greater 10 char';
    //     $insert = false;
    // }else{
    //     $validTitle =  mysqli_real_escape_string($conn,$_POST['title']);
    //     $insert = true;
    // }

        
    // sub Title  validation check 
    // if(empty($sub_title)){
    //     $subTitleError = "Sub Title field is required";
    //     $insert = false;
    // }elseif(strlen($sub_title) > 255){
    //     $subTitleError = 'Sub Title must be less than 255 char';
    //     $insert = false;
    // }elseif(strlen($title) < 10){
    //     $subTitleError = ' Sub Title must be greater 10 char';
    //     $insert = false;
    // }else{
    //     $validSubtitle =  mysqli_real_escape_string($conn,$_POST['sub_title']);
    //     $insert = true;
    // }

            
    // Description  validation check 
    // if(empty($description)){
    //     $descriptionError = "Description field is required";
    //     $insert = false;
    // }elseif(strlen($description) > 2000){
    //     $descriptionError = 'Description must be less than 255 char';
    //     $insert = false;
    // }elseif(strlen($description) < 10){
    //     $descriptionError = ' Description must be greater 10 char';
    //     $insert = false;
    // }else{
    //     $validDescription =  mysqli_real_escape_string($conn,$_POST['description']);
    //     $insert = true;
    // }





    if($insert == true && $uploadStatus == true){
        $insertQuery = "insert into blog (title,sub_title,description,image) values ('$title','$sub_title','$description','$randomImage')";
        $insertQueryResult = mysqli_query($conn,$insertQuery);
        
        if($insertQueryResult){
            $message =  "Your data has been inserted";
            header('location: http://localhost/crud1/index.php?msg='.$message);
        }else{
            echo "data not inserted";
        }
    }




} 


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Add Blog</h3>
                    <a href="./index.php" class="btn btn-dark float-right">Back</a>
                </div>


                <div class="card-body">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Enter Your Title </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Your Title " aria-describedby="helpId" value="<?php echo isset($_POST['title']) ? $title : '' ?>">
                            <small><strong class="text-danger"><?php echo $titleError ?></strong></small>
                        </div>

                        <div class="form-group">
                            <label for="sub_title">Enter Your Title </label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Enter Your Sub Title " aria-describedby="helpId" value="<?php echo isset($_POST['sub_title']) ? $sub_title : '' ?>">
                        </div>


                        <div class="form-group">
                            <label for="title">Enter Your Description </label>
                            <textarea name="description" id="summernote" cols="5" rows="5" class="form-control">
                            <?php echo isset($_POST['description']) ? $description : '' ?> 
                            </textarea>
                        </div>


                        <div class="form-group">
                            <label for="title">Enter Your Image </label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="Enter Your Image" aria-describedby="helpId">
                            <small><strong class="text-danger"><?php echo $imageError ?></strong></small>
                        </div>


                        <input type="submit" name="add_data" value="Save Blog" class="btn btn-success">
                        <!-- <button type="submit" class="btn btn-success" name="add_data" id="">Save Blog</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php

include "inc/footer.php";


?>