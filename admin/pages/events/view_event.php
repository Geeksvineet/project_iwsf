<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Get the event ID from the URL
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($event_id > 0) {
    // Fetch event details from the database
    $query = "SELECT e.title, e.date_of_event_organize, e.events_time_duration, e.img_path, e.description, e.location, c.name as category 
              FROM events e
              JOIN category_events c ON e.category_events_id = c.id
              WHERE e.id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "Event not found.";
        exit;
    }
} else {
    echo "Invalid event ID.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?></title>
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
                            <h1 class="mb-4"><?php echo htmlspecialchars($event['title']); ?></h1>
                            <p><strong>Date:</strong> <?php echo date('F j, Y', strtotime($event['date_of_event_organize'])); ?></p>
                            <p><strong>Time:</strong> <?php echo htmlspecialchars($event['events_time_duration']); ?></p>
                            <img src="<?php echo htmlspecialchars($event['img_path']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="img-fluid mb-4">
                            <p><strong>Description:</strong></p>
                            <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                            <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
                            <div class="mt-4">
                                <!-- Google Map Embed -->
                                <iframe
                                    width="100%"
                                    height="450"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk&q=<?php echo urlencode($event['location']); ?>">
                                </iframe>
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