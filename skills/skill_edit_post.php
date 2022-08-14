<?php
session_start();
require '../dashboard_parts/db.php'; 

$id= $_POST['id'];
$title = $_POST['title'];
$desp = $_POST['desp'];
$parcentage = $_POST['parcentage'];


$old_skill = "SELECT * FROM skills WHERE id='$id'";
$old_skill_query = mysqli_query($db_con , $old_skill);
$old_skill_assoc = mysqli_fetch_assoc($old_skill_query);

if(empty($title)){
    $title = $old_skill_assoc['title'];
    header('location:skill_edit.php?id='.$id);
}
elseif(empty($desp)){
    $desp = $old_skill_assoc['desp'];
    header('location:skill_edit.php?id='.$id);
}
elseif(empty($parcentage)){
    $parcentage = $old_skill_assoc['parcentage'];
    header('location:skill_edit.php?id='.$id);
}
else{
    $update_contact_info = "UPDATE skills SET title = '$title', desp = '$desp', parcentage = '$parcentage' WHERE id='$id'";
    $update_contact_info_query = mysqli_query($db_con, $update_contact_info);
    $_SESSION['skil_edited'] = "Skill Edited!";
    header('location:skill_edit.php?id='.$id);
}

?>