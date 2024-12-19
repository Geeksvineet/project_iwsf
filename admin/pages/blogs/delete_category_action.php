<?php
// Include your database connection file
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the category
    $sql = "DELETE FROM category_posts WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: blogs_category_control.php");
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }
} else {
    echo "Invalid category ID";
}

mysqli_close($conn);
?>
