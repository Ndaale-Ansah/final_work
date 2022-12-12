<?php
//connect to the product controller
include_once (dirname(__FILE__)).'/../controllers/product_controller.php';
include_once (dirname(__FILE__)).'/../actions/image_processing.php';



//check if add product button is clicked
if (isset($_POST['add_prods'])){
    
    //grab form details

    $pname = str_replace("'", "\'", $_POST['prod_name']);
    $pprice = str_replace("'", "\'", $_POST['prod_price']);
    $pcat = str_replace("'","\'", $_POST['prod_cat']);
    $pdesc = str_replace("'","\'", $_POST['prod_desc']); 
    $image_src = uploadImage($_FILES['prod_img_src']);
    
    //When image has been uploaded
    if ($image_src == null|| $image_src === 0 || $image_src === 1){
       echo "2";

    }else {
        $addProduct = add_product_function($pcat,  $pname, $pprice, $pdesc, $image_src);
            
        if ($addProduct){
            header("Location: ../view/product.php");
        }else{
            header("Location: ../view/product.php");
        }
    }
};
    

?>