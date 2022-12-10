<?php
//connect to the add brand process file
include("../actions/add_category.php");

?>


<section>
    <div class='search_input' id='search_input_box' style="font-family: cursive;">
        <div class='container'>
            <form class='d-flex justify-content-between search-inner' method="get" action="cat_search_result.php">
                <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='csterm'>
                <button type='submit' name="search" class='btn0'>Search</button>
            </form>
        </div>
    </div>
</section>

<section class="Form my-4 mx-5" style="font-family: cursive;">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../Images/products.jpg" class="img-fluid"> 
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
            echo "<li class='list-group-item'>". $cat['cat_name'] ." <a class='btn0' href='../Actions/update_category.php?cid={$cat['cat_id']}&cname={$cat['cat_name']}'>Update</a> | <a class='btn0' href='../Actions/delete_category.php?cid={$cat['cat_id']}'>Delete</a> </li>";
          }
        } 
      ?>
      <a href="category.php"><button type="submit" class="btn1 mt-3 mb-3" name="addcatbtn" id="addcatbtn">Add Category</button></a>

        </div>
      </div>
    </section>