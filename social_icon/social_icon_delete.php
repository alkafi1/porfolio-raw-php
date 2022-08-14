<?php
session_start();
require '../dashboard_parts/db.php';

$id = $_GET['id'];

$row_count = "SELECT * FROM social_icons";
$row_count_res = mysqli_query($db_con, $row_count);
$row = mysqli_num_rows($row_count_res); 
$status_count = "SELECT * FROM social_icons WHERE status=1 and id='$id'";
$status_count_res = mysqli_query($db_con,$status_count);
$status_assoc = mysqli_fetch_assoc($status_count_res);
if($status_assoc['status'] == 1){
        $_SESSION['limit'] = "This icon active. You cannot delete it!";
        header('location:view_social_icon.php');
    }
    else{
        if($row == 3){
            $_SESSION['limit'] = "Atleast 3 icon needed!";
            header('location:view_social_icon.php');
        }
        else{
            $delete_social_icon_query = "DELETE FROM social_icons WHERE id='$id' ";
            $delete_social_icon_res = mysqli_query($db_con, $delete_social_icon_query);
            $_SESSION['social_icon_delete'] = "Social Icon Deleted!";
            header('location:view_social_icon.php');
        }
        
    }

?>