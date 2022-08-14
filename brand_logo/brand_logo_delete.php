<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];
$select_logo = "SELECT * FROM brands_logo WHERE id = '$id'";
$select_logo_query = mysqli_query($db_con, $select_logo);
$logo_assoc = mysqli_fetch_assoc($select_logo_query);
if($logo_assoc['status']){
    $_SESSION['limit'] = "This service active. You cannot delete it!";
    header('location:view_brand_logo.php');
}
else{
    $location_logo = '../image/uploads/brands_logo/'.$logo_assoc['brands_logo'];
    unlink($location_logo);

    $delete_data = "DELETE FROM brands_logo WHERE id= '$id'";
    $delete_data_res = mysqli_query($db_con, $delete_data);

    $_SESSION['barnd_logo_delete'] = "Brand Logo Deleted!";
    header('location:view_brand_logo.php');
}




?>