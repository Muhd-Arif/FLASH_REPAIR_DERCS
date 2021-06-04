<?php
   require_once '../../../libs/custSession.php';
   
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
        /*padding-bottom: 1%;*/
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
                                    <div class="container" >
                                        <!-- TEMPLATE 1 STOP -->
                                        <div class="card-header">
                                            <h3 style="text-align: center">Request Quotation</h3>
                                        </div>
                                                <div style="margin-top: -4%;">
                                                    
                                                <form id="quotationForm">
                                                    <div class="form-group row mb-3 mt-5">
                                                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name" readonly
                                                                value="<?=$_SESSION['C_Name']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="phone" class="col-sm-3 col-form-label">Phone
                                                            Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="phone" readonly
                                                                value="<?=$_SESSION['C_Phone']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" readonly class="form-control" id="date"
                                                                placeholder="<?=date("F j, Y")?>"
                                                                value="<?=date("F j, Y")?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="deviceType" class="col-sm-3 col-form-label">Device
                                                            Type</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="deviceType">
                                                                <option>Computer</option>
                                                                <option>Laptop</option>
                                                                <option>Mobile</option>
                                                                <option>Tablet</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" readonly id="c_id"
                                                        value="<?=$_SESSION['C_ID']?>">
                                                    <div class="form-group row mb-3">
                                                        <label for="damageType" class="col-sm-3 col-form-label">Damage
                                                            Type</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="damageType">
                                                                <option>Hardware</option>
                                                                <option>Software</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="damageInfo">Damage Information / Symptom </label>
                                                        <textarea class="form-control mt-2" id="damageInfo"
                                                            rows="3"></textarea>
                                                    </div>
                                                    <div class="col-md-12 text-center mt-3">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 200px">Add Damage</button>
                                                    </div>
                                                    <br>
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