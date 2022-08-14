<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$check_status = "SELECT * FROM services WHERE id='$id'";
$check_status_res = mysqli_query($db_con, $check_status);
$after_assoc = mysqli_fetch_assoc($check_status_res);

if($after_assoc['status'] == 1){
    $active_count = "SELECT COUNT(*) as active_total FROM services WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 3){
        $_SESSION['limit'] = "Minimum 3 Service Need To Active!!";
        header('location:view_service.php');
    }
    else{
        $active_query = "UPDATE services SET status=0 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_service.php');
    }
}
else{
    $active_count = "SELECT COUNT(*) as active_total FROM services WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 6){
        $_SESSION['limit'] = "Maximum 6 Service Can Active!!";
        header('location:view_service.php');
    }
    else{
        $active_query = "UPDATE services SET status=1 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_service.php');
    }

}


?>