<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Dashboard';
    $dashboard_page = 'active';
    require_once('../../include/head.php');
?>
<head>
<?php
        require_once('../../include/header.admin.php');
        require_once '../../../includes/appointment-functions.php';
     
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../include/sidepanel.php')
                ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../cssfiles/S-P-D-A-C.page.css">
    <link rel="stylesheet" href="../../../calendar-appointment/evo-calendar.min.css">
    <link rel="stylesheet" href="../../../calendar-appointment/style.css">
</head>

<body>
 
               
                 
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class = "container mt-3">
                
                 <h4 class = "pt-3">Welcome!</h3>
                 <h4 class = "font-weight-bolder">Mr. Rizal</h3>
                 <h5 class = "pt-3">Track your past and future appointments history.Also find out the expected arrival</h5>
                  <h5>time of your doctor or medical consultant. </h5>
                 <a href="appointment.php" class="btn btn-primary mt-3 px-4">
    <h6 class="fs-5">View My Bookings</h6>
</a>

                </div>
                <div class="row py-2 py-lg-3">
                    
                    <div class="row py-2 py-lg-3 col-lg-7">
                        <!-- Statistic Card 1 -->
                        <h1 class="h3 brand-color pb-2 pt-0">Overview</h1>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 text-center">
                        <div class="card admin-rounded col-lg-12 h-100 ">
                            <div class="row card-body">
                                <div class="col-lg-6">
                                    <h5 class="card-title">4</h5>
                                    <p class="card-text py-1 mb-3 ">All Doctors</p>
                                </div>
                                <div class="col-lg-6 pb-0">
                                    <img src="../../img/image 7.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                                        <!-- Statistic Card 2 -->
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 text-center ">
                        <div class="card admin-rounded col-lg-12">
                            <div class="row card-body">
                                <div class="col-lg-6">
                                    <h5 class="card-title">3</h5>
                                    <p class="card-text py-1">Pending Booking</p>
                                </div>
                                <div class="col-lg-6 pb-0">
                                    <img src="../../img/image 3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Statistic Card 3 -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pt-3 text-center">
                            <div class="card admin-rounded col-lg-12">
                                <div class="row card-body">
                                    <div class="col-lg-6">
                                        <h5 class="card-title">4</h5>
                                        <p class="card-text py-1">Completed Booking</p>
                                    </div>
                                    <div class="col-lg-6 pb-0">
                                        <img src="../../img/image 8.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- Statistic Card 4 -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pt-3 text-center">
                            <div class="card admin-rounded col-lg-12">
                                <div class="row card-body">
                                    <div class="col-lg-6">
                                        <h5 class="card-title">2</h5>
                                        <p class="card-text py-1">Today's Session</p>
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


           

                <div class="form-step active-step" id="step-1">
                    <div class="top">
                        <div class="text-align-center">
                            <?php
                            require_once '../../../calendar-appointment/include-calendar.php';
                            ?>
                        </div>
                        
                        </div>
                       <div class="d-flex flex-direction-row align-items-center margin-bottom b-n">
    <?php
    if (isset($_GET['appointmentdate'])) {
        $appointmentdate = $_GET['appointmentdate'];
        echo '<input type="text" name="appointmentdate" id="selectedDate" class="city form-control scrollable-container" readonly value="' . htmlspecialchars($appointmentdate) . '">';
    } else {
        echo '<button type="button" class="btn position-relative" data-bs-toggle="modal" data-bs-target="#calendarModal">
                <img src="../../message-icon.png" alt="">
                <span class="position-absolute top-1 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2 mt-2">
                    <span class="visually-hidden">unread messages</span>
                </span>
              </button>';
    }
    ?>
    
    <!-- Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title Kaushan-font-black" id="calendarModalLabel">Appointment Date:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- evoCalendar container -->
                    <div id="calendar" class="evo-calendar event-hide sidebar-hide"></div>
                </div>
            </div>
        </div>
    </div>
</div>

                       
                
          
        </div>
    </section>
                        
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../include/js.php')
    ?>
    <script src="../js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="../../../js/goback.js"></script>
    <script src="../../../js/checkboxes.js"></script>
    <script src="../../../js/appointment.steps.js"></script>
    <script src="../../../js/ajax.js"></script>
    <script src="../../../calendar-appointment/evo-calendar.min.js"></script>
    <script src="../../../calendar-appointment/calendar.js"></script>
    <script>
        
        $(document).ready(function () {
            let events = [<?php echo $jsCode; ?>];

            $('#calendar').evoCalendar({
                calendarEvents: events,
            });

            // Function to open the modal when input is clicked
            function openCalendar() {
                $('#calendarModal').modal('show');
            }

            // Attach click event listener to the input
            $('#selectedDate').on('click', openCalendar);

            // Listen for clicks on day buttons
            $(document).on('click', '.day', function () {
                // Extract the date value and store it in the input field
                const date = $(this).data('date-val');
                updateSelectedDate(date);
            });

            // Function to update the selected date in the input tag
            function updateSelectedDate(date) {
                $('#selectedDate').val(date);
                $('#calendarModal').modal('hide'); // Close the modal
            }
        });
        $(document).ready(function () {
            // Prevent page refresh on sidebarToggle click
            $('#sidebarToggler').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle sidebar logic here
            });

            // Prevent page refresh on eventListToggle click
            $('#eventListToggler').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });
            $('.chevron-arrow-right').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });
            $('.chevron-arrow-left').click(function (event) {
                event.preventDefault(); // Prevent default behavior
                // Your toggle event list logic here
            });

        });
    </script>
</body>
</html>