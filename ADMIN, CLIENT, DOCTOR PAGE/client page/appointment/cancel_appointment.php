<?php
require_once('../../../database/connection.php');

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON payload
    $input = json_decode(file_get_contents('php://input'), true);

    $appointmentId = $input['appointmentId'] ?? null;
    $cancelReason = $input['cancelReason'] ?? null;

    if ($appointmentId && $cancelReason) {
        try {
            // Update the appointment status and save the cancellation reason
            $stmt = $conn->prepare("UPDATE appointments SET status = 'cancelled', cancel_reason = ? WHERE id = ?");
            $stmt->bind_param("si", $cancelReason, $appointmentId);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No rows affected.']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    }
}
?>
