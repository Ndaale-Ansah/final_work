<?php
//connect to the cart controller
require_once("../Controllers/cart_controller.php");

//navigation bar
include("../navigation_bar.php");

//start session
session_start();
if(isset($_GET['p_id'])){
    $pid = $_GET['p_id'];
    if(isset($_SESSION['customer_id'])){
       $cid = $_SESSION['customer_id'];
        $delete = remove_from_cart($cid,$pid);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            header("location: ../view/cart.php");
        }
    }
}
else{
    header("location: ../view/cart.php");
}

?>