<?php
session_start();
require '../dashboard_parts/db.php';
$service_icon = $_POST['service_icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$_SESSION['service_icon'] = $service_icon;
$_SESSION['desp'] = $desp;
$_SESSION['title'] = $title;


    if(empty($service_icon)){
        $_SESSION['null_error'] = "* Please Select Icon First!";
        header('location:add_service.php');
        if(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_service.php');

            if(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_service.php');
            } 

        } 
    }
    elseif(empty($service_icon)){
            $_SESSION['servicel_icon_error'] = "* Please Select Icon First!";
            header('location:add_service.php');
    }
    elseif(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!!";
            header('location:add_service.php');
    }
    elseif(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_service.php');
    }
    else{
        $insert_query = "INSERT INTO services (icon_class, title, desp) VALUES('$service_icon', '$title', '$desp')";
        $insert_query_res = mysqli_query($db_con, $insert_query);
        unset($_SESSION['service_icon']);
        unset($_SESSION['desp']);
        unset($_SESSION['title']);
        
        $_SESSION['service_inserted'] = "Service Insert Successfully!";
        header('location:add_service.php');
    }

?>