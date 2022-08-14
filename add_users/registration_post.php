<?php
    session_start();
require '../login_check.php';
require('../dashboard_parts/db.php');

  if(isset($_POST['registration'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];
      $profile_photo = $_FILES['profile_photo'];
      $preg_match = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password);
      $password_hash = password_hash($password,PASSWORD_DEFAULT);

      $_SESSION['old_name'] = $name;
      $_SESSION['old_email'] = $email;

      if(empty($name)){
          $_SESSION['name_error'] = "* Please Enter Name";
          header('location:registration.php');
            if(empty($email)){
             $_SESSION['email_error'] = "* Please Enter  Email";
             header('location:registration.php');  
            }
            if(empty($password)){
                    $_SESSION['password_error'] = "* Please Enter Password";
                header('location:registration.php');
            }
            if(empty($profile_photo['name'])){
                $_SESSION['photo_error'] = "* Please Upload Photo";
                header('location:registration.php');
            }
            if(empty($role)){
                $_SESSION['role_error'] = "* Please Select role!";
                header('location:registration.php');
            }
      }
      elseif(empty($email) ){
          $_SESSION['email_error'] = "* Please Enter  Email";
          header('location:registration.php');
      }
      elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $_SESSION['email_error'] = "* Please Enter Valid  Email";
          header('location:registration.php');
      }
      elseif(empty($password)){
          $_SESSION['password_error'] = "* Please Enter Password";
          header('location:registration.php');
      }
      elseif(!$preg_match || strlen($password) < 8){
          $_SESSION['password_error'] = "* Please Enter Valid Password";
          header('location:registration.php');
      }
      elseif(empty($profile_photo['name'])){
          $_SESSION['photo_error'] = "* Please Upload Photo!";
          header('location:registration.php');
      }
      else{
          $email_check = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
          $email_check_query = mysqli_query($db_con,$email_check);
          $after_check = mysqli_fetch_assoc($email_check_query);
          if($after_check['email_exist']){
              $_SESSION['email_exist'] = "Email Already Exist!";
              header('location:registration.php');
          }
          else{
              //image upload
                $profile_photo_name = $profile_photo['name']; 
                $profile_photo_name_explode = explode('.',$profile_photo_name);
                $extention = end($profile_photo_name_explode);
                $allowed_ext = array('jpg','png','jpeg');
                if(in_array($extention, $allowed_ext)){
                    if($profile_photo['size'] <= 1000000){

                        $insert = "INSERT INTO users (name, email, password, role) VALUES('$name','$email','$password_hash',$role) ";
                        $insert_query = mysqli_query($db_con,$insert);

                        $last_id = mysqli_insert_id($db_con);
                        $photo_name = $last_id.'.'.$extention;
                        
                        $new_location = '../image/uploads/users/'.$photo_name;
                        move_uploaded_file($profile_photo['tmp_name'], $new_location);

                        $update_photo = "UPDATE users SET profile_photo ='$photo_name' WHERE id='$last_id'";
                        $update_photo_query = mysqli_query($db_con,$update_photo);
                        

                        $_SESSION['insert_success'] = "Registration Successfull!";
                        unset($_SESSION['old_name']);
                        unset($_SESSION['old_email']);
                        header('location:registration.php');

                    }
                    else{
                        $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                        header('location:registration.php');
                    }
                }
                else{
                    $_SESSION['invalid_ext'] = "Invalid Extention!";
                    header('location:registration.php');
                }

          }
        
      }
      
  }
?>