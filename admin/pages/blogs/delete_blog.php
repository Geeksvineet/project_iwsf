<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch all blog posts
$sql = "SELECT posts.id, posts.title, category_posts.name as category 
        FROM posts 
        INNER JOIN category_posts ON posts.category_posts_id = category_posts.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Blogs</title>
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
                            <h2 class="text-dark font-weight-bold mb-2 card-title">Delete Blogs</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td><a href='delete_blog_action.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete Blog</a></td>";
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