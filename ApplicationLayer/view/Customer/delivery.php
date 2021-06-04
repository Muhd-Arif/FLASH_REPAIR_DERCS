<?php
require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';

require_once '../../../libs/custSession.php';


// $rpid = "2";
// $qid = "2";
// $cid = "2";
$rpid = $_GET['rpid'];
$cid = $_SESSION['C_ID'];
$repair = new repairController();
$delivery = new deliveryController();

$data = $repair->viewQuotationRepair($rpid);

foreach($data as $p){
    $qid = $p['Q_ID'];
}
$deliveryData = $delivery->viewDelivery($qid,$rpid);

if(isset($_POST['add'])){
	$delivery->addDelivery($cid,$qid,$rpid);
}

if(isset($_POST['pay'])){ 
    echo "<script type='text/javascript'>window.location = '../Customer/payment.php?cid=$cid&qid=$qid&rpid=$rpid'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery</title>

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
            <!-- Content Header (Page header) -->
            <section class="content-header">

            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- info row -->
                                <div class="row invoice-info">

                                    <!-- /.col -->
                                    <div class="col-sm-6 invoice-col">
                                        <div class="card-header">
                                            <h3 style="text-align: center;">Delivery Form</h3>
                                        </div>
                                        <br>
                                        <form method="post" enctype='multipart/form-data' id="inputform">
                                            <?php
                                            if(sizeof($deliveryData)==0){?>
                                            <div class="form-group">
                                                <label for="deliverAdd">Delivery Address</label>
                                                <!-- <input type="text" id="deliverAdd" class="form-control" name="deliverAdd"> -->
                                                <textarea id="deliverAdd" name="deliveryAdd" class="form-control"
                                                rows="3" form="inputform"
                                                placeholder="Enter Delivery Address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="deliverNote">Delivery Note</label>
                                                <textarea id="deliverNote" name="deliveryNote" class="form-control"
                                                rows="3" form="inputform" placeholder="Any notes?"></textarea>
                                            </div>
                                            <?php
                                        } else { 
                                            foreach($deliveryData as $row2){ ?>
                                            <div class="form-group">
                                                <label for="deliverAdd">Delivery Address</label>
                                                <!-- <input type="text" id="deliverAdd" class="form-control" name="deliverAdd"> -->
                                                <textarea id="deliverAdd" name="deliveryAdd" class="form-control"
                                                rows="3" form="inputform" disabled 
                                                placeholder="Enter Delivery Address"><?php echo $row2['D_Address']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="deliverNote">Delivery Note</label>
                                                <textarea id="deliverNote" name="deliveryNote" class="form-control"
                                                rows="3" form="inputform" disabled placeholder="Any notes?"><?php echo $row2['D_Note']?></textarea>
                                            </div>
                                       <?php }
                                        
                                    }
                                    ?>

                                </div>
                                <!-- /.col -->

                                <div class="col-6 table-responsive">
                                    <div class="card-header">
                                        <h3 style="text-align: center;">Repair Summary</h3>
                                    </div>
                                    <br>
                                    <table class="table table-striped">
                                        <tbody>
                                            <?php 
                                            foreach($data as $row)
                                              {  ?>
                                                <tr>
                                                    <th width="30%">Quotation ID</th>
                                                    <td><?php echo $row['Q_ID']?></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Quotation Date</th>
                                                    <td><?php echo $row['Q_Date']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Device Type</th>
                                                    <td><?php echo $row['Q_DeviceType']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Damage Info</th>
                                                    <td><?php echo $row['Q_DamageInfo']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Solution</th>
                                                    <td><?php echo $row['Q_Solution']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Reason</th>
                                                    <td><?php echo $row['RP_Reason']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Repair Status</th>
                                                    <td><?php echo $row['RP_Status']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Cost</th>
                                                    <td>RM <?php echo $row['Q_Cost']?></td>
                                                </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row no-print">
                                    <div class="col-12" style="text-align: center;">
                                        <?php
                                        if(sizeof($deliveryData)==0){?>
                                        <input type="submit" class="btn btn-primary" name="add" id="add"
                                        value="Place Delivery" style="height: 44px; width: 200px">
                                        <?php } else {?>
                                        <p> Delivery had been placed already</p>
                                            <input type="submit" class="btn btn-primary" name="pay" id="pay"
                                        value="Payment" style="height: 44px; width: 200px">
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
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
    <strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../assets/js/demo.js"></script>
</body>

</html>