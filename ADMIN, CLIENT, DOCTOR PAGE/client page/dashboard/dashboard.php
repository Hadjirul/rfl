<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

require_once('../../../database/connection.php'); // Include your database connection file

$user_id = $_SESSION['user_id'];

// Fetch user details
$userQuery = $conn->prepare("SELECT first_name, last_name FROM appointments WHERE user_id = ? LIMIT 1");
$userQuery->bind_param("i", $user_id);
$userQuery->execute();
$userResult = $userQuery->get_result();
$user = $userResult->fetch_assoc();

// Fetch stats
$statsQuery = $conn->prepare("
    SELECT 
        (SELECT COUNT(*) FROM doctor) AS all_doctors,
        (SELECT COUNT(*) FROM appointments WHERE user_id = ? AND status = 'pending') AS pending_bookings,
        (SELECT COUNT(*) FROM appointments WHERE user_id = ? AND status = 'completed') AS completed_bookings,
        (SELECT COUNT(*) FROM appointments WHERE user_id = ? AND date = CURDATE()) AS todays_sessions
");
$statsQuery->bind_param("iii", $user_id, $user_id, $user_id);
$statsQuery->execute();
$stats = $statsQuery->get_result()->fetch_assoc();

// Fetch upcoming sessions
$sessionsQuery = $conn->prepare("
    SELECT service, date, time 
    FROM appointments 
    WHERE user_id = ? AND status = 'approved' AND date >= CURDATE()
    ORDER BY date ASC, time ASC
    LIMIT 5
");
$sessionsQuery->bind_param("i", $user_id);
$sessionsQuery->execute();
$sessions = $sessionsQuery->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Client Dashboard';
    $dashboard_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php require_once('../../include/header.user.php'); ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php require_once('../../include/sidepanel.php'); ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="container mt-3">
                        <h4 class="pt-3">Welcome!</h4>
                        <h4 class="font-weight-bolder">Mr. <?php echo htmlspecialchars($user['last_name']); ?></h4>
                        <h5 class="pt-3">Track your past and future appointment history. Also, find out the expected arrival time of your doctor or medical consultant.</h5>
                        <a href="../appointment/appointment.php" class="btn btn-primary mt-3 px-4">
                            <h6 class="fs-5">View My Bookings</h6>
                        </a>
                    </div>
                    <div class="row py-2 py-lg-3">
                        <div class="row py-2 py-lg-3 col-lg-7">
                            <h1 class="h3 brand-color pb-2 pt-0">Overview</h1>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 text-center">
                                <div class="card admin-rounded col-lg-12 h-100">
                                    <div class="row card-body">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><?php echo $stats['all_doctors']; ?></h5>
                                            <p class="card-text py-1 mb-3">All Doctors</p>
                                        </div>
                                        <div class="col-lg-6 pb-0">
                                            <img src="../../img/image 7.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 text-center">
                                <div class="card admin-rounded col-lg-12">
                                    <div class="row card-body">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><?php echo $stats['pending_bookings']; ?></h5>
                                            <p class="card-text py-1">Pending Bookings</p>
                                        </div>
                                        <div class="col-lg-6 pb-0">
                                            <img src="../../img/image 3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pt-3 text-center">
                                <div class="card admin-rounded col-lg-12">
                                    <div class="row card-body">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><?php echo $stats['completed_bookings']; ?></h5>
                                            <p class="card-text py-1">Completed Bookings</p>
                                        </div>
                                        <div class="col-lg-6 pb-0">
                                            <img src="../../img/image 8.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pt-3 text-center">
                                <div class="card admin-rounded col-lg-12">
                                    <div class="row card-body">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><?php echo $stats['todays_sessions']; ?></h5>
                                            <p class="card-text py-1">Today's Sessions</p>
                                        </div>
                                        <div class="col-lg-6 pb-0">
                                            <img src="../../img/image 9.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive col-lg-5">
                    <h4 class="h5 brand-color pt-3">Your Upcoming Sessions</h4>

                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Scheduled Date</th>
                                    <th scope="col">Time</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Eye Exam</td>
                                    <td>2023-10-15</td>
                                    <td>10:00-11:00</td>
                                    
                                </tr>
                                <tr>
                                    <td>Contact Lense </td>
                                    <td>2023-10-16</td>
                                    <td>9:00-10:00</td>
                                </tr>
                            
                                <!-- You now have a total of 10 rows with spicy pizza orders -->
                            </tbody>
                        </table>                                             
                    </div>    
                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php require_once('../../include/js.php'); ?>
    <script src="dashboard.js"></script>
</body>
</html>
