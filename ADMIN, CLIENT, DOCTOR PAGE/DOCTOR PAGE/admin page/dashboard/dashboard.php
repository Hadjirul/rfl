<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Doctor Dashboard';
    $dashboard_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.admin.php')
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../include/sidepanel.php')
                ?>
               
                 
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class = "container mt-3">
                
                 <h4 class = "pt-3">Welcome!</h3>
                 <h4 class = "font-weight-bolder">Mr. Carlo</h3>
                 <h5 class = "pt-3">Track your past and future appointments history.Also find out the expected arrival</h5>
                  <h5>time of your doctor or medical consultant. </h5>
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
        require_once('../../include/js.php')
    ?>
    <script src="../js/dashboard.js"></script>
</body>
</html>