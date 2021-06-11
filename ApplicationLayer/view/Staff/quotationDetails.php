<?php
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$Q_ID = $_GET['q_id'];
$s_id = $_SESSION['S_ID'];

$quotation = new quotationController();

// get quotation details based on quotation ID - ARIF
$data = $quotation->getRequestQuotationDetails($Q_ID);

foreach($data as $index => $value) {

    $C_ID[] = $value['C_ID'];
    $Q_DeviceType[] = $value['Q_DeviceType'];
    $Q_DamageType[] = $value['Q_DamageType'];
    $Q_DamageInfo[] = $value['Q_DamageInfo'];
    $Q_Solution[] = $value['Q_Solution'];
    $Q_Cost[] = $value['Q_Cost'];
    $Q_Date[] = $value['Q_Date'];
    $Q_Status[] = $value['Q_Status'];

    // get customer info  based on quotation ID - ARIF
    $result = $quotation->getCustomerInfo($C_ID,$index);
    $id = $result->fetch();
    $C_Name[] = $id[1];
    $C_Email[] = $id[2];
    $C_Phone[] = $id[4];

    $k = $index;
}

if(isset($_POST['add'])){
        // update customer quotation with repair solution and cost - ARIF
    $quotation->updateQuotation($Q_ID, $s_id);
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
                                            <h2>Quotation #<?=$Q_ID?></h2>
                                        </center>
                                        <form method="POST">
                                            <?php
            $i = 1;
            for($x = 0; $x <= $k; $x++) { 
                $C_Name = $C_Name[$k];
                $C_Phone = $C_Phone[$k];
                $Q_Date = $Q_Date[$k];
                $Q_DeviceType = $Q_DeviceType[$k];
                $Q_Status = $Q_Status[$k];
                $Q_DamageType = $Q_DamageType[$x];
                $Q_DamageInfo = $Q_DamageInfo[$x];
                $Q_Solution = $Q_Solution[$x];
                $Q_Cost = $Q_Cost[$x];
            ?>
                                            <div class="form-group row mb-3 mt-5">
                                                <label for="inputEmail" class="col-sm-5 col-form-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputEmail" value="<?=$C_Name?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="inputPassword" class="col-sm-5 col-form-label">Phone
                                                    Number</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputPassword" value="<?=$C_Phone?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="inputDate" class="col-sm-5 col-form-label">Date</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="inputDate" value="<?=$Q_Date?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="deviceType" class="col-sm-5 col-form-label">Device
                                                    Type</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="deviceType" value="<?=$Q_DeviceType?>">
                                                </div>
                                            </div>


                                            <div class="form-group row mb-5">
                                                <label for="status" class="col-sm-5 col-form-label">Status</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="status" value="<?=$Q_Status?>">
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
                            <td>'.$Q_DamageType.'</td>
                            <td>'.$Q_DamageInfo.'</td>
                            <td><input type="text" name="solution" class="form-control" id="repairSolution" 
                            placeholder="Repair Solution" value="'.$Q_Solution.'"></td>
                            <td><input type="text" name="cost" class="form-control" id="repairPrice" 
                            placeholder="Price" value="'.$Q_Cost.'"></td>
                        </tr>
                    ';
                    $i++;
                }

                ?>

                                                </tbody>
                                            </table>
                                            <div class="col-md-12 text-center mt-5 mb-5">
                                                <?php if( $Q_Status == "Pending") { ?>
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