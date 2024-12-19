<?php

include '../pages/connection.php';

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
                $viewPage = '../blogs/view_blog.php';
            } else {
                if($type === 'event') {
                    $viewPage = '../events/view_event.php';
                }
                else {
                    $viewPage = '../causes/view_cause.php';
                }
            }

            echo "<a href='{$viewPage}?id={$id}' class='list-group-item list-group-item-action'>{$title}</a>";
        }

        $stmt->close();
    }
    $conn->close();
}




?>


