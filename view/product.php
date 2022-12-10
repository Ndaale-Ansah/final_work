<?php
//connect to the add brand process file
include("../actions/add_category.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Add food </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">
<script src="../js/jQuery3.6.js"></script>
<script src="../js/add_product.js"></script>


</head>
<body>
<!-- <?php
//redirect if user is not an admin
    // session_start();
    // if($_SESSION['user_role'] !=1){
    //     header('location: ../login/login.php');
    // }
    ?> -->
<!-- partial:index.partial.html -->
<form class="login-form" enctype="multipart/form-data">
  <p class="login-text">
    
  </p>
  <input type="text" class="login-username" id="food_name" autofocus="true" placeholder="Food Name" />
  <input type="number" class="login-username" id="food_price" autofocus="true" placeholder="Food Price(GHS)" />
  <select class="login-username" id="category" name="pcat" required="required">
		<option value="" selected disabled hidden>Select Product Category</option>
            <?php
            foreach($categories as $category){
            ?>
            <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
            <?php
            }
        ?>
	</select>
  <textarea rows="4" cols="50" class="login-username" id="food_desc" autofocus="true" placeholder="Food Description"></textarea>
  <input type="file" id="image" class="login-username" required="required" accept="image/jpeg, image/png, image/jpg">
  <button type="button" id="add_prod-button" class="login-submit"> Add food</button>
  <button type="button" id="view_prod-button" class="login-submit" > view Food list</button>

</form>
<a href="../admin/index.php" class="login-forgot-pass">Click to go to home page</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
