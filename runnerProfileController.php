
<?php

require_once '../../../libs/Controller.php';
require_once '../../../BusinessServiceLayer/model/runnerProfileModel.php';
class runnerProfileController extends Controller
{
  // Display Runner Profile Details
  public function runner()
  {
    $this->userModel = $this->model("runnerProfileModel");
    $runner = $this->userModel->getUserById($_SESSION['R_ID']);
    $data = [
      'name' => $runner->R_Name,
      'sub_name' => substr($runner->R_Name, 0, 8),
      'email' => $runner->R_Mail,
      'phone_number' => $runner->R_Phone,
      'password' => $runner->R_Password,
      'image' => $runner->R_image,
      'liciense_no' => $runner->R_LicienseNo,
      'address' => $runner->R_Address,
     
    ];
    return $data;
  }
  // Edit Runner Profile Details
  public function edit()
  {
	$this->userModel = $this->model("runnerProfileModel");
    $runner = $this->userModel->getUserById($_SESSION['R_ID']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'name' => trim($_POST['name']),
        'sub_name' => substr(trim($_POST['name']), 0, 8),
        'email' => trim($_POST['email']),
        'phone_number' => trim($_POST['phone_number']),
        'password' => trim($_POST['password']),
        'image' =>  trim($_POST['image']),
        'address' =>  trim($_POST['address']),
        'liciense_no' =>  trim($_POST['liciense_no']),
        'name_err' => '',
        'email_err' => '',
        'phone_number_err' => '',
        'password_err' => '',
        'address_err' => '',
        'liciense_no_err' => ''
      ];
      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $runner = $this->userModel->getUserById($_SESSION['R_ID']);
          if ($data['email'] != $runner->R_Mail) {
            $data['email_err'] = 'Email is already taken';
          }
        }
      }

      // Validate Name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Phone Number 
      if (empty($data['phone_number'])) {
        $data['phone_number_err'] = 'Please enter your phone number';
      }

      // Validate Address
      if (empty($data['address'])) {
        $data['address_err'] = 'Please enter your address';
      }

      // Validate license
      if (empty($data['liciense_no'])) {
        $data['liciense_no_err'] = 'Please enter your liciense number';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['phone_number_err']) && empty($data['address_err']) && empty($data['liciense_no_err'])) {
        $_SESSION['R_Name'] = $data['name'];
        $_SESSION['R_Mail'] = $data['email'];
        $_SESSION['R_Password'] = $data['password'];
        $_SESSION['R_Phone'] = $data['phone_number'];
        $_SESSION['R_LicienseNo'] = $data['liciense_no'];
        $_SESSION['R_Address'] = $data['address'];
        $_SESSION['R_image'] = $data['image'];
        // Validated
        // Check the user registration status
      
          if ($this->userModel->editUserById($_SESSION['R_ID'], $data)) {
            header("location:runnerProfile.php");
          } else {
            die('Something went wrong');
          }
        
      } else {
        // Load view with errors
        return $data;
      }
    } else {
      $runner = $this->userModel->getUserById($_SESSION['R_ID']);
      $data = [
        'name' => $runner->R_Name,
        'sub_name' => substr($runner->R_Name, 0, 8),
        'email' => $runner->R_Mail,
        'phone_number' => $runner->R_Phone,
        'password' => $runner->R_Password,
        'image' => $runner->R_image,
        'liciense_no' => $runner->R_LicienseNo,
        'address' => $runner->R_Address,
        'name_err' => "",
        'email_err' => "",
        'phone_number_err' => "",
        'password_err' => "",
        'address_err' => "",
        'liciense_no_err' => "",
     

      ];
      return $data;
    }
  }
}
