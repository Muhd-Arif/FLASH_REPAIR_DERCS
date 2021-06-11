<?php
// Author : Ng Wei Sheng
// This page displays the details of a repair by the staff

require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../libs/adminSession.php';


$rpid = $_GET['rpid'];

$repair = new repairController();
$data = $repair->viewRepairDetails($rpid);
?>
<html>

<head>
    <title>Repair Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <style>
    .table-striped th {
        width: 30%;
    }

    table.table.table-striped {
        margin-top: 3rem;
    }

    .frame-2 {
        width: auto;
    }

    .wrapper .content-wrapper{
        min-height: 900px!important;
    }


    </style>

        <!-- NAVIGATION BAR  -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

        <?php include("sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- NAVIGATION PART 1 STOP -->

    <!-- STAFF REPAIR DETAILS -->
    <?php
            foreach($data as $row){
        ?>
    <div class="container">
        <h2>Repair Details</h2>
        <div class="row" style="justify-content: space-between;">
            <div class="col-sm-12" style="display: flex;align-items: center;justify-content: center;">
                <div class="frame-2"><img src="../../../uploads/<?=$row['RP_Image']?>"></div>
            </div>

            <div class="col-md-12">

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Repair ID:</th>
                            <td><?=$row['Q_DeviceType']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Damage:</th>
                            <td><?=$row['Q_DamageType']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Repair Status:</th>
                            <td><?=$row['RP_Status']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Repair Reason:</th>
                            <td><?=$row['RP_Reason']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Quotation ID:</th>
                            <td><?=$row['Q_ID']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Quotation Date:</th>
                            <td><?=$row['Q_Date']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Estimated Cost:</th>
                            <td>RM <?=$row['Q_Cost']?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <div>
                    <a class="btn btn-primary" href='editRepairForm.php?rpid=<?= $rpid?>'>Edit</a>

                </div>

            </div>


        </div>

    </div>

    <?php
            }
        ?>

    
            <!-- NAVIGATION PART 2 -->
            </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. </center>
        </footer>

    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


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