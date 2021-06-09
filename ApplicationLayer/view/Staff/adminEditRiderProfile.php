
<?php

require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminProfileController.php';
$runner= new adminProfileController();


 $id = $_GET['id'];
$data = $runner->runner();

if(isset($_POST['Save'])){
   $data = $runner->riderEdit();
   $id = $_GET['id'];
   $data = $runner->runner();
}else if(isset($_POST['Delete'])){
   $data = $runner->deleteRider($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/f252491b10.js" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/profile.css">
    <link rel="stylesheet" href="../../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css"> 

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

                            
                            <img class="profile-img-real" src="../../../uploads/<?php echo $data['image'] ?>" alt=""
                                srcset="" onerror="this.src='../../../uploads/default.png';">
								
                        </div>
                        <div class="border w-100">
                            <h5 class=" mt-2"> <?php echo $data["sub_name"]  ?></h5>
                        </div>
                

      </div>
      <div id="rider-details" class="mx-4">
        <h4>Rider Profile</h4>
        <form action="" method="post" action="adminEditRiderProfile.php">
		 <input type="hidden"  name="id" value="<?php echo $id ?>">
          <div id="customer-details-info">

            <div class="form-group ">
               
              <div class="edit">
                <label for="name">Rider's Name: </label>
                <input type="name" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
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

             <div class="form-group ">
              <div class="edit">
                <label for="phone_number">Password: </label>
                <input type="text" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['password_err']; ?></p>
              </span>
            </div>
			
			<div class="form-group ">
              <div class="edit">
                <label for="address">Address: </label>
                <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['address_err']; ?></p>
              </span>
            </div>
			
			<div class="form-group ">
              <div class="edit">
                <label for="license_no">License Number: </label>
                <input type="text" name="license_no" class="form-control form-control-lg <?php echo (!empty($data['license_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['license_no']; ?>">
              </div>
              <span class="invalid">
                <p><?php echo $data['license_no_err']; ?></p>
              </span>
            </div>
          
			
            <div class="row">
              <div class="col">
                <input type="submit" value="Save" name="Save"  class="btn btn-success btn-block">
              </div>
            </div>
            <br>
            <div class="row">
            <div class="col">
              <form id="" method="post">
                <input type="submit" value="Delete" name="Delete"  class="btn btn-success btn-block">
              </form>
              </div>
            </div>
            </input>
        </form>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
