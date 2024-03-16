<?php include('../includes/connect.php'); 
   include('../function/common_function.php');
   @session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      body{
        overflow-x:hidden;
      }
    </style>
</head>
<body>
<div class="container-fliud my-3">
  <h2 class="text-center">User Login</h2>
  <div class="row d-flex align-items-center justify-content-center mt-5">
    <div class="col-lg-12 col-xl-6">
      <form action="" method="POST" enctype="multipart/form-data">
        <!--------------user name field---------->
        <div class="form-outline mb-3">
          <label for="user_username" class="form-label">Username</label>
          <input type="text" name="user_username" id="user_username" placeholder="Enter your name" autocomplete="off" class="form-control" required>
        </div>

        <!--------------password field---------->

        <div class="form-outline mb-3">
          <label for="user_password" class="form-label">Password</label>
          <input type="password" name="user_password" id="user_password" autocomplete="off" class="form-control" placeholder="Enter your password" required>
        </div>

        <div class="mt-2 pt-2"><input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
          <p class="small fw-bold">Don't have an Account ? <a class="text-danger" href="user_registration.php">Register</a></p></div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php
 if(isset($_POST['user_login']))
 {
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
   
    $select_query="select * from `user_table` where user_name='$user_username'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart items
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
     $select_cart=mysqli_query($conn,$select_query_cart);
     $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
      $_SESSION['username']=$user_username;
         if(password_verify($user_password,$row_data['user_password'])){
          // echo"<script>alert('Login Successful')</script>";
      if($row_count==1 and $row_count_cart==0)
      {
         echo"<script>alert('Login Successful')</script>";
         echo"<script>window.open('profile.php','_self')</script>";
      }else{
        echo"<script>alert('Login Successful')</script>";
        echo"<script>window.open('payment.php','_self')</script>";
      }
         }
         else{
       echo"<script>alert('Invalid Credentials')</script>";
   }
    }else{
       echo"<script>alert('Invalid Credentials')</script>";
    }
 }
?>