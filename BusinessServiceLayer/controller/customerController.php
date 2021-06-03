<?php
require_once '../../../BusinessServiceLayer/model/customerModel.php';

class customerController {

  function loginCust(){
            $customer = new customerModel();
            $customer->C_Email = $_POST['C_Email'];
            $customer->C_Password = $_POST['C_Password'];

            $cust = $customer->loginCustomer();
            $value = $cust->fetch();
            
            if($customer->loginCustomer()->rowCount() == 1){  
                $message = 'Success Login';
                 
                session_start();
                $_SESSION['C_ID'] = $value[0];
                $_SESSION['C_Name'] = $value[1];
                $_SESSION['C_Email'] = $value[2];
                $_SESSION['C_Phone'] = $value[3];
                $_SESSION['C_Password'] = $value[4];
                $_SESSION['C_Status'] = $value[5];
                
               
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'customerProfile.php';
                </script>";
                exit();
            }
            else{
                $message = "Login Failed ! Username or password incorrect";
               
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'logincustomer.php';
                </script>";
            }
    
            
    }
    // Sent data to the database 
    function regsCust(){
        $customer = new customerModel();
        $customer->C_Name = $_POST['C_Name'];
        $customer->C_Mail = $_POST['C_Mail'];
        $customer->C_Phone = $_POST['C_Phone'];
        $customer->C_Password = $_POST['C_Password'];
		$customer->C_image = time().$_FILES['photoFile']['name'];
		
		//file directory to save image - ADLI
            $customer->target_dir = "../../../uploads/";
    
            //target file to save in directory -ADLI
            $customer->target_file = $customer->target_dir . basename($_FILES["photoFile"]["name"]);
    
            // Select file type - ADLI
            $customer->imageFileType = strtolower(pathinfo($customer->target_file,PATHINFO_EXTENSION));
    
            // Valid file extensions- ADLI
            $customer->extensions_arr = array("jpg","jpeg","png","gif");
    
    // Validate if register succesfull 
        if($customer->registerCust() > 0){
                $message = "Register Succesfull!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'logincustomer.php';</script>";
            }
    }

    function viewAllCustomer($orderid){
        $customer = new customerModel();
        $customer->orderid = $orderid;
        //$customer->j = $j;
        return $customer->viewAllCustomer();
    }

    
        

 
}


 ?>