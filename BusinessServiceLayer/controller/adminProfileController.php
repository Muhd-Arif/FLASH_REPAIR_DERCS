
<?php
require_once '../../../libs/Controller.php';
require_once '../../../BusinessServiceLayer/model/runnerProfileModel.php';


class adminProfileController extends Controller
{
  // Get Single Runner Profile 
  public function runner()
  {
    $this->userModel = $this->model("runnerProfileModel");
    $runner = $this->userModel->getUserById($_GET['id']);
    $data = [
      'name' => $runner->R_Name,
      'sub_name' => substr($runner->R_Name, 0, 8),
      'email' => $runner->R_Email,
      'phone_number' => $runner->R_Phone,
      'image' => $runner->R_image,
      'license_no' => $runner->R_License,
      'password' => $runner->R_Password,
      'address' => $runner->R_Address,
      'name_err' => "",
      'email_err' => "",
      'phone_number_err' => "",
      'password_err' => "",
      'address_err' => "",
      'ic_no_err' => "",
      'license_no_err' => "",

    ];
    return $data;
  }

  // Get Single Service Provider Profile 
  public function customer()
  {
    //echo $_GET['id'];
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_GET['id']);
    $data = [
      'name' => $customer->C_Name,
      'sub_name' => substr($customer->C_Name, 0, 8),
      'email' => $customer->C_Email,
      'phone_number' => $customer->C_Phone,
      'image' => $customer->C_image,
      'password' => $customer->C_Password,
  
    
    
      'name_err' => "",
      'email_err' => "",
      'phone_number_err' => "",
      'password_err' => "",
      'address_err' => "",
      'reg_no_err' => "",
      'type_err' => "",

    ];
    return $data;
  }
  
  
  //cust edit
   public function edit()
  {
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_GET['id']);
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
        // 'image' =>  trim($_POST['image']),
        'name_err' => '',
        'email_err' => '',
        'phone_number_err' => '',
        'password_err' => ''

      ];
      if($customer = $this->userModel->editUserById($_GET['id'],$data)){
         echo "<script type='text/javascript'>alert('Customer Details Edited!!!');</script>";
      }
    }
  }
  
  //cust delete
  
 public function deleteCust($id){
        $customer = new customerProfileModel();
        $customer->id = $id;
        if($customer->deleteCust()){
            echo "<script type='text/javascript'>alert('Customer account are success Deleted!!!');
            window.location = 'index.html?';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your account are failed Update!!!');
            window.location = 'customerProfile.php?accountID=".$_SESSION['id']."';</script>";
        return $customer->deleteCust();

    }

    //rider edit
   public function riderEdit()
  {
    $this->userModel = $this->model("runnerProfileModel");
    $runner = $this->userModel->getUserById($_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [   'name' => trim($_POST['name']),
        'sub_name' => substr(trim($_POST['name']), 0, 8),
        'email' => trim($_POST['email']),
        'phone_number' => trim($_POST['phone_number']),
        'address' =>  trim($_POST['address']),
        'license_no' =>  trim($_POST['license_no']),
        'password' =>  trim($_POST['password']),  
        'name_err' => '',
        'email_err' => '',
        'phone_number_err' => '',
        'password_err' => '',
        'address_err' => '',
        'liciense_no_err' => ''
    
    
      ];
    
      if($runner = $this->userModel->editUserById($_GET['id'],$data)){
         echo "<script type='text/javascript'>alert('Rider Details Edited!!!');</script>";
         header("adminProfileRunner.php");
      }
    }
  }

  public function deleteRider($id){
        $runner = new runnerProfileModel();
        $runner->id = $id;
        if($runner->deleteRider()){
            echo "<script type='text/javascript'>alert('Rider account are success Deleted!!!');
            window.location = 'adminValidateRunner.php';</script>";
            //return $runner->deleteRider();
        }
        else
            echo "<script type='text/javascript'>alert('Account Deleted!!!');
            window.location = 'adminValidateRunner.php';</script>";
        

    }
  
  
}
