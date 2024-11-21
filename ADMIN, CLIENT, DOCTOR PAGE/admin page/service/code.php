<?php
require '../../classes/database.php';


if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $query = "DELETE FROM service WHERE id='$employee_id'";
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
    // Ensure all required fields are present
    if (!isset($_POST['employee_id'], $_POST['name'], $_POST['service_category_id'], $_POST['price'], $_POST['description'])) {
        $res = [
            'status' => 400,
            'message' => 'Missing required fields',
        ];
        echo json_encode($res);
        exit; // Stop script execution
    }

    // Sanitize input data
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $service_category_id = mysqli_real_escape_string($con, $_POST['service_category_id']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $uploadDir = "uploads/";

    // Check if the service category exists
    $categoryQuery = "SELECT COUNT(*) as count FROM service_category WHERE id = '$service_category_id'";
    $categoryResult = mysqli_query($con, $categoryQuery);
    $categoryRow = mysqli_fetch_assoc($categoryResult);
    $categoryCount = $categoryRow['count'];
    if ($categoryCount == 0) {
        $res = [
            'status' => 422,
            'message' => 'Invalid service category',
        ];
        echo json_encode($res);
        exit; // Stop script execution
    }

    // Start building the SQL query
    $query = "UPDATE service SET name='$name', service_category_id='$service_category_id', price='$price', description='$description'";

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
    } else {
        $res = [
            'status' => 500,
            'message' => 'Employee not updated',
        ];
        echo json_encode($res);
    }
}



if (isset($_POST['save_employee'])) {
    // Ensure all required fields are present
    if (!isset($_POST['name'], $_POST['service_category_id'], $_POST['price'], $_POST['description'])) {
        $res = [
            'status' => 400,
            'message' => 'Missing required fields',
        ];
        echo json_encode($res);
        exit; // Stop script execution
    }

    // Sanitize input data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $service_category_id = mysqli_real_escape_string($con, $_POST['service_category_id']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $picture = isset($_FILES['picture']) ? $_FILES['picture'] : null;
    $uploadDir = "uploads/";

    // Check if the service category exists
    $categoryQuery = "SELECT COUNT(*) as count FROM service_category WHERE id = '$service_category_id'";
    $categoryResult = mysqli_query($con, $categoryQuery);
    $categoryRow = mysqli_fetch_assoc($categoryResult);
    $categoryCount = $categoryRow['count'];
    if ($categoryCount == 0) {
        $res = [
            'status' => 422,
            'message' => 'Invalid service category',
        ];
        echo json_encode($res);
        exit; // Stop script execution
    }

    // Perform file upload only if picture is provided
    $picturePath = '';
    if ($picture && move_uploaded_file($picture['tmp_name'], $uploadDir . basename($picture["name"]))) {
        $picturePath = $uploadDir . basename($picture["name"]);
    }

    // Insert the service into the database
    $query = "INSERT INTO service (name, service_category_id, price, description, picture) 
              VALUES ('$name', '$service_category_id', '$price', '$description', '$picturePath')";
    $query_run = mysqli_query($con, $query);

    // Check if insertion was successful
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Employee added successfully',
        ];
        echo json_encode($res);
    } else {
        $res = [
            'status' => 500,
            'message' => 'Failed to add employee',
        ];
        echo json_encode($res);
    }
}





// pop up the employee form with entered details
if (isset($_GET['employee_id'])) {
    $employee_id = mysqli_real_escape_string($con, $_GET['employee_id']);

    $query = "SELECT * FROM service WHERE id='$employee_id'";
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

