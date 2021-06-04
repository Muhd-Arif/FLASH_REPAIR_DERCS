<?php 
require_once '../../../libs/custSession.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Homepage</title>

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
							<h1>Homepage</h1>
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
								<br>
								<!-- info row -->
								<div class="row invoice-info">
									<!-- /.col -->
									<div class="col-sm-4 ">

										<div class="card-block" style="text-align: center;">
											<span class="fas fa-user-circle fa-10x"></span>
											<div class="card-header">
												
											</div>
											<br>
											
											<a href="customerProfile.php" class="btn-lg btn-success">My Profile</a>
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
											<a href="requestQuotationList.php" class="btn-lg btn-primary">Quotation List</a>
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
											<a href="myRepairList.php" class="btn-lg btn-info">Repair List</a>
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
