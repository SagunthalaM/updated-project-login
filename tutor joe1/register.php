<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Page</title>
   <link rel="icon" href="favicon.ico">
   <!-- Bootstrap-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div style="background-image:url('banner.png');background-repeat:no-repeat;background-size:100% 100%;bottom:0;top:0;left:0;right:0;position:absolute;" >

<h1 class=" bg-primary text-center py-2  "> Register Here! </h1>
<div class="fs-5 mt-5">

    <form action="includes folder/register_inc.php" method="post"
    class="container bg-light" 
    style="min-width:100px;width:70vh;border-radius:5px;padding:3%;">
    <label for="" class="form-label">UserName</label>
    <input type="text" class="form-control" name="username" placeholder="username" required><br>
    <label for="" class="form-label">Password</label>
    <input type="password"  class="form-control"  name="password" placeholder="password" required><br>

   <label for="" class="form-label">Confirm Password</label> 
   <input type="password"  class="form-control"  name="confirmPassword" placeholder="confirm password" required><br>
    <button type="submit"  class="form-control bg-primary text-white fs-5" name="submit"> Register</button>
    <br>
      <div class="container" style="">Already have an account <a href="index-1.php">Login here</a></div>
    </form>
</div>
</div>


<a href="open-page.php" style="color:white;text-decoration:none;">
<div class="btn btn-dark " style="bottom:10px;right:10px;position:fixed;">
Logout
</div></a>
   
</body>
</html>