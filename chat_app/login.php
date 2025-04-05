<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed);
$stmt->fetch();

if ($stmt->num_rows > 0 && password_verify($password, $hashed)) {
    $_SESSION['user_id'] = $id;
    echo "success";
} else {
    echo "error";
}
?>