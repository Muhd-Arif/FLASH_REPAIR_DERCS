<?php
session_start();

// check if customer is login - ARIF
if (!isset($_SESSION['C_ID'])){
    echo "<script>
    window.location = 'logincustomer.php';
    </script>";
    exit();

    
}
// check if customer is login - ARIF
if(isset($_POST['logout'])){
    session_destroy();
    $message = 'Success logout';
    echo "<script>
    alert('$message');
    </script>";
    header("Location: logincustomer.php");
}


?>