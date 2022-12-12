<?php
//connect to the add brand process file
include("../actions/add_category.php");
//redirect if user is not an admin
session_start();
if($_SESSION['user_role'] !=1){
    header('location: ../login/login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> View Categories </title>
<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<!-- nice select  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
<!-- font awesome style -->
<link href="../css/font-awesome.min.css" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="../css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="../css/responsive.css" rel="stylesheet" />

</head>

<header class="header_section">
 
 <div class="container">
   <nav class="navbar navbar-expand-lg custom_nav-container ">
     <a class="navbar-brand" href="index.php">
       <span>
         Gracyln
       </span>
     </a>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class=""> </span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: black">
       <ul class="navbar-nav  mx-auto ">
       <li class="nav-item active">
           <a class="nav-link" href="">View Category</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="./category.php">Add Category <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="./view_products.php">View Food</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="../view/product.php">Add food</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="./view_orders.php">Orders</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="./view_payment.php">Payments</a>
           <li class="nav-item">
           <a class="nav-link" href="../login/logout.php">Logout</a>
         </li>
       </ul>
              <g>
               <g>
                 <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
              c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
               </g>
             </g>
             <g>
               <g>
                 <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
              C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
              c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
              C457.728,97.71,450.56,86.958,439.296,84.91z" />
               </g>
             </g>
             <g>
               <g>
                 <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
              c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
               </g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
             <g>
             </g>
           </svg>
         </a>
</header>

<!-- <section>
    <div class='search_input' id='search_input_box' style="font-family: cursive;">
        <div class='container'>
            <form class='d-flex justify-content-between search-inner' method="get" action="cat_search_result.php">
                <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='csterm'>
                <button type='submit' name="search" class='btn0'>Search</button>
            </form>
        </div>
    </div>
</section> -->

<section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../images/african_food_wallpaper.avif" class="img-fluid"> 
          </div>
          <div class="col-lg-7 px-5 pt-5">
             
        <?php
        if(!empty($categoryErrors)){
          foreach($categoryErrors as $error){
            echo "\n<div class='alert alert-danger' role='alert' style='padding-bottom: 10px;'>".$error."</div>";
          }
        }
          
        if (isset($addSuccess)){
            echo $addSuccess;
        }else if(isset($addFailed)){
            echo $addFailed;
        }
          
        echo "<h3 class='text-center' id='title'>View All Categories</h3>";
          
        if (!empty($categories)){
          foreach($categories as $cat){ 
            echo "<li class='list-group-item'>". $cat['cat_name'] ." <a class='btn0' href='../Actions/update_category.php?cid={$cat['cat_id']}&cname={$cat['cat_name']}'>Update</a> | <a class='btn0' href='../actions/delete_category.php?cid={$cat['cat_id']}'>Delete</a> </li>";
          }
        } 
      ?>
      <a href="./category.php"><button type="submit" name="addcatbtn" id="addcatbtn">Add Category</button></a>

        </div>
      </div>
    </section>
</div>
    <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
             Gracyln
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>
  <!-- Google Map -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"> -->
  <!-- </script> -->
  <!-- End Google Map -->

</body>

</html>