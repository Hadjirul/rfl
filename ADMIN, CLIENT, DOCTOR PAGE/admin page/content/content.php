<?php
session_start();
include '../../include/header.admin.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'settings';
    $settings_page = 'active';
    require_once('../../include/head.php');
?>
<body>

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

                  
                        <a href="../service/service.php" class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 bg-white" style="text-decoration: none; border: none; max-width: 650px;">
                            <div class="card admin-rounded col-lg-12" style="width:800px; height:120px;">
                                <div class="row card-body">
                                    <div class="col-lg-1 pb-0 mx-3">
                                        <img src="../../img/service.png" alt="">
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="card-title fs-2 fw-bold mb-0 mt-2">Manage Services</h6>
                                        <p class="card-text py-1 mb-2 fs-6 mt-0" style="color: gray;">Add services and service category</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                   


                </div>

                <div class="col-12 py-2 py-lg-3 col-lg-7">
                <a href="../product/product.php" class="col-12 col-sm-6 col-md-6 col-lg-6 pb-2 pb-lg-0 pb-3 bg-white" style="text-decoration: none; border: none; max-width: 650px;">
                            <div class="card admin-rounded col-lg-12" style="width:800px; height:120px;">
                                <div class="row card-body">
                                    <div class="col-lg-1 pb-0 mx-3">
                                        <img src="../../img/product.png" alt="">
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="card-title fs-2 fw-bold mb-0 mt-2">Manage Products</h6>
                                        <p class="card-text py-1 mb-2 fs-6 mt-0" style="color: gray;">Add products and product category</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                   
                </div>

                
                </div>

 





    <?php
        require_once('../../include/js.php');
    ?>
    <script src="settings.js"></script>
</body>
</html>