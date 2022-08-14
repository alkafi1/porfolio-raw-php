<?php
session_start();
require '../dashboard_parts/db.php';
$category = $_POST['category'];
$title = $_POST['title'];
$desp = mysqli_real_escape_string($db_con,$_POST['desp']);
$user_id = $_POST['user_id'];
$image = $_FILES['image'];

$_SESSION['old_category'] = $category;
$_SESSION['old_title'] = $title;
$_SESSION['old_desp'] = $desp;
    if(empty($category)){
        $_SESSION['category_error'] = "* Please Enter Caetogry!";
        header('location:add_about_content.php');
        if(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_portfolio.php');
        }
        if(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_portfolio.php');
        }
        if(empty($image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_portfolio.php');
        }
    }
    elseif(empty($category)){
            $_SESSION['category_error'] ="* Please Enter Caetogry!" ;
            header('location:add_portfolio.php');
    }
    elseif(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_portfolio.php');
    }
    elseif(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_portfolio.php');;
    }
    elseif(empty($image['name'])){
            $_SESSION['image_error'] = "* Please Upload A photo!";
            header('location:add_portfolio.php');
    }
    else{
        
        $name_exp = explode('.',$image['name']);
        $extention = end($name_exp);
        $allow_extention = array('jpg','png','jpeg');
        if(in_array($extention, $allow_extention)){
            if($about_image['size'] <10000000000000){
                $insert_query = "INSERT INTO pportfolios(user_id, category, title, desp) VALUES('$user_id', '$category', '$title', '$desp')";
                $insert_query_res = mysqli_query($db_con, $insert_query);

                $last_id = mysqli_insert_id($db_con);
                $image_name = $last_id.'.'.$extention;

                $upload_loaction = '../image/uploads/portfolio/'.$image_name;
                move_uploaded_file($image['tmp_name'], $upload_loaction);

                $update_image = "UPDATE pportfolios SET image='$image_name' WHERE id='$last_id'";
                $update_image_query = mysqli_query($db_con, $update_image);

                unset($_SESSION['old_category']);
                unset($_SESSION['old_title']);
                unset($_SESSION['old_desp']);
                $_SESSION['feedback_inserted'] = "Portfolio Insert Successfully!";
                header('location:add_portfolio.php');

            }
            else{
                $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                header('location:add_portfolio.php');
            }
        } 
        else{
            $_SESSION['invalid_ext'] = "Invalid Extention!";
            header('location:add_portfolio.php');
        }
    }

?>