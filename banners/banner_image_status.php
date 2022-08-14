<?php
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$active_image_query = "UPDATE banner_images SET status=0";
$active_iamge_query_res = mysqli_query($db_con, $active_image_query);

$active_image_query2 = "UPDATE banner_images SET status=1 WHERE id='$id'";
$active_iamge_query_res2 = mysqli_query($db_con, $active_image_query2);
header('location:view_banner.php');

?>