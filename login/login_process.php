
<?php  
//start the session
session_start();
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


// Process user login request
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
			// setting user permissions
			$_SESSION["customer_id"] = $login_result["customer_id"];
        	$_SESSION["user_role"] = $login_result["user_role"];
			$_SESSION["customer_email"] = $login_result["customer_email"];

			// setting response ajax json for success
			// reference login_validation.js
			$results_array['response'] = 0;
			$results_array['user_role'] = $login_result["user_role"];

			$results_encoded = json_encode($results_array);
			echo $results_encoded;
		}
    }
    else {
		// setting ajax response json for failure
		// reference login_validation.js
		$results_array['response'] = 2;

		$results_encoded = json_encode($results_array);
		echo $results_encoded;
	}
;
	
}

?>