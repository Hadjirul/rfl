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

<!-- View Appointment Modal -->
<div class="modal fade" id="viewAppointmentModal" tabindex="-1" aria-labelledby="viewAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAppointmentModalLabel">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Patient Name:</strong> <span id="patientName"></span></p>
                <p><strong>Doctor Name:</strong> <span id="doctorName"></span></p>
                <p><strong>Service:</strong> <span id="service"></span></p>
                <p><strong>Date:</strong> <span id="date"></span></p>
                <p><strong>Time:</strong> <span id="time"></span></p>
                <p><strong>Appointment Reason:</strong> <span id="appointmentReason"></span></p>
                <p><strong>Ocular History:</strong> <span id="ocularHistory"></span></p>
                <p><strong>Family Health History:</strong> <span id="familyHealthHistory"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="cancelForm">
          <div class="mb-3">
            <label for="cancelReason" class="form-label">Reason for Cancellation</label>
            <textarea class="form-control" id="cancelReason" name="cancelReason" rows="3" required></textarea>
          </div>
          <input type="hidden" id="appointmentId" name="appointmentId">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="submitCancel">Confirm Cancellation</button>
      </div>
    </div>
  </div>
</div>


<!-- View Cancellation Modal -->
<div class="modal fade" id="viewCancellationModal" tabindex="-1" aria-labelledby="viewCancellationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCancellationModalLabel">Cancellation Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="cancelReasonText">Loading...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    
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
        <?php if ($status === 'pending'): ?>
            <div class="d-flex align-items-center">
                <h6 class="text-muted mx-3 fst-italic fw-100"><?= $status ?></h6>
                <button 
                    type="button" 
                    class="btn btn-danger cancel-btn" 
                    data-bs-toggle="modal" 
                    data-bs-target="#cancelModal" 
                    data-id="<?= $row['id'] ?>">
                    <i class="fa fa-trash"></i> Cancel
                </button>
            </div>
        <?php elseif ($status === 'cancelled'): ?>
            <div class="d-flex align-items-center">
            <h6 class="text-danger mx-3 fst-italic fw-100"><?= $status ?></h6>
            <button 
                type="button" 
                class="btn btn-info view-cancellation-btn" 
                data-bs-toggle="modal" 
                data-bs-target="#viewCancellationModal" 
                data-id="<?= $row['id'] ?>">
                <i class="fa fa-eye"></i>Reason
            </button>
            </div>
  
            <?php elseif ($status === 'completed'): ?>
                <div class="d-flex align-items-center">
                <h6 class="text-success mx-3 fst-italic fw-100"><?= $status ?></h6>
            <button 
                type="button" 
                class="btn btn-info view-appointment-btn" 
                data-bs-toggle="modal" 
                data-bs-target="#viewAppointmentModal" 
                data-id="<?= $row['id'] ?>">
                <i class="fa fa-eye"></i> View
            </button>
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
    <script>
document.addEventListener("DOMContentLoaded", () => {
    const viewButtons = document.querySelectorAll(".view-appointment-btn");
    const viewAppointmentModal = new bootstrap.Modal(document.getElementById("viewAppointmentModal"));
    
    // Select modal elements
    const patientName = document.getElementById("patientName");
    const doctorName = document.getElementById("doctorName");
    const service = document.getElementById("service");
    const date = document.getElementById("date");
    const time = document.getElementById("time");
    const appointmentReason = document.getElementById("appointmentReason");
    const ocularHistory = document.getElementById("ocularHistory");
    const familyHealthHistory = document.getElementById("familyHealthHistory");

    // Fetch appointment details when the modal is shown
    viewButtons.forEach(button => {
        button.addEventListener("click", () => {
            const appointmentId = button.getAttribute("data-id");

            // Send AJAX request to fetch appointment details
            fetch("get_appointment_details.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ appointmentId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Populate the modal with the fetched data
                    patientName.textContent = data.appointment.first_name + " " + data.appointment.last_name;
                    doctorName.textContent = data.appointment.doctor_first_name + " " + data.appointment.doctor_last_name;
                    service.textContent = data.appointment.service;
                    date.textContent = data.appointment.date;
                    time.textContent = data.appointment.time;
                    appointmentReason.textContent = data.appointment.appointment_reason || "Not provided.";
                    ocularHistory.textContent = data.appointment.ocular_history || "Not provided.";
                    familyHealthHistory.textContent = data.appointment.family_health_history || "Not provided.";
                } else {
                    alert("Failed to retrieve appointment details.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while fetching appointment details.");
            });

            // Show the modal
            viewAppointmentModal.show();
        });
    });
});



document.addEventListener("DOMContentLoaded", () => {
    const viewButtons = document.querySelectorAll(".view-cancellation-btn");
    const viewCancellationModal = new bootstrap.Modal(document.getElementById("viewCancellationModal"));
    const cancelReasonText = document.getElementById("cancelReasonText");

    // Fetch cancellation reason when the modal is shown
    viewButtons.forEach(button => {
        button.addEventListener("click", () => {
            const appointmentId = button.getAttribute("data-id");

            // Send AJAX request to fetch cancellation reason
            fetch("get_cancellation_reason.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ appointmentId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cancelReasonText.textContent = data.cancelReason || "No reason provided.";
                } else {
                    cancelReasonText.textContent = "Failed to retrieve the reason.";
                }
            })
            .catch(error => {
                console.error("Error:", error);
                cancelReasonText.textContent = "An error occurred.";
            });
        });
    });
});



alertify.set('notifier', 'position', 'top-right'); // Set the notification position
alertify.set('notifier', 'delay', 5); // Set the display duration in seconds

        document.addEventListener("DOMContentLoaded", () => {
  const cancelButtons = document.querySelectorAll(".cancel-btn");
  const cancelModal = new bootstrap.Modal(document.getElementById("cancelModal"));
  const appointmentIdInput = document.getElementById("appointmentId");
  const cancelReasonInput = document.getElementById("cancelReason");
  const submitCancelButton = document.getElementById("submitCancel");

  // Set appointment ID when the modal is shown
  cancelButtons.forEach(button => {
    button.addEventListener("click", () => {
      const appointmentId = button.getAttribute("data-id");
      appointmentIdInput.value = appointmentId;
    });
  });
  submitCancelButton.addEventListener("click", () => {
    const appointmentId = appointmentIdInput.value;
    const cancelReason = cancelReasonInput.value;

    if (!cancelReason) {
        alertify.error("Please provide a reason for cancellation.");
        return;
    }

    // Send AJAX request
    fetch("cancel_appointment.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ appointmentId, cancelReason }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alertify.success("Appointment canceled successfully.");
                setTimeout(() => {
                    location.reload(); // Refresh the page after success message
                }, 2000); // Wait 2 seconds before reloading
            } else {
                alertify.error(data.message || "Failed to cancel the appointment. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alertify.error("An error occurred. Please try again.");
        });

    // Close the modal
    cancelModal.hide();
});

});

    </script>
    <script src="appointment.js"></script>
</body>
</html>