<?php
require '../../classes/database.php';


if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $query = "DELETE FROM service_category WHERE id='$employee_id'";
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

    // Sanitize input data
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);




    // Start building the SQL query
    $query = "UPDATE service_category SET name='$name', description='$description'";


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

    // Sanitize input data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);


   

    // Insert the service into the database
    $query = "INSERT INTO service_category (name, description) 
              VALUES ('$name', '$description')";
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

    $query = "SELECT * FROM service_category WHERE id='$employee_id'";
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

