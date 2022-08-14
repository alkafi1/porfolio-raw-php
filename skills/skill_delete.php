<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$id_count = "SELECT * FROM skills";
$id_count_res = mysqli_query($db_con, $id_count);
$id_count_num = mysqli_num_rows($id_count_res);
$status = "SELECT COUNT(*) as count FROM skills WHERE id='$id'";
$status_res =mysqli_query($db_con, $status);
$mysqli_fetch_assoc = mysqli_fetch_assoc($status_res);

if($mysqli_fetch_assoc['status']==1){
  $_SESSION['limit'] = "This skill Active. You cannot delete it.";
  echo header('location:view_skill.php');
}
else{

  if($id_count_num == 2){
  $_SESSION['min_2_skil'] = "Default Two Information Needed!";
  header('location:view_skill.php');
  }
  else{
      $delete_skill_query = "DELETE FROM skills WHERE id='$id' ";
      $delete_skill_res = mysqli_query($db_con, $delete_skill_query);
      $_SESSION['skill_delete'] = "Skill Deleted!";
      header('location:view_skill.php');
  }
}






?>