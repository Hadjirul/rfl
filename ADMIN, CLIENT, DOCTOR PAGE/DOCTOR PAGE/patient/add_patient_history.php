<?php
require_once('../../../database/connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user_id and other appointment details from the form
    $user_id = $_POST['user_id'];
    $ocular_history = $_POST['ocular_history'];
    $family_health_history = $_POST['family_health_history'];
    $appointment_reason = $_POST['appointment_reason'];
    $date_held = $_POST['date_held'];
    $time = $_POST['time'];
    $service = $_POST['service'];
    $doctor_id = $_POST['doctor_id'];
    $findings = $_POST['findings'];
    $diagnostics = $_POST['diagnostics'];
    $prescription = $_POST['prescription'];

    // Insert the appointment details into the database
    $query = "INSERT INTO appointments (user_id, ocular_history, family_health_history, appointment_reason, date, time, service, doctor_id, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'completed')";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('isssssss', $user_id, $ocular_history, $family_health_history, $appointment_reason, $date_held, $time, $service, $doctor_id);

        $stmt->execute();

        // Get the inserted appointment ID
        $appointment_id = $stmt->insert_id;

        // Insert findings, diagnostics, and prescription into the findings table
        $query_findings = "INSERT INTO findings (appointment_id, findings, diagnostics, prescription) 
                           VALUES (?, ?, ?, ?)";

        if ($stmt_findings = $conn->prepare($query_findings)) {
            $stmt_findings->bind_param('isss', $appointment_id, $findings, $diagnostics, $prescription);
            $stmt_findings->execute();
        }

        echo "Appointment added successfully!";
    } else {
        echo "Error: Unable to add appointment.";
    }
}
?>
