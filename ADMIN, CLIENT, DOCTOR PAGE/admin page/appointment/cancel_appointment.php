<?php
// cancel_appointment.php
session_start();
require_once('../../../database/connection.php'); // Adjust path to your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_id = $_POST['appointment_id'];

    if (!empty($appointment_id)) {
        // Update the status of the appointment to 'cancelled'
        $query = "UPDATE appointments SET status = 'cancelled' WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $appointment_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Appointment successfully cancelled.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to cancel the appointment.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid appointment ID.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
