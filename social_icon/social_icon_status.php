<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$check_status = "SELECT * FROM social_icons WHERE id='$id'";
$check_status_res = mysqli_query($db_con, $check_status);
$after_assoc = mysqli_fetch_assoc($check_status_res);

if($after_assoc['status'] == 1){
    $active_count = "SELECT COUNT(*) as active_total FROM social_icons WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 2){
        $_SESSION['limit'] = "Minimum 2 Icon Need To Active!!";
        header('location:view_social_icon.php');
    }
    else{
        $active_query = "UPDATE social_icons SET status=0 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_social_icon.php');
    }
}
else{
    $active_count = "SELECT COUNT(*) as active_total FROM social_icons WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 4){
        $_SESSION['limit'] = "Maximum 4 icon Can Active!!";
        header('location:view_social_icon.php');
    }
    else{
        $active_query = "UPDATE social_icons SET status=1 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_social_icon.php');
    }

}


?>