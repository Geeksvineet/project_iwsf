<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Insert the new category
    $sql = "INSERT INTO category_posts (name, description) VALUES ('$name', '$description')";
    if (mysqli_query($conn, $sql)) {
        header("Location: blogs_category_control.php");
    } else {
        echo "Error adding category: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blogs Category</title>
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
                        <h2 class="text-dark font-weight-bold mb-2 card-title">Add Blogs Category</h2>
                    <form method="POST" action="add_category.php">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
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
