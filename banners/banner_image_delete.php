<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];
$select_banner_image = "SELECT * FROM banner_images WHERE id = '$id'";
$select_banner_image_query = mysqli_query($db_con, $select_banner_image);
$banner_image_assoc = mysqli_fetch_assoc($select_banner_image_query);
if($banner_image_assoc['status'] == 1){
    $_SESSION['active_error'] = "This Image Active. You cant delete it.";
    
   echo header('location:view_banner.php');
    
}
else{
    $location_photo = '../image/uploads/banners/'.$banner_image_assoc['banner_image'];
    unlink($location_photo);

    $delete_data = "DELETE FROM banner_images WHERE id= '$id'";
    $delete_data_res = mysqli_query($db_con, $delete_data);

    $_SESSION['image_delete'] = "Banner Image Deleted!";
    header('location:view_banner.php');

}


?>