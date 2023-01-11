<?php 

include "./conn.php";
include "inc/header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}

$viewQuery = "select * from blog where id = $id";
$viewQueryResult = mysqli_query($conn,$viewQuery);


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3>View Blog</h3>
                    <a href="./index.php" class="float-right btn btn-dark">Back </a>
                </div>
                <?php 
                
                if($viewQueryResult){
                    while($row = mysqli_fetch_assoc($viewQueryResult)){
                

                ?>
                <div class="card-body">
                    <h3><?php echo $row['title'] ?></h3>
                    <img src="./uploads/<?php echo $row['image'] ?>" class="w-100" alt="">
                    <h5><?php echo $row['sub_title'] ?></h5>
                    <p><?php echo $row['description'] ?></p>
                </div>
                <?php 
                            
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<?php 


include "inc/footer.php";

?>
