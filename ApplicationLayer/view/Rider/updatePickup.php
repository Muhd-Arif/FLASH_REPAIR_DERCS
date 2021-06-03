<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
require_once '../../../libs/runnerSession.php';


$RunnerID = $_SESSION['R_ID'];
//$RunnerID = '1';
//$data = $_POST['edit'];

$product = new deliveryController();;

error_reporting(0);


 // get all rider pickup based on Rider id
$data = $product->viewAllMyDelivery2($RunnerID);

$pickupid = $_POST["PickupID"];

// get all pickup details from pickup table based on pickup id
  $result = $product->getOrderID2($pickupid,$j);
  
 // update pickup status to complete from based pickup id
if(isset($_POST['pickup'])){
    $product->pickedup();
} 



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rider Available Request List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../../assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../../assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../../assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../../assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DERCS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Navee</a>
        </div>
      </div>

     

     
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Delivery Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Delivery Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                   <h3 align="center">Customer Delivery Details</h3>
                    <i class="fa fa-truck fa-3x" aria-hidden="true"></i>
                 </div>
<!--                  <input type="text" class="form-control mt-3" id="filterInput" placeholder="Search location...">
 -->
                 
                  <div class="table-responsive pt-10">
                   <!-- <table class="table table-borderless table-dark"> -->
                    
                          <?php
                                $i = 1;
                                 foreach($data as $j => $value) {
                                  foreach($result as $row){
                                   
                                   ?>
                         <!--test suggestion-->
                         <div class="card">
                                     <form id="delivery-form" method="post">
                                         <div class="modal-body">
                                           <div class="card-footer">
                                             <p style="color:pink"><span style="font-weight:bold">Customer information</span></p>
                                             <p><span style="font-weight:bold">Customer Name: </span><?=$row['C_Name']?></p>
                                              <p><span style="font-weight:bold">Pickup Address: </span><?=$row['P_Addr']?></p>
                                              <p><span style="font-weight:bold">Customer Phone: </span><?=$row['C_Phone']?></p>
                                              <p><span style="font-weight:bold">Product Name: </span><?=$row['Q_DeviceType']?></p>
                                          
                                           
                                           
                                           
                                          </div>

                                            &nbsp;
                                           
                                           

                                          
                                           <div class="card-footer">
                                            <form id="" method="post">
                                               <input type="hidden" name="PickupID" value="<?=$row['P_ID']?>">
                                            <p style="color:pink"><span style="font-weight:bold">Pickup information</span></p>
                                           
                                           <p> <i class="fa fa-calendar-alt" aria-hidden="true"></i> <span style="font-weight:bold">Pickup Date&nbsp;&nbsp;: </span><input type="text" disabled="true" id="cost" name="cost" value="<?=$row['P_Date']?>"></p>                                        
                                           <p><i class="fa fa-clock" aria-hidden="true"></i> <span style="font-weight:bold">Pickup Time&nbsp;: </span><input type="text" disabled="true" id="cost" name="cost" value="<?=$row['P_Time']?>"></p>
                                            
                                            
                                           </form>
                                             </div>


                                       &nbsp;

                                          

                                          <form id="delivery-form" method="post">

                                         <div class="card-footer">
                                          <?php
                                          if($row['P_Status'] == 'Processing'){
                                          $color[$x] = 'red'
                                        
                                          ?>
                                             <p <?php echo "style='color:".$color[$x]."'" ?>><span style="font-weight:bold;color:pink">Pickup Status : </span><?=strtoupper($row['P_Status'])?></p>
                                            <input type="radio" id="Done" name="Done" value="Done" required> Done &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="proceesing" name="Done" value="proceesing" disabled="true"> Processing
                                             <?php
                                        } else {

                                          }
                                        ?>
                                          </div><br>

                                         

                                         <div class="modal-footer">
                                        
                                          <div class="" id="button1" style="margin-right:5px">
                                         <input type="hidden" name="PickupID" value="<?=$row['P_ID']?>">
                                          <button id="pickup" name="pickup" type="submit" class="btn btn-primary accept" onclick="return confirm('Are you sure you want to confirm this pickup?');">CONFIRM</button>
                                      </div>
                                      
                                    </form>
                                           <button type="button" class="btn btn-secondary" onclick="location.href='../../ApplicationLayer/Rider/myPickup.php'">Close</button>
                                         </div>
                                       </form>
                                     </div>
                                      

                                   <!--test suggestion-->
                                   <?php
                                $i++;
                               echo "</tr>";
                                }
                              }
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

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../plugins/raphael/raphael.min.js"></script>
<script src="../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../../assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../assets/js/pages/dashboard2.js"></script>
</body>
</html>
