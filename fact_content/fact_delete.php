<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$fact = "SELECT * FROM facts WHERE id='$id' ";
$fact_res = mysqli_query($db_con, $fact);
$fact_assoc = mysqli_fetch_assoc($fact_res);

if($fact_assoc['status']==1){
    $_SESSION['limit'] = "This is active. You cannot delete it!";
    header('location:view_fact_content.php');
}
else{
    $delete_fact_query = "DELETE FROM facts WHERE id='$id' ";
    $delete_fact_res = mysqli_query($db_con, $delete_fact_query);
    $_SESSION['fact_delete'] = "Fact Deleted!";
    header('location:view_fact_content.php');
}
?>