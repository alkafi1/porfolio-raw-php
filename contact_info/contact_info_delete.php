<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$id_count = "SELECT * FROM contacts_info WHERE id='$id'";
$id_count_res = mysqli_query($db_con, $id_count);
$status = mysqli_fetch_assoc($id_count_res);
if($status['status'] == 1){
  $_SESSION['limit'] = "This info active. You cannot delete it!";
  header('location:view_contact_info.php');
}
else{
    $delete_contact_info_query = "DELETE FROM contacts_info WHERE id='$id' ";
    $delete_contact_info_res = mysqli_query($db_con, $delete_contact_info_query);
    $_SESSION['contact_info_delete'] = "Contact Info Deleted!";
    header('location:view_contact_info.php');
}



?>