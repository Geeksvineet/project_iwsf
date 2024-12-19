<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Fetch all contact us
$sql = "SELECT * FROM contact_us";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us Management</title>
    <?php include("../../partials/link_materials.php"); ?>
</head>
<body>
    <div class="container-scroller">
        <?php include("../../partials/_navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("../../partials/_sidebar.php"); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-dark font-weight-bold mb-2 card-title">Contact Us Management</h2>
                            <!-- <a href="add_volunteer.php" class="btn btn-primary mb-3">Add Volunteer</a> -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $serial_no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $serial_no++ . "</td>";
                                            // echo "<td><img src='" . $row['image'] . "' alt='Volunteer Image' style='width: 40%; height: 40%; border-radius: 0;'></td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['message'] . "</td>";
                                            echo "<td>" . $row['date_created'] . "</td>";
                                            echo "<td>";
                                            // echo "<a href='edit_volunteer.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> ";
                                            echo "<a href='delete_contact_action.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No Contacts found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php include("../../partials/_footer.php"); ?>
            </div>
        </div>
    </div>
    <?php include("../../partials/script_materials.php"); ?>
</body>
</html>
