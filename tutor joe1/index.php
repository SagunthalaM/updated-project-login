
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573">
  Employee's Details
</nav>    
<div class="container">
<!--  Alert message -->
   <?php 
    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
   ?>
    <a href="add_new.php" class="btn btn-dark mb-3">
        Add New
    </a>
    <table class="table table-hover text-center" >
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Position</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
        <?php 
        include "db_conn.php";
         $sql="SELECT * FROM `crud`";
         $result=mysqli_query($conn,$sql);
         while($row = mysqli_fetch_assoc($result)){

         
        ?>
            <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['gender']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['position']?></td>


            <td>
                
                <a href="single_view.php?id=<?php echo $row["id"]?>" class="link-dark me-3"
                style="text-decoration:none;" >
                <i class="fa-solid fa-eye fs-5"></i>
                </a>
                <a href="edit.php?id=<?php echo $row["id"]?>" class="link-dark">
                <i class="fa-solid fa-pen-to-square fs-5 me-3" >
                    <!-- here fs stands for font-size and me stands for margin-end and &nbsp 
                    stands for non-breakable space -->
                </i></a>
                <a href="delete.php?id=<?php echo $row["id"]?>" class="link-dark">
                <i class="fa-solid fa-trash fs-5">
                </i></a>
              
            </td>
            </tr>
         <?php 
         }
         ?>
        </tbody>
        </table>
</div>

      
    <a href="open-page.php" style="color:white;text-decoration:none;">
    <div class="btn btn-dark " style="bottom:10px;right:10px;position:fixed;">
    Log out
    </div></a>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>