<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/db.php';
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];
$about_image = $_FILES['about_image'];
$_SESSION['old_sub_title'] = $sub_title;
$_SESSION['old_title'] = $title;
$_SESSION['old_desp'] = $desp;

    if(empty($sub_title)){
        $_SESSION['null_error'] = "* Please Enter Sub Title!";
        header('location:add_about_content.php');
        if(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_about_content.php');
        }
        if(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Desription!";
            header('location:add_about_content.php');
        }
        if(empty($about_image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_about_content.php');
        }
    }
    elseif(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_about_content.php');
    }
    elseif(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Desription!";
            header('location:add_about_content.php');
    }
    elseif(empty($about_image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_about_content.php');
    }
    else{
        
        $name_exp = explode('.',$about_image['name']);
        $extention = end($name_exp);
        $allow_extention = array('jpg','png','jpeg');
        if(in_array($extention, $allow_extention)){
            if($about_image['size'] <10000000000000){
                $insert_query = "INSERT INTO about_contents(sub_title, title, desp) VALUES('$sub_title', '$title', '$desp')";
                $insert_query_res = mysqli_query($db_con, $insert_query);

                $last_id = mysqli_insert_id($db_con);
                $about_image_name = $last_id.'.'.$extention;

                $upload_loaction = '../image/uploads/about_content/'.$about_image_name;
                move_uploaded_file($about_image['tmp_name'], $upload_loaction);

                $update_image = "UPDATE about_contents SET about_image='$about_image_name' WHERE id='$last_id'";
                $update_image_query = mysqli_query($db_con, $update_image);

                unset($_SESSION['old_sub_title']);
                unset($_SESSION['old_title']);
                unset($_SESSION['old_desp']);
                $_SESSION['banner_content_inserted'] = "About Content Insert Successfully!";
                header('location:add_about_content.php');

            }
            else{
                $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                header('location:add_about_content.php');
            }
        } 
        else{
            $_SESSION['invalid_ext'] = "Invalid Extention!";
            header('location:add_about_content.php');
        }
    }

?>