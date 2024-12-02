<?php
session_start();
include '../../include/header.admin.php';
require_once('../../../database/connection.php');

// Ensure session is active and admin is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Error: Admin not logged in.";
    exit;
}

// Fetch users with at least one completed appointment
$query = "
    SELECT DISTINCT
        u.id AS user_id,
        CONCAT(u.first_name, ' ', u.last_name) AS pname,
        u.email,
        u.birthdate AS bdate,
        u.phone AS cp_num
    FROM 
        appointments a
    JOIN 
        users u ON a.user_id = u.id
    WHERE 
        a.status = 'completed'
    ORDER BY 
        u.id ASC";

$result = $conn->query($query);

$Patient_array = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Patient_array[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Doctor';
$patient_page = 'active';
require_once('../../include/head.php');
?>
<body>
<main>
    <style>
table th, table td {
    text-align: center !important; /* Ensures centering */
}


    </style>
    <div class="container-fluid">
        <div class="row">
            <?php
            $patient_page = 'active';
            require_once('../include/sidepanel.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Patients</h2>
                    </div>
                    <div class="col-lg-2 mt-3">
                        <div id="MyButtons" class="mb-md-2 col-12 col-md-auto"></div>
                    </div>
                </div>

                <!-- Search and Filter Section -->
                <div class="row mb-2">
                    <div class="col-lg-8">
                        <div class="row border border-2">
                            <div class="row g-2 mb-2 m-0">
                                <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                    <div class="input-group">
                                        <input type="text" name="keyword" id="keyword" placeholder="Search for patient.." class="form-control">
                                        <button class="btn btn-outline-secondary brand-bg-color" type="button">
                                            <i class="fa fa-search color-white" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0 m-6">
                        <button type="button" class="btn btn-primary p-2 fs-3">Filter</button>
                    </div>
                </div>

                <!-- Patients Table -->
                <div class="table-responsive overflow-hidden">
    <table id="employee" class="table table-primary table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patient's Name</th>
                <th scope="col">Email</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Cellphone #</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($Patient_array)) {
                $counter = 1;
                foreach ($Patient_array as $item) {
                    ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= htmlspecialchars($item['pname']) ?></td>
                        <td><?= htmlspecialchars($item['email']) ?></td>
                        <td><?= htmlspecialchars($item['bdate']) ?></td>
                        <td><?= htmlspecialchars($item['cp_num']) ?></td>
                        <td>
                            <a href="patient_history.php?user_id=<?= $item['user_id'] ?>" class="btn btn-info">View Appointment History</a>
                        </td>
                    </tr>
                    <?php
                    $counter++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">No patients found with completed appointments.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
            </main>
        </div>
    </div>
</main>
<?php
require_once('../../include/js.php');
?>
<script src="patient.js"></script>
</body>
</html>
