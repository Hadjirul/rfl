<?php
require '../../classes/database.php';

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $query = "DELETE FROM employee WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'employee Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'employee Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_employee'])) {

    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $uploadDir = "uploads/";
    
    // Check if email is unique before proceeding
    $query = "SELECT COUNT(*) as count FROM employee WHERE email = '$email' AND id != '$employee_id'";
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
    $query = "UPDATE employee SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate',email='$email',contact_number='$contact_number',gender='$gender',address='$address', role='$role'";

    // Perform file upload only if picture is provided
    if ($picture && move_uploaded_file($picture['tmp_name'], $uploadDir . basename($picture["name"]))) {
        // Picture is provided, update the picture field in the database
        $picturePath = $uploadDir . basename($picture["name"]);
        $query .= ", picture='$picturePath'";
    }

    // Finish the SQL query
    $query .= " WHERE id='$employee_id'";
    
    $query_run = mysqli_query($con, $query);

    // Check if the query was successful
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Employee updated successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Employee not updated',
        ];
        echo json_encode($res);
        return false;
    }
}




if (isset($_POST['save_employee'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $uploadDir = "uploads/";

    // Check if email is unique before proceeding
    $query = "SELECT COUNT(*) as count FROM employee WHERE email = '$email'";
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

    // Proceed only if the required fields are provided


    // Perform additional client-side validation for gender
    if (!in_array($gender, ['Male', 'Female'])) {
        $res = [
            'status' => 422,
            'message' => 'Please select a valid gender',
        ];
        echo json_encode($res);
        return false;
    }

    // Perform file upload only if picture is provided
    if ($picture && move_uploaded_file($picture['tmp_name'], $uploadDir . basename($picture["name"]))) {
        $picturePath = $uploadDir . basename($picture["name"]);

        $query = "INSERT INTO employee (firstname, middlename, lastname, birthdate, email, contact_number, gender, address, role, picture) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$email', '$contact_number', '$gender', '$address', '$role', '$picturePath')";
    } else {
        // Picture not provided, insert without attempting a file upload
        $query = "INSERT INTO employee (firstname, middlename, lastname, birthdate, email, contact_number, gender, address, role) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$email', '$contact_number', '$gender', '$address', '$role')";
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Employee added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Employee not created',
        ];
        echo json_encode($res);
        return false;
    }
}




// pop up the employee form with entered details
if (isset($_GET['employee_id'])) {
    $employee_id = mysqli_real_escape_string($con, $_GET['employee_id']);

    $query = "SELECT * FROM employee WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $employee = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'employee Fetch Successfully by id',
            'data' => $employee
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'employee Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

