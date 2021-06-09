<?php
// Author : Hoe Shin Yi
// This page displays payment interface
require_once '../../../libs/custSession.php';
require_once '../../../BusinessServiceLayer/controller/paymentController.php';
require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';


$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
// Paypal merchant demo email
$paypal_email = 'flashrepair@business.example.com';

$rpid = $_GET['rpid'];
$qid = $_GET['qid'];
$cid = $_SESSION['C_ID'];
$repair = new repairController();
$delivery = new deliveryController();
$payment = new paymentController();


$qrpData = $repair->viewQuotationRepair($rpid);
$deliverydata = $delivery->viewDelivery($rpid);
$paymentdata = $payment->viewPayment($cid,$rpid);

if(isset($_POST['paycod'])){
    $payment->updatePaymentType($cid,$rpid,"COD");
	$payment->addPaymentCOD($cid,$qid,$rpid);
	
}

if(sizeof($paymentdata)!=0){
    echo "<script type='text/javascript'>
    window.location = '../Customer/success.php?cid=$cid&qid=$qid&rpid=$rpid'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>

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
                <!-- div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Payment</li>
                            </ol>
                        </div>
                    </div>
                </div> --><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <div class="card bg-light">
                                <div class="card-body pb-0">
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <!-- /.col -->


                                        <div class="col-6 table-responsive">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 style="text-align: center;">Repair Summary</h3>
                                                </div>
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php 
														foreach($qrpData as $row)
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
                                        <div class="col-6 table-responsive">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h3 style="text-align: center">Delivery Form</h3>
                                                </div>

                                                <table class="table table-hover">
                                                    <?php 
															foreach($deliverydata as $data)
																{  ?>
                                                    <tr>
                                                        <th width="30%">Delivery Address: </th>
                                                        <td><?php echo $data['D_Address']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Delivery Note: </th>
                                                        <td><?php echo $data['D_Note']?></td>
                                                    </tr>

                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <form method="post">
                                                <input type="submit" class="btn btn-primary float-right" name="paycod"
                                                    id="paycod" value="Cash On Delivery"
                                                    style="height: 44px; width: 200px">
                                                <input type="hidden" name="payment_type" value="COD">
                                                <input type="hidden" name="amount" value="<?php echo $row['Q_Cost'] ?>">
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <!-- paypal integration -->

                                            <form method="post" action="<?php echo $paypal_url ?>">

                                                <!-- Paypal business test account email id so that you can collect the payments. -->
                                                <input type="hidden" name="business"
                                                    value="<?php echo $paypal_email; ?>">
                                                <!-- Buy Now button. -->
                                                <input type="hidden" name="cmd" value="_xclick">
                                                <!-- Details about the item that buyers will purchase. -->
                                                <input type="hidden" name="item_name" value="REPAIR & DELIVERY FEE">
                                                <!-- <input type="hidden" name="item_name" value="<?php echo $item_ID?>"> -->
                                                <!-- <input type="hidden" name="item_number" value="1"> -->
                                                <!-- <input type="hidden" name="amount" value="5"> -->
                                                <input type="hidden" name="amount" value="<?php echo $row['Q_Cost'] ?>">
                                                <!-- <input type="hidden" name="amount" value="1"> -->
                                                <input type="hidden" name="currency_code" value="MYR">
                                                <input type="hidden" name="custom"
                                                    value="cid=<?php echo $cid ?>&qid=<?php echo $qid ?>&rpid=<?php echo $rpid ?>">
                                                <input type="hidden" name="payment_type" value="ONLINE">

                                                <!-- URLs -->
                                                <input type='hidden' name='cancel_return'
                                                    value='http://localhost/FLASH_REPAIR_DERCS/ApplicationLayer/view/Customer/cancel.php?cid=<?php echo $cid?>&qid=<?php echo $qid ?>&rpid=<?php echo $rpid ?>'>
                                                <input type='hidden' name='return'
                                                    value='http://localhost/FLASH_REPAIR_DERCS/ApplicationLayer/view/Customer/success.php?'>

                                                <!-- payment button. -->
                                                <input type="image" name="payonline" id="payonline" border="0"
                                                    class="float-left"
                                                    src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png"
                                                    alt="Pay with PayPal">
                                                <img alt="" border="0" width="1" height="1"
                                                    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
                                            </form>
                                        </div>
                                        &nbsp;
                                    </div>
                                    <!-- end of paypal integration -->
                                </div>

                            </div>

                            <!-- /.row -->



                            <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
										<i class="fas fa-download"></i> Generate PDF</button> -->

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
    <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. <center>
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