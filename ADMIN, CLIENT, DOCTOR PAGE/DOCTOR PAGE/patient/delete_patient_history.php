<?php
require_once('../../../database/connection.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $appointmentId = $input['appointment_id'] ?? null;

    if (!$appointmentId) {
        echo json_encode(['success' => false, 'error' => 'Invalid appointment ID.']);
        exit;
    }

    // Delete the appointment
    $deleteQuery = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $appointmentId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {    
        echo json_encode(['success' => false, 'error' => 'Failed to delete appointment.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
