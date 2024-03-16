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
    <title>E-Commerce Website with php and mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--------------------font Awesome link-------------->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
       body{
    overflow-x:hidden;
  }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
      
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit" class="btn btn-outline-light" value="submit" name="search_data_product">
      </form>
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
         <a class='nav-link' href='./user_area/user_login.php'>Login</a>
       </li>";
         }else{
          echo" <li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>Logout</a>
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

<!--------------------------------Forth Child----------------------------------->
<div class="row">
             <div class="col-md-2 bg-secondary p-0">
            <!--------Brands to be Display------------->
            <ul class="navbar-nav me-auto text-center">
              <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
              </li>
              <?php
             getbrand();
              ?>
               
              
            </ul>
            <!-------------Catogory to be display--------------->

            <ul class="navbar-nav me-auto text-center">
              <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Category</h4></a>
              </li>
              <?php
               getcategory();
               
              ?>
               
            </ul>
          
                     </div>

   <div class="col-md-10">
               <!-------products-------------->
                       <div class="row">
  <!---------------------------fetching products------------------->
    <?php
   getproduct();
   get_unique_categories();
   get_unique_brand();
   $ip = getIPAddress();  
   // echo 'User Real IP Address - '.$ip;
?>
    <!-----------------row end-------------------->
              </div>
    <!-----------------col end-------------------->

              </div>
  
  
</div>
<!-------------------last Child----------------------->
<?php include('./includes/footer.php');
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>