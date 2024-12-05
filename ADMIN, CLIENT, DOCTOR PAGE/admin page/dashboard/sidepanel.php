<body>
<style>
    #sidebarMenu{
      margin-top: 3.8em;
      width: 250px;
    }
    #settings{
        width: 100px !important;
    }
</style>  

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse mx-3" >
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
                        All Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $patient_page ?>" href="../patient/patient.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Patients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $walkin_page ?>" href="../walkin/walkin.php">
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
                    <a class="nav-link <?= $doctor_page ?>" href="../doctor/doctor.php">
                        <i class="fa fa-users" aria-hidden = "true"></i>
                        Doctors
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link <?= $employee_page ?>" href="../employee/employee.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Employees
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


            <li class="nav-item dropdown" >
            <button class="btn dropdown-toggle fs-6 border-radius-none d-flex mx-2 <?= $setting_page ?>" data-bs-toggle="dropdown" aria-expanded="false"><span class = "fa fa-gear"></span>
                Settings
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link <?= $settings_page ?>" href="../settings/settings.php">
                        <i class="" aria-hidden="true"></i>
                        Account Settings
                    </a>
                </li>
                <li>
                    <a class="nav-link <?= $manage_page ?>" href="../content/content.php">
                        <i class="" aria-hidden="true"></i>
                        Manage Content
                    </a>
                </li>
                
            </ul>
            </li>

        
        
            
                <hr class="d-lg-none">
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</body>
    
    
    
   