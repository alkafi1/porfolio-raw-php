<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];


$select_logo = "SELECT * FROM logo WHERE id = '$id'";
$select_logo_query = mysqli_query($db_con, $select_logo);
$logo_assoc = mysqli_fetch_assoc($select_logo_query);

if($logo_assoc['status']==1){
    $_SESSION['limit'] = "This logo active. You cannot Delete it!";
    header('location:view_logo.php');
}
else{
    $location_logo = '../image/uploads/logo/'.$logo_assoc['logo'];
    unlink($location_logo);

    $delete_data = "DELETE FROM logo WHERE id= '$id'";
    $delete_data_res = mysqli_query($db_con, $delete_data);

    $_SESSION['logo_delete'] = "Logo Deleted!";
    header('location:view_logo.php');
}



?>