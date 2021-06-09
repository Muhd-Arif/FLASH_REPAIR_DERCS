<?php
require_once '../../../libs/database.php';

class repairModel{
    // public variable Wei Sheng
    public $qid, $rpid, $custid,$deviceType,$rpstatus,$rpimage,$rpreason;



    // ============ STAFF FUNCTIONS ============ //



    // retrieve all customer's repairs fron repair table - Wei Sheng
    function viewAllRP(){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q  where q.Q_DeviceType='$this->deviceType' and r.Q_ID = q.Q_ID";
        }else{
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID";
        }
        return DB::run($sql);
    }

    // retrieve all repairs that match the searched term from the repair table - Wei Sheng
    function viewSearchAllRPList($term){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q where  q.Q_DeviceType='$this->deviceType' and r.RP_ID like '%$term%' and r.Q_ID = q.Q_ID";
        }else{
            $sql = "select * from repair as r, quotation as q where  r.RP_ID like '%$term%' and r.Q_ID = q.Q_ID";
        }
        return DB::run($sql);
    }

    // retrieve a specific number of repairs from the repair table according to the page number - Wei Sheng
    function viewRPPage($offset, $number_of_records, $term){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and q.Q_DeviceType='$this->deviceType' and r.RP_ID like '%$term%' limit ". $offset. ", ". $number_of_records ;
        }else{
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and r.RP_ID like '%$term%' limit ". $offset. ", ". $number_of_records;
        }

        return DB::run($sql);
    }

    // retrieve details of a specific repair from the repair table - Wei Sheng
    function viewRP(){
        $sql = "select * from repair as r, quotation as q where r.RP_ID=:rpid and r.Q_ID = q.Q_ID";
        $args = [':rpid'=>$this->rpid];
        return DB::run($sql,$args);
    }

    // update the details of a specific repair in the repair table - Wei Sheng
    function editRP(){
        $sql = "update repair set RP_Status=:rpstatus, RP_Image=:rpimage, RP_Reason=:rpreason where RP_ID=:rpid";
        $args = [':rpstatus'=>$this->rpstatus, ':rpimage'=>$this->rpimage, ':rpreason'=>$this->rpreason, ':rpid'=>$this->rpid];
        return DB::run($sql,$args);
    }




    // ============ CUSTOMER FUNCTIONS ============ //


    // retrieve all repairs from the repair table (used to calculate the number of pages required) - Wei Sheng
    function viewRPList(){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q  where q.Q_DeviceType='$this->deviceType' and r.Q_ID = q.Q_ID and q.C_ID = '$this->custid'";
        }else if(isset($this->repairStatus)){
            $sql = "select * from repair as r, quotation as q  where r.RP_Status='$this->repairStatus' and r.Q_ID = q.Q_ID and q.C_ID = '$this->custid'";
        }else{
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and q.C_ID = '$this->custid'";
        }
        return DB::run($sql);
    }

    // retrieve repairs that match the searched term from the repair table - Wei Sheng
    function viewSearchRPList($term){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q where  q.Q_DeviceType='$this->deviceType' and q.C_ID = '$this->custid' and r.RP_ID like '%$term%' and r.Q_ID = q.Q_ID";
        }else if(isset($this->repairStatus)){
            $sql = "select * from repair as r, quotation as q where  r.RP_Status='$this->repairStatus' and q.C_ID = '$this->custid' and r.RP_ID like '%$term%' and r.Q_ID = q.Q_ID";
        }else{
            $sql = "select * from repair as r, quotation as q where  r.RP_ID like '%$term%' and r.Q_ID = q.Q_ID and q.C_ID = '$this->custid'";
        }
        return DB::run($sql);
    }

    // retrieve a specific number of repairs from the repair table according to the page number - Wei Sheng
    function viewRPListPage($offset, $number_of_records, $term){
        if(isset($this->deviceType)){
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and q.C_ID = '$this->custid' and q.Q_DeviceType='$this->deviceType' and r.RP_ID like '%$term%' limit ". $offset. ", ". $number_of_records;
        }else if(isset($this->repairStatus)){
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and q.C_ID = '$this->custid' and r.RP_Status='$this->repairStatus' and r.RP_ID like '%$term%' limit ". $offset. ", ". $number_of_records;
        }else{
            $sql = "select * from repair as r, quotation as q where r.Q_ID = q.Q_ID and q.C_ID = '$this->custid' and r.RP_ID like '%$term%' limit ". $offset. ", ". $number_of_records;
        }

        return DB::run($sql);
    }

    // get selected repair details to display at repairDetails page - Wei Sheng
    function viewRepairDetails(){
        $sql = "select * from repair as r, quotation as q where r.RP_ID=:rpid and r.Q_ID = q.Q_ID";
        $args = [':rpid'=>$this->rpid];
        return DB::run($sql,$args);
    }

    //method to view quotation repair details - Hoe Shin Yi
    function viewQRP(){
        $query = "SELECT * FROM quotation INNER JOIN repair ON quotation.Q_ID = repair.Q_ID WHERE repair.RP_ID = '$this->rpid'";
        return DB::Run($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // update repair status to Paid based on repair id - Hoe Shin Yi
     function updateRepairPaid(){
        $sql = "update repair set RP_Status=:rpstatus where RP_ID=:rpid";
        $args = [':rpstatus'=>$this->rpstatus, ':rpid'=>$this->rpid];
        return DB::run($sql,$args);
    }



}
?>