<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch upcoming events
$now = date('Y-m-d H:i:s');
$upcoming_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) > '$now' ORDER BY date_of_event_organize ASC";
$upcoming_events = mysqli_query($conn, $upcoming_query);

// Fetch finished events
$finished_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) <= '$now' ORDER BY date_of_event_organize DESC";
$finished_events = mysqli_query($conn, $finished_query);

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See All Events</title>
    <?php
    include("../../partials/link_materials.php");
    ?>
    <style>
        .section-toggle1 {
            cursor: pointer;
            font-weight: bold;
            width: 49%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            /* border: 2px solid black;  */
        }

        .section-toggle1:hover {
            color: white;
            background-color: #a461d8;
        }

        .section-toggle2:hover {
            color: white;
            background-color: #a461d8;
        }

        .section-toggle2 {
            cursor: pointer;
            font-weight: bold;
            width: 49%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            /* border: 2px solid black;  */
        }

        .section-toggle3 {
            width: 1%;
            height: 50px;
        }

        .hidden {
            display: none;
        }

        .header-section {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
            color: black;
        }
    </style>
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
                    <h2 class="text-dark font-weight-bold mb-2">See All Events</h2>

                    <div class="header-section">
                        <div class="section-toggle1" onclick="toggleSection('upcoming')">
                            <h4>Upcoming Events</h4>
                        </div>
                        <div class="section-toggle3">

                        </div>
                        <div class="section-toggle2" onclick="toggleSection('finished')">
                            <h4>Finished Events</h4>
                        </div>
                    </div>

                    <div id="upcoming" class="event-section">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Upcoming Events</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Title</th>
                                            <th>Date of Event</th>
                                            <th>Time Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 1;
                                        while ($event = mysqli_fetch_assoc($upcoming_events)) {
                                            echo "<tr>
                                    <td>{$serial}</td>
                                    <td>{$event['title']}</td>
                                    <td>{$event['date_of_event_organize']}</td>
                                    <td>{$event['events_time_duration']}</td>
                                    <td><a href='view_event.php?id={$event['id']}' class='btn btn-primary'>View Event Details</a></td>
                                </tr>";
                                            $serial++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="finished" class="event-section hidden">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Finished Events</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Title</th>
                                            <th>Date of Event</th>
                                            <th>Time Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 1;
                                        while ($event = mysqli_fetch_assoc($finished_events)) {
                                            echo "<tr>
                                    <td>{$serial}</td>
                                    <td>{$event['title']}</td>
                                    <td>{$event['date_of_event_organize']}</td>
                                    <td>{$event['events_time_duration']}</td>
                                    <td><a href='view_event.php?id={$event['id']}' class='btn btn-primary'>View Event Details</a></td>
                                </tr>";
                                            $serial++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    <script>
        function toggleSection(section) {
            document.getElementById('upcoming').classList.add('hidden');
            document.getElementById('finished').classList.add('hidden');
            document.getElementById(section).classList.remove('hidden');
        }
    </script>

    <?php
    include("../../partials/script_materials.php");
    ?>
</body>

</html>