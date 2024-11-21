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
    $title = 'employee';
    $setting_page = 'active';
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
                $manage_page = 'active';
                require_once('../include/sidepanel.php');
            ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">

                <style>
        /* Define the styles for the active link */
        .active-link {
    color: white !important;
    background-color: #0008BD; /* Adjust this color as needed */
}
    </style>
                    <div class="row">
                        <div class="col-lg-10">
                        <h2 class="h3 brand-color pt-3 pb-2">Product Category</h2>
                        </div>
                   
                    <div class="col-lg-2 mt-3 d-flex ml-0" >
                    <div id="MyButtons" class=" mb-md-2 col-12 col-md-auto mt-2"></div>
                </div>
             </div>
                
                    <div class="table-responsive overflow-hidden">            
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row border border-2">
                                <div class="row g-2 mb-2 m-0">
                                   
                                
                                    <div class="search-keyword col-12 flex-lg-grow-0 d-flex ms-auto">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search for Service.." class="form-control">
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
                    
                    <div class="row d-flex justify-content-center gap-0 my-3">
                        <div class="col-4">
                            <a href="../product/product.php" id="serviceLink" class="btn btn-secondary w-100">Product</a>
                        </div>
                        <div class="col-4">
                            <a href="../product_category/product_category.php" id="categoryLink" class="btn btn-secondary w-100">Category</a>
                        </div>                
                    </div>

                    <div class="modal fade" id="employeeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bolder brand-color" id="exampleModalLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Created form -->
            <form id="saveemployee" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="errorMessage" class="alert alert-warning d-none"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold mb-1">Service Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                  
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold mb-1">Description:</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>

                 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="height:2.3em; width: 6em;">Save category</button>
                </div>
            </form>
            <!-- End of the form -->
        </div>
    </div>
</div>





<div class="modal fade" id="employeeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title brand-color fw-bolder" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateemployee" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>


                    <input type="hidden" name="employee_id" id="employee_id">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold mb-1">Category Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
     
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold mb-1">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- View employee Modal -->
    <div class="modal fade" id="employeeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title brand-color fw-bolder" id="exampleModalLabel">View Service Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" class="form-control">

                

                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Category Name:</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label  fw-bold mb-1">Description :</label>
                    <p id="view_description" class="form-control"></p>
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

                $query = 'SELECT * FROM product_category';
                $query_run = mysqli_query($con, $query);
                ?>

                <!-- Iterate through employee data and generate modals -->
                <?php while ($employee = mysqli_fetch_assoc($query_run)) { ?>
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
                                    <button type="button" value="<?= $employee['id'] ?>" class="deleteEmployeeBtn btn btn-primary px-3">Yes</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
    
                        
                <div class="card-body">
    <table id="employee" class="table table-primary table-striped" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th width="30%">Category Name</th>
                <th width="40%">Description</th>
                <th width="15%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../../classes/database.php';

            $query = 'SELECT * FROM product_category';
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $counter = 1;
                foreach ($query_run as $employee) {
                    ?>
                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= $employee['name'] ?></td>
                        <td><?= $employee['description'] ?></td>

                        <td>
                            <button type="button" value="<?= $employee['id'] ?>" class="viewEmployeeBtn btn btn-info">View</button>
                            <button type="button" value="<?= $employee['id'] ?>" class="editEmployeeBtn btn btn-warning">Edit</button>
                           
                        </td>
                    </tr>
                    <?php
                    $counter++;
                }
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end align-items-end mt-1">
        <h3 style="color: #0008BD" class="pt-2">Add</h3>
        <button class="btn btn-outline-secondary btn-add" type="button" data-bs-toggle="modal" data-bs-target="#employeeAddModal">
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
    <script src="product_category.js"></script>
    
  
</body>
</html>