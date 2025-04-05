<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit;

$receiver_id = $_GET['receiver_id'];
$sender_id = $_SESSION['user_id'];

$result = $conn->query("SELECT u.username, m.message FROM messages m 
                        JOIN users u ON m.sender_id = u.id 
                        WHERE (m.sender_id = $sender_id AND m.receiver_id = $receiver_id) 
                        OR (m.sender_id = $receiver_id AND m.receiver_id = $sender_id) 
                        ORDER BY m.timestamp ASC");

while ($row = $result->fetch_assoc()) {
    echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . "</p>";
}
?>