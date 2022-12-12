<?php
//redirect if user is not an admin
session_start();
if($_SESSION['user_role'] !=1){
    header('location: ../Login/login.php');
}

//connect to the product controller
require("../Controllers/product_controller.php");
require_once("./image_processing.php");

//initializing variables
$categories = select_all_categories_controller();
$errors = array();


if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    $productDetails = return_a_product_controller($id);


    //if form has been submitted
    if (isset($_POST['add_prods'])){
        

        //grab form details
        $pname = str_replace("'", "\'", $_POST['prod_name']);
        $pprice = $_POST['prod_price'];
        $pcat = str_replace("'","\'", $_POST['prod_cat']);
        $pdesc = str_replace("'","\'", $_POST['prod_desc']); 
        $image_src = uploadImage($_FILES['prod_img_src']);

        $updateProduct = update_product_controller($id, $pcat, $pname, $pprice, $pdesc, $image_src);
          if ($updateProduct){
              header("location: ../Admin/");
          }
    }
            
  }        
      

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <script src="../js/jQuery3.6.js"></script>
    <script src="../js/update_product.js"></script>
  </head>

  <body>

    <!--Update Product Form-->
    <section class="Form my-4 mx-3">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
          <img src="../images/african_food_wallpaper.avif" class="img-fluid"> 
          </div>
       
          <div class="col-lg-7 px-5 pt-3">
            <h4>Update Baked Good</h4>
           
    <form method="post" enctype="multipart/form-data" class="login-form">
        <p></p>
        <input type="text" class="login-username" name="prod_name" id="food_name" autofocus="true" placeholder="Food Name" />
        <input type="number" class="login-username" name="prod_price" id="food_price" autofocus="true" placeholder="Food Price(GHS)" />
        <select class="login-username" id="category" name="prod_cat" required="required">
          <option value="" selected disabled hidden>Select Product Category</option>
                  <?php
                  foreach($categories as $category){
                  ?>
                  <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                  <?php
                  }
              ?>
        </select>
        <textarea rows="4" cols="50" class="login-username" name="prod_desc" id="food_desc" autofocus="true" placeholder="Food Description"></textarea>
        <input type="file" name="prod_img_src" id="image" class="login-username" required="required" accept="image/jpeg, image/png, image/jpg">
        <button type="submit" id="add_prod-button" name="add_prods" class="login-submit"> Update Food Item</button>
        <button class="login-submit" id="view-prod">Back To Food Item</button>
        
    </form>
    </section>
    <div class="underlay-photo"></div>
<div class="underlay-black"></div>
  </body>
</html>
