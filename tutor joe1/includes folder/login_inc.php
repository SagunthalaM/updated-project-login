<?php
$servername="localhost";
$username="root";
$password="";
$dbname="udemy";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['submit'])){
    require 'database.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)||empty($password)){
        
        header("Location:../index-1.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * from users where username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../index-1.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
               $passCheck = password_verify($password,$row['password']);
               if($passCheck == false){
                    echo
                   "<script>
                    window.open('../index-1.php','_self');
                    window.alert('Invalid username or password');
                   </script>";
                   /*
                   "<div style='border:1px solid red;text-align:center;width:92vh;min-width:150px;margin:15px;' class='btn btn-danger fs-5'>
                      <a href='../index-1.php'>
                       Invalid Username or Password</a>
                    </div>";
                    
                */
                   //header("Location:../index-1.php?error=wrongpassword");
                   //exit();
               }elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                    echo "<script>
                    window.open('../index.php','_self');
                    window.close('../index.php','_self');
                   </script>";
                    exit();
               }else{
                   header("Location:../index-1.php?error=sqlerror");
                   exit();
               }
            }else{
                //header("Location: ../index-1.php?error=nouser");
                echo "<script>
                window.open('../index-1.php','_self');
                window.alert('no user in this name, register and login ');
                </script>";
            }
        }
    }
}else{
    header("Location://index-1.php?error=accessforbidden");
    exit();
}


?>