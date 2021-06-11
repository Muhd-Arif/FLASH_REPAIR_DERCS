<?php
/*
 Filename: PaymentController.php
 Purpose: Controller page for payment
*/
 require_once '../../../BusinessServiceLayer/Model/paymentModel.php';

 class PaymentController
 {

    //method to pass payment data for COD payment to payment model - Hoe Shin Yi
 	function addPaymentCOD($cid,$qid,$rpid)
 	{
 		$payment = new paymentModel();

 		// set the attributes of payment object
 		$payment->cid = $cid;
 		$payment->qid = $qid;
 		$payment->rpid = $rpid;
 		$payment->Txn_ID = "-";
 		$payment->Pay_Date = 0;
 		$payment->Pay_Amount = $_POST['amount'];
 		$payment->Pay_Status = "Pending";

 		$check = $payment->checkExistingPayment($rpid);

 		if($check == null)
 		{		
 			if($payment->addPayment()){
 				$message = "Cash on delivery selected, Please pay upon delivery";
 				echo "<script type='text/javascript'>alert('$message');
 				window.location = '../Customer/success.php?cid=$cid&qid=$qid&rpid=$rpid&payment_type=COD'</script>";
 			}
 		}
 		else
 		{
 			$message = "Payment Exist";
 			echo "<script type='text/javascript'>alert('$message')
 			window.location = '../Customer/payment.php?cid=$cid&qid=$qid&rpid=$rpid&payment_type=COD''</script>";
 		}
 	}

 	//method to pass payment data for Online payment to payment model  - Hoe Shin Yi
 	function addPaymentOnline($data)
 	{
 		parse_str($data['custom'],$id);

 		$payment = new paymentModel();

 		// set the attributes of payment object
 		$cid = $id['cid'];
 		$qid = $id['qid'];
 		$rpid = $id['rpid'];
        date_default_timezone_set("Asia/Kuala_Lumpur");


 		$payment->cid = $cid;
 		$payment->qid = $qid;
 		$payment->rpid = $rpid;
 		$payment->Txn_ID = $_GET['tx'];
 		$payment->Pay_Date = date("Y-m-d H:i:s");
 		$payment->Pay_Amount = $_GET['amt'];
 		$payment->Pay_Status = $_GET['payment_status'];

 		$check = $payment->checkExistingPayment($id['rpid']);

 		
 		if($check == null)
 		{		
 			if($payment->addPayment()){
 				$message = "Online Payment Successfully";
 				echo "<script type='text/javascript'>alert('$message');
 				window.location = '../Customer/success.php?cid=$cid&qid=$qid&rpid=$rpid&payment_type=ONLINE'</script>";
 			}
 		}
 		else
 		{
 			$message = "Payment Exist";
 			echo "<script type='text/javascript'>alert('$message')
 			window.location = '../Customer/payment.php?cid=$cid&qid=$qid&rpid=rpid</script>";
 		}
 	}

 	//method to view payment data from payment model  - Hoe Shin Yi
 	function viewPayment($cid, $rpid){
 		$payment = new paymentModel();
 		// set the attributes of payment object
 		$payment->cid = $cid;      
 		$payment->rpid = $rpid;
 		return $payment->viewPayment();
 	}

 	//method to pass payment type to payment model to update payment type  - Hoe Shin Yi
 	function updatePaymentType($cid,$rpid,$type){
        $payment = new paymentModel();
        // set the attributes of payment object
        $payment->cid = $cid;       
 		$payment->rpid = $rpid;
        $payment->Payment_Type = $type;

        if($payment->updatePaymentType()){
   
        }
    }
 }
 ?>