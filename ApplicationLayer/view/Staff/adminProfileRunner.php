<?php
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminProfileController.php';
$runner = new adminProfileController();
$data = $runner->runner();


$id = $_GET['id'];
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
                
                
    
    
                          <div class="border w-100">  
              <form id="" method="get" action="">
             <!-- <input type="hidden"  name="id" value="<?php echo $runner->R_ID ?>"> -->
           <!--  <button type="submit" name="edit">Edit this customer prfole </button> -->
          <a href="adminEditRiderProfile.php?id=<?php echo $id?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
            Edit this runner Profile</a>
          </form>
        </div>
  
        <div class="border w-100 py-2">
          <a class="active" href="adminValidateRunner.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
            Back</a>
        </div>
     </div>
    
     <div class="border w-100 py-2">
      <div id="customer-details" class="mx-4">
    
        <h4>Runner Profile</h4>
        <div id="customer-details-info">
          <p>Full name: <strong><?php echo $data["name"] ?></strong></p>
          <p>Email Address: <strong><?php echo $data["email"] ?></strong></p>
          <p>Phone Number: <strong><?php echo $data["phone_number"] ?></strong></p>
         <p>Password: <strong><?php echo $data["password"] ?></strong></p>
          <p>Address: <strong><?php echo $data["address"] ?></strong></p>
          <p>License Number: <strong><?php echo $data["license_no"] ?></strong></p>
    
        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>