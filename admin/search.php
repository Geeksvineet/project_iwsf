<?php
// require 'pages/connection.php'; 

// if(isset($_POST['query']) && isset($_POST['category'])) {
//     $query = $_POST['query'];
//     $category = $_POST['category'];
    
//     switch ($category) {
//         case 'blogs':
//             $sql = "SELECT * FROM posts WHERE title LIKE ? OR description LIKE ?";
//             $stmt = $conn->prepare($sql);
//             $likeQuery = "%".$query."%";
//             $stmt->bind_param("ss", $likeQuery, $likeQuery);
//             break;
//         case 'events':
//             $sql = "SELECT * FROM events WHERE title LIKE ? OR description LIKE ? OR location LIKE ?";
//             $stmt = $conn->prepare($sql);
//             $likeQuery = "%".$query."%";
//             $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
//             break;
//         case 'comments':
//             $sql = "SELECT * FROM comments WHERE name LIKE ? OR message LIKE ?";
//             $stmt = $conn->prepare($sql);
//             $likeQuery = "%".$query."%";
//             $stmt->bind_param("ss", $likeQuery, $likeQuery);
//             break;
//         default:
//             echo "Invalid category selected.";
//             exit;
//     }

//     $stmt->execute();
//     $result = $stmt->get_result();

//     if($result->num_rows > 0) {
//         echo '<ul class="list-group" style="width: 65%;">';
//         while($row = $result->fetch_assoc()) {
//             echo '<li class="list-group-item">' . htmlspecialchars($row['title']) . '</li>'; // Customize this line as per the data you want to show
//         }
//         echo '</ul>';
//     } else {
//         echo '<li class="list-group-item">No results found</li>';
//     }

//     $stmt->close();
// }

session_start();

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include 'pages/connection.php';

if (isset($_POST['query'])) {
    $search = "%{$_POST['query']}%";

    $query = "SELECT id, title, 'blog' AS type FROM posts WHERE title LIKE ? OR description LIKE ?
              UNION
              SELECT id, title, 'event' AS type FROM events WHERE title LIKE ? OR description LIKE ?
              UNION
              SELECT id, title, 'cause' AS type FROM causes WHERE title LIKE ? OR description LIKE ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('ssssss', $search, $search, $search, $search, $search, $search);
        $stmt->execute();
        $stmt->bind_result($id, $title, $type);

        while ($stmt->fetch()) {
            // Determine the correct view page
            // $viewPage = $type === 'blog' ? 'pages/blogs/view_blog.php' : 'pages/events/view_event.php';

            if($type === 'blog') {
                $viewPage = 'pages/blogs/view_blog.php';
            } else {
                if($type === 'event') {
                    $viewPage = 'pages/events/view_event.php';
                }
                else {
                    $viewPage = 'pages/causes/view_cause.php';
                }
            }

            echo "<a href='{$viewPage}?id={$id}' class='list-group-item list-group-item-action'>{$title}</a>";
        }

        $stmt->close();
    }
    $conn->close();
}




?>


