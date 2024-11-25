<?php
require_once('../../../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // Prepare the query to update the appointment status
    $query = "UPDATE appointments SET status = 'Approved' WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $appointment_id);
        if ($stmt->execute()) {
            // Return success response
            echo json_encode([
                'success' => true,
                'message' => 'Appointment successfully approved!'
            ]);
        } else {
            // Return error response if execution fails
            echo json_encode([
                'success' => false,
                'message' => 'Failed to approve appointment.'
            ]);
        }
        $stmt->close();
    } else {
        // Return error response if the query preparation fails
        echo json_encode([
            'success' => false,
            'message' => 'Error preparing the query.'
        ]);
    }

    $conn->close();
} else {
    // Invalid request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request.'
    ]);
}
?>
