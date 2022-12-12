<?php  
//connect to the product controller
require("../controllers/product_controller.php");

if (isset($_GET['id'])){
	//get item to archive
	$id = $_GET['id'];

	$delete = delete_product_function($id); 
	if($delete){
        header("Location: ../Admin/view_products.php");
		}else{
            echo "product clear failed";
        }
    
}
?>