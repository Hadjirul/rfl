<?php
require '../../classes/database.php';

if(isset($_POST['delete_walkin_history']))
{
    $walkin_history_id = mysqli_real_escape_string($con, $_POST['walkin_history_id']);

    $query = "DELETE FROM doctor_walkin_history WHERE id='$walkin_history_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'walkin_history Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'walkin_history Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_walkin_history'])) {

    $walkin_history_id = mysqli_real_escape_string($con, $_POST['walkin_history_id']);
    $medical_history = mysqli_real_escape_string($con, $_POST['medical_history']);
    $eye_history = mysqli_real_escape_string($con, $_POST['eye_history']);
    $date_held = mysqli_real_escape_string($con, $_POST['date_held']);
    $service = mysqli_real_escape_string($con, $_POST['service']);
    $doctor = mysqli_real_escape_string($con, $_POST['doctor']);
    $findings = mysqli_real_escape_string($con, $_POST['findings']);
    $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
    $prescription = mysqli_real_escape_string($con, $_POST['prescription']);
  
    

   

    // Start building the SQL query
    $query = "UPDATE doctor_walkin_history SET medical_history='$medical_history', eye_history='$eye_history', date_held='$date_held', service='$service' ,doctor='$doctor',findings='$findings',diagnosis='$diagnosis',prescription='$prescription'";


 $query .= " WHERE id='$walkin_history_id'";
    
    $query_run = mysqli_query($con, $query);

    // Check if the query was successful
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Walkins info added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'walkin_history not updated',
        ];
        echo json_encode($res);
        return false;
    }
}




if (isset($_POST['save_walkin_history'])) {
    $doctor_ID = mysqli_real_escape_string($con, $_POST['doctor_ID']);
    $patient_ID = mysqli_real_escape_string($con, $_POST['patient_ID']);
    $medical_history = mysqli_real_escape_string($con, $_POST['medical_history']);
    $eye_history = mysqli_real_escape_string($con, $_POST['eye_history']);
    $date_held = mysqli_real_escape_string($con, $_POST['date_held']);
    $service = mysqli_real_escape_string($con, $_POST['service']);
    $doctor = mysqli_real_escape_string($con, $_POST['doctor']);
    $findings = mysqli_real_escape_string($con, $_POST['findings']);
    $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
    $prescription = mysqli_real_escape_string($con, $_POST['prescription']);
   
    $query = "INSERT INTO doctor_walkin_history (patient_ID, medical_history, eye_history, date_held, service, doctor, findings, diagnosis, prescription) 
              VALUES ('$patient_ID', '$medical_history', '$eye_history', '$date_held', '$service','$doctor' , '$findings', '$diagnosis', '$prescription')";
              
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'walkin_history added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'walkin_history not created',
        ];
        echo json_encode($res);
        return false;
    }
}





// pop up the walkin_history form with entered details
if (isset($_GET['walkin_history_id'])) {
    $walkin_history_id = mysqli_real_escape_string($con, $_GET['walkin_history_id']);

    $query = "SELECT * FROM doctor_walkin_history WHERE id='$walkin_history_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $walkin_history = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'walkin_history Fetch Successfully by id',
            'data' => $walkin_history
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'walkin_history Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

function getBookingCountForPatient($patientID)
                {
                    require '../../classes/database.php';
                    $query = "SELECT COUNT(*) as bookingCount FROM doctor_walkin_history WHERE patient_ID = $patientID";
                    $result = mysqli_query($con, $query);
                
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        return $row['bookingCount'];
                    } else {
                        return 0;
                    }
                }
                // Add PHP code here to fetch and display the number of bookings
                $patientID = isset($_GET['patientID']) ? $_GET['patientID'] : '';
                $bookingCount = getBookingCountForPatient($patientID); // Implement this function