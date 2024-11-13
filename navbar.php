<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="dashboard.php">Rfl Eye Care</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto"> <!-- Center the navbar items -->
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'appointment.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="appointment.php">All Appointment</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'patients.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="products.php">All Patients</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'doctor.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="doctor.php">Doctors</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'services.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="services.php">Products</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'products.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="products.php">Services</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'settings.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="settings.php">Settings</a>
            </li>
        </ul>
        <div class="ml-auto">
            <?php if (isset($_SESSION['first_name'])): ?> <!-- Check if the user is logged in -->
                <span class="navbar-text mr-3"><?= htmlspecialchars($_SESSION['first_name']); ?></span> <!-- Display username -->
                <a href="auth/logout.php" class="btn btn-outline-danger">Logout</a> <!-- Logout button -->
            <?php else: ?>
                <a href="auth/signup.php" class="btn btn-outline-primary">Signup</a>
                <a href="auth/login.php" class="btn btn-outline-secondary">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        margin: 0 10px; /* Decreased space between navbar items */
        transition: color 0.3s ease, text-shadow 0.3s ease; /* Smooth transition for text color and glow */
        font-weight: bold; /* Make text bold */
    }

    .navbar-nav .nav-link:hover {
        color: #007bff; /* Change text color on hover */
        text-shadow: 0 0 5px #007bff, 0 0 10px #007bff; /* Blue glow effect on hover */
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #007bff; /* Active link text color */
        text-shadow: 0 0 5px #007bff, 0 0 10px #007bff; /* Blue glow effect on active link */
    }
</style>
