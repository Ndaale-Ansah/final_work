
<?php  
//start the session
session_start();
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


//check if login button was clicked 
if (isset($_POST['login'])){
	
	//grab form details 
	$customer_email = $_POST['customer_email'];
	$password = $_POST['password'];

	$login_result= get_login_fun($customer_email);

	if(isset($login_result["customer_email"])){
        if(!password_verify($password, $login_result["password"]))echo 1;
		else {
			$_SESSION["customer_id"] = $login_result["customer_id"];
        	$_SESSION["user_role"] = $login_result["user_role"];
			$_SESSION["customer_email"] = $login_result["customer_email"];
			echo "0";
		}
    }
    else echo "2";
;
	
}

?>