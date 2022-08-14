<?php
session_start();
require 'dashboard_parts/db.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $_SESSION['old_email'] = $email;

    
    
    if(!empty($email)){
        $_SESSION['email_empty'] = "Input Password";
        header('location:login.php');

        $check_email = "SELECT COUNT(*) as email_exist, id, name , profile_photo FROM users WHERE email='$email'";
        $check_email_query = mysqli_query($db_con,$check_email);
        $check_email_assoc = mysqli_fetch_assoc($check_email_query);
        
        if(empty($password)){
            $_SESSION['password_empty'] = "Input Password";
            header('location:login.php');
        }
        
        elseif($check_email_assoc['email_exist'] == 1){
            $check_email2 = "SELECT * FROM users WHERE email='$email'";
            $check_email_query2 = mysqli_query($db_con,$check_email2);
            $check_email_assoc2 = mysqli_fetch_assoc($check_email_query2);
            
            if(password_verify($password, $check_email_assoc2['password'])){
                $_SESSION['login_confirm'] = "Login Confirm";
                $_SESSION['login_msg'] = "Login Successfully!";
                $_SESSION['id'] = $check_email_assoc['id'];
                header('location:users/users.php');
            }
            else{
                $_SESSION['password_wrong'] = 'Wrong Password!';
                header('location:login.php');
            }
        }
        else{
            $_SESSION['email_wrong'] = "Your Email Does'nt Exist";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['empty_email'] = "Please Enter Email!";
        header('location:login.php');
        
    }




?>