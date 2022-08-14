<?php
require '../dashboard_parts/db.php';

$id = $_GET['id'];

//image delte 
$select_image = "SELECT * FROM feedbacks WHERE id= '$id'";
$select_image_query = mysqli_query($db_con, $select_image);
$after_assoc_image = mysqli_fetch_assoc($select_image_query);
$image_location = "../image/uploads/feedback/".$after_assoc_image['image'];
unlink($image_location);

$delete_query = "DELETE FROM feedbacks WHERE id='$id' ";
$delete_res = mysqli_query($db_con, $delete_query);
$_SESSION['feedback_delete'] = "Feedback Deleted!";
header('location:view_feedback.php');

?>