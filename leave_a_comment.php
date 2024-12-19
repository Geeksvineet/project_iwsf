<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commenter_name = $_POST['commenter_name'];
    $commenter_email = $_POST['commenter_email'];
    $commenter_posts_id = $_POST['commenter_posts_id'];
    $comment_text = $_POST['comment_text'];

    require 'admin/pages/connection.php';

    // Insert comment into database
    $stmt = $conn->prepare("INSERT INTO comments (name, email, message, date_created, posts_id) VALUES (?, ?, ?, NOW(), ?)");
    $stmt->bind_param("ssss", $commenter_name, $commenter_email, $comment_text, $commenter_posts_id);
    
    if ($stmt->execute()) {
        // Redirect to the same page to avoid form resubmission
        header("Location: blog-single.php?id=" . $commenter_posts_id . "#comments_area");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
