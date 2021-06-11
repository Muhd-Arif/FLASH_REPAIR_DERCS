<?php
// Author : Ng Wei Sheng
// This page displays all the repairs owned by the staff
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/repairController.php';

$repair = new repairController();


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

if (isset($_GET['recordnum'])) {
    $number_of_records = $_GET['recordnum'];
} else {
    $number_of_records = 99;
}

$offset = ($pageno - 1) * $number_of_records;

// search data

if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $data = $repair->viewAllRepairs($offset, $number_of_records, $term);
    $total = $repair->viewSearchAllRepairList($term)->rowCount();

    if ($total == 0){
        $errmsg = 'No results found.';
    }
} else {
    $term = '';
    $data = $repair->viewAllRepairs($offset, $number_of_records, '');
    $total = $repair->viewAllRepairsList($term)->rowCount();


    if ($total == 0){
        $errmsg = 'No results found.';
    }
}

$pages_needed = ceil($total / $number_of_records);


?>
<html>

<head>
    <title>All Repair List</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <style>
    img.repair-img {
        display: inline-block;
        width: 100px;
        height: 100px;
    }

    .wrapper .content-wrapper {
        min-height: 1100px !important;
    }
    </style>

    <script src="https://kit.fontawesome.com/e40306d6a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">






    <!-- NAVBAR -->

    <?php
    //  $fullname = $_SESSION['CustName'];
    $fullname = 'Test Name';
     $shortname = explode(" ", $fullname);
     $name = $shortname[0].' '.$shortname[1];
     ?>


    <!-- TEMPLATE 1  -->
    <div class="wrapper">










        <!-- =================== SIDEBAR ====================== -->





        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../manageLoginAndRegister/userLogin.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-2">
            <a href="allRepairList.php" class="brand-link">
                <i class="far fa-tools" style="padding-left: 8%; padding-right: 1%"></i>
                <span class="brand-text font-weight-light">Flash Repair</span>
            </a>



            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="customerProfile.php" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>My Account</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="adminValidateCustomer.php" class="nav-link">

                                <i class="nav-icon fas fa-edit"></i>
                                <p>Customer List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="adminValidateRunner.php" class="nav-link">

                                <i class="far fa-user nav-icon"></i>
                                <p>Rider List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="quotationList.php" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>
                                    Customer Quotation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="allRepairList.php" class="nav-link">
                                <i class="nav-icon far fa-bell"></i>
                                <p>
                                    All Repairs
                                </p>
                            </a>
                        </li>

                        <!-- ========== FILTERS DEVICE TYPE ============ -->
                        <div class="user-panel">
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <p>
                                                Device Type
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- <li class="nav-item">
                        <p>
                            Device Type
                        </p>
                </li> -->
                        <li class="nav-item">
                            <a href="allRepairList.php" class="nav-link">
                                <p>
                                    All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="allRepairList.php?device=Mobile" class="nav-link">
                                <p>
                                    Mobile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="allRepairList.php?device=Tablet" class="nav-link">
                                <p>
                                    Tablet
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="allRepairList.php?device=Laptop" class="nav-link">
                                <p>
                                    Laptop
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="allRepairList.php?device=Desktop" class="nav-link">
                                <p>
                                    Desktop
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>





        <!-- =================== SIDEBAR ====================== -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body pb-0">
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <!-- /.col -->
                                            <!-- TEMPLATE 1 STOP -->







                                            <div class="container" style="margin-top:30px">

                                                <h2><?php echo isset($_GET['device'])? $_GET['device']: '';?> All Repair
                                                    List</h2>
                                                <div class="row">
                                                    <div class="col-sm-12 main-content">
                                                        <table id="repair-list" class="display">
                                                            <thead>
                                                                <tr>
                                                                    <th>Repair ID</th>
                                                                    <th>Device Image</th>
                                                                    <th>Repair Status</th>
                                                                    <th>Estimated Price</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                if (isset($errmsg)){
                    echo "<h3>$errmsg</h3>";
                }

                
                // foreach($data as $row){
                //     $rpid = $row['RP_ID'];
                //     echo "<div class='col-sm-3'><div class='cust repair'><a href='repairDetails.php?rpid=$rpid'><img class='repair-img' src='../../../uploads/". $row['RP_Image'] ."'><div class='repair-bottom'><h4>".$row['RP_ID'] ."</h4><p class='repair-price'>". $row['RP_Status'] ."</p></div></a></div></div>";
                // }

                foreach($data as $row){
                    $rpstatus = $row['RP_Status'];
            ?>


                                                                <tr>
                                                                    <td><?=$row['RP_ID']?></td>
                                                                    <td><img class='repair-img'
                                                                            src='../../../uploads/<?=$row['RP_Image']?>'>
                                                                    </td>
                                                                    <td><?=$rpstatus?></td>
                                                                    <td>RM <?=$row['Q_Cost']?></td>
                                                                    <td><a class="btn btn-primary"
                                                                            href='repairDetails.php?rpid=<?=$row['RP_ID']?>'>View</a>

                                                                            <?php if($rpstatus != 'COD Pending' && $rpstatus != 'Paid') {?>
                                                                                    <a class="btn btn-success" href='editRepairForm.php?rpid=<?= $row['RP_ID']?>'>Edit</a>
                                                                            <?php }?>
                                                                    </td>
                                                                </tr>


                                                                <?php 
                }
            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- TEMPLATE PART 2 -->
                                        </div>
                                    </div>
                                </div>

                                <!-- /.invoice -->
                            </div><!-- /.col -->

                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. <center>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/adminlte.min.js"></script>
    <script src="../../../assets/js/demo.js"></script>

    <!-- TEMPLATE PART 2 STOP -->




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    <script src="../../../assets/js/repair.js"></script>
    <script>
    $(document).ready(function() {
        $('#repair-list').DataTable({
            "aLengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ],
            "iDisplayLength": 5,
            "order": [
                [0, "desc"]
            ]
        });
    });
    </script>
</body>

</html>