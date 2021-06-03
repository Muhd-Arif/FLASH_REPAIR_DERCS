<?php

require_once '../../../libs/custSession.php';
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$q_id = $_GET['q_id'];

$quotation = new quotationController();
$data = $quotation->getQuotationDetails($q_id);

if(isset($_POST['send'])){
    $q_status = "Accepted";
    $delivery = "send";
    $quotation->updateConfirmation($q_id, $q_status, $delivery);
}

if(isset($_POST['pickup'])){
    $q_status = "Accepted";
    $delivery = "pickup";
    $quotation->updateConfirmation($q_id, $q_status, $delivery);
}

if(isset($_POST['reject'])){
    $q_status = "Rejected";
    $quotation->updateConfirmation($q_id, $q_status);
}

?>


<!DOCTYPE html>
<html lang="en">

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
    <title>Request Quotation Confirmation</title>
</head>

<body>
    <style>
    .container {
        margin-top: 30px;
        width: 70%;
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
                                                    <h2>Quotation #<?=$q_id?></h2>
                                                </center>
                                                <form method="POST" id="quotationDetails">
                                                    <?php
                                                        foreach($data as $row){
                                                        ?>
                                                    <div class="form-group row mb-3 mt-5">
                                                        <label for="inputName"
                                                            class="col-sm-5 col-form-label">Name</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="inputName" placeholder="Muhd Arif Mohd Amir"
                                                                value="Muhd Arif Mohd Amir">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="inputPassword" class="col-sm-5 col-form-label">Phone
                                                            Number</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="inputPassword" placeholder="0123456789"
                                                                value="0123456789">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="inputDate"
                                                            class="col-sm-5 col-form-label">Date</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="inputDate" placeholder="<?=$row['Q_Date']?>"
                                                                value="<?=$row['Q_Date']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="deviceType" class="col-sm-5 col-form-label">Device
                                                            Type</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="deviceType" placeholder="<?=$row['Q_DeviceType']?>"
                                                                value="<?=$row['Q_DeviceType']?>">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mb-5">
                                                        <label for="status"
                                                            class="col-sm-5 col-form-label">Status</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="status" placeholder="<?=$row['Q_Status']?>"
                                                                value="<?=$row['Q_Status']?>">
                                                        </div>
                                                    </div>

                                                    <table class="table mb-3">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Damage Type</th>
                                                                <th scope="col">Damage Info / Symptom</th>
                                                                <th scope="col">Repair Soulution</th>
                                                                <th scope="col">Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?=$row['Q_DamageType']?></td>
                                                                <td><?=$row['Q_DamageInfo']?></td>
                                                                <td><?=$row['Q_Solution'] == "" ? 'Pending Repair Solution' : $row['Q_Solution']?>
                                                                </td>
                                                                <td><?=$row['Q_Cost'] ?? "" ?></td>
                                                            </tr>
                                                            <tr style="height:30px">
                                                                <th scope="row"></th>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <td></td>
                                                                <th>Total</th>
                                                                <th><?=$row['Q_Cost'] ?? "" ?></th>
                                                            </tr>

                                                        </tbody>
                                                        <script type="text/javascript">
                                                        var input = document.getElementById("status");
                                                        console.log(input.value)
                                                        if (input.value === 'Pending') {
                                                            input.style.fontWeight = "bold"
                                                        } else if (input.value === 'Pending Confirmation') {
                                                            input.style.color = "Blue"
                                                            input.style.fontWeight = "bold"
                                                        } else if (input.value === "Accepted") {
                                                            input.style.color = "green"
                                                            input.style.fontWeight = "bold"
                                                        } else {
                                                            input.style.color = "Red"
                                                            input.style.fontWeight = "bold"
                                                        }
                                                        </script>
                                                    </table>
                                                    <div class="col-md-12 text-center mt-5 mb-5">
                                                        <?php if($row['Q_Status'] == "Pending") { 
                ?>

                                                        <?php } else if($row['Q_Status'] == "Pending Confirmation") { 
                ?>

                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#exampleModalCenter">Accept
                                                            Quotation</button>
                                                        <button type="submit" name="reject"
                                                            class="btn btn-danger ms-5">Cancel Quotation</button>
                                                        <?php } else { 
                    ?>

                                                        <?php } 
                    ?>
                                                    </div>
                                                    <?php } ?>


                                                    <!-- Modal -->

                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLongTitle">
                                                                        Pickup Confirmation</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h6>Do you want us to pickup for you?</h6>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="send"
                                                                        class="btn btn-secondary">No, I will send it
                                                                        myself</button>
                                                                    <button type="submit" name="pickup"
                                                                        class="btn btn-primary">Yes, please pickup for
                                                                        me</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

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