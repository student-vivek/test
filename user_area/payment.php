<?php include('../includes/connect.php'); 
   include('../function/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Page</title>
	<!-- Bootstrap link----------------------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
	img{
		width:100%;
	}
</style>
<body>
	<!-- php code to access user id--->
	<?php
     $user_id=getIPAddress();
	 $get_user="select * from `user_table` where user_ip=$user_id";
	?>
      <div class="container">
		<h2 class="text-center text-info">Payment Options</h2>
		<div class="row d-flex justify-content-center align-items-center my-5">
		<div class="col-md-6">
			<a href="https://www.paypal.com" target="_blank"><img src="../img/upi.jpg" alt=""></a>
		</div>
		<div class="col-md-6">
			<a href="order.php"><h2 class="text-center">Payment Offline</h2></a>
		</div>

	  </div>  
	</div>

      
</body>
</html>