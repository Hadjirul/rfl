<?php
require '../../classes/database.php';

if(isset($_POST['delete_walkins']))
{
    $walkins_id = mysqli_real_escape_string($con, $_POST['walkins_id']);

    $query = "DELETE FROM doctor_walkin WHERE id='$walkins_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'walkins Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'walkins Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_walkins'])) {

    $walkins_id = mysqli_real_escape_string($con, $_POST['walkins_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    
    // Check if email is unique before proceeding
    $query = "SELECT COUNT(*) as count FROM doctor_walkin WHERE email = '$email' AND id != '$walkins_id'";
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

    // If count is not 0, the email is not unique
    if ($count > 0) {
        $res = [
            'status' => 422,
            'message' => 'Email is already registered',
        ];
        echo json_encode($res);
        return false;
    }

   

    // Start building the SQL query
    $query = "UPDATE doctor_walkin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate',email='$email',contact_number='$contact_number',gender='$gender',address='$address'";

  

    // Finish the SQL query
    $query .= " WHERE id='$walkins_id'";
    
    $query_run = mysqli_query($con, $query);

    // Check if the query was successful
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'walkins updated successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'walkins not updated',
        ];
        echo json_encode($res);
        return false;
    }
}




if (isset($_POST['save_walkins'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    // Check if email is unique before proceeding
    $query = "SELECT COUNT(*) as count FROM doctor_walkin WHERE email = '$email'";
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

    // If count is not 0, the email is not unique
    if ($count > 0) {
        $res = [
            'status' => 422,
            'message' => 'Email is already registered',
        ];
        echo json_encode($res);
        return false;
    }

   

    // Perform additional client-side validation for gender
    if (!in_array($gender, ['Male', 'Female'])) {
        $res = [
            'status' => 422,
            'message' => 'Please select a valid gender',
        ];
        echo json_encode($res);
        return false;
    }


        $query = "INSERT INTO doctor_walkin (firstname, middlename, lastname, birthdate, email, contact_number, gender, address) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$email', '$contact_number', '$gender', '$address')";
        $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'walkins added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'walkins not created',
        ];
        echo json_encode($res);
        return false;
    }
}




// pop up the walkins form with entered details
if (isset($_GET['walkins_id'])) {
    $walkins_id = mysqli_real_escape_string($con, $_GET['walkins_id']);

    $query = "SELECT * FROM doctor_walkin WHERE id='$walkins_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $walkins = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'walkins Fetch Successfully by id',
            'data' => $walkins
        ];
        echo json_encode($res);
        return;
    } 
}





