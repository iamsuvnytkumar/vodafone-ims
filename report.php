<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        body {
            background-image: url("image.jpg");
            background-color: #cccccc;
        }

        h1 {
            color: rgb(4, 0, 0);
            text-align: center;
        }

        .single-table{
            margin-left: auto;
            margin-right: auto;
            width: auto;
        }

        .card{
            margin-left: auto;
            margin-right: auto;
            width: 800px;
        }
        .form-group{
            width: 700px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

                            </li>



                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Inventory</span></a>
                            </li>

                            <li class="active">
                                <a href="report.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Reports</span></a>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->



        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>

                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">

                    </div>
                </div>
            </div>

            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Reports</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['first_name']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div>

                <h1 style="text-align:center">Report</h1>

                <div class="main-content-inner">
                    <div class="row">

                        <!-- Contextual Classes start -->
                        <div class="col-lg-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="text-align:center" class="header-title">Assets</h4>
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-dark text-center">
                                                <thead class="text-uppercase">
                                                    <tr class="table-active">
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Serial Number</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Product Price</th>
                                                        <th scope="col">Assigned To</th>
                                                        <th scope="col">Assigned On</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Remarks</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                <?php
                                                    $conn = new mysqli('us-cdbr-east-03.cleardb.com', 'b8fde6f3e15a94', '9e0c4460', 'heroku_1fc3bbe61793651');
                                                    $sql = "SELECT staff.username, product.product_name,product.date, product.serial_num,product.price,product.c_status,product.remarks
                                                    FROM product
                                                    INNER JOIN staff ON product.username=staff.username";
                                                    $result = $conn->query($sql);
                                                    $count = 0;
                                                    if ($result->num_rows >  0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            $count = $count + 1;
                                                    ?>


                                                            <tr>
                                                                <th><?php echo $count ?></th>
                                                                <th><?php echo $row["serial_num"] ?></th>
                                                                <th><?php echo $row["product_name"] ?></th>
                                                                <th><?php echo $row["price"] ?></th>
                                                                <th><?php echo $row["username"] ?></th>
                                                                <th><?php echo $row["date"] ?></th>
                                                                <th><?php echo $row["c_status"] ?></th>
                                                                <th><?php echo $row["remarks"] ?></th>
                                                                

                                                            </tr>
                                                    <?php

                                                        }
                                                    }

                                                    ?>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>


                            </div>
                        </div>
                        <!-- Contextual Classes end -->

                        <!-- main content area end -->

                        <html>

                        <head>
                            <title>Add Item</title>
                            <link rel="stylesheet" type="text/css" href="style.css">
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
                        </head>

                        </html>







                    </div>
                    <!-- page container area end -->
                    <!-- offset area start -->

                    <!-- offset area end -->
                    <!-- jquery latest version -->
                    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
                    <!-- bootstrap 4 js -->
                    <script src="assets/js/popper.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>
                    <script src="assets/js/owl.carousel.min.js"></script>
                    <script src="assets/js/metisMenu.min.js"></script>
                    <script src="assets/js/jquery.slimscroll.min.js"></script>
                    <script src="assets/js/jquery.slicknav.min.js"></script>

                    <!-- others plugins -->
                    <script src="assets/js/plugins.js"></script>
                    <script src="assets/js/scripts.js"></script>
                    <footer>
            <div class="footer-area">
                <p>© Copyright Suvneet Kumar. All rights reserved.</a></p>
            </div>
        </footer>
</body>

</html>
