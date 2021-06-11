<?php
require_once '../../../libs/database.php';

class customerModel {
  public $j,$C_Email, $C_Password,$C_Name,$C_Phone,$C_image,$orderid;


  // get email and password for customer to login 
  function loginCustomer(){
    if(isset($_POST['C_Email'])){
      $sql = "select * from customer where C_Email=:C_Email AND C_Password=:C_Password limit 1";
      $args = [':C_Email'=>$this->C_Email, ':C_Password'=>$this->C_Password];

      // $stmt = DB::run($sql,$args);
      // $count = $stmt->rowCount();
      // return $count;
      return DB::run($sql,$args);
      
      }
    }
	
	   // save data to database 
    function registerCust(){
      if(in_array($this->imageFileType, $this->extensions_arr)){
      $sql = "insert into customer(C_Name, C_Email,C_Phone,C_image,C_Password)
    
      value(:C_Name, :C_Email, :C_Phone, :C_image, :C_Password)";
    
      $args = [':C_Name'=>$this->C_Name, ':C_Email'=>$this->C_Email, ':C_Phone'=>$this->C_Phone, ':C_image'=>$this->C_image, ':C_Password'=>$this->C_Password];
    
      //Upload FIle 
            move_uploaded_file($_FILES['photoFile']['tmp_name'], $this->target_dir.$this->C_image);
    
        $stmt = DB::run($sql, $args);
            $count = $stmt->rowCount();
            return $count;
        }
    }

    function viewAllCustomer(){

        $OrderID = $this->orderid;
  
        $sql = "SELECT * FROM customer INNER JOIN quotation ON quotation.C_ID = customer.C_ID
        WHERE quotation.Q_ID = '{$OrderID}'";
        $args = [':OrderID'=>$OrderID];
        return DB::run($sql,$args);
    }
  
	
}
 ?>