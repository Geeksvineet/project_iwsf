<?php
require 'pages/connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch Summary Data
$totalBlogsQuery = "SELECT COUNT(*) as total_blogs FROM posts";
$totalPublishedBlogsQuery = "SELECT COUNT(*) as total_published_blogs FROM posts WHERE status = 1";
$totalEventsQuery = "SELECT COUNT(*) as total_events FROM events";
$totalUpcomingEventsQuery = "SELECT COUNT(*) as total_upcoming_events FROM events WHERE date_of_event_organize >= CURDATE()";
$totalFinishedEventsQuery = "SELECT COUNT(*) as total_finished_events FROM events WHERE date_of_event_organize < CURDATE()";

// Execute the queries
$totalBlogsResult = mysqli_fetch_assoc(mysqli_query($conn, $totalBlogsQuery));
$totalPublishedBlogsResult = mysqli_fetch_assoc(mysqli_query($conn, $totalPublishedBlogsQuery));
$totalEventsResult = mysqli_fetch_assoc(mysqli_query($conn, $totalEventsQuery));
$totalUpcomingEventsResult = mysqli_fetch_assoc(mysqli_query($conn, $totalUpcomingEventsQuery));
$totalFinishedEventsResult = mysqli_fetch_assoc(mysqli_query($conn, $totalFinishedEventsQuery));

// Fetch Recent Blogs and Events
$recentBlogsQuery = "SELECT title, date_published FROM posts ORDER BY date_published DESC LIMIT 5";
$recentEventsQuery = "SELECT title, date_of_event_organize FROM events ORDER BY date_of_event_organize DESC LIMIT 5";

// Execute the queries
$recentBlogsResult = mysqli_query($conn, $recentBlogsQuery);
$recentEventsResult = mysqli_query($conn, $recentEventsQuery);

// Fetch upcoming events
$now = date('Y-m-d H:i:s');
$upcoming_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) > '$now' ORDER BY date_of_event_organize ASC";
$upcoming_events = mysqli_query($conn, $upcoming_query);

// Fetch finished events
$finished_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) <= '$now' ORDER BY date_of_event_organize DESC";
$finished_events = mysqli_query($conn, $finished_query);

// Fetch Blog Categories Distribution
$categoryDistributionQuery = "SELECT category_posts.name, COUNT(posts.id) as count FROM posts 
JOIN category_posts ON posts.category_posts_id = category_posts.id 
GROUP BY category_posts.name";
$categoryDistributionResult = mysqli_query($conn, $categoryDistributionQuery);

// Fetch Event Status Overview
$eventStatusQuery = "SELECT 
    SUM(CASE WHEN date_of_event_organize >= CURDATE() THEN 1 ELSE 0 END) as upcoming_events,
    SUM(CASE WHEN date_of_event_organize < CURDATE() THEN 1 ELSE 0 END) as finished_events
FROM events";
$eventStatusResult = mysqli_fetch_assoc(mysqli_query($conn, $eventStatusQuery));

// Fetch Latest Comments
$latestCommentsQuery = "SELECT name, email, message FROM comments ORDER BY date_created DESC LIMIT 5";
$latestCommentsResult = mysqli_query($conn, $latestCommentsQuery);

// Close the database connection
mysqli_close($conn);
?>

<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <!-- Summary Cards -->
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Blogs</h5>
                    <h2><?php echo $totalBlogsResult['total_blogs']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Published Blogs</h5>
                    <h2><?php echo $totalPublishedBlogsResult['total_published_blogs']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total Events</h5>
                    <h2><?php echo $totalEventsResult['total_events']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Upcoming Events</h5>
                    <h2><?php echo $totalUpcomingEventsResult['total_upcoming_events']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Total Finished Events</h5>
                    <h2><?php echo $totalFinishedEventsResult['total_finished_events']; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <h4>Quick Actions</h4>
            <div class="d-flex flex-wrap gap-2">
                <a href="pages/blogs/add_blog.php" class="btn btn-primary">Add New Blog</a>
                <a href="pages/events/add_event.php" class="btn btn-primary">Add New Event</a>
                <a href="pages/causes/add_cause.php" class="btn btn-primary">Add New Cause</a>
                <a href="pages/blogs/see_all_blogs.php" class="btn btn-primary">View All Blogs</a>
                <a href="pages/events/see_all_events.php" class="btn btn-primary">View All Events</a>
                <a href="pages/causes/see_all_causes.php" class="btn btn-primary">View All Causes</a>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row mt-5">
        <div class="col-md-6 mb-3">
            <h4>Recent Blogs</h4>
            <ul class="list-group">
                <?php while ($blog = mysqli_fetch_assoc($recentBlogsResult)): ?>
                    <li class="list-group-item"><?php echo $blog['title']; ?> - <small><?php echo $blog['date_published']; ?></small></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="col-md-6 mb-3">
            <h4>Recent Events</h4>
            <ul class="list-group">
                <?php while ($event = mysqli_fetch_assoc($recentEventsResult)): ?>
                    <li class="list-group-item"><?php echo $event['title']; ?> - <small><?php echo $event['date_of_event_organize']; ?></small></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <!-- Charts/Graphs -->
    <div class="row mt-5">
        <div class="col-md-6 mb-3">
            <h4>Blog Categories Distribution</h4>
            <canvas id="categoryChart"></canvas>
        </div>
        <div class="col-md-6 mb-3">
            <h4>Event Status Overview</h4>
            <canvas id="eventStatusChart"></canvas>
        </div>
    </div>

    <!-- Tables -->
    <div class="row mt-5">
        <div class="col-md-6 mb-3">
            <h4>Upcoming Events Overview</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($event = mysqli_fetch_assoc($upcoming_events)): ?>
                            <tr>
                                <td><?php echo $event['title']; ?></td>
                                <td><?php echo $event['date_of_event_organize']; ?></td>
                                <td><?php echo $event['events_time_duration']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <h4>Finished Events Overview</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($event = mysqli_fetch_assoc($finished_events)): ?>
                            <tr>
                                <td><?php echo $event['title']; ?></td>
                                <td><?php echo $event['date_of_event_organize']; ?></td>
                                <td><?php echo $event['events_time_duration']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Latest Comments -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h4>Latest Comments</h4>
            <ul class="list-group">
                <?php while ($comment = mysqli_fetch_assoc($latestCommentsResult)): ?>
                    <li class="list-group-item">
                        <strong><?php echo $comment['name']; ?></strong> (<?php echo $comment['email']; ?>): <?php echo $comment['message']; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Render the Charts -->
<script>
    var ctx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php
                    $categories = [];
                    $counts = [];
                    while ($row = mysqli_fetch_assoc($categoryDistributionResult)) {
                        $categories[] = $row['name'];
                        $counts[] = $row['count'];
                    }
                    echo json_encode($categories);
                    ?>,
            datasets: [{
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        }
    });

    var ctx2 = document.getElementById('eventStatusChart').getContext('2d');
    var eventStatusChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Upcoming Events', 'Finished Events'],
            datasets: [{
                label: 'Events',
                data: [<?php echo $eventStatusResult['upcoming_events']; ?>, <?php echo $eventStatusResult['finished_events']; ?>],
                backgroundColor: ['#4BC0C0', '#FF6384']
            }]
        }
    });
</script>