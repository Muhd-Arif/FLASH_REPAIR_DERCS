<?php
/*
 Filename: PaymentModel.php
 Purpose: Entity Class for payment model
*/
require_once '../../../libs/database.php';

class paymentModel
{
	//Attributes
	 public $cid, $qid, $rpid, $Pay_Date, $Pay_Amount, $Pay_Status, $Txn_ID, $Payment_Type, $D_Status;

	//check existing payment to avoid duplicate
	function checkExistingPayment()
	{
		$query = "SELECT * FROM payment WHERE RP_ID = '$this->rpid'";
		return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);;
	}

	
	//this method add payment into database - Hoe Shin Yi
	function addPayment() 
	{
		//Insert tansaction data into the database
		$query = "INSERT INTO payment (C_ID, Q_ID, RP_ID, Txn_ID, Pay_Date, Pay_Amount, Pay_Status) VALUES (:C_ID,:Q_ID, :RP_ID, :Txn_ID, :Pay_Date, :Pay_Amount, :Pay_Status)";
		$args = [ // the parameter that will be bind by pdo
		':C_ID' => $this->cid,
		':Q_ID' => $this->qid,
		':RP_ID' => $this->rpid,
		':Txn_ID' => $this->Txn_ID,
		':Pay_Date' => $this->Pay_Date,
		':Pay_Amount' => $this->Pay_Amount,
		':Pay_Status' => $this->Pay_Status
	];	

		$stmt = DB::run($query, $args);
		$count = $stmt->rowCount();
		return $count;
	}

	//this method get payment details from database - Hoe Shin Yi
	function getPayment(){
        $query = "SELECT * FROM payment WHERE C_ID = '$this->cid' and RP_ID = '$this->rpid'";
        return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    //this method update payment type in database - Hoe Shin Yi
    function updatePaymentType(){
        $sql = "UPDATE delivery set Payment_Type=:Payment_Type WHERE RP_ID = '$this->rpid'";

        $args = [':Payment_Type' =>$this->Payment_Type];

        return DB::run($sql,$args);
    }

}	