<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse mx-3">
    <div class="position-sticky pt-3 mt-3 mx-3">
        <ul class="nav flex-column pt-3 mt-2">
            <li class="nav-item">
                <a class="nav-link <?= $dashboard_page ?>" aria-current="page" href="dashboard.php">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $appointment_page ?>" href="../admin/appointment.php">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    My Appointments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $doctor_page ?>" href="../admin/doctor.php">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Doctors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $settings_page ?>" href="../admin/settings.php">
                    <i class="fa fa-gear" aria-hidden="true"></i>
                    Settings
                </a>
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