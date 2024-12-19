<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Get the comment ID from the URL
$comment_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Delete the comment
$sql = "DELETE FROM comments WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $comment_id);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the comments page
header("Location: view_comments.php?id=" . $_GET['post_id']);
exit();
?>