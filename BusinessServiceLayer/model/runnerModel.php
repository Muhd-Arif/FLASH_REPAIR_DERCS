<?php
require_once '../../../libs/database.php';

class runnerModel{
    public $R_Email,$R_Password,$R_Name,$R_Phone,$R_LicienseNo,
    $R_Address,$R_image;

    // get email and password for runner to login 
    function loginRunner(){
        if(isset($_POST['R_Email'])){
        $sql = "select * from rider where R_Email=:R_Email AND R_Password=:R_Password limit 1";
           //$sql = "select * from runner where RunnerEmail=:RunnerEmail";
        $args = [':R_Email'=>$this->R_Email, ':R_Password'=>$this->R_Password];
      //$args = [':RunnerEmail'=>$this->RunnerEmail];
        // $stmt = DB::run($sql,$args);
        // $count = $stmt->rowCount();
        
        return DB::run($sql,$args);

        }
    }

     // save data to database
    function registerRun(){
        if(in_array($this->imageFileType, $this->extensions_arr)){
        $sql = "insert into rider (R_Name,R_Email,R_Password,R_Phone,R_License,
                 R_Address,R_image)

        value(:R_Name, :R_Email, :R_Password,  :R_Phone, :R_License, :R_Address, :R_image)";
		
		 $args = [':R_Name'=>$this->R_Name, ':R_Email'=>$this->R_Email, ':R_Phone'=>$this->R_Phone,
        ':R_License'=>$this->R_License,':R_Address'=>$this->R_Address, ':R_image'=>$this->R_image,
        ':R_Password'=>$this->R_Password];
//print_r($sql);
//exit();
      
        //Upload FIle 
            move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->R_image);

            $stmt = DB::run($sql, $args);
            $count = $stmt->rowCount();
            return $count;
        }
    }


}


?>