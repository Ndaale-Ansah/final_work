<?php

include_once(dirname(__FILE__)).'/../settings/db_class.php';

// inherit the methods from Connection
class customer_class extends Connection{


	function add_customer($first_name, $last_name, $customer_email,$contact, $password){
		// return true or false
		return $this->query("insert into customer(first_name, last_name, customer_email, contact, password)
		 values('$first_name', '$last_name','$customer_email', '$contact','$password')");
	}

	function delete_one_customer($customer_id){
		// return true or false
		return $this->query("delete from customer where customer_id = '$customer_id'");
	}

	function update_one_customer($customer_id,$first_name, $last_name, $customer_email,$contact, $password){
		// return true or false
		return $this->query("update customer set first_name='$first_name', last_name='$last_name'customer_email='$customer_email', password='$password',
		 contact='$contact' where customer_id = '$customer_id'");
	}

	function select_all_customers(){
		// return array or false
		return $this->fetch("select * from customer");
	}

	function select_one_customer($customer_id){
		// return associative array or false
		return $this->fetchOne("select * from customer where customer_id='$customer_id'");
	}

	function verify_email($customer_email){
		return $this->fetchOne("select customer_email from customer WHERE customer_email = '$customer_email'" );
	}

	function verify_login($customer_email){
		return $this->fetchOne("select * from customer WHERE customer_email = '$customer_email' ");
	}

}



?>