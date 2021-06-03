<?php

require_once '../../../libs/runnerProfileSession.php';
require_once '../../../BusinessServiceLayer/controller/runnerProfileController.php';

$runner = new runnerProfileController();
$data = $runner->runner();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/profile.css">
    <link rel="stylesheet" href="../../../assets/css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min_united.css">
    <script src="https://kit.fontawesome.com/e40306d6a0.js" crossorigin="anonymous"></script>
    <title>Runner's profile</title>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <div class="navbar-nav" style="padding-top:0px;">
                <a class="nav-item nav-link" href="productList.php">HOME</a>

                <a class="nav-item nav-link" href="orderHistory.php" style="margin-left:-5px">ORDER HISTORY</a>
                <!-- <a class="nav-item nav-link" href="customerProfileEdit.php" style="margin-left:0px;margin-right:-5px">EDIT PROFILE</a> -->
                <form method="post" class="form-inline">
                    <button type="submit" id="logout" class="logout" name="logout"
                        style="background:transparent;color:white;border:none;width:0px;outline:none;"
                        onclick="return confirm('Are you sure you want to logout?');">
                        <a class="nav-item nav-link" style="margin-right:-50px">LOGOUT</a></button>
                </form>
            </div>
    </nav>

    <nav class="navbar navbar-light" style="height:auto;background-color: #f5f5f5">
        <a href="productList.php" class="navbar-brand text-primary h1">Flash</a>
        <h5>Welcome To Flash Delivery</h5>
        <a class="navbar-brand" href="cart.php">
            <i class="fa fa-shopping-cart fa-2x unique-color-dark" aria-hidden="true" style="color:#17141F"></i>
        </a>
    </nav>



    <!-- PROFILE -->

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset="">
                <img class="profile-img-real" src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset=""
                    onerror="this.src='../../../uploads/default.png';">
            </div>

            <div class="container">
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
                            <a class="cust-nav-active" href="runnerProfile.php"><i class="fa fa-user"
                                    aria-hidden="true"></i>
                                My Profile</a>
                        </div>
                        <div class="border w-100 py-2">
                            <a class="cust-nav" href="runnerProfileEdit.php"> <i class="fa fa-pencil"
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

            <!-- FOOTER -->
            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2017-2020 Flash Delivery</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
            </footer>


            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>

</body>

</html>