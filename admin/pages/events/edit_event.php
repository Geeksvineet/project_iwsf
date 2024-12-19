<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    // $img_path = $_POST['img_path'];
    $category_id = $_POST['category_events_id'];
    $date_of_event = $_POST['date_of_event_organize'];
    $event_start_time = date("g:i A", strtotime($_POST['event_start_time']));
    $event_end_time = date("g:i A", strtotime($_POST['event_end_time']));
    $event_time_duration = $event_start_time . " - " . $event_end_time;
    $location = $_POST['location'];
    $date_updated = date("Y-m-d H:i:s");

    $img_path = 'images/' . basename($_FILES['img_path']['name']);
    move_uploaded_file($_FILES['img_path']['tmp_name'], $img_path);

    $update_query = "UPDATE events SET 
                        title = '$title',
                        description = '$description',
                        img_path = '$img_path',
                        category_events_id = '$category_id',
                        date_of_event_organize = '$date_of_event',
                        events_time_duration = '$event_time_duration',
                        location = '$location',
                        date_updated = '$date_updated'
                    WHERE id = '$event_id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: status_of_events.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch the event data to pre-fill the form
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $select_query = "SELECT * FROM events WHERE id = '$event_id'";
    $result = mysqli_query($conn, $select_query);
    $event = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
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
                            <h2 class="card-title">Edit Event</h2>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">

                                <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php echo $event['title']; ?>" required><br>
                                </div>

                                <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" required><?php echo $event['description']; ?></textarea><br>
                                </div>

                                <div class="form-group">
                                <label for="img_path">Upload Image</label>
                                <input type="file" name="img_path" class="form-control-file" id="img_path" required>
                                <small>Current Image: <?php echo $event['img_path']; ?></small>
                                </div>

                                <div class="form-group">
                                <label for="category_events_id">Category:</label>
                                <select class="form-control" name="category_events_id" id="category_events_id">
                                    <!-- Populate with categories -->
                                    <?php
                                    $categories_query = "SELECT * FROM category_posts";
                                    $categories_result = mysqli_query($conn, $categories_query);
                                    while ($category = mysqli_fetch_assoc($categories_result)) {
                                        $selected = ($category['id'] == $event['category_events_id']) ? 'selected' : '';
                                        echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                                    }
                                    ?>
                                </select>
                                </div>
                                
                                <br>

                                <div class="form-group">
                                <label for="date_of_event_organize">Date of Event:</label>
                                <input type="date" class="form-control" name="date_of_event_organize" id="date_of_event_organize" value="<?php echo $event['date_of_event_organize']; ?>" required><br>
                                </div>

                                <div class="form-group">
                                <label for="event_start_time">Start Time:</label>
                                <input type="time" class="form-control" name="event_start_time" id="event_start_time" value="<?php echo date("H:i", strtotime(explode(" - ", $event['events_time_duration'])[0])); ?>" required><br>
                                </div>

                                <div class="form-group">
                                <label for="event_end_time">End Time:</label>
                                <input type="time" class="form-control" name="event_end_time" id="event_end_time" value="<?php echo date("H:i", strtotime(explode(" - ", $event['events_time_duration'])[1])); ?>" required><br>
                                </div>

                                <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" name="location" id="location" value="<?php echo $event['location']; ?>" required><br>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Event</button>
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

<?php
// Close connection
mysqli_close($conn);
?>