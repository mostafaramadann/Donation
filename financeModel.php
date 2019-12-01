<?php
class financeModel
{
    private $recid;
    private $asset;
    private $price;
    private $qty;

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
