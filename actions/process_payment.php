<?php
include_once(dirname(__FILE__)).'/../controllers/cart_controller.php';


//start session
session_start();
//check for status
if(isset($_GET['status']) && $_GET['status'] == 'completed'){

        // ..code
        $cid = $_SESSION['customer_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        //$location = $_GET("dloc");
        $ord_stat = 'unfulfilled';
        $add_order = add_order_controller($cid, $inv_no, $ord_date, $ord_stat);
        if($add_order){
            $recent = recent_orders_controller();
            $carts = view_cart_controller($cid);
            foreach($carts as $cart){
                echo $cart['p_id'];
                echo $cart['qty'];
                $add_details = add_order_details_controller($recent['recent'], $cart['p_id'], $cart['qty']);
            }

            $amt = cart_value_controller($cid);
            $currency = "GHS";
            $add_payment = add_payment_controller($amt['Result'], $cid, $recent['recent'], $currency, $ord_date);

            if($add_payment){
                $delete = delete_cart_controller($cid);
                if($delete){
                    header("location: ../view/payment_success.php?ord_id=" .$recent['recent']);
                }else{
                    echo "cart delete failed";
                }
            }{
                echo "payment failed";
            }
            
        }else{
                echo "order went wrong";
            }
    
    
}

?>
