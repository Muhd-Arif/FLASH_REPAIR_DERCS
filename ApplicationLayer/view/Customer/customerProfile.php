<?php

require_once '../../../libs/custSession.php';
require_once '../../../BusinessServiceLayer/controller/customerProfileController.php';
$customer = new customerProfileController();
$data = $customer->my();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://kit.fontawesome.com/f252491b10.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/profile.css">
    <link rel="stylesheet" href="../../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css"> -->

    <!-- NAVIGATION BAR  -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- NAVIGATION PART 1 STOP -->
            <div class="container mt-5">
                <div id="customer-profile">
                    <div id="customer-nav" class="text-center">
                        <div class="profile-img border w-100">
                            <img class="profile-img-backdrop" src="../../../uploads/<?php echo $data['image'] ?>" alt=""
                                srcset="">
                            <img class="profile-img-real" src="../../../uploads/<?php echo $data['image'] ?>" alt=""
                                srcset="" onerror="this.src='../../../uploads/default.png';">
                        </div>
                        <div class="border w-100">
                            <h5 class=" mt-2">Hello, <?php echo $data["sub_name"]  ?></h5>
                        </div>
                        <div class="border w-100 py-2">
                            <a class="cust-nav-active" href="customerProfile.php"><i class="fa fa-user"
                                    aria-hidden="true"></i>
                                My Profile</a>
                        </div>
                        <div class="border w-100 py-2">
                            <a class="cust-nav" href="customerProfileEdit.php"> <i class="fa fa-pencil"
                                    aria-hidden="true"></i>
                                Edit Profile</a>
                        </div>
                    </div>
                    <div id="customer-details" class="mx-4">
                        <h4>My Profile</h4>
                        <div id="customer-details-info" class=" mt-3">
                            <p>Full name: <strong><?php echo $data["name"] ?></strong></p>
                            <p>Email Address: <strong><?php echo $data["email"] ?></strong></p>
                            <p>Phone Number: <strong><?php echo $data["phone_number"] ?></strong></p>
                        </div>
                    </div>
                </div>

            </div>



            <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> -->

            <!-- NAVIGATION PART 2 -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <center><strong>Copyright &copy; 2022 Flash Repair</a>.</strong> All rights reserved. </center>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../assets/js/demo.js"></script>

    <!-- NAVIGATION PART 2 STOP -->
</body>

</html>