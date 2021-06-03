<?php
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminProfileController.php';
$customer = new adminProfileController();
$data = $customer->customer();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/f252491b10.js" crossorigin="anonymous"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../assets/css/profile.css">
  <title> DCRMS ! Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <div class="container">
      <a class="navbar-brand" href="adminValidateRunner.php"> DCRMS | Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="adminValidateRunner.php">Rider</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="adminValidateServiceProvider.php">Customer</a>
          </li>

        </ul>
        <form method="POST">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <input class="btn shadow-none text-light " type="submit" name="logout" value="Logout">
            </li>

          </ul>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div id="customer-profile">
      <div id="customer-nav" class="text-center">
        <div class="profile-img border w-100">
          <img class="profile-img-backdrop" src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset="">
          <img class="profile-img-real" src="../../../uploads/<?php echo $data['image'] ?>" alt="" srcset="">
        </div>
        <div class="border w-100">
          <a class="active" href="adminEditCustomerProfile.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
            Edit this customer Profile</a>
        </div>
        <div class="border w-100 py-2">
          <a class="active" href="adminValidateCustomer.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
            Back</a>
        </div>

      </div>
	  
      <div id="customer-details" class="mx-4">
	  <br>
	  <br>
        <h4>Customer Profile</h4>
        <div id="customer-details-info">
          <p>Full name: <strong><?php echo $data["name"] ?></strong></p>
          <p>Email Address: <strong><?php echo $data["email"] ?></strong></p>
          <p>Phone Number: <strong><?php echo $data["phone_number"] ?></strong></p>
         
        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>