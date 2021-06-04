<?php
require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../libs/custSession.php';

$RepairID = $_GET['rpid'];

$repair = new repairController();
$data = $repair->viewRepairDetails($RepairID);


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/design.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/e40306d6a0.js" crossorigin="anonymous"></script>

    <title>Repair Details</title>


        <!-- NAVIGATION BAR  -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">

    <style>
        .pay-now{
            display: block;
            text-transform: uppercase;
        }
    </style>
</head>



<body class="hold-transition sidebar-mini">



    <!-- NAVBAR -->
    <?php
  //  $fullname = $_SESSION['CustName'];
  $fullname = 'Test Name';
   $shortname = explode(" ", $fullname);
   $name = $shortname[0].' '.$shortname[1];
   ?>



<div class="wrapper">

        <?php include("sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- NAVIGATION PART 1 STOP -->

    <!-- REPAIR DETAILS -->
    <?php
            foreach($data as $row){
              $rpstatus = $row['RP_Status'];
            ?>
    <div class="container">
        <div class="order-wrapper <?php echo $rpstatus=='Cannot be repaired' ?'show-status':'hide-status';?>">
            <div class="order-tracker">
                <div class="incomplete">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                    <div class="status">Cannot Be Repaired</div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="order-wrapper <?php echo $rpstatus=='Cannot be repaired' ?'hide-status':'show-status';?>">
            <div class="order-tracker">
                <div class="complete pending">
                    <i class="far fa-clock"></i>
                    <div class="status">Pending</div>
                    <div class="circle"></div>
                </div>
                <div class="<?php echo $rpstatus=='In Progress' || $rpstatus=='Completed' ?'complete':'';?> delivering">
                    <i class="far fa-hourglass"></i>
                    <div class="status">In Progress</div>
                    <div class="circle"></div>
                    <span class="line"></span>

                </div>
                <div class="<?php echo $rpstatus=='Completed'?'complete':'';?> delivered">
                    <i class="far fa-check-circle"></i>
                    <div class="status">Completed</div>
                    <div class="circle"></div>
                    <span class="line"></span>

                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="row" style="justify-content: space-between;">
            <div class="col-md-4">
                <img src="<?="../../../uploads/".$row['RP_Image']?>" class="d-block w-100"
                    onerror="this.src='../../../uploads/default.png';">
                <br><br>
                <a href="delivery.php?rpid=<?= $row['RP_ID']?>" class="pay-now btn btn-success">Pay Now</a>
            </div>



            <div class="col-md-7">

                <h2>Repair #<?=$row['RP_ID']?></h2>

                <p><b>Device Type: </b><?=$row['Q_DeviceType']?></p>
                <p><b>Damage: </b><?=$row['Q_DamageType']?></p>
                <p><b>Repair Status: </b><?=$row['RP_Status']?></p>
                <p><b>Reason: </b><?=$row['RP_Reason']?></p>
                <p><b>Quotation ID: </b><?=$row['Q_ID']?></p>
                <p><b>Quotation Date: </b><?=$row['Q_Date']?></p>
                <p><b>Estimated Cost: </b>RM<?=$row['Q_Cost']?></p>

            </div>
        </div>
    </div>
    <?php } ?>






    <!-- </div> -->



            <!-- NAVIGATION PART 2 -->
            </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. </center>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
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