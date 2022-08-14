<?php
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$active_logo_query = "UPDATE logo SET status=0";
$active_logo_query_res = mysqli_query($db_con, $active_logo_query);

$active_logo_query2 = "UPDATE logo SET status=1 WHERE id='$id'";
$active_logo_query_res2 = mysqli_query($db_con, $active_logo_query2);
header('location:view_logo.php');

?>