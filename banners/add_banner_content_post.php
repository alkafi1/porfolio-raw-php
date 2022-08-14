<?php
session_start();
require '../dashboard_parts/db.php';
$sub_title = mysqli_real_escape_string($db_con,$_POST['sub_title']);
$title = mysqli_real_escape_string($db_con,$_POST['title']);
$desp = mysqli_real_escape_string($db_con,$_POST['desp']);
$_SESSION['old_sub_title'] = $sub_title;
$_SESSION['old_title'] = $title;
$_SESSION['old_desp'] = $desp;

    if(empty($sub_title)){
        $_SESSION['null_error'] = "* Please Enter Sub Title!";
        header('location:add_banner.php');
        if(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_banner.php');
        }
        if(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Desription!";
            header('location:add_banner.php');
        }
        
    }
    elseif(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_banner.php');
    }
    elseif(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Desription!";
            header('location:add_banner.php');
    }
    else{
        
        $insert_query = "INSERT INTO banner_contents(sub_title, title, desp)VALUES('$sub_title', '$title', '$desp')";
        $insert_query_res = mysqli_query($db_con, $insert_query) or mysqli_error($db_con);
        
        unset($_SESSION['old_sub_title']);
        unset($_SESSION['old_title']);
        unset($_SESSION['old_desp']);
        
        $_SESSION['banner_content_inserted'] = "Banner Content Insert Successfully!";
        header('location:add_banner.php');
    }

?>