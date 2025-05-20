<?php 
$password="admin";
$hashed_password= password_hash($password, PASSWORD_DEFAULT);

echo "Password yang di hash:". $hashed_password;
?>