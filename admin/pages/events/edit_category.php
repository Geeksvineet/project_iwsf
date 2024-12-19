<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch category data
    $sql = "SELECT * FROM category_events WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $category = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Update the category
    $sql = "UPDATE category_events SET name = '$name', description = '$description' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: events_category_control.php");
    } else {
        echo "Error updating category: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Events Category</title>
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
                        <h2 class="text-dark font-weight-bold mb-2 card-title">Edit Events Category</h2>
                    <form method="POST" action="edit_category.php?id=<?php echo $category['id']; ?>">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $category['description']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
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
