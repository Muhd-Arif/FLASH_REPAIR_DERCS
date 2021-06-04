<?php
require_once '../../../BusinessServiceLayer/model/runnerModel.php';

class runnerController {

 //validate the email and password for the runner to login
function loginRun(){
    $runner = new runnerModel ();
    $runner->R_Email = $_POST['R_Email'];
    $runner->R_Password = $_POST['R_Password'];

    $run = $runner->loginRunner();
    $value = $run->fetch();

    if($runner->loginRunner()->rowCount() == 1){
        $message = 'Success Login';

                session_start();
                $_SESSION['R_ID'] = $value[0];
                $_SESSION['R_Name'] = $value[1];
                $_SESSION['R_Email'] = $value[3];
                $_SESSION['R_Password'] = $value[3];
                $_SESSION['R_Phone'] = $value[4];
                $_SESSION['R_LicenseNo'] = $value[5];
                $_SESSION['R_Address'] = $value[6];
                $_SESSION['R_image'] = $value[7];;
                
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'index.php';
                </script>";
                exit();
    }else{
        $message = "Login Failed ! Username or password incorrect";

        echo "<script type='text/javascript'>
        alert('$message');
        window.location = 'loginRunner.php';
        </script>";
        exit();
    }

    }

    //function to sent data to database 
    function regsRun(){
        $runner = new runnerModel();
        $runner->R_Name = $_POST['R_Name'];
        $runner->R_Email = $_POST['R_Email'];
        $runner->R_Phone = $_POST['R_Phone'];
        $runner->R_LicienseNo = $_POST['R_LicienseNo'];
        $runner->R_Address = $_POST['R_Address'];
        $runner->R_image = time().$_FILES['photoFile']['name'];
        $runner->R_Password = $_POST['R_Password'];

        //file directory to save image 
            $runner->target_dir = "../../../uploads/";

            //target file to save in directory
            $runner->target_file = $runner->target_dir . basename($_FILES["photoFile"]["name"]);

            // Select file type 
            $runner->imageFileType = strtolower(pathinfo($runner->target_file,PATHINFO_EXTENSION));

            // Valid file extensions 
            $runner->extensions_arr = array("jpg","jpeg","png","gif");

        // validate if register succesfull
        if($runner->registerRun() > 0){
                 $message = "Register Succesfull!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'loginRunner.php';</script>";
            }
    }
	
	
}
?>