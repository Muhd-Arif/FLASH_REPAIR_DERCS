<?php
require_once '../../../BusinessServiceLayer/model/quotationModel.php';

class quotationController {

    // add customer request quotation into database - Arif
    function addQuotation($c_id){
        $quotation = new quotationModel();
        $quotation->c_id = $c_id;
        $quotation->q_deviceType = $_POST['deviceType'];
        $quotation->q_damageType = $_POST['damageType'];
        $quotation->q_damageInfo = $_POST['damageInfo'];
        $quotation->q_date = date("F j, Y");
        $quotation->q_status = "Pending";

        if($quotation->addQuotation() > 0){
            $message = "Request Quotation Success!";
        echo "<script type='text/javascript'>
        alert('$message');
        localStorage.removeItem('name');
        localStorage.removeItem('phone');
        localStorage.removeItem('deviceType');
        localStorage.removeItem('damageType');
        localStorage.removeItem('damageInfo');
        window.location = 'requestQuotationList.php';
        </script>";
        } else {
            $message = "Request Quotation Failed!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

    // get all customer request quotation - ARIF
    function getAllQuotation(){
        $quotation = new quotationModel();
        return $quotation->getAllQuotation();
    }

    // get customer's request quotation - ARIF
    function getMyQuotation($c_id){
        $quotation = new quotationModel();
        $quotation->c_id = $c_id;
        return $quotation->getMyQuotation();

    }

    // get quotation details based on quotation ID - ARIF
    function getQuotationDetails($q_id){
        $quotation = new quotationModel();
        $quotation->q_id = $q_id;
        return $quotation->getQuotationDetails();

    }

    function getCustomerInfo($c_id, $index){
        $quotation = new quotationModel();
        $quotation->c_id = $c_id;
        $quotation->index = $index;
        return $quotation->getCustomerInfo();
    }

    function updateQuotation($q_id){
        $quotation = new quotationModel();
        $quotation->q_id = $q_id;
        $quotation->q_solution = $_POST['solution'];
        $quotation->q_cost = $_POST['cost'];
        if($quotation->updateQuotation()){
            $message = "Success Update Quotation!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'quotationList.php';
            </script>";
        }
    }

    function updateConfirmation($q_id, $q_status, $delivery){
        $quotation = new quotationModel();
        $quotation->q_id = $q_id;
        $quotation->q_status = $q_status;
        if($quotation->updateConfirmation()){
            if($q_status == "Accepted"){
                $message = "Success Accept The Quotation!";
            } else {
                $message = "Success Reject The Quotation!";
            }
            
            if($delivery == "pickup"){
                echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'custPickup.php?q_id=".$q_id."';
            </script>";
            } else {
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'requestQuotationList.php';
            </script>";
            }
            
        }
    }



}

?>