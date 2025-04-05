<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit;

$result = $conn->query("SELECT id, username FROM users WHERE id != " . $_SESSION['user_id']);
while ($row = $result->fetch_assoc()) {
    echo "<div onclick='selectReceiver(" . $row['id'] . ")'>" . htmlspecialchars($row['username']) . "</div>";
}
?>