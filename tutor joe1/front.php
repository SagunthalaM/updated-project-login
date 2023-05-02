<?php
include "database.php";
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
          <!-- Bootstrap-->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 

</head>
<body class="back bg-light" >
    <div class=" justify-content-center" style="background-image:url('banner.png');
    background-repeat:no-repeat;background-size:100% 100%;bottom:0;top:0;left:0;right:0;position:absolute;">
        <h1 class=" text-center mb-5 py-2 bg-dark " style="color:white;background-color:green;">
            Admin Login
        </h1>
        <div class="container  justify-content-center fs-5" style="width:100vh;min-width:150px;;">
    <?php
        if(isset($_POST["login"])){
           $sql = "SELECT * from admin where Aname = '{$_POST["aname"]}' and Apass = '{$_POST["apass"]}' ";
            $res =mysqli_query($db,$sql);
            if($res->num_rows>0){
                $ro = $res->fetch_assoc();
                $_SESSION["Aid"]= $ro["Aid"];
                $_SESSION["Aname"]= $ro["Aname"];
                echo "<script>
                   window.open('index.php','_self');
                </script>";
            }
                else{
                    echo 
                    
                    "<div style='border:1px solid red;text-align:center;width:92vh;min-width:150px;margin-left:100px;
                    margin-bottom:10px;
                    width:400px;' class='btn btn-danger fs-5'>
                    Invalid Username or Password</div>";
                }
            
        }
         ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" style="margin-left:100px;width:400px;
            background-color:#FFF4A3;padding:8%;border-radius:2%;" method="post" class="bg-light">
           
          <br>
            <label for="" class="form-label">User Name</label>
            <input type="text" class="form-control " name ="aname" required   class="input"><br>
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="apass" required class="input"><br>
            <button type="submit" class="btn btn-primary mt-2 fs-5 " style="width:100%" name="login">Login </button>

            </form>
        </div>
        

    </div>
    </div>

<a href="open-page.php" style="color:white;text-decoration:none;">


<div class="btn btn-dark " style="bottom:10px;right:10px;position:fixed;">
Logout
</div></a>
</body>
</html>