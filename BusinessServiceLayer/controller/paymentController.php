<?php
/*
 Filename: PaymentController.php
 Purpose: Controller page for payment
*/
 require_once '../../../BusinessServiceLayer/Model/paymentModel.php';

 class PaymentController
 {

    //method to add payment
 	function addPaymentCOD($cid,$qid,$rpid)
 	{
 		$payment = new paymentModel();

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

 	function addPaymentOnline($data)
 	{
 		parse_str($data['custom'],$id);

 		$payment = new paymentModel();

 		$cid = $id['cid'];
 		$qid = $id['qid'];
 		$rpid = $id['rpid'];


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

 	function viewPayment($cid, $rpid){
 		$payment = new paymentModel();
 		$payment->cid = $cid;      
 		$payment->rpid = $rpid;
 		return $payment->viewPayment();
 	}

 	function updatePaymentType($cid,$qid,$rpid,$type){
        $payment = new paymentModel();
        $payment->cid = $cid;
 		$payment->qid = $qid;       
 		$payment->rpid = $rpid;
        $payment->Payment_Type = $type;


        if($payment->updatePaymentType()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message')";
        }
    }



 }
 ?>