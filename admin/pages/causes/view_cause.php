<?php
session_start();
require '../connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Get the cause ID from the URL
$cause_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the cause post
$sql = "SELECT causes.title, causes.description, causes.img_path, causes.date_published, category_causes.name AS category 
        FROM causes 
        LEFT JOIN category_causes ON causes.category_causes_id = category_causes.id 
        WHERE causes.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cause_id);
$stmt->execute();
$result = $stmt->get_result();
$cause = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View cause</title>
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
                            <h2 class="card-title"><?php echo $cause['title']; ?></h2>
                            <p class="text-muted">Published on: <?php echo date("F j, Y", strtotime($cause['date_published'])); ?></p>
                            <?php if (!empty($cause['img_path'])): ?>
                                <img src="<?php echo $cause['img_path']; ?>" alt="cause Image" class="img-fluid mb-4">
                            <?php endif; ?>
                            <p><?php echo nl2br($cause['description']); ?></p>
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
// $stmt->close();
// $conn->close();
?>