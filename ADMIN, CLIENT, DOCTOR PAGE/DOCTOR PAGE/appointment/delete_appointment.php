<?php
require_once('../../../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // Delete appointment query
    $query = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $appointment_id);
        if ($stmt->execute()) {
            // Return success response
            echo json_encode([
                'success' => true,
                'message' => 'Appointment successfully deleted!'
            ]);
        } else {
            // Return error response
            echo json_encode([
                'success' => false,
                'message' => 'Failed to delete appointment.'
            ]);
        }
        $stmt->close();
    } else {
        // Return error response
        echo json_encode([
            'success' => false,
            'message' => 'Error preparing query.'
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
