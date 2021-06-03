
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
      'email' => $runner->R_Mail,
      'phone_number' => $runner->R_Phone,
      'image' => $runner->R_image,
      'plate_no' => $runner->R_LicienseNo,
      'name_err' => "",
      'email_err' => "",
      'phone_number_err' => "",
      'password_err' => "",
      'address_err' => "",
      'ic_no_err' => "",
      'plate_number_err' => "",

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
      'email' => $customer->C_Mail,
      'phone_number' => $customer->C_Phone,
      'image' => $customer->C_image,
  
    
    
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
    $customer = $this->userModel->getUserById($_SESSION['C_ID']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'name' => $customer->C_Name,
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
	}
  }
  
  //cust delete
  
 public function deleteCust($accountID){
        $customer = new accountModel();
        $customer->accountID = $accountID;
        if($customer->deleteCustomer()){
            echo "<script type='text/javascript'>alert('Your account are success Deleted!!!');
            window.location = 'index.html?';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your account are failed Update!!!');
            window.location = 'customerProfile.php?accountID=".$_SESSION['accountID']."';</script>";
        return $customer->deleteCustomer();

    }
  
  
}
