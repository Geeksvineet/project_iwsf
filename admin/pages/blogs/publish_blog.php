<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Get the blog ID from the URL
$blog_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Update the blog status to published
$sql = "UPDATE posts SET status = 1, date_published = NOW() WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the status of blogs page
header("Location: status_of_blogs.php");
exit();
?>
