<?php
require_once '../../../libs/Controller.php'; 
require_once '../../../BusinessServiceLayer/model/customerProfileModel.php';

class customerProfileController extends Controller
{
  // Display Customer Profile Details
  public function my()
  {
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_SESSION['C_ID']);
    $data = [
      'name' => $customer->C_Name,
      'sub_name' => substr($customer->C_Name, 0, 8),
      'email' => $customer->C_Mail,
      'phone_number' => $customer->C_Phone,
      'password' => $customer->C_Password,
	  'image' => $customer->C_image

     
    ];
    return $data;
  }

  // Edit Customer Profile Details
  public function edit()
  {
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_SESSION['C_ID']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'name' => trim($_POST['name']),
        'sub_name' => substr(trim($_POST['name']), 0, 8),
        'email' => trim($_POST['email']),
        'phone_number' => trim($_POST['phone_number']),
        'password' => trim($_POST['password']),
		'image' =>  trim($_POST['image']),
        'name_err' => '',
        'email_err' => '',
        'phone_number_err' => '',
        'password_err' => ''
		
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email

        if ($this->userModel->findUserByEmail($data['email'])) {
          $customer = $this->userModel->getUserById($_SESSION['C_ID']);
          if ($data['email'] != $customer->C_Mail) {
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
        $data['password_err'] = 'Pleae enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Phone Number Password
      if (empty($data['phone_number'])) {
        $data['phone_number_err'] = 'Please enter your phone number';
      }
      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['phone_number_err'])) {

        // Validated
        if ($this->userModel->editUserById($_SESSION['C_ID'], $data)) {
          // set session
          $_SESSION['C_Name'] = $data['name'];
          $_SESSION['C_Mail'] = $data['email'];
          $_SESSION['C_Phone'] = $data['phone'];
          $_SESSION['C_Password'] = $data['password'];
		  $_SESSION['C_image'] = $data['image'];
          header("location:customerProfile.php");
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        return $data;
      }
    } else {
      $data = [
        'name' => $customer->C_Name,
        'sub_name' => substr($customer->C_Name, 0, 8),
        'email' => $customer->C_Mail,
        'phone_number' => $customer->C_Phone,
        'password' => $customer->C_Password,
		'image' => $customer->C_image,

        'name_err' => "",
        'email_err' => "",
        'phone_number_err' => "",
        'password_err' => "",

      ];
      return $data;
    }
  }
  //delete cust
	
 public function deleteCust($C_ID){
        $customer = new customerProfileModel();
        $customer->$C_ID = $$C_ID;
        if($customer->deleteCustomer()){
            echo "<script type='text/javascript'>alert('Your account are success Deleted!!!');
            window.location = 'index.html?';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your account are failed Update!!!');
            window.location = 'customerProfile.php?$C_ID=".$_SESSION['$C_ID']."';</script>";
        return $customer->deleteCustomer();

    }
	
	//ban cust
	function banCust()
	{

		$customer = new customerProfileModel();
		$customer->C_ID =$_POST['C_ID'];
		$customer->C_Status = "banned";
			
		if($customer->changeCustomer()>0)
		{
			 $message = "ban  Successed !";
            echo "<script type='text/javascript'>alert('$message');
          
            </script>";
		}
		
	}
		function UnbanCust()
	{

		$customer = new customerProfileModel();
		$customer->C_ID =$_POST['C_ID'];
		$customer->C_Status = "valid";
			
		if($customer->changeCustomer()>0)
		{
			 $message = "Unbaned  Successed !";
            echo "<script type='text/javascript'>alert('$message');
          
            </script>";
		}
		
	}
  
}