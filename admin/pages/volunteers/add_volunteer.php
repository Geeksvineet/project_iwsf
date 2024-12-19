<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['name'];
    $description = $_POST['designation'];

    // Handle file upload
    $img_path = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $img_path = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $img_path);
    }

    // Insert the new blog into the database
    $stmt = $conn->prepare("INSERT INTO volunteers (name, designation, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $img_path);
    $stmt->execute();
    $stmt->close();

    // Redirect to the status_of_blogs.php page
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
    <title>Add New Volunteer</title>
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
                        <h4 class="card-title">Add New Volunteer</h4>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="Designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Volunteer</button>
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
