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

// Fetch the blog post
$sql = "SELECT posts.title, posts.description, posts.img_path, posts.date_published, category_posts.name AS category 
        FROM posts 
        LEFT JOIN category_posts ON posts.category_posts_id = category_posts.id 
        WHERE posts.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Blog</title>
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
                            <h2 class="card-title"><?php echo $blog['title']; ?></h2>
                            <p class="text-muted">Published on: <?php echo date("F j, Y", strtotime($blog['date_published'])); ?></p>
                            <?php if (!empty($blog['img_path'])): ?>
                                <img src="<?php echo $blog['img_path']; ?>" alt="Blog Image" class="img-fluid mb-4">
                            <?php endif; ?>
                            <p><?php echo nl2br($blog['description']); ?></p>
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
// $stmt->close();
// $conn->close();
?>