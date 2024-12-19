<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the blog post
    $sql = "DELETE FROM events WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: status_of_events.php");
    } else {
        echo "Error deleting event: " . mysqli_error($conn);
    }
} else {
    echo "Invalid event ID";
}

mysqli_close($conn);
?>
