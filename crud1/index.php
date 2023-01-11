<?php  


// require "../inc/header.php";
include "./conn.php";
include "inc/header.php";

$selectQuery = 'select * from blog';
$selectQueryResult = mysqli_query($conn,$selectQuery);






?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
        
            <?php 
            if(isset($_GET['msg'])){
                    echo '<div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Well Done! </strong>'. $_GET['msg'].'
            </div>';
            
            }else{
                $_GET['msg'] = '';
            }
            
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3>All Blogs </h3>
                        <a href="./add-blog.php" class="btn btn-dark float-right">Add Blog</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive" id="myTable">
                            <thead class="thead-inverse">
                                <tr>
                                    <th  width='10%'>Id</th>
                                    <th width='15%'>Title</th>
                                    <th width='15%'>Sub Title</th>
                                    <th width='20%'> Description</th>
                                    <th width='15%'> Image</th>
                                    <th width='25%'> Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php 

                            if(mysqli_num_rows($selectQueryResult) > 0){
                                $i = 0;
                                while($row = mysqli_fetch_assoc($selectQueryResult)){
                                    
                                    
                                ?>
                            
                                    <tr>
                                        <td scope="row"><?php echo ++$i ?></td>


                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo substr($row['sub_title'],0,100) ?>
                                        <a href="./view.php?id=<?php echo $row['id'] ?>">Read More </a>
                                        </td>
                                        <td><?php echo substr($row['description'],0,150) ?>
                                        <a href="./view.php?id=<?php echo $row['id'] ?>">Read More </a>
                                        </td>
                                        


                                        

                                        
                                    
                                        <td>
                                            <img src="uploads/<?php 
                                            echo $row['image']
                                            ?>"alt="image" width="100px" height="150px" >
                                        </td>
                                        <td>
                                            <a href="./view.php?id=<?php echo $row['id'] ?>" class="btn btn-success">View</a>

                                            <a href="./edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                            <a href="./delete.php?id=<?php echo $row['id'] ?>"class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    <?php   
                                     }

                                        }
                                     ?>
                            
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      

    <?php  

include "inc/footer.php";


?>
