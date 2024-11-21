<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Your Page Title</title>
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 admin shadow-sm">
    <div class="col-md-3 col-lg-2 admin-header">
        <a class="navbar-brand me-0 px-3 text-dark" href="#">
            <img src="../../logo-removebg 7.png" alt="">CliniCare
        </a>
    </div>

    <!-- Move the icons to the left -->
    <div class="d-flex ms-auto mx-3">
   
        <div >
            <button class = "btn btn-no-outline"><img src="../../notif-icon.png" alt=""> </button>
        </div>
    </div>

    <button class="navbar-toggler d-md-none collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-primary"></span>
    </button>

    <nav class="navbar navbar-expand-md navbar-dark d-none d-md-block">
        <div class="container-fluid">
            <div class="navbar-collapse offcanvas-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../img/profile.jpg" class="rounded-circle me-1" alt="User Image" width="30px" height="30px">
                            Carlo H.
                        </a>
                        <ul class="dropdown-menu dropdown-profile" aria-labelledby="navbarDropdown bg-primary">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Bootstrap JS Bundle (Popper included) -->
<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
