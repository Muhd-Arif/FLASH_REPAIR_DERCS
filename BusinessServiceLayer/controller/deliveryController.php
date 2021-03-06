<?php
/*
 Filename: deliveryController.php
 Purpose: Controller page for delivery and pickup
*/

require_once '../../../BusinessServiceLayer/model/deliveryModel.php';
require_once '../../../BusinessServiceLayer/model/pickupModel.php';
require_once '../../../BusinessServiceLayer/model/repairModel.php';


class deliveryController{


    // get all pending delivery from delivery table to display at rider deliveryList page
    function getAllDeliveryList(){
        $product = new deliveryModel();
        return $product->getAllDeliveryList();
    }

     // get all pending pickup from pickup table to display at rider pickupList page
     function viewAllPickup(){
        $product = new pickupModel();
        return $product->viewAllPickup();
    }


    function viewItemList($orderproductid,$j){
            $product = new deliveryModel();
            $product->orderproductid = $orderproductid;
            $product->j = $j;
            return $product->viewItemList();
        }

    function viewItemList2($orderproductid,$j){
            $product = new pickupModel();
            $product->orderproductid = $orderproductid;
            $product->j = $j;
            return $product->viewItemList();
        }

    // To display delivery data received from delivery model - Hoe Shin Yi
    function viewDelivery($rpid){
        $delivery = new deliveryModel();
        $delivery->rpid = $rpid;
        return $delivery->viewDelivery();
    }

    // add delivery after payment - Hoe Shin Yi
    function addDelivery($cid,$qid,$rpid)
    {
        // create new payment object
        $delivery = new deliveryModel();

        
        // set the attributes of delivery object
        $delivery->cid = $cid;
        $delivery->qid = $qid;
        $delivery->rpid = $rpid;
        $delivery->D_Status = "Pending";
        $delivery->D_Address = $_POST['deliveryAdd'];
        $delivery->D_Note = $_POST['deliveryNote'];
        $delivery->Service = "Delivery";
        // $delivery->Payment_Type = $_POST['payment_type'];
        
        $check = $delivery->checkExistingDelivery();


        if($check == null)
        {       
            $delivery->addDelivery();
            $message = "Delivery Placed Successfully";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../Customer/payment.php?cid=$cid&qid=$qid&rpid=$rpid'</script>";
        }else{
             $message = "Fail to place delivery";
                echo "<script type='text/javascript'>alert('$message')";
        }
    }

  

    // get all delivery details from delivery table based on delivery id
    function getDeliveryDetails($deliveryid){
        $product = new deliveryModel();
        $product->deliveryid = $deliveryid;
       // $product->j = $j;
        // print_r($deliveryid);
        // exit();
        return $product->getDeliveryDetails();
    }

    // get all pickup details from pickup table based on pickup id
     function getPickupDetails($pickupid){
        $product = new pickupModel();
        $product->pickupid = $pickupid;
        //$product->j = $j;
        // print_r($product);
        // exit();
        return $product->getPickupDetails();
    }

   

    // add delivery to rider_order table
    function acceptDelivery2($RunnerID){
        $product = new deliveryModel();
        $product->OrderProductID = $_POST['OrderProductID'];
        $product->RunnerID = $RunnerID;
        if($product->acceptDelivery()){
          $message = "Success Accept Delivery!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'deliveryList.php';
            </script>";
        }
    }

    // add pickup to rider_order table
    function acceptPickup($RunnerID){
        $product = new pickupModel();
        $product->OrderProductID = $_POST['OrderProductID'];
        $product->RunnerID = $RunnerID;
        if($product->acceptPickup()){
          $message = "Success Accept Pickup!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'pickupList.php';
            </script>";
        }
    }


    // update payment status to completed based on quotation id
     function receivePayment($RunnerID){
        $product = new deliveryModel();
       
        $product->RunnerID = $RunnerID;
        $product->DeliveryID = $_POST['DeliveryID'];
        $product->QuotationID = $_POST['QuotationID'];
        // print_r($product);
        // exit();
        if($product->receivePayment()){
            
          $message = "Success Accept Payment!"; 
            echo "<script type='text/javascript'>
            alert('$message');
            </script>"; 

        }  

    }


    // get all rider delivery based on Rider id
    function getDeliveryList($RunnerID){
        $product = new deliveryModel();
        $product->RunnerID = $RunnerID;
        return $product->getDeliveryList();
    }

  // get all rider pickup based on Rider id
    function getPickupList($RunnerID){
        $product = new pickupModel();
        $product->RunnerID = $RunnerID;
        return $product->getPickupList();
    }

      // get all delivery details from delivery table based on delivery id and delivery status not delivered
    function viewMyPendingDelivery($orderproductID,$p){
      $product = new deliveryModel();
      $product->orderproductID = $orderproductID;
      $product->p = $p;
      return $product->viewMyPendingDelivery();
    }

   // get all delivery details from rider order table based on delivery id
    function viewOrderId($orderproductid,$j){
        $product = new deliveryModel();
        $product->orderproductid = $orderproductid;
        $product->j = $j;
        return $product->viewOrderId();
    }


       // get quotation details from quotation,delivery table based on quoattion id
    function viewMyDeliveryAddress($orderid,$j){
          $product = new deliveryModel();
          $product->orderid = $orderid;
          $product->j = $j;
          return $product->viewMyDeliveryAddress();
      }

   

    // update delivery status to delivered 
    function updateDeliveryStatus(){
            $product = new deliveryModel();
            $product->DeliveryID = $_POST['DeliveryID'];
            if($product->updateDeliveryStatus()){
              $message = "Success Delivered Item!";
                echo "<script type='text/javascript'>
                alert('$message');
                window.location = 'myDelivery.php';
                </script>";
            }
        }

     // update pickup status to complete from based pickup id
     function updatePickupStatus(){
            $product = new pickupModel();
            $product->PickupID = $_POST['PickupID'];
            if($product->updatePickupStatus()){
              $message = "Success Pickup Item!";
                echo "<script type='text/javascript'>
                alert('$message');
                window.location = 'myPickup.php';
                </script>";
            }
        }

    
// add customer pickup details in pickup table
    function addPickup($quotationid,$custid) {

        $product = new pickupModel();
        //$product->orderproductID = $orderproductID;
        $product->quotationid = $quotationid;
        $product->custid = $custid;
       // $product->p = $p;
        $product->date = $_POST['date'];
        $product->time = $_POST['time'];
        $product->addr = $_POST['addr'];
        $product->notes = $_POST['notes'];
        //$product->custid = $_SESSION['custid'];

        if($product->addPickup() > 0){
            $message = "Pickup Service Added!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'requestQuotationList.php';
            </script>";
        }

      }
    

}
?>