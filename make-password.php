<?php
// The password to hash
$password = '123456';

// Hash the password using bcrypt
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Output the hashed password
echo $hashed_password;
?>