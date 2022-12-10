
<?php  
//start the session
session_start();
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


//check if login button was clicked 
if (isset($_POST['login'])){

	$results_array = array();
	
	//grab form details 
	$customer_email = $_POST['customer_email'];
	$password = $_POST['password'];

	$login_result= get_login_fun($customer_email);


	if(isset($login_result["customer_email"])){
        if(!password_verify($password, $login_result["password"])){
			$results_array['response'] = 1;
			$results_encoded = json_encode($results_array);
			echo $results_encoded;
		}
		else {
			$_SESSION["customer_id"] = $login_result["customer_id"];
        	$_SESSION["user_role"] = $login_result["user_role"];
			$_SESSION["customer_email"] = $login_result["customer_email"];
			$results_array['response'] = 0;
			$results_array['user_role'] = $login_result["user_role"];

			$results_encoded = json_encode($results_array);
			echo $results_encoded;
		}
    }
    else {
		$results_array['response'] = 2;
		$results_encoded = json_encode($results_array);
		echo $results_encoded;
	}
;
	
}

?>