
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



</style>
<body>

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

<script>
    
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
