<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="dashboard.php">Rfl Eye Care</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <!-- Add other nav items here as needed -->
        </ul>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= htmlspecialchars($_SESSION['email']); ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="../index.php">Homepage</a>
                <a class="dropdown-item" href="../auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>


<div class="sidebar t   ">
    <a class="sidebar-brand" href="dashboard.php">Rfl Eye Care</a>
    <ul class="sidebar-nav">
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
            <a class="nav-link" href="patients.php">All Patients</a>
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
    <div class="sidebar-auth">
        <?php if (isset($_SESSION['email'])): ?>
            <span class="sidebar-user"><?= htmlspecialchars($_SESSION['email']); ?></span>
            <a href="../auth/logout.php" class="btn btn-outline-danger">Logout</a>
        <?php endif; ?>
    </div>
</div>

<style>
    .sidebar {
        height: 100vh;
        width: 250px;
        background-color: #f8f9fa; /* Light background */
        padding: 20px;
        position: fixed; /* Fixed sidebar */
        overflow-y: auto; /* Allow scrolling */
    }

    .sidebar-brand {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        display: block;
        text-decoration: none;
        color: #000; /* Change as needed */
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
    }

    .sidebar-nav .nav-item {
        margin-bottom: 15px; /* Space between items */
    }

    .sidebar-nav .nav-link {
        text-decoration: none;
        color: #333; /* Change as needed */
        font-weight: bold;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .sidebar-nav .nav-link:hover {
        color: #007bff; /* Hover color */
        text-shadow: 0 0 5px #007bff, 0 0 10px #007bff; /* Glow effect */
    }

    .sidebar-nav .nav-item.active .nav-link {
        color: #007bff; /* Active link color */
        text-shadow: 0 0 5px #007bff, 0 0 10px #007bff; /* Glow effect */
    }

    .sidebar-auth {
        margin-top: auto; /* Push to the bottom */
        padding: 20px 0;
    }

    .sidebar-user {
        display: block;
        margin-bottom: 10px;
    }
</style>
