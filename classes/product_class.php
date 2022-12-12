<?php

include_once(dirname(__FILE__)).'/../settings/db_class.php';

// inherit the methods from Connection
class product_class extends Connection{

    //method to add product to the database
	function add_product($prod_cat, $prod_title, $prod_price, $prod_desc, $prod_img){
		return $this->query("insert into products(product_cat, product_title, product_price, product_desc, product_image) 
		values('$prod_cat', '$prod_title', '$prod_price', '{$prod_desc}', '$prod_img')");
	}

	//method to delete a product from the database
    function delete_one_product($id){
		return $this->query("delete from products where product_id = '$id'");
	}

	//updating a product in the databse
    function update_one_product($id, $prod_cat, $prod_title, $prod_price, $prod_desc, $prod_img){
		return $this->query("update products set product_cat='$prod_cat', 
		product_title = '$prod_title', product_price = '$prod_price', product_desc = '$prod_desc', product_image = '$prod_img'
		where product_id = '$id'");
	}

	//method to select all products in the database
    function select_all_products(){
		return $this->fetch("select * from products");
	}

	//selecting a  product from the database
	function return_a_product($id){
		return $this->fetchOne("select  `categories`.`cat_name`, `categories`.`cat_id`,
		`products`.`product_title`,`products`.`product_id`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`
		 from `products`
		JOIN categories ON (`products`.`product_cat` = `categories`.`cat_id`)
		WHERE `products`.`product_id` = '$id'");
	}
	
	//method to search for a product from the database, takes the search term
	function search_for_product($term){
		return $this ->fetch("select * from products where product_title like '%$term%'");
	}

	 //adding a category to the database
	 function add_category($cname){
		return $this->query("insert into categories(cat_name) values('$cname')");
	}

	//deleting a category from the database
    function delete_one_category($id){
		return $this->query("delete from categories where cat_id = '$id'");
	}

	//updating a categpry in the database
    function update_one_category($id,$cname){
		return $this->query("update categories set cat_name='$cname' where cat_id = '$id'");
	}

	//selecting all categories in the database
    function select_all_categories(){
		return $this->fetch("select * from categories");
	}

	//selecting a category from the database
	function select_one_category($id){
		return $this->fetchOne("select * from categories where cat_id='$id'");
    }

	//method to search for categoryakes the search term
    function search_a_cat($term){
		return $this ->fetch("SELECT * FROM `categories` WHERE `cat_name` LIKE '%$term%'");
    } 
    
	 //method to archive product
	function archive($id){
        return $this->query("INSERT INTO `archived` SELECT * FROM `products` WHERE `product_id` = '$id'");
    }

	 //method to retrieve archived product
	function retrieve($id){
		return $this->query("INSERT INTO `products` SELECT * FROM `archived` WHERE `product_id` = '$id'");
    
    }

	  //method to delete archived product
    function delete_archive($id){
        return $this->query("DELETE from `archived` where `product_id` = '$id'");
    }

    //method to view archived product
    function view_archived(){
		return $this->fetch("SELECT * FROM `archived`");
    }

	//method to view paid products
    function view_orders(){
        return $this->fetch("SELECT `products`.`product_title`, `products`.`product_price`,`orders`.`order_id`, `orders`.`order_date`, `orderdetails`.`qty`, `orderdetails`.`qty`*`products`.`product_price` as result FROM `orderdetails` 
        JOIN `products` ON (`orderdetails`.`product_id` = `products`.`product_id`)
        JOIN `orders` ON (`orderdetails`.`order_id` = `orders`.`order_id`)");
    }

	//method to display all products
	function display_products(){
    	return $this->fetch("SELECT categories.cat_name as cat_name, products.product_id as prod_id,
        products.product_title as prod_name, products.product_price as prod_price, categories.cat_id as cat_id,
		products.product_desc as prod_desc, products.product_image as prod_img_src
        FROM `products`
        JOIN categories ON (products.product_cat = categories.cat_id)
    ");
    }
	
	//method to count the products in the database for pagination
   function product_row_counts(){
	return $this->fetchOne("SELECT count(`product_id`) AS id FROM `products`");
    }

	//method to view product ID,takes the id and title 
    function view_productsID(){
        return $this->fetch("SELECT `product_id`, `product_title` FROM `products`");
    }

	//method to view product ID where stock = 0 takes the id and title 
    function viewproducts_nostock(){
		return $this->fetch("SELECT `product_id`, `product_title` FROM `products` ");
    }

	 //method to display products by categories
    function displaybycat($cat_id){
        return $this->fetch( "SELECT `categories`.`cat_name`, `categories`.`cat_id`, `products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`product_id`
            FROM `products`
            JOIN `categories` ON (`products`.`product_cat` =`categories`.`cat_id`) 
            WHERE `cat_id` ='$cat_id'");
    }

	//method to add review
    function add_review($u_id, $p_id, $review, $title, $date){
		return $this->query("INSERT INTO `product_review`(`user_id`, `product_id`, `review`, `title`, `date`) VALUES ('$u_id', '$p_id', '$review', '$title', '$date')"); 
    }

    //method to display reviews
    function display_reviews($p_id){
    	return $this->fetch("SELECT `review_id`, `product_id`, `review`, `title`, `date`, `users`.`user_fname`, `users`.`user_lname`, `users`.`user_id` FROM `product_review` JOIN `users` ON (`product_review`.`user_id` = `users`.`user_id`) WHERE `product_id`='$p_id'");
    }
    
    //method to for counting reviews
	function count_review_rows(){
    	return $this->fetchOne("SELECT count(`review_id`) AS reviews FROM `product_review`");
    } 
    
    //method to for delete reviews
    function delete_review($r_id){
		return $this->query("DELETE FROM `product_review` WHERE `review_id`='$r_id'");
    }

	//method to view payment
    function view_payments(){
        return $this->fetch("SELECT `payment`.`amt`, `users`.`user_fname`, `users`.`user_lname`, `orders`.`order_id`, `payment`.`payment_date` FROM `payment` 
        JOIN `users` ON (`payment`.`user_id` = `users`.`user_id`)
        JOIN `orders` ON (`payment`.`order_id` = `orders`.`order_id`)");
    }
	
}

?>