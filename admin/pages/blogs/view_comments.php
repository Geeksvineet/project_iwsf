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

// Fetch the comments
$sql = "SELECT id, name, email, message, date_created FROM comments WHERE posts_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Comments</title>
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
                        <h4 class="card-title">Comments</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $serial_no = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $serial_no++ . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['message'] . "</td>";
                                        echo "<td><a href='delete_comment.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No comments found</td></tr>";
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
// $stmt->close();
// $conn->close();
?>
