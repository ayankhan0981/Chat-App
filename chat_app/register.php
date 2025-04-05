<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}
?>