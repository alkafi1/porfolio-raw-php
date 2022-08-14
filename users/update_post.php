<?php
session_start();
require('../dashboard_parts/db.php');
    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $preg_match = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password);
        $user_old = "SELECT * FROM users WHERE id='$id'";
        $user_old_query = mysqli_query($db_con,$user_old);
        $user = mysqli_fetch_assoc($user_old_query);
        if(empty($name)){
            $name = $user['name'];
        }
        if(empty($email)){
            $email = $user['email'];
        }
        if(empty($password)){

            if($_FILES['profile_photo']['name'] != ''){
                
                $profile_photo = $_FILES['profile_photo'];
                $profile_photo_name = $profile_photo['name']; 
                $profile_photo_name_explode = explode('.',$profile_photo_name);
                $extention = end($profile_photo_name_explode);
                $allowed_ext = array('jpg','png','jpeg');
                if(in_array($extention, $allowed_ext)){
                    if($profile_photo['size'] <= 100000000000000){

                        $select_photo = "SELECT * FROM users WHERE id = '$id'";
                        $select_photo_query = mysqli_query($db_con, $select_photo);
                        $photo_assoc = mysqli_fetch_assoc($select_photo_query);

                        $location_photo = '../image/uploads/users/'.$photo_assoc['profile_photo'];
                        unlink($location_photo);

                        $update = "UPDATE users SET name='$name', email='$email' WHERE id='$id' ";
                        $update_res = mysqli_query($db_con, $update);

                        $photo_name = $id.'.'.$extention;
                        $new_location = '../image/uploads/users/'.$photo_name;
                        move_uploaded_file($profile_photo['tmp_name'], $new_location);

                        $update_photo = "UPDATE users SET profile_photo='$photo_name' WHERE id='$id'";
                        $update_photo_query = mysqli_query($db_con,$update_photo);
                        $_SESSION['update_success'] = "User update Successfull.";
                        header('location:users.php');

                    }
                    else{
                        $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                        header('location:update.php');
                    }
                }
                else{
                    $_SESSION['invalid_ext'] = "Invalid Extention!";
                    header('location:update.php');
                }

            }
            else{
                $update = "UPDATE users SET name='$name', email='$email' WHERE id='$id' ";
                $update_res = mysqli_query($db_con, $update);
                $_SESSION['update_success'] = "User update Successfull.";
                header('location:users.php');
            }

        }
        else{
            if(strlen($password)<8){
                $_SESSION['password_error'] = "Password Must Be 8 Characters";
                header('location:update.php?id='.$id);
            }
            elseif(!$preg_match){
                $_SESSION['password_error'] = "Password must include at one number,one capital and smalll letter";
                header('location:update.php?id='.$id);
            }
            else{

                    if($_FILES['profile_photo']['name'] != ''){
                    
                    $profile_photo = $_FILES['profile_photo'];
                    $profile_photo_name = $profile_photo['name']; 
                    $profile_photo_name_explode = explode('.',$profile_photo_name);
                    $extention = end($profile_photo_name_explode);
                    $allowed_ext = array('jpg','png','jpeg');

                    if(in_array($extention, $allowed_ext)){

                        if($profile_photo['size'] <= 100000000000000){

                            $select_photo = "SELECT * FROM users WHERE id = '$id'";
                            $select_photo_query = mysqli_query($db_con, $select_photo);
                            $photo_assoc = mysqli_fetch_assoc($select_photo_query);

                            $location_photo = '../image/uploads/users/'.$photo_assoc['profile_photo'];
                            unlink($location_photo);

                            $update = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id='$id' ";
                            $update_res = mysqli_query($db_con, $update);

                            $photo_name = $id.'.'.$extention;
                            $new_location = '../image/uploads/users/'.$photo_name;
                            move_uploaded_file($profile_photo['tmp_name'], $new_location);

                            $update_photo = "UPDATE users SET profile_photo='$photo_name' WHERE id='$id'";
                            $update_photo_query = mysqli_query($db_con,$update_photo);
                            $_SESSION['update_success'] = "User update Successfull.";
                            header('location:users.php');

                        }
                        else{
                            $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                            header('location:update.php');
                        }
                    }
                    else{
                        $_SESSION['invalid_ext'] = "Invalid Extention!";
                        header('location:update.php');
                    }

                }
                else{
                    $update = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id='$id' ";
                    $update_res = mysqli_query($db_con, $update);
                    $_SESSION['update_success'] = "User update Successfull.";
                    header('location:users.php');
                }
            }
        }

?>