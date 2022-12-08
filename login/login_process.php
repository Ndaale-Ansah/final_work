
<?php  
//start the session
session_start();
//connnect to the controller
include_once(dirname(__FILE__)).'/../controllers/customer_controller.php';


//check if login button was clicked 
if (isset($_POST['login'])){
	
	//grab form details 
	$customer_email = $_POST['customer_mail'];
	$password = $_POST['password'];

	$login_result= get_login_fun($email);

	if(isset($login_result["customer_email"])){
        password_verify($password, $login_result["password"]);
        $_SESSION["customer_id"] = $login_result["customer_id"];
        $_SESSION["user_role"] = $login_result["user_role"];
		$_SESSION["customer_email"] = $login_result["customer_email"];
		echo "<script type='text/javascript'> alert('Successfully Logged in');
		window.location.href = '../index.php';
		</script>";
        

    }
    else echo "<script type='text/javascript'> alert('Account Not Created');
	window.location.href = './login.php';
	</script>";
;
	
}

?>