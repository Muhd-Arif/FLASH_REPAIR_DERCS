<?php
require_once '../../../BusinessServiceLayer/model/repairModel.php';

class repairController{



    // ============ STAFF FUNCTIONS ============ //




    // view all repairs  (used to calculate the number of pages required) - Wei Sheng
    function viewAllRepairs(){
        $repair = new repairModel();
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];
        }
        return $repair->viewAllRP();
    }

    // view all searched repairs - Wei Sheng
    function viewSearchAllRepairList($term){
        $repair = new repairModel();
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];

        }
        return $repair->viewSearchAllRPList($term);
    }

    // view a specific page of repairs  - Wei Sheng
    function viewRepairPage($offset, $number_of_records, $term){
        $repair = new repairModel();
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];
        }
        return $repair -> viewRPPage($offset, $number_of_records, $term);
    }



    // view the details of a specific repair - Wei Sheng
    function viewRepair($rpid){
        $repair = new repairModel();
        $repair->rpid = $rpid;
        return $repair->viewRP();
    }

    // edit the details of a specific repair - Wei Sheng
    function editRepair(){
        $repair = new repairModel();
        $repair->rpid = $_POST['rpid'];
        $repair->rpstatus = $_POST['rpstatus'];
        $repair->rpimage = $_POST['rpimage'];
        $repair->rpreason = $_POST['rpreason'];
        
        if($repair->editRP()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = 'allRepairList.php' </script>";
        }
    }



    // ============ CUSTOMER FUNCTIONS ============ //

    // view all repairs (used to calculate the number of pages required) - Wei Sheng
    function viewRepairList(){
        $repair = new repairModel();
        $repair->custid = $_SESSION['C_ID'];
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];
        }else if(isset($_GET['status'])){
            $repair->repairStatus = $_GET['status'];
        }
        return $repair->viewRPList();
    }

    // view all searched repairs - Wei Sheng
    function viewSearchRepairList($term){
        $repair = new repairModel();
        $repair->custid = $_SESSION['C_ID'];
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];

        }else if(isset($_GET['status'])){
            $repair->repairStatus = $_GET['status'];
        }
        return $repair->viewSearchRPList($term);
    }

    // view a specific page of repairs - Wei Sheng
    function viewRepairListPage($offset, $number_of_records, $term){
        $repair = new repairModel();
        $repair->custid = $_SESSION['C_ID'];
        if(isset($_GET['device'])){
            $repair->deviceType = $_GET['device'];
        }else if(isset($_GET['status'])){
            $repair->repairStatus = $_GET['status'];
        }
        return $repair -> viewRPListPage($offset, $number_of_records, $term);
    }

    // get repair details from repair table to display at repairDetails page - Wei Sheng
    function viewRepairDetails($rpid){
        $repair = new repairModel();
        $repair->custid = $_SESSION['C_ID'];
        $repair->rpid = $rpid;
        return $repair->viewRepairDetails();
    }

    // view the details of a quotation and repair - Hoe Shin Yi
    function viewQuotationRepair($rpid){
        $repair = new repairModel();
       
        $repair->rpid = $rpid;
        return $repair->viewQRP();
    }

    function updateRepairPaid($rpid){
        $repair = new repairModel();
        $repair->rpid = $rpid;
        $repair->rpstatus = "Paid";
        
        $repair->updateRepairPaid();
    }
    
}
?>