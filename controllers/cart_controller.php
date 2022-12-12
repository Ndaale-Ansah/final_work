<?php
//connect to the cart class
include_once(dirname(__FILE__)).'/../classes/cart_class.php';

function add_to_cart_controller($p_id, $c_id, $qty){
    // create an instance of the cart class
    $cart_instance = new cart_class();
    // call the method from the class
    return $cart_instance->add_to_cart($p_id, $c_id, $qty);
}

function add_to_cart_non_user_controller($p_id,  $qty){
    // create an instance of the cart class
    $cart_instance = new cart_class();
    // call the method from the class
    return $cart_instance->add_to_cart_non_user($p_id, $qty);
}

function view_cart_controller($c_id){
    $cart_instance = new cart_class();
    return $cart_instance->view_cart($c_id);
}

// function view_cart_non_user_controller($ip_add){
//     $cart_instance = new cart_class();
//     return $cart_instance->view_cart_non_user($ip_add);
// }

function cart_total_controller($c_id){
    $cart_instance = new cart_class();
    return $cart_instance->cart_total($c_id);
}

// function cart_total_non_user_controller($ip_add){
//     $cart_instance = new cart_class();
//     return $cart_instance->cart_total_non_user($ip_add);
// }

function remove_from_cart($c_id, $p_id){
    $cart_instance = new cart_class();
    return $cart_instance->remove_from_cart($c_id, $p_id);
}

// function remove_from_cart_non_user($ip_add, $p_id){
//     $cart_instance = new cart_class();
//     return $cart_instance->remove_from_cart_non_user($ip_add, $p_id);
// }

function duplicates_for_user($p_id, $c_id){
    $cart_instance = new cart_class();
    return $cart_instance->duplicates_for_user($p_id, $c_id);
}

// function duplicates_for_non_user($p_id, $ip_add){
//     $cart_instance = new cart_class();
//     return $cart_instance->duplicates_for_non_user($p_id, $ip_add);
// }

function manage_quantity($qty, $c_id, $prod_id){
    $cart_instance = new cart_class();
    return $cart_instance->manage_quantity($qty, $c_id, $prod_id);
}

// function manage_quantity_non_user($qty, $ipadd, $prod_id){
//     $cart_instance = new cart_class();
//     return $cart_instance->manage_quantity_non_user($qty, $ipadd, $prod_id);
// }

function cart_value_controller($c_id){
    $cart_instance = new cart_class();
    return $cart_instance->cart_value($c_id);
}

// function cart_value_non_user_controller($ip_add){
//     $cart_instance = new cart_class();
//     return $cart_instance->cart_value_non_user($ip_add);
// }

function add_order_controller($c_id, $inv_no, $order_date, $order_status){
    $cart_instance = new cart_class();
    return $cart_instance->add_order($c_id, $inv_no, $order_date, $order_status);    
}

function add_Order_details_controller($order_id, $p_id, $qty){
    $cart_instance = new cart_class();
    return $cart_instance->add_orderDetails($order_id, $p_id, $qty);  
}

//payment 

function add_payment_controller($amt, $c_id, $o_id, $currency, $pay_d){
    $cart_instance = new cart_class();
    return $cart_instance->add_payment($amt, $c_id, $o_id, $currency, $pay_d); 
}

function recent_orders_controller(){
    $cart_instance = new cart_class();
    return $cart_instance->recent_orders();
}

function delete_cart_controller($c_id){
    $cart_instance = new cart_class();
    return $cart_instance->delete_cart_after_p($c_id);
}

function get_order_controller($o_id){
    $cart_instance = new cart_class();
    return $cart_instance->get_order($o_id);
}

function get_order_details_controller($o_id){
    $cart_instance = new cart_class();
    return $cart_instance->get_orderDetails($o_id);
}

// function get_stock_controller($p_id){
//     $cart_instance = new cart_class();
//     return $cart_instance->get_stock($p_id);
// }

// function update_stock_controller($p_id, $stock){
//     $cart_instance = new cart_class();
//     return $cart_instance->update_stock($p_id, $stock);
// }

// function update_carttoCID_controller($c_id, $ip){
//     $cart_instance = new cart_class();
//     return $cart_instance->update_carttoCID($c_id, $ip);

// }

?>