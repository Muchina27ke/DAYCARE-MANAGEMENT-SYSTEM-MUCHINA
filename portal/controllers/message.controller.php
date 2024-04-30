<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swiss_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch messages from the database
function getMessages($senderId, $receiverId) {
    global $conn;
    $messages = array();

    $sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $senderId, $receiverId, $receiverId, $senderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    return $messages;
}



// Function to insert a new message into the database
function sendMessage($sender_id, $receiver_id, $content) {
    global $conn;

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)");

    if (!$stmt) {
        // Handle the error if preparing the statement fails
        echo "Error preparing statement: " . $conn->error;
        return;
    }

    // Bind parameters
    $stmt->bind_param("sss", $sender_id, $receiver_id, $content);

    // Execute the statement
    if (!$stmt->execute()) {
        // Handle the error if executing the statement fails
        echo "Error executing statement: " . $stmt->error;
    } else {
        echo "Message sent successfully!";
    }

    // Close statement
    $stmt->close();
}



?>
