<?php
// Include database connection
session_start();
include '../database/connection.php';

// Initialize success and error message variables
$success_message = "";
$error_message = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if a file was uploaded
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        // Define the upload directory
        $upload_dir = 'uploads/';
        
        // Make sure the upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Get file info and set the upload path
        $file_tmp = $_FILES['picture']['tmp_name'];
        $file_name = basename($_FILES['picture']['name']);
        $picture_path = $upload_dir . $file_name;

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($file_tmp, $picture_path)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement
            $sql = "INSERT INTO admin (name, email, picture, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $name, $email, $picture_path, $hashed_password);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                $success_message = "Admin added successfully!";
            } else {
                if ($conn->errno === 1062) {
                    $error_message = "Email already exists. Please use a different email.";
                } else {
                    $error_message = "Error: " . $conn->error;
                }
            }

            // Close the statement
            $stmt->close();
        } else {
            $error_message = "Error uploading the picture.";
        }
    } else {
        $error_message = "Please upload a picture.";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Admin</h2>

        <!-- Display success or error message -->
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" class="form-control" id="picture" name="picture" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
        </form>
    </div>
</body>
</html>
