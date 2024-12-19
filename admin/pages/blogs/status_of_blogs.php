<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch all blogs
$sql = "SELECT posts.id, posts.title, posts.status, category_posts.name AS category 
        FROM posts 
        LEFT JOIN category_posts ON posts.category_posts_id = category_posts.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Status of Blogs</title>
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
                            <h4 class="card-title">Status of Blogs</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            $serial_no = 1;
                                            // $serial_no++
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $serial_no++ . "</td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $row['category'] . "</td>";
                                                echo "<td>" . ($row['status'] == 1 ? 'Published' : 'Unpublished') . "</td>";
                                                echo "<td>";
                                                if ($row['status'] == 0) {
                                                    echo "<a href='publish_blog.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Publish</a>";
                                                } else {
                                                    echo "<a href='view_blog.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>View</a>";
                                                }
                                                echo "<td><a href='delete_blog_action.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                                                echo "<td><a href='edit_blog.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No blogs found</td></tr>";
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

<?php
$conn->close();
?>