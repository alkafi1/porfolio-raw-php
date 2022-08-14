<?php
session_start();
require '../dashboard_parts/db.php';
$social_icon = $_POST['social_icon'];
$link = $_POST['link'];


    if(empty($social_icon)){
        $_SESSION['null_error'] = "* Please Select Icon First!";
        header('location:add_social_icon.php');
        if(empty($link)){
            $_SESSION['link_error'] = "* Please Enter Link!";
            header('location:add_social_icon.php');
        } 
    }
    elseif(empty($social_icon)){
            $_SESSION['social_icon_error'] = "* Please Select Icon First!";
            header('location:add_social_icon.php');
    }
    elseif(empty($link)){
            $_SESSION['link_error'] = "* Please Enter Link!!";
            header('location:add_social_icon.php');
    }
    else{
        $insert_query = "INSERT INTO social_icons(icon_class, link) VALUES('$social_icon', '$link')";
        $insert_query_res = mysqli_query($db_con, $insert_query);
        
        $_SESSION['social_icon_inserted'] = "Social Icon Insert Successfully!";
        header('location:add_social_icon.php');
    }

?>