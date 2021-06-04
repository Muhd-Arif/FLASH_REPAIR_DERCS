<?php

require_once '../../../libs/runnerProfileSession.php';
require_once '../../../BusinessServiceLayer/controller/runnerProfileController.php';

$runner = new runnerProfileController();
$data = $runner->edit();

$RunnerID = $_SESSION['R_ID'];


error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/css/profile.css">
  <link rel="stylesheet" href="../../../assets/css/navbar.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../assets/css/bootstrap.min_united.css">
  <script src="https://kit.fontawesome.com/e40306d6a0.js" crossorigin="anonymous"></script>
  <title>Rider's Profile Edit</title>
</head>

  <body>
        <style>
        .logout {
        background: none;
        padding: 0px;
        border: none;
          }
        </style>

            <!-- NAVBAR -->
            
           <nav class="navbar navbar-expand-md navbar-dark bg-info" style="height:50px">
            <div class="collapse navbar-collapse" id="navbarColor01">
              <div class="navbar-nav">
              <?php if ($data["reg_status"] != "APPROVED") : ?>
                <a class="nav-item nav-link" href="runnerProfile.php">HOME</a>
              <?php else : ?>
                <a class="nav-item nav-link" href="deliveryList.php">HOME</a>
                <a class="nav-item nav-link" href="myDeliveryList.php">PENDING DELIVERY<span class="badge badge-danger ml-2"><?= $value ?></span></a>
                <a class="nav-item nav-link" href="myCompleteDelivery.php">COMPLETE DELIVERY</a>
                <!-- <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
              <?php endif; ?>
                
                <form method="post" class="form-inline">
                <button type="submit" id="logout" class="logout" name="logout" style="background:transparent;color:white;border:none;width:0px;outline:none;"
                 onclick="return confirm('Are you sure you want to logout?');">
                <a class="nav-item nav-link" style="margin-right:-50px">LOGOUT</a></button>
                </form>
              </div>
            </div>
          </nav>

          <nav class="navbar navbar-light" style="height:70px;background-color: #f5f5f5">
          <?php if ($data["reg_status"] != "APPROVED") : ?>
            <a href="runnerProfile.php" class="navbar-brand" style="color:black">Home</a>
      <?php else : ?>
        <a href="deliveryList.php" class="navbar-brand" style="color:black">Home</a>
      <?php endif; ?>
            
            <div style="margin-right:630px"><h5>Welcome  Runners!</h5></div>
          </nav>

  <div class="container">
    <div id="customer-profile">
      <div id="customer-nav" class="text-center">
        <div class="profile-img border w-100">
        <img class="profile-img-backdrop" src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset="">
          <img class="profile-img-real" src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset="" onerror="this.src='../../../uploads/default.png';">
        </div>
        <div class="border w-100">
          <h5 class=" mt-2">Hello, <?php echo $data["sub_name"]  ?></h5>
        </div>
        <div class="border w-100 py-2">
          <a class="runner-nav" href="runnerProfile.php"><i class="fa fa-user" aria-hidden="true"></i>
            My Profile</a>
        </div>
        <div class="border w-100 py-2">
          <a class="runner-nav runner-nav-active" href="runnerProfileEdit.php"> <i class="fa fa-pencil" aria-hidden="true"></i>
            Edit Profile</a>
        </div>
      </div>
      <div id="customer-details" class="mx-4">
        <h4>My Profile</h4>
        <form action="" method="post">
          <input type="hidden" name="image" value="<?php echo $data["image"] ?>">
          <div id="customer-details-info">
            <div class="form-group ">
              <div class="edit">
                <label for="name">Full Name: </label>
                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['name_err']; ?></p>
              </span>
            </div>
            <div class="form-group">
              <div class="edit">
                <label for="email">Email Address: </label>
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['email_err']; ?></p>
              </span>
            </div>
            <div class="form-group ">
              <div class="edit">
                <label for="phone_number">Phone Number: </label>
                <input type="text" name="phone_number" class="form-control form-control-lg <?php echo (!empty($data['phone_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone_number']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['phone_number_err']; ?></p>
              </span>
            </div>
            <div class="form-group">
              <div class="edit">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['password_err']; ?></p>
              </span>
            </div>
            <div class="form-group">
              <div class="edit">
                <label for="address">Address: </label>
                <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['address_err']; ?></p>
              </span>
            </div>

            <div class="form-group">
              <div class="edit">
                <label for="address">License Number: </label>
                <input type="text" name="license_no" class="form-control form-control-lg <?php echo (!empty($data['license_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['license_no']; ?>">
              </div>
                <p><?php echo $data['license_no_err']; ?></p>
              </span>
            </div>
                <input type="submit" value="Save" class="btn btn-success btn-block">
              </div> 

            </div>
            </input>
        </form>
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
