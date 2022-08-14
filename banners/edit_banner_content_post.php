<?php
session_start();
require '../dashboard_parts/db.php';
$id = $_POST['id'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];


$select = "SELECT * FROM banner_contents WHERE id ='$id'";
$select_res = mysqli_query($db_con, $select);
$content_assoc = mysqli_fetch_assoc($select_res);

if(empty($sub_title)){
    $sub_title = $content_assoc['sub_title'];
}
elseif(empty($title)){
    $title = $content_assoc['title'];
}
elseif(empty($desp)){
    $desp = $content_assoc['desp'];
}

else{
    $update = "UPDATE banner_contents SET sub_title = '$sub_title', title = '$title', desp = '$desp'   WHERE id ='$id'";
    $update_res = mysqli_query($db_con, $update);
    $_SESSION['edit_content'] = "Banner Content Update!";
    header('location:banner_edit_content.php?id='.$id);

}
?>