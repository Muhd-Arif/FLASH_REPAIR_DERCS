<?php
//require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../../BusinessServiceLayer/controller/deliveryController.php';
require_once '../../../libs/runnerSession.php';


$RunnerID = $_SESSION['RunnerID'];
//$RunnerID = '1';


$product = new deliveryController();


// Get all delivery from rider_order table based on rider id
$data = $product->viewAllMyDelivery($RunnerID);



error_reporting(0);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <!-- NAVIGATION BAR  -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
    <!-- NAVIGATION BAR  -->

    <title>Accepted Pickup</title>
</head>

<body>
    <style>
    .container {
        margin-bottom: 70px;
        width: 80%;
    }

    input[readonly] {
        outline: none;
        border: 0;
        font-size: 1em;
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
                                                    <h2 style="margin-bottom:70px;">Accepted Delivery</h2>
                                                </center>
                                                <!-- <input type="text" class="form-control mt-5" id="filterInput"
            placeholder="Search quotation ID, device type, status"> -->

                                                <!-- <table class="table mt-3" id="quotationList"> -->
                                                <table class="table mt-5" id="dataTable">
                                                    <thead class="thead-dark">
                                                         <tr>
                                                            <th scope="col">Quotation ID</th>
                                                            <th scope="col">Customer Nam</th>
                                                            <th scope="col">Device Type</th>
                                                            <th scope="col">elivery Address</th>
                                                            <th scope="col">Service</th>
                                                            <th scope="col">Payment Type</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    <?php
                        
                        //foreach($data as $j => $value) {
                          foreach($data as $row){
                            $i = 1;
                          ?> 

                          <tr>
                               
                                <td><?=$row['Q_ID']?></td>
                                <td><?=$row['C_Name']?></td>
                                <td><?=$row['Q_DeviceType']?></td>
                                <td><?=$row['D_Address']?></td>
                                <td><?=$row['Service']?></td>
                                <td><?=$row['Payment_Type']?></td>
                               <!--  <td><?=$row['Service']?></td> -->
                              
                                 <td>
                                     <form id="delivery-form" method="post" action="updateDelivery.php">
                                      <input type='hidden' id="" name='DeliveryID' value="<?=$row['D_ID']?>'">
                                      <div id="parent" style="display:flex;">
                                      <div class="" id="button1" style="margin-right:5px">
                                      
                                     
                                         <?php
                                        if($row['D_Status'] == 'Processing'){
                                        
                                          ?>

                                         
                                            <button id="edit" name="edit" class="btn btn-sm btn-info float-left">Edit</button>
   

                                           <?php
                                        } else {
                                             echo $row['D_Status'];

                                          }
                                        ?>
                                        

                                      </div>
                                       
                                    </div>
                                    </form>
                                  </td>
                                </tr>
                     <?php
                               
                                }
                              
                            
                              ?>
                                                    </tbody>
                                                </table>
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

    <script type="text/javascript">
    // // Get input element
    // let filterInput = document.getElementById('filterInput');
    // // Add event listener
    // filterInput.addEventListener('keyup', filter);

    // function filter() {
    //     // Get value of input
    //     let filterValue = document.getElementById('filterInput').value.toUpperCase();

    //     let trs = document.querySelectorAll('#quotationList tr:not(.header)');

    //     trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(
    //         filterValue)) ? '' : 'none');

    // }

    document

    $(document).ready(function() {
        $('#dataTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'print'
            // ],
            "ordering": false,

        });
    });
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>


</html>