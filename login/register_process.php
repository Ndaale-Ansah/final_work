<?php 
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


//initializing variable
$errors = array(); 
 
//check if register button was clicked 
if (isset($_POST['register'])) {
	
	//grab register form details 
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$customer_email = $_POST['customer_email'];
	$password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
	$contact = $_POST['contact'];
    
    
    //check if the two passwords match
    if ($password != $confirm_password){
        array_push($errors, "Passwords do not match");
    }

    //check if email exists
    $vemail = verify_email($customer_email);
        
    if($vemail){
        echo "Email already exists";
        }

    //Register user if there are no errors in the form
    if (count($errors) == 0){
        //encrypt password and contact number before adding to database
        $password = password_hash($password, PASSWORD_DEFAULT);
        

        //add new user
            $addCust = add_customer_function($first_name, $last_name, $customer_email,$contact, $password);
            
            if ($addCust){
                echo "<script type='text/javascript'> alert('Successfully Registered');
                window.location.href = '../settings/login.php';
                </script>";
            }else{
                echo "Failed";
            }    
        }else{ 
            echo "<script type='text/javascript'> alert('Registration Failed');              
            window.history.back();
            </script>";
        }  
        

}


?> 