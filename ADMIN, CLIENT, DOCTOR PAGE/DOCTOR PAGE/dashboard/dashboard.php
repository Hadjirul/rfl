<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php"); // Redirect to login if not logged in
    exit;
}

require_once('../../../database/connection.php'); // Include your database connection script

$doctor_id = $_SESSION['user_id']; // Ensure doctor_id is retrieved from session

// Fetch doctor details
$queryDoctor = "SELECT first_name, last_name FROM doctor WHERE id = ?";
$stmtDoctor = $conn->prepare($queryDoctor);
if ($stmtDoctor) {
    $stmtDoctor->bind_param("i", $doctor_id);
    $stmtDoctor->execute();
    $resultDoctor = $stmtDoctor->get_result();
    $doctor = $resultDoctor->fetch_assoc();
    $stmtDoctor->close();
} else {
    die("Error preparing doctor query: " . $conn->error);
}

// Fetch appointments for the logged-in doctor
$queryAppointments = "SELECT service, date, time, status FROM appointments WHERE doctor_id = ? AND date >= CURDATE() ORDER BY date ASC, time ASC LIMIT 5";
$stmtAppointments = $conn->prepare($queryAppointments);
if ($stmtAppointments) {
    $stmtAppointments->bind_param("i", $doctor_id);
    $stmtAppointments->execute();
    $resultAppointments = $stmtAppointments->get_result();
} else {
    die("Error preparing appointments query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Doctor Dashboard';
    $dashboard_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.doctor.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../include/sidepanel.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="container mt-3">
                        <h4 class="pt-3">
                            Welcome, Dr. <?php echo htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name'] ?? 'Doctor'); ?>!
                        </h4>
                        <h5 class="pt-3">Track your past and future appointments. Also, find out the expected arrival time of your patients.</h5>
                        <a href="../appointment/appointment.php" class="btn btn-primary mt-3 px-4">
                            <h6 class="fs-5">View My Bookings</h6>
                        </a>
                        </div>
                <div class="row py-2 py-lg-3">
                    
                    <div class="row py-2 py-lg-3 col-lg-7">
                        <!-- Statistic Card 1 -->
                        <h1 class="h3 brand-color pb-2 pt-0">Overview</h1>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 text-center">
                        <div class="card admin-rounded col-lg-12 h-100 ">
                            <a href="../doctor/doctor.php" style = "text-decoration: none;">
                            <div class="row card-body">
                                <div class="col-lg-6">
                                    <h5 class="card-title">4</h5>
                                    <p class="card-text py-1 mb-3 ">All Doctors</p>
                                </div>
                                <div class="col-lg-6 pb-0">
                                    <img src="../../img/image 7.png" alt="">
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                                        <!-- Statistic Card 2 -->
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 text-center ">
                        <div class="card admin-rounded col-lg-12">
                            <a href="../appointment/appointment.php" style = "text-decoration: none;">
                            <div class="row card-body">
                                <div class="col-lg-6">
                                    <h5 class="card-title">3</h5>
                                    <p class="card-text py-1">Pending Booking</p>
                                </div>
                                <div class="col-lg-6 pb-0">
                                    <img src="../../img/image 3.png" alt="">
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                        <!-- Statistic Card 3 -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pt-3 text-center">
                            <div class="card admin-rounded col-lg-12">
                            <a href="../appointment/appointment.php" style = "text-decoration: none;">
                                <div class="row card-body">
                                    <div class="col-lg-6">
                                        <h5 class="card-title">4</h5>
                                        <p class="card-text py-1">Completed Booking</p>
                                    </div>
                                    <div class="col-lg-6 pb-0">
                                        <img src="../../img/image 8.png" alt="">
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                            <!-- Statistic Card 4 -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pt-3 text-center">
                            <div class="card admin-rounded col-lg-12">
                                <a href="../appointment/appointment.php" style = "text-decoration: none;">
                                <div class="row card-body">
                                    <div class="col-lg-6">
                                        <h5 class="card-title">2</h5>
                                        <p class="card-text py-1">Today's Session</p>
                                    </div>
                                    <div class="col-lg-6 pb-0">
                                        <img src="../../img/image 9.png" alt="">
                                    </div>
                                </div>
                                </a>
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
    <?php
        require_once('../../include/js.php');
    ?>
    <script src="../js/dashboard.js"></script>
</body>
</html>
