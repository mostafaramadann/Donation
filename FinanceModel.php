<?php
class financeModel
{
    private  $recid=array();
    private  $asset=array();
    private  $price=array();
    private  $qty=array();

    public function __construct()
    {

    }

    public function AddRecord($dataArray,$ColumnsArray)
    {
        require_once ("Saver.php");
        Saver::GetInstance()::addRecord("finance",$dataArray,$ColumnsArray);
    }
    public function getRecords()
    {
        require_once ("Loader.php");
        $data=Loader::GetInstance()::LoadTableContentFromDatabase('finance');
        $recid= array();
        $asset =array();
        $price=array();
        $qty=array();
        $i=0;
        while($i<count($data)) {
            array_push($recid, $data[$i]['recid']);
            array_push($asset, $data[$i]['Asset']);
            array_push($price, $data[$i]['price']);
            array_push($qty, $data[$i]['qty']);
            $i++;
        }
        $this->setRecid($recid);
        $this->setAsset($asset);
        $this->setPrice($price);
        $this->setQty($qty);
        return $data;
    }

    public function getRecid()
    {
        return $this->recid;
    }

    public function setRecid($recid)
    {
        $this->recid = $recid;
    }

    public function getAsset()
    {
        return $this->asset;
    }


    public function setAsset($asset)
    {
        $this->asset = $asset;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQty()
    {
        return $this->qty;
    }


    public function setQty($qty)
    {
        $this->qty = $qty;
    }


}
?>
