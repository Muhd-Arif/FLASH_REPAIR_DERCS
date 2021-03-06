<?php
require_once '../../../libs/custSession.php';
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$C_ID = $_SESSION['C_ID'];
$quotation = new quotationController();


   // get customer's request quotation - ARIF
$data = $quotation->getMyQuotation($C_ID);

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

    <title>My Quotation</title>
</head>

<body>
    <style>
    .card {
        width: 95%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 2%;
    }

    .container {
        margin-top: 10px;
        margin-bottom: 50px;
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
                                        <center>
                                            <h2 style="margin-bottom:50px;">My Quotation</h2>
                                        </center>
                                        <!-- <table class="table mt-3" id="quotationList"> -->
                                        <table class="table mt-5" id="dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Quotation ID</th>
                                                    <th scope="col">Device Type</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                    <th scope="row">1</th>
                    <td>#123456</td>
                    <td>Laptop</td>
                    <td>Not Accepted</td>
                    <td>23 / 3 / 2021</td>
                    <td><button type="submit" class="btn btn-primary">View</button></td>
                </tr> -->
                                                <?php
                $i = 1;
                foreach($data as $row){
                    
                    $Q_ID[$i] = $row['Q_ID'];
                    $Q_DeviceType[$i] = $row['Q_DeviceType'];
                    $Q_Status[$i] = $row['Q_Status'];
                    $Q_Date[$i] = $row['Q_Date'];

                    echo '
                    <tr>
                    <th scope="row">'. $i .'</th>
                    <td>#'.$Q_ID[$i].'</td>
                    <td>'.$Q_DeviceType[$i].'</td>
                    <td id="'.$Q_ID[$i].'">'.$Q_Status[$i].'</td>
                    <td>'.$Q_Date[$i].'</td>'
                    ?>
                                                <td>
                                                    <form method="POST">
                                                        <button type="button"
                                                            onclick="location.href='requestQuotationDetails.php?q_id=<?=$Q_ID[$i]?>'"
                                                            name="<?=$Q_ID[$i]?>" id="view"
                                                            class="btn btn-primary">View</button>
                                                    </form>
                                                </td>

                                                <script type="text/javascript">
                                                var td = document.getElementById("<?=$Q_ID[$i]?>");
                                                var btn = document.getElementById("<?=$Q_ID[$i]?>");

                                                if (td.innerText == 'Pending') {
                                                    td.style.fontWeight = "bold"
                                                } else if (td.innerText == 'Pending Confirmation') {
                                                    td.style.color = "Blue"
                                                    td.style.fontWeight = "bold"
                                                } else if (td.innerText == 'Accepted') {
                                                    td.style.color = "Green"
                                                    td.style.fontWeight = "bold"
                                                } else {
                                                    td.style.color = "Red"
                                                    td.style.fontWeight = "bold"
                                                }
                                                </script>


                                                <?php echo '
                    </tr>';
                    $i++;
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
    $(document).ready(function() {
        $('#dataTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'print'
            // ],
            "ordering": false,
            "pageLength": 5,
            lengthMenu: [5, 10, 15, 20, 25, 30],

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