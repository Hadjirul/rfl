<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MyAppointment';
    $appointment_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.admin.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
            <?php
                $appointment = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Appointments</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3  ">
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                    <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto ">
                                        <select name="employee-role" id="employee-role" class="form-select me-md-2">
                                            <option value="">All Appointments</option>
                                            <option value="Approve">Pending</option>
                                            <option value="Approved">Approve</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search" class="form-control">
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


                        
                        
                       
                        <?php
                            $employee_array = array(
                                array(
                                    'pname' => 'Jose Rizal',
                                    'dname' => 'Cashier',
                                    'services' => 'Eye Exam',
                                    'date' => '12/12/23',
                                    'time' => '10:00-11:00',
                                    'status' => '<div class="d-flex align-items-center"><h6 class="text-muted mx-3 fst-italic fw-100">Pending</h6><button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button></div>'

                                ),
                                array(
                                    'pname' => 'Jose Rizal',
                                    'dname' => 'Dr. Jose Rosales',
                                    'services' => 'Eye Exam',
                                    'date' => '12/11/23',
                                    'time' => '9:00-10:00',
                                    'status' => '<div class="d-flex align-items-center"><h6 class="text-muted mx-3 fst-italic fw-100">Pending</h6><button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button></div>'

                                ),
                               
                                array(
                                    'pname' => 'Jose Rizal',
                                    'dname' => 'Dr. Jose Rosales',
                                    'services' => 'Contact Lense',
                                    'date' => '12/10/23',
                                    'time' => '14:00-15:00',
                                    'status' => '<div class="d-flex align-items-center gap-2"> <button type="button" class="btn btn-info fw-bold fs-6"> <span class="fa fa-eye px-2"></span>View</button><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Approve</button><button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button></div>'

                                ),
                                
                                array(
                                    'pname' => 'Jose Rizal',
                                    'dname' => 'Dr. Camille Chua',
                                    'services' => 'Eye Glasses',
                                    'date' => '12/10/20',
                                    'time' => '9:00-10:00',
                                    'status' => '<div class="d-flex align-items-center"><h6 class="text-muted mx-3 fst-italic fw-100">Pending</h6><button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button></div>'

                                ),
                                array(
                                    'pname' => 'Jose Rizal',
                                    'dname' => 'Dr. Camille Chua',
                                    'services' => 'Eye Exam',
                                    'date' => '12/1/23',
                                    'time' => '9:00-10:00',
                                    'status' => '<div class="d-flex align-items-center"><h6 class="text-muted mx-3 fst-italic fw-100">Pending</h6><button type="button" class="btn btn-danger mr-2"><i class="fa fa-trash"></i> Cancel</button></div>'
                                   

                                )
                            );
                        ?>
                        <table id="employee" class="table table-striped table-sm  ">
                            <thead>
                                <tr class = "text-center">
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Patient's Name</th>
                                    <th scope="col">Doctor's Name</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" width="29%" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 5;
                                    foreach ($employee_array as $item){
                                ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $item['pname'] ?></td>
                                            <td><?= $item['dname'] ?></td>
                                            <td><?= $item['services'] ?></td>
                                            <td><?= $item['date'] ?></td>
                                            <td><?= $item['time'] ?></td>
                                            <td><?= $item['status']  ?></td>
                                        </tr>
                                <?php
                                    $counter++;
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../include/js.php');
    ?>
    <script src="appointment.js"></script>
</body>
</html>