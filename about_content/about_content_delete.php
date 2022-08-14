<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

//image delte 
$select_about_image = "SELECT * FROM about_contents WHERE id= '$id'";
$select_about_image_query = mysqli_query($db_con, $select_about_image);
$after_assoc_about_image = mysqli_fetch_assoc($select_about_image_query);

if($after_assoc_about_image['status'] ==1){
    $_SESSION['limit'] = "This about content active. You cannot delete it!";
    header('location:view_about_content.php');
}
else{
    $select_about_image2 = "SELECT * FROM about_contents WHERE id= '$id'";
    $select_about_image_query2 = mysqli_query($db_con, $select_about_image2);
    $after_assoc_about_image2 = mysqli_fetch_assoc($select_about_image_query2);
    $image_location = "../image/uploads/about_content/".$after_assoc_about_image2['about_image'];
    unlink($image_location);

    $delete_content_query = "DELETE FROM about_contents WHERE id='$id' ";
    $delete_content_res = mysqli_query($db_con, $delete_content_query);
    $_SESSION['about_content_delete'] = "About Content Deleted!";
    header('location:view_about_content.php');
}


?>