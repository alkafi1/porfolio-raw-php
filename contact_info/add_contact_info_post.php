<?php
session_start();
require '../dashboard_parts/db.php';
$address = $_POST['address'];
$number = $_POST['number'];
$email = $_POST['email'];



    if(empty($address)){
        $_SESSION['address_error'] = "* Please Enter Address!";
        header('location:add_contact_info.php');
        if(empty($number)){
            $_SESSION['number_error'] = "* Please Enter number!";
            header('location:add_contact_info.php');
        }
        if(empty($email)){
            $_SESSION['email_error'] = "* Please Enter Email!";
            header('location:add_contact_info.php');
        } 
    }
    elseif(empty($address)){
            $_SESSION['address_error'] = "* Please Enter Address!";
            header('location:add_contact_info.php');
    }
    elseif(empty($number)){
            $_SESSION['number_error'] = "* Please Enter number!";
            header('location:add_contact_info.php');
    }
    elseif(empty($email)){
            $_SESSION['email_error'] = "* Please Enter Email!";
            header('location:add_contact_info.php');
    }
    else{
        $insert_query = "INSERT INTO contacts_info(address, number, email ) VALUES('$address', '$number', '$email')";
        $insert_query_res = mysqli_query($db_con, $insert_query);
        
        $_SESSION['contact_info_inserted'] = "Contact Info Insert Successfully!";
        header('location:add_contact_info.php');
    }

?>