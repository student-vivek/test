<?php
 include('includes/connect.php');
 include('function/common_function.php');
 session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Website-Cart details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<style type="text/css">
  .cart_image{
    width: 100px;
    height: 100px;
    object-fit: contain;
  }
 
</style>
  </head>
  <body>
    <!---------------------First Child----------------->
    <div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./img/cart.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping fa-bounce fa-xl"></i><sup><?php
       cart_item();
        ?></sup></a>
        </li>
       
      
      </ul>
      
    </div>
  </div>
</nav>
</div>


<!---- cart function--------------->
<?php
cart();
?>
<!-------------------------Second child ----------------------------------->
<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <?php
            if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
             <a class='nav-link' href='#'>Welcome Guest</a>
           </li>";
             }else{
              echo"<li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
            }
             if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
         <a class='nav-link' href='./user_login.php'>Login</a>
       </li>";
         }else{
          echo" <li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<!-------------------------------third child----------------------------------->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is the heart of e-commerce and community</p>
  </div>

<!---------------------------------fourth child----------------------->
<div class="container">
  <div class="row">
    <form action="" method="post">
    <table class="table table-bordered text-center"><thead>
      
      <?php
       global $conn;
    $get_ip_add=getIPAddress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($conn,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
      echo "<tr>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>

      </tr>
    </thead>
    <tbody>";
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="select *from `products` where product_id='$product_id'";
      $result_products=mysqli_query($conn,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image_1=$row_product_price['product_image_1'];
        $product_values=array_sum($product_price);
      $total_price+=$product_values;
      
      ?>

      <tr>
        <td><?php echo $product_title ;?></td>
        <td><img src="./admin-area/product_images/<?php echo $product_image_1; ?>" alt="" class="cart_image"></td>
        <td><input type="text" class="form-input w-50" name="qty"></td>
        <?php
    $get_ip_add=getIPAddress();
   if(isset($_POST['update_cart']))
   {
    $quantities=$_POST['qty'];
    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
      $result_products_qty=mysqli_query($conn,$update_cart);
      $total_price=$total_price*$quantities;

   }
        ?>
        <td><?php echo $price_table ?>/-</td>
        <td><input  type="checkbox" name="removeitem[]" value="<?php echo $product_id;?>"></td>
        <td>
          <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Update</button> -->
        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0" name="update_cart">
        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 mx-3 border-0" name="remove_cart">
        
        

      </td>
        

      </tr>

      <?php
      }
      }
    }
    else{
            echo"<h2 class='text-center text-danger'>Cart is Empty.</h2>";
}
      ?>
    

    </tbody>
  </table>
  <!------------------subtotal------------------>
  <div class="d-flex mb-5">
     <?php
       global $conn;
    $get_ip_add=getIPAddress();
    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($conn,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
     echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
      <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>
    <button class='bg-secondary px-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
}
else{
  echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>";
}
if(isset($_POST['continue_shopping'])){
   echo"<script>window.open('index.php','_self')</script>";
}
?>
  </div>
  </div>
</div>
</form>

<!-------------------------remove function------------------------>
<?php
   function remove_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id) 
  {
    echo $remove_id;
    $delete_query="Delete from `cart_details` where product_id=$remove_id";
    $run_delete=mysqli_query($conn,$delete_query);
    if($run_delete){
      echo"<script>alert('Item successfully remove From the list of cart.')</script>";
      echo"<script>window.open('cart.php','_self')</script>";
    }
  }  
}
   }
   echo $remove_item=remove_cart_item();
?>

<!-------------------last Child----------------------->
<?php include('./includes/footer.php');
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>