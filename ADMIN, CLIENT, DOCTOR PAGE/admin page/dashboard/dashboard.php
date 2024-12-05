<?php
session_start();
include '../../include/header.admin.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Admin Dashboard';
    $dashboard_page = 'active';
    require_once('../../include/head.php');
?>
<body>

    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('sidepanel.php')
                ?>
   
<style>
     .box-hover{
      background-color: #026efe;
    }
    .box, .box-hover{
        border-color: #026efe;
    }
    .counter-title{
        font-size: 1.5em;
    }
    .main-header{
        margin-left:20px;
    }
</style>

<body>


    <div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title fw-bold brand-color">
                dashboard
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter ">
                            <div class="counter-title text-white  fw-bolder">
                                All Doctors
                            </div>
                            <div class="counter-info">
                                <div class="counter-count text-white">
                                    3
                                </div>
                                <i class='bx bx-group text-white'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title text-white  fw-bolder">
                               Total Booking
                            </div>
                            <div class="counter-info">
                                <div class="counter-count text-white">
                                    43
                                </div>
                                <i class='bx bx-book text-white'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title text-white  fw-bolder">
                                 Total Profit
                            </div>
                            <div class="counter-info">
                                <div class="counter-count text-white">
                                    P20,780
                                </div>
                                <i class='bx bx-line-chart text-white'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title text-white fw-bolder">
                                daily visitors
                            </div>
                            <div class="counter-info">
                                <div class="counter-count text-white">
                                    690
                                </div>
                                <i class='bx bx-user text-white'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-6 col-sm-12">
                    <!-- TOP PRODUCT -->
                    <div class="box f-height">
                        <div class="box-header">
                            Top Services
                        </div>
                        <div class="box-body">
                            <ul class="product-list">
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./images/service-lens-1.png" alt="product image">
                                       
                                            <div class="product-name">
                                            Lens Type</div>
                            
                                        
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Booked</div>
                                        <div class="product-sales">20</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./images/service-exam-1.png" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">Visual Activity Test</div>
                                           
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Booked</div>
                                        <div class="product-sales">10</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./images/service-glasses-1.png" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">Anti-Reflective Coating</div>
                                            
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Booked</div>
                                        <div class="product-sales">8</div>
                                    </div>
                                </li>
                                <li class="product-list-item">
                                    <div class="item-info">
                                        <img src="./images/service-sec-1.png" alt="product image">
                                        <div class="item-name">
                                            <div class="product-name">Dry Eye Management</div>
                                            
                                        </div>
                                    </div>
                                    <div class="item-sale-info">
                                        <div class="text-second">Booked</div>
                                        <div class="product-sales">5</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- TOP PRODUCT -->
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                              
                    <div class="box f-height">
                    <div class="box-header">
                            All Appointments
                        </div>  
                        <div class="box-body">
                            <div id="category-chart"></div>
                        </div>
                    </div>
                    <!-- END CATEGORY CHART -->
                </div>
                <div class="col-12 col-md-12 col-sm-12">
                    <!-- CUSTOMERS CHART -->
                    <div class="box f-height">
                        <div class="box-header">
                            Total Patients
                        </div>
                        <div class="box-body">
                            <div id="customer-chart"></div>
                        </div>
                    </div>
                    <!-- END CUSTOMERS CHART -->
                </div>
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Recent Appointments
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Service</th>
                                        <th>Status</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2345</td>
                                        <td>
                                            <div class="order-owner">
                                                <img src="./images/user-image.jpg" alt="user image">
                                                <span>tuat tran anh</span>
                                            </div>
                                        </td>
                                        <td>2021-05-09</td>
                                        <td>Lens Type</td>
                                        <td>
                                            <div class="payment-status payment-pending">
                                                <div class="dot"></div>
                                                <span>Pending</span>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                    <td>#2346</td>
                                        <td>
                                            <div class="order-owner">
                                                <img src="./images/user-image-2.png" alt="user image">
                                                <span>John doe</span>
                                            </div>
                                        </td>
                                        <td>2021-05-09</td>
                                        
                                        <td>Anti-Reflective Coating</td>
                                            <span class="order-status order-shipped">
                                                Approved
                                            </span>
                                        </td>
                                        <td>
                                            <div class="payment-status payment-paid">
                                                <div class="dot"></div>
                                                <span>Approved</span>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                    <tr>
                                        <td>#2345</td>
                                        <td>
                                            <div class="order-owner">
                                                <img src="./images/user-image-3.png" alt="user image">
                                                <span>evelyn</span>
                                            </div>
                                        </td>
                                        <td>2021-05-09</td>
                                        <td>product image
                                        Visual Activity Test</td>
                                        <td>
                                            <div class="payment-status payment-paid">
                                                <div class="dot"></div>
                                                <span>Approved</span>
                                            </div>
                                        </td>
                            
                                    </tr>
                                    <tr>
                                        <td>#2348</td>
                                        <td>
                                            <div class="order-owner">
                                                <img src="./images/user-image-2.png" alt="user image">
                                                <span>John doe</span>
                                            </div>
                                        </td>
                                        <td>2021-05-09</td>
                                        <td>Visual Activity Test</td>
                                     
                                          
                                        </td>
                                        <td>
                                            <div class="payment-status payment-paid">
                                                <div class="dot"></div>
                                                <span>Approved</span>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>#2349</td>
                                        <td>
                                            <div class="order-owner">
                                                <img src="./images/user-image-3.png" alt="user image">
                                                <span>evelyn</span>
                                            </div>
                                        </td>
                                        <td>2021-05-09</td>
                                        <td>Dry Eye Management</td>
                                        <td>
                                            <div class="payment-status payment-pending">
                                                <div class="dot"></div>
                                                <span>Pending</span>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END ORDERS TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- APP JS -->
    <script src="./js/app.js"></script>
    <?php
        require_once('../../include/js.php')
    ?>
    <script src="../js/dashboard.js"></script>

</body>
               
</html>