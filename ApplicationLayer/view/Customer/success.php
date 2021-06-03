<?php
require_once '../../../BusinessServiceLayer/controller/paymentController.php';
require_once '../../../BusinessServiceLayer/controller/repairController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
session_start();

if(isset($_GET['custom'])){
	parse_str($_GET['custom'],$id);
	$cid = $id['cid'];
	$qid = $id['qid'];
	$rpid = $id['rpid'];
	$pt = "Online";
}else{
	$cid = $_GET['cid'];
	$qid = $_GET['qid'];
	$rpid = $_GET['rpid'];
	$pt = "COD";
}

$repair = new repairController();
$delivery = new deliveryController();
$payment = new paymentController();

$qrpData = $repair->viewQuotationRepair($qid,$rpid);
$deliveryData = $delivery->viewDelivery($qid,$rpid);
$paymentData = $payment->viewPayment($cid,$qid,$rpid);

if($pt=="Online"){
	$payment->addPaymentOnline($_GET);
	$payment->updatePaymentType($cid,$qid,$rpid,$pt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
				<div class="container-fluid">
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
				</div><!-- /.container-fluid -->
			</section>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">


							<div class="card bg-light">
								<div class="card-body pb-0">
								<!-- info row -->
								<div class="row invoice-info">
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
															<td><?php echo $row['Q_Cost']?></td>
														</tr>

														<?php } ?>
													</tbody>

												</table>
											</div>
											<!-- /.col -->

											

													<!-- /.col -->
												</div>
												<div class="col-6 table-responsive">
													<div class="card ">
														<div class="card-header">
															<h3 style="text-align: center">Delivery Form</h3>
														</div>

														<table class="table table-hover">
													<tbody>
														<?php 
														foreach($deliveryData as $row){  ?>
														<tr>
															<th width="30%">Delivery Address</th>
															<td><?php echo $row['D_Address']?></td>
														</tr>
														<tr>
															<th>Delivery Note</th>
															<td><?php echo $row['D_Note']?></td>
														</tr>
														<tr>
															<th>Payment Type</th>
															<td><?php echo $row['Payment_Type']?></td>
														</tr>	
														<?php } 
														foreach($paymentData as $row){  ?>
														<tr>
															<th width="30%">Payment ID</th>
															<td><?php echo $row['Pay_ID']?></td>
														</tr>
														<tr>
															<th>Payment Date</th>
															<?php if($row['Pay_Status']!="Completed"){ ?>
															<td>-</td>
															<?php }else{ ?>
															<td><?php echo $row['Pay_Date']?></td>
															<?php } ?>
														</tr>
															<tr>
																<th>Payment Status</th>
																<td><?php echo $row['Pay_Status']?></td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
												<!-- /.col -->
											</div>
										</div>
									</div>
											<!-- /.row -->
											<div class="row no-print">
												<div class="col-12">

													<div style="text-align: center">
														<input class="btn btn-primary" type="button" onclick="location.href='index.php'" value="BACK TO HOMEPAGE">
													</div> 
												</form>
												&nbsp;
											</div>

										</div>
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
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.1.0
	</div>
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
