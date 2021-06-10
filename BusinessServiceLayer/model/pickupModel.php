<?php
/*
 Filename: pickupModel.php
 Purpose: Entity Class for pickup
*/
require_once '../../../libs/database.php';

class pickupModel{
    public $CustID, $OrderDate, $OrderAddress, $DeliveryStatus, $total, $image, $oldphoto,$date,$time,$addr,$notes,$status,$service,
    $target_dir,$target_file,$imageFileType,$extensions_arr, $PickupAddress,$PickupID,
    $OrderID, $ProductID, $OrderProductID, $quantity, $i, $index, $RunnerID,
    $orderproductid, $j, $orderid, $p, $orderproductID;



    // get all pending pickup from pickup table 
    function viewAllPickup(){
        $sql = "SELECT * FROM pickup INNER JOIN quotation ON pickup.Q_ID = quotation.Q_ID INNER JOIN customer ON pickup.C_ID = customer.C_ID WHERE P_Status = 'Pending'";
        return DB::run($sql);
    }

    // get all quotation details from quotation, pickup table based on pickup id
    function viewItemList(){
        $OrderProductID = $this->orderproductid[$this->j];

     $sql = "SELECT * FROM quotation INNER JOIN pickup ON pickup.Q_ID = quotation.Q_ID
        WHERE pickup.P_ID = '{$OrderProductID}' ";

        return DB::run($sql);
    }


    // get all pickup details from pickup table based on pickup id
    function getOrderID2(){
        $PickupID = $this->pickupid;

        
        $sql = "SELECT * FROM pickup INNER JOIN quotation ON pickup.Q_ID = quotation.Q_ID INNER JOIN customer on pickup.C_ID = customer.C_ID WHERE pickup.P_ID = '{$PickupID}'";

        // print_r($sql);
        // exit();

        return DB::run($sql);
    }


    // add pickup to rider_order table and update pickup status
    function acceptPickup(){

        $DeliveryStatus = 'Processing';

         $sql = "INSERT INTO rider_order(R_ID, P_ID) VALUES (:RunnerID, :OrderProductID);
        UPDATE pickup SET P_Status=:DeliveryStatus WHERE P_ID = '{$this->OrderProductID}'";
        $args = [':RunnerID'=>$this->RunnerID, ':OrderProductID'=>$this->OrderProductID, ':DeliveryStatus'=>$DeliveryStatus];

        return DB::run($sql,$args);
    }

    
    // get all rider_order details based on rider id and pickup service = pickup
    function viewAllMyDelivery(){

        $sql = "SELECT * FROM rider_order INNER JOIN pickup ON pickup.P_ID=rider_order.P_ID INNER JOIN quotation ON quotation.Q_ID= pickup.Q_ID INNER JOIN customer ON customer.C_ID = pickup.C_ID WHERE pickup.Service='Pickup' AND R_ID=:RunnerID";
      
        $args = [':RunnerID'=>$this->RunnerID];


        return DB::run($sql,$args);


    }



    // update pickup status to complete from based pickup id
    function pickedup(){

    $sql = "UPDATE pickup SET P_Status = 'Complete' WHERE P_ID = '{$this->PickupID}'";
    $args = [':PickupID'=>$this->PickupID];

    return DB::run($sql,$args);
    }

    
    // add customer pickup details in pickup table
    function addPickup(){
        //$OrderProductID = $this->orderproductID[$this->p];
    $QuotationID = $this->quotationid;
    $CustID = $this->custid;

    $status = 'Pending';
    $service = 'Pickup';

    $sql = "INSERT INTO pickup(C_ID, Q_ID, P_Date, P_Time, P_Status, P_Addr, P_Note, Service) VALUES(:CustID, :QuotationID, :date, :time, :status, :addr, :notes, :service)";

    $args = [':CustID'=>$this->custid,':QuotationID'=>$this->quotationid, ':date'=>$this->date, ':time'=>$this->time,':status'=>$status, ':addr'=>$this->addr, ':notes'=>$this->notes,':service'=>$service];

    $stmt = DB::run($sql, $args);
    $count = $stmt->rowCount();
  
    return $count;
   
    }


}
?>
