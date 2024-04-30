<?php
// Include connection.php
require_once '../models/connection.php';

// Retrieve sender ID, receiver ID, and message content from POST request
$senderId = $_POST['senderId'];
$receiverId = $_POST['receiverId'];
$content = $_POST['content'];

try {
    // Establish database connection
    $pdo = connection::connect();

    // Prepare SQL statement to insert message
    $sql = "INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$senderId, $receiverId, $content]);

    echo json_encode(array("status" => "success"));
} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => $e->getMessage()));
}
?>