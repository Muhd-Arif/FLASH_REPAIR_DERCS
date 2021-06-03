<?php
require_once '../../../BusinessServiceLayer/controller/quotationController.php';

$quotation = new quotationController();

// get all customer request quotation  - Arif
$data = $quotation->getAllQuotation();
error_reporting(0);  

foreach($data as $index => $value) {

    $c_id[] = $value['C_ID'];
    $q_id[] = $value['Q_ID'];
    $q_deviceType[] = $value['Q_DeviceType'];
    $q_date[] = $value['Q_Date'];
    $q_status[] = $value['Q_Status'];

    $result = $quotation->getCustomerInfo($c_id,$index);
    $id = $result->fetch();
    $c_name[] = $id[1];
    $c_email[] = $id[2];
    $c_phone[] = $id[4];

    $k = $index;

  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <title>Customer Quotation</title>
</head>

<body>
    <style>
    .container {
        margin-top: 100px;
        width: 60%;
    }

    input[readonly] {
        outline: none;
        border: 0;
        font-size: 1em;
    }
    </style>


    <div class="container">
        <center>
            <h2 style="margin-bottom:70px;">Customer Quotation</h2>
        </center>
        <!-- <input type="text" class="form-control mt-5" id="filterInput"
            placeholder="Search quotation ID, device type, status"> -->

        <!-- <table class="table mt-3" id="quotationList"> -->
        <table class="table mt-5" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Quotation ID</th>
                    <th scope="col">Device Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                for($x = 0; $x <= $k; $x++){
                    echo '
                        <tr>
                            <th scope="row">'. ($i + 1) .'</th>
                            <td>'.$c_name[$x].'</td>
                            <td>#'.$q_id[$x].'</td>
                            <td>'.$q_deviceType[$x].'</td>
                            <td>'.$q_date[$x].'</td>
                            <td>'.$q_status[$x].'</td>'
                            ?>

                <td>
                    <form method="POST">
                        <?php if( $q_status[$x] == "Pending" || $q_status[$x] == "Pending Confirmation") { ?>
                        <button type="button" onclick="location.href='quotationDetails.php?q_id=<?=$q_id[$x]?>'"
                            name="<?=$q_id[$x]?>" id="view" class="btn btn-primary">View</button>
                        <?php } ?>
                    </form>
                </td>

                <?php echo '
                </tr>
                ';
                $i++;
                }

                ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
    // Get input element
    // let filterInput = document.getElementById('filterInput');
    // // Add event listener
    // filterInput.addEventListener('keyup', filter);

    // function filter() {
    //     // Get value of input
    //     let filterValue = document.getElementById('filterInput').value.toUpperCase();

    //     let trs = document.querySelectorAll('#quotationList tr:not(.header)');

    //     trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(
    //         filterValue)) ? '' : 'none');

    // }


    $(document).ready(function() {
        $('#dataTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'print'
            // ],
            "ordering": false,

        });
    });
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>


</html>