<?php
require_once '../../../libs/database.php';

    class quotationModel {

        public $q_id, $c_id, $s_id, $q_deviceType, $q_damageType, $q_damageInfo, 
        $q_solution, $q_cost, $q_date, $q_status, $index;

        // insert new customer request quotation into quotation table - Arif
        function addQuotation(){
            $sql = "insert into quotation(C_ID, Q_DeviceType, Q_DamageType, Q_DamageInfo, Q_Date, Q_Status)
            values(:C_ID, :Q_DeviceType, :Q_DamageType, :Q_DamageInfo, :Q_Date, :Q_Status)";

            $args = [':C_ID'=>$this->c_id,':Q_DeviceType'=>$this->q_deviceType,':Q_DamageType'=>$this->q_damageType,
            ':Q_DamageInfo'=>$this->q_damageInfo, ':Q_Date'=>$this->q_date, ':Q_Status'=>$this->q_status];

            $stmt = DB::run($sql, $args);
            $count = $stmt->rowCount();
            return $count;
        }
    
        // get all customer request quotation - ARIF
        function getAllQuotation(){
            $sql = "SELECT * FROM quotation WHERE Q_Status='Pending' OR Q_Status='Pending Confirmation' ORDER BY Q_ID DESC";
            return DB::run($sql);
        }
    
        // get customer's request quotation - ARIF
        function getMyQuotation(){
            $sql = "SELECT * FROM quotation WHERE C_ID=:C_ID ORDER BY Q_ID DESC";
            $args = [':C_ID'=>$this->c_id];
            return DB::run($sql,$args);
    
        }
    
        // get quotation details based on quotation ID - ARIF
        function getQuotationDetails(){
            $sql = "SELECT * FROM quotation WHERE Q_ID=:Q_ID";
            $args = [':Q_ID'=>$this->q_id];
            return DB::run($sql,$args);
        }

         // get quotation customer info based on quotation ID - ARIF
        function getCustomerInfo(){
            $c_id = $this->c_id[$this->index];

            $sql = "SELECT * FROM customer INNER JOIN quotation ON customer.C_ID = quotation.C_ID
            WHERE customer.C_ID = '{$c_id}'";
            
            return DB::run($sql);
        }

        // update customer request quotation - ARIF
        function updateQuotation(){
            $sql = "UPDATE quotation SET Q_Solution=:Q_Solution, Q_Cost=:Q_Cost, Q_Status = 'Pending Confirmation' WHERE Q_ID=:Q_ID";
            $args = [':Q_Solution'=>$this->q_solution, ':Q_Cost'=>$this->q_cost,':Q_ID'=>$this->q_id];

            return DB::run($sql,$args);
        }

        // update customer confirmation request quotation - ARIF
        function updateConfirmation(){
            $RP_Status = "Pending";
            $RP_Reason = "-";
            $RP_Image = "default.png";

            
            $sql = "UPDATE quotation SET Q_Status=:Q_Status WHERE Q_ID=:Q_ID; 
            INSERT into repair(Q_ID, RP_Image, RP_Reason, RP_Status) values (:Q_ID, 'default.png', '-', 'Pending')";
            $args = [':Q_Status'=>$this->q_status,':Q_ID'=>$this->q_id];


            return DB::run($sql,$args);
        }



    }

?>