<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];
$status = "SELECT * FROM services WHERE id='$id'";
$status_res = mysqli_query($db_con, $status);
$status_assoc =mysqli_fetch_assoc($status_res);
if($status_assoc['status'] == 1){
    $_SESSION['limit'] = "This service active. You cannot delete it!";
    header('location:view_service.php');
}
else{
    $delete_service_query = "DELETE FROM services WHERE id='$id' ";
    $delete_service_res = mysqli_query($db_con, $delete_service_query);
    $_SESSION['service_delete'] = "Service Deleted!";
    header('location:view_service.php');
}


?>