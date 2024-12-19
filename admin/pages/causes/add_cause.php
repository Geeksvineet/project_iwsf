<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch all categories for the dropdown
$sql = "SELECT id, name FROM category_causes";
$categories_result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_causes_id'];
    $status = 0; // Initial status is unpublished

    // Handle file upload
    $img_path = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $img_path = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $img_path);
    }

    // Insert the new cause into the database
    $stmt = $conn->prepare("INSERT INTO causes (title, description, img_path, category_causes_id, status, date_published, date_updated) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("sssii", $title, $description, $img_path, $category_id, $status);
    $stmt->execute();
    $stmt->close();

    // Redirect to the status_of_causes.php page
    header("Location: status_of_causes.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New cause</title>
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
                        <h4 class="card-title">Add New cause</h4>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">cause Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="category_causes_id">Category</label>
                                <select class="form-control" id="category_causes_id" name="category_causes_id" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <?php
                                    if ($categories_result->num_rows > 0) {
                                        while ($row = $categories_result->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add cause</button>
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
