<?php
//megabytes constant
define('MB', 1048576);

/**
 * $file: $_FILES[post_method_name]
 * 
 * $return: string with directory with image, false;
 */
function uploadImage($file){
    $fileName= $file['name'];
    $file_temp_name = $file['tmp_name'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $filesize = $file['size'];

    $fileExt = explode(".", $fileName);
    $file_A_Ext = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($file_A_Ext, $allowed)){
        // file should be less than 5mb
        if($filesize < 5*MB && $fileError === 0){
            move_uploaded_file($file_temp_name, "../images/product_images/".$fileName);
            return $fileName;
        }
        return 0;
    }
    return 1;
}
?>