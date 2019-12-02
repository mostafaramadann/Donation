<?php
class financeModel
{
    private static $recid;
    private static $asset;
    private static $price;
    private static $qty;

    public static function getRecid()
    {
        return self::$recid;
    }
    public static function AddRecord($ColumnsArray,$dataArray)
    {
        require_once ("Saver.php");
        Saver::GetInstance()::addRecord("finance",$dataArray,$ColumnsArray);
    }
    public static function getRecords()
    {
        require_once ("Loader.php");
        $data=Loader::GetInstance()::LoadTableContentFromDatabase('finance');
        return $data;
    }
    public static function setRecid($recid)
    {
        self::$recid = $recid;
    }

    public static function getAsset()
    {
        return self::$asset;
    }

    public function setAsset($asset)
    {
        self::$asset = $asset;
    }
    public function getPrice()
    {
        return self::$price;
    }
    public function setPrice($price)
    {
        self::$price = $price;
    }

    public function getQty()
    {
        return self::$qty;
    }

    public function setQty($qty)
    {
        self::$qty = $qty;
    }

}
?>
