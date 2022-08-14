<?php
session_start();
require '../dashboard_parts/db.php';
$id= $_POST['id'];
$category = $_POST['category'];
$title = $_POST['title'];
$image = $_FILES['image'];

$select_portfolios = "SELECT * FROM pportfolios WHERE id='$id'";
$select_portfolios_res = mysqli_query($db_con, $select_portfolios);
$select_portfolios_assoc = mysqli_fetch_assoc($select_portfolios_res);

if(empty($category)){
    $category = $select_portfolios_assoc['category'];
}
elseif(empty($title)){
        $title = $select_portfolios_assoc['title'];
}
elseif(empty($image['name'])){
        $update = "UPDATE pportfolios SET category='$category', title ='$title' WHERE id='$id'";
        $update_res = mysqli_query($db_con, $update);
        $_SESSION['portfolio_update'] = "Porfolio Updtaed!";
        header('location:portfolio_edit.php?id='.$id);
}
else{
    
    $name_exp = explode('.',$image['name']);
    $extention = end($name_exp);
    $allow_extention = array('jpg','png','jpeg');
    if(in_array($extention, $allow_extention)){
        if($image['size'] <10000000000000){
            $update = "UPDATE pportfolios SET category='$category', title ='$title' WHERE id='$id'";
            $update_res = mysqli_query($db_con, $update);

            $select_portfolios2 = "SELECT * FROM pportfolios WHERE id='$id'";
            $select_portfolios_res2 = mysqli_query($db_con, $select_portfolios2);
            $select_portfolios_assoc2 = mysqli_fetch_assoc($select_portfolios_res2);
            //image unlin
            $old_image_location = '../image/uploads/porfolio/'.$select_portfolios_assoc2['image'];
            unlink($old_image_location);

            $image_name = $id.'.'.$extention;

            $upload_loaction = '../image/uploads/about_content/'.$image_name;
            move_uploaded_file($image['tmp_name'], $upload_loaction);

            $update_image = "UPDATE about_contents SET about_image='$about_image_name' WHERE id='$id'";
            $update_image_query = mysqli_query($db_con, $update_image);

            $_SESSION['portfolio_update'] = "Portfolio Updtaed!";
            header('location:portfolio_edit.php?id='.$id);

        }
        else{
            $_SESSION['invalid_size'] = "Upload image max size 1 Mb!";
            header('location:portfolio_edit.php?id='.$id);
        }
    } 
    else{
        $_SESSION['invalid_ext'] = "Invalid Extention!";
        header('location:portfolio_edit.php?id='.$id);
    }
}


?>