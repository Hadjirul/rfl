<?php
session_start();

include '../database/connection.php';

// Initialize variables
$error_message = "";
$info_message = "";

// Check if a message is passed in the URL
if (isset($_GET['message'])) {
    $info_message = htmlspecialchars($_GET['message']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = "Please enter both email and password.";
    } else {
        // Check in Admin table first
        $sql_admin = "SELECT * FROM admin WHERE email = ?";
        $stmt_admin = $conn->prepare($sql_admin);
        $stmt_admin->bind_param('s', $email);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();

        if ($result_admin->num_rows == 1) {
            // Admin account found, now check password
            $admin = $result_admin->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['user_id'] = $admin['id'];
                $_SESSION['name'] = $admin['name'];
                $_SESSION['role'] = 'admin';

                header("Location: ../admin/src/index.php");
                exit();
            } else {
                $error_message = "Invalid password for admin account.";
            }
        } else {
            // Check in Doctor table
            $sql_doctor = "SELECT * FROM doctors WHERE email = ?";
            $stmt_doctor = $conn->prepare($sql_doctor);
            $stmt_doctor->bind_param('s', $email);
            $stmt_doctor->execute();
            $result_doctor = $stmt_doctor->get_result();

            if ($result_doctor->num_rows == 1) {
                $doctor = $result_doctor->fetch_assoc();
                if (password_verify($password, $doctor['password'])) {
                    $_SESSION['user_id'] = $doctor['id'];
                    $_SESSION['first_name'] = $doctor['first_name'];
                    $_SESSION['role'] = 'doctor';

                    header("Location: ../doctor/dashboard.php");
                    exit();
                } else {
                    $error_message = "Invalid password for doctor account.";
                }
            } else {
                // Check in Users table
                $sql_user = "SELECT * FROM users WHERE email = ?";
                $stmt_user = $conn->prepare($sql_user);
                $stmt_user->bind_param('s', $email);
                $stmt_user->execute();
                $result_user = $stmt_user->get_result();

                if ($result_user->num_rows == 1) {
                    $user = $result_user->fetch_assoc();
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['first_name'] = $user['first_name'];
                        $_SESSION['role'] = 'user';

                        header("Location: ../index.php");
                        exit();
                    } else {
                        $error_message = "Invalid password for user account.";
                    }
                } else {
                    $error_message = "No account found with that email.";
                }
            }
        }
    }
}

$conn->close();
?>


<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rfl Eye Care</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
        body {
            background-color: #ffffff;
        }

        .login-form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #000000;
            margin-bottom: 1in;
        }

        .centered-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            padding-right: 40px; /* Add padding to make space for the eye icon */
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

        .position-relative {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
            font-size: 1.2em;
        }
    </style>
<body>

<div class="container centered-section">
    <div class="login-form-container">
        <h2 class="text-center">Login</h2>

        <?php if (!empty($info_message)): ?> <!-- Display info message -->
            <p class="alert alert-info text-center"><?php echo $info_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?> <!-- Display error message -->
            <p class="alert alert-danger text-center"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group position-relative">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <i class="fa fa-eye toggle-password" id="togglePassword"></i>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>

            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>

            <div class="text-center">
                <p>Don't have an account? <a href="signup.php">Signup here</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Script to toggle password visibility -->
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const passwordField = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
        this.classList.toggle("fa-eye-slash");
    });
</script>

</body>
</html>











