<?php
//connect to the product controller
require("../controllers/product_controller.php");
$categoryErrors = array();

// check if button was clicked
if(isset($_POST['addcatbtn'])){

    //grab form data
    $categoryName = $_POST['cat_name'];
    
    //check for errors
    if(empty($categoryName)){
        array_push($categoryErrors, "Category Name is Required");
    }
    if(strlen($categoryName) > 100){
        array_push($categoryErrors, "Category Name is too long");
    }
    
    //if there are no errors
    if (count($categoryErrors) == 0){
        $addcategory = add_category_function($categoryName);
        
        //check if insert worked
        if ($addcategory){
            $addSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Category Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }else{
            $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Category Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
        
    }
}


$categories = select_all_categories_controller();

?>