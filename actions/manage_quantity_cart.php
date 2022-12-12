<?php
session_start();
//connect to the cart controller
require("../controllers/cart_controller.php");


//check if form submit is clicked
if(isset($_GET['submit1'])){
    //grab details
    $pid = $_GET['p_id'];
    $qty = $_GET['qty'];
    if (isset($_SESSION['customer_id'])){
        $cid = $_SESSION['customer_id'];
        $manageqty = manage_quantity( $qty, $cid, $pid);
        if($manageqty){
            header("location: ../view/cart.php");
        }
    }else{
        header("Location: ../login/login.php");
    }

    
}
?>
