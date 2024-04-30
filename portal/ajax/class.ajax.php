<?php
require_once '../models/connection.php'; // Include the file containing the connection class

$pdo = connection::connect();


// Assuming you have already established a database connection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Perform deletion query
    $sql = "DELETE FROM class WHERE class_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Check if deletion was successful
    if ($stmt->rowCount() > 0) {
        echo json_encode(array("success" => true, "message" => "Group deleted successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Unable to delete the group"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
