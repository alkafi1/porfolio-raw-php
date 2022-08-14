<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];
$check_status = "SELECT * FROM banner_contents WHERE id='$id'";
$check_status_res = mysqli_query($db_con, $check_status);
$check_status_assoc = mysqli_fetch_assoc($check_status_res);
if($check_status_assoc['status'] == 1){
    $_SESSION['active_error'] = "This Content Active. You cant delete it!";
    header('location:view_banner.php');
}else{
    $delete_content_query = "DELETE FROM banner_contents WHERE id='$id' ";
    $delete_content_res = mysqli_query($db_con, $delete_content_query);
    $_SESSION['content_delete'] = "Banner Content Deleted!";
    header('location:view_banner.php');
}



?>