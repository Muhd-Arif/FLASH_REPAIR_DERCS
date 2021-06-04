<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
//require_once '../../../libs/runnerSession.php';


//$RunnerID = $_SESSION['R_ID'];
$RunnerID = '1';
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
    <title>Request Quotation</title>
</head>

<body>
    <style>
    .card{
        width: 70%;
        margin-left: auto;
        margin-right: auto;
        
    }
    .container {
        margin-top: 10px;
        width: 90%;
    }
    </style>
    <!-- TEMPLATE 1  -->
    <div class="wrapper">
        <?php include("sidebar.php") ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
                <!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="col-12 ">
                                <!-- Main content -->

                                <div class="card ">
                                    <!-- /.col -->
                                    <div class="container" >
                                        <!-- TEMPLATE 1 STOP -->
                                        <div class="card-header">
                                            <h3 style="text-align: center">Customer Pickup Details</h3>
                                        </div>
                                        <div style="margin-top: -2%;">
                                                   
                                                </center>
                                                <br>
                                                <?php
                                $i = 1;
                                 foreach($data as $j => $value) {
                                  foreach($result as $row){
                                   
                                   ?>
                         <!--test suggestion-->
                        <!--  <div class="card"> -->
                                     <form id="delivery-form" method="post">
                                         <div class="modal-body">
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
                                                      <label for="address" class="col-sm-3 col-form-label"> Pickup Address </label>
                                                        <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="address" readonly
                                                                value="<?=$row['P_Addr']?>">
                                                        </div>
                                                     </div>

                                           
                                           
                                           

                                          
                                           <div class="card-footer">
                                            <form id="" method="post">
                                               <input type="hidden" name="PickupID" value="<?=$row['P_ID']?>">
                                            <p style="color:blue"><span style="font-weight:bold">Pickup information</span></p>
                                           
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
                                             <p <?php echo "style='color:".$color[$x]."'" ?>><span style="font-weight:bold;color:blue">Pickup Status : </span><?=strtoupper($row['P_Status'])?></p>
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
                                           <button type="button" class="btn btn-secondary" onclick="location.href='myPickup.php'">Close</button>
                                         </div>
                                       </form>
                                     <!-- /div> -->
                                      

                                   <!--test suggestion-->
                                   <?php
                                $i++;
                               echo "</tr>";
                                }
                              }
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