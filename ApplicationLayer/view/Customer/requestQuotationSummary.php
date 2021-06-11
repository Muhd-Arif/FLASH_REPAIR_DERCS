<?php
require_once '../../../libs/custSession.php';
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$quotation = new quotationController();

$C_ID = $_SESSION['C_ID'];
$C_Phone = $_SESSION['C_Phone'];
$C_Name = $_SESSION['C_Name'];

if(isset($_POST['addQuotation'])){
    $date = date("F j, Y");
    $deviceType = $_POST['deviceType'];
    $damageType = $_POST['damageType'];
    $damageInfo = $_POST['damageInfo'];

     // add customer request quotation into database - Arif
    $quotation->addQuotation($C_ID, $date, $deviceType, $damageType, $damageInfo);
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
    .card {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 2%;
    }

    .container {
        margin-top: 10px;
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
                        <div class="col-12 ">
                            <!-- Main content -->

                            <div class="card ">
                                <!-- /.col -->
                                <div class="container">
                                    <!-- TEMPLATE 1 STOP -->
                                    <div class="card-header">
                                        <h3 style="text-align: center">Request Quotation</h3>
                                    </div>
                                    <div style="margin-top: -4%;">
                                        <form method="POST">
                                            <div class="form-group row mb-3 mt-5">
                                                <label for="name" class="col-sm-5 col-form-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="custName" readonly
                                                        class="form-control-plaintext" id="name" placeholder=""
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="phone" class="col-sm-5 col-form-label">Phone
                                                    Number</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="custPhone" readonly
                                                        class="form-control-plaintext" id="phone" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="date" class="col-sm-5 col-form-label">Date</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="requestDate" readonly
                                                        class="form-control-plaintext" id="date"
                                                        placeholder="<?=date("F j, Y")?>" value="<?=date("F j, Y")?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="deviceType" class="col-sm-5 col-form-label">Device
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="deviceType" readonly
                                                        class="form-control-plaintext" id="deviceType"
                                                        placeholder="Computer" value="Computer">
                                                </div>
                                            </div>


                                            <div class="form-group row mb-3">
                                                <label for="damageType" class="col-sm-5 col-form-label">Damage
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="damageType" readonly
                                                        class="form-control-plaintext" id="damageType"
                                                        placeholder="Hardware" value="Hardware">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="damageInfo" class="col-sm-5 col-form-label">Damage
                                                    Information / Symptom </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="damageInfo" readonly
                                                        class="form-control-plaintext" id="damageInfo"
                                                        placeholder="Cannot boot windows" value="Cannot boot windows">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-5">
                                                <button type="button" class="btn btn-primary" style="width: 230px"
                                                    id="edit">Edit Request
                                                    Quotation</button>
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to send this quotation?');"
                                                    name="addQuotation" class="btn btn-success ms-5"
                                                    style="width: 230px">Submit Request
                                                    Quotation</button>
                                            </div>
                                        </form>
                                    </div>
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

    <script src="../../../assets/js/quotationSummary.js"></script>
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