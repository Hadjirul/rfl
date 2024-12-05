<?php
// get_appointment_details.php

require_once('../../../database/connection.php');
header('Content-Type: application/json');

// Get the appointment ID from the request
$data = json_decode(file_get_contents('php://input'), true);
$appointmentId = $data['appointmentId'];

if (!$appointmentId) {
    echo json_encode(['success' => false, 'message' => 'No appointment ID provided.']);
    exit();
}

try {
    // Query to fetch appointment details
    $query = "
        SELECT 
            a.first_name, 
            a.last_name, 
            a.service, 
            a.date, 
            a.time, 
            a.appointment_reason, 
            a.ocular_history, 
            a.family_health_history,
            d.first_name AS doctor_first_name, 
            d.last_name AS doctor_last_name
        FROM appointments a
        LEFT JOIN doctor d ON a.doctor_id = d.id
        WHERE a.id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
        echo json_encode(['success' => true, 'appointment' => $appointment]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Appointment not found.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
