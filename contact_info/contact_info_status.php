<?php
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$active_query = "UPDATE contacts_info SET status=0";
$active_query_res = mysqli_query($db_con, $active_query);

$active_query2 = "UPDATE contacts_info SET status=1 WHERE id='$id'";
$active_query_res2 = mysqli_query($db_con, $active_query2);
header('location:view_contact_info.php');

?>