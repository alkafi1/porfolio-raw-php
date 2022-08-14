<?php
session_start();
require '../dashboard_parts/db.php';
$id =$_POST['id'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];
$about_image = $_FILES['about_image'];
$select_about_content = "SELECT * FROM about_contents WHERE id='$id'";
$select_about_content_res = mysqli_query($db_con, $select_about_content);
$about_content_assoc = mysqli_fetch_assoc($select_about_content_res);

    if(empty($sub_title)){
        $sub_title = $about_content_assoc['sub_title'];
    }
    elseif(empty($title)){
            $title = $about_content_assoc['title'];
    }
    elseif(empty($desp)){
            $desp = $about_content_assoc['desp'];
    }
    elseif(empty($about_image['name'])){
            $update = "UPDATE about_contents SET sub_title='$sub_title', title ='$title',desp ='$desp' WHERE id='$id'";
            $update_res = mysqli_query($db_con, $update);
            $_SESSION['about_content_update'] = "About Content Updtaed!";
            header('location:about_content_edit.php?id='.$id);
    }
    else{
        
        $name_exp = explode('.',$about_image['name']);
        $extention = end($name_exp);
        $allow_extention = array('jpg','png','jpeg');
        if(in_array($extention, $allow_extention)){
            if($about_image['size'] <10000000000000){
                //image unlin
                $old_image_location = '../image/uploads/about_content/'.$about_content_assoc['about_image'];
                unlink($old_image_location);

                $update = "UPDATE about_contents SET sub_title='$sub_title', title ='$title',desp ='$desp' WHERE id='$id'";
                $update_res = mysqli_query($db_con, $update);

                
                $about_image_name = $id.'.'.$extention;

                $upload_loaction = '../image/uploads/about_content/'.$about_image_name;
                move_uploaded_file($about_image['tmp_name'], $upload_loaction);

                $update_image = "UPDATE about_contents SET about_image='$about_image_name' WHERE id='$id'";
                $update_image_query = mysqli_query($db_con, $update_image);

                $_SESSION['about_content_update'] = "About Content Updtaed!";
                header('location:about_content_edit.php?id='.$id);

            }
            else{
                $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
                header('location:about_content_edit.php?id='.$id);
            }
        } 
        else{
            $_SESSION['invalid_ext'] = "Invalid Extention!";
            header('location:about_content_edit.php?id='.$id);
        }
    }

?>

