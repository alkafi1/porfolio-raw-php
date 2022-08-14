<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];



//image delte 
$select_image = "SELECT * FROM pportfolios WHERE id= '$id'";
$select_image_query = mysqli_query($db_con, $select_image);
$after_assoc_image = mysqli_fetch_assoc($select_image_query);
if($after_assoc_image['status']==1){
    $_SESSION['limit'] = "This is active. You cannot delete it!";
    header('location:view_portfolio.php');
}
else{
    $select_image2 = "SELECT * FROM pportfolios WHERE id= '$id'";
    $select_image_query2 = mysqli_query($db_con, $select_image2);
    $after_assoc_image2 = mysqli_fetch_assoc($select_image_query2);
    $image_location = "../image/uploads/portfolio/".$after_assoc_image2['image'];
    unlink($image_location);

    $delete_query = "DELETE FROM pportfolios WHERE id='$id' ";
    $delete_res = mysqli_query($db_con, $delete_query);
    $_SESSION['portfolio_delete'] = "Portfolio Deleted!";
    header('location:view_portfolio.php');
}


?>