<?php 
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


//check if register button was clicked 
if (isset($_POST['register'])) {
	
	//grab register form details 
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$customer_email = $_POST['customer_email'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
    

   
    //Register user if email has not been used before
    if (verify_email($customer_email)==false){
        //encrypt password and contact number before adding to database
        $password = password_hash($password, PASSWORD_DEFAULT);

        //add new user
        $addCust = add_customer_function($first_name, $last_name, $customer_email,$contact, $password);
            
        if ($addCust){
            echo "0";
        }else{
            echo "1";
        }    
    }else{ 
        echo "2";
    }  
        

}
?> 