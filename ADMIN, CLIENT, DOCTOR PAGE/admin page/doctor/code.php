<?php
require '../../classes/database.php';

if(isset($_POST['delete_doctor']))
{
    $doctor_id = mysqli_real_escape_string($con, $_POST['doctor_id']);

    $query = "DELETE FROM doctor WHERE id='$doctor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'doctor Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'doctor Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_doctor'])) {
    $doctor_id = mysqli_real_escape_string($con, $_POST['doctor_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $uploadDir = "uploads/";
    
    // Check if email is unique before proceeding
    $query = "SELECT COUNT(*) as count FROM doctor WHERE email = '$email' AND id != '$doctor_id'";
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

    if ($count > 0) {
        $res = [
            'status' => 422,
            'message' => 'Email is already registered',
        ];
        echo json_encode($res);
        return false;
    }

    // Start building the SQL query
    $query = "UPDATE doctor SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', birthdate='$birthdate', email='$email', contact_number='$contact_number', gender='$gender', address='$address', description='$description'";
    
    if ($password) {
        $query .= ", password='$password'";
    }

    if ($picture && move_uploaded_file($picture['tmp_name'], $uploadDir . basename($picture["name"]))) {
        $picturePath = $uploadDir . basename($picture["name"]);
        $query .= ", picture='$picturePath'";
    }

    $query .= " WHERE id='$doctor_id'";
    
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Doctor updated successfully',
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Doctor not updated',
        ];
        echo json_encode($res);
        return;
    }
}





if (isset($_POST['save_doctor'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $password = password_hash(mysqli_real_escape_string($con, $_POST['password']), PASSWORD_BCRYPT);
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $uploadDir = "uploads/";

    $query = "SELECT COUNT(*) as count FROM doctor WHERE email = '$email'";
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

    if ($count > 0) {
        $res = [
            'status' => 422,
            'message' => 'Email is already registered',
        ];
        echo json_encode($res);
        return false;
    }

    if ($picture && move_uploaded_file($picture['tmp_name'], $uploadDir . basename($picture["name"]))) {
        $picturePath = $uploadDir . basename($picture["name"]);

        $query = "INSERT INTO doctor (first_name, middle_name, last_name, birthdate, email, contact_number, gender, address, description, picture, password) VALUES ('$first_name', '$middle_name', '$last_name', '$birthdate', '$email', '$contact_number', '$gender', '$address', '$description', '$picturePath', '$password')";
    } else {
        $query = "INSERT INTO doctor (first_name, middle_name, last_name, birthdate, email, contact_number, gender, address, description, password) VALUES ('$first_name', '$middle_name', '$last_name', '$birthdate', '$email', '$contact_number', '$gender', '$address', '$description', '$password')";
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Doctor added successfully',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Doctor not created',
        ];
        echo json_encode($res);
        return false;
    }
}


