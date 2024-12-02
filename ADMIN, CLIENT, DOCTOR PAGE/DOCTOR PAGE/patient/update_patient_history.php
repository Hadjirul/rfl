<?php
require_once('../../../database/connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the appointment_id and other appointment details from the form
    $appointment_id = $_POST['appointment_id'];
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

    // Update the appointment details in the appointments table
    $query = "UPDATE appointments SET ocular_history = ?, family_health_history = ?, appointment_reason = ?, 
              date = ?, time = ?, service = ?, doctor_id = ? WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('sssssssi', $ocular_history, $family_health_history, $appointment_reason, 
                         $date_held, $time, $service, $doctor_id, $appointment_id);

        if ($stmt->execute()) {
            // Update findings, diagnostics, and prescription in the findings table
            $query_findings = "UPDATE findings SET findings = ?, diagnostics = ?, prescription = ? 
                               WHERE appointment_id = ?";

            if ($stmt_findings = $conn->prepare($query_findings)) {
                $stmt_findings->bind_param('sssi', $findings, $diagnostics, $prescription, $appointment_id);
                if ($stmt_findings->execute()) {
                    echo "Appointment updated successfully!";
                } else {
                    echo "Error: Unable to update findings.";
                }
            } else {
                echo "Error: Unable to prepare findings update query.";
            }
        } else {
            echo "Error: Unable to update appointment.";
        }
    } else {
        echo "Error: Unable to prepare appointment update query.";
    }
}
?>
