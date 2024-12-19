<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_events_id = $_POST['category'];
    $date_of_event_organize = $_POST['date_of_event_organize'];
    $event_start_time = $_POST['event_start_time'];
    $event_end_time = $_POST['event_end_time'];
    // $events_time_duration = $event_start_time . ' - ' . $event_end_time;
    $location = $_POST['location'];

    $event_start_time_12hr = date("g:i A", strtotime($event_start_time));
    $event_end_time_12hr = date("g:i A", strtotime($event_end_time));
    $events_time_duration = $event_start_time_12hr . ' - ' . $event_end_time_12hr;

    // Handling file upload
    $img_path = 'images/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $img_path);

    // SQL to insert event data into the database
    $sql = "INSERT INTO events (title, description, img_path, category_events_id, date_of_event_organize, events_time_duration, location, status)
            VALUES ('$title', '$description', '$img_path', '$category_events_id', '$date_of_event_organize', '$events_time_duration', '$location', 0)";

    if (mysqli_query($conn, $sql)) {
        header('Location: status_of_events.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch categories from the database for the dropdown
$category_query = "SELECT id, name FROM category_events";
$category_result = mysqli_query($conn, $category_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
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
                            <h2 class="card-title">Add Event</h2>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Event Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Event Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <?php while ($row = mysqli_fetch_assoc($category_result)) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_of_event_organize">Date of Event</label>
                                    <input type="date" class="form-control" id="date_of_event_organize" name="date_of_event_organize" required>
                                </div>
                                <div class="form-group">
                                    <label for="event_start_time">Event Start Time</label>
                                    <input type="time" class="form-control" id="event_start_time" name="event_start_time" required>
                                </div>
                                <div class="form-group">
                                    <label for="event_end_time">Event End Time</label>
                                    <input type="time" class="form-control" id="event_end_time" name="event_end_time" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Event</button>
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