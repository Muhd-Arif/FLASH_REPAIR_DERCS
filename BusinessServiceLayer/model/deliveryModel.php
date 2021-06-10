<?php
require_once '../../../libs/database.php';

class deliveryModel{
  
    public $prodid,$prodname,$prodprice,$prodcategory,$proddescription,$prodstatus,$prodimage,$spid,
    $CustID, $OrderDate, $OrderAddress, $DeliveryStatus, $total, $image, $oldphoto,
    $target_dir,$target_file,$imageFileType,$extensions_arr, $PickupAddress,
    $OrderID, $ProductID, $OrderProductID, $quantity, $i, $index, $RunnerID, $PaymentStatus,$PaymentDate,$DeliveryID,$QuotationID,
    $orderproductid, $j, $orderid, $p, $orderproductID;

    
    // get all pending delivery from delivery table
    function viewAllDelivery(){
        $sql = "SELECT * FROM delivery INNER JOIN quotation ON delivery.Q_ID = quotation.Q_ID INNER JOIN customer ON delivery.C_ID = customer.C_ID WHERE D_Status = 'Pending'";
       
        return DB::run($sql);
    }

    // get all quotation details from quotation, delivery table based on delivery id
    function viewItemList(){
        $OrderProductID = $this->orderproductid[$this->j];

        $sql = "SELECT * FROM quotation INNER JOIN delivery ON delivery.Q_ID = quotation.Q_ID
        WHERE delivery.D_ID = '{$OrderProductID}' ";

        return DB::run($sql);
    }

    //Hoe Shin Yi
    //check existing transaction ID to avoid duplicate
	function checkExistingDelivery()
	{
		$query = "SELECT * FROM delivery WHERE C_ID = '$this->cid' and Q_ID = '$this->qid' and RP_ID = '$this->rpid'";
		return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);
	}

    //Hoe Shin Yi
    //method to add delivery
	function addDelivery(){
		$query = "INSERT into delivery(C_ID, Q_ID, RP_ID, D_Status, D_Address, D_Note, Service) values(:C_ID, :Q_ID, :RP_ID, :D_Status, :D_Address, :D_Note, :Service)";


		$args = [':C_ID'=>$this->cid,':Q_ID'=>$this->qid, ':RP_ID'=>$this->rpid, ':D_Status'=>$this->D_Status, ':D_Address'=>$this->D_Address, ':D_Note'=>$this->D_Note, ':Service'=>$this->Service];

		$stmt = DB::run($query, $args);
		$count = $stmt->rowCount();
		return $count;
	}

    //Hoe Shin Yi
	function viewDelivery(){
        $query = "SELECT * FROM delivery WHERE RP_ID = '$this->rpid'";
        return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);
    }

   
    // get all delivery details from delivery table based on delivery id
    function getOrderID(){
        $DeliveryID = $this->deliveryid;

        $sql = "SELECT * FROM delivery INNER JOIN quotation ON delivery.Q_ID = quotation.Q_ID INNER JOIN payment ON payment.Q_ID=delivery.Q_ID INNER JOIN customer on delivery.C_ID = customer.C_ID WHERE delivery.D_ID = '{$DeliveryID}'";

        // print_r($DeliveryID);
        // exit();

        return DB::run($sql);
    }

   

    // add delivery to rider_order table and update delivery status
    function acceptDelivery(){

        $DeliveryStatus = 'Processing';

        $sql = "INSERT INTO rider_order(R_ID, D_ID) VALUES (:RunnerID, :OrderProductID);
        UPDATE delivery SET D_Status=:DeliveryStatus WHERE D_ID = '{$this->OrderProductID}'";
        $args = [':RunnerID'=>$this->RunnerID, ':OrderProductID'=>$this->OrderProductID, ':DeliveryStatus'=>$DeliveryStatus];

        return DB::run($sql,$args);
    }

    // update payment status to completed based on quotation id
     function receivePayment(){

        $QuotationID = $this->QuotationID;
        $DeliveryID = $this->DeliveryID;

        $PaymentStatus = 'Completed';
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $PaymentDate = date("Y-m-d H:i:s");


        $sql = "UPDATE payment SET PAY_Status=:PaymentStatus, PAY_Date=:PaymentDate WHERE Q_ID = '{$QuotationID}'";
        $args = [':PaymentStatus'=>$PaymentStatus, ':PaymentDate'=>$PaymentDate];

        // print_r($QuotationID);
        // exit();

       
        return DB::run($sql,$args);
    }



    // get all rider_order details based on Rider ID
    function viewAllMyDelivery(){

        $sql = "SELECT * FROM rider_order INNER JOIN delivery ON delivery.D_ID=rider_order.D_ID INNER JOIN quotation ON quotation.Q_ID= delivery.Q_ID INNER JOIN customer ON customer.C_ID = delivery.C_ID WHERE delivery.Service='Delivery' AND R_ID=:RunnerID";
        $args = [':RunnerID'=>$this->RunnerID];
        return DB::run($sql,$args);
    }

    // get all delivery details from delivery table based on delivery id and delivery status not delivered
    function viewMyPendingDelivery(){
        $OrderProductID = $this->orderproductID[$this->p];

        $sql = "SELECT * FROM delivery WHERE D_ID = '{$OrderProductID}' AND DeliveryStatus <> 'Delivered'";
        return DB::run($sql);
    }

  
   
    // get all delivery details from rider order table based on delivery id
    function viewOrderId() {

      $OrderProductID = $this->orderproductid[$this->j];

      $sql = "SELECT * FROM delivery INNER JOIN rider_order ON rider_order.D_ID = delivery.D_ID
      WHERE rider_order.D_ID = '{$OrderProductID}' AND delivery.D_ID = '{$OrderProductID}' ";
      return DB::run($sql);
    }


    // get quotation details from quotation,delivery table based on quoattion id
    function viewMyDeliveryAddress() {

      $OrderID = $this->orderid[$this->j];

      $sql = "SELECT * FROM quotation INNER JOIN delivery ON delivery.Q_ID = quotation.Q_ID
      WHERE quotation.Q_ID = '{$OrderID}'";
      return DB::run($sql);
    }
   


     // update delivery status to delivered in delivery table table based delivery id
    function deliveredDelivery(){
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d H:i:s");

    $sql = "UPDATE delivery SET D_Status = 'Delivered', D_Date = :date  WHERE D_ID = '{$this->DeliveryID}'";
    $args = [':date'=>$date];

    // print_r($args);
    // exit();

    return DB::run($sql,$args);
    }



}
?>
