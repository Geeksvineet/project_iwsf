<?php
// Include your database connection file
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Get the event ID from the request
$event_id = $_GET['id'];

// Update the event status to published and set the published_date to the current date and time
$query = "UPDATE events SET status = 1, date_published = NOW() WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $event_id);

if ($stmt->execute()) {
    header("Location: status_of_events.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
