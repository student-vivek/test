<?php include('../includes/connect.php'); 
   include('../function/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
<div class="container-fliud my-3">
	<h2 class="text-center">New User Registration</h2>
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-lg-12 col-xl-6">
			<form action="" method="POST" enctype="multipart/form-data">
				<!--------------user name field---------->
				<div class="form-outline mb-3">
					<label for="user_username" class="form-label">Username</label>
					<input type="text" name="user_username" id="user_username" placeholder="Enter your name" autocomplete="off" class="form-control" required>
				</div>
				<!--------------email field---------->

				<div class="form-outline mb-3">
					<label for="user_email" class="form-label">Email</label>
					<input type="email" name="user_email" id="user_email" placeholder="Enter your email" autocomplete="off" class="form-control" required>
				</div>
				<!--------------file field---------->

				<div class="form-outline mb-3">
					<label for="user_image" class="form-label">User Image</label>
					<input type="file" name="user_image" id="user_image" autocomplete="off" class="form-control" required>
				</div>

				<!--------------password field---------->

				<div class="form-outline mb-3">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" name="user_password" id="user_password" autocomplete="off" class="form-control" placeholder="Enter your password" required>
				</div>

				<!--------------confirm password field---------->

				<div class="form-outline mb-3">
					<label for="conf_user_password" class="form-label">Confirm Password</label>
					<input type="password" name="conf_user_password" id="conf_user_password" autocomplete="off" class="form-control"  placeholder="Confirm password" required>
				</div>

				<!--------------Address field---------->

				<div class="form-outline mb-3">
					<label for="user_address" class="form-label">Address</label>
					<input type="text" name="user_address" id="user_address" autocomplete="off" class="form-control"  placeholder="Enter your address" required>
				</div>

				<!--------------contact field---------->

				<div class="form-outline mb-3">
					<label for="user_contact" class="form-label">Contact</label>
					<input type="text" name="user_contact" id="user_contact" autocomplete="off" class="form-control"  placeholder="Enter your mobile number" required>
				</div>
				<div class="mt-2 pt-2"><input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
					<p class="small fw-bold">Already have an Account ? <a class="text-danger" href="user_login.php">Login</a></p></div>
			</form>
		</div>
	</div>
</div>
</body>
</html>

<!-- php code -->
<?php  
 if(isset($_POST['user_register']))
 {
   $user_username=$_POST['user_username'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
   $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
   $conf_user_password=$_POST['conf_user_password'];
   $user_address=$_POST['user_address'];
   $user_contact=$_POST['user_contact'];
   $user_image=$_FILES['user_image']['name'];
   $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    
	//Select Query
	$select_query="select * from `user_table` where user_name='$user_username'or user_email='$user_email'";
	$result=mysqli_query($conn,$select_query);
	$row_count=mysqli_num_rows($result);
	if($row_count>0){
		echo "<script>alert('Username and Email is already exist')</script>";

	}elseif($user_password!=$conf_user_password){
		 echo"<script>alert('Password do not matched.')</script>";
	}
	else{
	// insert query 
	move_uploaded_file($user_image_tmp,"./user_images/$user_image");
   $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
   values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($conn,$insert_query);

		// echo "<script>alert('Data inserted Succuessfully')</script>";
	} 

	//Selecting cart items
	$select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
	$result_cart=mysqli_query($conn,$select_cart_items);
	$row_count=mysqli_num_rows($result_cart);
	if($row_count>0){
		$_SESSION['username']=$user_username;
		 echo"<script>alert('You have items in your cart.')</script>";
		 echo"<script>window.open('checkout.php','_self')</script>";

	}
	else{
		echo"<script>window.open('../index.php','_self')</script>";

	}
}
 ?>