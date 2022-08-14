<?php
session_start();
require '../dashboard_parts/db.php';

 $id = $_GET['id'];

 $select_photo = "SELECT * FROM users WHERE id = '$id'";
 $select_photo_query = mysqli_query($db_con, $select_photo);
 $photo_assoc = mysqli_fetch_assoc($select_photo_query);
 $location_photo = 'image/uploads/users/'.$photo_assoc['profile_photo'];
 unlink($location_photo);


 $delete_query = "DELETE FROM users WHERE id='$id'";
 $delete_query_result = mysqli_query($db_con,$delete_query);
 $_SESSION['delete'] = "User permanently delete!";
 header('location:users.php');
?>