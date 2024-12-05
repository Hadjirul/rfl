<?php 
include '../../database/connection.php';
$showModal = false; 
$error_message = "";

// Example of inserting a new user (ensure you validate and sanitize user input)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $middle_name = trim($_POST['middle_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $street_address = trim($_POST['street_address']);
    $street_address_line_2 = trim($_POST['street_address_line_2']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $zip_code = trim($_POST['zip_code']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if all required fields are filled
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($street_address) || empty($city) || empty($province) || empty($zip_code) || empty($password) || empty($confirm_password)) {
        $error_message = "Please fill in all required fields.";
    } else {
        // Validate email uniqueness
        $email_check = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($email_check->num_rows > 0) {
            $error_message = "Email already in use.";
        } elseif ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } elseif (strlen($password) < 12 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $error_message = "Password must be at least 12 characters long and include at least one symbol.";
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // SQL statement to insert user details
            $sql = "INSERT INTO users (first_name, last_name, email, phone, street_address, street_address_line_2, city, province, zip_code, password, updated_at)
                    VALUES ('$first_name', '$last_name', '$email', '$phone', '$street_address', '$street_address_line_2', '$city', '$province', '$zip_code', '$hashed_password', NOW())";

            if ($conn->query($sql) === TRUE) {
                // Set showModal to true to show the modal
                $showModal = true;
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Close the connection
$conn->close();
?>




<?php
include "../header.php";

?>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success ml-3" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-3">
                You successfully created an account.
            </div>
            <div class="modal-footer text-center">
            <button type="button" class="btn btn-dark" data-dismiss="modal">OK</button>
            <button type="button" class="btn btn-primary"><a href="signin.php">Go to Login</a></button>

            </div>
        </div>
    </div>
</div>
<style>
body {
    background-image: url(../img/backround.jpg);
    background-size: cover;
     /* Solid background for the body */
}

.signup-form-container {
    max-width: 500px; /* Increased width */
    margin: auto;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid #000000;
    background-color: #ffffff; /* Solid white background for the form */
    opacity: 1; /* Ensure full opacity */
}

        .centered-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height to center vertically */
        }

        .form-group {
            margin-bottom: 10px; /* Reduced margin */
        }

        .form-control {
            height: 38px; /* Reduced height */
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 30%;
            cursor: pointer;
            color: #007bff;
            font-size: 1.2em;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

        .password-checklist {
            display: none;
            font-size: 0.9em;
        }

        .password-checklist ul {
            list-style-type: none;
            padding: 0;
        }

        .valid {
            color: green;
        }

        .invalid {
            color: red;
        }
    label{
        color: black;
   
    }
    </style>
</head>
<body>

<!-- Navbar will stay fixed at the top -->
<div class="container centered-section my-2 py-5">
    <div class="signup-form-container">
        <h2 class="text-center mt-3 mb-3">Signup</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error-message text-center"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <!-- First Name, Middle Name, and Last Name on the same row -->
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="middleName">Middle Name:</label>
                    <input type="text" name="middle_name" class="form-control" id="middleName" placeholder="Middle name">
                </div>
                <div class="form-group col-md-4">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Last name" required>
                </div>
            </div>

            <!-- Birthdate and Phone Number on the same row -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birthdate">Birthdate:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                </div>
            </div>

            <!-- Gender and Email on the same row -->
    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="gender">Gender:</label>
    <select name="gender" class="form-control" id="gender" required>
        <option value="" disabled selected>Select your gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
</div>
    <div class="form-group col-md-6">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
    </div>
</div>


            <!-- Address -->

            
            <div class="form-row">
    <div class="form-group col-6">
        <label for="province">Province:</label>
        <select class="form-control" id="province" name="province" required>
            <option value="" disabled selected>Select Province</option>
            <option value="Zamboanga Del Sur ">Zamboanga Del Sur </option>
            <option value="Zamboanga Del Norte">Zamboanga Del Norte</option>
            <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
            <!-- Add more provinces here -->
        </select>
    </div>
    <div class="form-group col-6">
        <label for="city">City:</label>
        <select class="form-control" id="city" name="city" required>
            <option value="" >Select City</option>
            <option value="Zamboanga" >Zamboanga City</option>

            <!-- Cities will populate based on the selected province -->
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-4">
        <label for="street_address">Barangay:</label>
        <select class="form-control" id="street_address" name="street_address" required>
            <option value="" disabled selected>Select </option>
            <option value=" Arena Blanco" > Arena Blanco</option>
            <option value="Tumaga" >Tumaga</option>
            <option value="Talon Talon" >Talon Talon</option>
            <option value="Zambowood" >Zambowood</option>

        </select>
    </div>
    <div class="form-group col-4">
        <label for="street_address_line_2">Street:</label>
        <input type="text" class="form-control" id="street_address_line_2" name="street_address_line_2" placeholder="Optional">
    </div>
    <div class="form-group col-4">
        <label for="zip_code">Zip Code:</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code" required>
    </div>
</div>


            <!-- Password and Confirm Password on the same row -->
            <div class="form-row">
                <div class="form-group col-md-6 position-relative">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <i class="fa fa-eye toggle-password" id="togglePassword" aria-hidden="true"></i>
                    <div class="password-checklist">
                        <ul>
                            <li id="length" class="invalid">At least 12 characters</li>
                            <li id="symbol" class="invalid">At least one symbol</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group col-md-6 position-relative">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
                    <i class="fa fa-eye toggle-password" id="toggleConfirmPassword" aria-hidden="true"></i>
                    <small id="passwordMatch" class="text-danger" style="display:none;">Passwords do not match.</small>
                </div>
            </div>

            <!-- Terms and Conditions Checkbox -->
            <div class="form-group">
                <div class="form-check text-center"> <!-- Center align the checkbox -->
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#" target="_blank">terms and conditions</a>.
                    </label>
                </div>
            </div>

            <div class="text-center">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Signup</button>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>


$(document).ready(function() {
        // Show the modal if the signup was successful
        <?php if ($showModal): ?>
            $('#successModal').modal('show');
        <?php endif; ?>
    });

    $(document).ready(function() {
        // Show the modal if the signup was successful
        <?php if ($showModal): ?>
            $('#successModal').modal('show');
        <?php endif; ?>

        // Password validation
        const passwordInput = $('#password');
        const confirmPasswordInput = $('#confirmPassword');
        const passwordChecklist = $('.password-checklist');
        const lengthCheck = $('#length');
        const symbolCheck = $('#symbol');

        passwordInput.on('input', function() {
            const password = $(this).val();
            passwordChecklist.show();

            // Check password length
            if (password.length >= 12) {
                lengthCheck.removeClass('invalid').addClass('valid');
            } else {
                lengthCheck.removeClass('valid').addClass('invalid');
            }

            // Check for symbol
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                symbolCheck.removeClass('invalid').addClass('valid');
            } else {
                symbolCheck.removeClass('valid').addClass('invalid');
            }
        });

        confirmPasswordInput.on('input', function() {
            if ($(this).val() === passwordInput.val()) {
                $('#passwordMatch').hide();
            } else {
                $('#passwordMatch').show();
            }
        });

        // Show/Hide password functionality using the icon
        $('.toggle-password').click(function() {
            const input = $(this).siblings('input');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>

<?php
include "../script.php";
?>
</body>
</html>
