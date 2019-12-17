<?php
require_once ("IPay.php");
class VisaDonate implements IPay
{
    private $creditcardno;
    private $CVC;
    private $ExpireMonth;
    private $expireYear;
    private $amount;
    public $text="Visa";
    function pay($amount)
    {
        $this->amount=$amount;
    }

    public function getCreditcardno()
    {
        return $this->creditcardno;
    }
    public function setCreditcardno($creditcardno)
    {
        $this->creditcardno = $creditcardno;
    }

    public function getCVC()
    {
        return $this->CVC;
    }

    public function setCVC($CVC)
    {
        if(strlen($CVC)==3)
        $this->CVC = $CVC;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function getExpireMonth()
    {
        return $this->ExpireMonth;
    }

    public function setExpireMonth($ExpireMonth)
    {
        $this->ExpireMonth = $ExpireMonth;
    }
    public function getExpireYear()
    {
        return $this->expireYear;
    }
    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
    }

}
?>