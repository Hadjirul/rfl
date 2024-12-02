<?php
session_start();

// Include database connection
require_once('../../../database/connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if user is not logged in
    header("Location: /login.php");
    exit();
}

// Fetch user ID from the session
$user_id = $_SESSION['user_id'];

try {
    // Query to fetch appointments for the logged-in user
    $query = "
        SELECT 
            a.id, 
            a.first_name AS pname, 
            d.first_name AS doctor_first_name, 
            d.last_name AS doctor_last_name, 
            a.service, 
            a.date, 
            a.time, 
            a.status 
        FROM appointments a
        LEFT JOIN doctor d ON a.doctor_id = d.id
        WHERE a.user_id = ? 
        ORDER BY a.date DESC    
    ";

    // Prepare the query
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        throw new Exception("Failed to prepare the query: " . $conn->error);
    }

    // Bind the user ID parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if (!$result) {
        throw new Exception("Failed to fetch results: " . $stmt->error);
    }
} catch (Exception $e) {
    // Handle any errors
    die("Error: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MyAppointment';
    $appointment_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.user.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
            <?php
                $employee_page = 'active';
                require_once('../../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">My Apointment</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3  ">
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                    <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                                        <select name="employee-role" id="employee-role" class="form-select me-md-2">
                                            <option value="">All Appointments</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search" class="form-control">
                                            <button class="btn btn-outline-secondary brand-bg-color" type="button"><i class="fa fa-search color-white" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 m-6">
                            <button type="button" class="btn btn-primary p-2 fs-3 ">Filter</button>
                        </div>
                    </div>


                        
                    
                        <table id="employee" class="table table-primary table-striped">
                            <thead>
                                <tr class = "text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Patient's Name</th>
                                    <th scope="col">Doctor's Name</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" width="22%" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
            $doctor_name = $row['doctor_first_name'] . " " . $row['doctor_last_name'];
            $status = htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8');
    ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= htmlspecialchars($row['pname'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($doctor_name, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['service'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['time'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?php if ($status === 'Pending'): ?>
                        <div class="d-flex align-items-center">
                            <h6 class="text-muted mx-3 fst-italic fw-100"><?= $status ?></h6>
                            <button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button>
                        </div>
                    <?php else: ?>
                        <?= $status ?>
                    <?php endif; ?>
                </td>
            </tr>
    <?php
            $counter++;
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
    <script src="appointment.js"></script>
</body>
</html>