<?php
session_start();
require '../dashboard_parts/db.php';
$title = $_POST['title'];
$desp = $_POST['desp'];
$parcentage = $_POST['parcentage'];

$_SESSION['old_title'] = $title;
$_SESSION['old_desp'] = $desp;
$_SESSION['old_parcentage'] = $parcentage;



    if(empty($title)){
        $_SESSION['title_error'] = "* Please Enter Title!";
        header('location:add_skill.php');
        if(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_skill.php');
        }
        if(empty($parcentage)){
            $_SESSION['parcentage_error'] = "* Please Enter Skill Parcentage!";
            header('location:add_skill.php');
        } 
    }
    elseif(empty($title)){
            $_SESSION['title_error'] = "* Please Enter Title!";
            header('location:add_skill.php');
    }
    elseif(empty($desp)){
            $_SESSION['desp_error'] = "* Please Enter Description!";
            header('location:add_skill.php');
    }
    elseif(empty($parcentage)){
            $_SESSION['parcentage_error'] = "* Please Enter Skill Parcentage!";
            header('location:add_skill.php');
    }
    else{
        $insert_query = "INSERT INTO skills(title, desp, parcentage ) VALUES('$title', '$desp', '$parcentage')";
        $insert_query_res = mysqli_query($db_con, $insert_query);
        unset($_SESSION['old_title']);
        unset($_SESSION['old_desp']);
        unset($_SESSION['old_parcentage']);
        
        $_SESSION['skill_inserted'] = "Skill Insert Successfully!";
        header('location:add_skill.php');
    }

?>