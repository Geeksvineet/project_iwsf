<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch the blog details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM volunteers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['name'];
    $description = $_POST['designation'];

    // Handle file upload
    $img_path = $blog['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $img_path = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $img_path);
    }

    // Update the blog in the database
    $stmt = $conn->prepare("UPDATE volunteers SET name = ?, designation = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $description, $img_path, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the update_blogs.php page
    header("Location: see_all_volunteers.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Blog</title>
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
                        <h4 class="card-title">Edit Blog</h4>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $blog['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $blog['designation']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                <small>Current Image: <?php echo $blog['image']; ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Volunteer</button>
                        </form>
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
