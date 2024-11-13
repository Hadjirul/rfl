<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Rfl Eye Care</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto"> <!-- Center the navbar items -->
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'appointment.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="appointment.php">Appointment</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'services.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'products.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'doctor.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="doctor.php">Doctor</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
        <div class="ml-auto">
                <a href="../auth/signup.php" class="btn btn-outline-primary">Signup</a>
                <a href="../login.php" class="btn btn-outline-secondary">Login</a>
           
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
