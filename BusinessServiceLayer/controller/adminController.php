<?php
require_once '../../../BusinessServiceLayer/model/adminModel.php';

class adminController{

//validate the email and password for the customer to login - ADLI
function loginAdmin(){
         $admin = new adminModel();
		$admin->S_Mail = $_POST['S_Mail'];
		$admin->S_Password = $_POST['S_Password'];

        $adm = $admin->loginadmin();
        $value = $adm->fetch();

		if($admin->loginadmin()->rowCount() == 1){
			$message = 'Success Login';
                 
                session_start();
                $_SESSION['S_ID'] = $value[0];
                $_SESSION['S_Mail'] = $value[1];
                $_SESSION['S_Password'] = $value[2];
				$_SESSION['S_Name'] = $value[3];
				
            
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'adminValidateRunner.php';
                </script>";
                exit();
		}
		else{
			$message = "Login Failed ! Username or password incorrect";
               
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'loginAdmin.php';
            </script>";
            exit();
		}
}





}

?>