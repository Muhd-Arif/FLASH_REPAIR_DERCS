<?php
session_start();

// check if runner is login - ARIF
if (!isset($_SESSION['R_ID'])) {
    echo "<script>
    window.location = 'loginRunner.php';
    </script>";
    exit();
} 
// check runner registration status and redirect to runner profile if the status is not approved
else if (isset($_SESSION['R_ID'])) {
    require_once '../../../BusinessServiceLayer/controller/runnerProfileController.php';
    $runnerController = new runnerProfileController();
    $runnerController->userModel = $runnerController->model("runnerProfileModel");
    $runner = $runnerController->userModel->getUserById($_SESSION['R_ID']);
    $dataRunner = [
        'status' => $runner->RunnerRegStatus,
    ];
    if ($dataRunner['status'] != "APPROVED") {
        echo "<script>
    window.location = 'index.php';
    </script>";
        exit();
    }
}

// check if runner is logout - ARIF
if (isset($_POST['logout'])) {
    session_destroy();
    $message = 'Success logout';
    echo "<script>
    alert('$message');
    </script>";
    header("Location: loginRunner.php");
    exit();
}
