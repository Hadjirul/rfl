<?php
require '../../classes/database.php';

if(isset($_POST['delete_schedule']))
{
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);

    $query = "DELETE FROM doctor_schedule WHERE id='$schedule_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'schedule Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'schedule Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_schedule'])) {

    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);

    
    
    if (strtotime($start_time) > strtotime($end_time)) {
        $res = [
            'status' => 422,
            'message' => 'Start time cannot exceed end time',
        ];
        echo json_encode($res);
        return false;
    }
    
    $query = "UPDATE doctor_schedule SET  start_time='$start_time',end_time='$end_time'";

  
    $query .= " WHERE id='$schedule_id'";
    
    $query_run = mysqli_query($con, $query);

    // Check if the query was successful
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'schedule updated successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'schedule not updated',
        ];
        echo json_encode($res);
        return false;
    }
}




if (isset($_POST['save_schedule'])) {

    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
   

    if (strtotime($start_time) > strtotime($end_time)) {
        $res = [
            'status' => 422,
            'message' => 'Start time cannot exceed end time',
        ];
        echo json_encode($res);
        return false;
    }
    $query = "SELECT COUNT(*) as count FROM doctor_schedule WHERE end_time = '$end_time'";
    $result = mysqli_query($con, $query);

    if ($result === false) {
        $res = [
            'status' => 500,
            'message' => 'Database query failed',
        ];
        echo json_encode($res);
        return false;
    }

    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // If count is not 0, the end_time is not unique
    if ($count > 0) {
        $res = [
            'status' => 422,
            'message' => 'end_time is already registered',
        ];
        echo json_encode($res);
        return false;
    }

   

    else {
        // Picture not provided, insert without attempting a file upload
        $query = "INSERT INTO doctor_schedule ( start_time, end_time) VALUES ('$start_time', '$end_time')";
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'schedule added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'schedule not created',
        ];
        echo json_encode($res);
        return false;
    }
}




// pop up the schedule form with entered details
if (isset($_GET['schedule_id'])) {
    $schedule_id = mysqli_real_escape_string($con, $_GET['schedule_id']);

    $query = "SELECT * FROM doctor_schedule WHERE id='$schedule_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $schedule = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'schedule Fetch Successfully by id',
            'data' => $schedule
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'schedule Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

