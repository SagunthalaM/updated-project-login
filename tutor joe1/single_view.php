<?php
include "db_conn.php";
$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee details</title>
    <link rel="icon" href="favicon.ico">
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="container mt-5">
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
            </tr>
        </thead>
       
        <tbody>
            
        <?php 
        include "db_conn.php";
        $sql="SELECT * FROM `crud`";
        $sql = "SELECT * FROM `crud` WHERE id =$id LIMIT 1";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);{
            ?>
        
            <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['gender']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['position']?></td>


            <?php
         }?>
            </tbody>
</table>
         


<a href="open-page.php" style="color:white;text-decoration:none;">
<div class="btn btn-dark " style="bottom:10px;right:10px;position:fixed;">
Log out
</div></a>

</div>       


</body>
</html>