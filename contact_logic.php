<?php
require 'admin/pages/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into contact_us table
    $sql = "INSERT INTO contact_us (name, email, message, date_created) VALUES ('$name', '$email', '$message', NOW() )";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, popup is already handled by the form
        header("Location: contact.php"); // Redirect to a thank you page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
