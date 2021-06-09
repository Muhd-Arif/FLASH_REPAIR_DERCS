<?php
/*
 Filename: PaymentModel.php
 Purpose: Entity Class for payment model
*/
require_once '../../../libs/database.php';

class paymentModel
{
	//Attributes
	 public $cid, $qid, $rpid, $Pay_Date, $Pay_Amount, $Pay_Status, $Txn_ID, $Payment_Type;

	//check existing transaction ID to avoid duplicate
	function checkExistingPayment()
	{
		$query = "SELECT * FROM payment WHERE RP_ID = '$this->rpid'";
		return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);;
	}

	/**
	* method addPayment()
	* this method add payment into database - Hoe Shin Yi
	*/
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

	function viewPayment(){
        $query = "SELECT * FROM payment WHERE C_ID = '$this->cid' and RP_ID = '$this->rpid'";
        return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    function updatePaymentType(){
        $sql = "UPDATE delivery set Payment_Type=:Payment_Type WHERE Q_ID ='$this->qid' and RP_ID = '$this->rpid'";

        $args = [':Payment_Type' =>$this->Payment_Type];
        return DB::run($sql,$args);
    }

}	