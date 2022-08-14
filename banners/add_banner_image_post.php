<?php
session_start();
require '../dashboard_parts/db.php';
    $banner_image = $_FILES['banner_image'];
    $banner_image_name = $banner_image['name']; 
    $banner_image_name_explode = explode('.',$banner_image_name);
    $extention = end($banner_image_name_explode);
    $allowed_ext = array('png','jpg');
    if(in_array($extention, $allowed_ext)){
        if($banner_image['size'] <= 1000000){

            $insert = "INSERT INTO banner_images (banner_image) VALUES('$banner_image_name') ";
            $insert_query = mysqli_query($db_con,$insert);

            $last_id = mysqli_insert_id($db_con);
            $banner_image_name_id = $last_id.'.'.$extention;
            
            $banner_image_location = '../image/uploads/banners/'.$banner_image_name_id;
            move_uploaded_file($banner_image['tmp_name'], $banner_image_location);

            $update_banner_image = "UPDATE banner_images SET banner_image ='$banner_image_name_id' WHERE id='$last_id'";
            $update_banner_image_query = mysqli_query($db_con,$update_banner_image);
            

            $_SESSION['b_image_insert_success'] = "Bannger Image Uploaded!";
            header('location:add_banner.php');

        }
        else{
            $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
            header('location:add_banner.php');
        }
    }
    else{
        $_SESSION['invalid_ext'] = "Invalid Extention!";
        header('location:add_banner.php');
    }

?>