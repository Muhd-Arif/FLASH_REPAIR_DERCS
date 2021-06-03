
<?php
require_once '../../../libs/Controller.php';
require_once '../../../BusinessServiceLayer/model/runnerProfileModel.php';
require_once '../../../BusinessServiceLayer/model/customerProfileModel.php';
class adminValidateController extends Controller
{
  // Display and edit runner details
  public function runner()
  {
    $this->userModel = $this->model("runnerProfileModel");
    $runner = $this->userModel->getAllRunners();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'runners' => $runner,
        'status' => trim($_POST['reg_status']),
        // 'comment' => trim($_POST['reg_comment']),
        'id' => $_POST['id'],
      ];

      if ($this->userModel->validateRunnerByID($data['id'], $data)) {
        $message = "Success Update Status!";
        echo "<script type='text/javascript'>alert('$message');
        </script>";

        header("location:adminValidateRunner.php");
      }
    } else {
      $data = [
        'runners' => $runner
      ];

      return $data;
    }
  }
  // Display and edit service provider details
  public function customer()
  {

    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getAllCustomer();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'customer' => $customer,
        'status' => trim($_POST['reg_status']),
        // 'comment' => trim($_POST['reg_comment']),
        'id' => $_POST['id'],
      ];

      if ($this->userModel->validateCustomerByID($data['id'], $data)) {
        $message = "Success Update Status!";
        echo "<script type='text/javascript'>alert('$message');
        </script>";
        header("location:adminValidateCustomer.php");
      }
    } else {
      $data = [
        'customer' => $customer
      ];

      return $data;
    }
  }
  
}