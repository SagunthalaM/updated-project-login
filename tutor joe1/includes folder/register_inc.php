<?php
if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';
    require 'db_conn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];
    if (empty($username)||empty($password)||empty($confirmPass)) {
        # code...
        header ("Location: ../register.php?error=emptyfields&username=".$username);
        exit();
    }elseif (!preg_match("/^[a-zA-Z0-9]*/",$username)){
        echo "<script>
        window.open('../register.php','_self');
        window.alert('no user in this name, register and login ');
        </script>";
       // header ("Location: ../register.php?error=emptyfields&username=".$username);
        //exit();
          
    }elseif($password !== $confirmPass){
        echo "<script>
        window.open('../register.php','_self');
        window.alert('password mismatch ,enter the confirm password');
        </script>";
        // header ("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
        //exit();
    }
    
    else{
        $sql = "SELECT username from users where username=?";
        $stmt = mysqli_stmt_init($db);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location: ../register.php?error=sqlerror");
            exit();
        }else{
           mysqli_stmt_bind_param($stmt,'s',$username);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $rowCount = mysqli_stmt_num_rows($stmt);
           if ($rowCount > 0) {
            echo "<script>
            window.open('../register.php','_self');
            window.alert('try another username');
            </script>";  
            // header ("Location: ../register.php?error=usernametaken");
               //exit();
           }else{
            $sql = "insert into users (username,password) values (?,?)";
            $stmt = mysqli_stmt_init($db);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header ("Location: ../register.php?error=sqlerror");
                exit();
            }else{        
                $hashedPass = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,'ss',$username,$hashedPass);
                mysqli_stmt_execute($stmt);
                   header ("Location: ../register.php?success=registered");
                   exit();
                }
          
     }
   }
 }
 mysqli_stmt_close($stmt);
 mysqli_close($conn);
}  

?>