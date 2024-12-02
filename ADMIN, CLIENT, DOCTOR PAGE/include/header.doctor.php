
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../pages/css/icofont.css">
    <title>Your Page Title</title>
</head>

<style>

.preloader {
  position: fixed;
  left: 0;
  width: 0;
  height: 100%;
  width: 100%;
  text-align: center;
  z-index: 9999999;
  -webkit-transition: .9s;
  transition: .9s;
}

.preloader .loader {
  position: absolute;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: inline-block;
  left: 0;
  right: 0;
  margin: 0 auto;
  top: 45%;
  -webkit-transform: translateY(-45%);
          transform: translateY(-45%);
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.preloader .loader .loader-outter {
  position: absolute;
  border: 4px solid #ffffff;
  border-left-color: transparent;
  border-bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  -webkit-animation: loader-outter 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
          animation: loader-outter 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
}

.preloader .loader .loader-inner {
  position: absolute;
  border: 4px solid #ffffff;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  left: calc(40% - 21px);
  top: calc(40% - 21px);
  border-right: 0;
  border-top-color: transparent;
  -webkit-animation: loader-inner 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
          animation: loader-inner 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
}

.preloader .loader .indicator {
  position: absolute;
  right: 0;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%) scale(1.5);
          transform: translateY(-50%) scale(1.5);
}

.preloader .loader .indicator svg polyline {
  fill: none;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.preloader .loader .indicator svg polyline#back {
  stroke: #ffffff;
}

.preloader .loader .indicator svg polyline#front {
  stroke: #1A76D1;
  stroke-dasharray: 12, 36;
  stroke-dashoffset: 48;
  -webkit-animation: dash 1s linear infinite;
          animation: dash 1s linear infinite;
}

.preloader::before, .preloader::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 60%;
  z-index: -1;
  background: #1A76D1;
  -webkit-transition: .9s;
  transition: .9s;
}

.preloader::after {
  left: auto;
  right: 0;
}

.preloader.preloader-deactivate {
  visibility: hidden;
}

.preloader.preloader-deactivate::after, .preloader.preloader-deactivate::before {
  width: 0;
}

.preloader.preloader-deactivate .loader {
  opacity: 0;
  visibility: hidden;
}


@-webkit-keyframes loader-outter {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes loader-outter {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@-webkit-keyframes loader-inner {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
  }
}

@keyframes loader-inner {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
  }
}

@-webkit-keyframes dash {
  62.5% {
    opacity: 0;
  }
  to {
    stroke-dashoffset: 0;
  }
}

@keyframes dash {
  62.5% {
    opacity: 0;
  }
  to {
    stroke-dashoffset: 0;
  }
}
/* Adjust the profile dropdown container to align items horizontally */
.profile-dropdown {
    position: relative;
    display: flex;
    align-items: center; /* Align items (profile image and button) horizontally */
}

/* Remove any unwanted styles on the dropdown button */
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

/* Styling the dropdown menu */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 120px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1;
    top: 100%; /* Position the dropdown below the button */
    right: 0;  /* Align it to the right */
}

/* Dropdown items styling */
.dropdown-content a {
    color: #333;
    text-decoration: none;
    display: block;
}

/* Hover effect for dropdown items */
.dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Show dropdown menu when hovering the profile */
.profile-dropdown:hover .dropdown-content {
    display: block;
}

/* Optionally, customize the profile button when active (focus or click) */
.get-quote .btn.active {
    background-color: #000;
    color: #fff;
    border-color: #000;
}

.modal .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}


.modal {
    background-color: rgba(0, 0, 0, 0.5); /* Dimmed background */
}

/* Modal Content */
.modal-content2 {
    background-color: white;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    text-align: center;
    border-radius: 8px;
    position: relative; /* Ensures child elements (close button) are positioned relative to this container */
}

/* Close Button */
.modal .close {
    position: absolute; /* Positions the button relative to modal content */
    top: 10px; /* 10px from the top edge */
    right: 15px; /* 15px from the right edge */
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.modal .close:hover,
.modal .close:focus {
    color: black;
    text-decoration: none;
}

/* Primary Color for Welcome Text */
.modal h3 {
    color: #007bff; /* Bootstrap primary color */
    font-size: 24px;
    margin-bottom: 10px;
}

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white; /* Or the desired background color */
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.2s ease, visibility 0.2s ease;
}
#preloader.hidden {
    opacity: 0;
    visibility: hidden;
}



</style>
<body>

<div id="preloader" class="preloader">
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

<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 admin shadow-sm">
    <div class="col-md-3 col-lg-2 admin-header">
        <a class="navbar-brand m-0 px-3 text-dark" href="#">
            <img style = "width: 200px;" src="../../../pages/img/logo.jpg" alt="">
        </a>
    </div>

    <!-- Move the icons to the left -->
   

    <button class="navbar-toggler d-md-none collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-primary"></span>
    </button>

    <?php if (isset($_SESSION['first_name'])): ?>
        <div class="profile-dropdown">
    <!-- Profile Picture -->
    <img 
        src="<?= isset($_SESSION['profile_picture']) ? htmlspecialchars($_SESSION['profile_picture']) : '../../../pages/img/noprofile.png'; ?>" 
        alt="Profile Picture" 
        class="rounded-circle ml-3" 
        width="40" 
        height="40"
    >
    
    <!-- Profile Button (Dropdown trigger) -->
    <button class="btn btn-outline dropdown-toggle profile-btn p-3" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="navbar-text-black p- m-0"><?= htmlspecialchars($_SESSION['first_name']); ?></span>
    </button>

    <!-- Dropdown Content -->
    <div class="dropdown-content" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="../../../pages/home/index.php">
            <i class="icofont-dashboard-web text-primary"></i> Go to homepage
        </a>
        <a class="dropdown-item" href="javascript:void(0);" onclick="showLogoutModal()">
            <i class="icofont-logout text-danger"></i> Logout
        </a>
    </div>
</div>
    <?php endif; ?>

    <div id="logoutModal" class="modal">
			<div class="modal-content2">
				<span class="close" onclick="closeModal()">&times;</span>
				<h3>Confirm Logout</h3>
				<p>Are you sure you want to log out?</p>
				<div>
					<button onclick="closeModal()" class="btn btn-secondary mt-3">Cancel</button>
					<a href="../logout.php" class="btn btn-danger mt-3">Log Out</a>
				</div>
			</div>
		</div>

</header>


<script src="../../../pages/js/main.js"></script>
<script src="../../../pages/js/jquery.magnific-popup.min.js"></script>
<script>

                        window.onload = function () {
                            const preloader = document.getElementById('preloader');
                            if (preloader) {
                                preloader.classList.add('hidden'); // Add hidden class for fade-out
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
<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
