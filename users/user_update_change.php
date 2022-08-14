<?php
session_start();
require('../dashboard_parts/db.php');
    
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $query = mysqli_query($db_con,$sql);
        $user = mysqli_fetch_assoc($query); 
        
        if($user['status'] == 0){
            $sql = "UPDATE users SET status=1 WHERE id=$id";
            $sql_res = mysqli_query($db_con,$sql);
            $_SESSION['trash'] = "User Move Trashed Successfully.";
            header('location:users.php');
        }
        else{
            $sql = "UPDATE users SET status=0 WHERE id=$id";
            $sql_res = mysqli_query($db_con,$sql);
            $_SESSION['restore'] = "User Restore Succesfully!";
            header('location:users.php');
        }
    

?>