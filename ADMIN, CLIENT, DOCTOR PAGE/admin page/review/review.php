<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Review';
    $reviews_page = 'active';
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
                $reviews_page = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Doctors</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3 visually-hidden">
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for doctor.." class="form-control">
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
                            $Patient_array = array(
                                array(
                                    'pname' => 'Jose Manalo Rodrigo',
                                    'dname' => 'Dr. Jose Morales',
                                    'rate' => '5/5',
                                    'review' => 'The Best',
                                    'action' => '<button type="button" class="btn btn-info fw-bold fs-6" type="button" data-bs-toggle="modal" data-bs-target="#addDoctorModal"><span class="fa fa-eye px-2"></span>View</button>
                                
                                                 <button type="button" class="btn btn-danger mx-3"><span class="fa fa-ban px-2" data-bs-toggle="modal" data-bs-target="#blockModal"></span>Block</button>'

                                ),
                                array(
                                    'pname' => 'Noel Aling',
                                    'dname' => 'Dr. Jose Morales',
                                    'rate' => '5/5',
                                    'review' => 'The Best',
                                    'action' => '<a href="history.php">
                                                <button type="button" class="btn btn-info fw-bold fs-6">
                                                    <span class="fa fa-eye px-2"></span>View
                                                </button>
                                                 </a>
                                
                                                 <button type="button" class="btn btn-danger mx-3"><span class="fa fa-ban px-2" data-bs-toggle="modal" data-bs-target="#blockModal"></span>Block</button>'

                                ),
                                array(
                                    'pname' => 'Daniel Padilla',
                                    'dname' => 'Dr. Jose Morales',
                                    'rate' => '4/5',
                                    'review' => 'The Best',
                                    'action' => '<a href="history.php">
                                                <button type="button" class="btn btn-info fw-bold fs-6">
                                                    <span class="fa fa-eye px-2"></span>View
                                                </button>
                                                 </a>
                                
                                                 <button type="button" class="btn btn-danger mx-3"><span class="fa fa-ban px-2" data-bs-toggle="modal" data-bs-target="#blockModal"></span>Block</button>'

                                ),
                                array(
                                    'pname' => 'Vic Sotto',
                                    'dname' => 'Dr. Jose Morales',
                                    'rate' => '5/5',
                                    'review' => 'Th Best',
                                    'action' => '<a href="history.php">
                                                <button type="button" class="btn btn-info fw-bold fs-6">
                                                    <span class="fa fa-eye px-2"></span>View
                                                </button>
                                                 </a>
                                
                                                 <button type="button" class="btn btn-danger mx-3"><span class="fa fa-ban px-2" data-bs-toggle="modal" data-bs-target="#blockModal"></span>Block</button>'

                                )
            
                            );
                        ?>
                        <table id="Patient" class="table table-striped table-sm  ">
                            <thead>
                                <tr class = "text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Patient's Name</th>
                                    <th scope="col">Doctor's Name</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Reviewers</th>
                                    <th scope="col" width="22%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 5;
                                    foreach ($Patient_array as $item){
                                ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $item['pname'] ?></td>
                                            <td><?= $item['dname'] ?></td>
                                            <td><?= $item['rate'] ?></td>
                                            <td><?= $item['review'] ?></td>
                                            <td class = "text-center"><?= $item['action'] ?></td>
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
    <!-- Modal -->
    <div class="modal fade modal-centered" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style = "max-width:650px;">
            <div class="modal-content p-3">
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="modal-title col-7">
                       <h5 class = "modal-title fs-4 fw-bold pb-0">Dr. Jose Rosales</h5>
                       <p class = "text-gray pt-0">35 years old</p>
                       <p class = "fs-6" style = "font-size:5px;"> Dr. Rosales at the optical clinic provided an exceptional experience with her thorough examinations and personalized care. Her attention to detail and friendly demeanor made me feel comfortable and well-informed throughout the entire process.  </p>
                       <i class="fa fa-star fs-4 p-2"></i>
                       <i class="fa fa-star fs-4 p-2"></i>
                       <i class="fa fa-star fs-4 p-2"></i>
                       <i class="fa fa-star fs-4 p-2"></i>
                       <i class="fa fa-star fs-4 p-2"></i>
                       <i class="text-dark fs-4 p-1">5/5</i>
                       <p class = "fs-6 pt-1">Reviewed by <span class = "fw-bold">Jose Manalo Rodrigo</span></p>
                    </div>
                    
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <img src="../../img/Rectangle 152.png" alt="">
                    </div>
                  

                    
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once('../../include/js.php');
    ?>
    <script src="patient.js"></script>
</body>
</html>