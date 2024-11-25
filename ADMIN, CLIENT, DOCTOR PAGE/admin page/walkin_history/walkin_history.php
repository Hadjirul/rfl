<?php
session_start();
include '../../include/header.admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax crud 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
</head>

<?php
    $title = 'walkins history';
    require_once('../../include/head.php');
?>
<body>

    <main>
        <div class="container-fluid">
            <div class="row">
            <?php
                $walkin_page = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Walkin's History</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3 d-flex ml-0" >
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto mt-2"></div>
                </div>
             </div>


    <div class="row">
    <?php
    function getPatientInformation($patientID)
    {
        require '../../classes/database.php';
        $query = "SELECT firstname, middlename, lastname, email FROM doctor_walkin WHERE id = $patientID"; // Adjust table name and field names
        $result = mysqli_query($con, $query);
    
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return array('firstname' => 'N/A', 'middlename' => 'N/A', 'lastname' => 'N/A', 'email' => 'N/A');
        }
    }

    $patientID = isset($_GET['patientID']) ? $_GET['patientID'] : '';
    $patientInfo = getPatientInformation($patientID); // Implement this function
    ?>
    <div class="col-3">
        <h4 class="mb-0 fw-bold fs-3"><?= $patientInfo['firstname'] ?> <?= $patientInfo['middlename'] ?> <?= $patientInfo['lastname'] ?></h4>
        <p class="mt-0 fs-6"><?= $patientInfo['email'] ?></p>
    </div>
    <div class="col-4 pt-2">
        <div class="row col-10">
            <div class="col-10">
                <h5 class="fw-bold">No. Of Appointment Made</h5>
            </div>
            <div class="col">
                <?php
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
                ?>
                <h2 class="fw-bolder text-primary pt-1"><?= $bookingCount ?></h2>
            </div>
        </div>
    </div>

          </div>       
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for walkin_history.." class="form-control">
                                            <button class="btn btn-outline-secondary brand-bg-color" type="button"><i class="fa fa-search color-white" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 m-6">
                            <button type="button" class="btn btn-primary p-2 fs-3 ">Filter</button>
                        </div>
                    </div>

<div class="modal fade" id="walkin_historyAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bolder brand-color" id="exampleModalLabel">Add Walkin's Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Created form -->
                <form id="savewalkin_history"  enctype="multipart/form-data">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="doctor_ID" id="doctor_ID">
                       <input type="hidden" name="patient_ID" id="patient_ID" value="<?php echo isset($_GET['patientID']) ? htmlspecialchars($_GET['patientID']) : ''; ?>">

                       <div class="mb-3">
                    <label for="medical_history" class="form-label fw-bold mb-1">Medical History:</label>
                    <input type="text" class="form-control" name="medical_history"  style="height: 70px;">
                </div>


                        <div class="mb-3">
                            <label for="eye_history"  class="form-label  fw-bold mb-1">Eye History</label>
                            <input type="text" class="form-control" name="eye_history"  style="height: 70px;" >
                        </div>

                        <div class=" mb-3">
                            <label for="date_held" class="form-label  fw-bold mb-1">Date:</label>
                            <input type="date" class="form-control" name="date_held" >
                        </div>
                        

                        <div class="mb-3">
                            <label for="service" class="form-label  fw-bold mb-1">Service:</label>
                            <input type="text" class="form-control" name="service" >
                        </div>

                            <div class="mb-3">
                                <label for="doctor" class="form-label  fw-bold mb-1">Doctor:</label>
                                <input type="text" class="form-control" name="doctor" >
                            </div>
               
                        <div class="mb-3">
                            <label for="findings" class="form-label  fw-bold mb-1">Findings:</label>
                            <input type="text" class="form-control" name="findings"  style="height: 70px;" >
                        </div>

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label  fw-bold mb-1">Diagnosis:</label>
                            <input type="text" class="form-control" name="diagnosis"  style="height: 70px;" >
                        </div>
                        <div class="mb-3">
                            <label for="prescription" class="form-label  fw-bold mb-1">Prescription:</label>
                            <input type="text" class="form-control" name="prescription"  style="height: 70px;">
                        </div>
                       
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style = "height:2.3em; width: 6em;">Save walkin_history</button>
                    </div>
                </form>

                <!-- End of the form -->

            </div>
        </div>
    </div>




      <!-- Edit walkin_history Modal -->
      <div class="modal fade" id="walkin_historyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  brand-color fw-bolder" id="exampleModalLabel">Add Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updatewalkin_history" enctype="multipart/form-data" >
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="walkin_history_id" id="walkin_history_id">
                        <input type="hidden" name="doctor_ID" id="doctor_ID">
                       <input type="hidden" name="patient_ID" id="patient_ID" value="<?php echo isset($_GET['patientID']) ? htmlspecialchars($_GET['patientID']) : ''; ?>">

                       <div class="mb-3">
                    <label for="medical_history" class="form-label fw-bold mb-1">Medical History:</label>
                    <input type="text" class="form-control" name="medical_history"  id = "medical_history" style="height: 70px;">
                </div>


                        <div class="mb-3">
                            <label for="eye_history"  class="form-label  fw-bold mb-1">Eye History</label>
                            <input type="text" class="form-control" name="eye_history" id = "eye_history"  style="height: 70px;" >
                        </div>

                        <div class=" mb-3">
                            <label for="date_held" class="form-label  fw-bold mb-1">Date:</label>
                            <input type="date" class="form-control" name="date_held" id = "date_held" required>
                        </div>
                        

                        <div class="mb-3">
                            <label for="service" class="form-label  fw-bold mb-1">Service:</label>
                            <input type="text" class="form-control" name="service"  id = "service" required>
                        </div>

                        <div class="mb-3">
                                <label for="doctor" class="form-label  fw-bold mb-1">Doctor:</label>
                                <input type="text" class="form-control" name="doctor" id = "doctor" required>
                            </div>
                    
                        <div class="mb-3">
                            <label for="findings" class="form-label  fw-bold mb-1">Findings:</label>
                            <input type="text" class="form-control" name="findings" id = "findings"  style="height: 70px;" required>
                        </div>

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label  fw-bold mb-1">Diagnosis:</label>
                            <input type="text" class="form-control" name="diagnosis" id = "diagnosis"  style="height: 70px;" required >
                        </div>
                        <div class="mb-3">
                            <label for="prescription" class="form-label  fw-bold mb-1">Prescription:</label>
                            <input type="text" class="form-control" name="prescription" id = "prescription" style="height: 70px;" required >
                        </div>
                       


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View walkin_history Modal -->
    <div class="modal fade" id="walkin_historyViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title brand-color fw-bolder" id="exampleModalLabel">View Walkin's Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" class="form-control">

            

               

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Medical History:</label>
                    <p id="view_medical_history" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Eye History:</label>
                    <p id="view_eye_history" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Date Held:</label>
                    <p id="view_date_held" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Service:</label>
                    <p id="view_service" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Doctor:</label>
                    <p id="view_doctor" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Findings:</label>
                    <p id="view_findings" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Diagnosis:</label>
                    <p id="view_diagnosis" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Prescription:</label>
                    <p id="view_prescription" class="form-control"></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>




                <?php
                require '../../classes/database.php';

                $query = 'SELECT * FROM doctor_walkin_history';
                $query_run = mysqli_query($con, $query);
                ?>

                <!-- Iterate through walkin_history data and generate modals -->
                <?php while ($walkin_history = mysqli_fetch_assoc($query_run)) { ?>
                    <div class="modal fade" id="deleteSchedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Deletion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body fs-5">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" value="<?= $walkin_history['id'] ?>" class="deletewalkin_historyBtn btn btn-primary px-3">Yes</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
    
                        
                <div class="card-body">
    <table id="walkin_history" class="table table-primary table-striped" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th width="20%">Date Held</th>
                <th>Service</th>
                <th>Findings</th>
                <th>Diagnosis</th>
                <th width="24%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../../classes/database.php';

            if (isset($_GET['patientID'])) {
                $patientID = $_GET['patientID'];

                $query = "SELECT * FROM doctor_walkin_history WHERE patient_ID = $patientID";
                $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $counter = 1;
                foreach ($query_run as $walkin_history) {
                    ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= $walkin_history['date_held'] ?></td>
                        <td><?= $walkin_history['service'] ?></td>
                        <td><?= $walkin_history['findings'] ?></td>
                        <td><?= $walkin_history['diagnosis'] ?></td>
                        <td>
                            <button type="button" value="<?= $walkin_history['id'] ?>" class="viewwalkin_historyBtn btn btn-info px-3">View</button>
                            <button type="button" value="<?= $walkin_history['id'] ?>" class="editwalkin_historyBtn btn btn-success px-3">Add Info</button>
                            
                        </td>
                    </tr>
                    <?php
                    $counter++;
                }
            }
        }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end align-items-end mt-1">
        <h3 style="color: #0008BD" class="pt-2">Add</h3>
        <button class="btn btn-outline-secondary btn-add" type="button" data-bs-toggle="modal" data-bs-target="#walkin_historyAddModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
</div>
</div>

                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../include/js.php');
    ?>
    <script src="walkin_history.js"></script>
  
</body>
</html>