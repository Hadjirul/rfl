<?php
require_once('../../../database/connection.php');

$data = json_decode(file_get_contents("php://input"), true);
$appointmentId = $data['appointmentId'];

if ($appointmentId) {
    try {
        // Query to get cancellation reason
        $query = "SELECT cancel_reason FROM appointments WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Failed to prepare the query: " . $conn->error);
        }

        $stmt->bind_param("i", $appointmentId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            echo json_encode(["success" => true, "cancelReason" => $row['cancel_reason']]);
        } else {
            echo json_encode(["success" => false, "message" => "Appointment not found."]);
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    }
}
?>
