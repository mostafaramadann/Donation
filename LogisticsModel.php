<?php
class LogisticsModel
{
    private $recid;
    private $Ordername;
    private $status;
    private $OrderDetails;

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getRecid()
    {
        return $this->recid;
    }
    public function AddRecord($dataArray,$ColumnsArray)
    {
        require_once ("Saver.php");
        Saver::GetInstance()::addRecord("logistics",$dataArray,$ColumnsArray);
    }
    public function getRecords()
    {
        require_once ("Loader.php");
        $data=Loader::GetInstance()::LoadTableContentFromDatabase('logistics');
        $recid= array();
        $Order =array();
        $Status=array();
        $Details=array();
        $i=0;
        while($i<count($data)) {
            array_push($recid, $data[$i]['orderid']);
            array_push($Order, $data[$i]['Order_name']);
            array_push($Status, $data[$i]['Status']);
            array_push($Details, $data[$i]['Details']);
            $i++;
        }
        $this->setRecid($recid);
        $this->setOrdername($Order);
        $this->setStatus($Status);
        $this->setOrderDetails($Details);
        return $data;
    }
    public function setRecid($recid)
    {
        $this->recid = $recid;
    }

    public function getOrdername()
    {
        return $this->Ordername;
    }
    public function setOrdername($Ordername)
    {
        $this->Ordername = $Ordername;
    }

    public function getOrderDetails()
    {
        return $this->OrderDetails;
    }

    public function setOrderDetails($OrderDetails)
    {
        $this->OrderDetails = $OrderDetails;
    }

}
?>