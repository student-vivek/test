<?php
  include('../includes/connect.php');
  if(isset($_POST['insert_product']))
{
	$product_title=$_POST['product_title'];
	$description=$_POST['description'];
	$product_keywords=$_POST['product_keywords'];
	$product_category=$_POST['product_categories'];
	$product_brands=$_POST['product_brands'];
	$product_price=$_POST['product_price'];
	$product_status='true';
	
	//-------images-----------------
	$product_image1=$_FILES['product_image1']['name'];
	$product_image2=$_FILES['product_image2']['name'];
	$product_image3=$_FILES['product_image3']['name'];
    
    //accessing image tmp name...
    $temp_image1=$_FILES['product_image1']['tmp_name'];
	$temp_image2=$_FILES['product_image2']['tmp_name'];
	$temp_image3=$_FILES['product_image3']['tmp_name'];
    
    //checking empty condition...
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category==''
or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2==''
or $product_image3==''){
    	echo"<script>alert('please fill all the available fields')</script>";
    exit();
    }
    else{
    	move_uploaded_file($temp_image1,"./product_images/$product_image1");
    	move_uploaded_file($temp_image2,"./product_images/$product_image2");
    	move_uploaded_file($temp_image3,"./product_images/$product_image3");
                 //insert query..
    	$insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image_1,product_image_2,product_image_3,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    	$result_query=mysqli_query($conn,$insert_products);
    	if($result_query){
    		echo"<script>alert('Successfully inserted the products.')</script>";
    	}
    
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light"><div class="container mt-3"><h1 class="text-center">Insert Products</h1>
<!-----------------------------form-------------------------->
	<form action="" method="post" enctype="multipart/form-data">
		<!--------------------title--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_title" class="form_label">Product Title</label>
			<input type="text"  id="product_title" class="form-control" name="product_title" placeholder="Enter product title" autocomplete="off" required>
		</div>
		<!--------------------Description--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="description" class="form_label">Product Description</label>
			<input type="text"  id="description" class="form-control" name="description" placeholder="Enter product description" autocomplete="off" required>
		</div>
	
	<!--------------------keywords--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_keywords" class="form_label">Product Keywords</label>
			<input type="text"  id="product_keywords" class="form-control" name="product_keywords" placeholder="Enter product keywords" autocomplete="off" required>
		</div>
	
	<!--------------------Categories--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
	     <select name="product_categories" id="product_categories" class="form-select">
	     	<option value="">Select a Categories</option>
	     	<?php
             $select_query="select * from `categories`";
             $result_query=mysqli_query($conn,$select_query);
             while($row=mysqli_fetch_assoc($result_query))
             {
             	$category_title=$row['category_title'];
             	$category_id=$row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
             }
	     	?>

	     </select>
</div>
	<!--------------------brands--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
	     <select name="product_brands" id="product_brands" class="form-select">
	     	<option value="">Select a brands</option>
	     	     	<?php
             $select_query="select * from `brands`";
             $result_query=mysqli_query($conn,$select_query);
             while($row=mysqli_fetch_assoc($result_query))
             {
             	$brands_title=$row['brands_title'];
             	$brands_id=$row['brands_id'];
                echo "<option value='$brands_id'>$brands_title</option>";
             }
	     	?>

	     </select>
	</div>
	<!--------------------IMAGE--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_image1" class="form_label">Product Image 1</label>
			<input type="file"  id="product_image1" class="form-control" name="product_image1" required>
		</div>
		

	<!--------------------IMAGE--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_image2" class="form_label">Product Image 2</label>
			<input type="file"  id="product_image2" class="form-control" name="product_image2" required>
		</div>

	<!--------------------IMAGE--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_image3" class="form_label">Product Image 3</label>
			<input type="file"  id="product_image3" class="form-control" name="product_image3" required>
		</div>
	<!--------------------price--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<label for="product_price" class="form_label">Product Price</label>
			<input type="text"  id="product_price" class="form-control" name="product_price" placeholder="Enter product price" autocomplete="off" required>
		</div>
		<!--------------------keywords--------------------->
		<div class="form-outline mb-4 w-50 m-auto">
			<input type="submit" name="insert_product" class="btn btn-info" value="Insert product">
		</div>
	
	
	
	</form>
</div>
</body>
</html>