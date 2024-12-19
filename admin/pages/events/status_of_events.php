<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

$query = "SELECT events.id, events.title, category_events.name AS category, events.status 
          FROM events 
          INNER JOIN category_events ON events.category_events_id = category_events.id
          WHERE events.date_of_event_organize >= NOW()";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status of Events</title>
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
                    <div class="d-xl-flex justify-content-between align-items-start">
                        <h2 class="text-dark font-weight-bold mb-2">All Events</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Status of Upcoming Events</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $serial_no++ . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['category'] . "</td>";
                                    echo "<td>" . ($row['status'] ? 'Published' : 'Unpublished') . "</td>";
                                    echo "<td>";
                                    if ($row['status'] == 0) {
                                        echo "<a href='publish_event.php?id=" . $row['id'] . "' class='btn btn-success'>Publish</a>";
                                    } else {
                                        echo "<a href='view_event.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a>";
                                    }
                                    echo "<td><a href='delete_event_action.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                                    echo "<td><a href='edit_event.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
                <?php
                include("../../partials/_footer.php");
                ?>
                <!-- partial -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <?php
    include("../../partials/script_materials.php");
    ?>
</body>

</html>