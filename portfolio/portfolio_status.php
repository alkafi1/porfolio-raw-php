<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$check_status = "SELECT * FROM pportfolios WHERE id='$id'";
$check_status_res = mysqli_query($db_con, $check_status);
$after_assoc = mysqli_fetch_assoc($check_status_res);

if($after_assoc['status'] == 1){
    $active_count = "SELECT COUNT(*) as active_total FROM pportfolios WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 1){
        $_SESSION['limit'] = "Minimum 1 Icon Porfolio To Active!!";
        header('location:view_portfolio.php');
    }
    else{
        $active_query = "UPDATE pportfolios SET status=0 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_portfolio.php');
    }
}
else{
    $active_count = "SELECT COUNT(*) as active_total FROM pportfolios WHERE status=1";
    $active_count_res = mysqli_query($db_con, $active_count);
    $active_count_assoc = mysqli_fetch_assoc($active_count_res);

    if($active_count_assoc['active_total'] == 6){
        $_SESSION['limit'] = "Maximum 6 Portfolio Can Active!!";
        header('location:view_portfolio.php');
    }
    else{
        $active_query = "UPDATE pportfolios SET status=1 WHERE id='$id'";
        $active_query_res = mysqli_query($db_con, $active_query);
        header('location:view_portfolio.php');
    }

}


?>