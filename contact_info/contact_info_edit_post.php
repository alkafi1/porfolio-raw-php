<?php
session_start();
require '../dashboard_parts/db.php'; 

$id= $_POST['id'];
$address= $_POST['address'];
$number = $_POST['number'];
$email = $_POST['email'];


$old_contact_info = "SELECT * FROM contacts_info WHERE id='$id'";
$old_contact_info_query = mysqli_query($db_con , $old_contact_info);
$old_contact_assoc = mysqli_fetch_assoc($old_contact_info_query);

if(empty($address)){
    $address = $old_contact_assoc['address'];
}
elseif(empty($number)){
    $number = $old_contact_assoc['number'];
}
elseif(empty($email)){
    $number = $old_contact_assoc['email'];
}
else{
    $update_contact_info = "UPDATE contacts_info SET address = '$address', number = '$number', email = '$email' WHERE id='$id'";
    $update_contact_info_query = mysqli_query($db_con, $update_contact_info);
    $_SESSION['contact_info_edited'] = "Contact Info Edited!";
    header('location:contact_info_edit.php?id='.$id);
}

?>