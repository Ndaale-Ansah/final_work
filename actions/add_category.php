<?php
//connect to the product controller
require_once"../controllers/product_controller.php";

// check if button was clicked
if(isset($_POST['addcatbtn'])){

    //grab form data

    $categoryName = str_replace("'", "\'", $_POST['cat_name']);
    
    $addcategory = add_category_function($categoryName);
        
      //check if insert worked
    if ($addcategory){
      echo "0";
    }else{
      echo "1";
    }
        
    
}


$categories = select_all_categories_controller();

?>