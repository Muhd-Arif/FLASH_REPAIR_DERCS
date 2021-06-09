<?php
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminValidateController.php';
$customer = new adminValidateController();
$data = $customer->customer();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer List</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/main.css">
   
 <!-- NAVIGATION BAR  -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>

    <!-- TEMPLATE 1  -->
    <div class="wrapper">
        <?php include("sidebar.php") ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
  <div class="container">
    <h2 class="text-center mb-3"> Customer List</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Status</th>
          <th scope="col">Validate</th>
          <th scope="col">Info</th>

        </tr>
      </thead>
      <?php $index=1; ?>
      <?php foreach ($data['customer'] as $customer) : ?>

        <tbody>
          <form action="" method="post">
            <tr>
            <th scope="row"><?php echo $index ?></th>
              <th scope="row"><?php echo $customer->C_ID ?></th>
        <td><?php echo $customer->C_Name ?></td>
              <td><?php echo $customer->C_Email ?></td>
              <td><?php echo $customer->C_Phone?></td>
              <td>
                <select class="form-control form-control-sm" name="reg_status">
                  <option selected value="<?php echo $customer->C_Status; ?>"> <?php echo $customer->C_Status; ?></option>
           <option value="ACCOUNT VALID">ACCOUNT VALID</option>
                  <option value="ACCOUNT BANNNED">ACCOUNT BANNED</option>
                  <option value="ACCOUNT UNBANNED">ACCOUNT UNBANNED</option>
                </select>
              </td>
              
              <input type="hidden" name="id" value="<?php echo $customer->C_ID ?>">
              <td> <input type="submit" value="Save" class="btn btn-success btn-block"></td>
              
              <td> <a href="adminProfileCustomer.php?id=<?php echo $customer->C_ID ?>" class=" btn btn-info btn-block">More</td>
            </tr>
          </form>


          <?php $index++;?> 
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    <script src="../../../assets/js/repair.js"></script>

</body>

</html>