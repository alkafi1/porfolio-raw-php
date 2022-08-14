<?php
session_start();
require '../dashboard_parts/db.php';
    $logo = $_FILES['brand_logo'];
    $logo_name = $logo['name']; 
    if(empty($logo_name)){
        $_SESSION['photo_error'] = "* Please Upload Photo!!";
        header('location:add_brand_logo.php');
    }
    else{
        $logo_name_explode = explode('.',$logo_name);
        $extention = end($logo_name_explode);
        $allowed_ext = array('png');
        if(in_array($extention, $allowed_ext)){
            if($logo['size'] <= 1000000){

                $insert = "INSERT INTO brands_logo (brands_logo) VALUES('$logo_name') ";
                $insert_query = mysqli_query($db_con,$insert);

                $last_id = mysqli_insert_id($db_con);
                $logo_name_id = $last_id.'.'.$extention;
                
                $logo_location = '../image/uploads/brands_logo/'.$logo_name_id;
                move_uploaded_file($logo['tmp_name'], $logo_location);

                $update_logo = "UPDATE brands_logo SET brands_logo ='$logo_name_id' WHERE id='$last_id'";
                $update_logo_query = mysqli_query($db_con,$update_logo);
                

                $_SESSION['logo_insert_success'] = "Brand logo Uploaded!";
                header('location:add_brand_logo.php');

            }
            else{
                $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                header('location:add_brand_logo.php');
            }
        }
        else{
            $_SESSION['invalid_ext'] = "Invalid Extention!";
            header('location:add_brand_logo.php');
        }

    }
    

?>