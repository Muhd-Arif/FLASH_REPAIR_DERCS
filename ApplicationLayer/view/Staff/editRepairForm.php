<?php
// Author : Ng Wei Sheng
// This page displays an edit repair form for the staff

require_once '../../../BusinessServiceLayer/controller/repairController.php';
// require_once '../../../libs/spSession.php';

$rpid = $_GET['rpid'];

$repair = new repairController();
$data = $repair->viewRepair($rpid);

if(isset($_POST['edit'])){
    $repair->editRepair();
}

if(isset($_POST['upload-photo']) && !isset($_POST['edit'])){
    $file = $_FILES['rpphoto'];

    $file_name = $_FILES['rpphoto']['name'];
    $file_tmpname = $_FILES['rpphoto']['tmp_name'];
    $file_destination = '../../../uploads/'. $file_name;

    if (file_exists($file_destination)) {

    }else{
        move_uploaded_file($file_tmpname, $file_destination);
    }
}



?>
<html>
    <head>
        <title>Edit Repair</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../assets/css/main.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-3">
        <div class="container">
            <a class="navbar-brand" href="allRepairList.php">Flash Delivery | SP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="addRepair.php">Add Repair</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="allRepairList.php">Repair List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buyersList.php">Buyers List</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container">
            <h2>Edit Repair</h2>
            <!-- EDIT REPAIR FORM -->
            <form action="" method="POST" enctype="multipart/form-data">

                <?php
                    foreach($data as $row){
                ?>

                <div class="form-group">
                    <input type="hidden" name="rpid" value="<?=$rpid?>">
                    <label for="rpphoto">Image</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="frame">
                                <img <?php echo isset($file_destination) && !isset($_POST['edit'])? 'src="'.$file_destination.'"' : 'src="../../../uploads/'. $row['RP_Image']. '"'; ?> id="rppreview">
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <label class="file-select btn btn-primary" for="rpphoto">Select File</label>
                            <input type="file" id="rpphoto" class="form-control" name="rpphoto">
                            <input type="hidden" name="rpimage" value='<?php echo isset($file_name) && !isset($_POST['edit'])? $file_name : $row['RP_Image']; ?>' >
                            <p id="file-name"><?php echo isset($file_name) && !isset($_POST['edit'])? $file_name : 'Photo.png'; ?></p>
                            <input formnovalidate type="submit" name="upload-photo" class="btn btn-primary upload-photo" value="Upload Photo">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="rpprice">Repair Status</label>
                    <select name="rpstatus" id="rpstatus" required>
                        <option <?php echo $row['RP_Status'] == 'Pending'? 'selected' : '';?> value="Pending">Pending</option>
                        <option <?php echo $row['RP_Status'] == 'In Progress'? 'selected' : '';?> value="In Progress">In Progress</option>
                        <option <?php echo $row['RP_Status'] == 'Completed'? 'selected' : '';?> value="Completed">Completed</option>
                        <option <?php echo $row['RP_Status'] == 'Cannot be repaired'? 'selected' : '';?> value="Cannot be repaired">Cannot be repaired</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="rpreason">Reason</label>
                    <textarea name="rpreason" id="rpreason" cols="30" rows="10" class="form-control" required><?= $row['RP_Reason']?></textarea>
                </div>

                <input type="submit" class="btn btn-success" name="edit" value="Edit Repair">


                <?php
                    }
                ?>
            </form>
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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../../../assets/js/main.js"></script>
    </body>
</html>
