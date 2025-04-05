<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit;

$message = $_POST['message'];
$receiver_id = $_POST['receiver_id'];
$sender_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $sender_id, $receiver_id, $message);
$stmt->execute();
?>