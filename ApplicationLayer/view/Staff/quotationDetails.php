<?php
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$q_id = $_GET['q_id'];

$quotation = new quotationController();
$data = $quotation->getQuotationDetails($q_id);

foreach($data as $index => $value) {

    $c_id[] = $value['C_ID'];
    $q_deviceType[] = $value['Q_DeviceType'];
    $q_damageType[] = $value['Q_DamageType'];
    $q_damageInfo[] = $value['Q_DamageInfo'];
    $q_solution[] = $value['Q_Solution'];
    $q_cost[] = $value['Q_Cost'];
    $q_date[] = $value['Q_Date'];
    $q_status[] = $value['Q_Status'];

    $result = $quotation->getCustomerInfo($c_id,$index);
    $id = $result->fetch();
    $c_name[] = $id[1];
    $c_email[] = $id[2];
    $c_phone[] = $id[4];

    $k = $index;
}

if(isset($_POST['add'])){
    $quotation->updateQuotation($q_id);
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
        margin-top: 20px;
        width: 75%;
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
                                        <center>
                                            <h2>Quotation #<?=$q_id?></h2>
                                        </center>
                                        <form method="POST">
                                            <?php
            $i = 1;
            for($x = 0; $x <= $k; $x++) { 
                
            ?>
                                            <div class="form-group row mb-3 mt-5">
                                                <label for="inputEmail" class="col-sm-5 col-form-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputEmail" placeholder="<?=$c_name[$k]?>"
                                                        value="<?=$c_name[$k]?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="inputPassword" class="col-sm-5 col-form-label">Phone
                                                    Number</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputPassword" placeholder="<?=$c_phone[$k]?>"
                                                        value="<?=$c_phone[$k]?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="inputDate" class="col-sm-5 col-form-label">Date</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputDate" placeholder="<?=$q_date[$k]?>"
                                                        value="<?=$q_date[$k]?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="deviceType" class="col-sm-5 col-form-label">Device
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="deviceType" placeholder="<?=$q_deviceType[$k]?>"
                                                        value="<?=$q_deviceType[$k]?>">
                                                </div>
                                            </div>


                                            <div class="form-group row mb-5">
                                                <label for="status" class="col-sm-5 col-form-label">Status</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="status" placeholder="<?=$q_status[$k]?>"
                                                        value="<?=$q_status[$k]?>">
                                                </div>
                                            </div>


                                            <table class="table mb-3">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Damage Type</th>
                                                        <th scope="col">Damage Info / Symptom</th>
                                                        <th scope="col">Repair Soulution</th>
                                                        <th scope="col" style="width:100px">Price (RM)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                        <td>Software</td>
                        <td>Cannot go to windows login</td>
                        <td><input type="text" class="form-control" id="repairSolution" placeholder="Reair Solution">
                        </td>
                        <td><input type="text" class="form-control" id="repairPrice" placeholder="Price"></td>
                    </tr> -->
                                                    <?php
                    echo '
                        <tr>
                            <td>'.$q_damageType[$x].'</td>
                            <td>'.$q_damageInfo[$x].'</td>
                            <td><input type="text" name="solution" class="form-control" id="repairSolution" 
                            placeholder="Repair Solution" value="'.$q_solution[$x].'"></td>
                            <td><input type="text" name="cost" class="form-control" id="repairPrice" 
                            placeholder="Price" value="'.$q_cost[$x].'"></td>
                        </tr>
                    ';
                    $i++;
                }

                ?>

                                                </tbody>
                                            </table>
                                            <div class="col-md-12 text-center mt-5 mb-5">
                                                <?php if( $q_status[$k] == "Pending") { ?>
                                                <button type="submit" name="add" class="btn btn-primary">Generate
                                                    Quotation</button>
                                                <?php } ?>
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