<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
require_once '../../../libs/custSession.php';


//$RunnerID = $_SESSION['R_ID'];
//$RunnerID = '1';

$quotationid = $_GET["q_id"];
  //$quotationid = '3';
  //$custid = '3';
  $custid = $_SESSION['C_ID'];

$product = new deliveryController();
$customer = new customerController();

 
  // get all customer name from customer table
  $cust = $customer->viewAllCustomer($quotationid);
  

  //$k = $j;


error_reporting(0);


if(isset($_POST['pickup'])){
    $product->addPickup($quotationid,$custid);
} 

// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $product->acceptDelivery2($RunnerID);
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rider Available Request List</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">

</head>
<style type="text/css">
input,
select,
textarea {
    width: 400px;
    border: 2px solid #ccc;

    -ms-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-box-sizing: content-box;
}
</style>



 <!-- TEMPLATE 1  -->
 <div class="wrapper">
        <?php include("sidebar.php") ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                  <h1>Payment</h1>
                  </div> -->
                        <!-- <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Payment</li>
                  </ol>
                  </div> -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            
                   

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-8">
                            <div class="card">
                                <!-- MAP & BOX PANE -->

                                <div class="container" style="margin-bottom:100px">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div style="text-align:center;">
                                                <h3 align="center">Customer Pickup Details</h3>
                                                <i class="fa fa-truck fa-2x" aria-hidden="true"></i><br><br>
                                            </div>
                                            <!--                  <input type="text" class="form-control mt-3" id="filterInput" placeholder="Search location...">
 -->

                                            <div class="table-responsive pt-10">
                                                <!-- <table class="table table-borderless table-dark"> -->

                                                <?php
                                $i = 1;
                                // foreach($cust as $row) { 
                                   
                                   ?>
                                                <!--test suggestion-->
                                                <div class="card">
                                                    <form id="delivery-form" method="post">
                                                        <div class="modal-body">



                                                            <div class="card-footer">
                                                                <form id="" method="post">
                                                                    <input type='hidden' id='OrderProductID[<?=$x?>]'
                                                                        name='OrderProductID'
                                                                        value='<?=$orderproductid[$x]?>'>
                                                                    <input type='hidden' id='QuotationID[<?=$x?>]'
                                                                        name='QuotationID'
                                                                        value='<?=$quotationid[$x]?>'>
                                                                    <input type='hidden' id='CustID[<?=$x?>]'
                                                                        name='CustID' value='<?=$custid[$x]?>'>
                                                                    <p style="color:pink"><span
                                                                            style="font-weight:bold">Please provide
                                                                            pickup details </span></p>

                                                                    <p> <i class="fa fa-calendar-alt"
                                                                            aria-hidden="true"></i> <span
                                                                            style="font-weight:bold">Pickup
                                                                            Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                                        </span><input type="date" id="date" name="date"
                                                                            width="50" value="<?=$pickupDate[$x]?>"
                                                                            required="true"></p>
                                                                    <p><i class="fa fa-clock" aria-hidden="true"></i>
                                                                        <span style="font-weight:bold">Pickup
                                                                            Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                                        </span> <select id="time" name="time"
                                                                            required="true">
                                                                            <option value="10:00 - 12:00">10:00 - 12:00
                                                                            </option>
                                                                            <option value="13:00 - 15:00">13:00 - 15:00
                                                                            </option>
                                                                            <option value="16:00 - 18:00">16:00 - 18:00
                                                                            </option>
                                                                        </select>
                                                                    </p>

                                                                    <p><i class="fa fa-address-book"
                                                                            aria-hidden="true"></i> <span
                                                                            style="font-weight:bold">Pickup
                                                                            Address&nbsp;: </span><textarea id="addr"
                                                                            name="addr" rows="4" cols="50"
                                                                            required="true"></textarea></p>

                                                                    <p><i class="fas fa-comment-alt"
                                                                            aria-hidden="true"></i> <span
                                                                            style="font-weight:bold">Pickup
                                                                            Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                                        </span><textarea id="notes" name="notes"
                                                                            rows="4" cols="50"></textarea></p>

                                                                    <div class="modal-footer">

                                                                        <div class="" id="button1"
                                                                            style="margin-right:5px">
                                                                            <input type="hidden" name="OrderProductID"
                                                                                value="<?=$orderproductid[$x]?>">
                                                                            <button id="pickup" name="pickup"
                                                                                type="submit"
                                                                                class="btn btn-primary accept"
                                                                                onclick="return confirm('Are you sure you want to confirm this pickup?');">CONFIRM</button>


                                                                </form>
                                                            </div>


                                                            &nbsp;

                                                            <button type="button" class="btn btn-secondary"
                                                                onclick="location.href='../../ApplicationLayer/Rider/pickupList.php'">Back</button>
                                                        </div>
                                                    </form>
                                                </div>


                                                <!--test suggestion-->
                                                <?php
                                $i++;
                               echo "</tr>";
                                // }
                              ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!-- TABLE: LATEST ORDERS -->

                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

       <!-- TEMPLATE PART 2 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. <center>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <!-- <script src="../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../../plugins/raphael/raphael.min.js"></script>
    <script src="../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script> -->
    <!-- ChartJS -->
    <!-- <script src="../../../plugins/chart.js/Chart.min.js"></script> -->

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../../dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="../../../dist/js/pages/dashboard2.js"></script> -->
</body>

</html>