<?php
// Author : Ng Wei Sheng
// This page displays all the repairs owned by the staff

// require_once '../../../libs/spSession.php';
require_once '../../../BusinessServiceLayer/controller/repairController.php';

$repair = new repairController();


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

if (isset($_GET['recordnum'])) {
    $number_of_records = $_GET['recordnum'];
} else {
    $number_of_records = 8;
}

$offset = ($pageno - 1) * $number_of_records;

// search data

if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $data = $repair->viewRepairPage($offset, $number_of_records, $term);
    $total = $repair->viewSearchAllRepairList($term)->rowCount();

    if ($total == 0){
        $errmsg = 'No results found.';
    }
} else {
    $term = '';
    $data = $repair->viewRepairPage($offset, $number_of_records, '');
    $total = $repair->viewAllRepairs($term)->rowCount();


    if ($total == 0){
        $errmsg = 'No results found.';
    }
}

$pages_needed = ceil($total / $number_of_records);


?>
<html>

<head>
    <title>All Repair List</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <style>
    img.repair-img {
        display: inline-block;
        width: 100px;
        height: 100px;
    }
    </style>


</head>

<body>

    <div class="container" style="margin-top:30px">

        <h2><?php echo isset($_GET['device'])? $_GET['device']: '';?>All Repair List</h2>
        <div class="row">
            <div class="col-sm-2 sidebar">

                <h3>Device Type</h3>
                <ul>
                    <li><a href="allRepairList.php">All</a></li>
                    <li><a href="allRepairList.php?device=Mobile">Mobile</a></li>
                    <li><a href="allRepairList.php?device=Tablet">Tablet</a></li>
                    <li><a href="allRepairList.php?device=Laptop">Laptop</a></li>
                    <li><a href="allRepairList.php?device=Desktop">Desktop</a></li>
                </ul>
            </div>
            <div class="col-sm-10 main-content">
                <table id="repair-list" class="display">
                    <thead>
                        <tr>
                            <th>Repair ID</th>
                            <th>Device Image</th>
                            <th>Repair Status</th>
                            <th>Estimated Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                if (isset($errmsg)){
                    echo "<h3>$errmsg</h3>";
                }

                
                // foreach($data as $row){
                //     $rpid = $row['RP_ID'];
                //     echo "<div class='col-sm-3'><div class='cust repair'><a href='repairDetails.php?rpid=$rpid'><img class='repair-img' src='../../../uploads/". $row['RP_Image'] ."'><div class='repair-bottom'><h4>".$row['RP_ID'] ."</h4><p class='repair-price'>". $row['RP_Status'] ."</p></div></a></div></div>";
                // }

                foreach($data as $row){
            ?>


                        <tr>
                            <td><?=$row['RP_ID']?></td>
                            <td><img class='repair-img' src='../../../uploads/<?=$row['RP_Image']?>'></td>
                            <td><?=$row['RP_Status']?></td>
                            <td>RM <?=$row['Q_Cost']?></td>
                            <td><a class="btn btn-primary" href='repairDetails.php?rpid=<?=$row['RP_ID']?>'>View</a>
                                <a class="btn btn-success" href='editRepairForm.php?rpid=<?= $row['RP_ID']?>'>Edit</a>
                            </td>
                        </tr>


                        <?php 
                }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
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
    <script>
    $(document).ready(function() {
        $('#repair-list').DataTable({
            "aLengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ],
            "iDisplayLength": 5
        });
    });
    </script>
</body>

</html>