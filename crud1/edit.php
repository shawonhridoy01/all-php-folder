<?php
session_start();
include "./conn.php";
include "inc/header.php";

$id = $_GET['id'];
$selectQuery = "select * from blog where id=$id";
$selectQueryResult = mysqli_query($conn,$selectQuery);


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Edit Blog</h3>
                    <a href="./index.php" class="btn btn-dark float-right">Back</a>
                </div>


                <div class="card-body">
                    <form action="./update.php" method="POST" enctype="multipart/form-data">

                    <?php 
                                
                    if($selectQueryResult){
                        while($row = mysqli_fetch_assoc($selectQueryResult)){
                    
                    ?>
                            <input type="text" name="blog_id" id="blog_id" class="form-control" placeholder="Enter Your Id " aria-describedby="helpId" value="<?php echo $row['id'] ?>">
                    


                        <div class="form-group">
                            <label for="title">Enter Your Title </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Your Title " aria-describedby="helpId" value="<?php echo $row['title'] ?>">
                    
                        </div>

                        <div class="form-group">
                            <label for="sub_title">Enter Your Title </label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Enter Your Sub Title " aria-describedby="helpId" value="<?php echo $row['sub_title'] ?>">
                        </div>


                        <div class="form-group">
                            <label for="title">Enter Your Description </label>
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control"><?php echo $row['description'] ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="title">Enter Your Image </label>
                            <input type="hidden" name="image" id="image" class="form-control mb-2" placeholder="Enter Your Image" aria-describedby="helpId" value="<?php echo $row['image'] ?>">
                            <!-- new value  -->
                            <input type="file" name="new_image" id="new_image" class="form-control mb-2" placeholder="Enter Your Image" aria-describedby="helpId">

                            <img src="./uploads/<?php echo $row['image'] ?>" width="100%" alt="image">
                        </div>

                    


                            <?php     }} ?>
                        <input type="submit" name="update" value="Update Blog" class="btn btn-success">
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