<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
require_once '../../../libs/runnerProfileSession.php';
 
$RunnerID = $_SESSION['R_ID'];
//$RunnerID = '1';
//$data = $_POST['edit'];

$product = new deliveryController();

error_reporting(0);


 // get all rider_order details based on Rider ID
$data = $product->viewAllMyDelivery($RunnerID);

$deliveryid = $_POST["DeliveryID"]; 
$QuotationID = $_POST["QuotationID"];

// get all delivery details from delivery table based on delivery id
$result = $product->getOrderID($deliveryid,$j);
 


if(isset($_POST['delivered'])){
    $product->deliveredDelivery();
} else if(isset($_POST['receive'])){
  $product->receivePayment($RunnerID);
  $deliveryid = $_POST["DeliveryID"]; 
  $result = $product->getOrderID($deliveryid,$j);
 
}


?>
<!DOCTYPE html>
<html lang="en">
<script>

</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- NAVIGATION BAR  -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
    <!-- NAVIGATION BAR  -->
    <title>Update Delivery Status</title>
</head>

<body>
    <style>
    .container {
        margin-top: 20px;
        width: 50%;
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
                            <div class="invoice p-3 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body pb-0">
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <!-- /.col -->
                                            <div class="container">
                                                <!-- TEMPLATE 1 STOP -->
                                                <center>
                                                    <h2>Customer Delivery Details</h2>
                                                </center>
                                                <br><br>
                                                  <?php
                                $i = 1;
                                // $x = 0;
                                foreach($data as $j => $value) {
                                  foreach($result as $row){
                                  
                                   
                                    // foreach($item as $row){
                                    //   foreach($cust as $row){
                                    ?>             
                                   <!--   <div class="card-footer" id=""> -->
                                                                                                    
                                                     <div class="form-group row mb-3 mt-9">
                                                      <label for="custName" class="col-sm-3 col-form-label"> Name </label>
                                                        <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="name" readonly
                                                                value="<?=$row['C_Name']?>">
                                                        </div>
                                                     </div>
                                                     <div class="form-group row mb-3 mt-9">
                                                      <label for="phone" class="col-sm-3 col-form-label"> Phone No </label>
                                                        <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="phone" readonly
                                                                value="<?=$row['C_Phone']?>">
                                                        </div>
                                                     </div>
                                                     <div class="form-group row mb-3 mt-9">
                                                      <label for="deviceType" class="col-sm-3 col-form-label"> Device Type </label>
                                                        <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="deviceType" readonly
                                                                value="<?=$row['Q_DeviceType']?>">
                                                        </div>
                                                     </div>
                                                     <div class="form-group row mb-3 mt-9">
                                                      <label for="address" class="col-sm-3 col-form-label"> Delivery Address </label>
                                                        <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="address" readonly
                                                                value="<?=$row['D_Address']?>">
                                                        </div>
                                                     </div>
                                                     
                                                    
                                                     <!--  </div>  --> 
                                        
                                           

                                           <?php
                                        if($row['Payment_Type'] == 'COD'){

                                        
                                          ?>
                                           <div class="card-footer" id="">
                                            <form id="" method="post" action="updateDelivery.php">
                                             <input type='hidden' id="" name='DeliveryID' value="<?=$row['D_ID']?>">
                                             <input type='hidden' id="" name='QuotationID' value="<?=$row['Q_ID']?>">
                                            <p style="color:red"><span style="font-weight:bold">COD Payment Status</span></p>
                                            <input type="text" disabled="true" id="cost" name="cost" value="RM <?=$row['Q_Cost']?>">&nbsp;&nbsp;&nbsp;
                                             <button id="receive" name="receive" type="submit" <?php if (!empty($row['PAY_Status'])){echo "disabled=true; style='background-color:green';";} ?> class="btn btn-primary accept" onclick="return confirm('Are you sure you want to receive this payment?');">RECEIVE</button>
                                           </form>
                                             </div>

                                           <?php
                                        } else {


                                          }
                                        ?>

                                       &nbsp;&nbsp;&nbsp;

                                           <?php
                                         
                                        if($row['PAY_Status'] == 'Completed'){
                                        
                                          ?>

                                          <form id="delivery-form" method="post">

                                         <div class="card-footer" id="test">
                                          <input type='hidden' id="" name='DeliveryID' value="<?=$row['D_ID']?>">
                                            <p style="color:red"><span style="font-weight:bold">Delivery Status: </span><?=strtoupper($row['D_Status'])?></p>
                                            <input type="radio" id="Done" name="Done" value="Done" required> Done &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="proceesing" name="Done" value="proceesing" disabled="true"> Processing
                                          </div><br>

                                          <?php
                                        } else {

                                          }
                                        ?>

                                         <div class="modal-footer">
                                          <?php
                                        if($row['PAY_Status'] == 'Completed'){
                                        
                                          ?>
                                          
                                          <div class="" id="button1" style="margin-right:5px">
                                          <input type="hidden" name="DeliveryID" value="<?=$row['D_ID']?>">
                                          <button id="delivered" name="delivered" type="submit" class="btn btn-primary accept" onclick="return confirm('Are you sure you want to confirm this delivery?');">CONFIRM</button>
                                      </div>
                                       <?php
                                        } else {

                                          }
                                        ?>
                                    </form>
                                           <button type="button" class="btn btn-secondary" onclick="location.href='myDelivery.php'">Close</button>
                                         </div>
                                   <?php
                                $i++;
                              
                                }
                              }
                          //   }
                          // }
                              ?>
                                            </div>
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
    <!-- <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
         <script src="../../../assets/js/adminlte.min.js"></script>
         <script src="../../../assets/js/demo.js"></script> -->
    <!-- TEMPLATE PART 2 STOP -->
    <script src="../../../assets/js/quotation.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>