<?php
// Include the PHP file that contains database connection and message-related functions
include '../controllers/message.controller.php';

// Retrieve sender and receiver IDs from URL parameters
$senderId = $_GET['sender_id'];
$receiverId = $_GET['receiver_id'];

// Fetch messages from the database for the specific sender and receiver
$messages = getMessages($senderId, $receiverId);

// Display messages
foreach ($messages as $message) {
    // Determine the message alignment based on the sender
    $messageAlignmentClass = ($message['sender_id'] == $senderId ? 'right' : 'left');

    // Output the message container with the appropriate alignment
    echo '<div class="direct-chat-msg ' . $messageAlignmentClass . '">';
    echo '<div class="direct-chat-infos clearfix">';
    echo '<span class="direct-chat-name float-' . $messageAlignmentClass . '">' . ($message['sender_id'] == $senderId ? 'You' : 'Other User') . '</span>';
    echo '<span class="direct-chat-timestamp float-' . ($messageAlignmentClass == 'right' ? 'left' : 'right') . '">' . $message['timestamp'] . '</span>';
    echo '</div>';
    // Apply a flexible width to the message container
    echo '<div class="direct-chat-text">' . $message['content'] . '</div>';
    echo '</div>';
}
