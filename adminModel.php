<?php
require_once '../../../libs/database.php';

class adminModel{

    public $S_Mail,$S_Password;

    // get email and password for admin to login 
    function loginadmin(){
        if(isset($_POST['S_Mail'])){
            $sql = "select * from staff where S_Mail=:S_Mail AND S_Password=:S_Password limit 1";
            $args = [':S_Mail'=>$this->S_Mail, ':S_Password'=>$this->S_Password];
            // $stmt = DB::run($sql,$args);
            // $count = $stmt->rowCount();
            // return $count;
            return DB::run($sql,$args);
            
            }
    }

}

?>