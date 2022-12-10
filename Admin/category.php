<?php
//connect to the add brand process file
include("../actions/add_category.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Add Category </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">
<script src="../js/jQuery3.6.js"></script>
<script src="../js/add_category.js"></script>


</head>
<body>
<?php
//redirect if user is not an admin
    session_start();
    if($_SESSION['user_role'] !=1){
        header('location: ../login/login.php');
    }
    ?>
<!-- partial:index.partial.html -->
<form class="login-form">
  <p class="login-text">
    
  </p>
  <input type="text" class="login-username" id="add_category" autofocus="true" placeholder="Add Category" />
  <button type="button" id="add_cat-button" class="login-submit"> Add Category</button>
  <button type="button" id="view_cat-button" class="login-submit" name="view_category_btn"> view Category list</button>

</form>
<a href="../admin/index.php" class="login-forgot-pass">Click to go to home page</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
