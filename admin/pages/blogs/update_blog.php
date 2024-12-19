<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch all blogs
$sql = "SELECT posts.id, posts.title, category_posts.name AS category_name FROM posts INNER JOIN category_posts ON posts.category_posts_id = category_posts.id";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Blogs</title>
    <?php
    include("../../partials/link_materials.php");
    ?>
</head>

<body>
    <div class="container-scroller">
        <?php
        include("../../partials/_navbar.php");
        ?>
        <div class="container-fluid page-body-wrapper">
            <?php
            include("../../partials/_sidebar.php");
            ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Blogs</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $row['category_name'] . "</td>";
                                                echo "<td><a href='edit_blog.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit Blog</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No blogs found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include("../../partials/_footer.php");
                ?>
            </div>
        </div>
    </div>
    <?php
    include("../../partials/script_materials.php");
    ?>
</body>

</html>