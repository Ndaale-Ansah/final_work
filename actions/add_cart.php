<?php
session_start();
//connect to the cart controller
require_once(dirname(__FILE__)).'/../controllers/cart_controller.php';

if(isset($_SESSION['customer_id'], $_GET['pid'], $_GET['cid'], $_GET['qty'])){    //grab details
    $pid = $_GET['pid']; 
    $cid = $_GET['cid'];
    $qty = $_GET['qty'];

    $addtocart = add_to_cart_controller($pid, $cid, $qty);
    if($addtocart){
        header("Location: ../view/cart.php");
    }else{
        header("Location: ../login/login.php");
    }
}
    else{
        header("Location: ../login/login.php");
    }
?>