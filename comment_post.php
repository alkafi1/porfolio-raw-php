<?php

require 'dashboard_parts/db.php';

$name =$_POST['name'];
$email =$_POST['email'];
$comment =$_POST['comment'];

$insert_query = "INSERT INTO comments (name, email, comment)VALUES('$name', '$email', '$comment')";
$insert_query_res = mysqli_query($db_con, $insert_query);
header('location:index.php#contact');


?>