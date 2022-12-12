<?php

include_once(dirname(__FILE__)).'/../settings/db_class.php';


// inherit the methods from Connection
class cart_class extends Connection{

    //adding to cart when you are a user
    function add_to_cart($p_id, $c_id, $qty ){
		return $this->query("insert into cart(p_id, c_id, qty) values('$p_id', '$c_id', '$qty')");
	}

    //add to cart without being a user 
    function add_to_cart_non_user($p_id, $qty ){
		return $this->query("insert into cart(p_id, ip_add, qty) values('$p_id', '$qty')");
	}

    //view cart as user
    function view_cart($c_id){
		return $this->fetch("SELECT `cart`.`p_id`, `cart`.`c_id`, `cart`.`qty`,
         `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`c_id` = '$c_id'");
	}

    //view cart as non user
    // function view_cart_non_user($ip_add){
	// 	return $this->fetch("SELECT `cart`.`p_id`, `cart`.`ip_add`, `cart`.`qty`,
    //      `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
    //     JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
    //     WHERE `cart`.`ip_add` = '$ip_add'");
	// }

    //cart total of user
    function cart_total($c_id){
        return $this->fetchOne("SELECT count(`c_id`) AS `count` FROM `cart` WHERE `c_id`='$c_id'");
    }

     //method to update cart with user ID
    function update_carttoCID($c_id, $ip){
        return $this->query("UPDATE `cart` SET `c_id`='$c_id' WHERE `ip_add`='$ip'");

    }

    //cart total of non user
    // function cart_total_non_user($ip_add){
    //     return $this->fetchOne("SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ip_add'");
    // }

    //remove from cart as user
    function remove_from_cart($c_id, $p_id){
        //sql query to remove from cart
        return $this->query("DELETE FROM `cart` WHERE `c_id`='$c_id' AND `p_id`='$p_id'");
    }

    //remove from cart as non user
    // function remove_from_cart_non_user($ip_add, $p_id){
    //     //sql query to remove from cart
    //     return $this->query("DELETE FROM `cart` WHERE `ip_add`='$ip_add' AND `p_id`='$p_id'");
    // }

    //check duplicate for users
    function duplicates_for_user($p_id, $c_id){
        return $this->fetch("SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'");
    }

    //check duplicate for non users
    // function duplicates_for_non_user($p_id, $ip_add){
    //     return $this->fetch("SELECT `p_id`, `ip_add` FROM `cart` WHERE `p_id`='$p_id' AND `ip_add`='$ip_add'");
    // }

    //manage quantity of user
    function manage_quantity($qty, $c_id, $prod_id){
        return $this->query("UPDATE `cart` SET `qty`='$qty' WHERE `c_id`='$c_id' AND `p_id`='$prod_id'");
    }

    //manage quantity of guest
    // function manage_quantity_non_user($qty, $ipadd, $prod_id){
    //     return $this->query("UPDATE `cart` SET `qty`='$qty' WHERE `ip_add`='$ipadd' AND `p_id`='$prod_id'");
    // }

    //total cart value for user
    function cart_value($c_id){
        return $this->fetchOne("SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`='$c_id'");
    }

    //total cart value for guest
    // function cart_value_non_user($ip_add){
    //     return $this->fetchOne("SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
    //     FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ip_add'");
    // }

    //add orders
    function add_order($c_id, $inv_no, $order_date, $order_status){
        return $this->query("INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$c_id','$inv_no','$order_date','$order_status')");
    }

    //add order details
    function add_orderDetails($order_id, $p_id, $qty){
        return $this->query("INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`) VALUES ('$order_id','$p_id','$qty')");
    }

    //add payment 
    function add_payment($amt, $c_id, $o_id, $currency, $pay_d){
        return $this->query("INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES ('$amt','$c_id','$o_id','$currency','$pay_d')");
    }

    //method to get the most recent order
    function recent_orders(){
        return $this->fetchOne("SELECT MAX(`order_id`) as recent FROM `orders`");
    }

    //method to delete cart after payment
    function delete_cart_after_p($c_id){
        return $this->query("DELETE FROM `cart` WHERE `c_id`='$c_id'");
    }

    //get orders
    function get_order($o_id){
        return $this->fetchOne("SELECT  `customer`.`first_name`, `orders`.`order_id`, `orders`.`invoice_no`, `orders`.`order_date`, `orders`.`order_status` FROM `orders` 
        JOIN `customer` ON (`customer`.`customer_id` = `orders`.`customer_id`) WHERE `orders`.`order_id` = '$o_id'");
    }

    //get order details
    function get_orderDetails($o_id){
        return $this->fetch("SELECT `products`.`product_title`, `products`.`product_image`, `products`.`product_price`, `orderdetails`.`qty`, `orderdetails`.`qty`*`products`.`product_price` as result FROM `orderdetails` 
        JOIN `products` ON (`orderdetails`.`product_id` = `products`.`product_id`) WHERE `order_id`='$o_id'");
    }

    //method to update stock
    // function update_stock($p_id, $stock){
    //     return $this->query("UPDATE `products` SET `stock`='$stock' WHERE `product_id`= $p_id");
    // }

    //method to get stock
    // function get_stock($p_id){
    //     return $this->fetchOne("SELECT `stock` FROM `products` WHERE `product_id`='$p_id'");
    // }

}
?>