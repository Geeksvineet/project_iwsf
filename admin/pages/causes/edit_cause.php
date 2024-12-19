<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch the cause details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM causes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cause = $result->fetch_assoc();
    $stmt->close();
}

// Fetch all categories for the dropdown
$sql = "SELECT id, name FROM category_causes";
$categories_result = $conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_causes_id'];

    // Handle file upload
    $img_path = $cause['img_path'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $img_path = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $img_path);
    }

    // Update the cause in the database
    $stmt = $conn->prepare("UPDATE causes SET title = ?, description = ?, img_path = ?, category_causes_id = ?, date_updated = NOW() WHERE id = ?");
    $stmt->bind_param("sssii", $title, $description, $img_path, $category_id, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the update_causes.php page
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
    <title>Edit cause</title>
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
                        <h4 class="card-title">Edit cause</h4>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $cause['id']; ?>">
                            <div class="form-group">
                                <label for="title">cause Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $cause['title']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $cause['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                <small>Current Image: <?php echo $cause['img_path']; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="category_causes_id">Category</label>
                                <select class="form-control" id="category_causes_id" name="category_causes_id" required>
                                    <?php
                                    if ($categories_result->num_rows > 0) {
                                        while ($row = $categories_result->fetch_assoc()) {
                                            $selected = $row['id'] == $cause['category_causes_id'] ? 'selected' : '';
                                            echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update cause</button>
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
