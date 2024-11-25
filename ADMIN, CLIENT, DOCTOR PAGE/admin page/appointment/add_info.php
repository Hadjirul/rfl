<?php
require_once('../../../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $history = $_POST['history'];
    $findings = $_POST['findings'];
    $diagnostics = $_POST['diagnostics'];
    $prescription = $_POST['prescription'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert findings
        $stmt = $conn->prepare("INSERT INTO findings (appointment_id, history, findings, diagnostics, prescription) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $appointment_id, $history, $findings, $diagnostics, $prescription);
        $stmt->execute();

        // Update appointment status to "Completed"
        $stmt = $conn->prepare("UPDATE appointments SET status = 'Completed' WHERE id = ?");
        $stmt->bind_param("i", $appointment_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();

        // Return success response
        echo json_encode(['success' => true, 'message' => 'Information saved and status updated to Completed.']);
    } catch (Exception $e) {
        // Rollback transaction on failure
        $conn->rollback();

        // Return error response
        echo json_encode(['success' => false, 'message' => 'Failed to save information or update status.']);
    }

    // Clean up
    $stmt->close();
    $conn->close();
} else {
    // Invalid request
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
