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
    $sql = "DELETE FROM contact_us WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the delete_blogs.php page after deletion
        header("Location: see_all_contact.php");
    } else {
        echo "Error deleting contact: " . mysqli_error($conn);
    }
} else {
    echo "Invalid contact ID";
}

mysqli_close($conn);
?>
