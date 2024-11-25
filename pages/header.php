<?php
ob_start();  
if (isset($_SESSION['first_name']) && !isset($_SESSION['welcome_shown'])) {
    $_SESSION['welcome_shown'] = true; // Set the flag to prevent showing the modal again
    $showWelcomeModal = true;
} else {
    $showWelcomeModal = false;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>RFL Eye Care</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/logo.jpg">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/icofont.css">
    <link rel="stylesheet" href="../css/slicknav.min.css">
    <link rel="stylesheet" href="../css/owl-carousel.css">
    <link rel="stylesheet" href="../css/datepicker.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>  
	<!-- Preloader -->
    <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>

		<header class="header">
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="logo mx-3 px-3">
                                <a href="index.php"><img src="../img/logo.jpg" alt="#" class="m-0"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                                            <a href="../home/index.php">Home</a>
                                        </li>
                                        <!-- Services Dropdown -->
										<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
										<li class="<?= in_array($current_page, ['eye_examination.php', 'lense_treatment.php', 'prescription_glasses.php', 'specialized_eyecare.php']) ? 'active' : ''; ?>">
											<a href="#">Services <i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<li class="<?= $current_page == 'eye_examination.php' ? 'active' : ''; ?>">
													<a href="../services/eye_examination.php">Eye Examination</a>
												</li>
												<li class="<?= $current_page == 'lense_treatment.php' ? 'active' : ''; ?>">
													<a href="../services/lense_treatment.php">Prescription Glasses</a>
												</li>
												<li class="<?= $current_page == 'prescription_glasses.php' ? 'active' : ''; ?>">
													<a href="../services/prescription_glasses.php">Lens Treatment</a>
												</li>
												<li class="<?= $current_page == 'specialized_eyecare.php' ? 'active' : ''; ?>">
													<a href="../services/specialized_eyecare.php">Specialized Eye Care</a>
												</li>
											</ul>
										</li>
							<!-- Products Dropdown -->
                                        <li class="<?= in_array(basename($_SERVER['PHP_SELF']), ['eyeglasses_frame.php', 'lenses.php', 'contact_lenses.php','sunglasses.php','accessories.php']) ? 'active' : ''; ?>">
                                            <a href="#">Products <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                               <li class="<?= $current_page == 'eyeglasses_frame.php' ? 'active' : ''; ?>">
                                                    <a href="../products/eyeglasses_frame.php">Eye Glass Frame</a>
                                                </li>
                                                <li class="<?= $current_page == 'lenses.php' ? 'active' : ''; ?>">
                                                    <a href="../products/lenses.php">Lenses</a>
                                                </li>
                                                <li class="<?= $current_page == 'contact_lenses.php' ? 'active' : ''; ?>">
                                                    <a href="../products/contact_lenses.php">Contact Lenses</a>
                                                </li>
                                                <li class="<?= $current_page == 'sunglasses.php' ? 'active' : ''; ?>">
                                                    <a href="../products/sunglasses.php">Sunglasses</a>
                                                </li>
                                                <li class="<?= $current_page == 'accessories.php' ? 'active' : ''; ?>">
                                                    <a href="../products/accessories.php">Accessories</a></li>
                                            </ul>
                                        </li>
                                        <!-- Pages Dropdown -->
                                        <li class="<?= in_array(basename($_SERVER['PHP_SELF']), ['doctor.php', 'about.php', 'contact.php']) ? 'active' : ''; ?>">
                                            <a href="#">Pages <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="../doctor/doctor.php">Doctors</a></li>  
                                                <li><a href="../about/about.php">About Us</a></li>
                                                <li><a href="../contact/contact.php">Contact Us</a></li>
                                            </ul>
                                        </li>
                                        
                                        <!-- Appointment Button -->
										<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
										<div class="get-quote" style="margin-right:30px;">
												<a href="#" class="btn <?= $current_page == 'appointment.php' ? 'active' : ''; ?>" onclick="checkLoginStatus()">Book Appointment</a>
											</div>

											<!-- Login Reminder Modal -->
											<div id="loginModal" class="modal">
												<div class="modal-content">
													<span class="close" onclick="closeModal()">&times;</span>
													<h3>Please Log In</h3>
													<p>You need to be logged in to book an appointment. Please sign in or sign up to continue.</p>
                                                    <button  class="btn btn-primary btn-block" onclick="window.location.href='../auth/signin.php'">Login</button>
												</div>
											</div>

											<div id="welcomeModal" class="modal">
											<div class="modal-content">
												<span class="close" onclick="closeModal()">&times;</span>
												<h3>Welcome, <?= isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : 'User'; ?>!</h3>
												<p>We are glad to have you back. You can now book your appointment easily.</p>
												<a href="../appointment/appointment.php" class="btn btn-primary mt-3">Go to Appointment</a>
											</div>
										</div>
                                        <!-- User Profile or Signin/Signup Links -->
                                        <?php if (isset($_SESSION['first_name'])): ?> 
                                            <div class="dropdown">
                                                
											<img 
												src="<?= isset($_SESSION['profile_picture']) ? htmlspecialchars($_SESSION['profile_picture']) : '../img/noprofile.png'; ?>" 
												alt="Profile Picture" 
												class="rounded-circle ml-3" 
												width="40" 
												height="40"

											>
												<span class="navbar-text p- m-0"><?= htmlspecialchars($_SESSION['first_name']); ?></span> 
                                                <button class="btn btn-outline dropdown-toggle my-3 py-2 px-2 pr-2" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                                                    <a class="dropdown-item" href="dashboard.php">
                                                        <i class="icofont-dashboard-web text-primary"></i> Dashboard
                                                    </a>
													<a class="dropdown-item" href="javascript:void(0);" onclick="showLogoutModal()">
														<i class="icofont-logout text-danger"></i> Logout
													</a>

                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <li class="<?= basename($_SERVER['PHP_SELF']) == 'signin.php' ? 'active' : ''; ?>"><a href="../auth/signin.php">Signin</a>
                                        </li>
                                        <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
                                            <div class="get-quote">
                                                <a href="../auth/signup.php" class="btn  <?= $current_page == 'signup.php' ? 'active' : ''; ?>">Signup</a>    
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div id="logoutModal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="closeModal()">&times;</span>
				<h3>Confirm Logout</h3>
				<p>Are you sure you want to log out?</p>
				<div>
					<button onclick="closeModal()" class="btn btn-secondary mt-3">Cancel</button>
		
                    <button type="button" class="btn btn-danger mt-3" onclick="window.location.href='../auth/logout.php'">Logout</button>
				</div>
			</div>
		</div>

		
<style>

.profile-dropdown {
    position: relative;
    display: inline-block;
}

.get-quote .btn.active {
    background-color: #000;
    color: #fff;
    border-color: #000;
}
.profile-btn {
    background: none;
    border: none;
    color: #333;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 120px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1;
}


.header .dropdown li.active > a {
    color: #1A76D1 !important;
    font-weight: bold;
}
.dropdown-content a {
    color: #333;
    padding: 10px 15px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    background-color: #f1f1f1;
}
.profile-dropdown:hover .dropdown-content {
    display: block;
}


 
</style>
			<!--/ End Header Inner -->
</header>

		<script>
			document.querySelector('.profile-btn').addEventListener('click', function() {
				const dropdown = document.querySelector('.dropdown-content');
				dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
			});


			function checkLoginStatus() {
					<?php if (!isset($_SESSION['first_name'])): ?>
						document.getElementById('loginModal').style.display = 'block';
					<?php else: ?>
						window.location.href = "../appointment/appointment.php";
					<?php endif; ?>
				}

				// Close the modal
				function closeModal() {
								document.getElementById('loginModal').style.display = 'none';
							}

				// Close modal on clicking outside
				window.onclick = function(event) {
					if (event.target == document.getElementById('loginModal')) {
						document.getElementById('loginModal').style.display = 'none';
					}
				};


				    // Show the logout modal
					function showLogoutModal() {
						document.getElementById('logoutModal').style.display = 'block';
					}

					// Close the modal
					function closeModal() {
						document.getElementById('logoutModal').style.display = 'none';
					}

					// Close the modal on clicking outside of it
					window.onclick = function (event) {
						if (event.target == document.getElementById('logoutModal')) {
							closeModal();
						}
					};

		</script>