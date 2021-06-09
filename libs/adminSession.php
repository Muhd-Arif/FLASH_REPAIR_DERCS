<?php
session_start();


if (!isset($_SESSION['S_ID'])) {
    echo "<script>
    window.location.href = 'loginAdmin.php';
    </script>";
}

if (isset($_POST['logout'])) {
    session_destroy();
    $message = 'Success logout';
    echo "<script>
    alert('$message');
    window.location = 'loginAdmin.php';
    </script>";
}
