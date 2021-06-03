<?php
require_once '../../../libs/adminSession.php';
require_once '../../../BusinessServiceLayer/controller/adminValidateController.php';
$runner = new adminValidateController();
$data = $runner->runner();
// $data = $runner->my();
// $data = $runner->edit();
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
  <title>Flash Delivery ! Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <div class="container">
      <a class="navbar-brand" href="adminValidateRunner.php">Flash Delivery | Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="adminValidateRunner.php">Riders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminValidateCustomer.php">Customer</a>
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
    <h2 class="text-center mb-3">Riders List</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
        <th scope="no">No</th>
          <th scope="col">Rider ID</th>
          <th scope="col">Email</th>
          <th scope="col">License No</th>
          <th scope="col">Status</th>
          <th scope="col">Validate</th>
          <th scope="col">Info</th>
        </tr>
      </thead>
      <?php $index=1; ?>
      <?php foreach ($data['runners'] as $runner) : ?>

        <tbody>
          <form action="" method="post">
            <tr>
              <th scope="row"><?php echo $index ?></th>
              <th scope="row"><?php echo $runner->R_ID ?></th>
              <td><?php echo $runner->R_Mail ?></td>
              <td><?php echo $runner->R_LicienseNo ?></td>
              <!-- <td><?php echo $runner->R_AccStatus ?></td> -->
            <td>
                <select class="form-control form-control-sm" name="reg_status">
                  <option selected value="<?php echo $runner->R_AccStatus; ?>"> <?php echo $runner->R_AccStatus; ?></option>
                  <option value="BAN"> BAN</option>
                  <option value="UNBAN"> UNBAN</option>
                </select>
              </td>
            
              <input type="hidden" name="id" value="<?php echo $runner->R_ID ?>">
              <td> <input type="submit" value="Save" class="btn btn-success btn-block"></td>
              <td> <a href="adminProfileRunner.php?id=<?php echo $runner->R_ID ?>" class=" btn btn-info btn-block">More</td>
            </tr>
          </form>


        <?php $index++;?> 
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>