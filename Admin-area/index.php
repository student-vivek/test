<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <style type="text/css">
    .admin_image{
  width: 100px;
 object-fit: contain;
  }

.footer{
  position: absolute;
  bottom:0;
}
  </style>
  <body>
    <!------------------first child------------------>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
          <img src="../img/cart.png" class="logo" alt="logo">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav"> <li class="nav-item"><a href="" class="nav-link">Welcome Guest</a></li></ul>
            
          </nav>
        </div>
      </nav>
    </div>

  <!----------------------Second Child-------------------->
   <div class="bg-light">
     <h3 class="text-center p-2">Manage Details</h3>
   </div>
   
   <!----------------------third child-------------------->
   <div class="row">
     <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
       <div class="p-3"><a href="#"><img src="../img/13.jpg" class="admin_image"></a>
        <p class="text-center text-light">Admin Name</p></div>

       <div class="button text-center">
       <button><a href="insert_product.php" class="nav-link text-light bg-info m-1 p-1">Insert Products</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Products</a></button>
       <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-1">Insert Categories</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Categories</a></button>
       <button><a href="index.php?insert_brands" class="nav-link text-light bg-info m-1 p-1">Insert Brands</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Brands</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">All orders</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">All Payments</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">List users</a></button>
       <button><a href="" class="nav-link text-light bg-info m-1 p-1">Logout</a></button>
</div>     
     </div>
       
     </div>
   </div>
   <!--------------------------fourth child---------------------->
<div class="container my-3">
  <?php
    if(isset($_GET['insert_category']))
    {
      include('insert_categories.php');
    }
  ?>
  <?php
    if(isset($_GET['insert_brands']))
    {
      include('insert_brands.php');
    }
  ?>
</div>

   <!--------------------------last child---------------------->
<div class="container-fluid bg-info p-3 text-center footer"><p>All right reserved ©-Designed by Verma-2022</p></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>