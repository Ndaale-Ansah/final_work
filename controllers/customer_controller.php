<?php
//connect to the customer class
include_once(dirname(__FILE__)).'/../classes/customer_class.php';

/**
*add new customer function 
*/
function add_customer_function($first_name, $last_name, $customer_email,$contact, $password){
    // create an instance of the Customer class
    $customer_instance = new customer_class();
    // call the method from the class
    return $customer_instance->add_customer($first_name, $last_name, $customer_email,$contact, $password);

}

/**
*edit a user function 
*/
function update_customer_controller($customer_id,$first_name, $last_name, $customer_email,$contact, $password){
    // create an instance of the Customer class
    $customer_instance = new customer_class();
    // call the method from the class
    return $customer_instance->update_one_customer($customer_id,$first_name, $last_name, $customer_email,$contact, $password);
}

/**
*delete a user function 
*takes the id
*/
function delete_customer_function($customer_id){
    // create an instance of the Customer class
    $customer_instance = new customer_class();
    // call the method from the class
    return $customer_instance->delete_one_customer($customer_id);

}

/**
*select all user function 
*
*/
function select_all_customers_controller(){
    // create an instance of the Customer class
    $customer_instance = new customer_class();
    // call the method from the class
    return $customer_instance->select_all_customers();

}
/**
*select a user function 
*takes the id
*/
function select_one_customer_controller($customer_id){
    // create an instance of the Customer class
    $customer_instance = new customer_class();
    // call the method from the class
    return $customer_instance->select_one_customer($customer_id);

}


/**
*check if mail exists function 
*takes the email
*/
function verify_email($customer_email){
	//create an instance of the customer class
	$customer_instance = new customer_class();

	return $customer_instance->verify_email($customer_email);
	
}

/**
*get login information function 
*takes the mail
*/
function get_login_fun($customer_email){
	$customer_instance = new customer_class();
	return $customer_instance->verify_login($customer_email);

}




?>

