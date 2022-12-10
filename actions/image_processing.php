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
    $filesize = $file['size'];

    $fileExt = explode(".", $fileName);
    $file_A_Ext = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($file_A_Ext, $allowed)){
        $imgName = $fileName.$file_A_Ext;
        // file should be less than 5mb
        if($filesize < 5*MB){
                move_uploaded_file($file_temp_name, "../images/product_images/".$imgName);
                
                return $imgName;
        }
        return 0;
    }
    return 1;
}
?>