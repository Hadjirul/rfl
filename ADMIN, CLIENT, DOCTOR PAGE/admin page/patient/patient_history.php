<?php
session_start();
include '../../include/header.admin.php';
require_once('../../../database/connection.php');

$doctorQuery = "SELECT id, first_name, last_name FROM doctor";
$doctorStmt = $conn->prepare($doctorQuery);
$doctorStmt->execute();
$doctorResult = $doctorStmt->get_result();
$doctors = $doctorResult->fetch_all(MYSQLI_ASSOC);


// Validate and fetch user_id from GET request
if (!isset($_GET['user_id'])) {
    echo "Error: ";
    exit;
}

$user_id = $_GET['user_id'];

// Fetch patient details
$patientQuery = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($patientQuery);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$patientResult = $stmt->get_result();
$patient = $patientResult->fetch_assoc();

if (!$patient) {
    echo "Error: Patient not found.";
    exit;
}

// Fetch completed appointments
$appointmentsQuery = "
    SELECT 
        a.id AS appointment_id,
        a.date AS date_held,
        a.service,
        a.ocular_history,
        a.family_health_history,
        a.appointment_reason,
        d.first_name AS doctor_first_name,
        d.last_name AS doctor_last_name,
        f.findings,
        f.diagnostics,
        f.prescription
    FROM appointments a
    LEFT JOIN findings f ON a.id = f.appointment_id
    LEFT JOIN doctor d ON a.doctor_id = d.id
    WHERE a.user_id = ? AND a.status = 'completed'
    ORDER BY a.date DESC";
$stmt = $conn->prepare($appointmentsQuery);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$appointmentsResult = $stmt->get_result();
$appointments = $appointmentsResult->fetch_all(MYSQLI_ASSOC);

// Count completed bookings
$bookingCount = count($appointments);
?>

<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Patient History';
require_once('../../include/head.php');
?>
<body>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once('../include/sidepanel.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Patient's History</h2>
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
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for patient's history" class="form-control">
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


                <div class="row">
                    <div class="col-3">
                        <h5><?= htmlspecialchars($patient['first_name'] . ' ' . $patient['last_name']) ?></h5>
                        <p style="font-size:13px;"><?= htmlspecialchars($patient['email']) ?></p>
                    </div>
                    <div class="col-4 pt-1">
                        <h5 class="fw-bold">No. of Appointments Made</h5>
                        <h2 class="fw-bolder text-primary pt-1"><?= $bookingCount ?></h2>
                    </div>
                </div>

                <div class="table-responsive overflow-hidden">
                    <table id="employee" class="table table-primary table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Held</th>
                            <th>Service</th>
                            <th>Doctor</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($bookingCount > 0): ?>
                            <?php $counter = 1; ?>
                            <?php foreach ($appointments as $appointment): ?>
                                <tr class = "">
                                    <td><?= $counter ?></td>
                                    <td><?= htmlspecialchars($appointment['date_held']) ?></td>
                                    <td><?= htmlspecialchars($appointment['service']) ?></td>
                                    <td><?= htmlspecialchars($appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name']) ?></td>
                                    <td>
                                        <button class="btn btn-info view-modal-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#viewModal" 
                                                data-ocular-history="<?= htmlspecialchars($appointment['ocular_history']) ?>"
                                                data-family-history="<?= htmlspecialchars($appointment['family_health_history']) ?>"
                                                data-reason="<?= htmlspecialchars($appointment['appointment_reason']) ?>"
                                                data-date-held="<?= htmlspecialchars($appointment['date_held']) ?>"
                                                data-service="<?= htmlspecialchars($appointment['service']) ?>"
                                                data-doctor="<?= htmlspecialchars($appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name']) ?>"
                                                data-findings="<?= htmlspecialchars($appointment['findings'] ?? 'N/A') ?>"
                                                data-diagnostics="<?= htmlspecialchars($appointment['diagnostics'] ?? 'N/A') ?>"
                                                data-prescription="<?= htmlspecialchars($appointment['prescription'] ?? 'N/A') ?>">
                                            View
                                        </button>
                                        <button 
                                            class="btn btn-danger delete-modal-btn" 
                                            data-id="<?= $appointment['appointment_id'] ?>">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <?php $counter++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No completed appointments found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end align-items-end mt-1">
        <h3 style="color: #0008BD" class="pt-2">Add</h3>
        <button class="btn btn-outline-secondary btn-add" type="button" data-bs-toggle="modal" data-bs-target="#walkin_historyAddModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
                </div>
            </main>
        </div>
    </div>
</main>

<!-- View Modal -->
<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Ocular History:</strong> <span id="ocular-history"></span>
                </div>
                <div class="mb-3">
                    <strong>Family Health History:</strong> <span id="family-history"></span>
                </div>
                <div class="mb-3">
                    <strong>Appointment Reason:</strong> <span id="appointment-reason"></span>
                </div>
                <div class="mb-3">
                    <strong>Date Held:</strong> <span id="date-held"></span>
                </div>
                <div class="mb-3">
                    <strong>Service:</strong> <span id="service"></span>
                </div>
                <div class="mb-3">
                    <strong>Doctor:</strong> <span id="doctor"></span>
                </div>
                <div class="mb-3">
                    <strong>Findings:</strong> <span id="findings"></span>
                </div>
                <div class="mb-3">
                    <strong>Diagnostics:</strong> <span id="diagnostics"></span>
                </div>
                <div class="mb-3">
                    <strong>Prescription:</strong> <span id="prescription"></span>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="print-modal-content">Print</button>
            </div>
        </div>
    </div>
</div>
                            


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this appointment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Appointment Details Modal -->
<div class="modal fade" id="walkin_historyAddModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="addPatientHistoryForm">
            <!-- Hidden field to store the user_id -->
            <input type="hidden" name="user_id" value="<?= $user_id ?>">

            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="ocular_history" class="form-label">Ocular History</label>
                    <textarea id="ocular_history" name="ocular_history" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="family_health_history" class="form-label">Family Health History</label>
                    <textarea id="family_health_history" name="family_health_history" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="appointment_reason" class="form-label">Appointment Reason</label>
                    <textarea id="appointment_reason" name="appointment_reason" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="date_held" class="form-label">Date Held</label>
                    <input type="date" id="date_held" name="date_held" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" id="time" name="time" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Service</label>
                    <input type="text" id="service" name="service" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        <option value="" disabled selected>Select a Doctor</option>
                        <?php foreach ($doctors as $doctor): ?>
                            <option value="<?= $doctor['id'] ?>">
                                <?= htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="findings" class="form-label">Findings</label>
                    <textarea id="findings" name="findings" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="diagnostics" class="form-label">Diagnostics</label>
                    <textarea id="diagnostics" name="diagnostics" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="prescription" class="form-label">Prescription</label>
                    <textarea id="prescription" name="prescription" class="form-control" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
  // Set Alertify to display notifications at the top center
  alertify.set('notifier', 'position', 'top-center');

  $('#appointmentForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    $.ajax({
      url: 'add_patient_history.php', // PHP file that processes the form
      type: 'POST',
      data: $(this).serialize(), // Serialize form data
      success: function (response) {
        // Display success message using Alertify
        alertify.success('Patient history added successfully!');
        $('#successMessage').html(response);
        $('#walkin_historyAddModal').modal('hide');
      },
      error: function () {
        // Display error message using Alertify
        alertify.error('Error occurred while submitting the form.');
      }
    });
  });
});


</script>

<?php require_once('../../include/js.php'); ?>
<script src="patient.js"></script>
</body>
</html>
