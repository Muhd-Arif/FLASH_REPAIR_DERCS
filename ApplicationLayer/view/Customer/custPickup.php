<?php

// Author : Naveenam Mayyalgan
// This page displays the pickup form

require_once '../../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
require_once '../../../libs/custSession.php';



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
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 2%;
    }
    .container {
        margin-top: 10px;
        width: 80%;
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
                            <div class="container">
                                <!-- TEMPLATE 1 STOP -->
                                <div class="card-header">
                                    <h3 style="text-align: center">Customer Pickup Details</h3>

                                </div>
                                 <div style="margin-top: -2%;">
                                <?php
                                $i = 1;
                                foreach($cust as $row){
                                    # code...

                                // foreach($cust as $row) { 

                                 ?>
                                 <!--test suggestion-->
                                 <!--   <div class="card"> -->
                                    <form id="delivery-form" method="post">
                                      <!--   <div class="modal-body">-->
                                          <!--   <div class="card-footer"> -->


                                            <input type='hidden' id='<?=$row['Q_ID']?>'
                                            name='QuotationID'
                                            value='<?=$row['Q_ID']?>'>
                                            <input type='hidden' id='<?=$row['C_ID']?>'
                                            name='CustID' value='<?=$row['C_ID']?>'>
                                            <br>
                                            <!-- <label for="damageInfo">Please provide pickup details</label><br> -->

                                            <div class="form-group row mb-3 mt-9">
                                                <i class="fa fa-calendar-alt" aria-hidden="true">
                                                    <label for="date" class="col-sm-9 col-form-label">Pickup
                                                    Date</label></i>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="date" name="date"required="true" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3 mt-9">
                                                   <i class="fa fa-clock" aria-hidden="true"> 
                                                    <label for="time" class="col-sm-9 col-form-label">Pickup
                                                    Time</label></i>

                                                    <div class="col-sm-12">
                                                        <select id="time" name="time" required="true"  class="form-control">
                                                            <option value="10:00 - 12:00">10:00 - 12:00
                                                            </option>
                                                            <option value="13:00 - 15:00">13:00 - 15:00
                                                            </option>
                                                            <option value="16:00 - 18:00">16:00 - 18:00
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3 mt-9">
                                                    <i class="fa fa-address-book" aria-hidden="true"> 
                                                        <label for="addr" class="col-sm-9 col-form-label">Pickup Address</label></i>
                                                        <div class="col-sm-12">
                                                           <textarea class="form-control mt-2" id="addr" name="addr" rows="3"></textarea>
                                                       </div>
                                                   </div>

                                                   <div class="form-group row mb-3 mt-9">
                                                    <i class="fa fa-address-book" aria-hidden="true"> 
                                                        <label for="notes" class="col-sm-9 col-form-label">Pickup
                                                        Notes</label></i>
                                                        <div class="col-sm-12">
                                                           <textarea class="form-control mt-2" id="notes" name="notes" rows="3"></textarea>
                                                       </div>
                                                   </div>


                                                   <div class="modal-footer">

                                                    <div class="col-md-12 text-center mt-3">

                                                        <input type="hidden" name="OrderProductID"
                                                        value="<?=$orderproductid[$x]?>">
                                                                            <!-- <button id="pickup" name="pickup"
                                                                                type="submit"
                                                                                class="btn btn-primary accept"
                                                                                onclick="return confirm('Are you sure you want to confirm this pickup?');">CONFIRM</button> -->
                                                                                <button id="pickup" name="pickup" type="submit" class="btn btn-primary"
                                                                                style="width: 200px"onclick="return confirm('Are you sure you want to confirm this pickup?');">CONFIRM</button>


                                                                            </form>
                                                                            <!--  </div> -->




                                              <!--   </div>
                                              -->

                                              <!--test suggestion-->
                                              <?php
                                              $i++;
                                          }
                                          echo "</tr>";
                                // }
                                          ?>
                                          <!-- TEMPLATE PART 2 -->
                                      </div>
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