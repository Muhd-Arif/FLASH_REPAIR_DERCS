<?php
// Author : Ng Wei Sheng
// This page displays the available repairs 

require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../libs/custSession.php';


$repair = new repairController();

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

if (isset($_GET['recordnum'])) {
    $number_of_records = $_GET['recordnum'];
} else {
    $number_of_records = 12;
}

$offset = ($pageno - 1) * $number_of_records;


// search data

if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $data = $repair->viewRepairListPage($offset, $number_of_records, $term);
    $total = $repair->viewSearchRepairList($term)->rowCount();
    if ($total == 0){
        $errmsg = 'No results found.';
    }
} else {
    $term = '';
    $data = $repair->viewRepairListPage($offset, $number_of_records,'');
    $total = $repair->viewRepairList()->rowCount();
    if ($total == 0){
        $errmsg = 'No results found.';
    }
}

$pages_needed = ceil($total / $number_of_records);

?>
<html>

<head>
    <title><?php echo isset($_GET['device'])? $_GET['device']: '';?> Repair List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
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
            <a href="#" class="brand-link">
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
                            <a href="requestQuotationForm.php" class="nav-link">

                                <i class="nav-icon fas fa-edit"></i>
                                <p>Request Quotation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="requestQuotationList.php" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>
                                    My Quotation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php" class="nav-link">
                                <i class="nav-icon far fa-bell"></i>
                                <p>
                                    My Repairs
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
                            <a href="myRepairList.php" class="nav-link">
                                <p>
                                    All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?device=Mobile" class="nav-link">
                                <p>
                                    Mobile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?device=Tablet" class="nav-link">
                                <p>
                                    Tablet
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?device=Laptop" class="nav-link">
                                <p>
                                    Laptop
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?device=Desktop" class="nav-link">
                                <p>
                                    Desktop
                                </p>
                            </a>
                        </li>


                        <!-- ========== FILTERS STATUS ============ -->
                        <div class="user-panel">
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <p>
                                                Repair Status
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <li class="nav-item">
                            <a href="myRepairList.php" class="nav-link">
                                <p>
                                    All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?status=Pending" class="nav-link">
                                <p>
                                    Pending
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?status=In Progress" class="nav-link">
                                <p>
                                    In Progress
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?status=Completed" class="nav-link">
                                <p>
                                    Completed
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myRepairList.php?status=Cannot be repaired" class="nav-link">
                                <p>
                                    Cannot be repaired
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
                                            <div class="container">



                                                <h2><?php echo isset($_GET['device'])? $_GET['device']: '';?><?php echo isset($_GET['status'])? $_GET['status']: '';?>
                                                    Repair List</h2>
                                                <div class="row">
                                                    <div class="col-sm-12 main-content">
                                                        <div class="row">
                                                            <?php
                if (isset($errmsg)){
                    echo "<h3>$errmsg</h3>";
                }

                
                foreach($data as $row){
                    $rpid = $row['RP_ID'];
                    echo "<div class='col-sm-3'><div class='cust repair'><a href='repairDetails.php?rpid=$rpid'><img class='repair-img' src='../../../uploads/". $row['RP_Image'] ."'><div class='repair-bottom'><h4> Repair #".$row['RP_ID'] ."</h4><p class='repair-price'>". $row['RP_Status'] ."</p></div></a></div></div>";
                }

            ?>
                                                        </div>

                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination">
                                                                <!-- page numbers -->
                                                                <?php
                    for ($x = 1; $x <= $pages_needed; $x++) {
                        if(isset($_GET['device'])){
                            $device = $_GET['device'];
                            echo "<li class='page-item'><a class='page-link' href='myRepairList.php?pageno=$x&device=$device&term=$term'>". $x ."</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link' href='myRepairList.php?pageno=$x&term=$term'>". $x ."</a></li>";
                        }
                    }
                ?>
                                                            </ul>
                                                        </nav>
                                                    </div>
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
    <script src="../../../assets/js/repair.js"></script>
    <!-- jQuery -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../assets/js/demo.js"></script>


    <!-- NAVIGATION PART 2 STOP -->

</body>


</html>