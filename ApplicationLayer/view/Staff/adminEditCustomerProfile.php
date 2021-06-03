
<?php

require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminProfileController.php';
$customer = new adminProfileController();
$data = $customer->edit();
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
  <link rel="stylesheet" href="../../../assets/css/navbar.css">
  <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
  <title>Flash Delivery ! Customer's profile</title>
</head>

<body>  <title> DCRMS ! Admin</title>
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
        

      </div>
      <div id="customer-details" class="mx-4">
        <h4>My Profile</h4>
        <form action="" method="post">
		
          <div id="customer-details-info">
            <div class="form-group ">
              <div class="edit">
                <label for="name">Full Name: </label>
                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data["name"]; ?></p>
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
            <div class="row">
              <div class="col">
                <input type="submit" value="Save" class="btn btn-success btn-block">
              </div>

            </div>
            </input>
        </form>
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
