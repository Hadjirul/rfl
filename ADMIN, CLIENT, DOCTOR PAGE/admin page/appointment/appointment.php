<?php
session_start();
include '../../include/header.admin.php';


echo '<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />';
echo '<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>';

// Check if there is a session message
if (isset($_SESSION['alertify'])) {
    $message = $_SESSION['alertify'];
    $message_type = isset($_SESSION['message_type']) ? $_SESSION['message_type'] : 'success'; // Default to success

    // Set the position of the alert message to upper center
    echo "<script type='text/javascript'>
        alertify.set('notifier', 'position', 'top-center'); // Set position to top-center
        alertify.$message_type('$message'); // Show the message
    </script>";

    // Clear session message
    unset($_SESSION['alertify']);
    unset($_SESSION['message_type']);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MyAppointment';
    $appointment_page = 'active';
    require_once('../../include/head.php');
    require_once('../../../database/connection.php'); // Include your DB connection file
?>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
            <?php
                $appointment = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                            <h2 class="h3 brand-color pt-3 pb-2">Appointments</h2>
                        </div>
                        <div class="col-lg-2 mt-3">
                            <div id="MyButtons" class="mb-md-2 col-12 col-md-auto"></div>
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
                                                <option value="Approve">Pending</option>
                                                <option value="Add info">Approve</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>
                                        <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                            <div class="input-group">
                                                <input type="text" name="keyword" id="keyword" placeholder="Search" class="form-control">
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

                        <?php
                            // Fetch appointments with user first and last names using a JOIN query
                            $query = "SELECT 
                                          a.*, 
                                          CONCAT(u.first_name, ' ', u.last_name) AS user_full_name 
                                      FROM 
                                          appointments a 
                                      JOIN 
                                          users u 
                                      ON 
                                          a.user_id = u.id"; // Adjust table and column names as needed
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                $appointments = $result->fetch_all(MYSQLI_ASSOC);
                            } else {
                                $appointments = [];
                            }
                        ?>
 <table id="employee" class="table table-striped table-sm">
    <thead>
        <tr class="text-center">
            <th scope="col" width="5%">#</th>
            <th scope="col">Patient's Name</th>
            <th scope="col">Doctor's Name</th>
            <th scope="col">Service</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col" width="29%" class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
<?php
$counter = 1;
foreach ($appointments as $appointment) {
    echo "<tr id='appointmentRow{$appointment['id']}'>";
    echo "<td>{$counter}</td>";
    echo "<td>{$appointment['user_full_name']}</td>";
    echo "<td>{$appointment['doctor']}</td>";
    echo "<td>{$appointment['service']}</td>";
    echo "<td>{$appointment['date']}</td>";
    echo "<td>{$appointment['time']}</td>";
    echo "<td class='text-center'>";

    // Show "Approve" button if status is "Pending"
    if ($appointment['status'] == 'pending') {
        echo             "<button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#viewModal{$appointment['id']}'>View</button>
         <button 
        type='button' 
        id='approveBtn{$appointment['id']}' 
        class='btn btn-success btn-sm' 
        data-bs-toggle='modal' 
        data-bs-target='#approveModal{$appointment['id']}'>
        Approve
    </button>
        <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#cancelModal{$appointment['id']}'>Cancel</button>";
    }
    // Show "Add Info" and "Delete" buttons if status is "Approved"
    elseif ($appointment['status'] == 'approved') {
        echo "
        <button class='btn btn-sm btn-info' onclick='openAddInfoModal({$appointment['id']})'>Add Info</button>
        <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal{$appointment['id']}'>
            Delete
        </button>
    ";
    }
    elseif ($appointment['status'] == 'cancelled') {
        echo "
        <span class='text-danger'>Cancelled</span>
         <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal{$appointment['id']}'>
        Delete
    </button>
        ";
    }
    elseif ($appointment['status'] == 'completed') {
        echo "
        <span class='text-success'>Completed</span>
         <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal{$appointment['id']}'>
        Delete
    </button>
        ";
    }
    echo "</td>";
    echo "</tr>";

        // Modal for View Appointment
        echo "
        <div class='modal fade' id='viewModal{$appointment['id']}' tabindex='-1' aria-labelledby='viewModalLabel{$appointment['id']}' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='viewModalLabel{$appointment['id']}'>Appointment Details</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p><strong>Patient Name:</strong> {$appointment['user_full_name']}</p>
                        <p><strong>Doctor:</strong> {$appointment['doctor']}</p>
                        <p><strong>Service:</strong> {$appointment['service']}</p>
                        <p><strong>Date:</strong> {$appointment['date']}</p>
                        <p><strong>Time:</strong> {$appointment['time']}</p>
                        <p><strong>Status:</strong> {$appointment['status']}</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
        ";

        // Modal for Approve Appointment
        echo "
        <div class='modal fade' id='approveModal{$appointment['id']}' tabindex='-1' aria-labelledby='approveModalLabel{$appointment['id']}' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='approveModalLabel{$appointment['id']}'>Confirm Approval</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Are you sure you want to approve this appointment?</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                <button type='button' class='btn btn-success' onclick='approveAppointment({$appointment['id']})' data-bs-dismiss='modal'>Approve</button>
                    </div>
                </div>
            </div>
        </div>
        ";

        // Modal for Cancel Appointment
        echo "
        <div class='modal fade' id='cancelModal{$appointment['id']}' tabindex='-1' aria-labelledby='cancelModalLabel{$appointment['id']}' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='cancelModalLabel{$appointment['id']}'>Confirm Cancellation</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Are you sure you want to cancel this appointment?</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<button type='button' class='btn btn-danger' onclick='cancelAppointment({$appointment['id']})' data-bs-dismiss='modal'>Delete</button>
                    </div>
                </div>
            </div>
        </div>
        ";

        // Modal for delete confirmation
        echo "
        <div class='modal fade' id='deleteModal{$appointment['id']}' tabindex='-1' aria-labelledby='deleteModalLabel{$appointment['id']}' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel{$appointment['id']}'>Confirm Deletion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        Are you sure you want to delete this appointment? This action cannot be undone.
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                        <button type='button' class='btn btn-danger' onclick='deleteAppointment({$appointment['id']})' data-bs-dismiss='modal'>Delete</button>
                    </div>
                </div>
            </div>
        </div>
        ";
        
        $counter++;
    }
    ?>
    </tbody>
    </table>

    <div class="modal fade" id="addInfoModal" tabindex="-1" aria-labelledby="addInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoModalLabel">Add Appointment Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addInfoForm">
                    <input type="hidden" id="appointmentId" name="appointment_id">
                    <div class="mb-3">
                        <label for="history" class="form-label">History</label>
                        <textarea class="form-control" id="history" name="history" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="findings" class="form-label">Findings</label>
                        <textarea class="form-control" id="findings" name="findings" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="diagnostics" class="form-label">Diagnostics</label>
                        <textarea class="form-control" id="diagnostics" name="diagnostics" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prescription" class="form-label">Prescription</label>
                        <textarea class="form-control" id="prescription" name="prescription" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" onclick="saveFindings()">Save Info</button>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </main>
        <?php
            require_once('../../include/js.php');
        ?>

<script>
function deleteAppointment(id) {
    if (!id) return;

    // Send AJAX request to delete the appointment
    $.ajax({
        url: 'delete_appointment.php', // PHP script to handle deletion
        type: 'POST',
        data: { appointment_id: id },
        success: function(response) {
            const result = JSON.parse(response);

            if (result.success) {
                // Remove the row immediately from the table
                $('#appointmentRow' + id).fadeOut(400, function() {
                    $(this).remove(); // Completely remove the row after fade-out
                });

                // Display success message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.success(result.message);
            } else {
                // Display error message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.error(result.message);
            }
        },
        error: function() {
            // Display error message in case of a failed request
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('An error occurred while trying to delete the appointment.');
        }
    });
}


function approveAppointment(id) {
    if (!id) return;

    // Send AJAX request to approve the appointment
    $.ajax({
        url: 'approve_appointment.php', // PHP script to handle approval
        type: 'POST',
        data: { appointment_id: id },
        success: function(response) {
            const result = JSON.parse(response);

            if (result.success) {
                // Update the row dynamically
                const row = $('#appointmentRow' + id);
                row.find('.btn').remove(); // Remove all buttons from the action column

                // Add "Add Info" and "Delete" buttons
                row.find('.text-center').html(`
                    <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='add_info.php?id=${id}'">Add Info</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteAppointment(${id})">Delete</button>
                `);

                // Display success message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.success(result.message);
            } else {
                // Display error message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.error(result.message);
            }
        },
        error: function() {
            // Display error message in case of a failed request
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('An error occurred while trying to approve the appointment.');
        }
    });
}


function cancelAppointment(id) {
    if (!id) return;

    // Send AJAX request to cancel the appointment
    $.ajax({
        url: 'cancel_appointment.php', // PHP script to handle cancellation
        type: 'POST',
        data: { appointment_id: id },
        success: function(response) {
            const result = JSON.parse(response);

            if (result.success) {
                // Update the row status dynamically
                const row = $('#appointmentRow' + id);
                row.find('.btn').remove(); // Remove all buttons in the row
                row.find('.text-center').html(`
                    <span class="text-danger">Cancelled</span>
                    <button class="btn btn-sm btn-danger ms-2" onclick="deleteAppointment(${id})">Delete</button>
                `);

                // Display success message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.success(result.message);
            } else {
                // Display error message using AlertifyJS
                alertify.set('notifier', 'position', 'top-center');
                alertify.error(result.message);
            }
        },
        error: function() {
            // Display error message in case of a failed request
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('An error occurred while trying to cancel the appointment.');
        }
    });
}


function openAddInfoModal(appointmentId) {
    // Set the appointment ID in the hidden input field
    $('#appointmentId').val(appointmentId);

    // Show the modal
    $('#addInfoModal').modal('show');
}

function save() {
    const formData = $('#addInfoForm').serialize(); // Serialize form data

    // Send AJAX request to save findings and update the appointment status in the same request
    $.ajax({
        url: 'add_info.php', // Backend script for both saving findings and updating status
        type: 'POST',
        data: formData,
        success: function(response) {
            const result = JSON.parse(response);

            if (result.success) {
                // Close the modal on success
                $('#addInfoModal').modal('hide');
                alertify.success(result.message);

                const appointmentId = $('#appointmentId').val();

                // Update the status text and actions dynamically
                $(`#status-${appointmentId}`).text('Completed'); // Update status text
                $(`#actions-${appointmentId}`).html(`
                    <button class="btn btn-danger btn-sm" onclick="deleteAppointment(${appointmentId})">Delete</button>
                `); // Replace actions with the delete button
            } else {
                alertify.error(result.message); // Error message if something went wrong
            }
        },
        error: function() {
            alertify.error('An error occurred while saving information.');
        }
    });
}

</script>
        <script src="appointment.js"></script>

        
    </body>
</html>
