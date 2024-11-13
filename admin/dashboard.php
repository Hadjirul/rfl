<?php
session_start();
include 'navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-width: 250px;
            background-color: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #ddd;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .sidebar h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin: 10px 0;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: blue; /* Blue background on hover and active */
            color: white; /* White text on hover and active */
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>


<div class="content">
    <h1>Welcome, Admin</h1>
    <p>This is your dashboard where you can manage appointments and view patient details.</p>
    <!-- Add more dashboard content here -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
