<?php
require_once '../../../libs/database.php';

class customerModel {
  public $j,$C_Mail, $C_Password,$C_Name,$C_Phone,$C_image;


  // get email and password for customer to login 
  function loginCustomer(){
    if(isset($_POST['C_Mail'])){
      $sql = "select * from customer where C_Mail=:C_Mail AND C_Password=:C_Password limit 1";
      $args = [':C_Mail'=>$this->C_Mail, ':C_Password'=>$this->C_Password];

      // $stmt = DB::run($sql,$args);
      // $count = $stmt->rowCount();
      // return $count;
      return DB::run($sql,$args);
      
      }
    }
	
	   // save data to database -ADLI
    function registerCust(){
      if(in_array($this->imageFileType, $this->extensions_arr)){
      $sql = "insert into customer(C_Name, C_Mail,C_Phone,C_image,C_Password)
    
      value(:C_Name, :C_Mail, :C_Phone, :C_image, :C_Password)";
    
      $args = [':C_Name'=>$this->C_Name, ':C_Mail'=>$this->C_Mail, ':C_Phone'=>$this->C_Phone, ':C_image'=>$this->C_image, ':C_Password'=>$this->C_Password];
    
      //Upload FIle -ADLI
            move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->C_image);
    
        $stmt = DB::run($sql, $args);
            $count = $stmt->rowCount();
            return $count;
        }
    }
	
}
 ?>