<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delivery</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
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
							<h1>Delivery</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Delivery</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">


							<!-- Main content -->
							<div class="invoice p-3 mb-3">
								<h2>Your transaction has been canceled.</h2><br>
								<!-- info row -->
								<div class="row invoice-info">
									<!-- /.col -->
									<div class="col-sm-4 ">
										<div class="card-block" style="text-align: center;">
											<span class="fab fa-paypal fa-10x"></span>
											<div class="card-header">
												
											</div>
											<br>
											<?php 
											$cid = $_GET['cid'];
											$qid = $_GET['qid'];
											$rpid = $_GET['rpid'];
											?>

											<a href="payment.php?cid=<?php echo $cid?>&qid=<?php echo $qid ?>&rpid=<?php echo $rpid ?>" class="btn-lg btn-success">Retry Pay</a>
										</div>
										<br>
									</div>
									<!-- /.col -->

									<!-- /.col -->
									<div class="col-sm-4 ">
										<div class="card-block" style="text-align: center;">
											<span class="fas fa-tools fa-10x"></span>
											<div class="card-header">
												<!-- <h3 style="text-align: center;">Repair List</h3> -->
											</div>
											<br>
											<a href="repairList.php" class="btn-lg btn-info">Repair List</a>
										</div>
										<br>
									</div>
									<!-- /.col -->

									<!-- /.col -->
									<div class="col-sm-4 ">
										<div class="card-block" style="text-align: center;">
											<span class="fas fa-file-invoice fa-10x"></span>
											<div class="card-header">
												<!-- <h3 style="text-align: center;">Quotation List</h3> -->
											</div>
											<br>
											<a href="quotationList.php" class="btn-lg btn-primary">Quotation List</a>
										</div>
										<br>
									</div>

									<!-- /.col -->
								</div>
								<!-- /.row -->
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
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>
