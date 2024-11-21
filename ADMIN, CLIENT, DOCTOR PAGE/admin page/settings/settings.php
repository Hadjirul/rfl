<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'settings';
    $settings_page = 'active';
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
                $settings_page = 'active';
                require_once('../include/sidepanel.php');
            ?>
                        
                <div class="row py-2 py-lg-3 d-flex justify-content-center ">
                <div class="col-12 py-2 py-lg-3 col-lg-7">
                    <!-- Statistic Card 1 -->
                    <h1 class="h3 brand-color pb-2 pt-0">settings</h1>

                    <button class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 border-0 bg-white"  data-bs-toggle="modal" data-bs-target="#addSettingsModal" style="max-width: 650px;">
                        <div class="card admin-rounded col-lg-12" style = "width:800px; height:120px;">
                            <div class="row card-body ">
                                
                                <div class="col-lg-1 pb-0 mx-3">
                                    <img src="../../img/image 11.png" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="card-title fs-2 fw-bold mb-0 mt-2">Account Settings</h6>
                                    <p class="card-text py-1 mb-2 fs-6 mt-0" style = "color: gray;">Edit your Account Details & Change Password</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>

                <div class="col-12 py-2 py-lg-3 col-lg-7">
                    <button class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 border-0 bg-white" style="max-width: 650px;">
                        <div class="card admin-rounded col-lg-12" style = "width:800px; height:120px;">
                            <div class="row card-body">
        
                                <div class="col-lg-1 pb-0 mx-3">
                                    <img src="../../img/image 12.png" alt="">
                                </div>
                                <div class="col-lg-6 ">
                                    <h6 class="card-title fs-2 fw-bold mb-0 mt-2">View Account</h6>
                                    <p class="card-text py-1 mb-2 fs-6 mt-0" style = "color: gray;">View Personal information About Your Account</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>

                <div class="col-12 py-2 py-lg-3 col-lg-7">
                    <button class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 text-center border-0 bg-white" style="max-width: 650px;">
                        <div class="card admin-rounded col-lg-12" style = "width:800px; height:120px;">
                            <div class="row card-body">
                                
                                <div class="col-lg-1 pb-0 mx-3">
                                    <img src="../../img/image 13.png" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="card-title fs-2 fw-bold mb-0 mt-2 text-danger">Delete Account</h6>
                                    <p class="card-text py-1 mb-2 fs-6 mt-0" style = "color: gray;">Will Permanently Removed your Account</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
                </div>

 
                <div class="modal fade modal-centered" id="addSettingsModal" tabindex="-1" aria-labelledby="addSettingsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style = "max-width:440px;">
                <div class="modal-content p-3">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="col text-center">
                    <h5 class = "pb-2 fw-bold text-primary">Edit Profile</h5>
                    <img src="../../img./profile.jpg" class="img-fluid rounded-circle" alt="..." style="width: 100px;">
                </div>
                <div class="text-center">
                <p class="fa fa-edit mt-2 pb-3">Change Profile Picture</p>
                </div>
               




                <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label fw-bold mb-1">First Name:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1" value = "Jose">
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">M.N <span class = "fst-italic text-secondary fw-lighter">(Optional)</span>:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1"value = "Manalo" >
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Last Name:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1" value = "Rizal">
                </div>
                </div>
                

                <div class="col mt-2">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">BirthDate:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1"value = "1/12/98" >
                </div>

                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Email:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1"value = "Rizal@gmail.com" >
                </div>

                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Contact Number:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1"value = "09061489204" >
                </div>

                <div class="col mt-1">
                <div class=" form-check-inline">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Gender: </label>
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Female</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Male</label>
                        </div>
                </div>
                <div class="col mt-1">
                <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Address:</label>
                   <input type="email" class="form-control" id="exampleFormControlInput1"value = "09061489204" >
                </div>

            <div class="col mt-2">
            <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Password:</label>
                <div class="input-group">
                    <input type="text" class="form-control" value = "********">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><button type="button" class="fa fa-edit border-0 fs-4" id="updateButton" data-bs-toggle="modal" data-bs-target="#passwordModal" ></button></span>
                    </div>
                </div>
            </div>


            <div class="col text-center pt-3 mt-2">
            <button type="button" class="btn btn-primary w-100 pb-2 fs-5 fw-bold"  style = "height:40px;">Update</button>
            </div>      
                </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade modal-centered" id="addSettingsModal" tabindex="-1" aria-labelledby="addSettingsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style = "max-width:440px;">
                <div class="modal-content p-3">

            <div class="col text-center pt-3 mt-2">
            <button type="button" class="btn btn-primary w-100 pb-2 fs-5 fw-bold" style = "height:40px;">Update</button>
            </div>
                </div>
            </div>
        </div>





        <div class="modal fade modal-centered" id="passwordModal" tabindex="-1" aria-labelledby="addSettingsModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style = "max-width:440px;">
                <div class="modal-content p-3">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="col text-center mb-3">
                    <h4 class = "fw-bold text-primary"> Change Password</h4>
                </div>
                <div class="col">
                    <div class="col mb-2">
                    <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Old Password:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>

                <div class="col mb-2">
                    <div class="col">
                    <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">New Password:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>

                <div class="col mb-2">
                    <div class="col">
                    <label for="exampleFormControlInput1" class="form-label  fw-bold mb-1">Confirm Password:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>

                 <div class="col text-center pt-3 mt-2">
            <button type="button" class="btn btn-primary w-100 pb-2 fs-5 fw-bold" style = "height:40px;">Change Password</button>
            </div>

                </div>
            </div>
        </div>




    <?php
        require_once('../../include/js.php');
    ?>
    <script src="settings.js"></script>
</body>
</html>