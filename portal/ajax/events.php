<?php
// Include the database connection file
include('../models/connection.php');

// Establish a database connection
$connection = connection::connect();

// Fetch events from the database
$events = array();

// Check if the connection is successful
if ($connection) {
    try {
        // Prepare the SQL statement
        $stmt = $connection->prepare("SELECT * FROM class_routine");

        // Execute the statement
        $stmt->execute();

        // Fetch all rows as an associative array
        $classRoutineEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format events for FullCalendar
        foreach ($classRoutineEvents as $event) {
            // Format each event
            $events[] = array(
                'title' => 'Group ' . $event['class_id'] . ': Activity: ' . $event['subject_id'],
                'start' => $event['time_start'], // Example start time
                'end' => $event['time_end'],     // Example end time
                'daysOfWeek' => [intval($event['day'])] // Convert day to an integer array
            );
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Failed to connect to the database.";
}

// Output events in JSON format
header('Content-Type: application/json');
echo json_encode($events);
?>
