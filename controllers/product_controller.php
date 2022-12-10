<?php
//connect to the brand class
include_once(dirname(__FILE__)).'/../classes/product_class.php';

//products

//add new product function 
function add_product_function($prod_cat, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_stock){
    // create an instance of the product class
    $product_instance = new product_class();
    // call the method from the class
    return $product_instance->add_product($prod_cat, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_stock);
}

//edit a product function   
function update_product_controller($id,$prod_cat, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_stock){
    // create an instance of the product class
    $product_instance = new product_class();
    // call the method from the class
    return $product_instance->update_one_product($id,$prod_cat,  $prod_title, $prod_price, $prod_desc, $prod_img, $prod_stock);
}

//delete a product function 
function delete_product_function($id){
    // create an instance of the product class
    $product_instance = new product_class();
    // call the method from the class
    return $product_instance->delete_one_product($id);
}

//select all product function 
function select_all_products_controller(){
    // create an instance of the product class
    $product_instance = new product_class();
    // call the method from the class
    return $product_instance->select_all_products();
}

function return_a_product_controller($id){
    $product_instance = new product_class();
    return $product_instance->return_a_product($id);
}

function search_for_product($term){
    $product_instance=new product_class();
    return $product_instance->search_for_product($term);
}

//categories functions

//add new category function 
function add_category_function($cname){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->add_category($cname);
}

//edit a category function 
function update_category_controller($id,$cname){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->update_one_category($id,$cname);
}

//delete a category function 
function delete_category_function($id){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->delete_one_category($id);
}

//select all category function 
function select_all_categories_controller(){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->select_all_categories();
}

//select a category function 
function select_one_category_controller($id){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->select_one_category($id);
}

//select a category function 
function search_a_cat_controller($term){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->search_a_cat($term);
}

function retrieve_controller($id){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->retrieve($id);
}

function delete_archive_controller($id){
      // create an instance of the product class
      $category_instance = new product_class();
      // call the method from the class
      return $category_instance->delete_archive($id);
}

function archive_controller($id){
     // create an instance of the product class
     $category_instance = new product_class();
     // call the method from the class
     return $category_instance->archive($id);
}

function view_archived_controller(){
     // create an instance of the product class
    $category_instance = new product_class();
     // call the method from the class
    return $category_instance->view_archived();
}


function display_products_controller($start, $limit){
     // create an instance of the product class
     $category_instance = new product_class();
     // call the method from the class
     return $category_instance->display_products($start, $limit);
}

function product_row_counts_controller(){
       // create an instance of the product class
       $category_instance = new product_class();
       // call the method from the class
       return $category_instance->product_row_counts();
}

function view_orders_controller(){
      // create an instance of the product class
      $category_instance = new product_class();
      // call the method from the class
      return $category_instance->view_orders();
}


function view_productsID_controller(){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->view_productsID();
}

function viewproducts_nostock_controller(){
     // create an instance of the product class
     $category_instance = new product_class();
     // call the method from the class
     return $category_instance->viewproducts_nostock();
}

function displaybycat_controller($cat_id){
      // create an instance of the product class
      $category_instance = new product_class();
      // call the method from the class
      return $category_instance->displaybycat($cat_id);
}

function add_review_controller($u_id, $p_id, $review, $title, $date){
     // create an instance of the product class
     $category_instance = new product_class();
     // call the method from the class
     return $category_instance->add_review($u_id, $p_id, $review, $title, $date);
}

function display_reviews_controller($p_id){
     // create an instance of the product class
     $category_instance = new product_class();
     // call the method from the class
     return $category_instance->display_reviews($p_id);
}

function count_review_rows_controller(){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->count_review_rows();
}

function delete_review_controller($r_id){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->delete_review($r_id);
}

function view_payments_controller(){
    // create an instance of the product class
    $category_instance = new product_class();
    // call the method from the class
    return $category_instance->view_payments();
}
?>

