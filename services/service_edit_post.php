<?php
session_start();
require '../dashboard_parts/db.php';
 $id = $_POST['id'];
$service_icon = $_POST['service_icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$select_service = "SELECT * FROM services WHERE id='$id'";
$select_service_res = mysqli_query($db_con, $select_service);
$select_service_assoc = mysqli_fetch_assoc($select_service_res);

if(empty($service_icon)){
    $service_icon = $select_service_assoc['icon_class'];
}
elseif(empty($title)){
    $tilte = $select_service_assoc['title'];
}
elseif(empty($desp)){
    $desp = $select_service_assoc['desp'];
}
else{
    $update = "UPDATE services SET icon_class = '$service_icon', title = '$title', desp = '$desp' WHERE id='$id'";
    $update_res= mysqli_query($db_con, $update);
    $_SESSION['service_update'] = "Service updated!";
    header('location:service_edit.php?id='.$id);
}




?>