<?php
session_start();
require '../dashboard_parts/db.php';
$id = $_POST['id'];
$banner_image = $_FILES['banner_image'];


if(!empty($banner_image['name'])){
    $image_name = $banner_image['name'];
    $explode = explode('.', $image_name);
    $ext = end($explode);
    $new_image_name = $id.'.'.$ext;
    $allow_ext = array('png','jpg', 'jpeg');
    if(in_array($ext,$allow_ext)){
        if($banner_image['size'] <20000000000){

            $select = "SELECT * FROM banner_images WHERE id ='$id'";
            $select_res = mysqli_query($db_con, $select);
            $image_assoc = mysqli_fetch_assoc($select_res);
            

            $old_image_location = "../image/uploads/banners/".$image_assoc['banner_image'];
            unlink($old_image_location);

            $location = "../image/uploads/banners/".$new_image_name;
            move_uploaded_file($banner_image['tmp_name'], $location);

            $update = "UPDATE banner_images SET banner_image = '$new_image_name'";
            $update_res = mysqli_query($db_con, $update);

            $_SESSION['update_banner_image'] = "Banner Image Update!";
            header('location:banner_edit_image.php?id='.$id);


    
        }
        else{
            $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
            header('location:banner_edit_image.php?id='.$id);
        }
    }
    else{
         $_SESSION['invalid_ext'] = "Invalid Extention!";
         header('location:banner_edit_image.php?id='.$id);
    }
    
}
else{
    $_SESSION['null'] = "Please upload image!";
    header('location:banner_edit_image.php?id='.$id);
    
}
?>