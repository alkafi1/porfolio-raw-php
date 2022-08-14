<?php
session_start();
require '../dashboard_parts/db.php';
$fact_icon = $_POST['fact_icon'];
$fact_number = $_POST['count_number'];
$fact_desp = $_POST['fact_desp'];


    if(empty($fact_icon)){
        $_SESSION['null_error'] = "* Please Select Icon First!";
        header('location:add_fact_content.php');
        if(empty($fact_number)){
            $_SESSION['fact_number_error'] = "* Please Enter Number!";
            header('location:add_fact_content.php');

            if(empty($fact_desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_fact_content.php');
            } 

        } 
    }
    elseif(empty($fact_icon)){
            $_SESSION['servicel_icon_error'] = "* Please Select Icon First!";
            header('location:add_fact_content.php');
    }
    elseif(empty($fact_number)){
            $_SESSION['fact_number_error'] = "* Please Enter Number!";
            header('location:add_fact_content.php');
    }
    elseif(empty($fact_desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_fact_content.php');
    }
    else{
        $insert_query = "INSERT INTO facts (icon_class, fact_count_number, fact_desp) VALUES('$fact_icon', '$fact_number', '$fact_desp')";
        $insert_query_res = mysqli_query($db_con, $insert_query);
        
        $_SESSION['fact_inserted'] = "Fact Insert Successfully!";
        header('location:add_fact_content.php');
    }

?>