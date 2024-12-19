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

    // Delete the cause cause
    $sql = "DELETE FROM causes WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the delete_causes.php page after deletion
        header("Location: status_of_causes.php");
    } else {
        echo "Error deleting cause: " . mysqli_error($conn);
    }
} else {
    echo "Invalid cause ID";
}

mysqli_close($conn);
?>
