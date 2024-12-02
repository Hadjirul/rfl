<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse mx-3">
        <div class="position-sticky pt-3 mt-3 mx-3">
            <ul class="nav flex-column pt-3 mt-2">
                <li class="nav-item">
                    <a class="nav-link <?= $dashboard_page ?>" aria-current="page" href="../dashboard/dashboard.php">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $appointment_page ?>" href="../appointment/appointment.php">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        My Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $patient_page ?>" href="../patient/patient.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                       My Patients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $walkin_page ?>" href="../walkins/walkins.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Walki-In Patients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $schedule_page ?>" href="../schedule/schedule.php">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        Busy Schedule
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $reviews_page ?>" href="../review/review.php">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        Reviews
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $calendar_page ?>" href="../admin/calendar.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Calendar
                    </a>
                </li>


          

        
        
            
            </ul>
        </div>
    </nav>